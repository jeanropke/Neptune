<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Guild;
use App\Models\Home\Guestbook;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeRating;
use App\Models\Home\HomeSession;
use App\Models\Home\HomeSong;
use App\Models\Photo;
use App\Models\PhotoLike;
use App\Models\User;
use App\Models\UserBadge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WidgetController extends Controller
{
    public function widgetAdd(Request $request)
    {
        $widgetId = $request->widgetId;
        $widget = HomeItem::find($widgetId);
        if (!$widget)
            return 'ERROR';

        if ($widget->owner_id != user()->id)
            return 'ERROR';

        $session = HomeSession::find(user()->id);
        if (!$session)
            return 'error: placeSticker > session expired';

        $widget->update([
            'home_id'   => $session->home_id,
            'x'         => 20,
            'y'         => 30,
            'z'         => $request->zindex,
        ]);

        return response(view('home.widgets.' . $widget->getStoreItem()->class)->with(['item' => $widget, 'owner' => user(), 'isEdit' => true]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode(array('id' => $widgetId)));
    }

    public function avatarInfo(Request $request)
    {
        return view('home.widgets.ajax.avatarinfo')->with([
            'friend'    => User::find($request->anAccountId),
            'badgeslot' => UserBadge::where([['user_id', $request->anAccountId], ['slot_id', '1']])->first()
        ]);
    }

    public function friendsAdd(Request $request)
    {
        if (!Auth::check())
            return;

        $table = DB::table('messenger_requests');
        $pending = $table->where([['from_id', user()->id], ['to_id', $request->accountId]])->count();
        if ($pending > 0)
            return;

        $table->insert([
            'from_id'   => user()->id,
            'to_id'     => $request->accountId,
        ]);
    }

    public function badgePaging(Request $request)
    {
        $user = User::find($request->_mypage_requested_account);
        if (!$user) return;
        $page = $request->pageNumber;
        $badges = $user->getBadges();
        $totalPages = ceil($badges->count() / 16);

        return view('home.widgets.ajax.badgewidget')->with([
            'badges'        => $badges,
            'totalPages'    => $totalPages,
            'page'          => $page
        ]);
    }

    public function friendsPaging(Request $request)
    {
        $page = $request->pageNumber;
        $search = $request->searchString;

        $friends = User::find($request->_mypage_requested_account)->getFriends()
            ->where('users.username', 'like', '%' . $search . '%');
        $totalPages = ceil($friends->count() / 20);

        return view('home.widgets.ajax.friendswidget')->with([
            'friends'           => $friends->get(),
            'pageFriends'       => $friends->skip(($page - 1) * 20)->take(20)->get(),
            'totalPages'        => $totalPages,
            'currentFriends'    => ($page - 1) * 20 + 1,
            'toFriends'         => (($page - 1) * 20) + 1,
            'page'              => $page,
            'widgetId'          => $request->widgetId
        ]);
    }

    public function friendsAjax(Request $request)
    {
        $accountId = $request->name;
        $index = $request->index;

        $friends = User::find($accountId)->getFriends();

        return view('home.widgets.ajax.friendswidget')->with([
            'friends'   => $friends->skip(($index) * 2)->take(2)
        ]);
    }

    public function groupInfo(Request $request)
    {
        return view('home.widgets.ajax.groupinfo')->with([
            'group' => Group::find($request->groupId)
        ]);
    }

    public function guestbookAdd(Request $request)
    {
        $ownerId    = $request->ownerId;
        $widgetId   = $request->widgetId;
        $message    = $request->message;

        $guestbook = Guestbook::create([
            'user_id'   => user()->id,
            'message'   => $message,
            'widget_id' => $widgetId
        ]);

        return view('home.widgets.ajax.guestbook.add')->with([
            'message' => $guestbook
        ]);
    }

    public function guestbookPreview(Request $request)
    {
        $ownerId = $request->ownerId;
        $message = $request->message;

        return view('home.widgets.ajax.guestbook.preview')->with([
            'ownerId'   => $ownerId,
            'message'   => $message
        ]);
    }

    public function guestbookRemove(Request $request)
    {
        $guestbook = HomeItem::find($request->widgetId);
        //if guestbook does not exists, exit
        //yes, there is a delete animation, but no data is deleted
        if (!$guestbook)
            return;

        $message = Guestbook::find($request->entryId);

        //staffs with permissions can delete too
        if ($guestbook->user_id == user()->id || user()->id == $message->user_id || user()->hasPermission('cms_home_can_delete_message')) {

            if (!$message)
                return;

            //just hide the message
            $message->update(['is_deleted' => '1']);
        }
    }

    public function guestbookList(Request $request)
    {
        $ownerId        = $request->ownerId;
        $widgetId       = $request->widgetId;
        $lastEntryId    = $request->lastEntryId;

        $messages = Guestbook::where([['widget_id', '=', $widgetId], ['is_deleted', '=', '0'], ['id', '<', $lastEntryId]])->orderBy('created_at', 'desc')->take(20)->get();

        return response(view('home.widgets.ajax.guestbook.list', ['messages' => $messages, 'ownerId' => $ownerId]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode(['lastPage' => (20 > $messages->count()) ? 'true' : 'false']));
    }

    public function ratingsRate(Request $request)
    {
        $request->validate([
            'ownerId'                   => 'required|numeric',
            'givenRate'                 => 'required|numeric|max:5|min:1',
        ]);

        $rate = HomeRating::where([['user_id', user()->id], ['home_id', $request->ownerId]])->count();
        if ($rate > 0)
            return 'Already voted';

        HomeRating::create([
            'user_id'   => user()->id,
            'home_id'   => $request->ownerId,
            'rating'    => $request->givenRate
        ]);

        return view('home.widgets.ajax.rating')->with([
            'widgetId'  => $request->widgetId,
            'homeId'    => $request->ownerId,
            'userId'    => user()->id
        ]);
    }

    public function ratingsReset(Request $request)
    {
        if (user()->id != $request->ownerId)
            return;

        HomeRating::where('home_id', $request->ownerId)->delete();

        return view('home.widgets.ajax.rating')->with([
            'homeId'    => $request->ownerId,
            'widgetId'  => $request->widgetId,
            'userId'    => user()->id
        ]);
    }

    public function saveTraxSong(Request $request)
    {
        $request->validate([
            'songId'    => 'required|numeric',
            'widgetId'  => 'required|numeric'
        ]);

        $widget = HomeItem::find($request->widgetId);
        $song = HomeSong::find($request->songId);

        if ($song->user_id != user()->id)
            return 'ERROR.SONG';

        if ($widget->home_id != user()->id)
            return 'ERROR.WIDGET';

        $widget->update(['data' => $request->songId]);

        return view('home.widgets.ajax.traxplayer')->with([
            'widget'    => $widget,
            'item'      => $song
        ]);
    }

    public function getTraxSong($id)
    {
        $trax = HomeSong::find($id);
        if ($trax) {
            $song = substr($trax->data, 0, -1);
            $song = str_replace(':meta', '&meta=', $song);
            $song = str_replace(':4:', '&track4=', $song);
            $song = str_replace(':3:', '&track3=', $song);
            $song = str_replace(':2:', '&track2=', $song);
            $song = str_replace('1:', '&track1=', $song);
            $output = 'status=0&name=' . (!empty($trax->title) ? $trax->title : "Song #{$id}") . '&author=' . $trax->user_id . $song;
            echo $output;
        }
    }

    public function photoLike(Request $request)
    {
        $photo = Photo::find($request->photoId);
        if (!$photo) return 'ERROR';

        $likes = PhotoLike::where('photo_id', $photo->id)->get();

        $userLike = $likes->where('user_id', user()->id)->first();

        $data = ['likes' => $likes->count()];

        if ($userLike) {
            PhotoLike::where('photo_id', '=', $userLike->photo_id, 'and')
                ->where('user_id', '=', $userLike->user_id)->delete();

            $data = ['likes' => ($likes->count() - 1)];
        } else {
            PhotoLike::create([
                'photo_id'  => $photo->id,
                'user_id'   => user()->id,
                'liked_at'  => time()
            ]);
            $data = ['likes' => ($likes->count() + 1)];
        }
        return response('', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function widgetDelete(Request $request)
    {
        $widgetId = $request->widgetId;
        $widget = HomeItem::find($widgetId);
        if (!$widget)
            return 'ERROR';

        if ($widget->owner_id != user()->id)
            return 'ERROR';

        $widget->update([
            'home_id' => null
        ]);

        return response('SUCCESS', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($widgetId));
    }
}
