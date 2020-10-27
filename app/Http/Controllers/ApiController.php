<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Auth;
use App;

use App\lib\suppliertable;
use App\lib\usertable;
use App\lib\fishermantable;
use App\lib\shiptable;
use App\lib\fishtable;
use App\lib\buyertable;
use App\lib\synctable;
use App\lib\loantable;
use App\lib\sailtable;
use App\lib\buyfishtable;
use App\lib\delivertable;
use App\lib\officertable;


class ApiController extends BaseController
{
	public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));
        return view('testapi')->with("title", "testapi")->with("authlv", $authlv);
    }

    private function username($identity)
    {
        $field = 'username';

        if (is_numeric($identity)) {
            $field = 'phonenumber';
        } elseif (filter_var($identity, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }

        request()->merge([$field => $identity]);
        return $field;
    }

	public function loginsupplier(Request $request)
	{
		$data = Auth::attempt([$this->username($request->identity) => $request->identity, 'password' => $request->password]);
		$table = new usertable();
		if ($data && Auth::check())
		{
        	$data = $table->getactivemsuser(Auth::user()->id)[0];
        	if($data->idltusertype < 0)
			{
				return ["err" => "Please use admin backend",
						"data" => ""];
			}	
        	else if($data->err == "ok")
        	{
				return ["err" => "ok",
						"data" => [
							"id" => Auth::user()->id,
							"idmsuser" => $data->idmsuser,
							"idmssupplier" => $data->idmssupplier,
							"idltusertype" => $data->idltusertype,
							"lang" => $data->lang,
							"idmssupplierofficer" => $data->idmssupplierofficer,
							"accesspage" => $data->accesspage,
							"accessrole" => $data->accessrole,
							"supplierid" => $data->supplierid
							]
						];
			}
			else
			{
				return ["err" => strtolower($data->lang) == "id" ? "User sementara di-blok. Hubungi admin untuk bantuan" : "User is temporarily disabled. Please contact the administrator",
						"data" => ""];
			}
		}
		else
		{
			$data = $table->getvalidusername($request->identity);
			if($data)
			{
				return ["err" => "Invalid PIN",
						"data" => ""];
			}
			else
			{
				return ["err" => "Invalid Username",
						"data" => ""];
			}
		}
	}

	public function addloginsuserqrcode($idobj)
	{
		$table = new usertable();
		$returnValue = $table->addloginsuserqrcode($idobj);
		return $returnValue[0]->idvar;
	}

	public function getsupplierbyidmsuser(Request $request) // get supplier info
	{
		$id = $_GET['id'];

		$table = new suppliertable();
		$data = $table->getsupplierbyidmsuser($id);
		return $data;
	}

	public function getprofilesupplierbyidmsuser(Request $request) // get supplier profile
	{
		$id = $_GET['id'];
		$table = new suppliertable();
		$data = $table->getprofilesupplierbyidmsuser($id);
		return $data;
	}

	public function qrcodeLoginfromapps(Request $request) // yg di tembak
	{
		$code = $_GET['c'];
		$identity = $_GET['id'];
		$password = $_GET['p'];

		$check = Auth::attempt([$this->username($identity) => $identity, 'password' => $password]);

		$table = new usertable();
		if ($check && Auth::check())
		{
        	$data = $table->qrcodeLoginfromapps($code, Auth::user()->email, $password)[0];
        	return ["err" => "ok",
					"data" => $data];
		}
		else
			return ["err" => "nope auth",
					"data" => ""];
	}

	public function trymanualLogin(Request $request) // yg nyoba tiap 5s
	{
		$code = $_GET['c'];
		$table = new usertable();
		$check = $table->getactiveqrcode($code);

		if($check != null)
		{
			$check = Auth::attempt([$this->username($check[0]->email) => $check[0]->email,
									'password' => $check[0]->PASSWORD]);
			if ($check && Auth::check())
			{
	        	$data = $table->getactivemsuserqrcode(Auth::user()->id, $code)[0];

				if($data->err == "ok")
	        	{
					$request->session()->put('id', Auth::user()->id);
					$request->session()->put('uid', $data->idmsuser);
					$request->session()->put('sid', $data->idmssupplier);
					$request->session()->put('lang', $data->lang);
					$request->session()->put('admintype', $data->idltusertype);
					return "ok";
					//return redirect()->guest('/index');
				}
				else
				{
					//return redirect()->guest('/login?err'.$data->err);
					return $data->err;
				}
			}
		}
		else
		{
			return null;
		}
	}

	function resetpass(Request $request)
    {
        $id = htmlentities($request->id);
        $oldpassword = htmlentities($request->oldpassword);
        $newpassword = htmlentities($request->newpassword);
        $retypenewpassword = htmlentities($request->retypenewpassword);

        $data = Auth::attempt(["email" => Auth::user()->email, 'password' => $oldpassword]);
        $table = new usertable();
        if ($data && Auth::check())
        {
        	if($newpassword != $retypenewpassword)
        	{
        		return ["err" => "new password and retype not match",
						"data" => ""];
        	}
        	else
        	{
	            $table = new officertable();
	            $data = $table->updateuserspassword($id, $retypenewpassword);
	            return ["err" => "ok",
						"data" => $data];
			}
        }
        else
        {
            return ["err" => "nope auth",
					"data" => ""];
        }
    }

	/*
	public function regisSupplier(Request $request)
	{
        $nama = htmlentities($request->name);
        $username = htmlentities($request->username);
        $email = htmlentities($request->email);
        $phonenumber = htmlentities($request->phonenumber);
        $password = htmlentities($request->password);
        $natidtype = htmlentities($request->natidtype);
        $lang = htmlentities($request->lang);
        
        $email = $email == "" ? uniqid() : $email;
        if(Helper::checkPassword($password))
        {
            $user = User::create([
                'name' => $nama,
                'username' => $username,
                'email' => $email,
                'phonenumber' => $phonenumber,
                'password' => Hash::make($password),
            ]);

            $table = new suppliertable();
            $data = $table->addnewsupplier($natidtype, $nama, "", "", $user->id, null, 1, $lang, 0);
            return ["err" => "Success, wait approval",
					"data" => ""];
        }
        else
        {
        	return ["err" => "wrong password type",
						"data" => ""];
        }
	}*/


	function regisSupplier(Request $request)
	{
		try
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
			$suppliernatcodeparam = htmlentities($request->natidcode);

			$table = new suppliertable();
			$data = $table->addnewsuppliertemp($nameparam, $usernameparam, $emailparam, $phonenumberparam, $supplieridparam, $passwordparam, $natidparamparam, $langparam, $genreparam, $addressparam, $cityparam, $districtparam, $provinceparam, $businesslicenseparam, $suppliernatcodeparam, 'NULL');
			return ["err" => "Success, wait approval",
					"data" => ""];
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function regisSupplier2(Request $request)
	{
		try
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
			$suppliernatcodeparam = htmlentities($request->natidcode);
			$supplieridexpiredate = htmlentities($request->supplieridexpiredate);

			$table = new suppliertable();
			$data = $table->addnewsuppliertemp($nameparam, $usernameparam, $emailparam, $phonenumberparam, $supplieridparam, $passwordparam, $natidparamparam, $langparam, $genreparam, $addressparam, $cityparam, $districtparam, $provinceparam, $businesslicenseparam, $suppliernatcodeparam, $supplieridexpiredate);
			return ["err" => "Success, wait approval",
					"data" => ""];
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function editSupplier($request)
	{
		try
		{
			$idparam = htmlentities($request->id);
			$nameparam = htmlentities($request->name);
			$usernameparam = htmlentities($request->username);
			$emailparam =htmlentities($request->email);
			$phonenumberparam = htmlentities($request->phonenumber);
			$supidedit = htmlentities($request->supplierid);
			$passwordparam = htmlentities($request->password);
			$natidtypeedit = htmlentities($request->natidtype);
			$langedit = htmlentities($request->lang);
			$genre = htmlentities($request->genre);
			$address = htmlentities($request->address);
			$city = htmlentities($request->city);
			$district = htmlentities($request->district);
			$province = htmlentities($request->province);
			$businesslicense = htmlentities($request->businesslicense);
			$natcode = htmlentities($request->natidcode);

			if($passwordparam != null && $passwordparam != "")
			{
				if(Helper::checkPassword($passwordparam))
				{
					$table = new suppliertable();
					$data = $table->updatesupplier($idparam, $nameparam, $usernameparam, 
												$emailparam, $phonenumberparam, $passwordparam, 1, 
												$langedit, 1, $natidtypeedit, 
												$supidedit, $genre, $address, $province, 
												$city, $district, $businesslicense, $natcode,
												'NULL');
					return ["err" => "success",
							"data" => ""];
				}
				else
				{
					return ["err" => "wrong password",
					"data" => ""];
				}
			}
			else
			{
				$table = new suppliertable();
				$data =  $table->updatesupplier($idparam, $nameparam, $usernameparam, 
											$emailparam, $phonenumberparam, "", 1, 
											$langedit, 1, $natidtypeedit, 
											$supidedit, $genre, $address, $province, 
											$city, $district, $businesslicense, $natcode,
											'NULL');
				return ["err" => "success",
						"data" => ""];
			}
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function editSupplier2($request)
	{
		try
		{
			$idparam = htmlentities($request->id);
			$nameparam = htmlentities($request->name);
			$usernameparam = htmlentities($request->username);
			$emailparam =htmlentities($request->email);
			$phonenumberparam = htmlentities($request->phonenumber);
			$supidedit = htmlentities($request->supplierid);
			$passwordparam = htmlentities($request->password);
			$natidtypeedit = htmlentities($request->natidtype);
			$langedit = htmlentities($request->lang);
			$genre = htmlentities($request->genre);
			$address = htmlentities($request->address);
			$city = htmlentities($request->city);
			$district = htmlentities($request->district);
			$province = htmlentities($request->province);
			$businesslicense = htmlentities($request->businesslicense);
			$natcode = htmlentities($request->natidcode);
			$supidexpireddate = htmlentities($request->supplieridexpiredate);
			$supidexpireddate = ($supidexpireddate == null || $supidexpireddate == "") ? "NULL" : $supidexpireddate;

			if($passwordparam != null && $passwordparam != "")
	        {
	            if(Helper::checkPassword($passwordparam))
	            {
	                $table = new suppliertable();
	                $data = $table->updatesupplier($idparam, $nameparam, $usernameparam, 
	                    $emailparam, $phonenumberparam, $passwordparam, 1, 
	                    $langedit, 1, $natidtypeedit, 
	                    $supidedit, $genre, $address, $province, 
	                    $city, $district, $businesslicense, $natcode,
	                    $supidexpireddate);
	                if(count($data) == 0)
		               	return ["data" => "Success"];
					else
						return ["err" => "err: ". $data[0]->textcheck];
	            }
	            else
	            {
	            	return ["err" => "wrong password"];
	            }
	        }
	        else
	        {
	            $table = new suppliertable();
	            /*
	            var_dump($idparam, $nameparam, $usernameparam, 
	                    $emailparam, $phonenumberparam, "", 1, 
	                    $langedit, 1, $natidtypeedit, 
	                    $supidedit, $genre, $address, $province, 
	                    $city, $district, $businesslicense, $natcode,
	                    $supidexpireddate);*/

	            $data =  $table->updatesupplier($idparam, $nameparam, $usernameparam, 
	                    $emailparam, $phonenumberparam, "", 1, 
	                    $langedit, 1, $natidtypeedit, 
	                    $supidedit, $genre, $address, $province, 
	                    $city, $district, $businesslicense, $natcode,
	                    $supidexpireddate);
	            if(count($data) == 0)
	               	return ["data" => "Success"];
				else
					return ["err" => "err: ". $data[0]->textcheck];
	        }
	   	}
		catch (\Exception $e) {
			var_dump("3 error");
	        die();
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}
	

	// fisherman
	function addnewfisherman($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$nameparam = $request->nameparam;
			$bodparam = $request->bodparam;
			$id_paramparam = $request->id_paramparam;
			$sex_paramparam = $request->sex_paramparam;
			$nat_paramparam = $request->nat_paramparam;
			$address_paramparam = $request->address_paramparam;
			$phone_paramparam = $request->phone_paramparam;
			$jobtitle_paramparam = $request->jobtitle_paramparam;
			$idmssupplierparam = $request->idmssupplierparam;
			/*
			$province = $request->provinceparam;
			$district = $request->districtparam;
			$city = $request->cityparam;*/

			$table = new fishermantable();
			$returnValue = $table->addnewfisherman($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatefisherman($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$nameparam = $request->nameparam;
			$bodparam = $request->bodparam;
			$id_paramparam = $request->id_paramparam;
			$sex_paramparam = $request->sex_paramparam;
			$nat_paramparam = $request->nat_paramparam;
			$address_paramparam = $request->address_paramparam;
			$phone_paramparam = $request->phone_paramparam;
			$jobtitle_paramparam = $request->jobtitle_paramparam;
			$idmssupplierparam = $request->idmssupplierparam;
			/*
			$province = $request->provinceparam;
			$district = $request->districtparam;
			$city = $request->cityparam;*/

			$table = new fishermantable();
			$returnValue = $table->updatefisherman($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewfishermanv2($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$nameparam = $request->nameparam;
			$bodparam = $request->bodparam;
			$id_paramparam = $request->id_paramparam;
			$sex_paramparam = $request->sex_paramparam;
			$nat_paramparam = $request->nat_paramparam;
			$address_paramparam = $request->address_paramparam;
			$phone_paramparam = $request->phone_paramparam;
			$jobtitle_paramparam = $request->jobtitle_paramparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$province = $request->provinceparam;
			$district = $request->districtparam;
			$city = $request->cityparam;

			$table = new fishermantable();
			$returnValue = $table->addnewfishermanv2($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatefishermanv2($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$nameparam = $request->nameparam;
			$bodparam = $request->bodparam;
			$id_paramparam = $request->id_paramparam;
			$sex_paramparam = $request->sex_paramparam;
			$nat_paramparam = $request->nat_paramparam;
			$address_paramparam = $request->address_paramparam;
			$phone_paramparam = $request->phone_paramparam;
			$jobtitle_paramparam = $request->jobtitle_paramparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$province = $request->provinceparam;
			$district = $request->districtparam;
			$city = $request->cityparam;

			$table = new fishermantable();
			$returnValue = $table->updatefishermanv2($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewfishermanv3($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$nameparam = $request->nameparam;
			$bodparam = $request->bodparam;
			$id_paramparam = $request->id_paramparam;
			$sex_paramparam = $request->sex_paramparam;
			$nat_paramparam = $request->nat_paramparam;
			$address_paramparam = $request->address_paramparam;
			$phone_paramparam = $request->phone_paramparam;
			$jobtitle_paramparam = $request->jobtitle_paramparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$province = $request->provinceparam;
			$district = $request->districtparam;
			$city = $request->cityparam;

			$fishermanregnumber = $request->fishermanregnumberparam;
			$countryparam = $request->countryparam;

			$table = new fishermantable();
			$returnValue = $table->addnewfishermanv3($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city, $fishermanregnumber, $countryparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatefishermanv3($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$nameparam = $request->nameparam;
			$bodparam = $request->bodparam;
			$id_paramparam = $request->id_paramparam;
			$sex_paramparam = $request->sex_paramparam;
			$nat_paramparam = $request->nat_paramparam;
			$address_paramparam = $request->address_paramparam;
			$phone_paramparam = $request->phone_paramparam;
			$jobtitle_paramparam = $request->jobtitle_paramparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$province = $request->provinceparam;
			$district = $request->districtparam;
			$city = $request->cityparam;

			$fishermanregnumber = $request->fishermanregnumberparam;
			$countryparam = $request->countryparam;

			$table = new fishermantable();
			$returnValue = $table->updatefishermanv3($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city, $fishermanregnumber, $countryparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletefisherman($request)
	{
		try
		{
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$table = new fishermantable();
			$returnValue = $table->deletefisherman($idfishermanofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getfishermanbyidmsuser()
	{
		$id = htmlentities($_GET['id']);
		$table = new fishermantable();
		$returnValue = $table->getfishermanbyidmsuser($id);
		/*
		for($i=0;$i<count($returnValue);$i++)
		{
			$returnValue[$i]->photo = 'http://104.215.185.180/imgupload/' . $returnValue[$i]->photo;
		}*/
		return $returnValue;
	}

	function getfishermanbyidmsuserv2()
	{
		$id = htmlentities($_GET['id']);
		$table = new fishermantable();
		$returnValue = $table->getfishermanbyidmsuserv2($id);
		return $returnValue;
	}

	// ship
	function addnewship($request)
	{
		try
		{
			$idshipofflineparam = $request->idshipoffline;
			$vesselname_paramparam = $request->vesselname_param;
			$vessellicensenumber_paramparam = $request->vessellicensenumber_param;
			$vessellicenseexpiredate_paramparam = $request->vessellicenseexpiredate_param;
			$fishinglicensenumber_paramparam = $request->fishinglicensenumber_param;
			$fishinglicenseexpiredate_paramparam = $request->fishinglicenseexpiredate_param;
			$vesselsize_paramparam = $request->vesselsize_param;
			$vesselflag_paramparam = $request->vesselflag_param;
			$vesselgeartype_paramparam = $request->vesselgeartype_param;
			$vesseldatemade_paramparam = $request->vesseldatemade_param;
			$vesselownername_paramparam = $request->vesselownername_param;
			$vesselownerid_paramparam = $request->vesselownerid_param;
			$vesselownerphone_paramparam = $request->vesselownerphone_param;
			$vesselownersex_paramparam = $request->vesselownersex_param;
			$vesselownerdob_paramparam = $request->vesselownerdob_param;
			$vesselowneraddress_paramparam = $request->vesselowneraddress_param;
			$idmsuserparamparam = $request->idmsuserparam;

			$table = new shiptable();
			$returnValue = $table->addnewship($idshipofflineparam,$vesselname_paramparam, $vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateship($request)
	{
		try
		{
			$idshipofflineparam = $request->idshipoffline;
			$vesselname_paramparam = $request->vesselname_param;
			$vessellicensenumber_paramparam = $request->vessellicensenumber_param;
			$vessellicenseexpiredate_paramparam = $request->vessellicenseexpiredate_param;
			$fishinglicensenumber_paramparam = $request->fishinglicensenumber_param;
			$fishinglicenseexpiredate_paramparam = $request->fishinglicenseexpiredate_param;
			$vesselsize_paramparam = $request->vesselsize_param;
			$vesselflag_paramparam = $request->vesselflag_param;
			$vesselgeartype_paramparam = $request->vesselgeartype_param;
			$vesseldatemade_paramparam = $request->vesseldatemade_param;
			$vesselownername_paramparam = $request->vesselownername_param;
			$vesselownerid_paramparam = $request->vesselownerid_param;
			$vesselownerphone_paramparam = $request->vesselownerphone_param;
			$vesselownersex_paramparam = $request->vesselownersex_param;
			$vesselownerdob_paramparam = $request->vesselownerdob_param;
			$vesselowneraddress_paramparam = $request->vesselowneraddress_param;
			$idmsuserparamparam = $request->idmsuserparam;

			$table = new shiptable();
			$returnValue = $table->updateship($idshipofflineparam,$vesselname_paramparam, $vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deleteship($request)
	{
		try
		{
			$idshipofflineparam = $request->idshipofflineparam;
			$table = new shiptable();
			$returnValue = $table->deleteship($idshipofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getshipbyidmsuser()
	{
		$id = htmlentities($_GET['id']);
		$table = new shiptable();
		$returnValue = $table->getshipbyidmsuser($id);
		return $returnValue;
	}

	function getshipbyidmsuserv2()
	{
		$id = htmlentities($_GET['id']);
		$table = new shiptable();
		$returnValue = $table->getshipbyidmsuserv2($id);
		return $returnValue;
	}

	// fish
	function addnewfish($request)
	{
		try
		{
			$idfishofflineparam = $request->idfishofflineparam;
			$idltfishparam = $request->idltfishparam;
			$indnameparam = $request->indnameparam;		
			$photoparam = $request->photoparam;
			$localnameparam = $request->localnameparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$priceparam = $request->priceparam;

			$table = new fishtable();
			$returnValue = $table->addnewfish($idfishofflineparam, $idltfishparam, $indnameparam, $localnameparam, $photoparam, $idmssupplierparam, $priceparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatefish($request)
	{
		try
		{
			$idfishofflineparam = $request->idfishofflineparam;
			$idltfishparam = $request->idltfishparam;
			$indnameparam = $request->indnameparam; 
			$photoparam = $request->photoparam;
			$localnameparam = $request->localnameparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$priceparam = $request->priceparam;

			$table = new fishtable();
			$returnValue = $table->updatefish($idfishofflineparam, $idltfishparam, $indnameparam, $localnameparam, $photoparam, $idmssupplierparam, $priceparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletefish($request)
	{
		try
		{
			$idfishofflineparam = $request->idfishofflineparam;
			$table = new fishtable();
			$returnValue = $table->deletefish($idfishofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getfishbyidmsuser()
	{
		$id = htmlentities($_GET['id']);
		$table = new fishtable();
		$returnValue = $table->getfishbyidmsuser($id);
		for($i=0;$i<count($returnValue);$i++)
		{
			$returnValue[$i]->photo = 'http://104.215.185.180/imgupload/' . $returnValue[$i]->photo;
		}
		return $returnValue;
	}

	function getfishbyidmsuserv2()
	{
		$id = htmlentities($_GET['id']);
		$table = new fishtable();
		$returnValue = $table->getfishbyidmsuserv2($id);
		for($i=0;$i<count($returnValue);$i++)
		{
			$returnValue[$i]->photo = 'http://104.215.185.180/imgupload/' . $returnValue[$i]->photo;
		}
		return $returnValue;
	}

	// upload image
	function uploadimage(Request $request)
	{
		try
		{
			$fileuploadparam = $request->photoparam;

	    	$request->validate([
	            'photoparam' => 'required|image|mimes:jpeg,png,jpg|max:2048',
	        ]);

	        $imageName = time().'.'.$fileuploadparam->getClientOriginalExtension();
	        $fileuploadparam->move(public_path('imgupload'), $imageName);

	    	return $imageName;
	    }
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// buyer
	function addnewbuyer($request)
	{
		try
		{
			$idbuyerofflineparam = $request->idbuyeroffline;
			$idmssupplierparam = $request->idmssupplier;
			$name_paramparam = $request->name_param;
			$id_paramparam = $request->id_param;
			$businesslicense_paramparam = $request->businesslicense_param;
			$contact_paramparam = $request->contact_param;
			$phonenumber_paramparam = $request->phonenumber_param;
			$address_paramparam = $request->address_param;
			$idltusertypeparam = $request->idltusertype;
			$sex_paramparam = $request->sex_param;
			$nationalcode_paramparam = $request->nationalcode_param;
			$country_paramparam = $request->country_param;
			$province_paramparam = $request->province_param;
			$city_paramparam = $request->city_param;
			$district_paramparam = $request->district_param;
			$completestreetaddress_paramparam = $request->completestreetaddress_param;

			$table = new buyertable();
			$returnValue = $table->addnewbuyer($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatebuyer($request)
	{
		try
		{
			$idbuyerofflineparam = $request->idbuyeroffline;
			$idmssupplierparam = $request->idmssupplier;
			$name_paramparam = $request->name_param;
			$id_paramparam = $request->id_param;
			$businesslicense_paramparam = $request->businesslicense_param;
			$contact_paramparam = $request->contact_param;
			$phonenumber_paramparam = $request->phonenumber_param;
			$address_paramparam = $request->address_param;
			$idltusertypeparam = $request->idltusertype;
			$sex_paramparam = $request->sex_param;
			$nationalcode_paramparam = $request->nationalcode_param;
			$country_paramparam = $request->country_param;
			$province_paramparam = $request->province_param;
			$city_paramparam = $request->city_param;
			$district_paramparam = $request->district_param;
			$completestreetaddress_paramparam = $request->completestreetaddress_param;

			$table = new buyertable();
			$returnValue = $table->updatebuyer($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletebuyer($request)
	{
		try
		{
			$idbuyerofflineparam = $request->idbuyerofflineparam;
			$table = new buyertable();
			$returnValue = $table->deletebuyer($idbuyerofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getbuyerlistbyidmsuser()
	{
		$id = htmlentities($_GET['id']);
		$table = new buyertable();
		$returnValue = $table->getbuyerlistbyidmsuser($id);
		return $returnValue;
	}

	function getbuyerlistbyidmsuserv2()
	{
		$id = htmlentities($_GET['id']);
		$table = new buyertable();
		$returnValue = $table->getbuyerlistbyidmsuserv2($id);
		return $returnValue;
	}

	// loan
	function addnewloan($request)
	{
		try
		{
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->addnewloan($descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateloan($request)
	{
		try
		{
			$idtrloanparam = $request->idtrloanparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->updateloan($idtrloanparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deleteloan($request)
	{
		try
		{
			$idtrloanparam = $request->idtrloanparam;
			$table = new loantable();
			$returnValue = $table->deleteloan($idtrloanparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// loanv2
	function addnewloanv2($request)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->addnewloanv2($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateloanv2($request)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->updateloanv2($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deleteloanv2($request)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$table = new loantable();
			$returnValue = $table->deleteloan($idloanofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getloanlistbyidmssupplier()
	{
		$idmssupplier = htmlentities($_GET['id']);
		$m = htmlentities($_GET['m']);
		$y = htmlentities($_GET['y']);

		$table = new loantable();
		$returnValue = $table->getloanlistbyidmssupplier($idmssupplier, -1, $m, $y);
		return $returnValue;
	}

	function getloanlistbyidmssupplierv2()
	{
		$idmssupplier = htmlentities($_GET['id']);
		$m = htmlentities($_GET['m']);
		$y = htmlentities($_GET['y']);

		$table = new loantable();
		$returnValue = $table->getloanlistbyidmssupplierv2($idmssupplier, -1, $m, $y);
		return $returnValue;
	}

	// pay loan
	function payloan($request)
	{
		try
		{
			$idtrloanparam = $request->idtrloanparam;
			$paidoffdateparam = $request->paidoffdateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
			
			$table = new loantable();
			$returnValue = $table->payloan($idtrloanparam, $paidoffdateparam, $paidoffidmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function cancelpayloan($request)
	{
		try
		{
			$idtrloanparam = $request->idtrloanparam;
			
			$table = new loantable();
			$returnValue = $table->cancelpayloan($idtrloanparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addpayloan($request)
	{
		try
		{
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->addpayloan($idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatepayloan($request)
	{
		try
		{
			$idtrpayloanparam = $request->idtrpayloanparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->updatepayloan($idtrpayloanparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletepayloan($request)
	{
		try
		{
			$idtrpayloanparam = $request->idtrpayloanparam;
			$table = new loantable();
			$returnValue = $table->deletepayloan($idtrpayloanparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// payloan v2
	function payloanv2($request)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$paidoffdateparam = $request->paidoffdateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
			
			$table = new loantable();
			$returnValue = $table->payloanv2($idloanofflineparam, $paidoffdateparam, $paidoffidmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function cancelpayloanv2($request)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			
			$table = new loantable();
			$returnValue = $table->cancelpayloanv2($idloanofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addpayloanv2($request)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->addpayloanv2($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatepayloanv2($request)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->updatepayloanv2($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletepayloanv2($request)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$table = new loantable();
			$returnValue = $table->deletepayloanv2($idpayloanofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getpayloanlistbyidmssupplier()
	{
		$idmssupplier = htmlentities($_GET['id']);
		$m = htmlentities($_GET['m']);
		$y = htmlentities($_GET['y']);

		$table = new loantable();
		$returnValue = $table->getpayloanlistbyidmssupplier($idmssupplier, -1, $m, $y);
		return $returnValue;
	}

	function getloanernloanbyidmssupplier()
	{
		$idmssupplier = htmlentities($_GET['id']);
		$table = new loantable();
		$returnValue = $table->getloanernloanbyidmssupplier($idmssupplier);
		return $returnValue;
	}

	// add new buyer v3
	function addnewbuyerv3($request)
	{
		try
		{
			$idbuyerofflineparam = $request->idbuyeroffline;
			$idmssupplierparam = $request->idmssupplier;
			$name_paramparam = $request->name_param;
			$id_paramparam = $request->id_param;
			$businesslicense_paramparam = $request->businesslicense_param;
			$contact_paramparam = $request->contact_param;
			$phonenumber_paramparam = $request->phonenumber_param;
			$address_paramparam = $request->address_param;
			$idltusertypeparam = $request->idltusertype;
			$sex_paramparam = $request->sex_param;
			$nationalcode_paramparam = $request->nationalcode_param;
			$country_paramparam = $request->country_param;
			$province_paramparam = $request->province_param;
			$city_paramparam = $request->city_param;
			$district_paramparam = $request->district_param;
			$completestreetaddress_paramparam = $request->completestreetaddress_param;
			$companynameparam = $request->companynameparam;
			$businesslicenseexpireddateparam = $request->businesslicenseexpireddate;

			$table = new buyertable();
			$returnValue = $table->addnewbuyerv3($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam, $companynameparam, $businesslicenseexpireddateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatebuyerv3($request)
	{
		try
		{
			$idbuyerofflineparam = $request->idbuyeroffline;
			$idmssupplierparam = $request->idmssupplier;
			$name_paramparam = $request->name_param;
			$id_paramparam = $request->id_param;
			$businesslicense_paramparam = $request->businesslicense_param;
			$contact_paramparam = $request->contact_param;
			$phonenumber_paramparam = $request->phonenumber_param;
			$address_paramparam = $request->address_param;
			$idltusertypeparam = $request->idltusertype;
			$sex_paramparam = $request->sex_param;
			$nationalcode_paramparam = $request->nationalcode_param;
			$country_paramparam = $request->country_param;
			$province_paramparam = $request->province_param;
			$city_paramparam = $request->city_param;
			$district_paramparam = $request->district_param;
			$completestreetaddress_paramparam = $request->completestreetaddress_param;

			$companynameparam = $request->companynameparam;
			$businesslicenseexpireddateparam = $request->businesslicenseexpireddate;

			$table = new buyertable();
			$returnValue = $table->updatebuyerv3($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam, $companynameparam, $businesslicenseexpireddateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getbuyerlistbyidmsuserv3()
	{
		$id = htmlentities($_GET['id']);
		$table = new buyertable();
		$returnValue = $table->getbuyerlistbyidmsuserv3($id);
		return $returnValue;
	}


	// loan v3
	function addnewloanv3($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->addnewloanv3($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateloanv3($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->updateloanv3($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deleteloanv3($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$table = new loantable();
			$returnValue = $table->deleteloanv3($idloanofflineparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// payloan v3
	function addpayloanv3($request, $sender)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->addpayloanv3($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatepayloanv3($request, $sender)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;

			$table = new loantable();
			$returnValue = $table->updatepayloanv3($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletepayloanv3($request, $sender)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$table = new loantable();
			$returnValue = $table->deletepayloanv3($idpayloanofflineparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function payloanv3($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$paidoffdateparam = $request->paidoffdateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
			
			$table = new loantable();
			$returnValue = $table->payloanv3($idloanofflineparam, $paidoffdateparam, $paidoffidmsuserofficerparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function cancelpayloanv3($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			
			$table = new loantable();
			$returnValue = $table->cancelpayloanv3($idloanofflineparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// catch v3
	function addcatchv3($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;

			$table = new buyfishtable();
			$returnValue = $table->addcatchv3($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatecatchv3($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;
			$closeparam = $request->closeparam;

			$table = new buyfishtable();
			$returnValue = $table->updatecatchv3($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletecatchv3($request, $sender)
	{
		try
		{
			$idparam = $request->idtrcatchofflineparam;

			$table = new buyfishtable();
			$returnValue = $table->deletecatchv3($idparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getcatchbyidmssupplierv3()
	{
		$idmssupplierparam = htmlentities($_GET['id']);

		$table = new buyfishtable();
		$returnValue = $table->getcatchbyidmssupplierv3($idmssupplierparam, -1, -1, -1);
		return $returnValue;
	}

	// fishcatch v3
	function addfishcatchv3($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
			$amountparam = $request->amountparam;
			$gradeparam = $request->gradeparam;
			$descparam = $request->descparam;
			$idfishparam = $request->idfishparam;

			$table = new buyfishtable();
			$returnValue = $table->addfishcatchv3($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam,
			$gradeparam, $descparam, $idfishparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatefishcatchv3($request, $sender)
	{
		try
		{
			$idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
			$amountparam = $request->amountparam;
			$gradeparam = $request->gradeparam;
			$descparam = $request->descparam;

			$table = new buyfishtable();
			$returnValue = $table->updatefishcatchv3($idtrfishcatchofflineparam, $amountparam, $gradeparam, 
				$descparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletefishcatchv3($request, $sender)
	{
		try
		{
			$idparam = $request->idtrfishcatchofflineparam;

			$table = new buyfishtable();
			$returnValue = $table->deletefishcatchv3($idparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// delivery v3
	function addnewdeliveryv3($request, $sender)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;
			$idtrfishcatchofflineparam = $request->idtrfishcatchoffline;
			$totalpriceparam = $request->totalprice;
			$descparamparam = $request->desc;
			$sendtobuyerdateparam = $request->sendtobuyerdate;
			$deliverydateparam = $request->deliverydate;
			$transportbyparam = $request->transportby;
			$transportnameidparam = $request->transportnameid;
			$transportreceiptparam = $request->transportreceiptphoto;
			$idmsbuyerparam = $request->idmsbuyer;
			$idmssupplierparam = $request->idmssupplier;
			$deliverysheetofflineidparam = $request->deliverysheetofflineid;

			$table = new delivertable();
			$returnValue = $table->addnewdeliveryv3($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $idmssupplierparam, $deliverysheetofflineidparam, $sender);

			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliveryv3($request, $sender)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;
			$idtrfishcatchofflineparam = $request->idtrfishcatchoffline;
			$totalpriceparam = $request->totalprice;
			$descparamparam = $request->desc;
			$sendtobuyerdateparam = $request->sendtobuyerdate;
			$deliverydateparam = $request->deliverydate;
			$transportbyparam = $request->transportby;
			$transportnameidparam = $request->transportnameid;
			$transportreceiptparam = $request->transportreceiptphoto;
			$idmsbuyerparam = $request->idmsbuyer;
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;

			$table = new delivertable();
			$returnValue = $table->updatedeliveryv3($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $deliverysheetofflineidparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletedeliveryv3($request, $sender)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;	

			$table = new delivertable();
			$returnValue = $table->deletedelivery($iddeliveryofflineparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliverypricev3($request, $sender)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
			$totalpriceparam = $request->totalpriceparam;

			$table = new delivertable();
			$returnValue = $table->updatedeliverypricev3($iddeliveryofflineparam, $totalpriceparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}


	// add catch v4
	function addcatchv4($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;
			$notes = $request->noteparam;

			$table = new buyfishtable();
			$returnValue = $table->addcatchv4($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender, $notes);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatecatchv4($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;
			$closeparam = isset($request->closeparam) ? $request->closeparam : "0" ; // check
			$notes = $request->noteparam;

			$table = new buyfishtable();
			$returnValue = $table->updatecatchv4($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender, $notes);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// loan v4
	function addnewloanv4($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;
			$unitparam = $request->unitparam;
			$priceperunitparam = $request->priceperunitparam;

			$table = new loantable();
			$returnValue = $table->addnewloanv4($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $sender, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateloanv4($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;
			$unitparam = $request->unitparam;
			$priceperunitparam = $request->priceperunitparam;

			$table = new loantable();
			$returnValue = $table->updateloanv4($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $sender, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewloanv5($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;
			$unitparam = $request->unitparam;
			$priceperunitparam = $request->priceperunitparam;
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$idbuyerofflineparam = $request->idbuyerofflineparam;

			$table = new loantable();
			$returnValue = $table->addnewloanv5($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $sender, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam, $idfishermanofflineparam, $idbuyerofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateloanv5($request, $sender)
	{
		try
		{
			$idloanofflineparam = $request->idloanofflineparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$loandateparam = $request->loandateparam;
			$loaneridmsuserofficerparam = $request->loaneridmsuserofficerparam;
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;
			$unitparam = $request->unitparam;
			$priceperunitparam = $request->priceperunitparam;
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$idbuyerofflineparam = $request->idbuyerofflineparam;

			$table = new loantable();
			$returnValue = $table->updateloanv5($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $sender, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam, $idfishermanofflineparam, $idbuyerofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addpayloanv4($request, $sender)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$idbuyerofflineparam = $request->idbuyerofflineparam;

			$table = new loantable();
			$returnValue = $table->addpayloanv4($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam,
				$idfishermanofflineparam, $idbuyerofflineparam,
				$sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatepayloanv4($request, $sender)
	{
		try
		{
			$idpayloanofflineparam = $request->idpayloanofflineparam;
			$idmsuserloanparam = $request->idmsuserloanparam;
			$idmsbuyerloanparam = $request->idmsbuyerloanparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$descparam = $request->descparam;
			$rpparam = $request->rpparam;
			$paiddateparam = $request->paiddateparam;
			$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
			$idfishermanofflineparam = $request->idfishermanofflineparam;
			$idbuyerofflineparam = $request->idbuyerofflineparam;

			$table = new loantable();
			$returnValue = $table->updatepayloanv4($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $idfishermanofflineparam, $idbuyerofflineparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewtypeitemloan($request, $sender)
	{
		try
		{
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;
			$typenameparam = $request->typenameparam;
			$unitparam = $request->unitparam;
			$priceperunitparam = $request->priceperunitparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$table = new loantable();
			$returnValue = $table->addnewtypeitemloan($idmstypeitemloanofflineparam, $typenameparam, $unitparam, $priceperunitparam, $idmssupplierparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatetypeitemloan($request, $sender)
	{
		try
		{
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;
			$typenameparam = $request->typenameparam;
			$unitparam = $request->unitparam;
			$priceperunitparam = $request->priceperunitparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$table = new loantable();
			$returnValue = $table->updatetypeitemloan($idmstypeitemloanofflineparam, $typenameparam, $unitparam, $priceperunitparam, $idmssupplierparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletetypeitemloan($request, $sender)
	{
		try
		{
			$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;

			$table = new loantable();
			$returnValue = $table->deletetypeitemloan($idmstypeitemloanofflineparam, $sender);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function gettypeitemloan()
	{
		$idmssupplierparam = htmlentities($_GET['id']);
		$table = new loantable();
		$returnValue = $table->gettypeitemloan($idmssupplierparam);
		return $returnValue;
	}

	/*
	// sail
	function addnewsail($request)
	{
		$idmsshipparam = $request->idmsshipparam;
		$sailpositionparam = $request->sailpositionparam;
		$sailingdateparam = $request->sailingdateparam;
		$idmslandingsiteparam = $request->idmslandingsiteparam;
		$idmsfishermanparam = $request->idmsfishermanparam;

		$table = new sailtable();
		$returnValue = $table->addnewsail($idmsshipparam, $sailpositionparam, $sailingdateparam, $idmslandingsiteparam, $idmsfishermanparam);
		return $returnValue;
	}

	function updatesail($request)
	{
		$idtrsailparam = $request->idtrsailparam;
		$idmsshipparam = $request->idmsshipparam;
		$sailpositionparam = $request->sailpositionparam;
		$sailingdateparam = $request->sailingdateparam;
		$idmslandingsiteparam = $request->idmslandingsiteparam;
		$idmsfishermanparam = $request->idmsfishermanparam;

		$table = new sailtable();
		$returnValue = $table->updatesail($idtrsailparam, $idmsshipparam, $sailpositionparam, $sailingdateparam, $idmslandingsiteparam, $idmsfishermanparam);
		return $returnValue;
	}

	function deletesail($request)
	{
		$idtrsailparam = $request->idtrsailparam;
		$table = new sailtable();
		$returnValue = $table->deletesail($idtrsailparam);
		return $returnValue;
	}

	function getsailbymssupplier()
	{
		$idmssupplier = htmlentities($_GET['id']);

		$table = new sailtable();
		$returnValue = $table->getsailbymssupplier($idmssupplier);
		return $returnValue;
	}

	// ship crew
	function addshipcrew($request)
	{
		$idmsfishermanparam = $request->idmsfishermanparam;
		$idtrsailparam = $request->idtrsailparam;

		$table = new sailtable();
		$returnValue = $table->addshipcrew($idmsfishermanparam, $idtrsailparam);
		return $returnValue;
	}

	function updateshipcrew($request)
	{
		$idtrshipcrewparam = $request->idtrshipcrewparam;
		$idmsfishermanparam = $request->idmsfishermanparam;
		$idtrsailparam = $request->idtrsailparam;

		$table = new sailtable();
		$returnValue = $table->updateshipcrew($idtrshipcrewparam, $idmsfishermanparam, $idtrsailparam);
		return $returnValue;
	}

	function deleteshipcrew($request)
	{
		$idtrshipcrewparam = $request->idtrshipcrewparam;

		$table = new sailtable();
		$returnValue = $table->deleteshipcrew($idtrshipcrewparam);
		return $returnValue;
	}
	*/

	// catch
	function addcatch($request)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$idmsfishermanparam = $request->idmsfishermanparam;
			$idmsbuyersupplierparam = $request->idmsbuyersupplierparam;
			$idmsshipparam = $request->idmsshipparam;
			$idmsfishparam = $request->idmsfishparam;
			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;

			$table = new buyfishtable();
			$returnValue = $table->addcatch($idtrcatchofflineparam, $idmssupplierparam, $idmsfishermanparam, $idmsbuyersupplierparam, $idmsshipparam, $idmsfishparam, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatecatch($request)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$idmsfishermanparam = $request->idmsfishermanparam;
			$idmsbuyersupplierparam = $request->idmsbuyersupplierparam;
			$idmsshipparam = $request->idmsshipparam;
			$idmsfishparam = $request->idmsfishparam;
			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;

			$table = new buyfishtable();
			$returnValue = $table->updatecatch($idtrcatchofflineparam, $idmssupplierparam, $idmsfishermanparam, $idmsbuyersupplierparam, $idmsshipparam, $idmsfishparam, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletecatch($request)
	{
		try
		{
			$idparam = $request->idtrcatchofflineparam;

			$table = new buyfishtable();
			$returnValue = $table->deletecatch($idparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addcatchv2($request)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;
			//$idmsfishermanparam = $request->idmsfishermanparam;
			//$idmsbuyersupplierparam = $request->idmsbuyersupplierparam;
			//$idmsshipparam = $request->idmsshipparam;
			//$idmsfishparam = $request->idmsfishparam;
			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;

			$table = new buyfishtable();
			$returnValue = $table->addcatchv2($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatecatchv2($request)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;
			//$idmsfishermanparam = $request->idmsfishermanparam;
			//$idmsbuyersupplierparam = $request->idmsbuyersupplierparam;
			//$idmsshipparam = $request->idmsshipparam;
			//$idmsfishparam = $request->idmsfishparam;
			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;
			$closeparam = $request->closeparam;

			$table = new buyfishtable();
			$returnValue = $table->updatecatchv2($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

    function getcatch()
	{
		$month = htmlentities($_GET['m']);
		$year = htmlentities($_GET['y']);

		$table = new buyfishtable();
		$data = $table->getcatch($month, $year);
		/*
		for($i=0;$i<count($returnValue);$i++)
		{
			$returnValue[$i]->dispatchnotephoto = 'http://104.215.185.180/imgupload/' . $returnValue[$i]->dispatchnotephoto;
		}*/
		return $returnValue;
	}

	function getcatchv2()
	{
		$month = htmlentities($_GET['m']);
		$year = htmlentities($_GET['y']);

		$table = new buyfishtable();
		$data = $table->getcatchv2($month, $year);
		return $returnValue;
	}

	function getcatchbyidmssupplier()
	{
		$idmssupplierparam = htmlentities($_GET['id']);

		$table = new buyfishtable();
		$returnValue = $table->getcatchbyidmssupplier($idmssupplierparam, -1, -1);
		/*
		for($i=0;$i<count($returnValue);$i++)
		{
			$returnValue[$i]->dispatchnotephoto = 'http://104.215.185.180/imgupload/' . $returnValue[$i]->dispatchnotephoto;
		}*/
		return $returnValue;
	}

	function getcatchbyidmssupplierv2()
	{
		$idmssupplierparam = htmlentities($_GET['id']);

		$table = new buyfishtable();
		$returnValue = $table->getcatchbyidmssupplierv2($idmssupplierparam, -1, -1, -1);
		return $returnValue;
	}

	// ship v3
	function addnewshipv3($request)
	{
		try
		{
			$idshipofflineparam = $request->idshipoffline;
			$vesselname_paramparam = $request->vesselname_param;
			$vessellicensenumber_paramparam = $request->vessellicensenumber_param;
			$vessellicenseexpiredate_paramparam = $request->vessellicenseexpiredate_param;
			$fishinglicensenumber_paramparam = $request->fishinglicensenumber_param;
			$fishinglicenseexpiredate_paramparam = $request->fishinglicenseexpiredate_param;
			$vesselsize_paramparam = $request->vesselsize_param;
			$vesselflag_paramparam = $request->vesselflag_param;
			$vesselgeartype_paramparam = $request->vesselgeartype_param;
			$vesseldatemade_paramparam = $request->vesseldatemade_param;
			$vesselownername_paramparam = $request->vesselownername_param;
			$vesselownerid_paramparam = $request->vesselownerid_param;
			$vesselownerphone_paramparam = $request->vesselownerphone_param;
			$vesselownersex_paramparam = $request->vesselownersex_param;
			$vesselownerdob_paramparam = $request->vesselownerdob_param;
			$vesselowneraddress_paramparam = $request->vesselowneraddress_param;
			$idmsuserparamparam = $request->idmsuserparam;

			$vesselownerprovince_paramparam = $request->vesselownerprovince_param;
			$vesselownerdistrict_paramparam = $request->vesselownerdistrict_param;
			$vesselownercity_paramparam = $request->vesselownercity_param;
			$vesselownercountry_paramparam = $request->vesselownercountry_param;
			$vesselid_param = $request->vesselid_param;

			$table = new shiptable();
			$returnValue = $table->addnewshipv3($idshipofflineparam,$vesselname_paramparam, $vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam, $vesselownerprovince_paramparam, $vesselownerdistrict_paramparam, $vesselownercity_paramparam, $vesselownercountry_paramparam, $vesselid_param);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updateshipv3($request)
	{
		try
		{
			$idshipofflineparam = $request->idshipoffline;
			$vesselname_paramparam = $request->vesselname_param;
			$vessellicensenumber_paramparam = $request->vessellicensenumber_param;
			$vessellicenseexpiredate_paramparam = $request->vessellicenseexpiredate_param;
			$fishinglicensenumber_paramparam = $request->fishinglicensenumber_param;
			$fishinglicenseexpiredate_paramparam = $request->fishinglicenseexpiredate_param;
			$vesselsize_paramparam = $request->vesselsize_param;
			$vesselflag_paramparam = $request->vesselflag_param;
			$vesselgeartype_paramparam = $request->vesselgeartype_param;
			$vesseldatemade_paramparam = $request->vesseldatemade_param;
			$vesselownername_paramparam = $request->vesselownername_param;
			$vesselownerid_paramparam = $request->vesselownerid_param;
			$vesselownerphone_paramparam = $request->vesselownerphone_param;
			$vesselownersex_paramparam = $request->vesselownersex_param;
			$vesselownerdob_paramparam = $request->vesselownerdob_param;
			$vesselowneraddress_paramparam = $request->vesselowneraddress_param;
			$idmsuserparamparam = $request->idmsuserparam;

			$vesselownerprovince_paramparam = $request->vesselownerprovince_param;
			$vesselownerdistrict_paramparam = $request->vesselownerdistrict_param;
			$vesselownercity_paramparam = $request->vesselownercity_param;
			$vesselownercountry_paramparam = $request->vesselownercountry_param;
			$vesselid_param = $request->vesselid_param;

			$table = new shiptable();
			$returnValue = $table->updateshipv3($idshipofflineparam,$vesselname_paramparam, $vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam,
				$vesselownerprovince_paramparam, $vesselownerdistrict_paramparam, 
				$vesselownercity_paramparam, $vesselownercountry_paramparam, $vesselid_param);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	//
	function addcatchsupplier($request)
	{
		try
		{
			$idtrcatchpostparam = $request->idtrcatchpostparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$idmssuppliersellparam = $request->idmssuppliersellparam;
			$idmsshipparam = $request->idmsshipparam;
			$idmsfishparam = $request->idmsfishparam;
			$varianceparam = $request->varianceparam;
			$dispatchnotephotoparam = $request->dispatchnotephotoparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$locationparam = $request->locationparam;
			$saildateparam = $request->saildateparam;		
			$postdateparam = $request->postdateparam;

			$table = new buyfishtable();
			$returnValue = $table->addcatchsupplier($idtrcatchpostparam, $idmssupplierparam, $idmssuppliersellparam, $idmsshipparam, $idmsfishparam, $varianceparam, $dispatchnotephotoparam, $priceperkgparam, $totalpriceparam, $locationparam, $saildateparam, $postdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}
	
	function updatecatchsupplier($request)
	{
		try
		{
			$idtrcatchparam = $request->idtrcatchparam;

			$idtrcatchpostparam = $request->idtrcatchpostparam;
			$idmssupplierparam = $request->idmssupplierparam;
			$idmssuppliersellparam = $request->idmssuppliersellparam;
			$idmsshipparam = $request->idmsshipparam;
			$idmsfishparam = $request->idmsfishparam;
			$varianceparam = $request->varianceparam;
			$dispatchnotephotoparam = $request->dispatchnotephotoparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$locationparam = $request->locationparam;
			$saildateparam = $request->saildateparam;
			
			$table = new buyfishtable();
			$returnValue = $table->updatecatchsupplier($idtrcatchparam, $idtrcatchpostparam, $idmssupplierparam, $idmssuppliersellparam, $idmsshipparam, $idmsfishparam, $varianceparam, $dispatchnotephotoparam, $priceperkgparam, $totalpriceparam, $locationparam, $saildateparam, $postdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// fish catch
	function addfishcatch($request)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
			$amountparam = $request->amountparam;
			$gradeparam = $request->gradeparam;
			$descparam = $request->descparam;

			$table = new buyfishtable();
			$returnValue = $table->addfishcatch($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam, $gradeparam, $descparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addfishcatchv2($request)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
			$amountparam = $request->amountparam;
			$gradeparam = $request->gradeparam;
			$descparam = $request->descparam;
			$idfishparam = $request->idfishparam;

			$table = new buyfishtable();
			$returnValue = $table->addfishcatchv2($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam,
			$gradeparam, $descparam, $idfishparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}


	function updatefishcatch($request)
	{
		try
		{
			$idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
			$amountparam = $request->amountparam;
			$gradeparam = $request->gradeparam;
			$descparam = $request->descparam;

			$table = new buyfishtable();
			$returnValue = $table->updatefishcatch($idtrfishcatchofflineparam, $amountparam, $gradeparam, $descparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletefishcatch($request)
	{
		try
		{
			$idparam = $request->idtrfishcatchofflineparam;

			$table = new buyfishtable();
			$returnValue = $table->deletefishcatch($idparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	// add delivery
	
	function setbuyertofishcatch($request)
	{
		try
		{
			$idtrfishcatchpostparam = $request->idtrfishcatchpostparam;	
			$idmsbuyerparam = $request->idmsbuyerparam;

			$table = new delivertable();
			$returnValue = $table->setbuyertofishcatch($idtrfishcatchpostparam, $idmsbuyerparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewdelivery($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
			$idtrfishcatchpostparam = $request->idtrfishcatchpostparam;
			$totalpriceparam = $request->totalpriceparam;
			$descparamparam = $request->descparamparam;
			$settobuyerdateparam = $request->settobuyerdateparam;

			$table = new delivertable();
			$returnValue = $table->addnewdelivery($iddeliveryofflineparam, $idtrfishcatchpostparam, $totalpriceparam, $descparamparam, $settobuyerdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedelivery($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
			$totalpriceparam = $request->totalpriceparam;
			$descparamparam = $request->descparamparam;
			$settobuyerdateparam = $request->settobuyerdateparam;

			$table = new delivertable();
			$returnValue = $table->updatedelivery($iddeliveryofflineparam, $totalpriceparam, $descparamparam, $settobuyerdateparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliveryprice($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
			$totalpriceparam = $request->totalpriceparam;

			$table = new delivertable();
			$returnValue = $table->updatedeliveryprice($iddeliveryofflineparam, $totalpriceparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletedelivery($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;	

			$table = new delivertable();
			$returnValue = $table->deletedelivery($iddeliveryofflineparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewdeliverybatch($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;
			$idtrcatchofflineparam = $request->idtrcatchoffline;
			$totalpriceparam = $request->totalprice;
			$descparamparam = $request->desc;
			$sendtobuyerdateparam = $request->sendtobuyerdate;
			$deliverydateparam = $request->deliverydate;
			$transportbyparam = $request->transportby;
			$transportnameidparam = $request->transportnameid;
			$transportreceiptparam = $request->transportreceiptphoto;
			$idmsbuyerparam = $request->idmsbuyer;
			$idmssupplierparam = $request->idmssupplier;
			$deliverysheetofflineidparam = $request->deliverysheetofflineid;

			$table = new delivertable();
			$returnValue = $table->addnewdeliverybatch($iddeliveryofflineparam, $idtrcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $idmssupplierparam, $deliverysheetofflineidparam);

			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliverybatch($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;
			$idtrcatchofflineparam = $request->idtrcatchoffline;
			$totalpriceparam = $request->totalprice;
			$descparamparam = $request->desc;
			$sendtobuyerdateparam = $request->sendtobuyerdate;
			$deliverydateparam = $request->deliverydate;
			$transportbyparam = $request->transportby;
			$transportnameidparam = $request->transportnameid;
			$transportreceiptparam = $request->transportreceiptphoto;
			$idmsbuyerparam = $request->idmsbuyer;
			$deliverysheetofflineidparam = $request->deliverysheetofflineid;

			$table = new delivertable();
			$returnValue = $table->updatedeliverybatch($iddeliveryofflineparam, $idtrcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $deliverysheetofflineidparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function addnewdeliveryv2($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;
			$idtrfishcatchofflineparam = $request->idtrfishcatchoffline;
			$totalpriceparam = $request->totalprice;
			$descparamparam = $request->desc;
			$sendtobuyerdateparam = $request->sendtobuyerdate;
			$deliverydateparam = $request->deliverydate;
			$transportbyparam = $request->transportby;
			$transportnameidparam = $request->transportnameid;
			$transportreceiptparam = $request->transportreceiptphoto;
			$idmsbuyerparam = $request->idmsbuyer;
			$idmssupplierparam = $request->idmssupplier;
			$deliverysheetofflineidparam = $request->deliverysheetofflineid;

			$table = new delivertable();
			$returnValue = $table->addnewdeliveryv2($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $idmssupplierparam, $deliverysheetofflineidparam);

			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliveryv2($request)
	{
		try
		{
			$iddeliveryofflineparam = $request->iddeliveryoffline;
			$idtrfishcatchofflineparam = $request->idtrfishcatchoffline;
			$totalpriceparam = $request->totalprice;
			$descparamparam = $request->desc;
			$sendtobuyerdateparam = $request->sendtobuyerdate;
			$deliverydateparam = $request->deliverydate;
			$transportbyparam = $request->transportby;
			$transportnameidparam = $request->transportnameid;
			$transportreceiptparam = $request->transportreceiptphoto;
			$idmsbuyerparam = $request->idmsbuyer;
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;

			$table = new delivertable();
			$returnValue = $table->updatedeliveryv2($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $deliverysheetofflineidparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getdeliverybyidmssupplier()
	{
		$idmssuplierparam = htmlentities($_GET['id']);
		$table = new delivertable();
		$returnValue = $table->getdeliverybyidmssupplier($idmssuplierparam);
		return $returnValue;
	}

	function getdeliverybyidmssupplierv3()
	{
		$idmssuplierparam = htmlentities($_GET['id']);
		$table = new delivertable();
		$returnValue = $table->getdeliverybyidmssupplierv3($idmssuplierparam);
		return $returnValue;
	}

	function createdeliverysheet($request)
	{
		try
		{
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;
			$savedtextparam = $request->savedtextparam;

			$table = new delivertable();
			$returnValue = $table->createdeliverysheet($deliverysheetofflineidparam, $savedtextparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliverysheet($request)
	{
		try
		{
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;
			$savedtextparam = $request->savedtextparam;

			$table = new delivertable();
			$returnValue = $table->updatedeliverysheet($deliverysheetofflineidparam, $savedtextparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletedeliverysheet($request)
	{
		try
		{
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;

			$table = new delivertable();
			$returnValue = $table->deletedeliverysheet($deliverysheetofflineidparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function createdeliverysheetv2($request, $sender)
	{
		try
		{
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;
			$savedtextparam = $request->savedtextparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$table = new delivertable();
			$returnValue = $table->createdeliverysheet($deliverysheetofflineidparam, $savedtextparam);

			$test = json_decode($savedtextparam);
			//var_dump(!property_exists($test->deliverySheetData, "openBatchDeliveryOfflineId"));
			//die();
			if(!property_exists($test, "openBatchDeliveryOfflineId"))
			{
				$table->addnewtrbatchdeliverysheet($test->batchId,
					(property_exists($test->deliverySheetData, "nationalRegistrationSupplierCode") ? $test->deliverySheetData->nationalRegistrationSupplierCode : null),
					(property_exists($test->deliverySheetData, "supplierName") ? $test->deliverySheetData->supplierName : null),
					$idmssupplierparam,
					(property_exists($test->deliverySheetData, "deliveryDate") ? $test->deliverySheetData->deliveryDate : null),
					(property_exists($test->deliverySheetData, "numberOfFishOrLoin") ? $test->deliverySheetData->numberOfFishOrLoin : null),
					(property_exists($test->deliverySheetData, "totalWeight") ? $test->deliverySheetData->totalWeight : null),
					(property_exists($test->viewData, "sellPrice") ? $test->viewData->sellPrice : 0),
					(property_exists($test->viewData, "notes") ? $test->viewData->notes : null),
					(property_exists($test->viewData, "buyerId") ? $test->viewData->buyerId : null),
					(property_exists($test->viewData, "buyerName") ? $test->viewData->buyerName : null),
					$sender);

				for ($i=0; $i < count($test->fishCatchData); $i++) { 
					$table->addnewtrbatchdeliverysheetfishdata($test->batchId,
						(property_exists($test->fishCatchData[$i], "idtrfishcatch") ? $test->fishCatchData[$i]->idtrfishcatch : null),
						(property_exists($test->fishCatchData[$i], "idtrfishcatchoffline") ? $test->fishCatchData[$i]->idtrfishcatchoffline : null),
						(property_exists($test->fishCatchData[$i], "amount") ? $test->fishCatchData[$i]->amount : null),
						(property_exists($test->fishCatchData[$i], "grade") ? $test->fishCatchData[$i]->grade : null),
						(property_exists($test->fishCatchData[$i], "description") ? $test->fishCatchData[$i]->description : null),
						(property_exists($test->fishCatchData[$i], "idfish") ? $test->fishCatchData[$i]->idfish : null),
						(property_exists($test->fishCatchData[$i], "idtrcatchoffline") ? $test->fishCatchData[$i]->idtrcatchoffline : null),
						(property_exists($test->fishCatchData[$i], "fishNameEng") ? $test->fishCatchData[$i]->fishNameEng : null),
						(property_exists($test->fishCatchData[$i], "fishNameInd") ? $test->fishCatchData[$i]->fishNameInd : null),
						(property_exists($test->fishCatchData[$i], "unitName") ? $test->fishCatchData[$i]->unitName : null),
						(property_exists($test->fishCatchData[$i], "species") ? $test->fishCatchData[$i]->species : null),
						(property_exists($test->fishCatchData[$i], "vesselName") ? $test->fishCatchData[$i]->vesselName : null),
						(property_exists($test->fishCatchData[$i], "vesselSize") ? $test->fishCatchData[$i]->vesselSize : null),
						(property_exists($test->fishCatchData[$i], "vesselRegistrationNo") ? $test->fishCatchData[$i]->vesselRegistrationNo : null),
						(property_exists($test->fishCatchData[$i], "expiredDate") ? $test->fishCatchData[$i]->expiredDate : null),
						(property_exists($test->fishCatchData[$i], "vesselFlag") ? $test->fishCatchData[$i]->vesselFlag : null),
						(property_exists($test->fishCatchData[$i], "fishingGround") ? $test->fishCatchData[$i]->fishingGround : null),
						(property_exists($test->fishCatchData[$i], "landingSite") ? $test->fishCatchData[$i]->landingSite : null),
						(property_exists($test->fishCatchData[$i], "gearType") ? $test->fishCatchData[$i]->gearType : null),
						(property_exists($test->fishCatchData[$i], "catchDate") ? $test->fishCatchData[$i]->catchDate : null),
						(property_exists($test->fishCatchData[$i], "fishermanName") ? $test->fishCatchData[$i]->fishermanName : null),
						(property_exists($test->fishCatchData[$i], "landingDate") ? $test->fishCatchData[$i]->landingDate : null),
						(property_exists($test->fishCatchData[$i], "fadused") ? $test->fishCatchData[$i]->fadused : null),
						(property_exists($test->fishCatchData[$i], "sellPrice") ? $test->fishCatchData[$i]->sellPrice : 0),
						$sender);
				}

				return $returnValue;	
			}
			else
			{
				return ["err" =>  __FUNCTION__ . " Error : ". substr("open batch", 0, 2000)];
			}
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function updatedeliverysheetv2($request, $sender)
	{
		try
		{
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;
			$savedtextparam = $request->savedtextparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$table = new delivertable();
			$returnValue = $table->updatedeliverysheet($deliverysheetofflineidparam, $savedtextparam);

			$test = json_decode($savedtextparam);
			if(!property_exists($test, "openBatchDeliveryOfflineId"))
			{
				$table->deletetrbatchdeliverysheet($sender, $test->batchId);
				$table->deletetrbatchdeliverysheetfishdata($sender, $test->batchId);

				$table->addnewtrbatchdeliverysheet($test->batchId,
					(property_exists($test->deliverySheetData, "nationalRegistrationSupplierCode") ? $test->deliverySheetData->nationalRegistrationSupplierCode : null),
					(property_exists($test->deliverySheetData, "supplierName") ? $test->deliverySheetData->supplierName : null),
					$idmssupplierparam,
					(property_exists($test->deliverySheetData, "deliveryDate") ? $test->deliverySheetData->deliveryDate : null),
					(property_exists($test->deliverySheetData, "numberOfFishOrLoin") ? $test->deliverySheetData->numberOfFishOrLoin : null),
					(property_exists($test->deliverySheetData, "totalWeight") ? $test->deliverySheetData->totalWeight : null),
					(property_exists($test->viewData, "sellPrice") ? $test->viewData->sellPrice : 0),
					(property_exists($test->viewData, "notes") ? $test->viewData->notes : null),
					$sender);

				for ($i=0; $i < count($test->fishCatchData); $i++) { 
					$table->addnewtrbatchdeliverysheetfishdata($test->batchId,
						(property_exists($test->fishCatchData[$i], "idtrfishcatch") ? $test->fishCatchData[$i]->idtrfishcatch : null),
						(property_exists($test->fishCatchData[$i], "idtrfishcatchoffline") ? $test->fishCatchData[$i]->idtrfishcatchoffline : null),
						(property_exists($test->fishCatchData[$i], "amount") ? $test->fishCatchData[$i]->amount : null),
						(property_exists($test->fishCatchData[$i], "grade") ? $test->fishCatchData[$i]->grade : null),
						(property_exists($test->fishCatchData[$i], "description") ? $test->fishCatchData[$i]->description : null),
						(property_exists($test->fishCatchData[$i], "idfish") ? $test->fishCatchData[$i]->idfish : null),
						(property_exists($test->fishCatchData[$i], "idtrcatchoffline") ? $test->fishCatchData[$i]->idtrcatchoffline : null),
						(property_exists($test->fishCatchData[$i], "fishNameEng") ? $test->fishCatchData[$i]->fishNameEng : null),
						(property_exists($test->fishCatchData[$i], "fishNameInd") ? $test->fishCatchData[$i]->fishNameInd : null),
						(property_exists($test->fishCatchData[$i], "unitName") ? $test->fishCatchData[$i]->unitName : null),
						(property_exists($test->fishCatchData[$i], "species") ? $test->fishCatchData[$i]->species : null),
						(property_exists($test->fishCatchData[$i], "vesselName") ? $test->fishCatchData[$i]->vesselName : null),
						(property_exists($test->fishCatchData[$i], "vesselSize") ? $test->fishCatchData[$i]->vesselSize : null),
						(property_exists($test->fishCatchData[$i], "vesselRegistrationNo") ? $test->fishCatchData[$i]->vesselRegistrationNo : null),
						(property_exists($test->fishCatchData[$i], "expiredDate") ? $test->fishCatchData[$i]->expiredDate : null),
						(property_exists($test->fishCatchData[$i], "vesselFlag") ? $test->fishCatchData[$i]->vesselFlag : null),
						(property_exists($test->fishCatchData[$i], "fishingGround") ? $test->fishCatchData[$i]->fishingGround : null),
						(property_exists($test->fishCatchData[$i], "landingSite") ? $test->fishCatchData[$i]->landingSite : null),
						(property_exists($test->fishCatchData[$i], "gearType") ? $test->fishCatchData[$i]->gearType : null),
						(property_exists($test->fishCatchData[$i], "catchDate") ? $test->fishCatchData[$i]->catchDate : null),
						(property_exists($test->fishCatchData[$i], "fishermanName") ? $test->fishCatchData[$i]->fishermanName : null),
						(property_exists($test->fishCatchData[$i], "landingDate") ? $test->fishCatchData[$i]->landingDate : null),
						(property_exists($test->fishCatchData[$i], "fadused") ? $test->fishCatchData[$i]->fadused : null),
						(property_exists($test->fishCatchData[$i], "sellPrice") ? $test->fishCatchData[$i]->sellPrice : 0),
						$sender);
				}
				return $returnValue;
			}
			else
			{
				return ["err" =>  __FUNCTION__ . " Error : ". substr("open batch", 0, 2000)];
			}
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function deletedeliverysheetv2($request, $sender)
	{
		try
		{
			$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;

			$table = new delivertable();
			$returnValue = $table->deletedeliverysheet($deliverysheetofflineidparam);

			$table->deletetrbatchdeliverysheet($sender, $deliverysheetofflineidparam);
			$table->deletetrbatchdeliverysheetfishdata($sender, $deliverysheetofflineidparam);

			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getdeliverysheet()
	{
		$deliverysheetofflineidparam = htmlentities($_GET['id']);
		$table = new delivertable();
		$returnValue = $table->getdeliverysheet($deliverysheetofflineidparam);
		return $returnValue;
	}

	function getdeliverysheetbyidmssupplier()
	{
		$idmssupplierparam = htmlentities($_GET['id']);
		$table = new delivertable();
		$returnValue = $table->getdeliverysheetbyidmssupplier($idmssupplierparam);
		return $returnValue;
	}
	

	function getdeliverysheetbyiddelivery()
	{
		$iddeliveryparam = htmlentities($_GET['id']);
		$table = new delivertable();
		$returnValue = $table->getdeliverysheetbyiddelivery($iddeliveryparam);
		if($returnValue != null)
		{
			$data = json_decode($returnValue[0]->savedtext);
			$deliverySheetNo = $data->deliverySheetData->deliverySheetNo;
			$nationalRegistrationSupplierCode = $data->deliverySheetData->nationalRegistrationSupplierCode;
			$deliveryDate = $data->deliverySheetData->deliveryDate;
			$fish = "#".
					(property_exists($data->deliverySheetData, "species") ? $data->deliverySheetData->species : null).";". 
					(property_exists($data->deliverySheetData, "numberOfFishOrLoin") ? $data->deliverySheetData->numberOfFishOrLoin : null).";". 
					(property_exists($data->deliverySheetData, "totalWeight") ? $data->deliverySheetData->totalWeight : null).";";
			$vessel = "#".
					(property_exists($data->deliverySheetData, "vesselName") ? $data->deliverySheetData->vesselName : null).";".
					(property_exists($data->deliverySheetData, "vesselSize") ? $data->deliverySheetData->vesselSize : null).";".
					(property_exists($data->deliverySheetData, "vesselSize") ? $data->deliverySheetData->vesselSize : null).";".
					(property_exists($data->deliverySheetData, "vesselRegistrationNo") ? $data->deliverySheetData->vesselRegistrationNo : null).";".
					(property_exists($data->deliverySheetData, "expiredDate") ? $data->deliverySheetData->expiredDate : null).";".
					(property_exists($data->deliverySheetData, "vesselFlag") ? $data->deliverySheetData->vesselFlag : null).";".
					(property_exists($data->deliverySheetData, "fishingGround") ? $data->deliverySheetData->fishingGround : null).";".
					(property_exists($data->deliverySheetData, "landingSite") ? $data->deliverySheetData->landingSite : null).";".
					(property_exists($data->deliverySheetData, "gearType") ? $data->deliverySheetData->gearType : null).";".
					(property_exists($data->deliverySheetData, "catchDate") ? $data->deliverySheetData->catchDate : null).";";
			return 	$deliverySheetNo.";".
					$nationalRegistrationSupplierCode.";".
					$deliveryDate.";".
					$fish.$vessel;
		}
		else
			return "[]";
	}

	function getdeliverysheetbyiddeliverysheetno($deliverysheetno)
	{
		$table = new fishtable();
        //$data = $table->getkdedetailfromidfish($id)[0];
        $data = $table->getkdedetailfromiddeliverysheet($deliverysheetno);
        $returnValue = "";
        if($data)
        {
            $string1 =  $data[0]->deliverysheetno.";".
                            $data[0]->nationalregistrationsuppliercode.";".
                            $data[0]->deliverydate.";";

            $vesselname = "";
            $string2 = "";
            for ($i=0; $i < count($data); $i++)
            {
                if($vesselname != $data[$i]->vesselname)
                {

                    $string2 .= $vesselname == "" ? "" : "\r\n\r\n";
                    $vesselname = $data[$i]->vesselname;
                    $string2 .= 
                    $string1."#".
                    $data[$i]->vesselname.";".
                    $data[$i]->vesselsize.";".
                    $data[$i]->vesselregistrationno.";".
                    $data[$i]->vesselflag.";".
                    $data[$i]->fishingground.";".
                    $data[$i]->geartype.";".
                    $data[$i]->landingsite.";".
                    $data[$i]->landingdate.";".
                    $data[$i]->fishermanname."\r\n";
                }
                $string2 .= "#".
                    $data[$i]->idfish.";".
                    $data[$i]->species.";".
                    $data[$i]->grade.";".
                    $data[$i]->unitname.";".
                    $data[$i]->amount;
            }
            $returnValue = $string2;
            
        }
        return $returnValue;
	}

	function getmsinfo()
	{
		$id = htmlentities($_GET['id']);
		$table = new usertable();
		$data = $table->getmsinfo($id);
		if(count($data) > 0)
			return $data[0]->infodesc;
		else
			return "no data";
	}

	

	/*
	// fish config
	function addfishconfig($request)
	{
		$idmssupplierparam = $request->idmssupplierparam;
		$nameparam = $request->nameparam;
		$idmsfishparam = $request->idmsfishparam;
		$gradeparam = $request->gradeparam;
		$unitparam = $request->unitparam;
		$handlingparam = $request->handlingparam;

		$table = new buyfishtable();
		$returnValue = $table->addfishconfig($idmssupplierparam, $nameparam, $idmsfishparam, $gradeparam, $unitparam, $handlingparam);
		return $returnValue;
	}

	function updatefishconfig($request)
	{
		$idtrfishconfigparam = $request->idtrfishconfigparam;
		$idmssupplierparam = $request->idmssupplierparam;
		$nameparam = $request->nameparam;
		$idmsfishparam = $request->idmsfishparam;
		$gradeparam = $request->gradeparam;
		$unitparam = $request->unitparam;
		$handlingparam = $request->handlingparam;

		$table = new buyfishtable();
		$returnValue = $table->updatefishconfig($idtrfishconfigparam, $idmssupplierparam, $nameparam, $idmsfishparam, $gradeparam, $unitparam, $handlingparam);
		return $returnValue;
	}

	function deletefishconfig($request)
	{
		$idparam = $request->idtrfishconfigparam;

		$table = new buyfishtable();
		$returnValue = $table->deletefishconfig($idparam);
		return $returnValue;
	}

	// fish price config
	function addfishpriceconfig($request)
	{
		$idtrfishconfigparam = $request->idtrfishconfigparam;
		$idtrcatchparam = $request->idtrcatchparam;

		$table = new buyfishtable();
		$returnValue = $table->addfishpriceconfig($idtrfishconfigparam, $idtrcatchparam);
		return $returnValue;
	}

	function updatefishpriceconfig($request)
	{
		$idtrfishpriceconfigparam = $request->idtrfishpriceconfigparam;
		$idtrfishconfigparam = $request->idtrfishconfigparam;
		$idtrcatchparam = $request->idtrcatchparam;

		$table = new buyfishtable();
		$returnValue = $table->updatefishpriceconfig($idtrfishpriceconfigparam, $idtrfishconfigparam, $idtrcatchparam);
		return $returnValue;
	}

	function deletefishpriceconfig($request)
	{
		$idparam = $request->idtrfishpriceconfigparam;

		$table = new buyfishtable();
		$returnValue = $table->deletefishpriceconfig($idparam);
		return $returnValue;
	}
	*/
	// sync data
	function syncdata(Request $request)
	{
		$jsonParam = $request->jsonParam;
		$data = json_decode($jsonParam);

		$datastr = json_encode($data->data);
		$table = new synctable();
		$returnValue = $table->addsyncjson($data->sender, $datastr)[0]->id;

		$test = [];
		foreach ($data->data as $key => $value) {
			$param = json_encode($value->param);
			$returnValue1 = $table->addsyncdata($value->type, $value->function, $value->functionName, $param, $value->desc, $value->dateTime, $data->sender, $returnValue);

			$test[$key] = $this->{$value->functionName}($value->param, $data->sender);
		}
		return $test;
		//return "success";
	}

	// sync data
	function syncdatav2(Request $request)
	{
		try {
			$jsonParam = $request->jsonParam;
			$sender = $request->senderParam;

			$table = new synctable();
			$returnValue = $table->addsyncjson($sender, $jsonParam)[0]->id;

			$data = json_decode($jsonParam);

			$test = [];
			foreach ($data->data as $key => $value) {
				$param = json_encode($value->param);
				$returnValue1 = $table->addsyncdata($value->type, $value->function, $value->functionName, $param, $value->desc, $value->dateTime, $sender, $returnValue);

				try
				{
					$testErr = $this->{$value->functionName}($value->param, $sender);
					if (array_key_exists("err", $testErr))
					{
						$table->addtrsyncfailed($sender, $jsonParam, $returnValue,
							$value->functionName, $testErr["err"], $key);

						return ["success" => false,
								"err" => "Failed at: ". $value->functionName. " index: " . $key .", Success save error",
								"errIndex" => $key,
								"descerr" => "Err: " . $testErr["err"],
								"msg" => ""
								];
					}
					else
					{
						$test[$key] = $testErr;
					}
				}
				catch (\Exception $e) {
					return ["success" => false,
							"err" => "Failed at: ". $value->functionName. " index: " . $key .", Failed save error",
							"errIndex" => $key,
							"descerr" => "Err: " . substr($e, 0, 2000),
							"msg" => ""];
				}
			}
			return ["success" => true,
					"err" => "",
					"errIndex" => -1,
					"descerr" => "",
					"msg" => $test];
		}
		catch (\Exception $e) {
			try
			{
				$table->addtrsyncfailed($sender, $jsonParam, "failed at syncdatav2",
					"syncdatav2", substr($e, 0, 2000), 0);
				return ["success" => false,
						"err" => "Failed at syncdatav2, Success save error",
						"errIndex" => -1,
						"descerr" => "Err: " . substr($e, 0, 2000),
						"msg" => ""];
			}
			catch (\Exception $e) {
				return ["success" => false,
						"err" => "Failed at syncdatav2, Failed save error",
						"errIndex" => -1,
						"descerr" => "Err: " . substr($e, 0, 2000),
						"msg" => ""];
			}
		}
	}

	function syncdataget(Request $request)
	{
		/*
		$jsonParam = "{
			\"sender\" : \"c7e85d3557f511e89b2c88d7f61b4659\",
			\"data\" : [
				{
					\"type\" : \"create\",
					\"function\" : \"buyer\",
					\"functionName\" : \"addnewbuyer\",
					\"param\" : {
						\"name\" : \"Rambo\",
						\"idltusertype\" : \"4\",
						\"idmssupplier\" : \"8abe251b58e111e8a12988d7f61b4659\"
					},
					\"desc\" : \"create data buyer sebagai berikut : Rambo, 4, 8abe251b58e111e8a12988d7f61b4659\",
					\"dateTime\" : \"2018-05-03 13:20:14\"
				},
				{
					\"type\" : \"create\",
					\"function\" : \"buyer\",
					\"functionName\" : \"addnewbuyer\",
					\"param\" : {
						\"name\" : \"Bondbon\",
						\"idltusertype\" : \"4\",
						\"idmssupplier\" : \"8abe251b58e111e8a12988d7f61b4659\"
					},
					\"desc\" : \"create data buyer sebagai berikut : Bondbon, 4, 8abe251b58e111e8a12988d7f61b4659\",
					\"dateTime\" : \"2018-05-03 13:20:14\"
				}
			]
		}";*/
		/*
		// add new fisherman
		$jsonParam = 
		"{
			\"sender\": \"b08c5992802411e89cd1000d3aa384f1\",
			\"data\": [
				{
					\"type\": \"create\",
					\"function\": \"fisherman\",
					\"functionName\": \"addnewfisherman\",
					\"param\": {
						\"nameparam\": \"Dono\",
						\"bodparam\": \"1980-05-28 00:00:00\",
						\"photoparam\": \"\",
						\"fishermannatidparam\": \"123456789001\",
						\"groupfishingparam\": \"Sahabat\",
						\"positioninshipparam\": \"ABK\",
						\"idmssupplierparam\": \"8abe251b58e111e8a12988d7f61b4659\"
					},
					\"desc\": \"create data fisherman sebagai berikut : Dono,1980-05-28 00:00:00,,123456789001,Sahabat,ABK,8abe251b58e111e8a12988d7f61b4659\",
					\"dateTime\": \"2018-05-29 13:28:30\"
				}
			]
		}";*/

		// add new loan
		$jsonParam = 
		"{
			\"sender\": \"b08c5992802411e89cd1000d3aa384f1\",
			\"data\":
			[
				{
					\"type\": \"create\",
					\"function\": \"loan\",
					\"functionName\": \"addnewloan\",
					\"param\": {
						\"descparam\": \"beras 2kg\",
						\"rpparam\": \"10000\",
						\"idmsuserloanparam\": \"f89791835a6311e8a6c188d7f61b4659\",
						\"idmsusersupplierparam\": \"8ab2193258e111e8a12988d7f61b4659\",
						\"loandateparam\": \"2018-05-29 13:28:30\"
					},
					\"desc\": \"create data loan sebagai berikut : beras 2kg, 10000, f89791835a6311e8a6c188d7f61b4659, 8ab2193258e111e8a12988d7f61b4659, 2018-05-29 13:28:30 \",
					\"dateTime\": \"2018-05-30 13:28:30\"
				}
			]
		}";

		//$jsonParam = $request->jsonParam;
		$data = json_decode($jsonParam);
		$datastr = json_encode($data->data);
		$table = new synctable();
		$returnValue = $table->addsyncjson($data->sender, $datastr)[0]->id;

		$idtrcatchparam = "";
		foreach ($data->data as $key => $value) {
			$param = json_encode($value->param);
			$returnValue1 = $table->addsyncdata($value->type, $value->function, $value->functionName, $param, $value->desc, $value->dateTime, $data->sender, $returnValue);

			$this->{$value->functionName}($value->param);
			/*
			switch ($value->functionName) {
				case 'addcatch':
					$idtrcatchparam = $this->{$value->functionName}($value->param)[0]->id;
					break;
				case 'addfishcatch':
					$value->param->idtrcatchparam = $idtrcatchparam;
					$this->{$value->functionName}($value->param);
					break;
				default:
					$this->{$value->functionName}($value->param);
					break;
			}*/
		}

		return "success";		
	}

	function syncdatagetBuyFish(Request $request)
	{
		$jsonParam = 
		"{
			\"sender\": \"8ab2193258e111e8a12988d7f61b4659\",
			\"data\":
			[
				{
					\"type\": \"create\",
					\"function\": \"catch\",
					\"functionName\": \"addcatch\",
					\"param\": {
						\"idmssupplierparam\": \"8ab2193258e111e8a12988d7f61b4659\",
						\"idmsfishermanparam\": \"8ab2193258e111e8a12988d7f61b4659\",
						\"idmsshipparam\": \"8ab2193258e111e8a12988d7f61b4659\",
						\"idmsfishparam\": \"8ab2193258e111e8a12988d7f61b4659\",
						\"varianceparam\": \"entah ini diisi apa\",
						\"dispatchnotephotoparam\": \"photo.png\",
						\"locationparam\": \"X23\",
						\"saildateparam\": \"2018-05-30 13:28:30\"
					},
					\"desc\": \"create data catch sebagai berikut : 8ab2193258e111e8a12988d7f61b4659, 8ab2193258e111e8a12988d7f61b4659, 8ab2193258e111e8a12988d7f61b4659, entah ini diisi apa, photo.png, X23, 2018-05-30 13:28:30 \",
					\"dateTime\": \"2018-05-30 13:28:30\"
				},

				{
					\"type\": \"create\",
					\"function\": \"catch\",
					\"functionName\": \"addfishcatch\",
					\"param\": {
						\"amountparam\": \"1\",
						\"gradeparam\": \"AA\",
						\"descparam\": \"entah ini diisi apa\"
					},
					\"desc\": \"create data catch sebagai berikut : 1, AA, entah ini diisi apa\",
					\"dateTime\": \"2018-05-30 13:28:30\"
				},
				{
					\"type\": \"create\",
					\"function\": \"catch\",
					\"functionName\": \"addfishcatch\",
					\"param\": {
						\"amountparam\": \"36\",
						\"gradeparam\": \"B\",
						\"descparam\": \"entah ini diisi apa\"
					},
					\"desc\": \"create data catch sebagai berikut : 1, AA, entah ini diisi apa\",
					\"dateTime\": \"2018-05-30 13:28:30\"
				}
			]
		}";

		$data = json_decode($jsonParam);
		$datastr = json_encode($data->data);
		$table = new synctable();
		$returnValue = $table->addsyncjson($data->sender, $datastr)[0]->id;

		$idtrcatchparam = "";
		foreach ($data->data as $key => $value) {
			$param = json_encode($value->param);
			$returnValue1 = $table->addsyncdata($value->type, $value->function, $value->functionName, $param, $value->desc, $value->dateTime, $data->sender, $returnValue);

			if($value->functionName == "addcatch")
			{
				$idtrcatchparam = $this->{$value->functionName}($value->param)[0]->id;
			}
			else if($value->functionName == "addfishcatch")
			{
				$value->param->idtrcatchparam = $idtrcatchparam;
				$this->{$value->functionName}($value->param);
			}			
		}

		return "success";
	}
	/*
	function createFishID()
	{
		$t = floor(microtime(true) * 10);
		$uid = base_convert($t, 10, 36);
		$value = "0000" . $uid;
		$value = substr($value, strlen($value) - 8, 8);
		return $value;
	}

	function toUID($baseID, $multiplier = 1)
	{
		return base_convert($baseID * $multiplier, 10, 36);
	}

	function fromUID($baseID, $multiplier = 1)
	{
		return (int)base_convert($uid, 36, 10) / $multiplier;
	}*/

	function migrateDelivery()
	{
		$table = new delivertable();
		$returnValue = $table->getalldeliverysheet();
		$countitung = 0;
		for ($i=0; $i < count($returnValue); $i++) { 
		//for ($i=0; $i < 100; $i++) { 
			$test = json_decode($returnValue[$i]->savedtext);
			$openBatchDeliveryOfflineId = property_exists($test, "openBatchDeliveryOfflineId") ? 
				$test->openBatchDeliveryOfflineId : null;
			$batchId = property_exists($test, "batchId") ? 
				$test->batchId : null;
			$idData = $openBatchDeliveryOfflineId != null ? $openBatchDeliveryOfflineId : ($batchId != null ? $batchId : null);
			$id = $idData == $returnValue[$i]->deliverysheetofflineid ? $idData : $returnValue[$i]->deliverysheetofflineid;

			$batchId = $id;
			$deliverySheetData = null;
			$viewData = null;
			$fishCatchData = null;
			$idmssupplierparam = $returnValue[$i]->idmssupplier;
			$namesupplier = $returnValue[$i]->namesupplier;

			$nationalRegistrationSupplierCode = property_exists($test, "businesslicense") ? $test->businesslicense : $returnValue[$i]->businesslicense;
			$sender = "b08c5992802411e89cd1000d3aa384f1";

			if(property_exists($test, "deliverySheetData"))
			{
				$countitung++;
				$deliverySheetData = $test->deliverySheetData;
				if(property_exists($test, "viewData"))
				{
					$viewData = $test->viewData;
				}

				if(property_exists($test, "fishCatchData"))
				{
					$fishCatchData = $test->fishCatchData;
				}

				$sellPrice = $viewData->sellPrice;
				$table->addnewtrbatchdeliverysheet($batchId,
					$deliverySheetData->nationalRegistrationSupplierCode,
					$namesupplier,
					$idmssupplierparam,
					$deliverySheetData->deliveryDate,
					$deliverySheetData->numberOfFishOrLoin,
					$deliverySheetData->totalWeight,
					$sellPrice,
					$viewData->notes,
					(property_exists($viewData, "buyerId") ? $viewData->buyerId : null),
					(property_exists($viewData, "buyerName") ? $viewData->buyerName : null),
					$sender);

				for ($j=0; $j < count($fishCatchData); $j++) { 
					$table->addnewtrbatchdeliverysheetfishdata($batchId,
						(property_exists($fishCatchData[$j], "idtrfishcatch") ? $fishCatchData[$j]->idtrfishcatch : null),
						$fishCatchData[$j]->idtrfishcatchoffline,
						$fishCatchData[$j]->amount,
						$fishCatchData[$j]->grade,
						$fishCatchData[$j]->description,
						$fishCatchData[$j]->idfish,
						(property_exists($fishCatchData[$j], "idtrcatchoffline") ? $fishCatchData[$j]->idtrcatchoffline : null),
						(property_exists($fishCatchData[$j], "fishNameEng") ? $fishCatchData[$j]->fishNameEng : null),
						(property_exists($fishCatchData[$j], "fishNameInd") ? $fishCatchData[$j]->fishNameInd : null),
						(property_exists($fishCatchData[$j], "unitName") ? $fishCatchData[$j]->unitName : null),
						(property_exists($fishCatchData[$j], "species") ? $fishCatchData[$j]->species : null),
						(property_exists($fishCatchData[$j], "vesselName") ? $fishCatchData[$j]->vesselName : null),
						(property_exists($fishCatchData[$j], "vesselSize") ? $fishCatchData[$j]->vesselSize : null),
						(property_exists($fishCatchData[$j], "vesselRegistrationNo") ? $fishCatchData[$j]->vesselRegistrationNo : null),
						(property_exists($fishCatchData[$j], "expiredDate") ? $fishCatchData[$j]->expiredDate : null),
						(property_exists($fishCatchData[$j], "vesselFlag") ? $fishCatchData[$j]->vesselFlag : null),
						(property_exists($fishCatchData[$j], "fishingGround") ? $fishCatchData[$j]->fishingGround : null),
						(property_exists($fishCatchData[$j], "landingSite") ? $fishCatchData[$j]->landingSite : null),
						(property_exists($fishCatchData[$j], "gearType") ? $fishCatchData[$j]->gearType : null),
						(property_exists($fishCatchData[$j], "catchDate") ? $fishCatchData[$j]->catchDate : null),
						(property_exists($fishCatchData[$j], "fishermanName") ? $fishCatchData[$j]->fishermanName : null),
						(property_exists($fishCatchData[$j], "landingDate") ? $fishCatchData[$j]->landingDate : null),
						(property_exists($fishCatchData[$j], "fadused") ? $fishCatchData[$j]->fadused : null),
						(is_numeric($sellPrice) ? $sellPrice/count($fishCatchData) : 0),
						$sender);
				}
			}
			/*
				else if(property_exists($test, "openBatchDeliveryOfflineId"))
				{
					var_dump($id, $test);
					var_dump("<br/><br/>");
					if(property_exists($test, "batchDeliveries"))
					{
						for ($j=0; $j < count($test->batchDeliveries); $j++) { 
							$totalWeight = 0;
							$batchId = $test->batchDeliveries[$j]->deliverysheetofflineid;

							for ($k=0; $k < count($test->batchDeliveries[$j]->fish); $k++) { 
								$totalWeight += $test->batchDeliveries[$j]->fish[$k]->amount;

								$returnValue1 = $table->getfishnamebyidtrcatchoffline($test->batchDeliveries[$j]->fish[$k]->idtrcatchoffline);

								$fishNameEng = null;
								$fishNameInd = null;
								$species = null;
								$fishermanname = null;
								$landingDate = null;
								$fadused = null;
								$landingSite = null;
								$fishingGround = null;
								$catchDate = null;
								$priceperfish = null;
								
								$vesselname_param = null;
								$vesselsize_param = null;
								$vesselflag_param = null;
								$vesselgeartype_param = null;
								$vessellicensenumber_param = null;
								$vessellicenseexpiredate_param = null;

								if(count($returnValue1) > 0)
								{
									$fishNameEng = $returnValue1[0]->english_name;
									$fishNameInd = $returnValue1[0]->indonesian_name;
									$species = $returnValue1[0]->threea_code;
									$fishermanname = $returnValue1[0]->fishermanname;
									$landingDate = $returnValue1[0]->landingreturndate;
									$fadused = $returnValue1[0]->fadused;
									$landingSite = $returnValue1[0]->portname;
									$fishingGround = $returnValue1[0]->fishinggroundarea;
									$catchDate = $returnValue1[0]->purchasedate;
									$priceperfish = $test->batchDeliveries[$j]->sellPrice / count($test->batchDeliveries[$j]->fish);
									
									$vesselname_param = $returnValue1[0]->vesselname_param;
									$vesselsize_param = $returnValue1[0]->vesselsize_param;
									$vesselflag_param = $returnValue1[0]->vesselflag_param;
									$vesselgeartype_param = $returnValue1[0]->vesselgeartype_param;
									$vessellicensenumber_param = $returnValue1[0]->vessellicensenumber_param;
									$vessellicenseexpiredate_param = $returnValue1[0]->vessellicenseexpiredate_param;
								}

								$table->addnewtrbatchdeliverysheetfishdata($batchId,
									$test->batchDeliveries[$j]->fish[$k]->idtrfishcatch,
									$test->batchDeliveries[$j]->fish[$k]->idtrfishcatchoffline,
									$test->batchDeliveries[$j]->fish[$k]->amount,
									$test->batchDeliveries[$j]->fish[$k]->grade,
									$test->batchDeliveries[$j]->fish[$k]->description,
									$test->batchDeliveries[$j]->fish[$k]->idfish,
									$test->batchDeliveries[$j]->fish[$k]->idtrcatchoffline,
									$fishNameEng,
									$fishNameInd,
									"",
									$species,
									$vesselname_param,
									$vesselsize_param,
									$vessellicensenumber_param,
									$vessellicenseexpiredate_param,
									$vesselflag_param,
									$fishingGround,
									$landingSite,
									$vesselgeartype_param,
									$catchDate,
									$fishermanname,
									$landingDate,
									$fadused,
									$priceperfish,
									$sender);
								var_dump($batchId,
									$test->batchDeliveries[$j]->fish[$k]->idtrfishcatch,
									$test->batchDeliveries[$j]->fish[$k]->idtrfishcatchoffline,
									$test->batchDeliveries[$j]->fish[$k]->amount,
									$test->batchDeliveries[$j]->fish[$k]->grade,
									$test->batchDeliveries[$j]->fish[$k]->description,
									$test->batchDeliveries[$j]->fish[$k]->idfish,
									$test->batchDeliveries[$j]->fish[$k]->idtrcatchoffline,
									$fishNameEng,
									$fishNameInd,
									"",
									$species,
									$vesselname_param,
									$vesselsize_param,
									$vessellicensenumber_param,
									$vessellicenseexpiredate_param,
									$vesselflag_param,
									$fishingGround,
									$landingSite,
									$vesselgeartype_param,
									$catchDate,
									$fishermanname,
									$landingDate,
									$fadused,
									$priceperfish,
									$sender);
								var_dump("<br/><br/>");
							}

							$table->addnewtrbatchdeliverysheet($batchId,
									$nationalRegistrationSupplierCode,
									$namesupplier,
									$idmssupplierparam,
									$test->batchDeliveries[$j]->deliverDate,
									count($test->batchDeliveries[$j]->fish),
									$totalWeight,
									$test->batchDeliveries[$j]->sellPrice,
									null,
									$sender);

						}
					}
				}
			*/
		}

		var_dump($countitung);
  }
  
  // catch v5
	function addcatchv5($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
      $postdateparam = $request->postdateparam;      
      $closeparam = isset($request->closeparam) ? $request->closeparam : "0";
      $fishermannameparam = isset($request->fishermannameparam) ? $request->fishermannameparam : "";
      $fishermanidparam = isset($request->fishermanidparam) ? $request->fishermanidparam : "";
      $fishermanregnumberparam = isset($request->fishermanregnumberparam) ? $request->fishermanregnumberparam : "";

			$table = new buyfishtable();
			$returnValue = $table->addcatchv5($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender, $fishermannameparam, $fishermanidparam, $fishermanregnumberparam, $closeparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

  function updatecatchv5($request, $sender)
	{
		try
		{
			$idtrcatchofflineparam = $request->idtrcatchofflineparam;
			$idmssupplierparam = $request->idmssupplierparam;

			$idfishermanoffline = $request->idfishermanofflineparam;
			$idbuyeroffline = $request->idbuyerofflineparam;
			$idshipoffline = $request->idshipofflineparam;
			$idfishoffline = $request->idfishofflineparam;

			$purchasedateparam = $request->purchasedateparam;
			$purchasetimeparam = $request->purchasetimeparam;
			$catchorfarmedparam = $request->catchorfarmedparam;
			$bycatchparam = $request->bycatchparam;
			$fadusedparam = $request->fadusedparam;
			$purchaseuniquenoparam = $request->purchaseuniquenoparam;
			$productformatlandingparam = $request->productformatlandingparam;
			$unitmeasurementparam = $request->unitmeasurementparam;
			$quantityparam = $request->quantityparam;
			$weightparam = $request->weightparam;
			$fishinggroundareaparam = $request->fishinggroundareaparam;
			$purchaselocationparam = $request->purchaselocationparam;
			$uniquetripidparam = $request->uniquetripidparam;
			$datetimevesseldepartureparam = $request->datetimevesseldepartureparam;
			$datetimevesselreturnparam = $request->datetimevesselreturnparam;
			$portnameparam = $request->portnameparam;
			$priceperkgparam = $request->priceperkgparam;
			$totalpriceparam = $request->totalpriceparam;
			$loanexpenseparam = $request->loanexpenseparam;
			$otherexpenseparam = $request->otherexpenseparam;
			$postdateparam = $request->postdateparam;
			$closeparam = isset($request->closeparam) ? $request->closeparam : "0" ;
			$fishermannameparam = isset($request->fishermannameparam) ? $request->fishermannameparam : "";
			$fishermanidparam = isset($request->fishermanidparam) ? $request->fishermanidparam : "";
			$fishermanregnumberparam = isset($request->fishermanregnumberparam) ? $request->fishermanregnumberparam : "";

			$table = new buyfishtable();
			$returnValue = $table->updatecatchv5($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender, $fishermannameparam, $fishermanidparam, $fishermanregnumberparam);
			return $returnValue;
		}
		catch (\Exception $e) {
			return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
		}
	}

	function getcatchbyidmssupplierv5()
	{
		$idmssupplierparam = htmlentities($_GET['id']);

		$table = new buyfishtable();
		$returnValue = $table->getcatchbyidmssupplierv5($idmssupplierparam, -1, -1, -1);
		return $returnValue;
	}

  function addfishcatchv4($request, $sender)
  {
    try
    {
      $idtrcatchofflineparam = $request->idtrcatchofflineparam;
      $idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
      $amountparam = $request->amountparam;
      $gradeparam = $request->gradeparam;
      $descparam = $request->descparam;
      $idfishparam = $request->idfishparam;
      $uplineparam = isset($request->uplineparam) ? $request->uplineparam : "";

      $table = new buyfishtable();
      $returnValue = $table->addfishcatchv4($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam,
      $gradeparam, $descparam, $idfishparam, $sender, $uplineparam);
      return $returnValue;
    }
    catch (\Exception $e) {
      return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
    }
	}
	
	function getcatchbyidmssupplierv6()
	{
		$idmssupplierparam = htmlentities($_GET['id']);
		$table = new buyfishtable();
		$date2 = strtotime("now");
		$date1 = strtotime("first day of last month");
		$m1 = date("m",$date1);
		$y1 = date("Y",$date1);
		$m2 = date("m",$date2);
		$y2 = date("Y",$date2);
		$returnValue = $table->getcatchbyidmssupplierv6($idmssupplierparam, $m1, $y1, $m2, $y2);
		return $returnValue;
	}

	function getloanlistbyidmssupplierv6()
	{
		$idmssupplier = htmlentities($_GET['id']);
		$table = new loantable();
		$date2 = strtotime("now");
		$date1 = strtotime("first day of last month");
		$m1 = date("m",$date1);
		$y1 = date("Y",$date1);
		$m2 = date("m",$date2);
		$y2 = date("Y",$date2);
		$returnValue = $table->getloanlistbyidmssupplierv6($idmssupplier, $m1, $y1, $m2, $y2);
		return $returnValue;
	}

	function getdeliverysheetbyidmssupplierv6()
	{
		$idmssupplierparam = htmlentities($_GET['id']);
		$table = new delivertable();
		$date2 = strtotime("now");
		$date1 = strtotime("first day of last month");
		$m1 = date("m",$date1);
		$y1 = date("Y",$date1);
		$m2 = date("m",$date2);
		$y2 = date("Y",$date2);
		$returnValue = $table->getdeliverysheetbyidmssupplierv6($idmssupplierparam, $m1, $y1, $m2, $y2);
		return $returnValue;
	}

	function getdeliverysheetbymonthyear()
	{
		$idmssupplierparam = htmlentities($_GET['id']);
		$m = htmlentities($_GET['m']);
		$y = htmlentities($_GET['y']);
		$table = new delivertable();
		$returnValue = $table->getdeliverysheetbyidmssupplierv6($idmssupplierparam, $m, $y, $m, $y);
		return $returnValue;
	}

	function getcatchbymonthyear()
	{
		$idmssupplierparam = htmlentities($_GET['id']);
		$m = htmlentities($_GET['m']);
		$y = htmlentities($_GET['y']);
		$table = new buyfishtable();
		$returnValue = $table->getcatchbyidmssupplierv5($idmssupplierparam, -1, $m, $y);
		return $returnValue;
	}

}