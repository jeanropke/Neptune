<?php

namespace App\Classes;

/*
    PhotoRenderer by Quackster <3
    https://github.com/Quackster/PhotoRenderer
*/

class PhotoRenderer
{
    var $version    = "1.0.0 / June.18 2025";
    var $error      = null;
    var $debug      = null;
    var $pallete    = null;
    var $option     = null;

    function __construct($pallete, $option)
    {
        $this->processTime  = 0;
        $this->option       = $option;
        $this->pallete      = $pallete;
    }

    public function createImage($photoData)
    {
        $time_start = microtime(true);
        $CAST_PROPERTIES_OFFSET = 28;

        $reader = new BinaryReader($photoData, false);
        $reader->seek($CAST_PROPERTIES_OFFSET);

        $totalWidth = $reader->readInt16() & 0x7FFF;

        $top    = $reader->readInt16();
        $left   = $reader->readInt16();
        $bottom = $reader->readInt16();
        $right  = $reader->readInt16();

        $width = $right - $left;
        $height = $bottom - $top;

        $reader->skip(13);

        $bitDepth = $reader->readByte();

        if ($bitDepth != 8) {
            $this->error .= "bitDepth != 8 ($bitDepth)";
            return;
        }

        $palette = $reader->readInt32() - 1; //Make sure that this one equals -3 = Grayscale

        if ($palette != -3) {
            $this->error .= "palette != -3 ($palette)";
            return;
        }

        $reader->readInt32();
        $reader->skip(4); // Reversed, should equal BITD
        $length = $reader->readInt32();

        $position = 0;

        $data = [];

        while ($reader->hasBytesAvailable()) {
            $marker = $reader->readByte();
            if ($marker >= 128) {
                $fill = $reader->readByte();

                for ($i = 0; $i < 257 - $marker; $i++) {
                    $data[$position] = $fill;
                    $position++;
                }
            } else {
                for ($i = 0; $i < $marker + 1; $i++) {
                    $data[$position] = $reader->readByte();
                    $position++;
                }
            }
        }

        $photoImage = imageCreateTrueColor($width, $height);

        for ($y = 0; $y < $height; $y++) {
            $row = array_slice($data, $y * $totalWidth, $totalWidth);

            if (count($row) > 0) {
                for ($x = 0; $x < $width; $x++) {
                    $paletteIndex = $row[$x];

                    $rgb = $this->pallete[$paletteIndex];

                    $r = $rgb['r'];
                    $g = $rgb['g'];
                    $b = $rgb['b'];

                    $color = imagecolorallocate($photoImage, $r, $g, $b);
                    imagesetpixel($photoImage, $x, $y, $color);
                }
            }
        }

        if ($this->option == 'SEPIA') {
            $palettes = [
                0xFF681F10, 0xFF691F10, 0xFF692010, 0xFF702513, 0xFF712613, 0xFF782B16, 0xFF792C16, 0xFF803219,
                0xFF803319, 0xFF88381C, 0xFF903E1F, 0xFF984523, 0xFFA04B26, 0xFFA85229, 0xFFB0582C, 0xFFB85E2F,
                0xFFC06533, 0xFFC86B36, 0xFFD07139, 0xFFD8783C, 0xFFDF7E3F, 0xFFE07E3F, 0xFFE78543, 0xFFE88543,
                0xFFEF8B46, 0xFFF08B46, 0xFFF79049, 0xFFF89149, 0xFFFE974C, 0xFFFE9D4F, 0xFFFEA352, 0xFFFEB059,
                0xFFFEB75C, 0xFFFEDD6F, 0xFFFF984C, 0xFFFF9E4F, 0xFFFFA452, 0xFFFFAB56, 0xFFFFB159, 0xFFFFB75C,
                0xFFFFB85C, 0xFFFFBE5F, 0xFFFFC462, 0xFFFFCB66, 0xFFFFD169, 0xFFFFD76C, 0xFFFFDE6F, 0xFFFFE975,
                0xFFFFEA75
            ];

            $width = imagesx($photoImage);
            $height = imagesy($photoImage);
            $newImage = imagecreatetruecolor($width, $height);

            $gdPalette = [];
            foreach ($palettes as $color) {
                $r = ($color >> 16) & 0xFF;
                $g = ($color >> 8) & 0xFF;
                $b = $color & 0xFF;
                $gdPalette[] = imagecolorallocate($newImage, $r, $g, $b);
            }

            for ($y = 0; $y < $height; $y++) {
                for ($x = 0; $x < $width; $x++) {
                    $luminance = imagecolorat($photoImage, $x, $y) & 0xFF;
                    $index = (int) floor(($luminance / 255) * (count($gdPalette) - 1));
                    imagesetpixel($newImage, $x, $y, $gdPalette[$index]);
                }
            }

            $black = imagecolorallocate($newImage, 0, 0, 0);
            imagerectangle($newImage, 0, 0, $width - 1, $height - 1, $black);

            $photoImage = $newImage;
        }

        ob_start();
        imagePNG($photoImage);
        $resource = ob_get_contents();
        ob_end_clean();
        imageDestroy($photoImage);

        $time_end = microtime(true);
        $this->processTime += $time_end - $time_start;

        return $resource;
    }
}
