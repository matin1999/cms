<?php

namespace App\Http\Controllers;

use App\Http\Requests\mobileverify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user=User::create($request->validated());

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->get('password'),]))
            return redirect()->route('tasks.index');
        else
            return redirect()->back();
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function mobile(Request $request)
    {
        if (User::where('mobile', '=', $request->get('mobile'))->exists()){
            return view('auth.pass')->with('mobile',$request->get('mobile'));
        }

        else {
            $mobile=$request->get('mobile');
            $code=rand(10000,1000000);
            Log::info("$request->mobile :$code");
            Cache::put($mobile,$code,120);
            return view('auth.validate')->with('mobile', $request->get('mobile'));
        }
    }

    public function addpass(mobileverify $request)
    {
        return view('auth.pass');
    }
    public function verifyPass(Request $request)
    {
        $user=User::where('mobile', '=', $request->get('mobile'))->first();
        if (Hash::check($request->get('password'), $user->getAuthPassword())) {
            Auth::login($user);
            return redirect()->route('posts.index')->with('error', 'login');
        }
        else
            return back()->with('error','incorrect');
    }

    public function verifyCode(Request $request)
    {
        $cach=Cache::get($request->get('mobile'));
        if ($cach!= null && $cach==$request->get('code')) {
            return response('okkkkkkkkkkkkkkk');
        }
        else
            return response('not okkkkkkkkkk');
    }

    public function logout()
    {
        if
        (auth()->check());
        auth()->logout();

        return redirect()->route('login');
    }
}
