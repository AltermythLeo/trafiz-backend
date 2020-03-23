<?php
namespace App\lib;
use DB;
use App\lib\Helper;
use Illuminate\Support\Facades\Hash;

class officertable {
	function getofficer()
	{
		$data = DB::select("CALL getofficer()");
		return $data;
	}

	function deleteofficer($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deleteofficer(".$idparam.")");
		return $data;
	}

	function updateofficer($idparam, $nameparam, $usernameparam, $emailparam, $phonenumberparam, $passwordparam, $admintype, $activeparam, $langparam)
	{
		$stringDesc = $idparam.", ".$nameparam.", ".$usernameparam.", ".$emailparam.", ".$phonenumberparam.",".$passwordparam.", ".$admintype.", ".$activeparam;
		
		$idparam = Helper::dbescape($idparam);
		$nameparam = Helper::dbescape($nameparam);
		$usernameparam = Helper::dbescape($usernameparam);
		$emailparam = Helper::dbescape($emailparam);
		$phonenumberparam = Helper::dbescape($phonenumberparam);
		$passwordparam = $passwordparam == "" || $passwordparam == null ? "''" : Helper::dbescape(Hash::make($passwordparam));
		$admintype = Helper::dbescape($admintype);
		$activeparam = Helper::dbescape($activeparam);
		$langparam = Helper::dbescape($langparam);

		//var_dump($idparam, $nameparam, $emailparam, $passwordparam, $admintype, $activeparam);
		//die();
		$data = DB::select("CALL updateofficer(".$idparam.", ".$nameparam.", ".$usernameparam.",
			".$emailparam.", ".$phonenumberparam.",
			".$passwordparam.", ".$admintype.", ".$activeparam.", ".$langparam.")");
		
		//$this->addbackendlog("update officer: " .$stringDesc, "0", session('uid'));
		return $data;	
	}

	function updateuserspassword($idparam, $passwordparam)
	{
		
		$idparam = Helper::dbescape($idparam);
		$passwordparam = Helper::dbescape(Hash::make($passwordparam));

		$data = DB::select("CALL updateuserspassword(".$idparam.", ".$passwordparam.")");
		
		//$this->addbackendlog("update officer: " .$stringDesc, "0", session('uid'));
		return $data;	
	}
}
