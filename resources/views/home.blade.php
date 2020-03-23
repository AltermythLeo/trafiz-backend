@extends('layouts.admin')

@section('content')
<section class="content-header">
    <h1>
        {{ __('menu.dashboard') }}
        <small>{{ __('menu.control panel') }}</small>
        </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ __('menu.dashboard') }}</li>
    </ol>
</section>

<section class="content">
    <div class="row">
    @if($authlv < 0)
        <div class="col-lg-3 col-xs-6">
            <a class="small-box bg-aqua" href="{{URL::to('/supplier/accept')}}">
                <div class="inner">
                    <h3>{{$data->countsupplier}}</h3>
                    <p>Ready to Accept Supplier</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus"></i>
                </div>
            </a>
        </div>
    @endif
        <div class="col-lg-3 col-xs-6">
            <a class="small-box bg-yellow" href="{{URL::to('/fishcatch/report?id='.$id.'&d='.$day.'&m='.$month.'&y='.$year)}}">
                <div class="inner">
                    <h3>{{$data->countcatch}}</h3>
                    <p>Fish Catch this Month</p>
                </div>
                <div class="icon">
                    <i class="fa fa-pied-piper-alt"></i>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-xs-6">
            <a class="small-box bg-green" href="{{URL::to('/loan/report?id='.$id.'&d='.$day.'&m='.$month.'&y='.$year)}}">
                <div class="inner">
                    <h3>{{$data->countloan}}</h3>
                    <p>Loan this Month</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-xs-6">
            <a class="small-box bg-red" href="{{URL::to('/transaction/report?id='.$id.'&d='.$day.'&m='.$month.'&y='.$year)}}">
                <div class="inner">
                    <h3>{{$data->counttransaction}}</h3>
                    <p>Transaction this Month</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart""></i>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection\