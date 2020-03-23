<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    	'/_api/sup/login',
        '/_api/sup/regis',
        '/_api/sup/resetpass',
        
        '/_api/img/upload',
        '/_api/syncdata',
        '/_api/syncdatav2',

        '/_api/invest/takeloan/upsert',
        '/_api/invest/payloan/upsert',
        '/_api/invest/givecredit/upsert',
        '/_api/invest/creditpayment/upsert',
        '/_api/invest/customexpense/upsert',
        '/_api/invest/customincome/upsert',
        '/_api/invest/customtype/upsert',

        '/_api/invest/takeloan/getlist',
        '/_api/invest/payloan/getlist',
        '/_api/invest/givecredit/getlist',
        '/_api/invest/creditpayment/getlist',
        '/_api/invest/customexpense/getlist',
        '/_api/invest/customincome/getlist',
        '/_api/invest/customtype/getlist',

        '/_api/invest/buyfish/upsert',
        '/_api/invest/buyfish/getlist',
        '/_api/invest/splitfish/upsert',
        '/_api/invest/splitfish/getlist',
        '/_api/invest/simplesellfish/upsert',
        '/_api/invest/simplesellfish/getlist',

        '/msc_api/catch/',
        '/msc_api/fishcatch/',

    ];
}
