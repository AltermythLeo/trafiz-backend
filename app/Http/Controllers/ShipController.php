<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\shiptable;
use App\lib\Helper;
use App;

class ShipController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $table = new shiptable();
        $data = $table->getallship();
        return View::make('shipreport')
                ->with("title", "shipReport")
                ->with("authlv", $authlv)
                ->with("data", $data);
    }
}
