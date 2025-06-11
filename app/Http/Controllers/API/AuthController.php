<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
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

            $success = [
                'token' => $token,
                'name' => $user->name,
                'user' => $user,
                'roles' => $roles,
            ];

            // return $this->sendResponse($success, 'User login successfully.');
            return ApiResponse::success($success, "Berhasil Login", "0000", 200);
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
