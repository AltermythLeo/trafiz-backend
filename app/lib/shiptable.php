<?php
namespace App\lib;
use DB;
use App\lib\Helper;


class shiptable {
	function addnewship($idshipofflineparam,$vesselname_paramparam,	$vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vessellicenseexpiredate_paramparam));
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($fishinglicenseexpiredate_paramparam));
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesseldatemade_paramparam));
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesselownerdob_paramparam));

		$idshipofflineparam = Helper::dbescape($idshipofflineparam);
		$vesselname_paramparam = Helper::dbescape($vesselname_paramparam);
		$vessellicensenumber_paramparam = Helper::dbescape($vessellicensenumber_paramparam);
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? "NULL" : Helper::dbescape($vessellicenseexpiredate_paramparam);
		$fishinglicensenumber_paramparam = $fishinglicensenumber_paramparam == null ? "NULL" : Helper::dbescape($fishinglicensenumber_paramparam);
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? "NULL" :  Helper::dbescape($fishinglicenseexpiredate_paramparam);
		$vesselsize_paramparam = $vesselsize_paramparam == null ? "NULL" :  Helper::dbescape($vesselsize_paramparam);
		$vesselflag_paramparam = Helper::dbescape($vesselflag_paramparam);
		$vesselgeartype_paramparam = $vesselgeartype_paramparam == null ? "NULL" : Helper::dbescape($vesselgeartype_paramparam);
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? "NULL" : Helper::dbescape($vesseldatemade_paramparam);
		$vesselownername_paramparam = Helper::dbescape($vesselownername_paramparam);
		$vesselownerid_paramparam = $vesselownerid_paramparam == null ? "NULL" : Helper::dbescape($vesselownerid_paramparam);
		$vesselownerphone_paramparam = $vesselownerphone_paramparam == null ? "NULL" : Helper::dbescape($vesselownerphone_paramparam);
		$vesselownersex_paramparam = $vesselownersex_paramparam == null ? "NULL" : Helper::dbescape($vesselownersex_paramparam);
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? "NULL" : Helper::dbescape($vesselownerdob_paramparam);
		$vesselowneraddress_paramparam = Helper::dbescape($vesselowneraddress_paramparam);
		$idmsuserparamparam = Helper::dbescape($idmsuserparamparam);

		$data = DB::select("CALL addnewship(
			".$idshipofflineparam.",
			".$vesselname_paramparam.",
			".$vessellicensenumber_paramparam.",
			".$vessellicenseexpiredate_paramparam.",
			".$fishinglicensenumber_paramparam.",
			".$fishinglicenseexpiredate_paramparam.",
			".$vesselsize_paramparam.",
			".$vesselflag_paramparam.",
			".$vesselgeartype_paramparam.",
			".$vesseldatemade_paramparam.",
			".$vesselownername_paramparam.",
			".$vesselownerid_paramparam.",
			".$vesselownerphone_paramparam.",
			".$vesselownersex_paramparam.",
			".$vesselownerdob_paramparam.",
			".$vesselowneraddress_paramparam.",
			".$idmsuserparamparam."
			)");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}


	function updateship($idshipofflineparam,$vesselname_paramparam,	$vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vessellicenseexpiredate_paramparam));
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($fishinglicenseexpiredate_paramparam));
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesseldatemade_paramparam));
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesselownerdob_paramparam));

		$idshipofflineparam = Helper::dbescape($idshipofflineparam);
		$vesselname_paramparam = Helper::dbescape($vesselname_paramparam);
		$vessellicensenumber_paramparam = Helper::dbescape($vessellicensenumber_paramparam);
		$vessellicenseexpiredate_paramparam =  $vessellicenseexpiredate_paramparam == null ? "NULL" : Helper::dbescape($vessellicenseexpiredate_paramparam);
		$fishinglicensenumber_paramparam = $fishinglicensenumber_paramparam == null ? "NULL" : Helper::dbescape($fishinglicensenumber_paramparam);
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? "NULL" :  Helper::dbescape($fishinglicenseexpiredate_paramparam);
		$vesselsize_paramparam = $vesselsize_paramparam == null ? "NULL" :  Helper::dbescape($vesselsize_paramparam);
		$vesselflag_paramparam = Helper::dbescape($vesselflag_paramparam);
		$vesselgeartype_paramparam = $vesselgeartype_paramparam == null ? "NULL" : Helper::dbescape($vesselgeartype_paramparam);
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? "NULL" : Helper::dbescape($vesseldatemade_paramparam);
		$vesselownername_paramparam = Helper::dbescape($vesselownername_paramparam);
		$vesselownerid_paramparam = $vesselownerid_paramparam == null ? "NULL" : Helper::dbescape($vesselownerid_paramparam);
		$vesselownerphone_paramparam = $vesselownerphone_paramparam == null ? "NULL" : Helper::dbescape($vesselownerphone_paramparam);
		$vesselownersex_paramparam = $vesselownersex_paramparam == null ? "NULL" : Helper::dbescape($vesselownersex_paramparam);
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? "NULL" : Helper::dbescape($vesselownerdob_paramparam);
		$vesselowneraddress_paramparam = Helper::dbescape($vesselowneraddress_paramparam);
		$idmsuserparamparam = Helper::dbescape($idmsuserparamparam);

		$data = DB::select("CALL updateship(".$idshipofflineparam.",".$vesselname_paramparam.",".	$vessellicensenumber_paramparam.",". $vessellicenseexpiredate_paramparam.",". $fishinglicensenumber_paramparam.",". $fishinglicenseexpiredate_paramparam.",". $vesselsize_paramparam.",". $vesselflag_paramparam.",". $vesselgeartype_paramparam.",". $vesseldatemade_paramparam.",". $vesselownername_paramparam.",". $vesselownerid_paramparam.",". $vesselownerphone_paramparam.",". $vesselownersex_paramparam.",".$vesselownerdob_paramparam.",". $vesselowneraddress_paramparam.",". $idmsuserparamparam.")");


		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deleteship($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deleteship(".$idparam.")");
		return $data;
	}

	function getshipbyidmsuser($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getshipbyidmsuser(".$idparam.")");
		return $data;
	}

	function getshipbyidmsuserv2($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getshipbyidmsuserv2(".$idparam.")");
		return $data;
	}

	function getallship()
	{
		$data = DB::select("CALL getallship()");
		return $data;
	}

	function addnewshipv3($idshipofflineparam,$vesselname_paramparam, $vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam, $vesselownerprovince_paramparam, $vesselownerdistrict_paramparam, $vesselownercity_paramparam, $vesselownercountry_paramparam, $vesselid_param)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vessellicenseexpiredate_paramparam));
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($fishinglicenseexpiredate_paramparam));
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesseldatemade_paramparam));
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesselownerdob_paramparam));

		$idshipofflineparam = Helper::dbescape($idshipofflineparam);
		$vesselname_paramparam = $vesselname_paramparam == null ? "NULL" : Helper::dbescape($vesselname_paramparam);
		$vessellicensenumber_paramparam = $vessellicensenumber_paramparam == null ? "NULL" : Helper::dbescape($vessellicensenumber_paramparam);
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? "NULL" : Helper::dbescape($vessellicenseexpiredate_paramparam);
		$fishinglicensenumber_paramparam = $fishinglicensenumber_paramparam == null ? "NULL" : Helper::dbescape($fishinglicensenumber_paramparam);
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? "NULL" :  Helper::dbescape($fishinglicenseexpiredate_paramparam);
		$vesselsize_paramparam = $vesselsize_paramparam == null ? "NULL" :  Helper::dbescape($vesselsize_paramparam);
		$vesselflag_paramparam = $vesselflag_paramparam == null ? "NULL" : Helper::dbescape($vesselflag_paramparam);
		$vesselgeartype_paramparam = $vesselgeartype_paramparam == null ? "NULL" : Helper::dbescape($vesselgeartype_paramparam);
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? "NULL" : Helper::dbescape($vesseldatemade_paramparam);
		$vesselownername_paramparam = $vesselownername_paramparam == null ? "NULL" : Helper::dbescape($vesselownername_paramparam);
		$vesselownerid_paramparam = $vesselownerid_paramparam == null ? "NULL" : Helper::dbescape($vesselownerid_paramparam);
		$vesselownerphone_paramparam = $vesselownerphone_paramparam == null ? "NULL" : Helper::dbescape($vesselownerphone_paramparam);
		$vesselownersex_paramparam = $vesselownersex_paramparam == null ? "NULL" : Helper::dbescape($vesselownersex_paramparam);
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? "NULL" : Helper::dbescape($vesselownerdob_paramparam);
		$vesselowneraddress_paramparam = $vesselowneraddress_paramparam == null ? "NULL" : Helper::dbescape($vesselowneraddress_paramparam);
		$idmsuserparamparam = Helper::dbescape($idmsuserparamparam);

		$vesselownerprovince_paramparam = $vesselownerprovince_paramparam == null ? "NULL" : Helper::dbescape($vesselownerprovince_paramparam);
		$vesselownerdistrict_paramparam = $vesselownerdistrict_paramparam == null ? "NULL": Helper::dbescape($vesselownerdistrict_paramparam);
		$vesselownercity_paramparam = $vesselownercity_paramparam == null ? "NULL" : Helper::dbescape($vesselownercity_paramparam);
		$vesselownercountry_paramparam = $vesselownercountry_paramparam == null ? "NULL" : Helper::dbescape($vesselownercountry_paramparam); 
		$vesselid_param = $vesselid_param == null ? "NULL" : Helper::dbescape($vesselid_param); 

		$data = DB::select("CALL addnewshipv3(
			".$idshipofflineparam.",
			".$vesselname_paramparam.",
			".$vessellicensenumber_paramparam.",
			".$vessellicenseexpiredate_paramparam.",
			".$fishinglicensenumber_paramparam.",
			".$fishinglicenseexpiredate_paramparam.",
			".$vesselsize_paramparam.",
			".$vesselflag_paramparam.",
			".$vesselgeartype_paramparam.",
			".$vesseldatemade_paramparam.",
			".$vesselownername_paramparam.",
			".$vesselownerid_paramparam.",
			".$vesselownerphone_paramparam.",
			".$vesselownersex_paramparam.",
			".$vesselownerdob_paramparam.",
			".$vesselowneraddress_paramparam.",
			".$idmsuserparamparam.",
			".$vesselownerprovince_paramparam.",
			".$vesselownerdistrict_paramparam.",
			".$vesselownercity_paramparam.",
			".$vesselownercountry_paramparam.",
			".$vesselid_param."
			)");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}


	function updateshipv3($idshipofflineparam,$vesselname_paramparam,	$vessellicensenumber_paramparam, $vessellicenseexpiredate_paramparam, $fishinglicensenumber_paramparam, $fishinglicenseexpiredate_paramparam, $vesselsize_paramparam, $vesselflag_paramparam, $vesselgeartype_paramparam, $vesseldatemade_paramparam, $vesselownername_paramparam, $vesselownerid_paramparam, $vesselownerphone_paramparam, $vesselownersex_paramparam,$vesselownerdob_paramparam, $vesselowneraddress_paramparam, $idmsuserparamparam, $vesselownerprovince_paramparam, $vesselownerdistrict_paramparam, $vesselownercity_paramparam, $vesselownercountry_paramparam, $vesselid_param)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vessellicenseexpiredate_paramparam));
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($fishinglicenseexpiredate_paramparam));
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesseldatemade_paramparam));
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($vesselownerdob_paramparam));

		$idshipofflineparam = Helper::dbescape($idshipofflineparam);
		$vesselname_paramparam = $vesselname_paramparam == null ? "NULL" : Helper::dbescape($vesselname_paramparam);
		$vessellicensenumber_paramparam = $vessellicensenumber_paramparam == null ? "NULL" : Helper::dbescape($vessellicensenumber_paramparam);
		$vessellicenseexpiredate_paramparam = $vessellicenseexpiredate_paramparam == null ? "NULL" : Helper::dbescape($vessellicenseexpiredate_paramparam);
		$fishinglicensenumber_paramparam = $fishinglicensenumber_paramparam == null ? "NULL" : Helper::dbescape($fishinglicensenumber_paramparam);
		$fishinglicenseexpiredate_paramparam = $fishinglicenseexpiredate_paramparam == null ? "NULL" :  Helper::dbescape($fishinglicenseexpiredate_paramparam);
		$vesselsize_paramparam = $vesselsize_paramparam == null ? "NULL" :  Helper::dbescape($vesselsize_paramparam);
		$vesselflag_paramparam = $vesselflag_paramparam == null ? "NULL" : Helper::dbescape($vesselflag_paramparam);
		$vesselgeartype_paramparam = $vesselgeartype_paramparam == null ? "NULL" : Helper::dbescape($vesselgeartype_paramparam);
		$vesseldatemade_paramparam = $vesseldatemade_paramparam == null ? "NULL" : Helper::dbescape($vesseldatemade_paramparam);
		$vesselownername_paramparam = $vesselownername_paramparam == null ? "NULL" : Helper::dbescape($vesselownername_paramparam);
		$vesselownerid_paramparam = $vesselownerid_paramparam == null ? "NULL" : Helper::dbescape($vesselownerid_paramparam);
		$vesselownerphone_paramparam = $vesselownerphone_paramparam == null ? "NULL" : Helper::dbescape($vesselownerphone_paramparam);
		$vesselownersex_paramparam = $vesselownersex_paramparam == null ? "NULL" : Helper::dbescape($vesselownersex_paramparam);
		$vesselownerdob_paramparam = $vesselownerdob_paramparam == null ? "NULL" : Helper::dbescape($vesselownerdob_paramparam);
		$vesselowneraddress_paramparam = $vesselowneraddress_paramparam == null ? "NULL" : Helper::dbescape($vesselowneraddress_paramparam);
		$idmsuserparamparam = Helper::dbescape($idmsuserparamparam);

		$vesselownerprovince_paramparam = $vesselownerprovince_paramparam == null ? "NULL" : Helper::dbescape($vesselownerprovince_paramparam);
		$vesselownerdistrict_paramparam = $vesselownerdistrict_paramparam == null ? "NULL": Helper::dbescape($vesselownerdistrict_paramparam);
		$vesselownercity_paramparam = $vesselownercity_paramparam == null ? "NULL" : Helper::dbescape($vesselownercity_paramparam);
		$vesselownercountry_paramparam = $vesselownercountry_paramparam == null ? "NULL" : Helper::dbescape($vesselownercountry_paramparam); 
		$vesselid_param = $vesselid_param == null ? "NULL" : Helper::dbescape($vesselid_param); 

		$data = DB::select("CALL updateshipv3(".$idshipofflineparam.",".$vesselname_paramparam.",".	$vessellicensenumber_paramparam.",". $vessellicenseexpiredate_paramparam.",". $fishinglicensenumber_paramparam.",". $fishinglicenseexpiredate_paramparam.",". $vesselsize_paramparam.",". $vesselflag_paramparam.",". $vesselgeartype_paramparam.",". $vesseldatemade_paramparam.",". $vesselownername_paramparam.",". $vesselownerid_paramparam.",". $vesselownerphone_paramparam.",". $vesselownersex_paramparam.",".$vesselownerdob_paramparam.",". $vesselowneraddress_paramparam.",". $idmsuserparamparam.",".$vesselownerprovince_paramparam.", ".$vesselownerdistrict_paramparam.", ".$vesselownercity_paramparam.",".$vesselownercountry_paramparam.",".$vesselid_param.")");


		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}
}
