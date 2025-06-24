<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            $user = User::with('roles')->find(Auth::id());

            if (!$user) {
                return ApiResponse::error("User tidak ditemukan.", "2001", 404);
            }

            $data = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'users_picture' => $user->users_picture ? (url('/api') . Storage::url($user->users_picture)) : null,
                'role' => $user->roles[0]['name'] ?? null,
            ];

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
            ]);

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

            $user->update($validatedData);

            $success = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'users_picture' => $user->users_picture ? (url('/api') . Storage::url($user->users_picture)) : null,
                'role' => $user->roles[0]['name'],
            ];

            return ApiResponse::success($success, "Profil berhasil diperbarui.", "0000", 200);
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
                'new_password' => ['required', 'min:6', 'confirmed'],
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
}
