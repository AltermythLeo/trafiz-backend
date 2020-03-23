<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\loantable;
use App\lib\buyfishtable;
use App\lib\suppliertable;
use App\lib\delivertable;

use App\lib\Helper;
use App;
use PDF;

class ReportTransactionController extends BaseController
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
       
        $loantable = new loantable();
        $buyfishtable = new buyfishtable();
        $suppliertable = new suppliertable();
        $delivertable = new delivertable();

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

        // pengeluaran
        $dataLoan = $loantable->getreportloan($idmssupplier, $day, $month, $year);
        $totalLoan = 0;
        for ($i=0; $i < count($dataLoan) ; $i++) { 
            $totalLoan += $dataLoan[$i]->loaninrp;
        }

        $dataCatch = $buyfishtable->getreportcatch($idmssupplier, $day, $month, $year);
        $totalCatch = 0;
        $totalCatchKg = 0;
        for ($i=0; $i < count($dataCatch) ; $i++) { 
            $totalCatch += $dataCatch[$i]->totalprice;
            $totalCatchKg += $dataCatch[$i]->weight;
        }

        // pemasukan
        $dataSellFish = $delivertable->getreportdelivery($idmssupplier, $day, $month, $year);
        $totalSellFish = 0;
        $totalSellKg = 0;
        for ($i=0; $i < count($dataSellFish) ; $i++) { 
            $totalSellFish += $dataSellFish[$i]->totalprice;
            $totalSellKg += $dataSellFish[$i]->totalweight;
        }


        $dataLoanPay = $loantable->getreportpayloan($idmssupplier, $day, $month, $year);
        $totalLoanPay = 0;
        for ($i=0; $i < count($dataLoanPay) ; $i++) { 
            $totalLoanPay += $dataLoanPay[$i]->loaninrp;
        }

        return View::make('reporttransaction')
            ->with("title", "reportTransaction")
            ->with("authlv", $authlv)
            ->with("err", $err)
            ->with("day", $day)
            ->with("month", $month)
            ->with("year", $year)
            ->with("yearNow", $yearNow)
            ->with("id", $idmssupplier)
            ->with("dataSupplier", $dataSupplier)
            ->with("dataLoan", $dataLoan)
            ->with("dataLoanPay", $dataLoanPay)
            ->with("dataCatch", $dataCatch)
            ->with("dataSellFish", $dataSellFish)
            ->with("totalLoan", $totalLoan)
            ->with("totalCatch", $totalCatch)
            ->with("totalLoanPay", $totalLoanPay)
            ->with("totalSellFish", $totalSellFish)
            ->with("totalSellKg", $totalSellKg)
            ->with("totalCatchKg", $totalCatchKg);
    }

    public function reportPrint(Request $request)
    {
        $idmssupplier = $request->sid;
        $date = $request->date;
        $month = $request->month;
        $year = $request->year;

        $loantable = new loantable();
        $buyfishtable = new buyfishtable();
        $suppliertable = new suppliertable();
        $delivertable = new delivertable();

        // pengeluaran
        $dataLoan = $loantable->getreportloan($idmssupplier, $date, $month, $year);
        $totalLoan = 0;
        for ($i=0; $i < count($dataLoan) ; $i++) { 
            $totalLoan += $dataLoan[$i]->loaninrp;
        }

        $dataCatch = $buyfishtable->getreportcatch($idmssupplier, $date, $month, $year);
        $totalCatch = 0;
        for ($i=0; $i < count($dataCatch) ; $i++) { 
            $totalCatch += $dataCatch[$i]->totalprice;
        }

        // pemasukan
        $dataSellFish = $delivertable->getreportdelivery($idmssupplier, $date, $month, $year);
        $totalSellFish = 0;
        for ($i=0; $i < count($dataSellFish) ; $i++) { 
            $totalSellFish += $dataSellFish[$i]->totalprice;
        }


        $dataLoanPay = $loantable->getreportpayloan($idmssupplier, $date, $month, $year);
        $totalLoanPay = 0;
        for ($i=0; $i < count($dataLoanPay) ; $i++) { 
            $totalLoanPay += $dataLoanPay[$i]->loaninrp;
        }

        $data = ['title' => "loanReport",
                'dataLoan' => $dataLoan,
                'dataLoanPay' => $dataLoanPay,
                'dataCatch' => $dataCatch,
                'dataSellFish' => $dataSellFish,
                'totalLoan' => $totalLoan,
                'totalCatch' => $totalCatch,
                'totalLoanPay' => $totalLoanPay,
                'totalSellFish' => $totalSellFish
                ];

        $pdf = PDF::loadView('reporttransactionprint', $data)->setPaper('a4', 'potrait');
        return $pdf->download('transactionreport'. substr($year, -2). substr("0".$month, -2). substr("0".$date, -2).'.pdf');
    }

    public function reportCsv(Request $request)
    {
        $idmssupplier = $request->sid;
        $date = $request->date;
        $month = $request->month;
        $year = $request->year;

        $loantable = new loantable();
        $buyfishtable = new buyfishtable();
        $suppliertable = new suppliertable();
        $delivertable = new delivertable();

        // pengeluaran
        $dataLoan = $loantable->getreportloan($idmssupplier, $date, $month, $year);
        $totalLoan = 0;
        for ($i=0; $i < count($dataLoan) ; $i++) { 
            $totalLoan += $dataLoan[$i]->loaninrp;
        }

        $dataCatch = $buyfishtable->getreportcatch($idmssupplier, $date, $month, $year);
        $totalCatch = 0;
        for ($i=0; $i < count($dataCatch) ; $i++) { 
            $totalCatch += $dataCatch[$i]->totalprice;
        }

        // pemasukan
        $dataSellFish = $delivertable->getreportdelivery($idmssupplier, $date, $month, $year);
        $totalSellFish = 0;
        for ($i=0; $i < count($dataSellFish) ; $i++) { 
            $totalSellFish += $dataSellFish[$i]->totalprice;
        }


        $dataLoanPay = $loantable->getreportpayloan($idmssupplier, $date, $month, $year);
        $totalLoanPay = 0;
        for ($i=0; $i < count($dataLoanPay) ; $i++) { 
            $totalLoanPay += $dataLoanPay[$i]->loaninrp;
        }

        $data = ['title' => "loanReport",
                'dataLoan' => $dataLoan,
                'dataLoanPay' => $dataLoanPay,
                'dataCatch' => $dataCatch,
                'dataSellFish' => $dataSellFish,
                'totalLoan' => $totalLoan,
                'totalCatch' => $totalCatch,
                'totalLoanPay' => $totalLoanPay,
                'totalSellFish' => $totalSellFish
                ];

        return $data;
    }

}
