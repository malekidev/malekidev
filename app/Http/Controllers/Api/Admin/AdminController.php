<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        $loginParams = $request->validate([
            'phone' => 'required|size:11',
            'password' => 'required'
        ]);
        if (Auth::attempt($loginParams) && auth()->user()->can('access-admin')){
            return true;
        }
        return response()->json([
            'message' => __("auth.failed")
        ],401);
    }
}
