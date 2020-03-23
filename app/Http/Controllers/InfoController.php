<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\lib\usertable;
use View;
use Auth;
use App;

class InfoController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $table = new usertable();
        $data = $table->getmsinfo("supportinfo");

        return View::make('infotable')
                ->with("title", "infotable")
                ->with("authlv", $authlv)
                ->with("data", $data);
    }

    public function post(Request $request)
    {
        $supportinfoparam = htmlentities($request->supportinfoparam);
        $infodescparam = $request->infodescparam;

        $table = new usertable();
        $data = $table->updatemsinfo($supportinfoparam, $infodescparam);

        return redirect()->guest('/info');
    }
}
