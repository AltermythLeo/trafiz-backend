<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\loantable;
use App\lib\suppliertable;
use App\lib\Helper;
use App;
use PDF;

class LoanController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
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

    public function reportPrint(Request $request)
    {
        $date = $request->date;
        $month = $request->month;
        $year = $request->year;
        $sid = $request->sid;

        $table = new loantable();
        $datatable = $table->getloanlistsupplier($sid, $date, $month, $year);
        $datatablepay = $table->getpayloanlistbyidmssupplier($sid, $date, $month, $year);
        $title = "loanReport";

        //var_dump($datatable);
        //die();
        $data = ['title' => "loanReport",
                'data' => $datatable,
                'datapay' => $datatablepay
                ];

        $pdf = PDF::loadView('loanreportprint', $data)->setPaper('a4', 'landscape');
        return $pdf->download('loanReport'. substr($year, -2). substr("0".$month, -2).substr("0".$date, -2).$sid.'.pdf');
    }

    public function indexSupplier(Request $request)
    {
        $err = !isset($_GET['err']) ? "" : "Error: ". $_GET['err'];
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $month = !isset($_GET['m']) ? date("n") : $_GET['m'];
        $year = !isset($_GET['y']) ? date("Y") : $_GET['y'];
        $yearNow = date("Y");

        $table = new loantable();

        $sid = $request->session()->get('uid');
        $data = $table->getloanlistsupplier($sid, $day, $month, $year);
        $datapay = $table->getpayloanlistbyidmssupplier($sid, $day, $month, $year);

        return View::make('loanreportsupplier')
            ->with("title", "loanReportSupplier")
            ->with("authlv", $authlv)
            ->with("err", $err)
            ->with("data", $data)
            ->with("datapay", $datapay)
            ->with("day", $day)
            ->with("month", $month)
            ->with("year", $year)
            ->with("yearNow", $yearNow);
    }
}

