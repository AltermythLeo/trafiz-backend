<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\lib\buyfishtable;
use App\lib\investcatchtable;
use App\lib\suppliertable;
use App\lib\Helper;
use App;
use PDF;

class DirectApiController extends BaseController
{
  // localhost
  // public const SENDER = "d51597cf802411e89cd1000d3aa384f1";
  // public const IDMSSUPPLIER = "d51642a5802411e89cd1000d3aa384f1";
  // public const FISHID = "fish-d51597cf802411e89cd1000d3aa384f1-1534237805978-7894";
  // public const VESSELID = "ship-d51597cf802411e89cd1000d3aa384f1-1574944376206-7158";
  // public const FISHERMANID = "fisherman-d51597cf802411e89cd1000d3aa384f1-1574944378373-7575";
  
  // trafiz.org
  public const SENDER = "d51597cf802411e89cd1000d3aa384f1";
  public const IDMSSUPPLIER = "d51642a5802411e89cd1000d3aa384f1";
  public const FISHID = "fish-d51597cf802411e89cd1000d3aa384f1-1574141861727-1518";
  public const VESSELID = "ship-d51597cf802411e89cd1000d3aa384f1-1579854271760-5856";
  public const FISHERMANID = "fisherman-d51597cf802411e89cd1000d3aa384f1-1579854271816-1380";
  
	public function index()
  {
    return csrf_token();
  }

  public function GetCatchByPurchaseDate(Request $request)
  {
    try
    {
      $sender = $request->sender; // idmsuser

      // check sender
      if( !isFilled($sender) ) return sendError('sender must be filled');
      $sql = 'SELECT idmssupplier FROM mssupplier WHERE idmsuser = ?';
      $rows = DB::select($sql, [$sender]);
      if(count($rows) == 0) return sendError('sender not registered');
      $idmssupplierparam = $rows[0]->idmssupplier;

      $purchasedateparam = $request->purchasedate; // 2020-02-10

      if( !isGoodDate($purchasedateparam) ) return sendError('purchasedate must in right format');
      
      $rows = DB::select('select * from trcatch where purchasedate = ? and idmsusercreator = ?', [$purchasedateparam,$sender]);
      $catches = array();
      foreach ($rows as $row) {
        $catch = array (
          'catchid' => $row->idtrcatchoffline,
          'purchasedate' => $row->purchasedate,
          'catchorfarmed' => $row->catchorfarmed,
          'bycatch' => $row->bycatch,
          'fadused' => $row->fadused,
          'productformatlanding' => $row->productformatlanding,
          'unitmeasurement' => $row->unitmeasurement,
          'datetimevesseldeparture' => $row->datetimevesseldeparture,
          'datetimevesselreturn' => $row->datetimevesselreturn,
          'portname' => $row->portname,
          'fishermanname' => $row->fishermanname2
        );
        array_push($catches,$catch);
      }

      $response = array(
        'status' => true,
        'catches' => $catches
      );
      header("Content-Type: application/json");
      return json_encode($response);
    }
    catch (\Exception $e) {
      return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
    }

  }

  public function CreateCatch(Request $request)
  {
    try
    {
      $num = floor(microtime(true) * 10000);
      $randStr = strtoupper(base_convert ( $num , 10, 36 ));
      $generatedId = "CATCH-2-".$randStr;
      
      $sender = $request->sender; // idmsuser

      // check sender
      if( !isFilled($sender) ) return sendError('sender must be filled');
      $sql = 'SELECT idmssupplier FROM mssupplier WHERE idmsuser = ?';
      $rows = DB::select($sql, [$sender]);
      if(count($rows) == 0) return sendError('sender not registered');
      $idmssupplierparam = $rows[0]->idmssupplier;

      // check fisherman
      $fishermannameparam = isset($request->fishermanname) ? $request->fishermanname : "Other/Lainnya";
      $sql = 'SELECT 	a.idfishermanoffline, b.name FROM msfisherman a JOIN msuser b ON a.idmsuser = b.idmsuser JOIN mssupplier c on a.idmssupplier = c.idmssupplier where c.idmsuser = ? AND b.name = ?';
      $rows = DB::select($sql, [$sender,$fishermannameparam]);
      if(count($rows) == 0) return sendError('fisherman not registered');
      $idfishermanoffline = $rows[0]->idfishermanoffline;

      // check vessel
      $vesselname = $request->vesselname; // idmsuser
      if( !isFilled($vesselname) ) return sendError('vesselname must be filled');
      $sql = 'SELECT * FROM msship WHERE vesselname_param = ? AND idmsuserparam = ?';
      $rows = DB::select($sql, [$vesselname,$sender]);
      if(count($rows) == 0) return sendError('vesselname not registered');
      $idshipoffline = $rows[0]->idshipoffline;

      $idbuyeroffline = null;
      $idtrcatchofflineparam = $generatedId; //$request->idtrcatchofflineparam;
      $purchasedateparam = $request->purchasedate; // 2020-02-10
      $purchasetimeparam = "00:00:00";
      $catchorfarmedparam = $request->catchorfarmed; // 1 wildcatch or 0 aquaculture
      $bycatchparam = $request->bycatch; // 1 yes or 0 no
      $fadusedparam = $request->fadused;  // 1 yes or 0 no
      $purchaseuniquenoparam = $generatedId;
      $productformatlandingparam = $request->productformatlanding; // 1 loin or 0 whole
      $unitmeasurementparam = $request->unitmeasurement; // 1 individual or 0 basket
      $fishcode = $request->fishcode; // YFT
      $quantityparam = 0;
      $weightparam = 0;
      $fishinggroundareaparam = "715,O35"; // hardcode
      $purchaselocationparam = null;
      $uniquetripidparam = null;
      $datetimevesseldepartureparam = $request->datetimevesseldeparture; // "2020-02-10"
      $datetimevesselreturnparam = $request->datetimevesselreturn; // "2020-02-10"
      $portnameparam = $request->portname; // "Tanjung Perak"
      $priceperkgparam = null;
      $totalpriceparam = null;
      $loanexpenseparam = null;
      $otherexpenseparam = null;
      $postdateparam = null;      
      $closeparam = "0";
      $fishermanidparam = "";
      $fishermanregnumberparam = "";

      if( !isGoodFishCode($fishcode) ) return sendError('fishcode must three characters');
      if( !isGoodDate($purchasedateparam) ) return sendError('purchasedate must in right format');
      if( !isGoodDate($datetimevesseldepartureparam) ) return sendError('datetimevesseldeparture must in right format');
      if( !isGoodDate($datetimevesselreturnparam) ) return sendError('datetimevesselreturn must in right format');
      if( !isOneOrZero($bycatchparam) ) return sendError('bycatch must 0 or 1');
      if( !isOneOrZero($fadusedparam) ) return sendError('fadused must 0 or 1');
      if( !isOneOrZero($productformatlandingparam) ) return sendError('productformatlanding must 0 or 1');
      if( !isOneOrZero($unitmeasurementparam) ) return sendError('unitmeasurement must 0 or 1');
      if( !isFilled($portnameparam) ) return sendError('portname must be filled');

      // set fish by fishcode
      $sql = 'SELECT	a.* FROM msfish a JOIN ltfish b ON a.idltfish = b.idltfish WHERE a.idmssupplier = ? AND b.threea_code = ? AND a.lasttransact <> "D"';
      $rows = DB::select($sql, [$idmssupplierparam,strtoupper($fishcode)]);
      if(count($rows) == 0) return sendError('fishcode not registered');
      $idfishoffline = $rows[0]->idfishoffline;

      $table = new buyfishtable();
      //$returnValue = $table->addcatchv5($idtrcatchofflineparam, $idmssupplierparam, $idfishermanoffline, $idbuyeroffline, $idshipoffline, $idfishoffline, $purchasedateparam, $purchasetimeparam, $catchorfarmedparam, $bycatchparam, $fadusedparam, $purchaseuniquenoparam, $productformatlandingparam, $unitmeasurementparam, $quantityparam, $weightparam, $fishinggroundareaparam, $purchaselocationparam, $uniquetripidparam, $datetimevesseldepartureparam, $datetimevesselreturnparam, $portnameparam, $priceperkgparam, $totalpriceparam, $loanexpenseparam, $otherexpenseparam, $postdateparam, $sender, $fishermannameparam, $fishermanidparam, $fishermanregnumberparam, $closeparam);
      $response = array(
        'status' => true,
        'catchId' => $generatedId,
        'fisherman' => $idfishermanoffline,
        'vessel' => $idshipoffline,
        'fish' => $idfishoffline
      );
      header("Content-Type: application/json");
      return json_encode($response);
    }
    catch (\Exception $e) {
      return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
    }

  }

  public function AddFishCatch(Request $request)
  {
    try
    {
      $num = floor(microtime(true) * 10000);
      $randStr = strtoupper(base_convert ( $num , 10, 36 ));
      $generatedId = "FISHCATCH-2-".$randStr;
      
      $sender = $request->sender; // idmsuser
      // check sender
      if( !isFilled($sender) ) return sendError('sender must be filled');
      $sql = 'SELECT idmssupplier FROM mssupplier WHERE idmsuser = ?';
      $rows = DB::select($sql, [$sender]);
      if(count($rows) == 0) return sendError('sender not registered');
      $idmssupplierparam = $rows[0]->idmssupplier;

      $idtrcatchofflineparam = $request->catchid;
      $idtrfishcatchofflineparam = $generatedId;
      $amountparam = $request->amount; // 100 200
      $gradeparam = $request->grade;
      $descparam = isset($request->desc) ? $request->desc : "";
      $idfishparam = $generatedId;
      $uplineparam = "";

      if( !isGoodAmount($amountparam) ) return sendError('amount must greater than 0');
      if( !isGoodGrade($gradeparam) ) return sendError('grade must be set in right format');

      $rows = DB::select('select * from trcatch where idtrcatchoffline = ?', [$idtrcatchofflineparam]);
      if(count($rows) != 1) return sendError('catchid not found');

      $table = new buyfishtable();
      $returnValue = $table->addfishcatchv4($idtrcatchofflineparam, $idtrfishcatchofflineparam, $amountparam, $gradeparam, $descparam, $idfishparam, $sender, $uplineparam);

      $response = array(
        'status' => true,
        'fishcatchId' => $generatedId
      );
      header("Content-Type: application/json");
      return json_encode($response);
    }
    catch (\Exception $e) {
      return ["err" =>  __FUNCTION__ . " Error : ". substr($e, 0, 2000)];
    }

  }
}

function isGoodFishCode($check) {
  if( !is_null($check) && strlen($check) == 3) return true;
  return false;
}

function isOneOrZero($check) {
  if( !is_null($check) && ($check == 1 || $check == 0)) return true;
  return false;
}

function isFilled($check) {
  if( !is_null($check) && strlen($check) > 0) return true;
  return false;
}

function isGoodDate($check) {
  if( !is_null($check) && validateDate($check)) return true;
  return false;
}

function isGoodAmount($check) {
  if( !is_null($check) && is_numeric($check) && $check > 0) return true;
  return false;
}

function isGoodGrade($check) {
  if( !is_null($check) && strlen($check) == 1) return true;
  return false;
}



function validateDate($date)
{
  try {
    $tempDate = explode('-', $date);
    return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
  } catch (\Exception $e) {
    return false;
  }
}

function sendError($msg) {
  $response = array(
    'status' => false,
    'message' => $msg
  );
  header("Content-Type: application/json");
  return json_encode($response);
}

