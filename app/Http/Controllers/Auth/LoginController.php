<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\lib\usertable;
use Auth;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
    * The user has been authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  mixed  $user
    * @return mixed
    */
    protected function authenticated(Request $request, $user)
    {
        $session_id = $request->session()->get('sid');
        $table = new usertable();
        $data = $table->getactivemsuser($user["id"])[0];
        if($data->err == "ok")
        {
            $request->session()->put('id', $user["id"]);
            $request->session()->put('uid', $data->idmsuser);
            $request->session()->put('sid', $data->idmssupplier);
            $request->session()->put('lang', $data->lang);
            $request->session()->put('admintype', $data->idltusertype);
        }
        else
        {
            $request->session()->flush();
            Auth::logout();
            //return redirect('/?err=bann');
            throw ValidationException::withMessages([
                $this->username() => ["You've been banned"],
            ]);
        }
    }
}
