<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\suppliertable;
use App\lib\synctable;
use App\lib\Helper;
use App;

class SyncController extends BaseController
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
            $idmssupplier = !isset($_GET['id']) ? -1 : $_GET['id'];
        }

        $table = new synctable();
        $data = $table->getreportlog($idmssupplier, $day, $month, $year);
        return View::make('reportlog')
                ->with("title", "reportlog")
                ->with("authlv", $authlv)
                ->with("dataSupplier", $dataSupplier)
                ->with("data", $data)
                ->with("day", $day)
                ->with("month", $month)
                ->with("year", $year)
                ->with("yearNow", $yearNow)
                ->with("id", $idmssupplier);
    }
}
