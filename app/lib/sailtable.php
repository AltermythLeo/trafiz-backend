<?php
namespace App\lib;
use DB;
use App\lib\Helper;
use Illuminate\Support\Facades\Hash;

class sailtable {
	function addnewsail($idmsshipparam, $sailpositionparam, $sailingdateparam, $idmslandingsiteparam, $idmsfishermanparam)
	{
		$idmsshipparam = Helper::dbescape($idmsshipparam);
		$sailpositionparam = Helper::dbescape($sailpositionparam);
		$sailingdateparam = Helper::dbescape($sailingdateparam);
		$idmslandingsiteparam = Helper::dbescape($idmslandingsiteparam);
		$idmsfishermanparam = Helper::dbescape($idmsfishermanparam);

		$data = DB::select("CALL addnewsail('".$idmsshipparam."', '".$sailpositionparam."', '".$sailingdateparam."',
			'".$idmslandingsiteparam."','".$idmsfishermanparam."')");
		return $data;
	}

	function updatesail($idtrsailparam, $idmsshipparam, $sailpositionparam, $sailingdateparam, $idmslandingsiteparam, $idmsfishermanparam)
	{
		$idtrsailparam = Helper::dbescape($idtrsailparam);
		$idmsshipparam = Helper::dbescape($idmsshipparam);
		$sailpositionparam = Helper::dbescape($sailpositionparam);
		$sailingdateparam = Helper::dbescape($sailingdateparam);
		$idmslandingsiteparam = Helper::dbescape($idmslandingsiteparam);
		$idmsfishermanparam = Helper::dbescape($idmsfishermanparam);

		$data = DB::select("CALL updatesail('".$idtrsailparam."', '".$idmsshipparam."', '".$sailpositionparam."', '".$sailingdateparam."', '".$idmslandingsiteparam."','".$idmsfishermanparam."')");
		return $data;
	}
	}

	function deletesail($idparam)
	{
		$idparam = Helper::dbescape($idparam);
		$data = DB::select("CALL deletesail(".$idparam.")");
		return $data;
	}

	function getsailbymssupplier($idmssupplier)
	{
		$idmssupplier = Helper::dbescape($idmssupplier);
		$data = DB::select("CALL getsailbymssupplier(".$idmssupplier.")");
		return $data;
	}

	// ship crew
	function addshipcrew($idmsfishermanparam, $idtrsailparam)
	{
		$idmsfishermanparam = Helper::dbescape($idmsfishermanparam);
		$idtrsailparam = Helper::dbescape($idtrsailparam);

		$data = DB::select("CALL addshipcrew(".$idmsfishermanparam.",".$idtrsailparam.")");
		return $data;
	}

	function updateshipcrew($idtrshipcrewparam, $idmsfishermanparam, $idtrsailparam)
	{
		$idtrshipcrewparam = Helper::dbescape($idtrshipcrewparam);
		$idmsfishermanparam = Helper::dbescape($idmsfishermanparam);
		$idtrsailparam = Helper::dbescape($idtrsailparam);
		
		$data = DB::select("CALL updateshipcrew(".$idtrshipcrewparam.",".$idmsfishermanparam.",".$idtrsailparam.")");
		return $data;
	}

	function deleteshipcrew($idtrshipcrewparam)
	{
		$idtrshipcrewparam = Helper::dbescape($idtrshipcrewparam);
		$data = DB::select("CALL deleteshipcrew(".$idtrshipcrewparam.")");
		return $data;
	}
}
