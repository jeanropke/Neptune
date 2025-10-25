<?php

namespace App\Http\Controllers;

use App\Mail\AccountListMail;
use App\Mail\ResetPasswordMail;
use App\Models\CmsUserSettings;
use App\Models\Neptune\UserSettings;
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
        // forgot my accounts page
        if ($request->ownerEmailAddress) {
            $users = User::where('email', $request->ownerEmailAddress)->select('username')->get();

            if ($users->count() == 0) {
                return redirect()->back()->with('error_owner', trans('error.auth.no_accounts')); // We couldn’t find any Habbo accounts linked to this email address.
            }

            if($this->sendAccountEmail($request->ownerEmailAddress, $users))
                return redirect()->back()->with('success_owner', trans('success.auth.reset_link')); // A list with all accounts registred in this email has been sent to your email address.

            return redirect()->back()->with('error_owner', trans('error.auth.network')); // A Network Error occurred. Please try again.
        }

        if ($request->emailAddress) {
            $user = User::where([['email', $request->emailAddress], ['username', $request->habboName]])->select(['username', 'email'])->first();
            if (!$user) {
                return redirect()->back()->with('error_email', trans('error.auth.no_account')); // We couldn’t find any Habbo account matching the username and email address you entered.
            }

            $token = Str::random(38);
            DB::table('cms_password_reset')->updateOrInsert(
                ['username'     => $user->username],
                ['token'        => $token, 'created_at'   => now()]
            );

            if($this->sendResetEmail($user, $token))
                return redirect()->back()->with('success_email', trans('success.auth.reset_link')); // A reset link has been sent to your email address.

            return redirect()->back()->with('error_email', trans('error.auth.network')); // A Network Error occurred. Please try again.
        }

        return redirect()->back();
    }

    private function sendAccountEmail($email, $users)
    {
        $data = [
            'email' => $email,
            'users' => $users
        ];
        try {
            Mail::to($email)->send(new AccountListMail($data));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function sendResetEmail($user, $token)
    {
         $data = [
            'token'     => $token,
            'user'  => $user
        ];

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($data));
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

        $secondsPassed = Carbon::now()->diffInSeconds(Carbon::parse($reset->created_at));
        if ($secondsPassed >= 7200) //2 hours check
            return redirect()->route('auth.login');

        return view('auth.forgot_password_update')->with('token', $token);
    }

    public function forgotPasswordCheck(Request $request)
    {
        $password = $request->input('password');
        $retypedPassword = $request->input('retypedPassword');
        $token = $request->input('reset_token');

        $reset = DB::table('cms_password_reset')->where('token', $token);
        if (!$reset->first())
            return redirect()->route('auth.login');

        $secondsPassed = Carbon::now()->diffInSeconds(Carbon::parse($reset->created_at));
        if ($secondsPassed >= 7200) //2 hours check
            return redirect()->route('auth.login');

        $request->validate([
            'password'          => 'required|min:8|max:30',
            'retypedPassword'   => 'required|min:8|max:30|same:password'
        ]);

        $user = User::where('username', $reset->first()->username)->first();
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index.home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $validator = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);


        if (Auth::attempt($validator)) {
            if ($request->page) {
                return redirect($request->page);
            }
            return redirect()->route('index.home');
        } else {
            return redirect()->back()->withErrors(['error' => trans('Username or password wrong')]);
        }
    }

    public function accountDisconnected()
    {
        Auth::logout();
        return view('auth.disconnected');
    }

    public function checkUsername(Request $request)
    {
        $username = $request->username;
        $message = ['status' => 'ok', 'message' => 'Your username is valid'];

        if (strlen($username) < 3) {
            $message = ['status' => 'error', 'message' => 'Your name must be at least 3 characters long'];
        } elseif (strlen($username) > 30) {
            $message = ['status' => 'error', 'message' => 'Your name is too long'];
        } elseif (User::where('username', $username)->count() > 0) {
            $message = ['status' => 'error', 'message' => 'This name is already taken'];
        } elseif (preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $username) != $username) {
            $message = ['status' => 'error', 'message' => 'Your name contains invalid characters'];
        } else {
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

        $birthday = str_pad($request->day, 2, 0, STR_PAD_LEFT) . '.' . str_pad($request->month, 2, 0, STR_PAD_LEFT)  . '.' . $request->year;
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
            'password'  => 'required|min:6|max:30'
        ]);

        if (preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $request->username) != $request->username) {
            return redirect()->back();
        } else {
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
            'email'     => 'required|email'
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
            'password'  => 'required|min:6|max:30',
            'email'     => 'required|email',
            'figure'    => 'required',
            'gender'    => 'required|in:M,F',
            'birthday'  => 'required',

        ]);

        if ($validate->fails())
            return redirect()->route('auth.login')->withErrors('Username or email already taken!');

        if (preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $request->session()->get('username')) != $request->session()->get('username')) {
            return redirect()->route('auth.login')->withErrors('Username invalid');
        } else {
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
            'created_at'    => now(),
            'updated_at'    => now(),
            'credits'       => cms_config('register.default.credits'),
            'film'          => cms_config('register.default.film'),
            'tickets'       => cms_config('register.default.tickets'),
            'motto'         => cms_config('register.default.motto') ?? '',
            'console_motto' => cms_config('register.default.console_motto') ?? ''
        ]);

        UserSettings::create([
            'user_id'   => $user->id
        ]);

        DB::table('users_ip_logs')->insert([
            'user_id'       => $user->id,
            'ip_address'    => $request->ip(),
            'created_at'    => now()
        ]);

        Auth::login($user);
    }

    public function accountActivation() {}
}
