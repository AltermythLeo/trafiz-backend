<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class synctable {
	function addsyncjson($idmsuserparam, $dataparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idmsuserparam = Helper::dbescape($idmsuserparam);
		$dataparam = Helper::dbescape($dataparam);

		$data = DB::select("CALL addsyncjson(".$idmsuserparam.",". $dataparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addsyncdata($synctypeparam, $functiontypeparam, $functionnameparam, $param, $descdata, $transdate, $idmsuserparam, $idtrjsonparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$synctypeparam = Helper::dbescape($synctypeparam);
		$functiontypeparam = Helper::dbescape($functiontypeparam);
		$functionnameparam = Helper::dbescape($functionnameparam);
		$param = Helper::dbescape($param);
		$descdata = Helper::dbescape($descdata);
		$transdate = $transdate == null ? NULL : date ("Y-m-d H:i:s", strtotime($transdate));
		$transdate = $transdate == null ? "NULL" : Helper::dbescape($transdate);

		$idmsuserparam = Helper::dbescape($idmsuserparam);
		$idtrjsonparam = Helper::dbescape($idtrjsonparam);
		
		$data = DB::select("CALL addsyncdata(".$synctypeparam.",". $functiontypeparam.",". $functionnameparam.",". $param.",". $descdata.",". $transdate.",".$idmsuserparam.",".$idtrjsonparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function getreportlog($idmssupplier, $day, $month, $year)
	{
		$idmssupplier = Helper::dbescape($idmssupplier);
		$data = DB::select("CALL getreportlog(".$idmssupplier.",". $day.",". $month.",". $year .")");
		return $data;
	}

	function addtrsyncfailed($idmsuserparam, $jsonparam, $idtrsyncjsonparam, $functionnameparam, $texterr, $index)
	{
		$idmsuserparam = Helper::dbescape($idmsuserparam);
		$jsonparam = Helper::dbescape($jsonparam);
		$idtrsyncjsonparam = Helper::dbescape($idtrsyncjsonparam);
		$functionnameparam = Helper::dbescape($functionnameparam);
		$texterr = Helper::dbescape($texterr);
		$index = Helper::dbescape($index);

		$data = DB::select("CALL addtrsyncfailed(".$idmsuserparam.",". $jsonparam.",". $idtrsyncjsonparam.",". $functionnameparam.",".$texterr.",".$index.")");
		return $data;	
	}
}
