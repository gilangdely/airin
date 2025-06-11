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

    public static function error($rc, $message = 'Error', $errors = null, $httpCode = 400)
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
