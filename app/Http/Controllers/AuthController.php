<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\CmsUserSettings;
use App\Models\Home\HomeData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\ValidatedInput;

class AuthController extends Controller
{
    /**
     * RESET PASSWORD SYSTEM
     */
    public function forgotPassword()
    {
        return view('auth.forgot');
    }

    public function forgotPasswordMyAccounts(Request $request)
    {
        $user = DB::table('users')->where('mail', '=', $request->ownerEmailAddress)->get();

        if (count($user) < 1) {
            return redirect()->back()->withErrors(['error' => trans('User does not exist')]);
        }

        $token = Str::random(60);
        DB::table('cms_password_reset')->updateOrInsert(
            ['email' => $request->ownerEmailAddress],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        if ($this->sendResetEmail($request->ownerEmailAddress, $token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetEmail($email, $token)
    {
        $user = DB::table('users')->where('mail', $email)->select('username', 'mail')->first();

        $data = [
            'link' => env('APP_URL') . '/account/password/reset/' . $token,
            'user' => $user
        ];

        try {
            Mail::to($email)->send(new ResetPasswordMail($data));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function forgotPasswordReset($token)
    {
        $reset = DB::table('cms_password_reset')->whereRaw("BINARY token = '$token'")->first();
        if (!$reset)
            return redirect()->route('auth.login');

        $secondsPassed = Carbon::parse()->diffInSeconds(Carbon::parse($reset->created_at));
        if ($secondsPassed >= 43200) //12 hours check
            return redirect()->route('auth.login');

        return view('auth.forgot_password_update')->with('token', $token);
    }

    public function forgotPasswordCheck(Request $request)
    {
        $password = $request->input('password');
        $retypedPassword = $request->input('retypedPassword');
        $token = $request->input('reset_token');

        $reset = DB::table('cms_password_reset')->whereRaw("BINARY token = '$token'");
        if (!$reset->first())
            return redirect()->route('auth.login');

        $request->validate([
            'password'          => 'required|min:8|max:30',
            'retypedPassword'   => 'required|min:8|max:30|same:password'
        ]);

        $user = User::where('mail', $reset->first()->email)->first();
        if (!$user)
            return redirect()->route('auth.login');

        $user->update([
            'password' => Hash::make($password)
        ]);

        $reset->delete();
        Auth::login($user);
        return redirect()->route('index.home');
    }

    /**
     * LOGIN SYSTEM
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('index.home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request) {

        $validator = $request->validate([
            'username'  => 'required',
            'password'  => 'required|min:8'
        ]);

        if (Auth::attempt($validator)) {
            return redirect()->route('index.home');
        }
        else {
            return redirect()->back()->withErrors(['error' => trans('Username or password wrong')]);
        }
    }

    public function checkUsername(Request $request)
    {
        $username = $request->username;
        $message = ['status' => 'ok', 'message' => 'Your username is valid'];

        if (strlen($username) < 3) {
            $message = ['status' => 'error', 'message' => 'Your name must be at least 3 characters long'];
        }
        elseif (strlen($username) > 30) {
            $message = ['status' => 'error', 'message' => 'Your name is too long'];
        }
        elseif (User::where('username', $username)->count() > 0) {
            $message = ['status' => 'error', 'message' => 'This name is already taken'];
        }
        elseif (preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $username) != $username) {
            $message = ['status' => 'error', 'message' => 'Your name contains invalid characters'];
        }
        else {
            $first = substr($username, 0, 4);
            if (!strnatcasecmp($first, "MOD-") || !strnatcasecmp($first, "MOD_")) {
                $data['registration_name'] = trans('register.ajax.error.6');
            }
        }

        return response('', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($message));

    }

    public function registerStart(Request $request)
    {
        $request->validate([
            'month' => 'required|numeric',
            'day'   => 'required|numeric',
            'year'  => 'required|numeric'
        ]);

        $birthday = $request->day . '-' . $request->month . '-' . $request->year;
        $request->session()->put('birthday', $birthday);
        return view('auth.register.start');
    }

    public function registerStepTwo()
    {
        return view('auth.register.step2');
    }

    public function registerStepTwoVerify(Request $request)
    {
        $request->validate([
            'figure'    => 'required',
            'gender'    => 'required|in:M,F'
        ]);

        $request->session()->put('figure', $request->figure);
        $request->session()->put('gender', $request->gender);

        return redirect('register/step/2');
    }

    public function registerStepThree()
    {
        return view('auth.register.step3');
    }

    public function registerStepThreeVerify(Request $request)
    {
        $request->validate([
            'username'  => 'required|min:3|max:30|unique:users,username',
            'password'  => 'required|min:8|max:30'
        ]);

        if (preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $request->username) != $request->username) {
            return redirect()->back();
        }
        else {
            $first = substr($request->username, 0, 4);
            if (!strnatcasecmp($first, "MOD-") || !strnatcasecmp($first, "MOD_")) {
                return redirect()->back();
            }
        }

        $request->session()->put('username', $request->username);
        $request->session()->put('password', $request->password);

        return view('auth.register.step3');
    }

    public function registerStepFour()
    {
        return view('auth.register.step4');
    }

    public function registerStepFourVerify(Request $request)
    {
        $request->validate([
            'email'     => 'required|email|unique:users,email'
        ]);

        $request->session()->put('email', $request->email);

        return view('auth.register.step4');
    }

    public function registerDone(Request $request)
    {
        $request->validate([
            'T-O-S'     => 'required'
        ]);

        //Okay, here we'll check username and email values, again
        $validate = Validator::make($request->session()->all(), [
            'username'  => 'required|min:3|max:30|unique:users,username|regex:/[a-zA-Z\d\-=\?!@:\.]/',
            'password'  => 'required|min:8|max:30',
            'email'     => 'required|email|unique:users,email',
            'figure'    => 'required',
            'gender'    => 'required|in:M,F',
            'birthday'  => 'required',

        ]);

        if ($validate->fails())
            return redirect()->route('auth.login')->withErrors('Username or email already taken!');

        if (preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $request->session()->get('username')) != $request->session()->get('username')) {
            return redirect()->route('auth.login')->withErrors('Username invalid');
        }
        else {
            $first = substr($request->session()->get('username'), 0, 4);
            if (!strnatcasecmp($first, "MOD-") || !strnatcasecmp($first, "MOD_")) {
                return redirect()->route('auth.login')->withErrors('You cannot use this username');
            }
        }
        $data = $validate->validated();
        $this->create($data, $request);

        return view('auth.register.done');
    }

    public function registerDoneRedirect()
    {
        return redirect()->route('index.home');
    }

    public function create($data, Request $request)
    {
        $user = User::create([
            'username'      => $data['username'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'figure'        => $data['figure'],
            'sex'           => $data['gender'],
            'birthday'      => $data['birthday'],
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'credits'       => cms_config('register.default.credits'),
            'film'          => cms_config('register.default.film'),
            'tickets'       => cms_config('register.default.tickets'),
            'motto'         => cms_config('register.default.motto')
        ]);

        CmsUserSettings::create([
            'user_id'   => $user->id
        ]);

        DB::table('users_ip_logs')->insert([
            'user_id'       => $user->id,
            'ip_address'    => $request->ip(),
            'created_at'    => Carbon::now()
        ]);
/*
        HomeItem::insert(['owner_id' => $user->id, 'x' => '125', 'y' => '38', 'z' => '131', 'data' => 'Remember!<br>Posting personal information about yourself or your friends, including addresses, phone numbers or email, and getting round the filter will result in your note being deleted.<br>Deleted notes will not be funded.<br><br>', 'type' => 'stickie', 'widget_type' => null, 'skin' => 'noteitskin']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '56', 'y' => '229', 'z' => '151', 'data' => 'Welcome to a brand new Habbo Home page!<br>This is the place where you can express yourself with a wild and unique variety of stickers, hoot yo <br>trap off with colourful notes and showcase your Habbo rooms! To <br>start editing just click the edit button.<br><br>', 'type' => 'stickie', 'widget_type' => null, 'skin' => 'speechbubbleskin']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '110', 'y' => '409', 'z' => '170', 'data' => 'Where are my friends?<br>To add your buddy list to your page click edit and look in your widgets inventory. After placing it on the page you can move it all over the place and even change how it looks. Go on!', 'type' => 'stickie', 'widget_type' => null, 'skin' => 'notepadskin']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '455', 'y' => '27', 'z' => '129', 'data' => null, 'type' => 'widget', 'widget_type' => 'Profile', 'skin' => 'defaultskin']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '440', 'y' => '321', 'z' => '177', 'data' => null, 'type' => 'widget', 'widget_type' => 'Rooms', 'skin' => 'defaultskin']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '383', 'y' => '491', 'z' => '179', 'data' => null, 'type' => 'widget', 'widget_type' => 'HighScores', 'skin' => 'goldenskin']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '109', 'y' => '19', 'z' => '134', 'data' => 'needle_3', 'type' => 'sticker', 'widget_type' => null, 'skin' => '']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '281', 'y' => '346', 'z' => '150', 'data' => 'sticker_spaceduck', 'type' => 'sticker', 'widget_type' => null, 'skin' => '']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '183', 'y' => '373', 'z' => '171', 'data' => 'paper_clip_1', 'type' => 'sticker', 'widget_type' => null, 'skin' => '']);
        HomeItem::insert(['owner_id' => $user->id, 'x' => '1', 'y' => '1', 'z' => '1', 'data' => 'bg_pattern_abstract2', 'type' => 'background', 'widget_type' => null, 'skin' => '']);
        */


        Auth::login($user);
    }
}
