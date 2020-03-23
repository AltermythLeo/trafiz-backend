<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\suppliertable;
use App\lib\Helper;
use App;


class SupplierController extends BaseController
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

        $table = new suppliertable();
        $data = $table->getsupplier();
        return View::make('supplier')
            ->with("title", "Supplier")
            ->with("authlv", $authlv)
            ->with("err", $err)
            ->with("data", $data);
    }

    public function regisSupplier(Request $request)
    {
        $nama = htmlentities($request->name);
        $username = htmlentities($request->username);
        $email = htmlentities($request->email);
        $phonenumber = htmlentities($request->phonenumber);
        $password = htmlentities($request->password);
        //$type = htmlentities($request->admintype);
        $natidtype = htmlentities($request->natidtype);
        $lang = htmlentities($request->lang);
        $supid = htmlentities($request->supid);

        $genre = htmlentities($request->genre);
        $address = htmlentities($request->address);
        $province = htmlentities($request->province);
        $city = htmlentities($request->city);
        $district = htmlentities($request->district);
        $businesslicense = htmlentities($request->businesslicense);
        $natcode = htmlentities($request->natcode);
        $supidexpireddate = htmlentities($request->supidexpireddate);
        
        $email = $email == "" ? uniqid() : $email;
        if(Helper::checkPassword($password))
        {
            $err = Helper::validateUserSubmit($username, $email, $phonenumber);
            if($err == "ok")
            {
                $user = User::create([
                    'name' => $nama,
                    'username' => $username,
                    'email' => $email,
                    'phonenumber' => $phonenumber,
                    'password' => Hash::make($password),
                ]);

                $table = new suppliertable();

                $data = $table->addnewsupplier($user->id, $nama, 1, $lang, 1, 
                                                $natidtype, $supid, $genre, $address, $province, $city, 
                                                $district, $businesslicense, $natcode, $supidexpireddate);
                return redirect()->guest('/supplier');
            }
            else
                return redirect()->guest('/supplier?err='.$err);
        }
        else
        {
            return redirect()->guest('/supplier?err=wrong password type');
        }
    }


    public function delete($idobj)
    {
        $id = htmlentities($idobj);
        
        $table = new suppliertable();
        $data = $table->deletesupplier($id);

        return redirect()->guest('/supplier');
    }

    public function editSupplier(Request $request)
    {
        $authlv = $request->session()->get('admintype');

        $idparam = htmlentities($request->objIDEdit);
        $nameparam = htmlentities($request->nameedit);
        $usernameparam = htmlentities($request->usernameedit);
        $emailparam = htmlentities($request->emailedit);
        $emailparam = $emailparam == "" ? uniqid() : $emailparam;
        $phonenumberparam = htmlentities($request->phonenumberedit);
        $passwordparam = htmlentities($request->passwordedit);
        //$admintype = htmlentities($request->admintypeedit);
        $activeparam = htmlentities($request->activeedit);
        $activeparam = $activeparam == "on" ? 1 : 0;
        $natidtypeedit = htmlentities($request->natidtypeedit);
        $langedit = htmlentities($request->langedit);
        $supidedit = htmlentities($request->supidedit);

        $genre = htmlentities($request->genreedit);
        $address = htmlentities($request->addressedit);
        $province = htmlentities($request->provinceedit);
        $city = htmlentities($request->cityedit);
        $district = htmlentities($request->districtedit);
        $businesslicense = htmlentities($request->businesslicenseedit);
        $natcode = htmlentities($request->natcodeedit);
        $supidexpireddate = htmlentities($request->supidexpireddateedit);

        if($passwordparam != null && $passwordparam != "")
        {
            if(Helper::checkPassword($passwordparam))
            {
                $table = new suppliertable();
                $data = $table->updatesupplier($idparam, $nameparam, $usernameparam, 
                    $emailparam, $phonenumberparam, $passwordparam, 1, 
                    $langedit, $activeparam, $natidtypeedit, 
                    $supidedit, $genre, $address, $province, 
                    $city, $district, $businesslicense, $natcode,
                    $supidexpireddate);
            }
            else
            {
                if($authlv < 0)
                    return redirect()->guest('/supplier?err=wrong password type');
                else
                    return redirect()->guest('/supplier/indexedit?err=wrong password type');
            }
        }
        else
        {
            $table = new suppliertable();
            $data = $table->updatesupplier($idparam, $nameparam, $usernameparam, 
                $emailparam, $phonenumberparam, "", 1, 
                $langedit, $activeparam, $natidtypeedit, 
                $supidedit, $genre, $address, $province, 
                $city, $district, $businesslicense, $natcode,
                $supidexpireddate);
        }
        
        if($authlv < 0)
            return redirect()->guest('/supplier');
        else
            return redirect()->guest('/supplier/indexedit');
        //return redirect()->guest('/supplier');
    }

    public function indexsupplierofficer(Request $request)
    {
        $err = !isset($_GET['err']) ? "" : "Error: ". $_GET['err'];
        $authlv = $request->session()->get('admintype');
        $uid = $request->session()->get('uid');
        App::setlocale($request->session()->get('lang'));

        $table = new suppliertable();

        if($authlv == 1)
        {
            $sid = $request->session()->get('sid');
            $data = $table->getsupplierofficerbyidmssupplier($sid);
            $obj = "[{
                \"idmssupplier\": \"".$sid."\",
                \"name\": \"".Auth::user()->name."\"
            }]";
            $objTest = json_decode($obj);
            $dataSupplier = $objTest;
        }
        else if($authlv < 1)
        {
            $dataSupplier = $table->getsupplier();
            $data = $table->getsupplierofficer();
        }

        return View::make('supplierofficer')->with("title", "Supplier Officer")->with("authlv", $authlv)->with("err", $err)->with("dataSupplier", $dataSupplier)->with("data", $data);
    }

    public function regisSupplierOfficer(Request $request)
    {
        $nama = htmlentities($request->name);
        $username = htmlentities($request->username);
        $email = htmlentities($request->email);
        $phonenumber = htmlentities($request->phonenumber);
        $password = htmlentities($request->password);
        $idsupplier = htmlentities($request->supplier);
        $natidtype = htmlentities($request->natidtype);
        $lang = htmlentities($request->lang);
        //$access = htmlentities(implode(";", $request->access));
        $access = "";
        $accessrole = htmlentities($request->accessrole);

        
        $email = $email == "" ? uniqid() : $email;
        if(Helper::checkPassword($password))
        {
            $err = Helper::validateUserSubmit($username, $email, $phonenumber);
            if($err == "ok")
            {
                $user = User::create([
                    'name' => $nama,
                    'username' => $username,
                    'email' => $email,
                    'phonenumber' => $phonenumber,
                    'password' => Hash::make($password),
                ]);

                $table = new suppliertable();
                $data = $table->addnewsupplierofficer($idsupplier, $nama, "", "", $user->id, null, 2, $lang, $access, $accessrole);
                return redirect()->guest('/supplier/officer');
            }
            else
                return redirect()->guest('/supplier/officer?err='.$err);
        }
        else
        {
            return redirect()->guest('/supplier/officer?err=wrong password type');
        }
    }

    public function editSupplierofficer(Request $request)
    {
        $idparam = htmlentities($request->objIDEdit);
        $nameparam = htmlentities($request->nameedit);
        $usernameparam = htmlentities($request->usernameedit);
        $emailparam = htmlentities($request->emailedit);
        $emailparam = $emailparam == "" ? uniqid() : $emailparam;
        $phonenumberparam = htmlentities($request->phonenumberedit);
        $passwordparam = htmlentities($request->passwordedit);
        //$admintype = htmlentities($request->admintypeedit);
        $activeparam = htmlentities($request->activeedit);
        $activeparam = $activeparam == "on" ? 1 : 0;
        $supplieredit = htmlentities($request->supplieredit);
        $langedit = htmlentities($request->langedit);
        //$accessedit = htmlentities(implode(";", $request->accessedit));
        $accessedit = "";
        $accessroleedit = htmlentities($request->accessroleedit);

        if($passwordparam != null && $passwordparam != "")
        {
            if(Helper::checkPassword($passwordparam))
            {
                $table = new suppliertable();
                $data = $table->updatesupplierofficer($supplieredit, $idparam, $nameparam, $usernameparam,
                    $emailparam, $phonenumberparam, 
                    $passwordparam, 2, $activeparam, $langedit, $accessedit, $accessroleedit);
            }
            else
            {
                return redirect()->guest('/supplier/officer?err=wrong password type');
            }
        }
        else
        {
            $table = new suppliertable();
            $data = $table->updatesupplierofficer($supplieredit, $idparam, $nameparam, $usernameparam,
                    $emailparam, $phonenumberparam, 
                    "", 2, $activeparam, $langedit, $accessedit, $accessroleedit);
        }
        
        return redirect()->guest('/supplier/officer');
    }

    public function deletesupplierofficer($idobj)
    {
        $id = htmlentities($idobj);
        
        $table = new suppliertable();
        $data = $table->deletesupplierofficer($id);

        return redirect()->guest('/supplier/officer');
    }

    public function indexsupplieraccept(Request $request)
    {
        $err = !isset($_GET['err']) ? "" : "Error: ". $_GET['err'];
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $table = new suppliertable();
        $data = $table->getsupplieraccept();
        return View::make('supplieraccept')
            ->with("title", "supplieraccept")
            ->with("authlv", $authlv)
            ->with("err", $err)
            ->with("data", $data);
    }

    public function supplieraccept($idobj)
    {
        $id = htmlentities($idobj);
        $table = new suppliertable();
        $data = $table->getsupplieraccept($id);

        if(count($data) > 0)
        {
            $username = $data[0]->username == null ? $data[0]->name : $data[0]->username;
            $email = $data[0]->email == null ? $data[0]->name. "@email.com" : $data[0]->email;
            $phonenumber = $data[0]->phonenumber;

            $err = Helper::validateUserSubmit($username, $email, $phonenumber);
            if($err == "ok")
            {
                try 
                {
                    $user = User::create([
                        'name' => $data[0]->name,
                        'username' => $username,
                        'email' => $email,
                        'phonenumber' => $phonenumber,
                        'password' => Hash::make($data[0]->password),
                    ]);

                    $table = new suppliertable();
                    $data = $table->acceptnewsupplier($id, $user->id);
                }
                catch (\Exception $e) 
                {
                    return redirect()->guest('/supplier/accept?err='.$err);
                    //return redirect('/regis?err=err'.$e->getMessage());
                }
            }
            else
                return redirect()->guest('/supplier/accept?err='.$err);

        }
        return redirect()->guest('/supplier/accept');
    }

    public function supplierreject($idobj)
    {
        $id = htmlentities($idobj);
        $table = new suppliertable();
        $data = $table->rejectnewsupplier($id);
        return redirect()->guest('/supplier/accept');
    }

    public function indexSupplierEdit(Request $request)
    {
        $err = !isset($_GET['err']) ? "" : "Error: ". $_GET['err'];
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));
        $uid = $request->session()->get('uid');

        $table = new suppliertable();
        $data = $table->getsupplierbyidmsuser($uid)[0];

        return View::make('supplieredit')
            ->with("title", "supplieredit")
            ->with("authlv", $authlv)
            ->with("err", $err)
            ->with("data", $data);
    }
}
