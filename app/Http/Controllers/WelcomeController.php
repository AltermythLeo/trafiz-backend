<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\lib\suppliertable;
use App\User;
use View;
use App;

class WelcomeController extends BaseController
{
    public function indexRegister(Request $request)
    {
		$err = !isset($_GET['err']) ? "" : $_GET['err'];
		$return = "";
		if($err == "s")
		{
			$return = "Thanks for Registering our team will be contact you soon";
		}
		else if($err == "err")
		{
			$return = "Something wrong with our system please reach us later";
		}

    	return View::make('regis')
                ->with("title", "regis")
                ->with("err", $return);
    }

    public function register(Request $request)
    {
		$nameparam = htmlentities($request->name);
		$usernameparam = htmlentities($request->username);
		$emailparam =htmlentities($request->email);
		$phonenumberparam = htmlentities($request->phonenumber);
		$supplieridparam = htmlentities($request->supplierid);
		$passwordparam = htmlentities($request->password);
		$natidparamparam = htmlentities($request->natidtype);
		$langparam = htmlentities($request->lang);
		$genreparam = htmlentities($request->genre);
		$addressparam = htmlentities($request->address);
		$cityparam = htmlentities($request->city);
		$districtparam = htmlentities($request->district);
		$provinceparam = htmlentities($request->province);
		$businesslicenseparam = htmlentities($request->businesslicense);
		$suppliernatcodeparam = htmlentities($request->natcode);
		$supidexpireddate = htmlentities($request->supidexpireddate);

       	try 
       	{
            $table = new suppliertable();
			$data = $table->addnewsuppliertemp($nameparam, $usernameparam, $emailparam, $phonenumberparam, $supplieridparam, $passwordparam, $natidparamparam, $langparam, $genreparam, $addressparam, $cityparam, $districtparam, $provinceparam, $businesslicenseparam, $suppliernatcodeparam, $supidexpireddate);
			return redirect('/regis?err=s');
        }
        catch (\Exception $e) 
        {
        	return redirect('/regis?err=err');
        	//return redirect('/regis?err=err'.$e->getMessage());
        }
    }
}