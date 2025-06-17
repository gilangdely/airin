<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            if (!Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
                return ApiResponse::error("Username atau password salah.", "1001", 401);
            }

            $user = Auth::user();

            if (!$user) {
                return ApiResponse::error("User tidak ditemukan.", "2001", 404);
            }

            $token = $user->createToken('flutter-app')->plainTextToken;

            $success = [
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => $user->email_verified_at,
                    'users_picture' => $user->users_picture ? (url('/api') . Storage::url($user->users_picture)) : null,
                    'role' => $user->roles[0]['name'],
                ],
                'access_token' => $token,
            ];

            return ApiResponse::success($success, "Berhasil Login.", "0000", 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error("Validasi gagal: " . implode(', ', $e->validator->errors()->all()), "9001", 422);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }



    public function logout(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if (!$user) {
                return ApiResponse::error("User tidak ditemukan.", "1004", 404);
            }

            $user->tokens()->delete();

            return ApiResponse::success([], "User logout successfully.", "0000", 200);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }
}
