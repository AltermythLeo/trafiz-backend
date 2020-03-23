<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class usertable {
	function addnewuser($nama, $city, $address, $idparam, $bodparam, $type, $lang)
	{
		$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$bodparam = date ("Y-m-d H:i:s", strtotime($bodparam));

		$nama = Helper::dbescape($nama);
		$city = Helper::dbescape($city);
		$address = Helper::dbescape($address);
		$idparam = Helper::dbescape($idparam);
		$bodparam = Helper::dbescape($bodparam);
		$type = Helper::dbescape($type);
		$lang = Helper::dbescape($lang);

		$data = DB::select("CALL addnewuser(".$nama.", ".$city.", ".$address.", ".$idparam.", ".$bodparam." , ".$type.", ".$lang.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function getactivemsuser($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getactivemsuser(".$idparam.")");
		return $data;
	}

	function getvalidusername($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getvalidusername(".$idparam.")");
		return $data;
	}

	function addloginsuserqrcode($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL addloginsuserqrcode(".$idparam.")");
		return $data;
	}

	function getactivemsuserqrcode($idparam, $qrcodeid)
	{
		$idparam = Helper::dbescape($idparam);
		$qrcodeid = Helper::dbescape($qrcodeid);
		$data = DB::select("CALL getactivemsuserqrcode(".$idparam.", ".$qrcodeid.")");
		return $data;
	}

	function qrcodeLoginfromapps($idparam, $idmsuser, $password)
	{
		$idparam = Helper::dbescape($idparam);
		$idmsuser = Helper::dbescape($idmsuser);
		$password = Helper::dbescape($password);

		$data = DB::select("CALL tryloginqrcode(".$idparam.", ".$idmsuser.", ".$password.")");
		return $data;
	}
	
	function getactiveqrcode($idparam)
	{
		$idparam = Helper::dbescape($idparam);

		$data = DB::select("CALL getactiveqrcode(".$idparam.")");
		return $data;
	}
	
	function getdashboarddata($idmssupplierparam)
	{
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);

		$data = DB::select("CALL getdashboarddata(".$idmssupplierparam.")");
		return $data;
	}

	function updatemsinfo($supportinfoparam, $infodescparam)
	{
		$supportinfoparam = Helper::dbescape($supportinfoparam);
		$infodescparam = $infodescparam == null ? "NULL" : Helper::dbescape($infodescparam);

		$data = DB::select("CALL updatemsinfo(".$supportinfoparam.", ".$infodescparam.")");
		return $data;
	}

	function getmsinfo($supportinfoparam)
	{
		$supportinfoparam = Helper::dbescape($supportinfoparam);
		$data = DB::select("CALL getmsinfo(".$supportinfoparam.")");
		return $data;
	}
	
}
