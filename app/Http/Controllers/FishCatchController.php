<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\buyfishtable;
use App\lib\suppliertable;
use App\lib\Helper;
use App;
use PDF;

class FishCatchController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $day = !isset($_GET['d']) ? -1 : $_GET['d'];
        $month = !isset($_GET['m']) ? -1 : $_GET['m'];
        $year = !isset($_GET['y']) ? date("Y") : $_GET['y'];
        $yearNow = date("Y");

        $table = new buyfishtable();
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

        $data = $table->getcatchbyidmssupplierv2($idmssupplier, $day, $month, $year);
        /*
        if($authlv == 1)
        {
            $sid = $request->session()->get('sid');
            $data = $table->getcatchbyidmssupplier($sid, $month, $year);
        }
        else if($authlv < 1)
        {
            $data = $table->getcatch($month, $year);
        }*/
        
        return View::make('fishcatchreport')
                ->with("title", "Fish Catch")
                ->with("authlv", $authlv)
                ->with("data", $data)
                ->with("day", $day)
                ->with("month", $month)
                ->with("year", $year)
                ->with("yearNow", $yearNow)
                ->with("id", $idmssupplier)
                ->with("dataSupplier", $dataSupplier);
    }

    public function reportPrint(Request $request)
    {
        $authlv = $request->session()->get('admintype');

        $date = $request->date;
        $month = $request->month;
        $year = $request->year;
        $sid = $request->sid;

        $table = new buyfishtable();
        $datatable = $table->getcatchbyidmssupplierv2($sid, $date, $month, $year);
        /*
        if($authlv == 1)
        {
            $sid = $request->session()->get('sid');
            $datatable = $table->getcatchbyidmssupplier($sid, $month, $year);
        }
        else if($authlv < 1)
        {
            $datatable = $table->getcatch($month, $year);
        }*/

        $title = "Fish Catch Report";

        $data = ['title' => "Fish Catch Report",
                'data' => $datatable
                ];

        $pdf = PDF::loadView('fishcatchreportprint', $data)->setPaper('a4', 'potrait');
        return $pdf->download('FishCatchReport'. substr($year, -2). substr("0".$month, -2). substr("0".$date, -2).$sid.'.pdf');
    }

    public function reportCsv(Request $request)
    {
        $authlv = $request->session()->get('admintype');

        $date = $request->date;
        $month = $request->month;
        $year = $request->year;
        $sid = $request->sid;

        $table = new buyfishtable();
        $datatable = $table->getfishcatchreport($sid, $date, $month, $year);

        $title = "Fish Catch Report";

        $data = [
          'title' => "Fish Catch Report",
          'data' => $datatable
        ];

        return $data;
    }

}
