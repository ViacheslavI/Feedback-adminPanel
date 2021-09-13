<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends Controller
{
    public function index(){
        return view('index');
    }
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {

        $user = User::create([
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);

        Auth::loginUsingId($user->id);
        return redirect()
            ->route('auth.signin')
            ->with('success', 'Вы успешно зарегистрировались');
    }
    public function getSignin(){
       return view('auth.signin');
    }

    public function postSignin(Request $request){
        dd($request);
    }
    public function getSignout (){
        Auth::logout();

        return redirect()
            ->route('index');
    }
}
