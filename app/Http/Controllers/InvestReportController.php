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
use App\lib\investcatchtable;
use App\lib\Helper;
use App;
use PDF;
use DateTime;

class InvestReportController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        if(!isset($_GET['y1'])) {
            $d1 = 1;
            $m1 = date("n");
            $y1 = date("Y");
            $d2 = date("t");
            $m2 = date("n");
            $y2 = date("Y");
        } else {
            $d1 = !isset($_GET['d1']) ? -1 : $_GET['d1'];
            $m1 = !isset($_GET['m1']) ? -1 : $_GET['m1'];
            $y1 = !isset($_GET['y1']) ? date("Y") : $_GET['y1'];
            $d2 = !isset($_GET['d2']) ? -1 : $_GET['d2'];
            $m2 = !isset($_GET['m2']) ? -1 : $_GET['m2'];
            $y2 = !isset($_GET['y2']) ? date("Y") : $_GET['y2'];
        }

        $catfilter = !isset($_GET['catfilter']) ? -1 : $_GET['catfilter'];
        $city = !isset($_GET['city']) ? -1 : $_GET['city'];

        $yearNow = date("Y");
        $investcatchtable = new investcatchtable();
        
        if($authlv == 1)
        {
            $dataSupplier = $investcatchtable->getsupplier();
            $sid = $request->session()->get('sid');
            $uid = $request->session()->get('uid');
            $idmsuser = $uid;
        }
        else if($authlv < 1)
        {
            $dataSupplier = $investcatchtable->getsupplier();
            $idmsuser = !isset($_GET['id']) ? "-1" : $_GET['id'];
        }

        $date1 = -1;
        $date2 = -1;

        if($d1 > -1 && $m1 > -1) {
            $date1 = new DateTime();
            $date1->setDate($y1, $m1, $d1);
            $date1 = $date1->format('Y-m-d');
        }

        if($d2 > -1 && $m2 > -1) {
            $date2 = new DateTime();
            $date2->setDate($y2, $m2, $d2);
            $date2 = $date2->format('Y-m-d');
        }

        if($m1 == -1) {
            $date1 = new DateTime();
            $date1->setDate($y1, 1, 1);
            $date1 = $date1->format('Y-m-d');
        } else if($d1 == -1) {
            $date1 = new DateTime();
            $date1->setDate($y1, $m1, 1);
            $date1 = $date1->format('Y-m-d');
        }

        if($m2 == -1) {
            $date2 = new DateTime();
            $date2->setDate($y2, 12, 1);
            $date2 = $date2->format('Y-m-t');
        } else if($d2 == -1) {
            $date2 = new DateTime();
            $date2->setDate($y2, $m2, 1);
            $date2 = $date2->format('Y-m-t');
        }

        $data = $investcatchtable->getReportTransaction($idmsuser, $date1, $date2, $catfilter, $city);
        $dataCategory = $investcatchtable->getCategory($idmsuser);
        $dataTotal = $investcatchtable->getReportTransactionTotal($idmsuser, $date1, $date2, $catfilter, $city);
        $pl = $dataTotal[0]->totalincome - $dataTotal[0]->totalexpense;
        return View::make('investreporttransdaily')
                ->with("title", "Invest Daily Transaction")
                ->with("authlv", $authlv)
                ->with("data", $data)
                ->with("d1", $d1)
                ->with("m1", $m1)
                ->with("y1", $y1)
                ->with("d2", $d2)
                ->with("m2", $m2)
                ->with("y2", $y2)
                ->with("yearNow", $yearNow)
                ->with("id", $idmsuser)
                ->with("dataSupplier", $dataSupplier)
                ->with("dataCategory", $dataCategory)
                ->with("totalincome", $dataTotal[0]->totalincome)
                ->with("totalexpense", $dataTotal[0]->totalexpense)
                ->with("pl", $pl)
                ->with("catFilter",$catfilter)
                ->with("city",$city);
    }

    public function reportCsv(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        
        $d1 = $request->d1;
        $m1 = $request->m1;
        $y1 = $request->y1;
        $d2 = $request->d2;
        $m2 = $request->m2;
        $y2 = $request->y2;
        $uid = $request->uid;
        $catfilter = !isset($request->catfilter) ? -1 : $request->catfilter;
        $city = !isset($request->city) ? -1 : $request->city;
        $extendeddata = !isset($request->extendeddata) ? false : $request->extendeddata;

        $date1 = -1;
        $date2 = -1;
        
        if($d1 > -1 && $m1 > -1) {
            $date1 = new DateTime();
            $date1->setDate($y1, $m1, $d1);
            $date1 = $date1->format('Y-m-d');
        }

        if($d2 > -1 && $m2 > -1) {
            $date2 = new DateTime();
            $date2->setDate($y2, $m2, $d2);
            $date2 = $date2->format('Y-m-d');
        }

        if($m1 == -1) {
            $date1 = new DateTime();
            $date1->setDate($y1, 1, 1);
            $date1 = $date1->format('Y-m-d');
        } else if($d1 == -1) {
            $date1 = new DateTime();
            $date1->setDate($y1, $m1, 1);
            $date1 = $date1->format('Y-m-d');
        }

        if($m2 == -1) {
            $date2 = new DateTime();
            $date2->setDate($y2, 12, 1);
            $date2 = $date2->format('Y-m-t');
        } else if($d2 == -1) {
            $date2 = new DateTime();
            $date2->setDate($y2, $m2, 1);
            $date2 = $date2->format('Y-m-t');
        }

        $investcatchtable = new investcatchtable();
        $datatable = null;
        if($extendeddata)
            $datatable = $investcatchtable->getReportCSVDumpData($uid, $date1, $date2, $catfilter, $city);
        else
            $datatable = $investcatchtable->getReportTransaction($uid, $date1, $date2, $catfilter, $city);

        $data = [
          'title' => "Invest Transaction Report",
          'data' => $datatable
        ];

        return $data;
    }

}
