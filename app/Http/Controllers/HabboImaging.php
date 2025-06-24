<?php

namespace App\Http\Controllers;

use App\Classes\AvatarImage;
use App\Classes\BadgeImage;
use App\Classes\PhotoPallets\GreyscalePalette;
use App\Classes\PhotoRenderer;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HabboImaging extends Controller
{
    public function avatarimage(Request $request)
    {
        //                                      1550518001240022850630005 01 22 00
        //habbo old figure data converter -     1650718001878252701630005 11 44 00
        if (strlen($request->figure) >= 31) {
            $tempFigure = substr($request->figure, 0, 31);
            $request->figure = substr($tempFigure, 0, 25);
            $request->size = substr($tempFigure, 25, 1) == 1 ? 's' : 'n';
            $request->action = substr($tempFigure, 26, 1) == 1 ? 'std' : 'wav';
            $request->direction = substr($tempFigure, 27, 1);
            $request->head_direction = substr($tempFigure, 28, 1);
            //$request->gesture = $gestures[substr($tempFigure, 29, 1)] ?? 'std';
        }
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

        $expandedstyle = $inputFigure . ".s-" . (($inputSize == "s" || $inputSize == "l") ? $inputSize : 'n') . ($inputHeadOnly ? "h" : "") . ".g-" . $inputGesture . ".d-" . $inputDirection . ".h-" . $inputHeadDirection . ".a-" . implode("-", str_replace("=", "", $inputAction)) . ".f-" . implode("-", str_replace("=", "", $inputFrame));
        $hash = md5($expandedstyle);
        $path = storage_path('habboimaging/figure');

        if (!File::exists($path))
            File::makeDirectory($path, 0755, true);


        $cacheName =  $path . "/avatar_" . $expandedstyle . "." . $inputFormat;
        $resourceCache = true;

        if ($resourceCache && file_exists($cacheName)) {
            return response(file_get_contents($cacheName), 200)
                ->header('Content-Type', 'image/' . $inputFormat)
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
                    ->header('Content-Type', 'image/' . $inputFormat);
            }
            exit;
        }
    }

    public function badge(Request $request)
    {
        $path = storage_path('habboimaging/badges');
        $badge = substr($request->badge, 0, 24);


        $badgeImage = new BadgeImage($badge);

        $code = $badgeImage->getBadgeCode();
        $cacheName =  "$path/$code.gif";
        $resourceCache = true;

        if ($resourceCache && file_exists($cacheName)) {
            return response(file_get_contents($cacheName), 200)
                ->header('Content-Type', 'image/gif')
                ->header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT\n\n')
                ->header('Cache-Control', 'no-cache, must-revalidate\n\n')
                ->header('Etag', md5_file($cacheName));
            exit;
        } else {
            $badgeImage = new BadgeImage($badge);
            $image = $badgeImage->Generate();

            if ($resourceCache) {
                $fp = fopen($cacheName, "w");
                fwrite($fp, $image);
                fclose($fp);
            }

            return response($image, 200)
                ->header('Process-Time', $badgeImage->processTime)
                ->header('Error-Message', $badgeImage->error)
                ->header('Debug-Message', $badgeImage->debug)
                ->header('Generator-Version', $badgeImage->version)
                ->header('Content-Type', 'image/gif');
            exit;
        }
    }

    public function photo(Request $request)
    {
        $photo = Photo::find($request->photo);
        if (!$photo) return;

        $path = storage_path('habboimaging/photos');
        $cacheName =  "$path/photo_$request->photo.png";
        $resourceCache = true;

        if ($resourceCache && file_exists($cacheName)) {
            return response(file_get_contents($cacheName), 200)
                ->header('Content-Type', 'image/png')
                ->header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT\n\n')
                ->header('Cache-Control', 'no-cache, must-revalidate\n\n')
                ->header('Etag', md5_file($cacheName));
            exit;
        } else {

            $pallete = new GreyscalePalette();
            $renderer = new PhotoRenderer($pallete->getPalette(), 'SEPIA');
            $image = $renderer->createImage($photo->photo_data);

            if ($resourceCache) {
                $fp = fopen($cacheName, "w");
                fwrite($fp, $image);
                fclose($fp);
            }

            return response($image, 200)
                ->header('Process-Time', $renderer->processTime)
                ->header('Error-Message', $renderer->error)
                ->header('Debug-Message', $renderer->debug)
                ->header('Generator-Version', $renderer->version)
                ->header('Content-Type', 'image/png');
            exit;
        }
    }
}
