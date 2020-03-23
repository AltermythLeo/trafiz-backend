<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use View;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\lib\fishtable;
use App\lib\suppliertable;
use App\lib\Helper;
use App;

class FishController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $table = new fishtable();
        $data = $table->getallfish();
        $fishdata = $table->getltfish();

        if($authlv == 1)
        {
            $sid = $request->session()->get('sid');
            $obj = "[{
                \"idmssupplier\": \"".$sid."\",
                \"name\": \"".Auth::user()->name."\"
            }]";
            $objTest = json_decode($obj);
            $supplierdata = $objTest;
        }
        else if($authlv < 1)
        {
            $suppliertable = new suppliertable();
            $supplierdata = $suppliertable->getsupplier();
        }
        return View::make('fishreport')
                ->with("title", "fishreport")
                ->with("authlv", $authlv)
                ->with("data", $data)
                ->with("fishdata", $fishdata)
                ->with("supplierdata", $supplierdata);
    }

    public function regis(Request $request)
    {
        $idltfishparam = htmlentities($request->fishid);
        $indnameparam = htmlentities($request->indname);
        $localnameparam = htmlentities($request->localname);
        $priceparam = htmlentities($request->price);
        $idmssupplierparam = htmlentities($request->supplier);

        $fileuploadparam = $request->photoparam;
        $imageName = Helper::uploadimage($request, $fileuploadparam);

        $table = new fishtable();
        $returnValue = $table->addnewfish((microtime(true) * 10000), $idltfishparam, $indnameparam, $localnameparam, $imageName, $idmssupplierparam, $priceparam);
        return redirect()->guest('/fish/report');
    }

    public function delete($idobj)
    {
        $id = htmlentities($idobj);
        $table = new fishtable();
        $data = $table->deletefish($id);
        return redirect()->guest('/fish/report');
    }

    public function edit(Request $request)
    {
        $idfishofflineparam = htmlentities($request->objIDEdit);
        $idltfishparam = htmlentities($request->fishidedit);
        $indnameparam = htmlentities($request->indnameedit);
        $localnameparam = htmlentities($request->localnameedit);
        $priceparam = htmlentities($request->priceedit);
        $idmssupplierparam = htmlentities($request->supplieredit);

        $fileuploadparam = $request->photoparamedit;
        $imageName = null;

        $photonameedit = $request->photonameedit;

        if($fileuploadparam != null)
        {
            Helper::deleteImage($photonameedit);
            $imageName = Helper::uploadimage($request, $fileuploadparam);
        }

        $table = new fishtable();
        $returnValue = $table->updatefish($idfishofflineparam, $idltfishparam, $indnameparam, $localnameparam, $imageName, $idmssupplierparam, $priceparam);
        return redirect()->guest('/fish/report');
    }

    public function indexmaster(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $table = new fishtable();
        $data = $table->getltfish();

        return View::make('fishmaster')
                ->with("title", "fishmaster")
                ->with("authlv", $authlv)
                ->with("data", $data);
    }

    public function regismaster(Request $request)
    {
        $isscaap_param = htmlentities($request->iscaap);
        $taxocode_param = htmlentities($request->taxocode);
        $threea_code_param = htmlentities($request->threea_code);
        $scientific_name_param = htmlentities($request->scientific_name);
        $english_name_param = htmlentities($request->english_name);
        $french_name_param = htmlentities($request->french_name);
        $spanish_name_param = htmlentities($request->spanish_name);
        $author_param = htmlentities($request->author_name);
        $family_param = htmlentities($request->family);
        $bio_order_param = htmlentities($request->bio_order);
        $stats_data_param = htmlentities($request->stats_data);

        $table = new fishtable();
        $returnValue = $table->addnewltfish($isscaap_param, $taxocode_param, $threea_code_param, $scientific_name_param, $english_name_param, $french_name_param, $spanish_name_param, $author_param, $family_param, $bio_order_param, $stats_data_param);
        return redirect()->guest('/fish/master');
    }

    public function updatemaster(Request $request)
    {
        $idltfishparam = htmlentities($request->objIDEdit);
        $isscaap_param = htmlentities($request->iscaapedit);
        $taxocode_param = htmlentities($request->taxocodeedit);
        $threea_code_param = htmlentities($request->threea_codeedit);
        $scientific_name_param = htmlentities($request->scientific_nameedit);
        $english_name_param = htmlentities($request->english_nameedit);
        $french_name_param = htmlentities($request->french_nameedit);
        $spanish_name_param = htmlentities($request->spanish_nameedit);
        $author_param = htmlentities($request->author_nameedit);
        $family_param = htmlentities($request->familyedit);
        $bio_order_param = htmlentities($request->bio_orderedit);
        $stats_data_param = htmlentities($request->stats_dataedit);

        $table = new fishtable();
        $returnValue = $table->updateltfish($idltfishparam, $isscaap_param, $taxocode_param, $threea_code_param, $scientific_name_param, $english_name_param, $french_name_param, $spanish_name_param, $author_param, $family_param, $bio_order_param, $stats_data_param);
        return redirect()->guest('/fish/master');
    }

    public function deletemaster($idobj)
    {
        $id = htmlentities($idobj);
        $table = new fishtable();
        $data = $table->deleteltfish($id);
        return redirect()->guest('/fish/master');
    }

    public function indexkdefish(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $id = !isset($_GET['id']) ? "" : $_GET['id'];
        $returnValue = "";
        //$data = [];
        if($id != "")
        {
            $table = new fishtable();
            //$data = $table->getkdedetailfromidfish($id)[0];
            $data = $table->getkdedetailfromiddeliverysheet($id);
            
            if($data)
            {
                $string1 =  $data[0]->deliverysheetno.";".
                            $data[0]->nationalregistrationsuppliercode.";".
                            $data[0]->deliverydate.";";

                $vesselname = "";
                $string2 = "";
                for ($i=0; $i < count($data); $i++)
                {
                    if($vesselname != $data[$i]->vesselname)
                    {

                        $string2 .= $vesselname == "" ? "" : "<br/><br/>";
                        $vesselname = $data[$i]->vesselname;
                        $string2 .= 
                        $string1."#".
                        $data[$i]->vesselname.";".
                        $data[$i]->vesselsize.";".
                        $data[$i]->vesselregistrationno.";".
                        $data[$i]->vesselflag.";".
                        $data[$i]->fishingground.";".
                        $data[$i]->geartype.";".
                        $data[$i]->landingsite.";".
                        $data[$i]->landingdate.";".
                        $data[$i]->fishermanname."<br/>";
                    }
                    $string2 .= "#".
                        $data[$i]->idfish.";".
                        $data[$i]->species.";".
                        $data[$i]->grade.";".
                        $data[$i]->unitname.";".
                        $data[$i]->amount;
                }
                $returnValue = $string2;
            }
        }

        return View::make('fishkdedetail')
                ->with("title", "fishkde")
                ->with("authlv", $authlv)
                ->with("data", $returnValue);
    }

    public function indexkdedata(Request $request)
    {
        $authlv = $request->session()->get('admintype');
        App::setlocale($request->session()->get('lang'));

        $idfish = !isset($_GET['idfish']) ? "" : $_GET['idfish'];
        $returnValue = array();
        
        if($idfish != "")
        {
            $table = new fishtable();
            //$data = $table->getkdedetailfromidfish($id)[0];
            $data = $table->getkdedata($idfish);
            if(count($data) > 0) {
              $row = $data[0];
              $returnValue = $data;
              // foreach ($row as $key => $value) {
              //   $object = new \stdClass();
              //   $object->label = $key;
              //   $object->value = $value;
              //   array_push($returnValue,$object);
              // }
            }
        }

        return View::make('fishkdedata')
                ->with("title", "fishkdedata")
                ->with("authlv", $authlv)
                ->with("data", $returnValue);
    }

}

/*
<!--
@if($data != [])
<table id="example1" class="table table-bordered table-striped">
    <tbody>
        <tr>
            <td style="width:50%;">
                <img src="{{ ($data -> photo == null || $data -> photo == '') ?
                    URL::to('/img/logoSquare.png') : URL::to('/imgupload/'. $data -> photo)}}"
                    style="width:100%;"
                    onerror="this.src='{{URL::to('/img/logoSquare.png')}}'">
            </td>
            <td style="width:50%;">
                ID Fish : {{$data->idfish}}<br/>
                Delivery Sheet No : {{$data->idtrdeliverysheetno}}<br/>
                Supplier ID : {{$data->supplierid}}<br/>
                Sciencetific Name : {{$data->scientific_name}}<br/>
                Three A Code : {{$data->threea_code}}<br/>
                Amount : {{$data->amount}}<br/>
                Grade : {{$data->grade}}<br/>
                Vessel Name : {{$data->vesselname_param}}<br/>
                vessel Size : {{$data->vesselsize_param}}<br/>
                Vessel License Number : {{$data->vessellicensenumber_param}}<br/>
                Vessel License Expire Date : {{$data->vessellicenseexpiredate_param}}<br/>
                Vessel Flag : {{$data->vesselflag_param}}<br/>
                fishing Ground Area : {{$data->fishinggroundarea}}<br/>
                Port Name : {{$data->portname}}<br/>
                Gear Type : {{$data->vesselgeartype_param}}<br/>
                Purchase Date : {{$data->purchasedate}}
            </td>
        </tr>
    </tbody>
</table>
@endif-->
*/