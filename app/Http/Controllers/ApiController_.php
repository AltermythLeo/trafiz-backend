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

	function regisSupplier2(Request $request)
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

	function editSupplier($request)
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

	function editSupplier2($request)
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
                if(length($data) == 0)
	               	return ["err" => "success",
						"data" => ""];
				else
					return ["err" => "err",
						"data" => $data[0]->textcheck];
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
                    $supidexpireddate);
            if(length($data) == 0)
               	return ["err" => "success",
						"data" => ""];
			else
				return ["err" => "err",
						"data" => $data[0]->textcheck];
        }
	}
	

	// fisherman
	function addnewfisherman($request)
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

	function updatefisherman($request)
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

	function addnewfishermanv2($request)
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

	function updatefishermanv2($request)
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

	function addnewfishermanv3($request)
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

	function updatefishermanv3($request)
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

	function deletefisherman($request)
	{
		$idfishermanofflineparam = $request->idfishermanofflineparam;
		$table = new fishermantable();
		$returnValue = $table->deletefisherman($idfishermanofflineparam);
		return $returnValue;
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

	function updateship($request)
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

	function deleteship($request)
	{
		$idshipofflineparam = $request->idshipofflineparam;
		$table = new shiptable();
		$returnValue = $table->deleteship($idshipofflineparam);
		return $returnValue;
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

	function updatefish($request)
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

	function deletefish($request)
	{
		$idfishofflineparam = $request->idfishofflineparam;
		$table = new fishtable();
		$returnValue = $table->deletefish($idfishofflineparam);
		return $returnValue;
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
		$fileuploadparam = $request->photoparam;

    	$request->validate([
            'photoparam' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$fileuploadparam->getClientOriginalExtension();
        $fileuploadparam->move(public_path('imgupload'), $imageName);

    	return $imageName;
	}

	// buyer
	function addnewbuyer($request)
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

	function updatebuyer($request)
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

	function deletebuyer($request)
	{
		$idbuyerofflineparam = $request->idbuyerofflineparam;
		$table = new buyertable();
		$returnValue = $table->deletebuyer($idbuyerofflineparam);
		return $returnValue;
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

	function updateloan($request)
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

	function deleteloan($request)
	{
		$idtrloanparam = $request->idtrloanparam;
		$table = new loantable();
		$returnValue = $table->deleteloan($idtrloanparam);
		return $returnValue;
	}

	// loanv2
	function addnewloanv2($request)
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

	function updateloanv2($request)
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

	function deleteloanv2($request)
	{
		$idloanofflineparam = $request->idloanofflineparam;
		$table = new loantable();
		$returnValue = $table->deleteloan($idloanofflineparam);
		return $returnValue;
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

	// pay loan
	function payloan($request)
	{
		$idtrloanparam = $request->idtrloanparam;
		$paidoffdateparam = $request->paidoffdateparam;
		$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
		
		$table = new loantable();
		$returnValue = $table->payloan($idtrloanparam, $paidoffdateparam, $paidoffidmsuserofficerparam);
		return $returnValue;
	}

	function cancelpayloan($request)
	{
		$idtrloanparam = $request->idtrloanparam;
		
		$table = new loantable();
		$returnValue = $table->cancelpayloan($idtrloanparam);
		return $returnValue;
	}

	function addpayloan($request)
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

	function updatepayloan($request)
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

	function deletepayloan($request)
	{
		$idtrpayloanparam = $request->idtrpayloanparam;
		$table = new loantable();
		$returnValue = $table->deletepayloan($idtrpayloanparam);
		return $returnValue;
	}

	// payloan v2
	function payloanv2($request)
	{
		$idloanofflineparam = $request->idloanofflineparam;
		$paidoffdateparam = $request->paidoffdateparam;
		$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
		
		$table = new loantable();
		$returnValue = $table->payloanv2($idloanofflineparam, $paidoffdateparam, $paidoffidmsuserofficerparam);
		return $returnValue;
	}

	function cancelpayloanv2($request)
	{
		$idloanofflineparam = $request->idloanofflineparam;
		
		$table = new loantable();
		$returnValue = $table->cancelpayloanv2($idloanofflineparam);
		return $returnValue;
	}

	function addpayloanv2($request)
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

	function updatepayloanv2($request)
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

	function deletepayloanv2($request)
	{
		$idpayloanofflineparam = $request->idpayloanofflineparam;
		$table = new loantable();
		$returnValue = $table->deletepayloanv2($idpayloanofflineparam);
		return $returnValue;
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

	function updatebuyerv3($request)
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

	function updateloanv3($request, $sender)
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

	function deleteloanv3($request, $sender)
	{
		$idloanofflineparam = $request->idloanofflineparam;
		$table = new loantable();
		$returnValue = $table->deleteloanv3($idloanofflineparam, $sender);
		return $returnValue;
	}

	// payloan v3
	function addpayloanv3($request, $sender)
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

	function updatepayloanv3($request, $sender)
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

	function deletepayloanv3($request, $sender)
	{
		$idpayloanofflineparam = $request->idpayloanofflineparam;
		$table = new loantable();
		$returnValue = $table->deletepayloanv3($idpayloanofflineparam, $sender);
		return $returnValue;
	}

	function payloanv3($request, $sender)
	{
		$idloanofflineparam = $request->idloanofflineparam;
		$paidoffdateparam = $request->paidoffdateparam;
		$paidoffidmsuserofficerparam = $request->paidoffidmsuserofficerparam;
		
		$table = new loantable();
		$returnValue = $table->payloanv3($idloanofflineparam, $paidoffdateparam, $paidoffidmsuserofficerparam, $sender);
		return $returnValue;
	}

	function cancelpayloanv3($request, $sender)
	{
		$idloanofflineparam = $request->idloanofflineparam;
		
		$table = new loantable();
		$returnValue = $table->cancelpayloanv3($idloanofflineparam, $sender);
		return $returnValue;
	}

	// catch v3
	function addcatchv3($request, $sender)
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

	function updatecatchv3($request, $sender)
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

	function deletecatchv3($request, $sender)
	{
		$idparam = $request->idtrcatchofflineparam;

		$table = new buyfishtable();
		$returnValue = $table->deletecatchv3($idparam, $sender);
		return $returnValue;
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

	function updatefishcatchv3($request, $sender)
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

	function deletefishcatchv3($request, $sender)
	{
		$idparam = $request->idtrfishcatchofflineparam;

		$table = new buyfishtable();
		$returnValue = $table->deletefishcatchv3($idparam, $sender);
		return $returnValue;
	}

	// delivery v3
	function addnewdeliveryv3($request, $sender)
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

	function updatedeliveryv3($request, $sender)
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

	function deletedeliveryv3($request, $sender)
	{
		$iddeliveryofflineparam = $request->iddeliveryoffline;	

		$table = new delivertable();
		$returnValue = $table->deletedelivery($iddeliveryofflineparam, $sender);
		return $returnValue;
	}

	function updatedeliverypricev3($request, $sender)
	{
		$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
		$totalpriceparam = $request->totalpriceparam;

		$table = new delivertable();
		$returnValue = $table->updatedeliverypricev3($iddeliveryofflineparam, $totalpriceparam, $sender);
		return $returnValue;
	}


	// add catch v4
	function addcatchv4($request, $sender)
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

	function updatecatchv4($request, $sender)
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
		$notes = $request->noteparam;

		$table = new buyfishtable();
		$returnValue = $table->updatecatchv4($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender, $notes);
		return $returnValue;
	}

	// loan v4
	function addnewloanv4($request, $sender)
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

	function updateloanv4($request, $sender)
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

	function addnewtypeitemloan($request, $sender)
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

	function updatetypeitemloan($request, $sender)
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

	function deletetypeitemloan($request, $sender)
	{
		$idmstypeitemloanofflineparam = $request->idmstypeitemloanofflineparam;

		$table = new loantable();
		$returnValue = $table->deletetypeitemloan($idmstypeitemloanofflineparam, $sender);
		return $returnValue;
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

	function updatecatch($request)
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

	function deletecatch($request)
	{
		$idparam = $request->idtrcatchofflineparam;

		$table = new buyfishtable();
		$returnValue = $table->deletecatch($idparam);
		return $returnValue;
	}

	function addcatchv2($request)
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

	function updatecatchv2($request)
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

	function updateshipv3($request)
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

	//
	function addcatchsupplier($request)
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
	
	function updatecatchsupplier($request)
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

	// fish catch
	function addfishcatch($request)
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

	function addfishcatchv2($request)
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


	function updatefishcatch($request)
	{
		$idtrfishcatchofflineparam = $request->idtrfishcatchofflineparam;
		$amountparam = $request->amountparam;
		$gradeparam = $request->gradeparam;
		$descparam = $request->descparam;

		$table = new buyfishtable();
		$returnValue = $table->updatefishcatch($idtrfishcatchofflineparam, $amountparam, $gradeparam, $descparam);
		return $returnValue;
	}

	function deletefishcatch($request)
	{
		$idparam = $request->idtrfishcatchofflineparam;

		$table = new buyfishtable();
		$returnValue = $table->deletefishcatch($idparam);
		return $returnValue;
	}

	// add delivery
	
	function setbuyertofishcatch($request)
	{
		$idtrfishcatchpostparam = $request->idtrfishcatchpostparam;	
		$idmsbuyerparam = $request->idmsbuyerparam;

		$table = new delivertable();
		$returnValue = $table->setbuyertofishcatch($idtrfishcatchpostparam, $idmsbuyerparam);
		return $returnValue;
	}

	function addnewdelivery($request)
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

	function updatedelivery($request)
	{
		$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
		$totalpriceparam = $request->totalpriceparam;
		$descparamparam = $request->descparamparam;
		$settobuyerdateparam = $request->settobuyerdateparam;

		$table = new delivertable();
		$returnValue = $table->updatedelivery($iddeliveryofflineparam, $totalpriceparam, $descparamparam, $settobuyerdateparam);
		return $returnValue;
	}

	function updatedeliveryprice($request)
	{
		$iddeliveryofflineparam = $request->iddeliveryofflineparam;	
		$totalpriceparam = $request->totalpriceparam;

		$table = new delivertable();
		$returnValue = $table->updatedeliveryprice($iddeliveryofflineparam, $totalpriceparam);
		return $returnValue;
	}

	function deletedelivery($request)
	{
		$iddeliveryofflineparam = $request->iddeliveryoffline;	

		$table = new delivertable();
		$returnValue = $table->deletedelivery($iddeliveryofflineparam);
		return $returnValue;
	}

	function addnewdeliverybatch($request)
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

	function updatedeliverybatch($request)
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

	function addnewdeliveryv2($request)
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

	function updatedeliveryv2($request)
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
		$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;
		$savedtextparam = $request->savedtextparam;

		$table = new delivertable();
		$returnValue = $table->createdeliverysheet($deliverysheetofflineidparam, $savedtextparam);
		return $returnValue;	
	}

	function updatedeliverysheet($request)
	{
		$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;
		$savedtextparam = $request->savedtextparam;

		$table = new delivertable();
		$returnValue = $table->updatedeliverysheet($deliverysheetofflineidparam, $savedtextparam);
		return $returnValue;	
	}

	function deletedeliverysheet($request)
	{
		$deliverysheetofflineidparam = $request->deliverysheetofflineidparam;

		$table = new delivertable();
		$returnValue = $table->deletedeliverysheet($deliverysheetofflineidparam);
		return $returnValue;	
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
			$fish = "#".$data->deliverySheetData->species .";". 
					$data->deliverySheetData->numberOfFishOrLoin.";".
					$data->deliverySheetData->totalWeight .";";
			$vessel = "#".$data->deliverySheetData->vesselName .";". 
					$data->deliverySheetData->vesselSize.";".
					$data->deliverySheetData->vesselRegistrationNo .";".
					$data->deliverySheetData->expiredDate .";".
					$data->deliverySheetData->vesselFlag .";".
					$data->deliverySheetData->fishingGround .";".
					$data->deliverySheetData->landingSite .";".
					$data->deliverySheetData->gearType .";".
					$data->deliverySheetData->catchDate .";";
			return 	$deliverySheetNo.";".
					$nationalRegistrationSupplierCode.";".
					$deliveryDate.";".
					$fish.$vessel;
		}
		else
			return "[]";
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

		$idtrcatchparam = "";
		$test = [];
		foreach ($data->data as $key => $value) {
			$param = json_encode($value->param);
			$returnValue1 = $table->addsyncdata($value->type, $value->function, $value->functionName, $param, $value->desc, $value->dateTime, $data->sender, $returnValue);

			$test[$key] = $this->{$value->functionName}($value->param, $data->sender);
		}
		return $test;
		//return "success";
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
			\"sender\": \"8ab2193258e111e8a12988d7f61b4659\",
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
			\"sender\": \"8ab2193258e111e8a12988d7f61b4659\",
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
}