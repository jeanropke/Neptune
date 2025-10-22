<?php

namespace App\Http\Controllers;

use App\Models\Group\GroupSession;
use App\Models\Home\Background;
use App\Models\Home\HomeSession;
use App\Models\Home\HomeUpdate;
use App\Models\Home\Sticker;
use App\Models\Home\StickerStore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function homeTutorial()
    {
        return view('home.tutorial')->with('latests', HomeUpdate::orderBy('updated_at', 'DESC')->limit(10)->get());
    }

    public function homeUsername($username)
    {
        $owner = User::where('username', $username)->with('homeItems')->firstOrFail();

        $session = HomeSession::where('user_id', $owner->id)->first();

        $owner->ensureHomeItems();

        if ($owner->cmsSettings && !$owner->cmsSettings->home_public)
            return view('home.private')->with(['user' => $owner]);

        return view('home')->with([
            'editing' => $owner && $session?->user_id == $owner->id,
            'owner'   => $owner
        ]);
    }

    public function homeId(Request $request)
    {
        $userinfo = User::findOrFail($request->id);

        return $this->homeUsername($userinfo->username);
    }

    public function startSession(Request $request)
    {
        if (!Auth::user()) {
            if ($request->groupId)
                return redirect("groups/{$request->groupId}/id");
            elseif ($request->homeId)
                return redirect("home/{$request->homeId}/id");
            return redirect("/");
        }

        GroupSession::where('user_id', user()->id)?->delete();

        HomeSession::create([
            'user_id'   => user()->id,
            'expire'    => time() + 3600, // 1 hour
        ]);

        //we need to create some items in case this user does not have them
        //like some widgets
        $widgets = StickerStore::where('type', '2')->get();
        foreach ($widgets as $widget) {
            $item = Sticker::where([['user_id', user()->id], ['sticker_id', $widget->id]])->first();
            if (!$item) {
                Sticker::insert(['user_id' => user()->id, 'sticker_id' => $widget->id]);
            }
        }

        return redirect()->back();
    }

    public function saveHome($userId, Request $request)
    {
        $background = $request->background;

        $this->updatePositions($request->stickienotes);
        $this->updatePositions($request->widgets);
        $this->updatePositions($request->stickers);

        $background = explode(':', $request->background);
        if (!empty($background[0])) {
            $item = Sticker::find($background[0]);
            if (!$item) return;
            if ($item->user_id != user()->id) return;
            if ($item->store->type != 4) return;

            Background::find(user()->id)->update(['background' => $item->store->data]);
        }

        HomeSession::where('user_id', user()->id)->delete();

        HomeUpdate::updateOrCreate(['user_id' => user()->id], ['updated_at' => now()]);

        echo '<script language="JavaScript" type="text/javascript">waitAndGo("../../home/' . $userId . '/id");</script>';
    }

    private function updatePositions(?string $input): void
    {
        if (empty($input)) return;

        foreach (explode('/', $input) as $raw) {
            if (empty($raw)) continue;

            $bits = explode(':', $raw);
            if (count($bits) < 2) continue;

            [$id, $data] = $bits;
            if (!is_numeric($id) || empty($data)) continue;

            $coords = explode(',', $data);
            if (count($coords) !== 3) continue;

            [$x, $y, $z] = $coords;
            if (!is_numeric($x) || !is_numeric($y) || !is_numeric($z)) continue;

            $sticker = Sticker::find($id);
            if (!$sticker || $sticker->user_id != user()->id) continue;

            $sticker->update([
                'x' => $x,
                'y' => $y,
                'z' => $z,
            ]);
        }
    }

    public function cancelHome(Request $request)
    {
        HomeSession::where('user_id', user()->id)->delete();
    }

    public function skinEdit(Request $request)
    {
        $itemId = null;
        $cssClass = null;
        $type = null;

        if ($request->stickieId) {
            $itemId = $request->stickieId;
            $cssClass =  'n_skin_';
            $type = 'stickie';
        }

        if ($request->widgetId) {
            $itemId = $request->widgetId;
            $cssClass =  'w_skin_';
            $type = 'widget';
        }

        $sticker = Sticker::find($itemId);
        if ($sticker->user_id != user()->id) return;

        $sticker->update(['skin_id' => $request->skinId]);
        header('X-JSON: {"cssClass": "' . $cssClass . $sticker->skin_name . '", "type": "' . $type . '", "id": "' . $itemId . '"}');
    }
}
