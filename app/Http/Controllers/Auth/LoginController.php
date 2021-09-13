<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Composer\DependencyResolver\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        //$product = User::find(1);
       // $product->categories;

      //  $user=Auth::user()->CheckRole();
      //  dd($user);
        //dd(Auth::attempt(Request::$request->only('email', 'password')));
        if (Auth::user()->CheckRole()) {
           // dd('logincontroller');
            return route('feedbacks');
        }
        else{
            return route('user.feedback');
        }


        return redirect()
            ->route('home')
            ->with('success', 'Вы успешно авторизовались');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
