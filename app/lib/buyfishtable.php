<?php
namespace App\lib;
use DB;
use App\lib\Helper;
use Illuminate\Support\Facades\Hash;

class buyfishtable {

	// catch
	function addcatch($idtrcatchofflineparam, $idmssupplierparam, $idmsfishermanparam, $idmsbuyersupplierparam, $idmsshipparam, $idmsfishparam, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idmsfishermanparam = $idmsfishermanparam == null ? "NULL" : Helper::dbescape($idmsfishermanparam);
		$idmsbuyersupplierparam = $idmsbuyersupplierparam == null ? "NULL" : Helper::dbescape($idmsbuyersupplierparam);
		$idmsshipparam = $idmsshipparam == null ? "NULL" : Helper::dbescape($idmsshipparam);
		$idmsfishparam = $idmsfishparam == null ? "NULL" : Helper::dbescape($idmsfishparam);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);

		$data = DB::select("CALL addcatch(".$idtrcatchofflineparam.", ".$idmssupplierparam.", ". $idmsfishermanparam.", ". $idmsbuyersupplierparam.", ". $idmsshipparam.", ". $idmsfishparam.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam.")");
		return $data;
	}

	function updatecatch($idtrcatchofflineparam, $idmssupplierparam, $idmsfishermanparam, $idmsbuyersupplierparam, $idmsshipparam, $idmsfishparam, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idmsfishermanparam = $idmsfishermanparam == null ? "NULL" : Helper::dbescape($idmsfishermanparam);
		$idmsbuyersupplierparam = $idmsbuyersupplierparam == null ? "NULL" : Helper::dbescape($idmsbuyersupplierparam);
		$idmsshipparam = $idmsshipparam == null ? "NULL" : Helper::dbescape($idmsshipparam);
		$idmsfishparam = $idmsfishparam == null ? "NULL" : Helper::dbescape($idmsfishparam);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);

		$data = DB::select("CALL updatecatch(".$idtrcatchofflineparam.", ".$idmssupplierparam.", ". $idmsfishermanparam.", ". $idmsbuyersupplierparam.", ". $idmsshipparam.", ". $idmsfishparam.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam.")");
		return $data;
	}

	function addcatchv2($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);

		$data = DB::select("CALL addcatchv2(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam.")");
		return $data;
	}

	function updatecatchv2($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$closeparam = $closeparam == null ? "0" : Helper::dbescape($closeparam);

		$data = DB::select("CALL updatecatchv2(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam .", ". $closeparam.")");
		return $data;
	}

	function deletecatch($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletecatch(".$idparam.")");
		return $data;
	}

	function getcatch($month, $year)
	{
		$dataGet = DB::select("CALL getcatch(".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');
		//$object->roperty = 'Here we go';

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idmsbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				//$data->data[$arrayIndex]->localname = $dataGet[$i]->localname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;
			$fishIndex++;
		}
		return $data->data;
	}

	function getcatchv2($month, $year)
	{
		$dataGet = DB::select("CALL getcatchv2(".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');
		//$object->roperty = 'Here we go';

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idmsbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				//$data->data[$arrayIndex]->localname = $dataGet[$i]->localname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
				$data->data[$arrayIndex]->idfishoffline = $dataGet[$i]->idfishoffline;
				$data->data[$arrayIndex]->idshipoffline = $dataGet[$i]->idshipoffline;
				$data->data[$arrayIndex]->close = $dataGet[$i]->closeparam;

				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;

			
			$fishIndex++;
		}
		return $data->data;
	}

	function getcatchbyidmssupplier($idmssupplierparam, $month, $year)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$dataGet = DB::select("CALL getcatchbyidmssupplier(".$idmssupplierparam.", ".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');
		//$object->roperty = 'Here we go';

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idmsbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				//$data->data[$arrayIndex]->localname = $dataGet[$i]->localname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;
			$fishIndex++;
		}
		return $data->data;
	}

	function getcatchbyidmssupplierv2($idmssupplierparam, $day, $month, $year)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		
		$dataGet = DB::select("CALL getcatchbyidmssupplierv2(".$idmssupplierparam.", ".$day.", ".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');
		//$object->roperty = 'Here we go';

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idmsbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				//$data->data[$arrayIndex]->localname = $dataGet[$i]->localname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
				$data->data[$arrayIndex]->idfishoffline = $dataGet[$i]->idfishoffline;
				$data->data[$arrayIndex]->idshipoffline = $dataGet[$i]->idshipoffline;

				$data->data[$arrayIndex]->fishinggearindo = $dataGet[$i]->fishinggearindo;
				$data->data[$arrayIndex]->fishinggearenglish = $dataGet[$i]->fishinggearenglish;

				$data->data[$arrayIndex]->close = $dataGet[$i]->closeparam;

				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;
				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;

				$data->data[$arrayIndex]->buyersuppliername = $dataGet[$i]->buyersuppliername;

				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;
			$fishIndex++;
		}
		return $data->data;
	}

	function getcatchbyidmssupplierv3($idmssupplierparam, $day, $month, $year)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		
		$dataGet = DB::select("CALL getcatchbyidmssupplierv3(".$idmssupplierparam.", ".$day.", ".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');
		//$object->roperty = 'Here we go';

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->buyersuppliername = $dataGet[$i]->buyersuppliername;

				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				//$data->data[$arrayIndex]->localname = $dataGet[$i]->localname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
				$data->data[$arrayIndex]->idfishoffline = $dataGet[$i]->idfishoffline;
				$data->data[$arrayIndex]->idshipoffline = $dataGet[$i]->idshipoffline;

				$data->data[$arrayIndex]->close = $dataGet[$i]->closeparam;
				$data->data[$arrayIndex]->lasttransact = $dataGet[$i]->lasttransact;
				$data->data[$arrayIndex]->namecreator = $dataGet[$i]->namecreator;
				$data->data[$arrayIndex]->namelasttrans = $dataGet[$i]->namelasttrans;

				$data->data[$arrayIndex]->notes = $dataGet[$i]->notes;
				/*
				$data->data[$arrayIndex]->indofishinggear = $dataGet[$i]->indofishinggear;
				$data->data[$arrayIndex]->engfishinggear = $dataGet[$i]->engfishinggear;
				$data->data[$arrayIndex]->abbrfishinggear = $dataGet[$i]->abbrfishinggear;*/

				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;
			$data->data[$arrayIndex]->fish[$fishIndex]->namecreator = $dataGet[$i]->namecreatorfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->namelasttrans = $dataGet[$i]->namelasttransfishcatch;
			
			
			$fishIndex++;
		}
		return $data->data;
	}
/*
	function addcatchsupplier($idtrcatchpostparam, $idmssupplierparam, $idmssuppliersellparam, $idmsshipparam, $idmsfishparam, $varianceparam, $dispatchnotephotoparam, $priceperkgparam, $totalpriceparam, $locationparam, $saildateparam, $postdateparam)
	{
		$idtrcatchpostparam = Helper::dbescape($idtrcatchpostparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$idmssuppliersellparam = Helper::dbescape($idmssuppliersellparam);
		$idmsshipparam = Helper::dbescape($idmsshipparam);
		$idmsfishparam = Helper::dbescape($idmsfishparam);
		$varianceparam = Helper::dbescape($varianceparam);
		$dispatchnotephotoparam = Helper::dbescape($dispatchnotephotoparam);
		$priceperkgparam = Helper::dbescape($priceperkgparam);
		$totalpriceparam = Helper::dbescape($totalpriceparam);
		$locationparam = Helper::dbescape($locationparam);
		$saildateparam = Helper::dbescape($saildateparam);
		$postdateparam = Helper::dbescape($postdateparam);

		$data = DB::select("CALL addcatchsupplier(".$idtrcatchpostparam.", ".$idmssupplierparam.", ".$idmssuppliersellparam.", ".$idmsshipparam.", ".$idmsfishparam.", ".$varianceparam.", ".$dispatchnotephotoparam.", ".$priceperkgparam.", ".$totalpriceparam.", ".$locationparam.", ".$saildateparam.", ".$postdateparam.")");
		return $data;
	}
	
	function updatecatchsupplier($idtrcatchparam, $idtrcatchpostparam, $idmssupplierparam, $idmssuppliersellparam, $idmsshipparam, $idmsfishparam, $varianceparam, $dispatchnotephotoparam, $priceperkgparam, $totalpriceparam, $locationparam, $saildateparam, $postdateparam)
	{
		$idtrcatchparam = Helper::dbescape($idtrcatchparam);
		$idtrcatchpostparam = Helper::dbescape($idtrcatchpostparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$idmssuppliersellparam = Helper::dbescape($idmssuppliersellparam);
		
		$idmsshipparam = Helper::dbescape($idmsshipparam);
		$idmsfishparam = Helper::dbescape($idmsfishparam);
		$varianceparam = Helper::dbescape($varianceparam);
		$dispatchnotephotoparam = Helper::dbescape($dispatchnotephotoparam);
		$priceperkgparam = Helper::dbescape($priceperkgparam);
		$totalpriceparam = Helper::dbescape($totalpriceparam);
		$locationparam = Helper::dbescape($locationparam);
		$saildateparam = Helper::dbescape($saildateparam);
		$postdateparam = Helper::dbescape($postdateparam);

		$data = DB::select("CALL updatecatchsupplier(".$idtrcatchparam.",".$idtrcatchpostparam.", ".$idmssupplierparam.", ".$idmssuppliersellparam.", ".$idmsshipparam.", ".$idmsfishparam.", ".$varianceparam.", ".$dispatchnotephotoparam.", ".$priceperkgparam.", ".$totalpriceparam.", ".$locationparam.", ".$saildateparam.", ".$postdateparam.")");
		return $data;
	}
*/
	// fish catch
	function addfishcatch($idtrcatchofflineparam, $idtrfishcatchofflineparam , $amountparam, $gradeparam, $descparam)
	{
		$idtrcatchofflineparam = Helper::dbescape($idtrcatchofflineparam);
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$amountparam = Helper::dbescape($amountparam);
		$gradeparam = Helper::dbescape($gradeparam);
		$descparam = Helper::dbescape($descparam);

		$data = DB::select("CALL addfishcatch(".$idtrcatchofflineparam.", ".$idtrfishcatchofflineparam.",".$amountparam.", ".$gradeparam.", ".$descparam.", ".Helper::getjuliandate().")");
		return $data;
	}

	function addfishcatchv2($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam,
		$gradeparam, $descparam, $idfishparam)
	{
		$idtrcatchofflineparam = Helper::dbescape($idtrcatchofflineparam);
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$amountparam = Helper::dbescape($amountparam);
		$gradeparam = Helper::dbescape($gradeparam);
		$descparam = Helper::dbescape($descparam);
		$idfishparam = Helper::dbescape($idfishparam);

		$data = DB::select("CALL addfishcatchv2(".$idtrcatchofflineparam.", ".$idtrfishcatchofflineparam.",".$amountparam.", ".$gradeparam.", ".$descparam.", ".$idfishparam.")");
		return $data;
	}

	function updatefishcatch($idtrfishcatchofflineparam, $amountparam, $gradeparam, $descparam)
	{
		$idtrfishcatchofflineparam = Helper::dbescape($idtrfishcatchofflineparam);
		$amountparam = Helper::dbescape($amountparam);
		$gradeparam = Helper::dbescape($gradeparam);
		$descparam = Helper::dbescape($descparam);

		$data = DB::select("CALL updatefishcatch(".$idtrfishcatchofflineparam.", ".$amountparam.", ".$gradeparam.", ".$descparam.")");
		return $data;
	}

	function deletefishcatch($idparam)
	{
		$idparam = Helper::dbescape($idparam);

		$data = DB::select("CALL deletefishcatch(".$idparam.")");
		return $data;
	}

/*
	// fish config
	function addfishconfig($idmssupplierparam, $nameparam, $idmsfishparam, $gradeparam, $unitparam, $handlingparam)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$nameparam = Helper::dbescape($nameparam);
		$idmsfishparam = Helper::dbescape($idmsfishparam);
		$gradeparam = Helper::dbescape($gradeparam);
		$unitparam = Helper::dbescape($unitparam);
		$handlingparam = Helper::dbescape($handlingparam);

		$data = DB::select("CALL addfishconfig('".$idmssupplierparam."', '".$nameparam."', '".$idmsfishparam."', '".$gradeparam."', '".$unitparam."', '".$handlingparam."')");
		return $data;
	}

	function updatefishconfig($idtrfishconfigparam, $idmssupplierparam, $nameparam, $idmsfishparam, $gradeparam, $unitparam, $handlingparam)
	{
		$idtrfishconfigparam = Helper::dbescape($idtrfishconfigparam);
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$nameparam = Helper::dbescape($nameparam);
		$idmsfishparam = Helper::dbescape($idmsfishparam);
		$gradeparam = Helper::dbescape($gradeparam);
		$unitparam = Helper::dbescape($unitparam);
		$handlingparam = Helper::dbescape($handlingparam);

		$data = DB::select("CALL updatefishconfig('".$idtrfishconfigparam."','".$idmssupplierparam."', '".$nameparam."', '".$idmsfishparam."', '".$gradeparam."', '".$unitparam."', '".$handlingparam."')");
		return $data;
	}

	function deletefishconfig($idparam)
	{
		$idparam = Helper::dbescape($idparam);

		$data = DB::select("CALL deletefishconfig('".$idparam."')");
		return $data;
	}

	// fish price config
	function addfishpriceconfig($idtrfishconfigparam, $idtrcatchparam)
	{
		$idtrfishconfigparam = Helper::dbescape($idtrfishconfigparam);
		$amountparam = Helper::dbescape($amountparam);

		$data = DB::select("CALL addfishpriceconfig('".$idtrfishconfigparam."', '".$idtrcatchparam."')");
		return $data;
	}

	function updatefishpriceconfig($idtrfishpriceconfigparam, $idtrfishconfigparam, $idtrcatchparam)
	{
		$idtrfishpriceconfigparam = Helper::dbescape($idtrfishpriceconfigparam);
		$idtrfishconfigparam = Helper::dbescape($idtrfishconfigparam);
		$amountparam = Helper::dbescape($amountparam);

		$data = DB::select("CALL updatefishpriceconfig('".$idtrfishpriceconfigparam."','".$idtrfishconfigparam."', '".$idtrcatchparam."')");
		return $data;
	}

	function deletefishpriceconfig($idparam)
	{
		$idparam = Helper::dbescape($idparam);

		$data = DB::select("CALL deletefishpriceconfig('".$idparam."')");
		return $data;
	}
*/
/*
	function addkdeindo($idtrcatch_param,
			$company_org_name_param, $company_owner_name_param, $company_owner_sex_param,
			$company_license_id_param, $company_license_expiration_date_param, $company_address_param,
			$company_phone_param, $consignee_param, $sex_param,
			$vessel_name_param, $vessel_size_param, $vessel_length_param,
			$vessel_flag_param, $vessel_transmitter_id_param, $vessel_register_id_param,
			$vessel_radio_register_id_param, $catch_or_farm_param, $by_catch_param,
			$catch_id_param, $species_caught_param, $scientific_name_param,
			$asfis_or_product_code_param, $batch_or_lot_smallint_param, $total_weight_of_batch_param,
			$product_form_at_landing_param, $quantity_param, $total_weight_of_species_param,
			$catch_date_param, $number_of_trip_param, $catch_time_param,
			$year_of_departure_param, $date_of_departure_param, $time_of_departure_param,
			$date_of_return_param, $time_of_return_param, $fishing_gear_start_setting_time_param,
			$fishing_gear_end_setting_time_param, $hook_setting_time_param, $number_of_hook_param,
			$distance_between_hook_param, $vessel_port_of_departure_param, $point_of_catch_param,
			$product_destination_param, $vessel_landing_port_param, $gear_type_param,
			$indonesia_wpp_catch_area_param, $indonesia_local_sea_name_param, $catch_area_fad_used_param,
			$lead_document_type_param, $lead_document_id_param, $captain_name_param,
			$captain_sex_param, $captain_personal_identification_param, $captain_nationality_param,
			$crew_name_param, $crew_sex_param, $crew_personal_id_param,
			$crew_job_param, $crew_nationality_param, $crew_date_of_birth_param,
			$total_indonesia_crew_param, $total_foreign_crew_param, $captain_node_param
		)
	{
		$idtrcatch_param = $idtrcatch_param == NULL ? '' : $idtrcatch_param;
		$company_org_name_param = $company_org_name_param == NULL ? '' : $company_org_name_param;
		$company_owner_name_param = $company_owner_name_param == NULL ? '' : $company_owner_name_param;
		$company_owner_sex_param = $company_owner_sex_param == NULL ? '' : $company_owner_sex_param;
		$company_license_id_param = $company_license_id_param == NULL ? '' : $company_license_id_param;
		$company_license_expiration_date_param = $company_license_expiration_date_param == NULL ? '' : $company_license_expiration_date_param;
		$company_address_param = $company_address_param == NULL ? '' : $company_address_param;
		$company_phone_param = $company_phone_param == NULL ? '' : $company_phone_param;
		$consignee_param = $consignee_param == NULL ? '' : $consignee_param;
		$sex_param = $sex_param == NULL ? '' : $sex_param;
		$vessel_name_param = $vessel_name_param == NULL ? '' : $vessel_name_param;
		$vessel_size_param = $vessel_size_param == NULL ? '' : $vessel_size_param;
		$vessel_length_param = $vessel_length_param == NULL ? '' : $vessel_length_param;
		$vessel_flag_param = $vessel_flag_param == NULL ? '' : $vessel_flag_param;
		$vessel_transmitter_id_param = $vessel_transmitter_id_param == NULL ? '' : $vessel_transmitter_id_param;
		$vessel_register_id_param = $vessel_register_id_param == NULL ? '' : $vessel_register_id_param;
		$vessel_radio_register_id_param = $vessel_radio_register_id_param == NULL ? '' : $vessel_radio_register_id_param;
		$catch_or_farm_param = $catch_or_farm_param == NULL ? '' : $catch_or_farm_param;
		$by_catch_param = $by_catch_param == NULL ? '' : $by_catch_param;
		$catch_id_param = $catch_id_param == NULL ? '' : $catch_id_param;
		$species_caught_param = $species_caught_param == NULL ? '' : $species_caught_param;
		$scientific_name_param = $scientific_name_param == NULL ? '' : $scientific_name_param;
		$asfis_or_product_code_param = $asfis_or_product_code_param == NULL ? '' : $asfis_or_product_code_param;
		$batch_or_lot_smallint_param = $batch_or_lot_smallint_param == NULL ? '' : $batch_or_lot_smallint_param;
		$total_weight_of_batch_param = $total_weight_of_batch_param == NULL ? '' : $total_weight_of_batch_param;
		$product_form_at_landing_param = $product_form_at_landing_param == NULL ? '' : $product_form_at_landing_param;
		$quantity_param = $quantity_param == NULL ? '' : $quantity_param;
		$total_weight_of_species_param = $total_weight_of_species_param == NULL ? '' : $total_weight_of_species_param;
		$catch_date_param = $catch_date_param == NULL ? '' : $catch_date_param;
		$number_of_trip_param = $number_of_trip_param == NULL ? '' : $number_of_trip_param;
		$catch_time_param = $catch_time_param == NULL ? '' : $catch_time_param;
		$year_of_departure_param = $year_of_departure_param == NULL ? '' : $year_of_departure_param;
		$date_of_departure_param = $date_of_departure_param == NULL ? '' : $date_of_departure_param;
		$time_of_departure_param = $time_of_departure_param == NULL ? '' : $time_of_departure_param;
		$date_of_return_param = $date_of_return_param == NULL ? '' : $date_of_return_param;
		$time_of_return_param = $time_of_return_param == NULL ? '' : $time_of_return_param;
		$fishing_gear_start_setting_time_param = $fishing_gear_start_setting_time_param == NULL ? '' : $fishing_gear_start_setting_time_param;
		$fishing_gear_end_setting_time_param = $fishing_gear_end_setting_time_param == NULL ? '' : $fishing_gear_end_setting_time_param;
		$hook_setting_time_param = $hook_setting_time_param == NULL ? '' : $hook_setting_time_param;
		$number_of_hook_param = $number_of_hook_param == NULL ? '' : $number_of_hook_param;
		$distance_between_hook_param = $distance_between_hook_param == NULL ? '' : $distance_between_hook_param;
		$vessel_port_of_departure_param = $vessel_port_of_departure_param == NULL ? '' : $vessel_port_of_departure_param;
		$point_of_catch_param = $point_of_catch_param == NULL ? '' : $point_of_catch_param;
		$product_destination_param = $product_destination_param == NULL ? '' : $product_destination_param;
		$vessel_landing_port_param = $vessel_landing_port_param == NULL ? '' : $vessel_landing_port_param;
		$gear_type_param = $gear_type_param == NULL ? '' : $gear_type_param;
		$indonesia_wpp_catch_area_param = $indonesia_wpp_catch_area_param == NULL ? '' : $indonesia_wpp_catch_area_param;
		$indonesia_local_sea_name_param = $indonesia_local_sea_name_param == NULL ? '' : $indonesia_local_sea_name_param;
		$catch_area_fad_used_param = $catch_area_fad_used_param == NULL ? '' : $catch_area_fad_used_param;
		$lead_document_type_param = $lead_document_type_param == NULL ? '' : $lead_document_type_param;
		$lead_document_id_param = $lead_document_id_param == NULL ? '' : $lead_document_id_param;
		$captain_name_param = $captain_name_param == NULL ? '' : $captain_name_param;
		$captain_sex_param = $captain_sex_param == NULL ? '' : $captain_sex_param;
		$captain_personal_identification_param = $captain_personal_identification_param == NULL ? '' : $captain_personal_identification_param;
		$captain_nationality_param = $captain_nationality_param == NULL ? '' : $captain_nationality_param;
		$crew_name_param = $crew_name_param == NULL ? '' : $crew_name_param;
		$crew_sex_param = $crew_sex_param == NULL ? '' : $crew_sex_param;
		$crew_personal_id_param = $crew_personal_id_param == NULL ? '' : $crew_personal_id_param;
		$crew_job_param = $crew_job_param == NULL ? '' : $crew_job_param;
		$crew_nationality_param = $crew_nationality_param == NULL ? '' : $crew_nationality_param;
		$crew_date_of_birth_param = $crew_date_of_birth_param == NULL ? '' : $crew_date_of_birth_param;
		$total_indonesia_crew_param = $total_indonesia_crew_param == NULL ? '' : $total_indonesia_crew_param;
		$total_foreign_crew_param = $total_foreign_crew_param == NULL ? '' : $total_foreign_crew_param;
		$captain_node_param = $captain_node_param == NULL ? '' : $captain_node_param;

		$idtrcatch_param = Helper::dbescape($idtrcatch_param);
		$company_org_name_param = Helper::dbescape($company_org_name_param);
		$company_owner_name_param = Helper::dbescape($company_owner_name_param);
		$company_owner_sex_param = Helper::dbescape($company_owner_sex_param);
		$company_license_id_param = Helper::dbescape($company_license_id_param);
		$company_license_expiration_date_param = Helper::dbescape($company_license_expiration_date_param);
		$company_address_param = Helper::dbescape($company_address_param);
		$company_phone_param = Helper::dbescape($company_phone_param);
		$consignee_param = Helper::dbescape($consignee_param);
		$sex_param = Helper::dbescape($sex_param);
		$vessel_name_param = Helper::dbescape($vessel_name_param);
		$vessel_size_param = Helper::dbescape($vessel_size_param);
		$vessel_length_param = Helper::dbescape($vessel_length_param);
		$vessel_flag_param = Helper::dbescape($vessel_flag_param);
		$vessel_transmitter_id_param = Helper::dbescape($vessel_transmitter_id_param);
		$vessel_register_id_param = Helper::dbescape($vessel_register_id_param);
		$vessel_radio_register_id_param = Helper::dbescape($vessel_radio_register_id_param);
		$catch_or_farm_param = Helper::dbescape($catch_or_farm_param);
		$by_catch_param = Helper::dbescape($by_catch_param);
		$catch_id_param = Helper::dbescape($catch_id_param);
		$species_caught_param = Helper::dbescape($species_caught_param);
		$scientific_name_param = Helper::dbescape($scientific_name_param);
		$asfis_or_product_code_param = Helper::dbescape($asfis_or_product_code_param);
		$batch_or_lot_smallint_param = Helper::dbescape($batch_or_lot_smallint_param);
		$total_weight_of_batch_param = Helper::dbescape($total_weight_of_batch_param);
		$product_form_at_landing_param = Helper::dbescape($product_form_at_landing_param);
		$quantity_param = Helper::dbescape($quantity_param);
		$total_weight_of_species_param = Helper::dbescape($total_weight_of_species_param);
		$catch_date_param = Helper::dbescape($catch_date_param);
		$number_of_trip_param = Helper::dbescape($number_of_trip_param);
		$catch_time_param = Helper::dbescape($catch_time_param);
		$year_of_departure_param = Helper::dbescape($year_of_departure_param);
		$date_of_departure_param = Helper::dbescape($date_of_departure_param);
		$time_of_departure_param = Helper::dbescape($time_of_departure_param);
		$date_of_return_param = Helper::dbescape($date_of_return_param);
		$time_of_return_param = Helper::dbescape($time_of_return_param);
		$fishing_gear_start_setting_time_param = Helper::dbescape($fishing_gear_start_setting_time_param);
		$fishing_gear_end_setting_time_param = Helper::dbescape($fishing_gear_end_setting_time_param);
		$hook_setting_time_param = Helper::dbescape($hook_setting_time_param);
		$number_of_hook_param = Helper::dbescape($number_of_hook_param);
		$distance_between_hook_param = Helper::dbescape($distance_between_hook_param);
		$vessel_port_of_departure_param = Helper::dbescape($vessel_port_of_departure_param);
		$point_of_catch_param = Helper::dbescape($point_of_catch_param);
		$product_destination_param = Helper::dbescape($product_destination_param);
		$vessel_landing_port_param = Helper::dbescape($vessel_landing_port_param);
		$gear_type_param = Helper::dbescape($gear_type_param);
		$indonesia_wpp_catch_area_param = Helper::dbescape($indonesia_wpp_catch_area_param);
		$indonesia_local_sea_name_param = Helper::dbescape($indonesia_local_sea_name_param);
		$catch_area_fad_used_param = Helper::dbescape($catch_area_fad_used_param);
		$lead_document_type_param = Helper::dbescape($lead_document_type_param);
		$lead_document_id_param = Helper::dbescape($lead_document_id_param);
		$captain_name_param = Helper::dbescape($captain_name_param);
		$captain_sex_param = Helper::dbescape($captain_sex_param);
		$captain_personal_identification_param = Helper::dbescape($captain_personal_identification_param);
		$captain_nationality_param = Helper::dbescape($captain_nationality_param);
		$crew_name_param = Helper::dbescape($crew_name_param);
		$crew_sex_param = Helper::dbescape($crew_sex_param);
		$crew_personal_id_param = Helper::dbescape($crew_personal_id_param);
		$crew_job_param = Helper::dbescape($crew_job_param);
		$crew_nationality_param = Helper::dbescape($crew_nationality_param);
		$crew_date_of_birth_param = Helper::dbescape($crew_date_of_birth_param);
		$total_indonesia_crew_param = Helper::dbescape($total_indonesia_crew_param);
		$total_foreign_crew_param = Helper::dbescape($total_foreign_crew_param);
		$captain_node_param = Helper::dbescape($captain_node_param);


		$data = DB::select("CALL addkdeindo(".$idtrcatch_param.",
			".$company_org_name_param.", ".$company_owner_name_param.", ".$company_owner_sex_param.",
			".$company_license_id_param.", ".$company_license_expiration_date_param.", ".$company_address_param.",
			".$company_phone_param.", ".$consignee_param.", ".$sex_param.",
			".$vessel_name_param.", ".$vessel_size_param.", ".$vessel_length_param.",
			".$vessel_flag_param.", ".$vessel_transmitter_id_param.", ".$vessel_register_id_param.",
			".$vessel_radio_register_id_param.", ".$catch_or_farm_param.", ".$by_catch_param.",
			".$catch_id_param.", ".$species_caught_param.", ".$scientific_name_param.",
			".$asfis_or_product_code_param.", ".$batch_or_lot_smallint_param.", ".$total_weight_of_batch_param.",
			".$product_form_at_landing_param.", ".$quantity_param.", ".$total_weight_of_species_param.",
			".$catch_date_param.", ".$number_of_trip_param.", ".$catch_time_param.",
			".$year_of_departure_param.", ".$date_of_departure_param.", ".$time_of_departure_param.",
			".$date_of_return_param.", ".$time_of_return_param.", ".$fishing_gear_start_setting_time_param.",
			".$fishing_gear_end_setting_time_param.", ".$hook_setting_time_param.", ".$number_of_hook_param.",
			".$distance_between_hook_param.", ".$vessel_port_of_departure_param.", ".$point_of_catch_param.",
			".$product_destination_param.", ".$vessel_landing_port_param.", ".$gear_type_param.",
			".$indonesia_wpp_catch_area_param.", ".$indonesia_local_sea_name_param.", ".$catch_area_fad_used_param.",
			".$lead_document_type_param.", ".$lead_document_id_param.", ".$captain_name_param.",
			".$captain_sex_param.", ".$captain_personal_identification_param.", ".$captain_nationality_param.",
			".$crew_name_param.", ".$crew_sex_param.", ".$crew_personal_id_param.",
			".$crew_job_param.", ".$crew_nationality_param.", ".$crew_date_of_birth_param.",
			".$total_indonesia_crew_param.", ".$total_foreign_crew_param.", ".$captain_node_param.")");
		return $data;
	}

	function addkdeusaid(
		$idtrcatch_param,
		$event_owner_param, $owner_name_param, $owner_sex_param,
		$owner_id_param, $owner_id_expiry_date_param, $owner_address_param,
		$owner_phone_param, $trading_partner_param, $trading_partner_sex_param,
		$vessel_name_param, $vessel_size_param, $vessel_flag_param,
		$vessel_id_param, $event_type_param, $event_number_param,
		$item_type_param, $item_code_param, $item_number_param,
		$bycatch_param, $batch_or_lot_number_param, $quantity_param,
		$weight_item_param, $weight_batch_lot_param, $product_form_at_landing_param,
		$event_date_param, $event_time_param, $first_freeze_date_param,
		$date_of_departure_param, $time_of_departure_param, $date_of_return_param,
		$time_of_return_param, $origin_param, $event_location_param,
		$product_destination_param, $vessel_home_port_param, $event_method_param,
		$fad_use_param, $fad_location_param, $activity_type_param,
		$activity_id_param, $captain_name_param, $captain_sex_param,
		$captain_id_param, $captain_nationality_param, $contract_id_param,
		$crew_worker_name_param, $crew_worker_sex_param, $crew_worker_id_param,
		$crew_worker_nationality_param, $crew_worker_dob_param, $crew_worker_job_param
	)
	{
		$idtrcatch_param = $idtrcatch_param == NULL ? '' : $idtrcatch_param;
		$event_owner_param = $event_owner_param == NULL ? '' : $event_owner_param;
		$owner_name_param = $owner_name_param == NULL ? '' : $owner_name_param;
		$owner_sex_param = $owner_sex_param == NULL ? '' : $owner_sex_param;
		$owner_id_param = $owner_id_param == NULL ? '' : $owner_id_param;
		$owner_id_expiry_date_param = $owner_id_expiry_date_param == NULL ? '' : $owner_id_expiry_date_param;
		$owner_address_param = $owner_address_param == NULL ? '' : $owner_address_param;
		$owner_phone_param = $owner_phone_param == NULL ? '' : $owner_phone_param;
		$trading_partner_param = $trading_partner_param == NULL ? '' : $trading_partner_param;
		$trading_partner_sex_param = $trading_partner_sex_param == NULL ? '' : $trading_partner_sex_param;
		$vessel_name_param = $vessel_name_param == NULL ? '' : $vessel_name_param;
		$vessel_size_param = $vessel_size_param == NULL ? '' : $vessel_size_param;
		$vessel_flag_param = $vessel_flag_param == NULL ? '' : $vessel_flag_param;
		$vessel_id_param = $vessel_id_param == NULL ? '' : $vessel_id_param;
		$event_type_param = $event_type_param == NULL ? '' : $event_type_param;
		$event_number_param = $event_number_param == NULL ? '' : $event_number_param;
		$item_type_param = $item_type_param == NULL ? '' : $item_type_param;
		$item_code_param = $item_code_param == NULL ? '' : $item_code_param;
		$item_number_param = $item_number_param == NULL ? '' : $item_number_param;
		$bycatch_param = $bycatch_param == NULL ? '' : $bycatch_param;
		$batch_or_lot_number_param = $batch_or_lot_number_param == NULL ? '' : $batch_or_lot_number_param;
		$quantity_param = $quantity_param == NULL ? '' : $quantity_param;
		$weight_item_param = $weight_item_param == NULL ? '' : $weight_item_param;
		$weight_batch_lot_param = $weight_batch_lot_param == NULL ? '' : $weight_batch_lot_param;
		$product_form_at_landing_param = $product_form_at_landing_param == NULL ? '' : $product_form_at_landing_param;
		$event_date_param = $event_date_param == NULL ? '' : $event_date_param;
		$event_time_param = $event_time_param == NULL ? '' : $event_time_param;
		$first_freeze_date_param = $first_freeze_date_param == NULL ? '' : $first_freeze_date_param;
		$date_of_departure_param = $date_of_departure_param == NULL ? '' : $date_of_departure_param;
		$time_of_departure_param = $time_of_departure_param == NULL ? '' : $time_of_departure_param;
		$date_of_return_param = $date_of_return_param == NULL ? '' : $date_of_return_param;
		$time_of_return_param = $time_of_return_param == NULL ? '' : $time_of_return_param;
		$origin_param = $origin_param == NULL ? '' : $origin_param;
		$event_location_param = $event_location_param == NULL ? '' : $event_location_param;
		$product_destination_param = $product_destination_param == NULL ? '' : $product_destination_param;
		$vessel_home_port_param = $vessel_home_port_param == NULL ? '' : $vessel_home_port_param;
		$event_method_param = $event_method_param == NULL ? '' : $event_method_param;
		$fad_use_param = $fad_use_param == NULL ? '' : $fad_use_param;
		$fad_location_param = $fad_location_param == NULL ? '' : $fad_location_param;
		$activity_type_param = $activity_type_param == NULL ? '' : $activity_type_param;
		$activity_id_param = $activity_id_param == NULL ? '' : $activity_id_param;
		$captain_name_param = $captain_name_param == NULL ? '' : $captain_name_param;
		$captain_sex_param = $captain_sex_param == NULL ? '' : $captain_sex_param;
		$captain_id_param = $captain_id_param == NULL ? '' : $captain_id_param;
		$captain_nationality_param = $captain_nationality_param == NULL ? '' : $captain_nationality_param;
		$contract_id_param = $contract_id_param == NULL ? '' : $contract_id_param;
		$crew_worker_name_param = $crew_worker_name_param == NULL ? '' : $crew_worker_name_param;
		$crew_worker_sex_param = $crew_worker_sex_param == NULL ? '' : $crew_worker_sex_param;
		$crew_worker_id_param = $crew_worker_id_param == NULL ? '' : $crew_worker_id_param;
		$crew_worker_nationality_param = $crew_worker_nationality_param == NULL ? '' : $crew_worker_nationality_param;
		$crew_worker_dob_param = $crew_worker_dob_param == NULL ? '' : $crew_worker_dob_param;
		$crew_worker_job_param = $crew_worker_job_param == NULL ? '' : $crew_worker_job_param;

		$idtrcatch_param = Helper::dbescape($idtrcatch_param);
		$event_owner_param = Helper::dbescape($event_owner_param);
		$owner_name_param = Helper::dbescape($owner_name_param);
		$owner_sex_param = Helper::dbescape($owner_sex_param);
		$owner_id_param = Helper::dbescape($owner_id_param);
		$owner_id_expiry_date_param = Helper::dbescape($owner_id_expiry_date_param);
		$owner_address_param = Helper::dbescape($owner_address_param);
		$owner_phone_param = Helper::dbescape($owner_phone_param);
		$trading_partner_param = Helper::dbescape($trading_partner_param);
		$trading_partner_sex_param = Helper::dbescape($trading_partner_sex_param);
		$vessel_name_param = Helper::dbescape($vessel_name_param);
		$vessel_size_param = Helper::dbescape($vessel_size_param);
		$vessel_flag_param = Helper::dbescape($vessel_flag_param);
		$vessel_id_param = Helper::dbescape($vessel_id_param);
		$event_type_param = Helper::dbescape($event_type_param);
		$event_number_param = Helper::dbescape($event_number_param);
		$item_type_param = Helper::dbescape($item_type_param);
		$item_code_param = Helper::dbescape($item_code_param);
		$item_number_param = Helper::dbescape($item_number_param);
		$bycatch_param = Helper::dbescape($bycatch_param);
		$batch_or_lot_number_param = Helper::dbescape($batch_or_lot_number_param);
		$quantity_param = Helper::dbescape($quantity_param);
		$weight_item_param = Helper::dbescape($weight_item_param);
		$weight_batch_lot_param = Helper::dbescape($weight_batch_lot_param);
		$product_form_at_landing_param = Helper::dbescape($product_form_at_landing_param);
		$event_date_param = Helper::dbescape($event_date_param);
		$event_time_param = Helper::dbescape($event_time_param);
		$first_freeze_date_param = Helper::dbescape($first_freeze_date_param);
		$date_of_departure_param = Helper::dbescape($date_of_departure_param);
		$time_of_departure_param = Helper::dbescape($time_of_departure_param);
		$date_of_return_param = Helper::dbescape($date_of_return_param);
		$time_of_return_param = Helper::dbescape($time_of_return_param);
		$origin_param = Helper::dbescape($origin_param);
		$event_location_param = Helper::dbescape($event_location_param);
		$product_destination_param = Helper::dbescape($product_destination_param);
		$vessel_home_port_param = Helper::dbescape($vessel_home_port_param);
		$event_method_param = Helper::dbescape($event_method_param);
		$fad_use_param = Helper::dbescape($fad_use_param);
		$fad_location_param = Helper::dbescape($fad_location_param);
		$activity_type_param = Helper::dbescape($activity_type_param);
		$activity_id_param = Helper::dbescape($activity_id_param);
		$captain_name_param = Helper::dbescape($captain_name_param);
		$captain_sex_param = Helper::dbescape($captain_sex_param);
		$captain_id_param = Helper::dbescape($captain_id_param);
		$captain_nationality_param = Helper::dbescape($captain_nationality_param);
		$contract_id_param = Helper::dbescape($contract_id_param);
		$crew_worker_name_param = Helper::dbescape($crew_worker_name_param);
		$crew_worker_sex_param = Helper::dbescape($crew_worker_sex_param);
		$crew_worker_id_param = Helper::dbescape($crew_worker_id_param);
		$crew_worker_nationality_param = Helper::dbescape($crew_worker_nationality_param);
		$crew_worker_dob_param = Helper::dbescape($crew_worker_dob_param);
		$crew_worker_job_param = Helper::dbescape($crew_worker_job_param);

		$data = DB::select("CALL addkdeusaid(".$idtrcatch_param.",
					".$event_owner_param.", ".$owner_name_param.", ".$owner_sex_param.",
					".$owner_id_param.", ".$owner_id_expiry_date_param.", ".$owner_address_param.",
					".$owner_phone_param.", ".$trading_partner_param.", ".$trading_partner_sex_param.",
					".$vessel_name_param.", ".$vessel_size_param.", ".$vessel_flag_param.",
					".$vessel_id_param.", ".$event_type_param.", ".$event_number_param.",
					".$item_type_param.", ".$item_code_param.", ".$item_number_param.",
					".$bycatch_param.", ".$batch_or_lot_number_param.", ".$quantity_param.",
					".$weight_item_param.", ".$weight_batch_lot_param.", ".$product_form_at_landing_param.",
					".$event_date_param.", ".$event_time_param.", ".$first_freeze_date_param.",
					".$date_of_departure_param.", ".$time_of_departure_param.", ".$date_of_return_param.",
					".$time_of_return_param.", ".$origin_param.", ".$event_location_param.",
					".$product_destination_param.", ".$vessel_home_port_param.", ".$event_method_param.",
					".$fad_use_param.", ".$fad_location_param.", ".$activity_type_param.",
					".$activity_id_param.", ".$captain_name_param.", ".$captain_sex_param.",
					".$captain_id_param.", ".$captain_nationality_param.", ".$contract_id_param.",
					".$crew_worker_name_param.", ".$crew_worker_sex_param.", ".$crew_worker_id_param.",
					".$crew_worker_nationality_param.", ".$crew_worker_dob_param.", ".$crew_worker_job_param.")");
		return $data;
	}
*/

	function getreportcatch($idparam, $day, $month, $year)
	{
		$idparam = Helper::dbescape($idparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		$data = DB::select("CALL getreportcatchv2(".$idparam.", ".$day.", ".$month.", ".$year.")");
		return $data;
	}


	function addcatchv3($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$sender = $sender == null ? "NULL" : Helper::dbescape($sender);

		$data = DB::select("CALL addcatchv3(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam.",".$sender.")");
		return $data;
	}

	function updatecatchv3($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$closeparam = $closeparam == null ? "0" : Helper::dbescape($closeparam);
		$sender = $sender == null ? "0" : Helper::dbescape($sender);

		$data = DB::select("CALL updatecatchv3(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam .", ". $closeparam.",".$sender.")");
		return $data;
	}

	function deletecatchv3($idparam, $sender)
	{
		$idparam = Helper::dbescape($idparam);
		$sender = Helper::dbescape($sender);
		
		$data = DB::select("CALL deletecatchv3(".$idparam.",".$sender.")");
		return $data;
	}

	function addfishcatchv3($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam,
		$gradeparam, $descparam, $idfishparam, $sender)
	{
		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idtrfishcatchofflineparam = $idtrfishcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrfishcatchofflineparam);
		$amountparam = $amountparam == null || $amountparam == '' ? "NULL" : Helper::dbescape($amountparam);
		$gradeparam = $gradeparam == null ? "NULL" : Helper::dbescape($gradeparam);
		$descparam = $descparam == null ? "NULL" : Helper::dbescape($descparam);
		$idfishparam = $idfishparam == null ? "NULL" : Helper::dbescape($idfishparam);
		$sender = $sender == null ? "NULL" : Helper::dbescape($sender);

		$data = DB::select("CALL addfishcatchv3(".$idtrcatchofflineparam.", ".$idtrfishcatchofflineparam.",".$amountparam.", ".$gradeparam.", ".$descparam.", ".$idfishparam.", ".$sender.")");
		return $data;
	}

	function updatefishcatchv3($idtrfishcatchofflineparam, $amountparam, $gradeparam, $descparam, $sender)
	{
		$idtrfishcatchofflineparam = $idtrfishcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrfishcatchofflineparam);
		$amountparam = $amountparam == null || $amountparam == '' ? "NULL" : Helper::dbescape($amountparam);
		$gradeparam = $gradeparam == null ? "NULL" : Helper::dbescape($gradeparam);
		$descparam = $descparam == null ? "NULL" : Helper::dbescape($descparam);
		$sender = $sender == null ? "NULL" : Helper::dbescape($sender);

		$data = DB::select("CALL updatefishcatchv3(".$idtrfishcatchofflineparam.", ".$amountparam.", ".$gradeparam.", ".$descparam.", ".$sender.")");
		return $data;
	}

	function deletefishcatchv3($idparam, $sender)
	{
		$idparam = Helper::dbescape($idparam);
		$sender = Helper::dbescape($sender);

		$data = DB::select("CALL deletefishcatchv3(".$idparam.", ".$sender.")");
		return $data;
	}

	// v4
	function addcatchv4($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender, $notesparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$sender = $sender == null ? "NULL" : Helper::dbescape($sender);
		$notesparam = $notesparam == null ? "NULL" : Helper::dbescape($notesparam);

		$data = DB::select("CALL addcatchv4(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam.",".$sender.",".$notesparam.")");
		return $data;
	}

	function updatecatchv4($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender, $notesparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$closeparam = $closeparam == null ? "0" : Helper::dbescape($closeparam);
		$sender = $sender == null ? "0" : Helper::dbescape($sender);
		$notesparam = $notesparam == null ? "NULL" : Helper::dbescape($notesparam);

		$data = DB::select("CALL updatecatchv4(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam .", ". $closeparam.",".$sender.",".$notesparam.")");
		return $data;
  }
  
  function addcatchv5($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender, $fishermannameparam, $fishermanidparam, $fishermanregnumberparam, $closeparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$sender = $sender == null ? "NULL" : Helper::dbescape($sender);
		$fishermannameparam = $fishermannameparam == null ? "NULL" : Helper::dbescape($fishermannameparam);
		$fishermanidparam = $fishermanidparam == null ? "NULL" : Helper::dbescape($fishermanidparam);
		$fishermanregnumberparam = $fishermanregnumberparam == null ? "NULL" : Helper::dbescape($fishermanregnumberparam);
		$closeparam = $closeparam == null ? "0" : Helper::dbescape($closeparam);

		$data = DB::select("CALL addcatchv5(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam.",".$sender.",".$fishermannameparam.",".$fishermanidparam.",".$fishermanregnumberparam.",".$closeparam.")");
		return $data;
	}

	function updatecatchv5($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $closeparam, $sender, $fishermannameparam, $fishermanidparam, $fishermanregnumberparam)
	{
		$purchasedateparam = date ("Y-m-d", strtotime($purchasedateparam));
		$purchasetimeparam = $purchasetimeparam == null ? NULL : date ("H:i:s", strtotime($purchasetimeparam));
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesseldepartureparam));
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($datetimevesselreturnparam));
		$postdateparam = $postdateparam == null ? NULL : date ("Y-m-d H:i:s", strtotime($postdateparam));

		$idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$idfishermanoffline = $idfishermanoffline == null ? "NULL" : Helper::dbescape($idfishermanoffline);
		$idbuyeroffline = $idbuyeroffline == null ? "NULL" : Helper::dbescape($idbuyeroffline);
		$idshipoffline = $idshipoffline == null ? "NULL" : Helper::dbescape($idshipoffline);
		$idfishoffline = $idfishoffline == null ? "NULL" : Helper::dbescape($idfishoffline);
		$purchasedateparam = $purchasedateparam == null ? "NULL" : Helper::dbescape($purchasedateparam);
		$purchasetimeparam = $purchasetimeparam == null ? "NULL" : Helper::dbescape($purchasetimeparam);
		$catchorfarmedparam = $catchorfarmedparam == null ? "NULL" : Helper::dbescape($catchorfarmedparam);
		$bycatchparam = $bycatchparam == null ? "NULL" : Helper::dbescape($bycatchparam);
		$fadusedparam = $fadusedparam == null ? "NULL" : Helper::dbescape($fadusedparam);
		$purchaseuniquenoparam = $purchaseuniquenoparam == null ? "NULL" : Helper::dbescape($purchaseuniquenoparam);
		$productformatlandingparam = $productformatlandingparam == null ? "NULL" : Helper::dbescape($productformatlandingparam);
		$unitmeasurementparam = $unitmeasurementparam == null ? "NULL" : Helper::dbescape($unitmeasurementparam);
		$quantityparam = $quantityparam == null ? "NULL" : Helper::dbescape($quantityparam);
		$weightparam = $weightparam == null ? "NULL" : Helper::dbescape($weightparam);
		$fishinggroundareaparam = $fishinggroundareaparam == null ? "NULL" : Helper::dbescape($fishinggroundareaparam);
		$purchaselocationparam = $purchaselocationparam == null ? "NULL" : Helper::dbescape($purchaselocationparam);
		$uniquetripidparam = $uniquetripidparam == null ? "NULL" : Helper::dbescape($uniquetripidparam);
		$datetimevesseldepartureparam = $datetimevesseldepartureparam == null ? "NULL" : Helper::dbescape($datetimevesseldepartureparam);
		$datetimevesselreturnparam = $datetimevesselreturnparam == null ? "NULL" : Helper::dbescape($datetimevesselreturnparam);
		$portnameparam = $portnameparam == null ? "NULL" : Helper::dbescape($portnameparam);
		$priceperkgparam = $priceperkgparam == null ? "NULL" : Helper::dbescape($priceperkgparam);
		$totalpriceparam = $totalpriceparam == null ? "NULL" : Helper::dbescape($totalpriceparam);
		$loanexpenseparam = $loanexpenseparam == null ? "NULL" : Helper::dbescape($loanexpenseparam);
		$otherexpenseparam = $otherexpenseparam == null ? "NULL" :  Helper::dbescape($otherexpenseparam);
		$postdateparam = $postdateparam == null ? "NULL" : Helper::dbescape($postdateparam);
		$closeparam = $closeparam == null ? "0" : Helper::dbescape($closeparam);
		$sender = $sender == null ? "0" : Helper::dbescape($sender);
    $fishermannameparam = $fishermannameparam == null ? "NULL" : Helper::dbescape($fishermannameparam);
		$fishermanidparam = $fishermanidparam == null ? "NULL" : Helper::dbescape($fishermanidparam);
		$fishermanregnumberparam = $fishermanregnumberparam == null ? "NULL" : Helper::dbescape($fishermanregnumberparam);

		$data = DB::select("CALL updatecatchv5(".$idtrcatchofflineparam.", ". $idmssupplierparam.", ". $idfishermanoffline.", ". $idbuyeroffline.", ". $idshipoffline.", ". $idfishoffline.", ". $purchasedateparam.", ". $purchasetimeparam.", ". $catchorfarmedparam.", ". $bycatchparam.", ". $fadusedparam.", ". $purchaseuniquenoparam.", ". $productformatlandingparam.", ". $unitmeasurementparam.", ". $quantityparam.", ". $weightparam.", ". $fishinggroundareaparam.", ". $purchaselocationparam.", ". $uniquetripidparam.", ". $datetimevesseldepartureparam.", ". $datetimevesselreturnparam.", ". $portnameparam.", ". $priceperkgparam.", ". $totalpriceparam.", ". $loanexpenseparam.", ". $otherexpenseparam.", ". $postdateparam .", ". $closeparam.",".$sender.",".$fishermannameparam.",".$fishermanidparam.",".$fishermanregnumberparam.")");
		return $data;
	}

	function getcatchbyidmssupplierv5($idmssupplierparam, $day, $month, $year)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		
		$dataGet = DB::select("CALL getcatchbyidmssupplierv4(".$idmssupplierparam.", ".$day.", ".$month.", ".$year.")");

		$app = app();
		$data = $app->make('stdClass');
		//$object->roperty = 'Here we go';

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->buyersuppliername = $dataGet[$i]->buyersuppliername;

				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				$data->data[$arrayIndex]->fishermanname2 = $dataGet[$i]->fishermanname2;
				$data->data[$arrayIndex]->fishermanid = $dataGet[$i]->fishermanid;
				$data->data[$arrayIndex]->fishermanregnumber = $dataGet[$i]->fishermanregnumber;
				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				//$data->data[$arrayIndex]->localname = $dataGet[$i]->localname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
				$data->data[$arrayIndex]->idfishoffline = $dataGet[$i]->idfishoffline;
				$data->data[$arrayIndex]->idshipoffline = $dataGet[$i]->idshipoffline;

				$data->data[$arrayIndex]->close = $dataGet[$i]->closeparam;
				$data->data[$arrayIndex]->lasttransact = $dataGet[$i]->lasttransact;
				$data->data[$arrayIndex]->namecreator = $dataGet[$i]->namecreator;
				$data->data[$arrayIndex]->namelasttrans = $dataGet[$i]->namelasttrans;

				$data->data[$arrayIndex]->notes = $dataGet[$i]->notes;
				/*
				$data->data[$arrayIndex]->indofishinggear = $dataGet[$i]->indofishinggear;
				$data->data[$arrayIndex]->engfishinggear = $dataGet[$i]->engfishinggear;
				$data->data[$arrayIndex]->abbrfishinggear = $dataGet[$i]->abbrfishinggear;*/

				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;
			$data->data[$arrayIndex]->fish[$fishIndex]->namecreator = $dataGet[$i]->namecreatorfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->namelasttrans = $dataGet[$i]->namelasttransfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->upline = $dataGet[$i]->upline;
			
			
			$fishIndex++;
		}
		return $data->data;
	}

  function addfishcatchv4($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam,
    $gradeparam, $descparam, $idfishparam, $sender, $uplineparam)
  {
    $idtrcatchofflineparam = $idtrcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrcatchofflineparam);
    $idtrfishcatchofflineparam = $idtrfishcatchofflineparam == null ? "NULL" : Helper::dbescape($idtrfishcatchofflineparam);
    $amountparam = $amountparam == null || $amountparam == '' ? "NULL" : Helper::dbescape($amountparam);
    $gradeparam = $gradeparam == null ? "NULL" : Helper::dbescape($gradeparam);
    $descparam = $descparam == null ? "NULL" : Helper::dbescape($descparam);
    $idfishparam = $idfishparam == null ? "NULL" : Helper::dbescape($idfishparam);
    $sender = $sender == null ? "NULL" : Helper::dbescape($sender);
    $uplineparam = $uplineparam == null ? "NULL" : Helper::dbescape($uplineparam);

    $data = DB::select("CALL addfishcatchv4(".$idtrcatchofflineparam.", ".$idtrfishcatchofflineparam.",".$amountparam.", ".$gradeparam.", ".$descparam.", ".$idfishparam.", ".$sender.", ".$uplineparam.")");
    return $data;
  }

  function getfishcatchreport($idmssupplierparam, $day, $month, $year)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$day = Helper::dbescape($day);
		$month = Helper::dbescape($month);
		$year = Helper::dbescape($year);
		
		$data = DB::select("CALL getfishcatchreport(".$idmssupplierparam.", ".$day.", ".$month.", ".$year.")");

    return $data;
	}

	function getcatchbyidmssupplierv6($idmssupplierparam, $month1, $year1, $month2, $year2)
	{
		$idmssupplierparam = Helper::dbescape($idmssupplierparam);
		$month1 = Helper::dbescape($month1);
		$year1 = Helper::dbescape($year1);
		$month2 = Helper::dbescape($month2);
		$year2 = Helper::dbescape($year2);
		
		$dataGet = DB::select("CALL getcatchbyidmssupplierv6(".$idmssupplierparam.", ".$month1.", ".$year1.", ".$month2.", ".$year2.")");

		$app = app();
		$data = $app->make('stdClass');

		$idtrcatch = "";
		$arrayIndex = -1;
		$fishIndex = 0;

		$data->data = array();
		for ($i=0; $i < count($dataGet); $i++) 
		{
			if($idtrcatch != $dataGet[$i]->idtrcatch)
			{
				$idtrcatch = $dataGet[$i]->idtrcatch;
				$arrayIndex++;
				$data->data[$arrayIndex] = $app->make('stdClass');
				$data->data[$arrayIndex]->idtrcatch = $idtrcatch;
				$data->data[$arrayIndex]->idtrcatchoffline = $dataGet[$i]->idtrcatchoffline;
				$data->data[$arrayIndex]->idmssupplier = $dataGet[$i]->idmssupplier;
				$data->data[$arrayIndex]->suppliername = $dataGet[$i]->suppliername;
				$data->data[$arrayIndex]->idmsfisherman = $dataGet[$i]->idmsfisherman;
				$data->data[$arrayIndex]->idmsuserfisherman = $dataGet[$i]->idmsuserfisherman;
				$data->data[$arrayIndex]->idmsbuyersupplier = $dataGet[$i]->idbuyersupplier;
				$data->data[$arrayIndex]->fishermanname = $dataGet[$i]->fishermanname;
				$data->data[$arrayIndex]->buyersuppliername = $dataGet[$i]->buyersuppliername;

				$data->data[$arrayIndex]->idmsship = $dataGet[$i]->idmsship;
				$data->data[$arrayIndex]->shipname = $dataGet[$i]->shipname;
				$data->data[$arrayIndex]->idmsfish = $dataGet[$i]->idmsfish;

				$data->data[$arrayIndex]->purchasedate = $dataGet[$i]->purchasedate;
				$data->data[$arrayIndex]->purchasetime = $dataGet[$i]->purchasetime;
				$data->data[$arrayIndex]->catchorfarmed = $dataGet[$i]->catchorfarmed;
				$data->data[$arrayIndex]->bycatch = $dataGet[$i]->bycatch;
				$data->data[$arrayIndex]->fadused = $dataGet[$i]->fadused;
				$data->data[$arrayIndex]->purchaseuniqueno = $dataGet[$i]->purchaseuniqueno;
				$data->data[$arrayIndex]->productformatlanding = $dataGet[$i]->productformatlanding;
				$data->data[$arrayIndex]->unitmeasurement = $dataGet[$i]->unitmeasurement;
				$data->data[$arrayIndex]->quantity = $dataGet[$i]->quantity;
				$data->data[$arrayIndex]->weight = $dataGet[$i]->weight;
				$data->data[$arrayIndex]->fishinggroundarea = $dataGet[$i]->fishinggroundarea;
				$data->data[$arrayIndex]->purchaselocation = $dataGet[$i]->purchaselocation;
				$data->data[$arrayIndex]->uniquetripid = $dataGet[$i]->uniquetripid;
				$data->data[$arrayIndex]->datetimevesseldeparture = $dataGet[$i]->datetimevesseldeparture;
				$data->data[$arrayIndex]->datetimevesselreturn = $dataGet[$i]->datetimevesselreturn;
				$data->data[$arrayIndex]->portname = $dataGet[$i]->portname;

				$data->data[$arrayIndex]->fishermanname2 = $dataGet[$i]->fishermanname2;
				$data->data[$arrayIndex]->fishermanid = $dataGet[$i]->fishermanid;
				$data->data[$arrayIndex]->fishermanregnumber = $dataGet[$i]->fishermanregnumber;
				
				$data->data[$arrayIndex]->englishname = $dataGet[$i]->english_name;
				$data->data[$arrayIndex]->indname = $dataGet[$i]->indname;
				$data->data[$arrayIndex]->threea_code = $dataGet[$i]->threea_code;

				$data->data[$arrayIndex]->priceperkg = $dataGet[$i]->priceperkg;
				$data->data[$arrayIndex]->totalprice = $dataGet[$i]->totalprice;

				$data->data[$arrayIndex]->loanexpense = $dataGet[$i]->loanexpense;
				$data->data[$arrayIndex]->otherexpense = $dataGet[$i]->otherexpense;

				$data->data[$arrayIndex]->reqidnull = $dataGet[$i]->reqidnull;
				$data->data[$arrayIndex]->requsnull = $dataGet[$i]->requsnull;
				$data->data[$arrayIndex]->reqeunull = $dataGet[$i]->reqeunull;
				$data->data[$arrayIndex]->requsaidnull = $dataGet[$i]->requsaidnull;

				$data->data[$arrayIndex]->postdate = $dataGet[$i]->postdate;

				$data->data[$arrayIndex]->idfishermanoffline = $dataGet[$i]->idfishermanoffline;
				$data->data[$arrayIndex]->idbuyeroffline = $dataGet[$i]->idbuyeroffline;
				$data->data[$arrayIndex]->idfishoffline = $dataGet[$i]->idfishoffline;
				$data->data[$arrayIndex]->idshipoffline = $dataGet[$i]->idshipoffline;

				$data->data[$arrayIndex]->close = $dataGet[$i]->closeparam;
				$data->data[$arrayIndex]->lasttransact = $dataGet[$i]->lasttransact;
				$data->data[$arrayIndex]->namecreator = $dataGet[$i]->namecreator;
				$data->data[$arrayIndex]->namelasttrans = $dataGet[$i]->namelasttrans;

				$data->data[$arrayIndex]->notes = $dataGet[$i]->notes;
				$data->data[$arrayIndex]->fish = array();
				$fishIndex = 0;
			}

			$data->data[$arrayIndex]->fish[$fishIndex] = $app->make('stdClass');
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatch = $dataGet[$i]->idtrfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->idtrfishcatchoffline = $dataGet[$i]->idtrfishcatchoffline;
			$data->data[$arrayIndex]->fish[$fishIndex]->amount = $dataGet[$i]->amount;
			$data->data[$arrayIndex]->fish[$fishIndex]->grade = $dataGet[$i]->grade;
			$data->data[$arrayIndex]->fish[$fishIndex]->description = $dataGet[$i]->description;
			$data->data[$arrayIndex]->fish[$fishIndex]->idfish = $dataGet[$i]->idfish;
			$data->data[$arrayIndex]->fish[$fishIndex]->namecreator = $dataGet[$i]->namecreatorfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->namelasttrans = $dataGet[$i]->namelasttransfishcatch;
			$data->data[$arrayIndex]->fish[$fishIndex]->upline = $dataGet[$i]->upline;
			
			
			$fishIndex++;
		}
		return $data->data;
	}


}
