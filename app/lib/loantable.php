<?php
namespace App\lib;
use DB;
use App\lib\Helper;

class loantable {

	function addnewloan($descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = Helper::dbescape($loandateparam);
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);

		$data = DB::select("CALL addnewloan(".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.",
			". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updateloan($idtrloanparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idtrloanparam = Helper::dbescape($idtrloanparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = Helper::dbescape($loandateparam);
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);

		$data = DB::select("CALL updateloan(".$idtrloanparam.", ".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.", ". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deleteloan($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deleteloan(".$idparam.")");
		return $data;
	}

	function getloanlistbyidmssupplier($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$dataGet = DB::select("CALL getloanlistbyidmssupplier(".$idparam.", ".$day.", ".$month.", ".$year.")");
		//var_dump("CALL getloanlistbyidmssupplier(".$idparam.", ".$month.", ".$year.")");
		//die();

		$app = app();
		$data = $app->make('stdClass');

		$idmsuserloan = "";
		$arrayIndex = -1;
		$loanIndex = -1;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idmsuserloan != ($dataGet[$i]->idmsuserloan == null ?  $dataGet[$i]->idmsbuyerloan : $dataGet[$i]->idmsuserloan))
			{
				$idmsuserloan = $dataGet[$i]->idmsuserloan == null ?  $dataGet[$i]->idmsbuyerloan : $dataGet[$i]->idmsuserloan;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idmsuserloan = $dataGet[$i]->idmsuserloan;
				$data->data[$arrayIndex]->idmsbuyerloan = $dataGet[$i]->idmsbuyerloan;
				$data->data[$arrayIndex]->nameloan = $dataGet[$i]->nameloan == null ? $dataGet[$i]->nameloanbuyer : $dataGet[$i]->nameloan;
				$data->data[$arrayIndex]->loan = array();
				$loanIndex = 0;
			}
			$data->data[$arrayIndex]->loan[$loanIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->loan[$loanIndex]->idtrloan = $dataGet[$i]->idtrloan;
			$data->data[$arrayIndex]->loan[$loanIndex]->idloanoffline = $dataGet[$i]->idloanoffline;
			$data->data[$arrayIndex]->loan[$loanIndex]->loandate = $dataGet[$i]->loandate;
			$data->data[$arrayIndex]->loan[$loanIndex]->descloan = $dataGet[$i]->descloan;
			$data->data[$arrayIndex]->loan[$loanIndex]->loaninrp = $dataGet[$i]->loaninrp;
			$data->data[$arrayIndex]->loan[$loanIndex]->paidoffdate = $dataGet[$i]->paidoffdate;
			$data->data[$arrayIndex]->loan[$loanIndex]->namepaidoffofficer = $dataGet[$i]->namepaidoffofficer;
			$data->data[$arrayIndex]->loan[$loanIndex]->nameloanerofficer = $dataGet[$i]->nameloanerofficer;
			$data->data[$arrayIndex]->loan[$loanIndex]->namecreator = $dataGet[$i]->namecreator;
			$data->data[$arrayIndex]->loan[$loanIndex]->namelasttrans = $dataGet[$i]->namelasttrans;

			$data->data[$arrayIndex]->loan[$loanIndex]->idmstypeitemloanoffline = $dataGet[$i]->idmstypeitemloanoffline;
			$data->data[$arrayIndex]->loan[$loanIndex]->unit = $dataGet[$i]->unit;
			$data->data[$arrayIndex]->loan[$loanIndex]->priceperunit = $dataGet[$i]->priceperunit;

			$data->data[$arrayIndex]->loan[$loanIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
			$data->data[$arrayIndex]->loan[$loanIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
			
			$loanIndex++;
		}
		return $data->data;
	}

	function getloanlistbyidmssupplierv2($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$dataGet = DB::select("CALL getloanlistbyidmssupplierv2(".$idparam.", ".$day.", ".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');

		$iduserloan = "~";
		$arrayIndex = -1;
		$loanIndex = -1;

		$data->data = array();

		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($iduserloan != $dataGet[$i]->iduserloan)
			{
				$iduserloan = $dataGet[$i]->iduserloan;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idmsuserloan = $dataGet[$i]->idmsuserloan;
				$data->data[$arrayIndex]->idmsbuyerloan = $dataGet[$i]->idmsbuyerloan;
				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
				/*
				$data->data[$arrayIndex]->idmsuserloan = $dataGet[$i]->idmsuserloan;
				$data->data[$arrayIndex]->idmsbuyerloan = $dataGet[$i]->idmsbuyerloan;
				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;*/

				$data->data[$arrayIndex]->nameloanfisherman = $dataGet[$i]->nameloan;
				$data->data[$arrayIndex]->nameloanbuyer = $dataGet[$i]->nameloanbuyer;
				$data->data[$arrayIndex]->nameloanoffline = $dataGet[$i]->nameloanoffline;
				$data->data[$arrayIndex]->nameloanbuyeroffline = $dataGet[$i]->nameloanbuyeroffline;

				$data->data[$arrayIndex]->iduserloan = $iduserloan;
				$data->data[$arrayIndex]->nameloan =
					$dataGet[$i]->nameloan == null ?
						($dataGet[$i]->nameloanbuyer == null ? 
							($dataGet[$i]->nameloanoffline == null ? $dataGet[$i]->nameloanbuyeroffline : $dataGet[$i]->nameloanoffline)
						: $dataGet[$i]->nameloanbuyer)
					: $dataGet[$i]->nameloan;

				$data->data[$arrayIndex]->loan = array();
				$loanIndex = 0;
			}
			
			$data->data[$arrayIndex]->idmsuserloan = $data->data[$arrayIndex]->idmsuserloan == null ?
				$dataGet[$i]->idmsuserloan : $data->data[$arrayIndex]->idmsuserloan;
			$data->data[$arrayIndex]->idmsbuyerloan = $data->data[$arrayIndex]->idmsbuyerloan == null ?
				$dataGet[$i]->idmsbuyerloan : $data->data[$arrayIndex]->idmsbuyerloan;
			$data->data[$arrayIndex]->idfishermanoffline = $data->data[$arrayIndex]->idfishermanoffline == null ? $dataGet[$i]->idfishermanoffline : $data->data[$arrayIndex]->idfishermanoffline;
			$data->data[$arrayIndex]->idbuyeroffline = $data->data[$arrayIndex]->idbuyeroffline == null ?
				$dataGet[$i]->idbuyeroffline : $data->data[$arrayIndex]->idbuyeroffline;

			$data->data[$arrayIndex]->loan[$loanIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->loan[$loanIndex]->idtrloan = $dataGet[$i]->idtrloan;
			$data->data[$arrayIndex]->loan[$loanIndex]->idloanoffline = $dataGet[$i]->idloanoffline;
			$data->data[$arrayIndex]->loan[$loanIndex]->loandate = $dataGet[$i]->loandate;
			$data->data[$arrayIndex]->loan[$loanIndex]->descloan = $dataGet[$i]->descloan;
			$data->data[$arrayIndex]->loan[$loanIndex]->loaninrp = $dataGet[$i]->loaninrp;
			$data->data[$arrayIndex]->loan[$loanIndex]->paidoffdate = $dataGet[$i]->paidoffdate;
			$data->data[$arrayIndex]->loan[$loanIndex]->namepaidoffofficer = $dataGet[$i]->namepaidoffofficer;
			$data->data[$arrayIndex]->loan[$loanIndex]->nameloanerofficer = $dataGet[$i]->nameloanerofficer;
			$data->data[$arrayIndex]->loan[$loanIndex]->namecreator = $dataGet[$i]->namecreator;
			$data->data[$arrayIndex]->loan[$loanIndex]->namelasttrans = $dataGet[$i]->namelasttrans;

			$data->data[$arrayIndex]->loan[$loanIndex]->idmstypeitemloanoffline = $dataGet[$i]->idmstypeitemloanoffline;
			$data->data[$arrayIndex]->loan[$loanIndex]->unit = $dataGet[$i]->unit;
			$data->data[$arrayIndex]->loan[$loanIndex]->priceperunit = $dataGet[$i]->priceperunit;			
			$loanIndex++;
		}
		return $data->data;
	}

	function getloanlist($month, $year)
	{
		$data = DB::select("CALL getloanlist(".$month.", ".$year.")");
		return $data;
	}

	function getloanlistsupplier($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);

		$data = DB::select("CALL getloanlistbyidmssupplier(".$idparam.", ".$day.", ".$month.", ".$year.")");
		return $data;
	}
	
	function addnewloanv2($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = Helper::dbescape($loandateparam);
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);

		$data = DB::select("CALL addnewloanv2(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.",
			". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	

	function updateloanv2($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = Helper::dbescape($loandateparam);
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);

		$data = DB::select("CALL updateloanv2(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.", ". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	

	function deleteloanv2($idloanofflineparam)
	{
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$data = DB::select("CALL deleteloanv2(".$idloanofflineparam.")");
		return $data;
	}

	

	// pay loan
	function payloan($idtrloanparam, $paidoffdateparam, $paidoffidmsuserofficerparam)
	{
		$idtrloanparam = Helper::dbescape($idtrloanparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);

		$data = DB::select("CALL payloan(".$idtrloanparam.",". $paidoffdateparam .",". $paidoffidmsuserofficerparam.")");
		return $data;
	}

	function cancelpayloan($idtrloanparam)
	{
		$idtrloanparam = Helper::dbescape($idtrloanparam);
		
		$data = DB::select("CALL cancelpayloan(".$idtrloanparam.")");
		return $data;
	}


	function addpayloan($idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paiddateparam = Helper::dbescape($paiddateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);

		$data = DB::select("CALL addpayloan(".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paiddateparam.", ". $paidoffidmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatepayloan($idtrpayloanparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idtrpayloanparam = Helper::dbescape($idtrpayloanparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);

		$data = DB::select("CALL updatepayloan(".$idtrpayloanparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paidoffdateparam.", ". $paidoffidmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletepayloan($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletepayloan(".$idparam.")");
		return $data;
	}

	function getpayloanlist($month, $year)
	{
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		$data = DB::select("CALL getpayloanlist(".$month.", ".$year.")");
		return $data;
	}

	function getpayloanlistbyidmssupplier($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);

		$data = DB::select("CALL getpayloanlistbyidmssupplier(".$idparam.", ".$day.", ".$month.", ".$year.")");
		return $data;
	}

	function getpayloanlistbyidmsusersupplier($idparam, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		$data = DB::select("CALL getpayloanlistbyidmsusersupplier(".$idparam.", ".$month.", ".$year.")");
		return $data;
	}

	function getreportloan($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		$data = DB::select("CALL getreportloan(".$idparam.", ".$day.", ".$month.", ".$year.")");
		return $data;
	}

	function getreportpayloan($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		$data = DB::select("CALL getreportpayloan(".$idparam.", ".$day.", ".$month.", ".$year.")");
		return $data;
	}

	function getloanernloanbyidmssupplier($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getloanernloanbyidmssupplier(".$idparam.")");
		return $data;
	}

	function addpayloanv2($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idpayloanofflineparam = Helper::dbescape($idpayloanofflineparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paiddateparam = Helper::dbescape($paiddateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);

		$data = DB::select("CALL addpayloanv2(".$idpayloanofflineparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paiddateparam.", ". $paidoffidmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatepayloanv2($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idpayloanofflineparam = Helper::dbescape($idpayloanofflineparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);

		$data = DB::select("CALL updatepayloanv2(".$idpayloanofflineparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paidoffdateparam.", ". $paidoffidmsuserofficerparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletepayloanv2($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletepayloanv2(".$idparam.")");
		return $data;
	}

	function payloanv2($idloanofflineparam, $paidoffdateparam, $paidoffidmsuserofficerparam)
	{
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);

		$data = DB::select("CALL payloanv2(".$idloanofflineparam.",". $paidoffdateparam .",". $paidoffidmsuserofficerparam.")");
		return $data;
	}

	function cancelpayloanv2($idtrloanparam)
	{
		$idtrloanparam = Helper::dbescape($idtrloanparam);
		
		$data = DB::select("CALL cancelpayloanv2(".$idtrloanparam.")");
		return $data;
	}

	// v3
	function addnewloanv3($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $idmsusercreator)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = Helper::dbescape($loandateparam);
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);
		$idmsusercreator = $idmsusercreator == null ? 'NULL' : Helper::dbescape($idmsusercreator);

		$data = DB::select("CALL addnewloanv3(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.",". 
			$idmsuserloanparam.",". $idmsbuyerloanparam.", ". $idmssupplierparam.",". 
			$loandateparam.",". $loaneridmsuserofficerparam.",".$idmsusercreator.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updateloanv3($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $idmsusercreator)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = Helper::dbescape($loandateparam);
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);
		$idmsusercreator = $idmsusercreator == null ? 'NULL' : Helper::dbescape($idmsusercreator);

		$data = DB::select("CALL updateloanv3(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.", ". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.",".$idmsusercreator.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deleteloanv3($idloanofflineparam, $sender)
	{
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$sender = Helper::dbescape($sender);
		$data = DB::select("CALL deleteloanv3(".$idloanofflineparam.",".$sender.")");
		return $data;
	}

	function addpayloanv3($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idpayloanofflineparam = Helper::dbescape($idpayloanofflineparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paiddateparam = Helper::dbescape($paiddateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL addpayloanv3(".$idpayloanofflineparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paiddateparam.", ". $paidoffidmsuserofficerparam.",".$sender.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatepayloanv3($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idpayloanofflineparam = Helper::dbescape($idpayloanofflineparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL updatepayloanv3(".$idpayloanofflineparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paidoffdateparam.", ". $paidoffidmsuserofficerparam.",".$sender.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function deletepayloanv3($idparam, $sender)
	{
		$idparam = Helper::dbescape($idparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL deletepayloanv3(".$idparam.",".$sender.")");
		return $data;
	}

	function payloanv3($idloanofflineparam, $paidoffdateparam, $paidoffidmsuserofficerparam, $sender)
	{
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL payloanv3(".$idloanofflineparam.",". $paidoffdateparam .",". $paidoffidmsuserofficerparam.",".$sender.")");
		return $data;
	}

	function cancelpayloanv3($idtrloanparam, $sender)
	{
		$idtrloanparam = Helper::dbescape($idtrloanparam);
		
		$data = DB::select("CALL cancelpayloanv3(".$idtrloanparam.",".$sender.")");
		return $data;
	}

	function addnewtypeitemloan($idmstypeitemloanofflineparam, $typenameparam, $unitparam, $priceperunitparam, $idmssupplierparam, $sender)
	{
		$idmstypeitemloanofflineparam = Helper::dbescape($idmstypeitemloanofflineparam);
		$typenameparam = Helper::dbescape($typenameparam);
		$unitparam = Helper::dbescape($unitparam);
		$priceperunitparam = Helper::dbescape($priceperunitparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$sender = Helper::dbescape($sender);
		
		$data = DB::select("CALL addnewtypeitemloan(".$idmstypeitemloanofflineparam.", ".$typenameparam.", ".$unitparam.", ". $priceperunitparam.", ".$idmssupplierparam.", ".$sender.")");
		return $data;
	}

	function updatetypeitemloan($idmstypeitemloanofflineparam, $typenameparam, $unitparam, $priceperunitparam, $idmssupplierparam, $sender)
	{
		$idmstypeitemloanofflineparam = Helper::dbescape($idmstypeitemloanofflineparam);
		$typenameparam = Helper::dbescape($typenameparam);
		$unitparam = Helper::dbescape($unitparam);
		$priceperunitparam = Helper::dbescape($priceperunitparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$sender = Helper::dbescape($sender);
		
		$data = DB::select("CALL updatetypeitemloan(".$idmstypeitemloanofflineparam.", ".$typenameparam.", ".$unitparam.", ". $priceperunitparam.", ".$idmssupplierparam.", ".$sender.")");
		return $data;
	}

	function deletetypeitemloan($idmstypeitemloanofflineparam, $sender)
	{
		$idmstypeitemloanofflineparam = Helper::dbescape($idmstypeitemloanofflineparam);
		$sender = Helper::dbescape($sender);
		
		$data = DB::select("CALL deletetypeitemloan(".$idmstypeitemloanofflineparam.", ".$sender.")");
		return $data;
	}

	function gettypeitemloan($idmssupplierparam)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		
		$data = DB::select("CALL gettypeitemloan(".$idmssupplierparam.")");
		return $data;
	}

	function addnewloanv4($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $idmsusercreator, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = $loandateparam == null ? "NULL" : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($loandateparam)));
		$loaneridmsuserofficerparam = $loaneridmsuserofficerparam == null ? 'NULL' : Helper::dbescape($loaneridmsuserofficerparam);
		$idmsusercreator = $idmsusercreator == null ? 'NULL' : Helper::dbescape($idmsusercreator);
		$idmstypeitemloanofflineparam = $idmstypeitemloanofflineparam == null ? 'NULL' : Helper::dbescape($idmstypeitemloanofflineparam);
		$unitparam = $unitparam == null ? 'NULL' : Helper::dbescape($unitparam);
		$priceperunitparam = $priceperunitparam == null ? 'NULL' : Helper::dbescape($priceperunitparam);

		$data = DB::select("CALL addnewloanv4(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.",". 
			$idmsuserloanparam.",". $idmsbuyerloanparam.", ". $idmssupplierparam.",". 
			$loandateparam.",". $loaneridmsuserofficerparam.",".$idmsusercreator.",".$idmstypeitemloanofflineparam.",".$unitparam.",". $priceperunitparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updateloanv4($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $idmsusercreator, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = $loandateparam == null ? "NULL" : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($loandateparam)));
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);
		$idmsusercreator = $idmsusercreator == null ? 'NULL' : Helper::dbescape($idmsusercreator);
		$idmstypeitemloanofflineparam = $idmstypeitemloanofflineparam == null ? 'NULL' : Helper::dbescape($idmstypeitemloanofflineparam);
		$unitparam = $unitparam == null ? 'NULL' : Helper::dbescape($unitparam);
		$priceperunitparam = $priceperunitparam == null ? 'NULL' : Helper::dbescape($priceperunitparam);

		$data = DB::select("CALL updateloanv4(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.", ". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.",".$idmsusercreator.",".$idmstypeitemloanofflineparam.",".$unitparam.",". $priceperunitparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}


	function addnewloanv5($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $idmsusercreator, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam, $idfishermanofflineparam, $idbuyerofflineparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;

		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = $rpparam == null ? 'NULL' : Helper::dbescape($rpparam);
		
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = $loandateparam == null ? "NULL" : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($loandateparam)));
		$loaneridmsuserofficerparam = $loaneridmsuserofficerparam == null ? 'NULL' : Helper::dbescape($loaneridmsuserofficerparam);
		$idmsusercreator = $idmsusercreator == null ? 'NULL' : Helper::dbescape($idmsusercreator);
		$idmstypeitemloanofflineparam = $idmstypeitemloanofflineparam == null ? 'NULL' : Helper::dbescape($idmstypeitemloanofflineparam);
		$unitparam = $unitparam == null ? 'NULL' : Helper::dbescape($unitparam);
		$priceperunitparam = $priceperunitparam == null ? 'NULL' : Helper::dbescape($priceperunitparam);

		$idfishermanofflineparam = $idfishermanofflineparam == null ? 'NULL' : Helper::dbescape($idfishermanofflineparam);
		$idbuyerofflineparam = $idbuyerofflineparam == null ? 'NULL' : Helper::dbescape($idbuyerofflineparam);

		$data = DB::select("CALL addnewloanv5(".$idloanofflineparam.", ".$descloanparam.",". 
			$loaninrpparam.",". $idmsuserloanparam.",". $idmsbuyerloanparam.", ".
			$idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.",".
			$idmsusercreator.",".$idmstypeitemloanofflineparam.",".$unitparam.",".
			$priceperunitparam.",".$idfishermanofflineparam.",".$idbuyerofflineparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updateloanv5($idloanofflineparam, $descparam, $rpparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $loandateparam, $loaneridmsuserofficerparam, $idmsusercreator, $idmstypeitemloanofflineparam, $unitparam, $priceperunitparam, $idfishermanofflineparam, $idbuyerofflineparam)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idloanofflineparam = Helper::dbescape($idloanofflineparam);
		$descloanparam = Helper::dbescape($descparam);
		$loaninrpparam = Helper::dbescape($rpparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$loandateparam = $loandateparam == null ? "NULL" : Helper::dbescape(date ("Y-m-d H:i:s", strtotime($loandateparam)));
		$loaneridmsuserofficerparam = Helper::dbescape($loaneridmsuserofficerparam);
		$idmsusercreator = $idmsusercreator == null ? 'NULL' : Helper::dbescape($idmsusercreator);
		$idmstypeitemloanofflineparam = $idmstypeitemloanofflineparam == null ? 'NULL' : Helper::dbescape($idmstypeitemloanofflineparam);
		$unitparam = $unitparam == null ? 'NULL' : Helper::dbescape($unitparam);
		$priceperunitparam = $priceperunitparam == null ? 'NULL' : Helper::dbescape($priceperunitparam);
		$idfishermanofflineparam = $idfishermanofflineparam == null ? 'NULL' : Helper::dbescape($idfishermanofflineparam);
		$idbuyerofflineparam = $idbuyerofflineparam == null ? 'NULL' : Helper::dbescape($idbuyerofflineparam);

		$data = DB::select("CALL updateloanv5(".$idloanofflineparam.", ".$descloanparam.",". $loaninrpparam.", ". $idmsuserloanparam.", ". $idmsbuyerloanparam.", ". $idmssupplierparam.",". $loandateparam.",". $loaneridmsuserofficerparam.",".$idmsusercreator.",".$idmstypeitemloanofflineparam.",".$unitparam.",". $priceperunitparam.",".$idfishermanofflineparam.",".$idbuyerofflineparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function addpayloanv4($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $idfishermanofflineparam, $idbuyerofflineparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idpayloanofflineparam = Helper::dbescape($idpayloanofflineparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paiddateparam = Helper::dbescape($paiddateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$idfishermanofflineparam = $idfishermanofflineparam == null ? 'NULL' : Helper::dbescape($idfishermanofflineparam);
		$idbuyerofflineparam = $idbuyerofflineparam == null ? 'NULL' : Helper::dbescape($idbuyerofflineparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL addpayloanv4(".$idpayloanofflineparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paiddateparam.", ". $paidoffidmsuserofficerparam .",". $sender.",". $idfishermanofflineparam .",". $idbuyerofflineparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}

	function updatepayloanv4($idpayloanofflineparam, $idmsuserloanparam, $idmsbuyerloanparam, $idmssupplierparam, $descparam, $rpparam, $paiddateparam, $paidoffidmsuserofficerparam, $idfishermanofflineparam, $idbuyerofflineparam, $sender)
	{
		//$stringDesc = $nama.", ". $city.", ". $address.", ". $idparam.", ". $bodparam.", ". $type;
		$idpayloanofflineparam = Helper::dbescape($idpayloanofflineparam);
		$idmsuserloanparam = $idmsuserloanparam == null ? 'NULL' : Helper::dbescape($idmsuserloanparam);
		$idmsbuyerloanparam = $idmsbuyerloanparam == null ? 'NULL' : Helper::dbescape($idmsbuyerloanparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$descparam = Helper::dbescape($descparam);
		$rpparam = Helper::dbescape($rpparam);
		$paidoffdateparam = Helper::dbescape($paidoffdateparam);
		$paidoffidmsuserofficerparam = Helper::dbescape($paidoffidmsuserofficerparam);
		$idfishermanofflineparam = $idfishermanofflineparam == null ? 'NULL' : Helper::dbescape($idfishermanofflineparam);
		$idbuyerofflineparam = $idbuyerofflineparam == null ? 'NULL' : Helper::dbescape($idbuyerofflineparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL updatepayloanv4(".$idpayloanofflineparam.", ".$idmsuserloanparam.", ".$idmsbuyerloanparam.", ".$idmssupplierparam.", ".$descparam.",". $rpparam.",". $paidoffdateparam.", ". $paidoffidmsuserofficerparam.",".$sender.",". $idfishermanofflineparam .",". $idbuyerofflineparam.")");

		//$this->addbackendlog("Regis officer: " .$stringDesc, "0", session('uid'));
		return $data;
	}
// getloan
}
