<?php
namespace App\lib;
use DB;
use App\lib\Helper;
use Illuminate\Support\Facades\Hash;

class fishtable {
	function addnewfish($idfishofflineparam, $idltfishparam, $indnameparam, $localnameparam, $photoparam, $idmssupplierparam, $priceparam)
	{
		$idfishofflineparam = $idfishofflineparam == null ? "NULL" : Helper::dbescape($idfishofflineparam);
		$idltfishparam = $idltfishparam == null ? "NULL" : Helper::dbescape($idltfishparam);
		$indnameparam = $indnameparam == null ? "NULL" : Helper::dbescape($indnameparam);
		$localnameparam = $localnameparam == null ? "NULL" : Helper::dbescape($localnameparam);
		$photoparam = $photoparam == null ? "NULL" : Helper::dbescape($photoparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$priceparam = $priceparam == null ? "NULL" : Helper::dbescape($priceparam);

		//var_dump("CALL addnewfish(".$idfishofflineparam.", ".$idltfishparam.", ".$indnameparam.", ".$localnameparam.", ".$photoparam.",".$idmssupplierparam.",". $priceparam.")");
		//die();

		$data = DB::select("CALL addnewfish(".$idfishofflineparam.", ".$idltfishparam.", ".$indnameparam.", ".$localnameparam.",
			".$photoparam.",".$idmssupplierparam.",". $priceparam.")");
		
		return $data;
	}

	function updatefish($idfishofflineparam, $idltfishparam, $indnameparam, $localnameparam, $photoparam, $idmssupplierparam, $priceparam)
	{
		$idfishofflineparam = $idfishofflineparam == null ? "NULL" : Helper::dbescape($idfishofflineparam);
		$idltfishparam = $idltfishparam == null ? "NULL" : Helper::dbescape($idltfishparam);
		$indnameparam = $indnameparam == null ? "NULL" : Helper::dbescape($indnameparam);
		$localnameparam = $localnameparam == null ? "NULL" : Helper::dbescape($localnameparam);
		$photoparam = $photoparam == null ? "NULL" : Helper::dbescape($photoparam);
		$idmssupplierparam = $idmssupplierparam == null ? "NULL" : Helper::dbescape($idmssupplierparam);
		$priceparam = $priceparam == null ? "NULL" : Helper::dbescape($priceparam);

		//var_dump("CALL updatefish(".$idfishofflineparam.", ".$idltfishparam.", ".$indnameparam.", ".$localnameparam.", ".$photoparam.",".$idmssupplierparam.",". $priceparam.")");
		//die();

		$data = DB::select("CALL updatefish(".$idfishofflineparam.", ".$idltfishparam.", ".$indnameparam.", ".$localnameparam.", ".$photoparam.",".$idmssupplierparam.",". $priceparam.")");
		return $data;
	}

	function deletefish($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletefish(".$idparam.")");
		return $data;
	}

	function getfishbyidmsuser($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getfishbyidmsuser(".$idparam.")");
		return $data;
	}

	function getfishbyidmsuserv2($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL getfishbyidmsuserv2(".$idparam.")");
		return $data;
	}

	function getallfish()
	{
		$data = DB::select("CALL getallfish()");
		return $data;
	}

	function getltfish()
	{
		$data = DB::select("CALL getltfish()");
		return $data;
	}

	function addnewltfish($isscaap_param, $taxocode_param, $threea_code_param, $scientific_name_param, $english_name_param, $french_name_param, $spanish_name_param, $author_param, $family_param, $bio_order_param, $stats_data_param)
	{
		$isscaap_param = $isscaap_param == null ? "NULL" : Helper::dbescape($isscaap_param);
		$taxocode_param = $taxocode_param == null ? "NULL" : Helper::dbescape($taxocode_param);
		$threea_code_param = $threea_code_param == null ? "NULL" : Helper::dbescape($threea_code_param);
		$scientific_name_param = $scientific_name_param == null ? "NULL" : Helper::dbescape($scientific_name_param);
		$english_name_param = $english_name_param == null ? "NULL" : Helper::dbescape($english_name_param);
		$french_name_param = $french_name_param == null ? "NULL" : Helper::dbescape($french_name_param);
		$spanish_name_param = $spanish_name_param == null ? "NULL" : Helper::dbescape($spanish_name_param);
		$author_param = $author_param == null ? "NULL" : Helper::dbescape($author_param);
		$family_param = $family_param == null ? "NULL" : Helper::dbescape($family_param);
		$bio_order_param = $bio_order_param == null ? "NULL" : Helper::dbescape($bio_order_param);
		$stats_data_param = $stats_data_param == null ? "NULL" : Helper::dbescape($stats_data_param);

		$data = DB::select("CALL addnewltfish(".$isscaap_param.",".$taxocode_param.",".$threea_code_param.",".$scientific_name_param.",".$english_name_param.",".$french_name_param.",".$spanish_name_param.",".$author_param.",".$family_param.",".$bio_order_param.",".$stats_data_param.")");
		
		return $data;
	}

	function updateltfish($idltfishparam, $isscaap_param, $taxocode_param, $threea_code_param, $scientific_name_param, $english_name_param, $french_name_param, $spanish_name_param, $author_param, $family_param, $bio_order_param, $stats_data_param)
	{
		$idltfishparam = $idltfishparam == null ? "NULL" : Helper::dbescape($idltfishparam);
		$isscaap_param = $isscaap_param == null ? "NULL" : Helper::dbescape($isscaap_param);
		$taxocode_param = $taxocode_param == null ? "NULL" : Helper::dbescape($taxocode_param);
		$threea_code_param = $threea_code_param == null ? "NULL" : Helper::dbescape($threea_code_param);
		$scientific_name_param = $scientific_name_param == null ? "NULL" : Helper::dbescape($scientific_name_param);
		$english_name_param = $english_name_param == null ? "NULL" : Helper::dbescape($english_name_param);
		$french_name_param = $french_name_param == null ? "NULL" : Helper::dbescape($french_name_param);
		$spanish_name_param = $spanish_name_param == null ? "NULL" : Helper::dbescape($spanish_name_param);
		$author_param = $author_param == null ? "NULL" : Helper::dbescape($author_param);
		$family_param = $family_param == null ? "NULL" : Helper::dbescape($family_param);
		$bio_order_param = $bio_order_param == null ? "NULL" : Helper::dbescape($bio_order_param);
		$stats_data_param = $stats_data_param == null ? "NULL" : Helper::dbescape($stats_data_param);

		$data = DB::select("CALL updateltfish(".$idltfishparam.", ".$isscaap_param.",".$taxocode_param.",".$threea_code_param.",".$scientific_name_param.",".$english_name_param.",".$french_name_param.",".$spanish_name_param.",".$author_param.",".$family_param.",".$bio_order_param.",".$stats_data_param.")");
		
		return $data;
	}

	
	function deleteltfish($idltfishparam)
	{
		$idltfishparam = $idltfishparam == null ? "NULL" : Helper::dbescape($idltfishparam);
		$data = DB::select("CALL deleteltfish(".$idltfishparam.")");
		
		return $data;
	}

	function getkdedetailfromidfish($idfish)
	{
		$idfish = Helper::dbescape($idfish);
		$data = DB::select("CALL getkdedetailfromidfish(".$idfish.")");
		
		return $data;	
	}

	function getkdedetailfromiddeliverysheet($iddeliverysheet)
	{
		$iddeliverysheet = Helper::dbescape($iddeliverysheet);
		$data = DB::select("CALL getkdedetailfromiddeliverysheet(".$iddeliverysheet.")");
		
		return $data;	
  }
  
  function getkdedata($idfish)
	{
		$idfish = Helper::dbescape($idfish);
		$data = DB::select("CALL getfishcatchdata(".$idfish.")");
		
		return $data;	
	}
	
}
