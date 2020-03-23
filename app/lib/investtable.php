<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class investtable {

	function upsertTakeLoan($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$offlineID = Helper::dbescape($req->offlineID);
		$creditor = Helper::dbescape($req->creditor);
		$tenor = $req->tenor;
		$installment = $req->installment;
		$payperiod = $req->payperiod;
		$amount = $req->amount;
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select("CALL upsertinvestloan(".$offlineID.",". $creditor.", ". $tenor.","
			. $installment.", ". $payperiod.",". $amount.",". $notes.",". $ts.",". $synch.","
			. $trxoperation.",". $idmssupplier.',' .$idmsuser.")");

		return $data;
	}

	function upsertPayLoan($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$offlineID = Helper::dbescape($req->offlineID);
		$takeLoanOfflineID = Helper::dbescape($req->takeLoanOfflineID);
		$amount = $req->amount;
		$notes = Helper::dbescapeNotNull($req->notes);
		$paidoff = $req->paidoff;
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select("CALL upsertinvestpayloan(".$offlineID.",". $takeLoanOfflineID.", ". $amount.",". $notes.","
			. $paidoff.",". $ts.",". $synch.",". $trxoperation.",". $idmssupplier.',' .$idmsuser.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function upsertGiveCredit($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$offlineID = Helper::dbescape($req->offlineID);
		$trafizLoanOfflineID = Helper::dbescape($req->trafizLoanOfflineID);
		$name = Helper::dbescape($req->name);
		$amount = $req->amount;
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select("CALL upsertinvestgivecredit(".$offlineID.",". $trafizLoanOfflineID.", ".$name.","
			. $amount.",". $notes.",". $ts.",". $synch.",". $trxoperation.",". $idmssupplier.',' .$idmsuser.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function upsertCreditPayment($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$offlineID = Helper::dbescape($req->offlineID);
		$giveCreditOfflineID = Helper::dbescape($req->giveCreditOfflineID);
		$trafizPayloanOfflineID = Helper::dbescapeNotNull($req->trafizPayloanOfflineID);
		$amount = $req->amount;
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);
		$paidoff  = $req->paidoff;

		$data = DB::select("CALL upsertinvestcreditpayment(".$offlineID.",". $giveCreditOfflineID.", ".$trafizPayloanOfflineID.","
			. $amount.",". $notes.",". $ts.",". $synch.",". $trxoperation.",". $idmssupplier.',' .$idmsuser.',' .$paidoff.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function upsertCustomExpense($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		
		$offlineID = Helper::dbescape($req->offlineID);
		$offlineCustomTypeID = Helper::dbescape($req->offlineCustomTypeID);
		$amount = $req->amount;
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$createddate = Helper::dbescape($req->createddate);
		$createdhour = Helper::dbescape($req->createdhour);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select("CALL upsertinvestcustomexpense(".$offlineID.",". $offlineCustomTypeID.", ".$amount.",". $notes.","
			. $ts.",". $createddate.",". $createdhour.",". $synch.",". $trxoperation.",". $idmssupplier.',' .$idmsuser.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function upsertCustomIncome($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$offlineID = Helper::dbescape($req->offlineID);
		$offlineCustomTypeID = Helper::dbescape($req->offlineCustomTypeID);
		$amount = $req->amount;
		$notes = Helper::dbescapeNotNull($req->notes);
		$ts = Helper::ensureNotNull($req->ts,0);
		$createddate = Helper::dbescape($req->createddate);
		$createdhour = Helper::dbescape($req->createdhour);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select("CALL upsertinvestcustomincome(".$offlineID.",". $offlineCustomTypeID.", ".$amount.",". $notes.","
			. $ts.",". $createddate.",". $createdhour.",". $synch.",". $trxoperation.",". $idmssupplier.',' .$idmsuser.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function upsertCustomType($req)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$offlineID = Helper::dbescape($req->offlineID);
		$label = Helper::dbescape($req->label);
		$incomeorexpense = Helper::ensureNotNull($req->incomeorexpense,'Income');
		$ts = Helper::ensureNotNull($req->ts,0);
		$createddate = Helper::dbescape($req->createddate);
		$createdhour = Helper::dbescape($req->createdhour);
		$synch = 1;
		$trxoperation = Helper::dbescapeNotNull($req->trxoperation);
		$idmssupplier = Helper::dbescapeNotNull($req->idmssupplier);
		$idmsuser = Helper::dbescapeNotNull($req->idmsuser);

		$data = DB::select("CALL upsertinvestcustomtype(".$offlineID.",". $label.", '".$incomeorexpense."',"
			. $ts.",". $createddate.",". $createdhour.",". $synch.",". $trxoperation.",". $idmssupplier.',' .$idmsuser.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

// getinvestloan

	public function getlistCustomExpense($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestcustomexpenselistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getlistCustomIncome($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestcustomincomelistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getlistCustomType($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestcustomtypelistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getlistTakeLoan($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestloanlistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getlistPayLoan($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestpayloanlistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getlistGiveCredit($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestgivecreditlistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

	public function getlistCreditPayment($idmsuser, $d, $m, $y)
	{
		$idmsuser = Helper::dbescape($idmsuser);
		$d = Helper::ensureNotNull($d, 0);
		$m = Helper::ensureNotNull($m, 0);
		$y = Helper::ensureNotNull($y, 0);
		$data = DB::select("CALL getinvestcreditpaymentlistbyidmsuser(".$idmsuser.",". $d.",". $m.",". $y.")");
		return $data;
	}

}
