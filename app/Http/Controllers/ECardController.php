<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ECardController extends Controller
{
    public function gateway(Request $request)
    {
        $rawPayload = $request->getContent();

        Storage::put('amf_dump.bin', $rawPayload);

        return response('OK');
    }
}
