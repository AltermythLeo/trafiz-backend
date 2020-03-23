<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\fishermantable;
use App\lib\Helper;
use App;

class FishermanController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $table = new fishermantable();
        $data = $table->getallfisherman();
        return View::make('fishermanreport')
                ->with("title", "fishermanreport")
                ->with("authlv", $authlv)
                ->with("data", $data);
    }
}
