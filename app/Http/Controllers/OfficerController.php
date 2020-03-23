<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\usertable;
use App\lib\officertable;
use App\lib\Helper;
use App;

class OfficerController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $err = !isset($_GET['err']) ? "" : "Error: ". $_GET['err'];
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));
        
        $table = new officertable();
        $data = $table->getofficer();
        return View::make('officer')->with("title", "officer")->with("authlv", $authlv)->with("err", $err)->with("data", $data);
    }

    public function regis(Request $request)
    {
        $nama = htmlentities($request->name);
        $username = htmlentities($request->username);
        $email = htmlentities($request->email);
        $phonenumber = htmlentities($request->phonenumber);
        $password = htmlentities($request->password);
        $type = htmlentities($request->admintype);
        $email = $email == "" ? uniqid() : $email;
        $lang = htmlentities($request->lang);

        if(Helper::checkPassword($password))
        {
            $err = Helper::validateUserSubmit($username, $email, $phonenumber);
            if($err == "ok")
            {
                try 
                {
                    $user = User::create([
                        'name' => $nama,
                        'username' => $username,
                        'email' => $email,
                        'phonenumber' => $phonenumber,
                        'password' => Hash::make($password),
                    ]);

                    $table = new usertable();
                    $data = $table->addnewuser($nama, '', '', $user->id, null, $type, $lang);
                    return redirect()->guest('/officer');
                }
                catch (\Exception $e) 
                {
                    return redirect()->guest('/officer?err='.$err);
                    //return redirect('/regis?err=err'.$e->getMessage());
                }
            }
            else
                return redirect()->guest('/officer?err='.$err);
        }
        else
        {
            return redirect()->guest('/officer?err=wrong password type');
        }
    }


    public function delete($idobj)
    {
        $id = htmlentities($idobj);
        
        $table = new officertable();
        $data = $table->deleteofficer($id);

        return redirect()->guest('/officer');
    }

    public function edit(Request $request)
    {
        $idparam = htmlentities($request->objIDEdit);
        $nameparam = htmlentities($request->nameedit);
        $usernameparam = htmlentities($request->usernameedit);
        $emailparam = htmlentities($request->emailedit);
        $emailparam = $emailparam == "" ? uniqid() : $emailparam;
        $phonenumberparam = htmlentities($request->phonenumberedit);
        $passwordparam = htmlentities($request->passwordedit);
        $admintype = htmlentities($request->admintypeedit);
        $activeparam = htmlentities($request->activeedit);
        $activeparam = $activeparam == "on" ? 1 : 0;
        $langedit = htmlentities($request->langedit);

        if($passwordparam != null && $passwordparam != "")
        {
            if(Helper::checkPassword($passwordparam))
            {
                $table = new officertable();
                $data = $table->updateofficer($idparam, $nameparam, $usernameparam,
                    $emailparam, $phonenumberparam, 
                    $passwordparam, $admintype, $activeparam, $langedit);
            }
            else
            {
                return redirect()->guest('/officer?err=wrong password type');
            }
        }
        else
        {
            $table = new officertable();
            $data = $table->updateofficer($idparam, $nameparam, $usernameparam,
                    $emailparam, $phonenumberparam, 
                    "", $admintype, $activeparam, $langedit);
        }
        
        return redirect()->guest('/officer');
    }

    public function logout(Request $request)
    {
        //$idparam = $request->session()->get('uid');
        //$table = new officertable();
        //$data = $table->logoutofficer($idparam);

        $request->session()->flush();
        Auth::logout();

        return redirect()->guest('/');
    }

    public function resetpass(Request $request)
    {
        $id = $request->session()->get('id');
        $oldpassword = htmlentities($request->oldpassword);
        $newpassword = htmlentities($request->newpassword);
        $retypenewpassword = htmlentities($request->retypenewpassword);

        $data = Auth::attempt(["email" => Auth::user()->email, 'password' => $oldpassword]);
        $table = new usertable();
        if ($data && Auth::check())
        {
            $table = new officertable();
            $data = $table->updateuserspassword($id, $retypenewpassword);
            $request->session()->flush();
            Auth::logout();
            return redirect()->guest('/index');
        }
        else
        {
            return redirect()->guest('/index?err=pass');
        }
    }
}
