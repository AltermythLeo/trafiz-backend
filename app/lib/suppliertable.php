<?php
namespace App\lib;
use DB;
use App\lib\Helper;
use Illuminate\Support\Facades\Hash;

class suppliertable {
	function getsupplier()
	{
		$data = DB::select("CALL getsupplier()");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addnewsupplier($idparam, $nameparam, $idltusertypeparam, $langparam, $activeparam, $natidparam, $supplieridparam, $genreparam, $addressparam, $provinceparam, $cityparam, $districtparam, $businesslicenseparam, $personalidcardparam, $supplieridexpiredlicensedateparam)
	{
		$idparam = Helper::dbescape($idparam);
		$nameparam = Helper::dbescape($nameparam);
		$idltusertypeparam = Helper::dbescape($idltusertypeparam);
		$langparam = Helper::dbescape($langparam);
		$activeparam = Helper::dbescape($activeparam);
		$natidparam = Helper::dbescape($natidparam);
		$supplieridparam = $supplieridparam == null ? "NULL" : Helper::dbescape($supplieridparam);
		$genreparam = Helper::dbescape($genreparam);
		$addressparam = $addressparam == null ? "NULL" : Helper::dbescape($addressparam);
		$provinceparam = $provinceparam == null ? "NULL" : Helper::dbescape($provinceparam);
		$cityparam = $cityparam == null ? "NULL" : Helper::dbescape($cityparam);
		$districtparam = $districtparam == null ? "NULL" : Helper::dbescape($districtparam);
		$businesslicenseparam = $businesslicenseparam == null ? "NULL" : Helper::dbescape($businesslicenseparam);
		$personalidcardparam = $personalidcardparam == null ? "NULL" : Helper::dbescape($personalidcardparam);

		$supplieridexpiredlicensedateparam = $supplieridexpiredlicensedateparam == null ? "NULL" : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($supplieridexpiredlicensedateparam)));

		$data = DB::select("CALL addnewsupplier(".$idparam .",". $nameparam .",". $idltusertypeparam .",". $langparam .",". $activeparam .",". $natidparam .",". $supplieridparam .",". $genreparam .",". $addressparam .",". $provinceparam .",". $cityparam .",". $districtparam .",". $businesslicenseparam .",". $personalidcardparam.",".$supplieridexpiredlicensedateparam.")");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatesupplier($idparam, $nameparam, $usernameparam, $emailparam, $phonenumberparam, $passwordparam, $idltusertypeparam, $langparam, $activeparam, $natidparam, $supplieridparam, $genreparam, $addressparam, $provinceparam, $cityparam, $districtparam, $businesslicenseparam, $personalidcardparam, $supplieridexpiredlicensedateparam)
	{

		//$stringDesc = $idparam.", ".$nameparam.", ".$usernameparam.", ".$emailparam.", ".$phonenumberparam.",".$passwordparam.", ".$admintype.", ".$activeparam;
		//var_dump("updatesupplier(".$idparam.", ".$nameparam.", ".$usernameparam.", ".$emailparam.", ".$phonenumberparam.", ".$passwordparam.", ".$idltusertypeparam.", ".$langparam.", ".$activeparam.", ".$natidparam.", ".$supplieridparam.", ".$genreparam.", ".$addressparam.", ".$provinceparam.", ".$cityparam.", ".$districtparam.", ".$businesslicenseparam.", ".$natcodeparam.")");
		//die();

		$idparam = Helper::dbescape($idparam);
		$nameparam = Helper::dbescape($nameparam);
		$usernameparam = Helper::dbescape($usernameparam);
		$emailparam = Helper::dbescape($emailparam);
		$phonenumberparam = Helper::dbescape($phonenumberparam);
		$passwordparam = Helper::dbescape(Hash::make($passwordparam));
		$idltusertypeparam = Helper::dbescape($idltusertypeparam);
		$langparam = Helper::dbescape($langparam);
		$activeparam = Helper::dbescape($activeparam);
		$natidparam = Helper::dbescape($natidparam);
		$supplieridparam = $supplieridparam == null ? "NULL" : Helper::dbescape($supplieridparam);
		$genreparam = $genreparam == null ? "NULL" : Helper::dbescape($genreparam);
		$addressparam = $addressparam == null ? "NULL" : Helper::dbescape($addressparam);
		$provinceparam = $provinceparam == null ? "NULL" : Helper::dbescape($provinceparam);
		$cityparam = $cityparam == null ? "NULL" : Helper::dbescape($cityparam);
		$districtparam = $districtparam == null ? "NULL" : Helper::dbescape($districtparam);
		$businesslicenseparam = $businesslicenseparam == null ? "NULL" : Helper::dbescape($businesslicenseparam);
		$personalidcardparam = $personalidcardparam == null ? "NULL" : Helper::dbescape($personalidcardparam);

		$supplieridexpiredlicensedateparam = $supplieridexpiredlicensedateparam == null ? "NULL" : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($supplieridexpiredlicensedateparam)));

		$data = DB::select("CALL updatesupplier(".$idparam.", ".$nameparam.", ".$usernameparam.", ".$emailparam.", ".$phonenumberparam.", ".$passwordparam.", ".$idltusertypeparam.", ".$langparam.", ".$activeparam.", ".$natidparam.", ".$supplieridparam.", ".$genreparam.", ".$addressparam.", ".$provinceparam.", ".$cityparam.", ".$districtparam.", ".$businesslicenseparam.", ".$personalidcardparam.",".$supplieridexpiredlicensedateparam.")");
		//$this->addbackendlog("update officer: " .$stringDesc, "0", session('uid'));
		return $data;	
	}

	function deletesupplier($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletesupplier(".$idparam.")");
		return $data;
	}

	function loginsupplier($param)
	{
		$param = Helper::dbescape($param);
		$data = DB::select("CALL loginsupplier(".$param.")");
		return $data;
	}

	// supplier officer
	function addnewsupplierofficer($idmssupplierparam, $nameparam, $cityparam, $addressparam, $idparam, $bodparam, $idltusertypeparam, $langparam, $accessparam, $accessroleparam)
	{
		$bodparam = date ("Y-m-d H:i:s", strtotime($bodparam));
		
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$nameparam = Helper::dbescape($nameparam);
		$cityparam = Helper::dbescape($cityparam);
		$addressparam = Helper::dbescape($addressparam);
		$idparam = Helper::dbescape($idparam);
		$bodparam = Helper::dbescape($bodparam);
		$idltusertypeparam = Helper::dbescape($idltusertypeparam);
		$langparam = Helper::dbescape($langparam);
		$accessparam = Helper::dbescape($accessparam);
		$accessroleparam = Helper::dbescape($accessroleparam);

		$data = DB::select("CALL addnewsupplierofficer(".$idmssupplierparam .",". $nameparam.",". $cityparam.",". $addressparam.",". $idparam.",". $bodparam.",". $idltusertypeparam.", ".$langparam.", ".$accessparam.", ".$accessroleparam.")");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function getsupplierofficer()
	{
		$data = DB::select("CALL getsupplierofficer()");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	
	function updatesupplierofficer($idsupplierparam, $idparam, $nameparam, $usernameparam, $emailparam, $phonenumberparam, $passwordparam, $admintype, $activeparam, $langeditparam, $accesseditparam, $accessroleeditparam)
	{
		//$stringDesc = $idparam.", ".$nameparam.", ".$usernameparam.", ".$emailparam.", ".$phonenumberparam.",".$passwordparam.", ".$admintype.", ".$activeparam;
		
		$idparam = Helper::dbescape($idparam);
		$nameparam = Helper::dbescape($nameparam);
		$usernameparam = Helper::dbescape($usernameparam);
		$emailparam = Helper::dbescape($emailparam);
		$phonenumberparam = Helper::dbescape($phonenumberparam);
		$passwordparam = $passwordparam == "" || $passwordparam == null ? "''" : Helper::dbescape(Hash::make($passwordparam));
		$admintype = Helper::dbescape($admintype);
		$activeparam = Helper::dbescape($activeparam);
		$idsupplierparam = Helper::dbescape($idsupplierparam);
		$langeditparam = Helper::dbescape($langeditparam);
		$accesseditparam = Helper::dbescape($accesseditparam);
		$accessroleeditparam = Helper::dbescape($accessroleeditparam);

		//var_dump($idparam, $nameparam, $emailparam, $passwordparam, $admintype, $activeparam);
		//die();
		$data = DB::select("CALL updatesupplierofficer(".$idsupplierparam.", ".$idparam.", ".$nameparam.", ".$usernameparam.",
			".$emailparam.", ".$phonenumberparam.",
			".$passwordparam.", ".$admintype.", ".$activeparam.", ".$langeditparam.", ".$accesseditparam.",".$accessroleeditparam.")");
		
		//$this->addbackendlog("update officer: " .$stringDesc, "0", session('uid'));
		return $data;	
	}


	function getsupplierbyidmsuser($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getsupplierbyidmsuser(".$idparam.")");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function getsupplierofficerbyidmssupplier($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getsupplierofficerbyidmssupplier(".$idparam.")");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletesupplierofficer($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletesupplierofficer(".$idparam.")");
		return $data;
	}

	function addnewsuppliertemp($nameparam, $usernameparam, $emailparam, $phonenumberparam, $supplieridparam, $passwordparam, $natidparamparam, $langparam, $genreparam, $addressparam, $cityparam, $districtparam, $provinceparam, $businesslicenseparam, $suppliernatcodeparam, $supidexpireddate)
	{
		
		$nameparam = Helper::dbescape($nameparam);
		$usernameparam = $usernameparam == null ? "NULL" : Helper::dbescape($usernameparam);
		$emailparam = $emailparam == null ? "NULL" : Helper::dbescape($emailparam);
		$phonenumberparam = Helper::dbescape($phonenumberparam);
		$supplieridparam = $supplieridparam == null ? "NULL" : Helper::dbescape($supplieridparam);
		$passwordparam = Helper::dbescape($passwordparam);
		$natidparamparam = $natidparamparam == null ? "NULL" : Helper::dbescape($natidparamparam);
		$langparam = $langparam == null ? "NULL" : Helper::dbescape($langparam);
		$genreparam = $genreparam == null ? "NULL" : Helper::dbescape($genreparam);
		$addressparam = $addressparam == null ? "NULL" : Helper::dbescape($addressparam);
		$cityparam = $cityparam == null ? "NULL" : Helper::dbescape($cityparam);
		$districtparam = $districtparam == null ? "NULL" : Helper::dbescape($districtparam);
		$provinceparam = $provinceparam == null ? "NULL" : Helper::dbescape($provinceparam);
		$businesslicenseparam = $businesslicenseparam == null ? "NULL" : Helper::dbescape($businesslicenseparam);
		$suppliernatcodeparam = $suppliernatcodeparam == null ? "NULL" : Helper::dbescape($suppliernatcodeparam);
		$supidexpireddate = $supidexpireddate == null ? NULL : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($supidexpireddate)));

		$data = DB::select("CALL addnewsuppliertemp(".$nameparam.", ".$usernameparam.", ".$emailparam.", ".$phonenumberparam.", ".$supplieridparam.", ".$passwordparam.", ".$natidparamparam.", ".$langparam.", ".$genreparam.", ".$addressparam.", ". $cityparam.", ".$districtparam.", ". $provinceparam.", ".$businesslicenseparam.", ". $suppliernatcodeparam.",".$supidexpireddate.")");
		return $data;
	}

	function getsupplieraccept($idparam = null)
	{
		$idparam = $idparam == null ? "NULL" : Helper::dbescape($idparam);
		$data = DB::select("CALL getsupplieraccept(".$idparam.")");
		return $data;
	}

	function acceptnewsupplier($idmssuppliertempparam, $idparam)
	{
		$idmssuppliertempparam = $idparam == null ? "NULL" : Helper::dbescape($idmssuppliertempparam);
		$idparam = $idparam == null ? "NULL" : Helper::dbescape($idparam);
		$data = DB::select("CALL acceptnewsupplier(".$idmssuppliertempparam.",".$idparam.")");
		return $data;
	}

	function rejectnewsupplier($idmssuppliertempparam)
	{
		$idmssuppliertempparam = $idmssuppliertempparam == null ? "NULL" : Helper::dbescape($idmssuppliertempparam);
		$data = DB::select("CALL rejectnewsupplier(".$idmssuppliertempparam.")");
		return $data;
	}

	
	function getprofilesupplierbyidmsuser($idmsuser)
	{
		$idmsuser = $idmsuser == null ? "NULL" : Helper::dbescape($idmsuser);
		$data = DB::select("CALL getprofilesupplierbyidmsuser(".$idmsuser.")");
		return $data;
	}
	
}
