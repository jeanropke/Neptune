<?php

namespace App\Http\Controllers;

use App\Classes\AvatarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HabboImaging extends Controller
{
    public function avatarimage(Request $request)
    {
        $inputFigure        = strtolower($request->figure);
        $inputAction        = isset($request->action) ? strtolower($request->action) : 'std';
        $inputDirection     = isset($request->direction) ? (int)$request->direction : 4;
        $inputHeadDirection = isset($request->head_direction) ? (int)$request->head_direction : $inputDirection;
        $inputGesture       = isset($request->gesture) ? strtolower($request->gesture) : 'std';
        $inputSize          = isset($request->size) ? strtolower($request->size) : 'n';
        $inputFormat        = isset($request->img_format) ? strtolower($request->img_format) : 'png';
        $inputFrame         = isset($request->frame) ? strtolower($request->frame) : '0';
        $inputHeadOnly      = isset($request->headonly) ? (bool)$request->headonly : false;

        $inputAction        = explode(",", $inputAction);
        $inputFormat        = $inputFormat == "gif" ? "gif" : "png";
        $inputFrame         = explode(",", $inputFrame);

        $avatarImage = new AvatarImage($inputFigure, $inputDirection, $inputHeadDirection, $inputAction, $inputGesture, $inputFrame, $inputHeadOnly, $inputSize);
        $image = $avatarImage->Generate($inputFormat);

        $expandedstyle = $inputFigure . ".s-" . (($inputSize == "s" || $inputSize == "l") ? "n" : $inputSize) . ($inputHeadOnly ? "h" : "") . ".g-" . $inputGesture . ".d-" . $inputDirection . ".h-" . $inputHeadDirection . ".a-" . implode("-", str_replace("=", "", $inputAction)) . ".f-" . implode("-", str_replace("=", "", $inputFrame));
        $hash = md5($expandedstyle);
        $path = storage_path('habboimaging/figure');

        if(!File::exists($path))
            File::makeDirectory($path, 0755, true);


        $cacheName =  $path . "/avatar_" . $hash . "." . $inputFormat;
        $resourceCache = true;

        if ($resourceCache && file_exists($cacheName)) {
            return response(file_get_contents($cacheName), 200)
                ->header('Content-Type', 'image/'.$inputFormat)
                ->header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT\n\n')
                ->header('Cache-Control', 'no-cache, must-revalidate\n\n')
                ->header('Etag', md5_file($cacheName));
            exit;
        } else {
            $avatarImage = new AvatarImage($inputFigure, $inputDirection, $inputHeadDirection, $inputAction, $inputGesture, $inputFrame, $inputHeadOnly, $inputSize);
            $image = $avatarImage->Generate($inputFormat);
            if ($image !== false) {

                if ($resourceCache) {
                    $fp = fopen($cacheName, "w");
                    fwrite($fp, $image);
                    fclose($fp);
                }

                return response($image, 200)
                ->header('Process-Time', $avatarImage->processTime)
                ->header('Error-Message', $avatarImage->error)
                ->header('Debug-Message', $avatarImage->debug)
                ->header('Generator-Version', $avatarImage->version)
                ->header('Content-Type', 'image/'.$inputFormat);
            }
            exit;
        }
    }
}
