<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerShow()
    {
        return view('pages.auth.register');
    }
    public function register(RegisterRequest $request)
    {

       dd($request->all());
    }

    public function verifyShow()
    {
        return view('pages.auth.mobile-verification');
    }
}
