<?php

namespace App\Http\Controllers;

use App\Classes\BinaryReader;
use App\Models\ECard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ECardController extends Controller
{
    public function gateway(Request $request)
    {
        $rawPayload = $request->getContent();
        Storage::put('amf_dump save.bin', $rawPayload);
        return $this->parse($rawPayload);
    }

    public function parse($content= null)
    {
        if(!$content) {
            return;
            $content = Storage::get('amf_dump save.bin');
        }
        $reader = new BinaryReader($content, false);

        $reader->readInt32(); // Version ??
        $credentialsLength = $reader->readInt16();
        $credentialsTag = $reader->readString($credentialsLength);

        $reader->readInt32(); // no idea - skip

        $credentialsInfoLength = $reader->readByte();
        $credentialsInfo = $reader->readString($credentialsInfoLength);

        $reader->readInt16(); // no idea - skip

        $actionLength = $reader->readInt16();
        $action = $reader->readString($actionLength);

        if ($action == 'Ecard.saveCard') {
            $unkLength = $reader->readInt16();
            $unkValue = $reader->readString($unkLength);

            $bodyLength = $reader->readInt32();
            $body = $reader->readString($bodyLength);

            return $this->save($body);
        }

        if($action == 'Ecard.loadCard')
        {
            $idLength = $reader->readInt16();
            $id = $reader->readString($idLength);
            if(Str::startsWith($id, '/'))
            {
                $id = Str::trim($id, '/');
            }

            $ecard = ECard::findOrFail($id);
            return response($ecard->body, 200)->header('Content-Type', 'application/xml');
        }
    }

    private function save($content)
    {
        $reader = new BinaryReader($content, false);

        $header = $reader->readInt32(); // 0x0000000A
        $reader->readInt16(); // no idea - skip

        $xmlLength = $reader->readInt16();
        $xml = $reader->readString($xmlLength);

        $reader->readByte(); // 0x02 - no idea - skip

        $usernameLength = $reader->readInt16();
        $username = $reader->readString($usernameLength);

        $reader->readByte(); // 0x02 - no idea - skip

        $receiverNameLength = $reader->readInt16();
        $receiverName = $reader->readString($receiverNameLength);

        $reader->readByte(); // 0x02 - no idea - skip

        $receiverEmailLength = $reader->readInt16();
        $receiverEmail = $reader->readString($receiverEmailLength);

        $reader->readByte(); // 0x02 - no idea - skip

        $senderEmailLength = $reader->readInt16();
        $senderEmail = $reader->readString($senderEmailLength);

        $reader->readInt32(); // 0x00000000 - skip
        $reader->readInt32(); // 0x00000000 - skip

        $reader->readInt16(); // 0x0002 - no idea - skip

        $websiteLength = $reader->readInt16();
        $website = $reader->readString($websiteLength);
        $reader->readByte(); // 0x02 - no idea - skip

        $reader->readInt16(); // 0x0002 - maybe lang length? - skip
        $lang = $reader->readString(2);

        $ecard = new ECard([
            'body'              => $xml,
            'username'          => $username,
            'receiver_name'     => $receiverName,
            'receiver_email'    => $receiverEmail,
            'sender_email'      => $senderEmail,
            'type'              => 0,
            'lang'              => $lang
        ]);

        $ecard->save();

        // ends with 06 06 06 06 06 06 06 06 06 06 06 06
    }
}
