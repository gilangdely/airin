<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MappingController extends Controller
{
    public function mapping(Request $request)
    {
        dd($request->all());
    }
}
