<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\UserVerifyCodeSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerShow()
    {
        return view('pages.auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
        $request->session()->regenerate();
        $user->sendVerify();
        return redirect()->route('verify-phone.show');
    }
    public function loginShow(){
        return view('pages.auth.login');
    }
    public function login(Request $request){
        $validated = $request->validate([
            'phone' => 'required|size:11',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back()->withErrors([
            'phone' => 'اطلاعات ورود صحیح نمی باشد'
        ])->onlyInput('phone');

    }
    public function verifyShow()
    {

        if (auth()->user()->isUserVerified()){
            return redirect()->back();
        }
        if ( ! auth()->user()->Code()->exists()){
           return view('pages.auth.mobile-verification-form');
        }
        return view('pages.auth.mobile-verification');
    }
    public function verify(Request $request){
        $request->validate([
            'otp' => 'required|size:5'
        ]);
        auth()->user()->verify();
        auth()->user()->Code()->delete();
        session()->flash('shouldVerify',false);
        return redirect('/');

    }
    public function sendVerify(){
        auth()->user()->sendVerify();
        return back();
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
