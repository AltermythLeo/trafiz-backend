<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class investcatchtable {

	function upsertBuyFish($req)
	{
		$offlineID = Helper::dbescape($req->offlineID);
		$catchOfflineID = Helper::dbescapeNotNull($req->catchOfflineID);
		$fishOfflineID = Helper::dbescapeNotNull($req->fishOfflineID);
		$shipOfflineID = Helper::dbescapeNotNull($req->shipOfflineID);
		$species = Helper::dbescapeNotNull($req->species);
		$speciesEng = Helper::dbescapeNotNull($req->speciesEng);
		$speciesIndo = Helper::dbescapeNotNull($req->speciesIndo);
		$weightBeforeSplit = Helper::ensureNotNull($req->weightBeforeSplit,0);
		$grade = Helper::dbescapeNotNull($req->grade);
		$fishermanname = Helper::dbescapeNotNull($req->fishermanname);
		$fishingground = Helper::dbescapeNotNull($req->fishingground);
		$shipName = Helper::dbescapeNotNull($req->shipName);
		$shipGear = Helper::dbescapeNotNull($req->shipGear);
		$landingDate = Helper::dbescapeNotNull($req->landingDate);
		$portName = Helper::dbescapeNotNull($req->portName);
		$amount = Helper::ensureNotNull($req->amount,0);
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$trxdate = Helper::dbescapeNotNull($req->trxdate);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select(
			"CALL upsertinvestbuyfish(".
				$offlineID.",".
				$catchOfflineID.",".
				$fishOfflineID.",".
				$shipOfflineID.",".
				$species.",".
				$speciesEng.",".
				$speciesIndo.",".
				$weightBeforeSplit.",".
				$grade.",".
				$fishermanname.",".
				$fishingground.",".
				$shipName.",".
				$shipGear.",".
				$landingDate.",".
				$portName.",".
				$amount.",".
				$notes.",".
				$ts.",".
				$synch.",".
				$trxoperation.",".
				$trxdate.",".
				$idmssupplier.",".
				$idmsuser.
			")");

		// $this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	public function getBuyFish($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescapeNotNull($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestbuyfishbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	function upsertSplitFish($req)
	{
		$offlineID = Helper::dbescape($req->offlineID);
		$deliveryOfflineID = Helper::dbescapeNotNull($req->deliveryOfflineID);
		$buyFishOfflineID = Helper::dbescape($req->buyFishOfflineID);
		$sellUnitName = Helper::dbescapeNotNull($req->sellUnitName);
		$numUnit = Helper::ensureNotNull($req->numUnit,1);
		$sellUnitPrice = Helper::ensureNotNull($req->sellUnitPrice,0);
		$amount = Helper::ensureNotNull($req->amount,0);
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$trxdate = Helper::dbescapeNotNull($req->trxdate);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);
		$weightOnSplit = Helper::ensureNotNull($req->weightOnSplit,0);
		$sold = Helper::ensureNotNull($req->sold,0);
		$fishOfflineID = Helper::dbescapeNotNull($req->fishOfflineID);

		$data = DB::select(
			"CALL upsertinvestsplitfish(".
				$offlineID.",".
				$deliveryOfflineID.",".
				$buyFishOfflineID.",".
				$sellUnitName.",".
				$numUnit.",".
				$sellUnitPrice.",".
				$amount.",".
				$notes.",".
				$ts.",".
				$synch.",".
				$trxoperation.",".
				$trxdate.",".
				$idmssupplier.",".
				$idmsuser.",".
				$weightOnSplit.",".
				$sold.",".
				$fishOfflineID.
			")");

		// $this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	public function getSplitFish($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescapeNotNull($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestsplitfishbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	function upsertSimpleSellFish($req)
	{
		$offlineID = Helper::dbescape($req->offlineID);
		$fishOfflineID = Helper::dbescapeNotNull($req->fishOfflineID);
		$grade = Helper::dbescapeNotNull($req->grade);
		$weight = Helper::ensureNotNull($req->weight,0);
		$amount = Helper::ensureNotNull($req->amount,0);
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$trxdate = Helper::dbescapeNotNull($req->trxdate);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select(
			"CALL upsertinvestsimplesellfish(".
				$offlineID.",".
				$fishOfflineID.",".
				$grade.",".
				$weight.",".
				$amount.",".
				$notes.",".
				$ts.",".
				$synch.",".
				$trxoperation.",".
				$trxdate.",".
				$idmssupplier.",".
				$idmsuser.
			")");

		// $this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	public function getSimpleSellFish($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescapeNotNull($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestsimplesellfishbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getReportTransaction($idmsuser, $date1, $date2, $catfilter, $city)
	{
		$idmsuser = Helper::dbescapeNotNull($idmsuser);
		$sql = "";
		if($city != -1) {
			$sql = "CALL investreportbetweendatev2(".$idmsuser.",'".$date1."','".$date2."','".$catfilter."','%".$city."%')";
		} else {
			$sql = "CALL investreportbetweendatev2(".$idmsuser.",'".$date1."','".$date2."','".$catfilter."','".$city."')";
		}
		$data = DB::select($sql);
		return $data;
	}

	public function getReportTransactionTotal($idmsuser, $date1, $date2, $catfilter, $city)
	{
		$idmsuser = Helper::dbescapeNotNull($idmsuser);
		$sql = "";
		if($city != -1) {
			$sql = "CALL investreporttotalv2(".$idmsuser.",'".$date1."','".$date2."','".$catfilter."','%".$city."%')";
		} else {
			$sql = "CALL investreporttotalv2(".$idmsuser.",'".$date1."','".$date2."','".$catfilter."','".$city."')";
		}
		
		$data = DB::select($sql);
		return $data;
	}

	function getsupplier()
	{
		$data = DB::select("CALL investgetsupplier()");
		return $data;
	}

	function getCategory($idmsuser)
	{
		$data = DB::select("CALL investreportcategory('".$idmsuser."')");
		return $data;
	}

	public function getReportCSVDumpData($idmsuser, $date1, $date2, $catfilter, $city)
	{
		$idmsuser = Helper::dbescapeNotNull($idmsuser);
		$sql = "";
		if($city != -1) {
			$sql = "CALL investreportdumpdatav2(".$idmsuser.",'".$date1."','".$date2."','".$catfilter."','%".$city."%')";
		} else {
			$sql = "CALL investreportdumpdatav2(".$idmsuser.",'".$date1."','".$date2."','".$catfilter."','".$city."')";
		}
		$data = DB::select($sql);
		return $data;
	}

}
