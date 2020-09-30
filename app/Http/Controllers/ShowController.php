<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function showResultSuccess($data = [], $messenger = 'Success', $status = 200 )
    {
        $response = [
            'code' => $messenger,
            'data' => $data,
            'status' => $status
        ];
        return response()->json($response);
    }
    public function showResultValidate($error, $messenger)
    {
        $response = [
            'code' => $messenger,
            'data' => $error
        ];
        return response()->json($response);
    }
}
