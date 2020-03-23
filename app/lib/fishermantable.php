<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class fishermantable {
	function addnewfisherman($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = $bodparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($bodparam));
		$bodparam = $bodparam == null ? "NULL" : Helper::dbescape($bodparam);

		$idfishermanofflineparam = Helper::dbescape($idfishermanofflineparam);
		$nameparam = Helper::dbescape($nameparam);

		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nat_paramparam = $nat_paramparam == null ? "NULL" : Helper::dbescape($nat_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$phone_paramparam = $phone_paramparam == null ? "NULL" : Helper::dbescape($phone_paramparam);
		$jobtitle_paramparam = $jobtitle_paramparam == null ? "NULL" : Helper::dbescape($jobtitle_paramparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
/*
		$province = $province == null ? "NULL" : Helper::dbescape($province);
		$district = $district == null ? "NULL" : Helper::dbescape($district);
		$city = $city == null ? "NULL" : Helper::dbescape($city);*/
		//$idmsuserparam = Helper::dbescape($idmsuserparam);
/*		
		$data = DB::select("CALL addnewfisherman(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.", ".$province.", ". $district.", ".$city")");*/

		$data = DB::select("CALL addnewfisherman(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatefisherman($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = $bodparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($bodparam));
		$bodparam = $bodparam == null ? "NULL" : Helper::dbescape($bodparam);

		$idfishermanofflineparam = Helper::dbescape($idfishermanofflineparam);
		$nameparam = Helper::dbescape($nameparam);

		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nat_paramparam = $nat_paramparam == null ? "NULL" : Helper::dbescape($nat_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$phone_paramparam = $phone_paramparam == null ? "NULL" : Helper::dbescape($phone_paramparam);
		$jobtitle_paramparam = $jobtitle_paramparam == null ? "NULL" : Helper::dbescape($jobtitle_paramparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
/*
		$province = $province == null ? "NULL" : Helper::dbescape($province);
		$district = $district == null ? "NULL" : Helper::dbescape($district);
		$city = $city == null ? "NULL" : Helper::dbescape($city);*/
		
		$data = DB::select("CALL updatefisherman(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletefisherman($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletefisherman(".$idparam.")");
		return $data;
	}

	function getfishermanbyidmsuser($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getfishermanbyidmsuser(".$idparam.")");
		return $data;
	}

	function getfishermanbyidmsuserv2($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getfishermanbyidmsuserv2(".$idparam.")");
		return $data;
	}

	function getallfisherman()
	{
		$data = DB::select("CALL getallfisherman()");
		return $data;
	}

	function addnewfishermanv2($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = $bodparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($bodparam));
		$bodparam = $bodparam == null ? "NULL" : Helper::dbescape($bodparam);

		$idfishermanofflineparam = Helper::dbescape($idfishermanofflineparam);
		$nameparam = Helper::dbescape($nameparam);

		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nat_paramparam = $nat_paramparam == null ? "NULL" : Helper::dbescape($nat_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$phone_paramparam = $phone_paramparam == null ? "NULL" : Helper::dbescape($phone_paramparam);
		$jobtitle_paramparam = $jobtitle_paramparam == null ? "NULL" : Helper::dbescape($jobtitle_paramparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);

		$province = $province == null ? "NULL" : Helper::dbescape($province);
		$district = $district == null ? "NULL" : Helper::dbescape($district);
		$city = $city == null ? "NULL" : Helper::dbescape($city);
	
		$data = DB::select("CALL addnewfishermanv2(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.", ".$province.", ". $district.", ".$city.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatefishermanv2($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = $bodparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($bodparam));
		$bodparam = $bodparam == null ? "NULL" : Helper::dbescape($bodparam);

		$idfishermanofflineparam = Helper::dbescape($idfishermanofflineparam);
		$nameparam = Helper::dbescape($nameparam);

		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nat_paramparam = $nat_paramparam == null ? "NULL" : Helper::dbescape($nat_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$phone_paramparam = $phone_paramparam == null ? "NULL" : Helper::dbescape($phone_paramparam);
		$jobtitle_paramparam = $jobtitle_paramparam == null ? "NULL" : Helper::dbescape($jobtitle_paramparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);

		$province = $province == null ? "NULL" : Helper::dbescape($province);
		$district = $district == null ? "NULL" : Helper::dbescape($district);
		$city = $city == null ? "NULL" : Helper::dbescape($city);
		
		$data = DB::select("CALL updatefishermanv2(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.", ".$province.", ". $district.", ".$city.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addnewfishermanv3($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city, $fishermanregnumber, $countryparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = $bodparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($bodparam));
		$bodparam = $bodparam == null ? "NULL" : Helper::dbescape($bodparam);

		$idfishermanofflineparam = Helper::dbescape($idfishermanofflineparam);
		$nameparam = Helper::dbescape($nameparam);

		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nat_paramparam = $nat_paramparam == null ? "NULL" : Helper::dbescape($nat_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$phone_paramparam = $phone_paramparam == null ? "NULL" : Helper::dbescape($phone_paramparam);
		$jobtitle_paramparam = $jobtitle_paramparam == null ? "NULL" : Helper::dbescape($jobtitle_paramparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);

		$province = $province == null ? "NULL" : Helper::dbescape($province);
		$district = $district == null ? "NULL" : Helper::dbescape($district);
		$city = $city == null ? "NULL" : Helper::dbescape($city);
		$fishermanregnumber = $fishermanregnumber == null ? "NULL" : Helper::dbescape($fishermanregnumber);
		$countryparam = $countryparam == null ? "NULL" : Helper::dbescape($countryparam);
	
		$data = DB::select("CALL addnewfishermanv3(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.", ".$province.", ". $district.", ".$city.", ".$fishermanregnumber.",".$countryparam .")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatefishermanv3($idfishermanofflineparam, $nameparam, $bodparam, $id_paramparam, $sex_paramparam ,$nat_paramparam, $address_paramparam, $phone_paramparam, $jobtitle_paramparam, $idmssupplierparam, $province, $district, $city, $fishermanregnumber, $countryparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = $bodparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($bodparam));
		$bodparam = $bodparam == null ? "NULL" : Helper::dbescape($bodparam);

		$idfishermanofflineparam = Helper::dbescape($idfishermanofflineparam);
		$nameparam = Helper::dbescape($nameparam);

		$id_paramparam = $id_paramparam == null ? "NULL" : Helper::dbescape($id_paramparam);
		$sex_paramparam = $sex_paramparam == null ? "NULL" : Helper::dbescape($sex_paramparam);
		$nat_paramparam = $nat_paramparam == null ? "NULL" : Helper::dbescape($nat_paramparam);
		$address_paramparam = $address_paramparam == null ? "NULL" : Helper::dbescape($address_paramparam);
		$phone_paramparam = $phone_paramparam == null ? "NULL" : Helper::dbescape($phone_paramparam);
		$jobtitle_paramparam = $jobtitle_paramparam == null ? "NULL" : Helper::dbescape($jobtitle_paramparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);

		$province = $province == null ? "NULL" : Helper::dbescape($province);
		$district = $district == null ? "NULL" : Helper::dbescape($district);
		$city = $city == null ? "NULL" : Helper::dbescape($city);
		$fishermanregnumber = $fishermanregnumber == null ? "NULL" : Helper::dbescape($fishermanregnumber);
		$countryparam = $countryparam == null ? "NULL" : Helper::dbescape($countryparam);
		
		$data = DB::select("CALL updatefishermanv3(".$idfishermanofflineparam.", ".$nameparam.",". $bodparam.",". $id_paramparam.",". $sex_paramparam .",".$nat_paramparam.",". $address_paramparam.",". $phone_paramparam.", ". $jobtitle_paramparam.", ". $idmssupplierparam.", ".$province.", ". $district.", ".$city.", ".$fishermanregnumber.",".$countryparam .")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}
}
