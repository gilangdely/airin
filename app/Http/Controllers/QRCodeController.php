<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index($info)
    {
        $path = public_path('qrcode/' . $info . '.png');
        return QrCode::size(300)->generate($info, $path);
    }
}
