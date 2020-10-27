<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
    
    return view('welcome');
});

Route::get('/regis', 'WelcomeController@indexRegister');
Route::post('/regis/do', 'WelcomeController@register');

Route::get('/index', 'HomeController@index');
Route::get('/officer', 'OfficerController@index');
Route::post('/officer/regis', 'OfficerController@regis');
Route::get('/officer/del/{idobj}', 'OfficerController@delete');
Route::post('/officer/edit', 'OfficerController@edit');
Route::get('/officer/logout', 'OfficerController@logout');

Route::get('/supplier', 'SupplierController@index');
Route::post('/supplier/regis', 'SupplierController@regisSupplier');
Route::post('/supplier/edit', 'SupplierController@editSupplier');
Route::get('/supplier/del/{idobj}', 'SupplierController@delete');
Route::get('/supplier/indexedit', 'SupplierController@indexSupplierEdit');

Route::get('/supplier/accept', 'SupplierController@indexsupplieraccept');
Route::get('/supplier/accept/acc/{idobj}', 'SupplierController@supplieraccept');
Route::get('/supplier/accept/rej/{idobj}', 'SupplierController@supplierreject');


Route::get('/supplier/officer', 'SupplierController@indexsupplierofficer');
Route::post('/supplier/officer/regis', 'SupplierController@regisSupplierOfficer');
Route::post('/supplier/officer/edit', 'SupplierController@editSupplierofficer');
Route::get('/supplier/officer/del/{idobj}', 'SupplierController@deletesupplierofficer');

Route::get('/ship/report', 'ShipController@index');
Route::get('/fisherman/report', 'FishermanController@index');

Route::get('/fish/report', 'FishController@index');
Route::post('/fish/regis', 'FishController@regis');
Route::post('/fish/edit', 'FishController@edit');
Route::get('/fish/del/{idobj}', 'FishController@delete');

Route::get('/fish/master', 'FishController@indexmaster');
Route::post('/fish/master/regis', 'FishController@regismaster');
Route::post('/fish/master/edit', 'FishController@updatemaster');
Route::get('/fish/master/del/{idobj}', 'FishController@delete');


Route::get('/loan/report', 'LoanController@index');
Route::post('/loan/report/print', 'LoanController@reportPrint');
Route::get('/loan/supplier/report', 'LoanController@indexSupplier');

Route::get('/fishcatch/report', 'FishCatchController@index');
Route::post('/fishcatch/report/print', 'FishCatchController@reportPrint');
Route::get('/fishcatch/report/csv', 'FishCatchController@reportCsv');

Route::get('/transaction/report', 'ReportTransactionController@index');
Route::post('/transaction/report/print', 'ReportTransactionController@reportPrint');
Route::get('/transaction/report/csv', 'ReportTransactionController@reportCsv');

Route::get('/fish/getkde', 'FishController@indexkdefish');
Route::get('/fish/getkdedata', 'FishController@indexkdedata');

Route::post('/user/resetpass', 'OfficerController@resetpass');

Route::get('/info', 'InfoController@index');
Route::post('/info/post', 'InfoController@post');

Route::get('/report/log', 'SyncController@index');

Route::get('/investreport/dailytransaction', 'InvestReportController@index');
Route::get('/investreport/csv', 'InvestReportController@reportCsv');

/* api */
Route::get('/testapi', 'ApiController@index');
Route::post('/_api/sup/login', 'ApiController@loginsupplier');
Route::post('/_api/sup/regis', 'ApiController@regisSupplier');
Route::post('/_api/sup/regis2', 'ApiController@regisSupplier2');
Route::post('/_api/sup/resetpass', 'ApiController@resetpass');


Route::get('/_api/fisherman/get', 'ApiController@getfishermanbyidmsuser');
Route::get('/_api/ship/get', 'ApiController@getshipbyidmsuser');
Route::get('/_api/fish/get', 'ApiController@getfishbyidmsuser');
Route::get('/_api/buyer/get', 'ApiController@getbuyerlistbyidmsuser');

Route::get('/_api/fish/getv2', 'ApiController@getfishbyidmsuserv2');
Route::get('/_api/ship/getv2', 'ApiController@getshipbyidmsuserv2');
Route::get('/_api/fisherman/getv2', 'ApiController@getfishermanbyidmsuserv2');
Route::get('/_api/buyer/getv2', 'ApiController@getbuyerlistbyidmsuserv2');

Route::post('/_api/img/upload', 'ApiController@uploadimage');

Route::post('/_api/syncdata', 'ApiController@syncdata');
Route::post('/_api/syncdatav2', 'ApiController@syncdatav2');
//Route::get('/_api/syncdataget', 'ApiController@syncdataget');
Route::get('/_api/syncdataget', 'ApiController@syncdatagetBuyFish');


Route::get('/_api/loan/get', 'ApiController@getloanlistbyidmssupplier');
Route::get('/_api/loan/getv2', 'ApiController@getloanlistbyidmssupplierv2');

Route::get('/_api/payloan/get', 'ApiController@getpayloanlistbyidmssupplier');
Route::get('/_api/paynloan/get', 'ApiController@getloanernloanbyidmssupplier');

Route::get('/_api/sail/get', 'ApiController@getsailbymssupplier');
Route::get('/_api/catch/getbymonth', 'ApiController@getcatch');
Route::get('/_api/catch/getv2bymonth', 'ApiController@getcatchv2');
Route::get('/_api/catch/getbysup', 'ApiController@getcatchbyidmssupplier');
Route::get('/_api/catch/getv2bysup', 'ApiController@getcatchbyidmssupplierv2');
Route::get('/_api/catch/getv3bysup', 'ApiController@getcatchbyidmssupplierv3');
Route::get('/_api/catch/getv5bysup', 'ApiController@getcatchbyidmssupplierv5');
Route::get('/_api/catch/getv6bysup', 'ApiController@getcatchbyidmssupplierv6');
Route::get('/_api/catch/getbymonthyear', 'ApiController@getcatchbymonthyear');

Route::get('/_api/delivery/getbysup', 'ApiController@getdeliverybyidmssupplier');
Route::get('/_api/delivery/getbysupv3', 'ApiController@getdeliverybyidmssupplierv3');

Route::get('/_api/delivery/getsheet', 'ApiController@getdeliverysheet');
Route::get('/_api/delivery/getsheetv2', 'ApiController@getdeliverysheetbyidmssupplier');
Route::get('/_api/delivery/getsheetv6', 'ApiController@getdeliverysheetbyidmssupplierv6');
Route::get('/_api/delivery/getsheetbymonthyear', 'ApiController@getdeliverysheetbymonthyear');

Route::get('/_api/qrcodeLogin/', 'ApiController@qrcodeLoginfromapps');
Route::get('/_api/tryqrcodeLogin/', 'ApiController@trymanualLogin');

Route::get('/_api/logincode/{idobj}', 'ApiController@addloginsuserqrcode');

Route::get('/_api/dsheet', 'ApiController@getdeliverysheetbyiddelivery');
Route::get('/_api/dsheetcode/{idobj}', 'ApiController@getdeliverysheetbyiddeliverysheetno');
Route::get('/_api/fishid', 'ApiController@createFishID');

Route::get('/_api/getinfo', 'ApiController@getmsinfo');
Route::get('/_api/user/getdata', 'ApiController@getprofilesupplierbyidmsuser');

Route::get('/_api/itemloan/getdata', 'ApiController@gettypeitemloan');

Route::post('/_api/test/migratedelivery', 'ApiController@migrateDelivery');

Route::get('/_api/test/', 'InvestController@index');
Route::post('/_api/invest/takeloan/upsert/', 'InvestController@UpsertTakeLoan');
Route::get('/_api/invest/takeloan/getlist/', 'InvestController@GetListTakeLoan');

Route::post('/_api/invest/payloan/upsert/', 'InvestController@UpsertPayLoan');
Route::get('/_api/invest/payloan/getlist/', 'InvestController@GetListPayLoan');

Route::post('/_api/invest/givecredit/upsert/', 'InvestController@UpsertGiveCredit');
Route::get('/_api/invest/givecredit/getlist/', 'InvestController@GetListGiveCredit');

Route::post('/_api/invest/creditpayment/upsert/', 'InvestController@UpsertCreditPayment');
Route::get('/_api/invest/creditpayment/getlist/', 'InvestController@GetListCreditPayment');

Route::post('/_api/invest/customexpense/upsert/', 'InvestController@UpsertCustomExpense');
Route::get('/_api/invest/customexpense/getlist/', 'InvestController@GetListCustomExpense');

Route::post('/_api/invest/customincome/upsert/', 'InvestController@UpsertCustomIncome');
Route::get('/_api/invest/customincome/getlist/', 'InvestController@GetListCustomIncome');

Route::post('/_api/invest/customtype/upsert/', 'InvestController@UpsertCustomType');
Route::get('/_api/invest/customtype/getlist/', 'InvestController@GetListCustomType');

Route::post('/_api/invest/buyfish/upsert/', 'InvestCatchController@UpsertBuyFish');
Route::get('/_api/invest/buyfish/getlist/', 'InvestCatchController@GetListBuyFish');
Route::post('/_api/invest/splitfish/upsert/', 'InvestCatchController@UpsertSplitFish');
Route::get('/_api/invest/splitfish/getlist/', 'InvestCatchController@GetListSplitFish');
Route::post('/_api/invest/simplesellfish/upsert/', 'InvestCatchController@UpsertSimpleSellFish');
Route::get('/_api/invest/simplesellfish/getlist/', 'InvestCatchController@GetListSimpleSellFish');

Route::get('/msc_api/catch/', 'DirectApiController@GetCatchByPurchaseDate');
Route::post('/msc_api/catch/', 'DirectApiController@CreateCatch');
Route::post('/msc_api/fishcatch/', 'DirectApiController@AddFishCatch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');