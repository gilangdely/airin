<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            $user->tokens()->delete();

            $token = $user->createToken('flutter-app')->plainTextToken;

            $roles = $user->getRoleNames();

            $userData = $user->toArray();
            $userData['role'] = $roles[0] ?? null;
            $userData['users_picture'] = $user->users_picture
                ? asset('storage/profile-pictures/' . $user->users_picture)
                : null;

            $success = [
                'token' => $token,
                'name' => $user->name,
                'user' => $user,
                'roles' => $roles,
            ];

            if ($success && $user->users_picture) {
                $success['user']['users_picture'] = Storage::url($user->users_picture);
            } else if ($success) {
                $success['user']['users_picture'] = 'https://ui-avatars.com/api/?background=random&' . $user->name;
            }

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->sendResponse([], 'User logout successfully.');
    }

    public function userProfile(Request $request)
    {
        $user = $request->user();
        if ($user && $user->users_picture) {
            // Pastikan users_picture tidak kosong dan bukan path absolut
            if (!filter_var($user->users_picture, FILTER_VALIDATE_URL)) {
                $user->users_picture = Storage::url($user->users_picture);
            } else {
                $user->users_picture = 'https://ui-avatars.com/api/?background=random&' . $user->name; // Jika sudah URL, gunakan apa adanya
            }
        }
        return $this->sendResponse($user, 'User profile retrieved successfully.');
    }
}
