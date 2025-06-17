<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = 'Success', $rc = 0, $httpCode = 200)
    {
        return response()->json([
            'rc' => $rc,
            'message' => $message,
            'data' => $data,
        ], $httpCode);
    }

    public static function error($message = 'Error', $rc, $httpCode = 400, $errors = null)
    {
        $response = [
            'rc' => $rc,
            'message' => $message,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $httpCode);
    }
}
