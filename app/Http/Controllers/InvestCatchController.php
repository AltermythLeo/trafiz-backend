<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\investcatchtable;
use App\lib\suppliertable;
use App\lib\Helper;
use App;
use PDF;

class InvestCatchController extends BaseController
{
	public function index()
    {
        return csrf_token();
    }

    public function GetListBuyFish(Request $request)
    {
        try 
        {
            $table = new investcatchtable();
            $data = $table->getBuyFish($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertBuyFish(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investcatchtable();
            $data = $table->upsertBuyFish($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListSplitFish(Request $request)
    {
        try 
        {
            $table = new investcatchtable();
            $data = $table->getSplitFish($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertSplitFish(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investcatchtable();
            $data = $table->upsertSplitFish($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListSimpleSellFish(Request $request)
    {
        try 
        {
            $table = new investcatchtable();
            $data = $table->getSimpleSellFish($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertSimpleSellFish(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investcatchtable();
            $data = $table->upsertSimpleSellFish($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }
}

