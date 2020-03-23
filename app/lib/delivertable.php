<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class delivertable {
	function setbuyertofishcatch($idtrfishcatchpostparam, $idmsbuyerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idtrfishcatchpostparam = Helper::dbescape($idtrfishcatchpostparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);

		$data = DB::select("CALL setbuyertofishcatch(".$idtrfishcatchpostparam.", ".$idmsbuyerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addnewdelivery($iddeliveryofflineparam, $idtrfishcatchpostparam, $totalpriceparam, $descparamparam, $settobuyerdateparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrfishcatchpostparam = Helper::dbescape($idtrfishcatchpostparam);
		$totalpriceparam = Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$settobuyerdateparam = Helper::dbescape($settobuyerdateparam);

		$data = DB::select("CALL addnewdelivery(".$iddeliveryofflineparam.", ".$idtrfishcatchpostparam.",". $totalpriceparam.",".$descparamparam.", ".$settobuyerdateparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatedelivery($iddeliveryofflineparam, $totalpriceparam, $descparamparam, $settobuyerdateparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrfishcatchparam = Helper::dbescape($idtrfishcatchparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);
		$totalpriceparam = Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);

		$data = DB::select("CALL updatedelivery(".$iddeliveryofflineparam.", ".$idtrfishcatchparam.",". $idmsbuyerparam.",".$totalpriceparam.", ".$descparamparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatedeliveryprice($iddeliveryofflineparam, $totalpriceparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$totalpriceparam = Helper::dbescape($totalpriceparam);

		$data = DB::select("CALL updatedeliveryprice(".$iddeliveryofflineparam.", ".$totalpriceparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletedelivery($iddeliveryofflineparam)
	{
		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$data = DB::select("CALL deletedelivery(".$iddeliveryofflineparam.")");
		return $data;
	}


	function addnewdeliveryv2($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $idmssupplierparam, $deliverysheetofflineidparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$sendtobuyerdateparam = Helper::dbescape($sendtobuyerdateparam);
		$deliverydateparam = Helper::dbescape($deliverydateparam);
		$transportbyparam = $transportbyparam == null ? "NULL" : Helper::dbescape($transportbyparam);
		$transportnameidparam = $transportnameidparam == null ? "NULL" : Helper::dbescape($transportnameidparam);
		$transportreceiptparam = $transportreceiptparam == null ? "NULL" : Helper::dbescape($transportreceiptparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);

		$data = DB::select("CALL addnewdeliveryv2(".$iddeliveryofflineparam.", ".$idtrfishcatchofflineparam.", ". $totalpriceparam.", ". $descparamparam.", ". $sendtobuyerdateparam.", ". $deliverydateparam.", ". $transportbyparam.", ". $transportnameidparam.", ". $transportreceiptparam.", ".$idmsbuyerparam.", ".$idmssupplierparam.", ". $deliverysheetofflineidparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatedeliveryv2($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $deliverysheetofflineidparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$sendtobuyerdateparam = Helper::dbescape($sendtobuyerdateparam);
		$deliverydateparam = Helper::dbescape($deliverydateparam);
		$transportbyparam = $transportbyparam == null ? "NULL" : Helper::dbescape($transportbyparam);
		$transportnameidparam = $transportnameidparam == null ? "NULL" : Helper::dbescape($transportnameidparam);
		$transportreceiptparam = $transportreceiptparam == null ? "NULL" : Helper::dbescape($transportreceiptparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		$data = DB::select("CALL updatedelivery2(".$iddeliveryofflineparam.", ".$idtrfishcatchofflineparam.", ". $totalpriceparam.", ". $descparamparam.", ". $sendtobuyerdateparam.", ". $deliverydateparam.", ". $transportbyparam.", ". $transportnameidparam.", ". $transportreceiptparam.", ".$idmsbuyerparam.", ".$deliverysheetofflineidparam.")");
		return $data;
	}

	function getdeliverybyidmssupplier($idmssuplierparam)
	{
		$idmssuplierparam = Helper::dbescape($idmssuplierparam);

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		$data = DB::select("CALL getdeliverybyidmssupplier(".$idmssuplierparam.")");
		return $data;
	}

	function getdeliverybyidmssupplierv3($idmssuplierparam)
	{
		$idmssuplierparam = Helper::dbescape($idmssuplierparam);

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		$data = DB::select("CALL getdeliverybyidmssupplierv3(".$idmssuplierparam.")");
		return $data;
	}

	function addnewdeliverybatch($iddeliveryofflineparam, $idtrcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $idmssupplierparam, $deliverysheetofflineidparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrcatchofflineparam = Helper::dbescape($idtrcatchofflineparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$sendtobuyerdateparam = Helper::dbescape($sendtobuyerdateparam);
		$deliverydateparam = Helper::dbescape($deliverydateparam);
		$transportbyparam = $transportbyparam == null ? "NULL" : Helper::dbescape($transportbyparam);
		$transportnameidparam = $transportnameidparam == null ? "NULL" : Helper::dbescape($transportnameidparam);
		$transportreceiptparam = $transportreceiptparam == null ? "NULL" : Helper::dbescape($transportreceiptparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);


		$data = DB::select("CALL addnewdeliverybatchv2(".$iddeliveryofflineparam.", ".$idtrcatchofflineparam.", ". $totalpriceparam.", ". $descparamparam.", ". $sendtobuyerdateparam.", ". $deliverydateparam.", ". $transportbyparam.", ". $transportnameidparam.", ". $transportreceiptparam.", ".$idmsbuyerparam.", ".$idmssupplierparam.", ".$deliverysheetofflineidparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatedeliverybatch($iddeliveryofflineparam, $idtrcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $deliverysheetofflineidparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrcatchofflineparam = Helper::dbescape($idtrcatchofflineparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$sendtobuyerdateparam = Helper::dbescape($sendtobuyerdateparam);
		$deliverydateparam = Helper::dbescape($deliverydateparam);
		$transportbyparam = $transportbyparam == null ? "NULL" : Helper::dbescape($transportbyparam);
		$transportnameidparam = $transportnameidparam == null ? "NULL" : Helper::dbescape($transportnameidparam);
		$transportreceiptparam = $transportreceiptparam == null ? "NULL" : Helper::dbescape($transportreceiptparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		$data = DB::select("CALL updatedeliverybatchv2(".$iddeliveryofflineparam.", ".$idtrcatchofflineparam.", ". $totalpriceparam.", ". $descparamparam.", ". $sendtobuyerdateparam.", ". $deliverydateparam.", ". $transportbyparam.", ". $transportnameidparam.", ". $transportreceiptparam.", ".$idmsbuyerparam.", ".$deliverysheetofflineidparam.")");
		return $data;
	}

	function getreportdelivery($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		$data = DB::select("CALL getreportdelivery(".$idparam.", ".$day.", ".$month.", ".$year.")");
		return $data;
	}

	function createdeliverysheet($deliverysheetofflineidparam, $savedtextparam)
	{
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);
		$savedtextparam = Helper::dbescape($savedtextparam);
		$data = DB::select("CALL createdeliverysheet(".$deliverysheetofflineidparam.", ".$savedtextparam.")");
		return $data;
	}

	function updatedeliverysheet($deliverysheetofflineidparam, $savedtextparam)
	{
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);
		$savedtextparam = Helper::dbescape($savedtextparam);
		$data = DB::select("CALL updatedeliverysheet(".$deliverysheetofflineidparam.", ".$savedtextparam.")");
		return $data;
	}

	function deletedeliverysheet($deliverysheetofflineidparam)
	{
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);
		$data = DB::select("CALL deletedeliverysheet(".$deliverysheetofflineidparam.")");
		return $data;
	}

	function getdeliverysheet($deliverysheetofflineidparam)
	{
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);
		$data = DB::select("CALL getdeliverysheet(".$deliverysheetofflineidparam.")");
		return $data;
	}

	function getdeliverysheetbyiddelivery($iddeliveryparam)
	{
		$iddeliveryparam = Helper::dbescape($iddeliveryparam);
		$data = DB::select("CALL getdeliverysheetbyiddeliveryv2(".$iddeliveryparam.")");
		return $data;
	}
	
	function getdeliverysheetbyidmssupplier($idsupplierparam)
	{
		$idsupplierparam = Helper::dbescape($idsupplierparam);
		$data = DB::select("CALL getdeliverysheetbyidmssupplier(".$idsupplierparam.")");
		return $data;
	}
	
	function addnewdeliveryv3($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $idmssupplierparam, $deliverysheetofflineidparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$sendtobuyerdateparam = Helper::dbescape($sendtobuyerdateparam);
		$deliverydateparam = Helper::dbescape($deliverydateparam);
		$transportbyparam = $transportbyparam == null ? "NULL" : Helper::dbescape($transportbyparam);
		$transportnameidparam = $transportnameidparam == null ? "NULL" : Helper::dbescape($transportnameidparam);
		$transportreceiptparam = $transportreceiptparam == null ? "NULL" : Helper::dbescape($transportreceiptparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL addnewdeliveryv3(".$iddeliveryofflineparam.", ".$idtrfishcatchofflineparam.", ". $totalpriceparam.", ". $descparamparam.", ". $sendtobuyerdateparam.", ". $deliverydateparam.", ". $transportbyparam.", ". $transportnameidparam.", ". $transportreceiptparam.", ".$idmsbuyerparam.", ".$idmssupplierparam.", ". $deliverysheetofflineidparam.", ". $sender.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatedeliveryv3($iddeliveryofflineparam, $idtrfishcatchofflineparam, $totalpriceparam, $descparamparam, $sendtobuyerdateparam, $deliverydateparam, $transportbyparam, $transportnameidparam, $transportreceiptparam, $idmsbuyerparam, $deliverysheetofflineidparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$descparamparam = Helper::dbescape($descparamparam);
		$sendtobuyerdateparam = Helper::dbescape($sendtobuyerdateparam);
		$deliverydateparam = Helper::dbescape($deliverydateparam);
		$transportbyparam = $transportbyparam == null ? "NULL" : Helper::dbescape($transportbyparam);
		$transportnameidparam = $transportnameidparam == null ? "NULL" : Helper::dbescape($transportnameidparam);
		$transportreceiptparam = $transportreceiptparam == null ? "NULL" : Helper::dbescape($transportreceiptparam);
		$idmsbuyerparam = Helper::dbescape($idmsbuyerparam);
		$deliverysheetofflineidparam = Helper::dbescape($deliverysheetofflineidparam);
		$sender = Helper::dbescape($sender);

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		$data = DB::select("CALL updatedeliveryv3(".$iddeliveryofflineparam.", ".$idtrfishcatchofflineparam.", ". $totalpriceparam.", ". $descparamparam.", ". $sendtobuyerdateparam.", ". $deliverydateparam.", ". $transportbyparam.", ". $transportnameidparam.", ". $transportreceiptparam.", ".$idmsbuyerparam.", ".$deliverysheetofflineidparam.", ". $sender.")");
		return $data;
	}

	function deletedeliveryv3($iddeliveryofflineparam, $sender)
	{
		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL deletedeliveryv3(".$iddeliveryofflineparam.", ". $sender.")");
		return $data;
	}

	function updatedeliverypricev3($iddeliveryofflineparam, $totalpriceparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$iddeliveryofflineparam = Helper::dbescape($iddeliveryofflineparam);
		$totalpriceparam = Helper::dbescape($totalpriceparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL updatedeliveryprice(".$iddeliveryofflineparam.", ".$totalpriceparam.", ". $sender.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addnewtrbatchdeliverysheet($deliverysheetnoparam, $nationalregistrationsuppliercodeparam, $suppliernameparam, $idmssupplierparam, $deliverydateparam, $numberoffishorloinparam, $totalweightparam, $sellpriceparam, $notesparam, $buyeridparam, $buyernameparam, $idmsusercreatorparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$deliverysheetnoparam = $deliverysheetnoparam == null ? "NULL" : Helper::dbescape($deliverysheetnoparam);
		$nationalregistrationsuppliercodeparam = $nationalregistrationsuppliercodeparam == null ? "NULL":Helper::dbescape($nationalregistrationsuppliercodeparam);
		$suppliernameparam = $suppliernameparam == null ? "NULL" :Helper::dbescape($suppliernameparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" :Helper::dbescape($idmssupplierparam);
		$deliverydateparam = $deliverydateparam == null ? "NULL" :Helper::dbescape($deliverydateparam);
		$numberoffishorloinparam = $numberoffishorloinparam == null ? "NULL" :Helper::dbescape($numberoffishorloinparam);
		$totalweightparam = $totalweightparam == null ? "NULL": Helper::dbescape($totalweightparam);
		$sellpriceparam = $sellpriceparam == null ? "NULL" :Helper::dbescape($sellpriceparam);
		$notesparam = $notesparam == null ? "NULL" : Helper::dbescape($notesparam);
		$idmsusercreatorparam = $idmsusercreatorparam == null ? "NULL" : Helper::dbescape($idmsusercreatorparam);

		$buyeridparam = $buyeridparam == null ? "NULL" : Helper::dbescape($buyeridparam);
		$buyernameparam = $buyernameparam == null ? "NULL" : Helper::dbescape($buyernameparam);

		$data = DB::select("CALL addnewtrbatchdeliverysheet(".$deliverysheetnoparam.",". $nationalregistrationsuppliercodeparam.",". $suppliernameparam.",". $idmssupplierparam.",". $deliverydateparam.",". $numberoffishorloinparam.",". $totalweightparam.",". $sellpriceparam.",". $notesparam.",". $idmsusercreatorparam.",". $buyeridparam.",". $buyernameparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addnewtrbatchdeliverysheetfishdata($deliverysheetnoparam, $idtrfishcatchparam, $idtrfishcatchofflineparam, $amountparam, $gradeparam, $descriptionparam, $idfishparam, $idtrcatchofflineparam, $fishnameengparam, $fishnameindparam, $unitnameparam, $speciesparam, $vesselnameparam, $vesselsizeparam, $vesselregistrationnoparam, $expireddateparam, $vesselflagparam, $fishinggroundparam, $landingsiteparam, $geartypeparam, $catchdateparam, $fishermannameparam, $landingdateparam, $fadusedparam, $sellpriceparam, $idmsusercreatorparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$deliverysheetnoparam = $deliverysheetnoparam == null ? "NULL" : Helper::dbescape($deliverysheetnoparam);
		$idtrfishcatchparam = $idtrfishcatchparam == null ? "NULL" : Helper::dbescape($idtrfishcatchparam);
		$idtrfishcatchofflineparam = $idtrfishcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrfishcatchofflineparam);
		$amountparam = $amountparam == null ? "NULL" : Helper::dbescape($amountparam);
		$gradeparam = $gradeparam == null ? "NULL" : Helper::dbescape($gradeparam);
		$descriptionparam = $descriptionparam == null ? "NULL" : Helper::dbescape($descriptionparam);
		$idfishparam = $idfishparam == null ? "NULL" : Helper::dbescape($idfishparam);
		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$fishnameengparam = $fishnameengparam == null ? "NULL" :  Helper::dbescape($fishnameengparam);
		$fishnameindparam = $fishnameindparam == null ? "NULL" : Helper::dbescape($fishnameindparam);
		$unitnameparam = $unitnameparam == null ? "NULL" : Helper::dbescape($unitnameparam);

		$speciesparam = $speciesparam == null ? "NULL" : Helper::dbescape($speciesparam);
		$vesselnameparam = $vesselnameparam == null ? "NULL" : Helper::dbescape($vesselnameparam);
		$vesselsizeparam = $vesselsizeparam == null ? "NULL" : Helper::dbescape($vesselsizeparam);
		$vesselregistrationnoparam = $vesselregistrationnoparam == null ? "NULL" : Helper::dbescape($vesselregistrationnoparam);
		$expireddateparam = $expireddateparam == null ? "NULL" : Helper::dbescape($expireddateparam);
		$vesselflagparam = $vesselflagparam == null ? "NULL" : Helper::dbescape($vesselflagparam);
		$fishinggroundparam = $fishinggroundparam == null ? "NULL" : Helper::dbescape($fishinggroundparam);
		$landingsiteparam = $landingsiteparam == null ? "NULL" : Helper::dbescape($landingsiteparam);
		$geartypeparam = $geartypeparam == null ? "NULL" :  Helper::dbescape($geartypeparam);
		$catchdateparam = $catchdateparam == null ? "NULL" : Helper::dbescape($catchdateparam);

		$fishermannameparam = $fishermannameparam == null ? "NULL" : Helper::dbescape($fishermannameparam);
		$landingdateparam = $landingdateparam == null ? "NULL" : Helper::dbescape($landingdateparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$sellpriceparam = $sellpriceparam == null ? "NULL" : Helper::dbescape($sellpriceparam);
		$idmsusercreatorparam = $idmsusercreatorparam == null ? "NULL" : Helper::dbescape($idmsusercreatorparam);

		$data = DB::select("CALL addnewtrbatchdeliverysheetfishdata(".$deliverysheetnoparam.",". $idtrfishcatchparam.",". $idtrfishcatchofflineparam.",". $amountparam.",". $gradeparam.",". $descriptionparam.",". $idfishparam.",". $idtrcatchofflineparam.",". $fishnameengparam.",". $fishnameindparam.",". $unitnameparam.",". $speciesparam.",". $vesselnameparam.",". $vesselsizeparam.",". $vesselregistrationnoparam.",". $expireddateparam.",". $vesselflagparam.",". $fishinggroundparam.",". $landingsiteparam.",". $geartypeparam.",". $catchdateparam.",". $fishermannameparam.",". $landingdateparam.",". $fadusedparam.",". $sellpriceparam.",". $idmsusercreatorparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletetrbatchdeliverysheetfishdata($idmsuserparam, $deliverysheetnoparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idmsuserparam = $idmsuserparam == null ? "NULL" : Helper::dbescape($idmsuserparam);
		$deliverysheetnoparam = $deliverysheetnoparam == null ? "NULL" : Helper::dbescape($deliverysheetnoparam);

		$data = DB::select("CALL deletetrbatchdeliverysheetfishdata(".$idmsuserparam.",". $deliverysheetnoparam.")");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletetrbatchdeliverysheet($idmsuserparam, $deliverysheetnoparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idmsuserparam = $idmsuserparam == null ? "NULL" : Helper::dbescape($idmsuserparam);
		$deliverysheetnoparam = $deliverysheetnoparam == null ? "NULL" : Helper::dbescape($deliverysheetnoparam);

		$data = DB::select("CALL deletetrbatchdeliverysheet(".$idmsuserparam.",". $deliverysheetnoparam.")");
		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function getalldeliverysheet()
	{
		$data = DB::select("CALL getalldeliverysheet()");
		return $data;	
	}

	function getfishnamebyidtrcatchoffline($idtrcatchofflineparam)
	{
		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$data = DB::select("CALL getfishnamebyidtrcatchoffline(".$idtrcatchofflineparam.")");
		return $data;	
	}

	function getdeliverysheetbyidmssupplierv6($idsupplierparam, $month1, $year1, $month2, $year2)
	{
		$idsupplierparam = Helper::dbescape($idsupplierparam);
		$data = DB::select("CALL getdeliverysheetbyidmssupplierv6(".$idsupplierparam.", ".$month1.", ".$year1.", ".$month2.", ".$year2.")");
		return $data;
	}

}


