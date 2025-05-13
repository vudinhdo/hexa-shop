<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Mail\SendResetCodeMail;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     *
     * Hiển thị trang đăng nhập
     * @return Factory|View
     */
    public function showPageLogin(): Factory|View
    {
        return view('pages.auth.login');

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // hoặc route bạn muốn
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }


    public function showPageRegister(): Factory|View
    {
        return view('pages.auth.register');
    }

    public function register(Request $request): Redirector|RedirectResponse
    {

        // Validate dữ liệu
        $userData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $userData['password'] = Hash::make($userData['password']);
        $verificationCode = rand(100000, 999999);
        $user = User::create($userData);

        // Đăng nhập luôn sau khi đăng ký (tùy chọn)
        auth()->login($user);

        return redirect()->route('index')->with('success', 'Đăng ký tài khoản thành công!'); // hoặc bất kỳ route nào bạn muốn chuyển hướng đến
    }

    public function showProfile()
    {
        return view('pages.auth.profile');
    }



    public function showForgotForm(): Factory|View
    {
        return view('pages.auth.forgot');
    }

    public function sendCode(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $code = rand(100000, 999999);
        $email = $request->email;

        DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            ['token' => $code, 'created_at' => Carbon::now()]
        );

        Mail::to($email)->send(new SendResetCodeMail($code));

        return redirect()->route('show.verify.code.form')->with('email', $email);
    }

    public function showVerifyCodeForm(): Factory|View
    {
        return view('pages.auth.verify');
    }

    public function verifyCode(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:6'
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->code)
            ->where('created_at', '>=', Carbon::now()->subMinutes(10))
            ->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Mã xác thực không đúng hoặc đã hết hạn']);
        }

        return redirect()->route('show.reset.password.form')->with('email', $request->email);
    }

    public function showResetPasswordForm()
    {
        return view('pages.auth.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công!');
    }


}
