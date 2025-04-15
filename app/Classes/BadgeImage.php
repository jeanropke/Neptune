<?php

namespace App\Classes;

define("PATH_RESOURCE",    resource_path() . "/habbo-imaging/badge/");
class BadgeImage
{
    var $version        = "1.0.0 / March.19 2025";
    var $error          = null;
    var $debug          = null;
    var $settings       = null;
    var $rectWidth      = 39;
    var $rectHeight     = 39;

    var $badge         = array();

    function __construct($badge)
    {
        $this->processTime = 0;
        $time_start = microtime(true);
        $this->settings = array(
            "palette"        => $this->getJSON("./palette.json")
        );

        $badge = explode('.', $badge)[0];

        if (strlen($badge) % 6 != 0)
            return;

        foreach (str_split($badge, 6) as $part) {
            if (str_starts_with($part, 'b')) {
                // remove first character 'b'
                $part = substr($part, 1);

                // split image color X (base does not have a position)
                $parts =  str_split($part, 2);

                array_push($this->badge, ['type' => 'base', 'value' => $parts[0], 'color' => $parts[1], 'position' => 'X']);
            } else if (str_starts_with($part, 's')) {
                // remove first character 's'
                $part = substr($part, 1);

                // split image color position (base does not have a position)
                $parts =  str_split($part, 2);
                array_push($this->badge, ['type' => 'symbol', 'value' => $parts[0], 'color' => $parts[1], 'position' => $parts[2]]);
            }
        }
        $time_end = microtime(true);
        $this->processTime = $time_end - $time_start;
        return true;
    }

    function Generate($format = 'gif')
    {
        $time_start = microtime(true);

        $badgeImage = imageCreateTrueColor($this->rectWidth, $this->rectHeight);
        imageAlphaBlending($badgeImage, false);
        imageSaveAlpha($badgeImage, true);
        $rectMask = imageColorAllocateAlpha($badgeImage, 255, 255, 255, 127);
        imageFill($badgeImage, 0, 0, $rectMask);

        imageAlphaBlending($badgeImage, true);

        foreach ($this->badge as $part) {
            $drawPartRect = $this->getPartResource(
                $part['type'],
                $part['value'],
                $part['position']
            );

            if($drawPartRect)
            {
                $this->setPartColor($drawPartRect['resource'], $part['color']);

                imageCopy($badgeImage, $drawPartRect['resource'], $drawPartRect['offset']['x'], $drawPartRect['offset']['y'], 0, 0, $drawPartRect['width'], $drawPartRect['height']);

                if($drawPartRect['extra'])
                {
                    imageCopy($badgeImage, $drawPartRect['extra'], $drawPartRect['offset']['x'], $drawPartRect['offset']['y'], 0, 0, $drawPartRect['width'], $drawPartRect['height']);
                    imageDestroy($drawPartRect['extra']);
                }

                imageDestroy($drawPartRect['resource']);
            }
        }

        ob_start();
        if ($format == "gif") {
            $this->format = "gif";
            $rectMask = imageColorAllocateAlpha($badgeImage, 255, 255, 255, 127);
            imageColorTransparent($badgeImage, $rectMask);
            imageGIF($badgeImage);
        } elseif ($format == "png") {
            $this->format = "png";
            imagePNG($badgeImage);
        } else {
            ob_end_clean();
            exit;
        }
        $resource = ob_get_contents();
        ob_end_clean();
        imageDestroy($badgeImage);

        $time_end = microtime(true);
        $this->processTime += $time_end - $time_start;

        return $resource;
    }

    function getPartResource($type, $value, $position)
    {
        $resourceName = $this->getResourcePath($type, $value);

        if (!file_exists($resourceName))
            return;


        $resource = imagecreatefromgif($resourceName);
        imageAlphaBlending($resource, false);
        $rectMask = imageColorAllocateAlpha($resource, 255, 0, 255, 127);
        imageSaveAlpha($resource, true);

        $width  = imageSX($resource);
        $height = imageSY($resource);

        $data = array(
            "resource"  => $resource,
            "lib"       => $type,
            "filename"  => $resourceName,
            "width"     => $width,
            "height"    => $height,
            "offset"    => $this->getPartResourcePosition($position, $width, $height),
            "extra"     => $this->getExtraPartResource($type, $value)
        );

        return $data;
    }

    function getExtraPartResource($type, $value)
    {
        $resourceName = $this->getResourcePath($type, "{$value}_{$value}");

        if(file_exists($resourceName))
        {
            $resource = imagecreatefromgif($resourceName);
            imageAlphaBlending($resource, false);
            $rectMask = imageColorAllocateAlpha($resource, 255, 0, 255, 127);
            imageSaveAlpha($resource, true);

            return $resource;
        }

        return false;
    }

    function getResourcePath($type, $value)
    {
        $path  = PATH_RESOURCE . $type;
        $resourceName = $path;
        $resourceName .= "/";
        $resourceName .= $value;
        $resourceName .= ".gif";

        return $resourceName;
    }

    function getPartResourcePosition($position, $width, $height)
    {
        $ret = [
            'x' => 0,
            'y' => 0
        ];

        switch ($position) {
            case 1:
                $ret["x"] = ($this->rectWidth - $width) / 2;
                break;
            case 2:
                $ret["x"] = $this->rectWidth - $width;
                break;
            case 3:
                $ret["y"] = ($this->rectHeight / 2) - ($height / 2);
                break;
            case 4:
                $ret["x"] = ($this->rectWidth - $width) / 2;
                $ret["y"] = ($this->rectHeight / 2) - ($height / 2);
                break;
            case 5:
                $ret["x"] = $this->rectWidth - $width;
                $ret["y"] = ($this->rectHeight / 2) - ($height / 2);
                break;
            case 6:
                $ret["y"] = $this->rectHeight - $width;
                break;
            case 7:
                $ret["x"] = (($this->rectWidth - $width) / 2);
                $ret["y"] = $this->rectHeight - $height;
                break;
            case 8:
                $ret["x"] = $this->rectWidth - $width;
                $ret["y"] = $this->rectHeight - $height;
                break;
        }

        return $ret;
    }

    function getPartColor($colorIndex)
    {
        if(count($this->settings['palette']) >= $colorIndex)
            return $this->settings['palette'][$colorIndex];

        return $this->settings['palette']['01'];
    }

    function setPartColor(&$resource, $colorIndex)
    {
        $color = $this->getPartColor($colorIndex);
        $replaceColor   = $this->HEX2RGB($color);
        $width          = imageSX($resource);
        $height         = imageSY($resource);
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $rgb = imageColorsForIndex($resource, imageColorAt($resource, $x, $y));
                $nr = max(round($rgb['red']     * $replaceColor[0] / 255), 0);
                $ng = max(round($rgb['green']   * $replaceColor[1] / 255), 0);
                $nb = max(round($rgb['blue']    * $replaceColor[2] / 255), 0);
                $nc = $this->createColor($resource, $nr, $ng, $nb, $rgb['alpha']);
                imageSetPixel($resource, $x, $y, $nc);
            }
        }
        return true;
    }

    function HEX2RGB($hex)
    {
        $rgb = array();
        for ($x = 0; $x < 3; $x++) {
            $rgb[$x] = hexdec(substr($hex, (2 * $x), 2));
        }
        return $rgb;
    }

    function createColor($pic, $c1, $c2, $c3, $alpha)
    {
        $color = imagecolorexactalpha($pic, $c1, $c2, $c3, $alpha);
        if ($color == -1) {
            $color = imagecolorallocatealpha($pic, $c1, $c2, $c3, $alpha);
        }
        return $color;
    }

    function getJSON($filename)
    {
        return json_decode(file_get_contents(PATH_RESOURCE . $filename), true);
    }
}
