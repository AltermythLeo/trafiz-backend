<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\investtable;
use App\lib\suppliertable;
use App\lib\Helper;
use App;
use PDF;

class InvestController extends BaseController
{
	public function index()
    {
        return csrf_token();
    }

    public function _index(Request $request)
    {
        $err = !isset($_GET['err']) ? "" : "Error: ". $_GET['err'];
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $day = !isset($_GET['d']) ? -1 : $_GET['d'];
        $month = !isset($_GET['m']) ? -1 : $_GET['m'];
        $year = !isset($_GET['y']) ? date("Y") : $_GET['y'];
        $yearNow = date("Y");

        $table = new loantable();
        $suppliertable = new suppliertable();
        if($authlv == 1)
        {
            $sid = $request->session()->get('sid');
            $obj = "[{
                \"idmssupplier\": \"".$sid."\",
                \"name\": \"".Auth::user()->name."\"
            }]";
            $objTest = json_decode($obj);
            $dataSupplier = $objTest;
            $idmssupplier = $sid;
        }
        else if($authlv < 1)
        {
            $dataSupplier = $suppliertable->getsupplier();
            $idmssupplier = !isset($_GET['id']) ? "-1" : $_GET['id'];
        }

        $data = $table->getloanlistsupplier($idmssupplier, $day, $month, $year);
        $datapay = $table->getpayloanlistbyidmssupplier($idmssupplier, $day, $month, $year);

        /*
        if($authlv == 1)
        {
            $sid = $request->session()->get('sid');
            $data = $table->getloanlistsupplier($sid, $month, $year);
            $datapay = $table->getpayloanlistbyidmssupplier($sid, $month, $year);
        }
        else if($authlv < 1)
        {
            $data = $table->getloanlist($month, $year);
            $datapay = $table->getpayloanlist($month, $year);
        }*/

        return View::make('loanreport')
            ->with("title", "loanReport")
            ->with("authlv", $authlv)
            ->with("err", $err)
            ->with("data", $data)
            ->with("id", $idmssupplier)
            ->with("dataSupplier", $dataSupplier)
            ->with("datapay", $datapay)
            ->with("day", $day)
            ->with("month", $month)
            ->with("year", $year)
            ->with("yearNow", $yearNow);
    }

    public function GetListCustomType(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistCustomType($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListCustomExpense(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistCustomExpense($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListCustomIncome(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistCustomIncome($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListTakeLoan(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistTakeLoan($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListPayLoan(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistPayLoan($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListGiveCredit(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistGiveCredit($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function GetListCreditPayment(Request $request)
    {
        try 
        {
            $table = new investtable();
            $data = $table->getlistCreditPayment($request->idmsuser, $request->d, $request->m, $request->y);
			$return = $data;
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertTakeLoan(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertTakeLoan($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertPayLoan(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertPayLoan($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertGiveCredit(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertGiveCredit($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertCreditPayment(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertCreditPayment($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertCustomExpense(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertCustomExpense($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertCustomIncome(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertCustomIncome($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

    public function UpsertCustomType(Request $request)
    {
		$return = "";
        try 
        {
            $table = new investtable();
            $data = $table->upsertCustomType($request);
			$return = "OK";
        }
        catch (\Exception $e) 
        {
			$return = $e->getMessage();
        }
    	return $return;
    }

}

