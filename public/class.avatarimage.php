<?php
/*
    Credits:
        Avatar generator by Tsuka
        Figure formatting by m.tiago & Webbanditten
*/

define("PATH_RESOURCE",    dirname(__FILE__) . "/imager/");

class AvatarImage
{
    var $version        = "1.0.0 / March.19 2025";
    var $error          = null;
    var $debug          = null;
    var $settings       = null;

    var $format         = "png";
    var $figure         = array();
    var $direction      = 0;
    var $headDirection  = 0;
    var $action         = array("std"); //std, sit, lay, wlk, wav, sit-wav, swm
    var $gesture        = "std";        //std, agr, sml, sad, srp, spk, eyb
    var $frame          = array(0);
    var $isLarge        = false;
    var $isSmall        = false;
    var $isHeadOnly     = false;
    var $rectWidth      = 64;
    var $rectHeight     = 110;

    var $handItem       = false;
    var $drawAction     = array(
        "body"      => "std",
        "wlk"       => false,
        "sit"       => false,
        "gesture"   => false,
        "eye"       => false,
        "speak"     => false,
        "itemRight" => false,
        "handRight" => false,
        "handLeft"  => false,
        "swm"       => false
    );
    var $drawOrder      = "std";

    function __construct($figure, $direction, $headDirection, $action, $gesture, $frame, $isHeadOnly, $scale)
    {
        $time_start = microtime(true);
        $this->settings = array(
            "figuredata"        => $this->getJSON("./imager/figuredata.json"),
            "hh_people"         => $this->getJSON("./imager/hh_people/regpoints.json"),
            "hh_people_small"   => $this->getJSON("./imager/hh_people_small/regpoints.json"),
            "partsets"          => $this->getJSON("./imager/partsets.json"),
            "draworder"         => $this->getJSON("./imager/draworder.json"),
            "offset"            => array()
        );

        $this->direction = $this->validateDirection($direction) ? $direction : 0;
        $this->headDirection = $this->validateDirection($headDirection) ? $headDirection : 0;

        switch ($scale) {
            case "l":
                $this->isLarge = true;
                break;
            case "s":
                $this->isSmall = true;
                $this->rectWidth = 32;
                $this->rectHeight = 55;
                break;
            case "n":
            default:
                break;
        }
        if ($isHeadOnly) {
            $this->isHeadOnly = true;
        }

        if (!empty($figure)) {

            if (strlen($figure) != 25) {
                $time_end = microtime(true);
                $this->processTime = $time_end - $time_start;
                return false;
            }

            $start = 0;
            $parts = array();
            $increase_start = array(0, 5, 10, 15, 20);

            for ($x = 0; $x < 10; $x++) {
                $length = (in_array($start, $increase_start)) ? 3 : 2;
                $parts[$x] = substr($figure, $start, $length);
                $start = $start + $length;
            }

            $parts[1] = (int) ltrim($parts[1], "0");
            $parts[3] = (int) ltrim($parts[3], "0");
            $parts[5] = (int) ltrim($parts[5], "0");
            $parts[7] = (int) ltrim($parts[7], "0");
            $parts[9] = (int) ltrim($parts[9], "0");

            foreach ($parts as $key => $value) {
                if (($key % 2) == 1) continue;
                $data = $this->getSpriteData($value, $parts[$key + 1]);
                array_push($this->figure, array("type" => $data['type'], "id" => $value, "color" => $data['color'], "data" => $data));
            }

            $frame = is_array($frame) ? $frame : array($frame);
            foreach ($frame as $value) {
                $_frame = explode("=", $value);
                $_action = $_frame[0] != "" ? $_frame[0] : "def";
                @$this->frame[$_action] = (int)$_frame[1];
            }


            if ($direction % 2 == 1 && in_array('sit', $action)) {
                $action = array_diff($action, ['sit']);
            }
            if ($this->isSmall) {
                $gesture = 'std';
            }
            $this->debug .= json_encode($action);

            $this->gesture = $gesture;
            switch ($this->gesture) {
                case "spk":
                    $this->drawAction['speak']      = $this->gesture;
                    break;
                case "eyb":
                    $this->drawAction['eye']        = $this->gesture;
                    break;
                case "":
                    $this->drawAction['gesture']    = "std";
                    break;
                default:
                    $this->drawAction['gesture']    = $this->gesture;
                    break;
            }

            $this->action = is_array($action) ? $action : array($action);

            foreach ($this->action as $value) {
                $_action = explode("=", $value);
                $this->debug .= json_encode($this->action);
                switch ($_action[0]) {
                    case "wlk":
                    case "sit":
                        $this->drawAction[$_action[0]]  = $_action[0];
                        break;
                    case "lay":
                        $this->drawAction['body']                   = $_action[0];
                        $this->drawAction['eye']                    = $_action[0];
                        list($this->rectWidth, $this->rectHeight)   = array($this->rectHeight, $this->rectWidth);
                        switch ($this->gesture) {
                            case "spk":
                                $this->drawAction['speak']          = "lsp";
                                $this->frame['lsp']                 = $this->frame[$this->gesture];
                                break;
                            case "eyb":
                                $this->drawAction['eye']            = "ley";
                                break;
                            case "std":
                                $this->drawAction['gesture']        = $_action[0];
                                break;
                            default:
                                $this->drawAction['gesture']        = "l" . substr($this->gesture, 0, 2);
                                break;
                        }
                        break;
                    case "wav":
                        $this->drawAction['handLeft']               = $_action[0];
                        break;
                    case "crr":
                    case "drk":
                        $this->drawAction['handRight']              = $_action[0];
                        $this->drawAction['itemRight']              = $_action[0];
                        $this->handItem                             = (int)$_action[1];
                        break;
                    case "swm":
                        $this->drawAction[$_action[0]]              = $_action[0];
                        if ($this->gesture == "spk") {
                            $this->drawAction['speak']              = "sws";
                        }
                        break;
                    case "":
                        $this->drawAction['body']                   = "std";
                        break;
                    default:
                        $this->drawAction['body']                   = $_action[0];
                        break;
                }
            }
            $this->debug .=  "HL: {$this->drawAction['handLeft']} / HR: {$this->drawAction['handRight']} / D: " . $this->direction;
            if ($this->drawAction['sit'] == "sit") {
                if ($this->direction >= 2 && $this->direction <= 4) {
                    $this->drawOrder = "sit";
                    if ($this->drawAction['handRight'] == "drk"  && $this->direction >= 2 && $this->direction <= 3) {
                        $this->drawOrder .= ".rh-up";
                    } elseif ($this->drawAction['handLeft'] && $this->direction == 4) {
                        $this->drawOrder .= ".lh-up";
                    }
                } elseif($this->drawAction['handLeft'] && $this->direction >= 4 && $this->direction <= 6) {
                    $this->drawOrder = "lh-up";
                }
            } elseif ($this->drawAction['body'] == "lay") {
                $this->drawOrder = "lay";
            } elseif ($this->drawAction['handRight'] == "drk"  && $this->direction >= 0 && $this->direction <= 3) {
                $this->drawOrder = "rh-up";
            } elseif ($this->drawAction['handLeft'] && $this->direction >= 4 && $this->direction <= 6) {
                $this->drawOrder = "lh-up";
            }
        } else {
            $this->action = $action;
        }
        $time_end = microtime(true);
        $this->processTime = $time_end - $time_start;

        return true;
    }

    function getJSON($filename)
    {
        return json_decode(file_get_contents($filename), true);
    }

    function HEX2RGB($hex)
    {
        $rgb = array();
        for ($x = 0; $x < 3; $x++) {
            $rgb[$x] = hexdec(substr($hex, (2 * $x), 2));
        }
        return $rgb;
    }

    function validateDirection($direction)
    {
        return (is_numeric($direction) && $direction >= 0 && $direction <= 7);
    }

    function Generate($format = "png")
    {
        $time_start = microtime(true);

        $avatarImage = imageCreateTrueColor($this->rectWidth, $this->rectHeight);
        imageAlphaBlending($avatarImage, false);
        imageSaveAlpha($avatarImage, true);
        $rectMask = imageColorAllocateAlpha($avatarImage, 255, 0, 255, 127);
        imageFill($avatarImage, 0, 0, $rectMask);

        $activeParts['rect']        = $this->getActivePartSet($this->isHeadOnly ? "head" : "figure", true);
        $activeParts['head']        = $this->getActivePartSet("head");
        $activeParts['eye']         = $this->getActivePartSet("eye");
        $activeParts['gesture']     = $this->getActivePartSet("gesture");
        $activeParts['speak']       = $this->getActivePartSet("speak");
        $activeParts['walk']        = $this->getActivePartSet("walk");
        $activeParts['sit']         = $this->getActivePartSet("sit");
        $activeParts['itemRight']   = $this->getActivePartSet("itemRight");
        $activeParts['handRight']   = $this->getActivePartSet("handRight");
        $activeParts['handLeft']    = $this->getActivePartSet("handLeft");
        $activeParts['swim']        = $this->getActivePartSet("swim");

        $this->debug .= " DRAWORDER: {$this->drawOrder}-{$this->direction} ";

        $drawParts = $this->getDrawOrder($this->drawOrder, $this->direction);
        if ($drawParts === false) {
            $drawParts = $this->getDrawOrder("std", $this->direction);
        }

        $setParts = array();
        foreach ($this->figure as $partSet) {
            $setParts = array_merge($setParts, $this->getPartColor($partSet['data']));
        }
        if ($this->handItem !== false) {
            $setParts["ri"] = array("id" => $this->handItem, 'colorable' => false);
        }

        imageAlphaBlending($avatarImage, true);

        $drawCount = 0;
        foreach ($drawParts as $id => $type) {
            if (isset($setParts[$type]))
                $drawPart = $setParts[$type];
            else
                continue;

            if (!is_array($drawPart)) {
                continue;
            }
            //if ($this->getPartUniqueName($type, $drawPart['id']) == '') {
            //    continue;
            //}
            if ($this->isHeadOnly && !$activeParts['rect'][$type]['active']) {
                continue;
            }

            if($this->isSmall && $type == 'hd') {
                $drawPart['id'] = 1;
            }

            $drawDirection  = $this->direction;
            $drawAction     = false;
            if (@$activeParts['rect'][$type]['active']) {
                $drawAction        = $this->drawAction['body'];
            }
            if (@$activeParts['head'][$type]['active']) {
                $drawDirection    = $this->headDirection;
            }
            if (@$activeParts['speak'][$type]['active'] && $this->drawAction['speak']) {
                $drawAction        = $this->drawAction[speak];
            }
            if (@$activeParts['gesture'][$type]['active'] && $this->drawAction['gesture']) {
                $drawAction        = $this->drawAction['gesture'];
            }
            if (@$activeParts['eye'][$type]['active']) {
                $drawPart['colorable'] = false;
                if ($this->drawAction['eye']) {
                    $drawAction    = $this->drawAction['eye'];
                }
            }
            if (@$activeParts['walk'][$type]['active'] && $this->drawAction['wlk']) {
                $drawAction        = $this->drawAction['wlk'];
            }
            if (@$activeParts['sit'][$type]['active'] && $this->drawAction['sit']) {
                $drawAction        = $this->drawAction['sit'];
            }
            if (@$activeParts['handRight'][$type]['active'] && $this->drawAction['handRight']) {
                $drawAction        = $this->drawAction['handRight'];
            }
            if (@$activeParts['itemRight'][$type]['active'] && $this->drawAction['itemRight']) {
                $drawAction        = $this->drawAction['itemRight'];
            }
            if (@$activeParts['handLeft'][$type]['active'] && $this->drawAction['handLeft']) {
                $drawAction        = $this->drawAction['handLeft'];
            }
            if (@$activeParts['swim'][$type]['active'] && $this->drawAction['swm']) {
                $drawAction        = $this->drawAction['swm'];
            }

            if (!$drawAction) {
                continue;
            }

            $drawPartRect = $this->getPartResource(
                $drawAction,
                $type,
                $drawPart['id'],
                $drawDirection
            );

            $drawCount++;

            if ($drawPartRect === false) {
                $this->debug .= "PART[" . $drawAction . "][" . $type . "][" . $drawPart['id'] . "][" . $drawDirection . "][" . $this->getFrameNumber($type, $drawAction, @(int)$this->frame[$drawAction]) . "]/";
                continue;
            } else {
                $this->debug .= $drawPartRect['name'] . "(" . $drawPartRect['width'] . "x" . $drawPartRect['height'] . ":" . $drawPartRect['offset']['x'] . "," . $drawPartRect['offset']['y'] . ")/";
            }

            $drawPartRectTransparentColor = imageColorTransparent($drawPartRect['resource']);
            if ($drawPart['colorable']) {
                $this->setPartColor($drawPartRect['resource'], $drawPart['color']);
            }

            $_posX = -$drawPartRect['offset']['x'] + ($this->drawAction['body'] == "lay" ? ($this->rectWidth / 2) : 0);
            $_posY = ($this->rectHeight / 2) - $drawPartRect['offset']['y'] + ($this->drawAction['body'] == "lay" ? ($this->rectHeight / 3.5) : ($this->rectHeight / 2.5));
            if ($drawPartRect['isFlip']) $_posX = - ($_posX + $drawPartRect['width'] - ($this->rectWidth + 1));
            imageCopy($avatarImage, $drawPartRect['resource'], $_posX - 1, $_posY - 1, 0, 0, $drawPartRect['width'], $drawPartRect['height']);

            imageDestroy($drawPartRect['resource']);
        }

        $this->debug .= "DRAWCOUNT: " . $drawCount;

        if ($this->isLarge) {
            $temp = imageCreateTrueColor($this->rectWidth * 2, $this->rectHeight * 2);
            imageAlphaBlending($temp, false);
            $rectMask = imageColorAllocateAlpha($temp, 255, 0, 255, 127);
            imageSaveAlpha($temp, true);
            $x = ImageCopyResized($temp, $avatarImage, 0, 0, 0, 0, $this->rectWidth * 2, $this->rectHeight * 2, $this->rectWidth, $this->rectHeight);
            if ($x) {
                $avatarImage = $temp;
            }
        }

        ob_start();
        if ($format == "gif") {
            $this->format = "gif";
            $rectMask = imageColorAllocateAlpha($avatarImage, 255, 0, 255, 127);
            imageColorTransparent($avatarImage, $rectMask);
            imageGIF($avatarImage);
        } elseif ($format == "png") {
            $this->format = "png";
            imagePNG($avatarImage);
        } else {
            ob_end_clean();
            exit;
        }
        $resource = ob_get_contents();
        ob_end_clean();
        imageDestroy($avatarImage);

        $time_end = microtime(true);
        $this->processTime += $time_end - $time_start;

        return $resource;
    }

    function setPartColor(&$resource, $color)
    {
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

    function getPartColor($data)
    {
        $ret = array();
        $partSet = $data['part'];
        $cnt = array();
        foreach ($partSet[0] as $type => $part) {
            $ret[$type] = array(
                'id'        => $part,
                'colorable' => $type != 'ey',
                'color'     => $data['color']
            );
        }
        return $ret;
    }

    function getActivePartSet($partSet, $addAttr = false)
    {
        $ret = array();

        $activeParts = $this->settings['partsets']['activePartSet'][$partSet]['activePart'];
        if (count($activeParts) == 0) return false;
        $partSetData = $this->settings['partsets']['partSet'];
        foreach ($activeParts as $key => $type) {
            $ret[$type]['active'] = true;
            //if ($addAttr) {
            //    $partData = $partSetData[$type];
            //    $ret[$setType]['remove'] = $partData['remove-set-type'];
            //    $ret[$setType]['flip'] = $partData['flipped-set-type'];
            //    $ret[$setType]['swim'] = $partData['swim'];
            //}
        }
        return $ret;
    }

    function getDrawOrder($action, $direction)
    {
        $drawOrder = $this->settings["draworder"][$action][$direction];
        if (count($drawOrder) == 0) return false;
        return $drawOrder;
    }

    function getFrameNumber($type, $action, $frame)
    {
        //TODO
        /*
		$frameSet = $this->settings['animation']['action'];
		if($this->getKeyByAttr($frameSet, "id", $action) == -1) return 0;
		$frameSet = $frameSet[$this->getKeyByAttr($frameSet, "id", $action)];
		if(count($frameSet) == 0) return 0;
		$frameSet = $frameSet['part'][$this->getKeyByAttr($frameSet['part'], "set-type", $type)];
		if(count($frameSet) == 0) return 0;
		$data = $this->getAttr($frameSet['frame'][$frame], "number");
		return $data !== false ? $data : 0;
		*/
        return 0;
    }
    function getPartResourcePosition($folder, $resourceName, $width = 0)
    {
        $ret = array();
        if (isset($this->settings[$folder][$resourceName]))
            $ret = $this->settings[$folder][$resourceName];
        else {
            $direction = 6 - (int)substr($resourceName, -3, 1);
            $ret = $this->settings[$folder][$resourceName][substr_replace($resourceName, $direction, -3, 1)];
            $ret['x'] = 0 - ($this->rectWidth + $ret['x']) + $width;
        }
        return $ret;
    }
    function buildResourceName($action, $type, $partId, $direction, $frame, $path = false)
    {
        $resourceName = "";
        if ($path) {
            $resourceName .= $path;
            $resourceName .= "/";
        }
        $resourceName .= $this->isSmall ? "sh" : "h";
        $resourceName .= "_";
        $resourceName .= $action;
        $resourceName .= "_";
        $resourceName .= $type;
        $resourceName .= "_";
        $resourceName .= str_pad($partId, 3, "0", STR_PAD_LEFT);
        $resourceName .= "_";
        $resourceName .= $direction;
        $resourceName .= "_";
        $resourceName .= $action == 'wav' ? 0 : $frame;

        if ($path) {
            $resourceName .= ".png";
        }

        return $resourceName;
    }
    function getPartResource($action, $type, $partId, $direction)
    {

        $frame = $this->getFrameNumber($type, $action, @(int)$this->frame[$action]);
        $isFlip = false;

        if ($direction == 6 && $action == 'wav')
            $direction = 2;
        $resDirection = $direction;

        $path  = PATH_RESOURCE . ($this->isSmall ? 'hh_people_small' : 'hh_people') . "/";
        $resourceName = $path;
        $resourceName .= $this->buildResourceName($action, $type, $partId, $resDirection, $frame);
        $resourceName .= ".png";


        if (!file_exists($resourceName) && $action == "std")
            $resourceName = $this->buildResourceName("spk", $type, $partId, $resDirection, $frame);


        //echo $resourceName . '<br>';
        //if (!file_exists($resourceName)) {
        //    $isFlip = true;
        //    $direction = 6 - $direction;
        //
        //    $resourceName  = PATH_RESOURCE . ($this->isSmall ? 'hh_people_small' : 'hh_people') . "/";
        //    $resourceName .= $this->buildResourceName($action, $type, $partId, $direction, $frame);
        //    $resourceName .= ".png";
        //}

        if (!file_exists($resourceName)) {
            if ($direction > 3 && $direction <= 7) {
                $isFlip = false;
                $flippedType = $this->settings['partsets']['partSet'][$type]['flipped-set-type'];
                if ($flippedType != "")
                    $resourceName = $this->buildResourceName($action, $flippedType, $partId, $resDirection, $frame, $path);

                if (!file_exists($resourceName) && $action == "std")
                    $resourceName = $this->buildResourceName("spk", $flippedType, $partId, $resDirection, $frame, $path);

                if (!file_exists($resourceName)) {

                    $isFlip = true;
                    $direction = 6 - $direction;
                    $resourceName = $this->buildResourceName($action, $type, $partId, $direction, $frame, $path);
                }

                if (!file_exists($resourceName))
                    $resourceName = $this->buildResourceName($action, $flippedType, $partId, $direction, $frame, $path);

                if (!file_exists($resourceName) && $action == "std")
                    $resourceName = $this->buildResourceName("spk", $type, $partId, $direction, $frame, $path);

                if (!file_exists($resourceName)) return false;
            } else return false;
        }

        $resource = imageCreateFromPNG($resourceName);
        imageAlphaBlending($resource, false);
        $rectMask = imageColorAllocateAlpha($resource, 255, 0, 255, 127);
        imageSaveAlpha($resource, true);

        $this->setResample($resource, $isFlip);

        $resourceBaseName = $this->buildResourceName($action, $type, $partId, $direction, $frame);
        $data = array(
            "resource"  => $resource,
            "lib"       => $this->isSmall ? 'hh_people_small' : 'hh_people',
            "name"      => $resourceBaseName,
            "filename"  => $resourceName,
            "isFlip"    => $isFlip,
            "width"     => imageSX($resource),
            "height"    => imageSY($resource),
            "offset"    => $this->getPartResourcePosition($this->isSmall ? 'hh_people_small' : 'hh_people', $resourceBaseName, imageSX($resource))
        );

        return $data;
    }
    function setResample(&$resource, $isFlip)
    {
        $width    = imagesx($resource);
        $height    = imagesy($resource);
        $temp = imageCreateTrueColor($width, $height);
        imageAlphaBlending($temp, false);
        $rectMask = imageColorAllocateAlpha($temp, 255, 0, 255, 127);
        imageSaveAlpha($temp, true);
        $x = imageCopyResampled($temp, $resource, 0, 0, ($isFlip ? ($width - 1) : 0), 0, $width, $height, ($isFlip ? (0 - $width) : $width), $height);
        if ($x) {
            $resource = $temp;
        }
        return true;
    }

    function createColor($pic, $c1, $c2, $c3, $alpha)
    {
        $color = imagecolorexactalpha($pic, $c1, $c2, $c3, $alpha);
        if ($color == -1) {
            $color = imagecolorallocatealpha($pic, $c1, $c2, $c3, $alpha);
        }
        return $color;
    }

    function getSpriteData($sprite, $color)
    {
        $ret = array();
        foreach ($this->settings['figuredata']['colors'] as $genderIndex => $gender) {
            foreach ($gender as $parts) {
                foreach ($parts as $_part => $partDefinition) {
                    foreach ($partDefinition as $definitionsArray) {
                        foreach ($definitionsArray as $sprites) {
                            if ($sprites['s'] == $sprite) {
                                $ret['color'] = $sprites['c'][$color - 1];
                                $ret['type']  = $_part;
                                $ret['part']  = $sprites['p'];
                                return $ret;
                            }
                        }
                    }
                }
            }
        }
    }
}
