<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class buyertable {
	function addnewbuyer($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idbuyerofflineparam = Helper::dbescape($idbuyerofflineparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$name_paramparam = Helper::dbescape($name_paramparam);
		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$businesslicense_paramparam = $businesslicense_paramparam == null ? "NULL" : Helper::dbescape($businesslicense_paramparam);
		$contact_paramparam = $contact_paramparam == null ? "NULL" : Helper::dbescape($contact_paramparam);
		$phonenumber_paramparam = $phonenumber_paramparam == null ? "NULL" : Helper::dbescape($phonenumber_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$idltusertypeparam = $idltusertypeparam == null ? "NULL" : Helper::dbescape($idltusertypeparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nationalcode_paramparam = $nationalcode_paramparam == null ? "NULL" : Helper::dbescape($nationalcode_paramparam);
		$country_paramparam = $country_paramparam == null ? "NULL" : Helper::dbescape($country_paramparam);
		$province_paramparam = $province_paramparam == null ? "NULL" : Helper::dbescape($province_paramparam);
		$city_paramparam = $city_paramparam == null ? "NULL" : Helper::dbescape($city_paramparam);
		$district_paramparam = $district_paramparam == null ? "NULL" : Helper::dbescape($district_paramparam);
		$completestreetaddress_paramparam = $completestreetaddress_paramparam == null ? "NULL" : Helper::dbescape($completestreetaddress_paramparam);

		$data = DB::select("CALL addnewbuyer(".$idbuyerofflineparam.",".$idmssupplierparam.",".$name_paramparam.",".$id_paramparam.",".$businesslicense_paramparam.",".$contact_paramparam.",".$phonenumber_paramparam.",".$address_paramparam.",".$idltusertypeparam.",".$sex_paramparam.",".$nationalcode_paramparam.",".$country_paramparam.",".$province_paramparam.",".$city_paramparam.",".$district_paramparam.",".$completestreetaddress_paramparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatebuyer($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idbuyerofflineparam = Helper::dbescape($idbuyerofflineparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$name_paramparam = Helper::dbescape($name_paramparam);
		$id_paramparam =  $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$businesslicense_paramparam = $businesslicense_paramparam == null ? "NULL" : Helper::dbescape($businesslicense_paramparam);
		$contact_paramparam = $contact_paramparam == null ? "NULL" : Helper::dbescape($contact_paramparam);
		$phonenumber_paramparam = $phonenumber_paramparam == null ? "NULL" : Helper::dbescape($phonenumber_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" :  Helper::dbescape($address_paramparam);
		$idltusertypeparam = $idltusertypeparam == null ? "NULL" : Helper::dbescape($idltusertypeparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nationalcode_paramparam = $nationalcode_paramparam == null ? "NULL" : Helper::dbescape($nationalcode_paramparam);
		$country_paramparam = $country_paramparam == null ? "NULL" : Helper::dbescape($country_paramparam);
		$province_paramparam = $province_paramparam == null ? "NULL" : Helper::dbescape($province_paramparam);
		$city_paramparam = $city_paramparam == null ? "NULL" : Helper::dbescape($city_paramparam);
		$district_paramparam = $district_paramparam == null ? "NULL" : Helper::dbescape($district_paramparam);
		$completestreetaddress_paramparam = $completestreetaddress_paramparam == null ? "NULL" : Helper::dbescape($completestreetaddress_paramparam);

		$data = DB::select("CALL updatebuyer(".$idbuyerofflineparam.",".$idmssupplierparam.",".$name_paramparam.",".$id_paramparam.",".$businesslicense_paramparam.",".$contact_paramparam.",".$phonenumber_paramparam.",".$address_paramparam.",".$idltusertypeparam.",".$sex_paramparam.",".$nationalcode_paramparam.",".$country_paramparam.",".$province_paramparam.",".$city_paramparam.",".$district_paramparam.",".$completestreetaddress_paramparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletebuyer($idbuyerofflineparam)
	{
		$idbuyerofflineparam = Helper::dbescape($idbuyerofflineparam);
		$data = DB::select("CALL deletebuyer(".$idbuyerofflineparam.")");
		return $data;
	}

	function getbuyerlistbyidmsuser($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getbuyerlistbyidmsuser(".$idparam.")");
		return $data;
	}

	function getbuyerlistbyidmsuserv2($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getbuyerlistbyidmsuserv2(".$idparam.")");
		return $data;
	}

	// v3
	function addnewbuyerv3($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam, $companynameparam, $businesslicenseexpireddateparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idbuyerofflineparam = Helper::dbescape($idbuyerofflineparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$name_paramparam = Helper::dbescape($name_paramparam);
		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$businesslicense_paramparam = $businesslicense_paramparam == null ? "NULL" : Helper::dbescape($businesslicense_paramparam);
		$contact_paramparam = $contact_paramparam == null ? "NULL" : Helper::dbescape($contact_paramparam);
		$phonenumber_paramparam = $phonenumber_paramparam == null ? "NULL" : Helper::dbescape($phonenumber_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$idltusertypeparam = $idltusertypeparam == null ? "NULL" : Helper::dbescape($idltusertypeparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nationalcode_paramparam = $nationalcode_paramparam == null ? "NULL" : Helper::dbescape($nationalcode_paramparam);
		$country_paramparam = $country_paramparam == null ? "NULL" : Helper::dbescape($country_paramparam);
		$province_paramparam = $province_paramparam == null ? "NULL" : Helper::dbescape($province_paramparam);
		$city_paramparam = $city_paramparam == null ? "NULL" : Helper::dbescape($city_paramparam);
		$district_paramparam = $district_paramparam == null ? "NULL" : Helper::dbescape($district_paramparam);
		$completestreetaddress_paramparam = $completestreetaddress_paramparam == null ? "NULL" : Helper::dbescape($completestreetaddress_paramparam);
		$companynameparam = $companynameparam == null ? "NULL" : Helper::dbescape($companynameparam);
		$businesslicenseexpireddateparam = $businesslicenseexpireddateparam == null ? "NULL" : Helper::dbescape($businesslicenseexpireddateparam);

		$data = DB::select("CALL addnewbuyerv3(".$idbuyerofflineparam.",".$idmssupplierparam.",".$name_paramparam.",".$id_paramparam.",".$businesslicense_paramparam.",".$contact_paramparam.",".$phonenumber_paramparam.",".$address_paramparam.",".$idltusertypeparam.",".$sex_paramparam.",".$nationalcode_paramparam.",".$country_paramparam.",".$province_paramparam.",".$city_paramparam.",".$district_paramparam.",".$completestreetaddress_paramparam.",".$companynameparam.",".$businesslicenseexpireddateparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatebuyerv3($idbuyerofflineparam, $idmssupplierparam, $name_paramparam, $id_paramparam, $businesslicense_paramparam, $contact_paramparam, $phonenumber_paramparam, $address_paramparam, $idltusertypeparam, $sex_paramparam, $nationalcode_paramparam, $country_paramparam, $province_paramparam, $city_paramparam, $district_paramparam, $completestreetaddress_paramparam, $companynameparam, $businesslicenseexpireddateparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idbuyerofflineparam = Helper::dbescape($idbuyerofflineparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$name_paramparam = Helper::dbescape($name_paramparam);
		$id_paramparam =  $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$businesslicense_paramparam = $businesslicense_paramparam == null ? "NULL" : Helper::dbescape($businesslicense_paramparam);
		$contact_paramparam = $contact_paramparam == null ? "NULL" : Helper::dbescape($contact_paramparam);
		$phonenumber_paramparam = $phonenumber_paramparam == null ? "NULL" : Helper::dbescape($phonenumber_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" :  Helper::dbescape($address_paramparam);
		$idltusertypeparam = $idltusertypeparam == null ? "NULL" : Helper::dbescape($idltusertypeparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nationalcode_paramparam = $nationalcode_paramparam == null ? "NULL" : Helper::dbescape($nationalcode_paramparam);
		$country_paramparam = $country_paramparam == null ? "NULL" : Helper::dbescape($country_paramparam);
		$province_paramparam = $province_paramparam == null ? "NULL" : Helper::dbescape($province_paramparam);
		$city_paramparam = $city_paramparam == null ? "NULL" : Helper::dbescape($city_paramparam);
		$district_paramparam = $district_paramparam == null ? "NULL" : Helper::dbescape($district_paramparam);
		$completestreetaddress_paramparam = $completestreetaddress_paramparam == null ? "NULL" : Helper::dbescape($completestreetaddress_paramparam);

		$companynameparam = $companynameparam == null ? "NULL" : Helper::dbescape($companynameparam);
		$businesslicenseexpireddateparam = $businesslicenseexpireddateparam == null ? "NULL" : Helper::dbescape($businesslicenseexpireddateparam);

		$data = DB::select("CALL updatebuyerv3(".$idbuyerofflineparam.",".$idmssupplierparam.",".$name_paramparam.",".$id_paramparam.",".$businesslicense_paramparam.",".$contact_paramparam.",".$phonenumber_paramparam.",".$address_paramparam.",".$idltusertypeparam.",".$sex_paramparam.",".$nationalcode_paramparam.",".$country_paramparam.",".$province_paramparam.",".$city_paramparam.",".$district_paramparam.",".$completestreetaddress_paramparam.",".$companynameparam.",".$businesslicenseexpireddateparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function getbuyerlistbyidmsuserv3($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getbuyerlistbyidmsuserv3(".$idparam.")");
		return $data;
	}
}
