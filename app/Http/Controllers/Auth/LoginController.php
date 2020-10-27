<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\user;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;



       public function showLoginForm()
    {
         $user = user::get();
        
        if (count($user)>0) {
        return view('backend/cuching_auth/login');
            
        }else{

            $user = user::create([
              'role'=>'admin',  
             'name'=>'kawsar',
             'mobile'=>'01858979247',
             'email'=>'kawsar@gmail.com',
              'password' => Hash::make('01858979247'),

            ]);

        }

    }


      public function username()
    {
        return 'mobile';
    }


       protected function loggedOut(Request $request)
    {
        return redirect('/home');
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
