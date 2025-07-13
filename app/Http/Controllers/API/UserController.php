<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends BaseController implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:user view', only: ['index', 'show']),
            new Middleware('permission:user create', only: ['create', 'store']),
            new Middleware('permission:user edit', only: ['edit', 'update']),
            new Middleware('permission:user delete', only: ['destroy']),
        ];
    }

    public function me(): JsonResponse
    {
        try {
            // Ambil user yang sedang login beserta role-nya
            $user = User::with('roles')->find(Auth::id());

            if (!$user) {
                return ApiResponse::error("User tidak ditemukan.", "2001", 404);
            }

            // Ambil data petugas berdasarkan username (nomor_induk_petugas)
            $petugas = DB::table('petugas')->where('nomor_induk_petugas', $user->username)->first();

            // Susun data response
            $data = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'users_picture' => $user->users_picture
                    ? (url('/api') . Storage::url($user->users_picture))
                    : null,
                'role' => $user->roles[0]['name'] ?? null,
            ];

            // Jika role petugas, sertakan detail tambahan
            if (strtolower($data['role']) === 'petugas' && $petugas) {
                $data['petugas_detail'] = [
                    'nama_lengkap' => $petugas->nama_lengkap,
                    'nomor_induk_petugas' => $petugas->nomor_induk_petugas,
                    'nomor_telepon' => $petugas->nomor_telepon,
                    'nomor_telepon_2' => $petugas->nomor_telepon_2,
                    'alamat' => $petugas->alamat,
                ];
            }

            return ApiResponse::success($data, "Data profil berhasil diambil.", "0000", 200);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }

    public function updateProfile(Request $request): JsonResponse
    {
        try {
            $user = User::find(Auth::id());

            if (!$user) {
                return ApiResponse::error("User tidak ditemukan.", "2001", 404);
            }

            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'username' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
                'users_picture' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
                'email' => ['sometimes', 'nullable', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'nomor_telepon' => 'sometimes|nullable|string|max:20',
                'alamat' => 'sometimes|nullable|string|max:255',
            ]);

            // Update gambar profil jika dikirim
            if ($request->hasFile('users_picture')) {
                try {
                    if ($user->users_picture && Storage::disk('public')->exists('profile-pictures/' . $user->users_picture)) {
                        Storage::disk('public')->delete('profile-pictures/' . $user->users_picture);
                    }

                    $file = $request->file('users_picture');
                    $filename = "profile_{$user->id}.jpg";
                    $file->storeAs('profile-pictures', $filename, 'public');

                    $validatedData['users_picture'] = 'profile-pictures/' . $filename;
                } catch (\Exception $e) {
                    return ApiResponse::error("Gagal menyimpan gambar profil.", "9001", 500);
                }
            }

            // Update data user
            $user->update($validatedData);

            // Update tabel petugas jika ada perubahan
            if ($request->filled('nomor_telepon') || $request->filled('alamat')) {
                $updatePetugasData = [];
                if ($request->filled('nomor_telepon')) {
                    $updatePetugasData['nomor_telepon'] = $request->input('nomor_telepon');
                }
                if ($request->filled('alamat')) {
                    $updatePetugasData['alamat'] = $request->input('alamat');
                }

                DB::table('petugas')
                    ->where('nomor_induk_petugas', $user->username)
                    ->update($updatePetugasData);
            }

            // Siapkan response
            $role = $user->roles()->first()?->name ?? null;

            $response = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'users_picture' => $user->users_picture ? (url('/api') . Storage::url($user->users_picture)) : null,
                'role' => $role,
            ];

            // Ambil ulang data petugas jika ada
            $petugas = DB::table('petugas')
                ->where('nomor_induk_petugas', $user->username)
                ->first();

            if ($petugas) {
                $response['petugas_detail'] = [
                    'nama_lengkap' => $petugas->nama_lengkap,
                    'nomor_induk_petugas' => $petugas->nomor_induk_petugas,
                    'nomor_telepon' => $petugas->nomor_telepon,
                    'alamat' => $petugas->alamat,
                ];
            }

            return ApiResponse::success($response, "Profil berhasil diperbarui.", "0000", 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error("Validasi gagal: " . implode(', ', $e->validator->errors()->all()), "9001", 422);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }


    public function changePassword(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return ApiResponse::error("User tidak ditemukan.", "2001", 404);
            }

            $validatedData = $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required', 'min:6', 'confirmed', 'unique:user'],
            ]);

            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return ApiResponse::error("Password saat ini salah.", "9001", 422);
            }

            $user->update([
                'password' => Hash::make($validatedData['new_password']),
            ]);

            return ApiResponse::success(null, "Password berhasil diubah.", "0000", 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error("Validasi gagal: " . implode(', ', $e->validator->errors()->all()), "9001", 422);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan server.", "9999", 500);
        }
    }

    public function getById(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|exists:pelanggan,id_pelanggan'
        // ]);

        $data = Pelanggan::where('id_pelanggan', Auth::user()->username)->with(['meterans.layanan'])->first();

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }
}
