<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\lib\Helper;
use App\lib\usertable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));
        $sid = $request->session()->get('sid');

        $table = new usertable();
        $data = $table->getdashboarddata($authlv == -1 ? null : $sid)[0];

        $id = $authlv == -1 ? -1 : $sid;
        $day = -1;
        $month = date("m");
        $year = date("Y");

        return view('home')
                ->with("title", "home")
                ->with("authlv", $authlv)
                ->with("id", $id)
                ->with("data", $data)
                ->with("day", $day)
                ->with("month", $month)
                ->with("year", $year);
    }
}
