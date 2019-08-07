@php
$activation_amount = 0;
 foreach($used_epins as $e)   {
    $activation_amount = $activation_amount + $e->EpinCategory->rate;
 }

 $transferred_amount = 0;
 foreach($transferred_epins as $e)   {
    $transferred_amount = $transferred_amount + $e->EpinCategory->rate;
 }

 $commission_amount = 0;
 foreach($commissions as $c)   {
    $commission_amount = $commission_amount + $c->amount;
 }

@endphp

@extends('layouts.app', ['titlePage' => __('Wallets')])
@section('content-body')
<h1>Wallets</h1><hr>

<ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#activation" role="tab" aria-controls="home">Activation Wallet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="profile">Transfer Wallet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#commission" role="tab" aria-controls="contact">Contribution Wallet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#withdrawal" role="tab" aria-controls="contact">Withdrawal Wallet</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="activation" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>INR {{$activation_amount}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Epin</th>
                            <th>Category</th>
                            <th>Rate</th>
                            <th>Remarks</th>
                            <th>Used</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i =1; @endphp
                        @foreach($used_epins as $e)
                            <tr>
                                <th>{{$i++}}.</th>
                                <td>{{$e->epin}}</td>
                                <td>{{$e->EpinCategory->name}}</td>
                                <td>{{$e->EpinCategory->rate}}</td>
                                <td>{{__('Sent By ')}}
                                    <strong>
                                        @if($e->sent_to == Auth::id())
                                            {{__('Admin')}}
                                        @else
                                            {{App\User::find(App\Transfer::where('epin_id',$e->id)->where('to',Auth::id())->first()->from)->details->username}}
                                        @endif
                                    </strong>
                                </td>
                                <td>
                                    <strong>{{Carbon\Carbon::parse($e->used_at)->diffForHumans()}}</strong> <br>({{$e->used_at}})
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show " id="transfer" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>INR {{$transferred_amount}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Epin</th>
                            <th>Category</th>
                            <th>Rate</th>
                            <th>Transferred To</th>
                            <th>Transferred</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i =1; @endphp
                        @foreach($transferred_epins as $e)
                            <tr>
                                <th>{{$i++}}.</th>
                                <td>{{$e->epin}}</td>
                                <td>{{$e->EpinCategory->name}}</td>
                                <td>{{$e->EpinCategory->rate}}</td>
                                <td>
                                    <strong>{{App\User::find(App\Transfer::where('epin_id',$e->id)->where('from',Auth::id())->first()->to)->details->username}}</strong>
                                </td>
                                <td>
                                    <strong>{{Carbon\Carbon::parse(App\Transfer::where('from',Auth::id())->where('epin_id',$e->id)->first()->created_at)->diffForHumans()}}</strong><br>
                                    ({{App\Transfer::where('from',Auth::id())->where('epin_id',$e->id)->first()->created_at}})
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="commission" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>INR {{$commission_amount}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Contribution By</th>
                            <th>Amount</th>
                            <th>Contributed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($commissions as $c)
                            <tr>
                                <th>{{$i++}}.</th>
                                <td>{{App\User::find($c->from)->details->username}}</td>
                                <td>{{$c->amount}}</td>
                                <td>
                                    <strong>{{Carbon\Carbon::parse($c->created_at)->diffForHumans()}}</strong><br>
                                    ({{$c->created_at}})
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade show" id="withdrawal" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>INR 0</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Withdrawal Amount</th>
                            <th>Withdrawal On</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
