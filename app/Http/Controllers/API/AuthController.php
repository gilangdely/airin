<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

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

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->sendResponse([], 'User logout successfully.');
    }
}
