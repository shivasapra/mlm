@extends('layouts.app', ['titlePage' => __('Wallets')])
@section('content-body')
    <h1>Wallets</h1><hr>
    <ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#administration_charges" role="tab" aria-controls="home">Administration Charges Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#facilitation" role="tab" aria-controls="profile">Facilitation Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contribution" role="tab" aria-controls="contact">Contribution Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#epin" role="tab" aria-controls="contact">Epin Wallet</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="administration_charges" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR  {{App\Commision::where('user_id',Auth::id())->where('ac',1)->pluck('amount')->sum()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Username</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Commision::where('user_id',Auth::id())->where('ac',1)->get() as $c)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{App\User::find($c->from)->username}}</td>
                            <td>{{$c->amount}}</td>
                            <td><strong>{{Carbon\Carbon::parse($c->created_at)->diffForHumans()}}</strong> <br>({{$c->created_at}})</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade show" id="facilitation" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="tab-pane fade show" id="contribution" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR {{App\Commision::where('user_id',Auth::id())->where('ac',0)->pluck('amount')->sum()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Username</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Commision::where('user_id',Auth::id())->where('ac',0)->get() as $c)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{App\User::find($c->from)->username}}</td>
                            <td>{{$c->amount}}</td>
                            <td><strong>{{Carbon\Carbon::parse($c->created_at)->diffForHumans()}}</strong> <br>({{$c->created_at}})</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade show" id="epin" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>INR {{App\purchaseEpin::pluck('rate')->sum()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Username</th>
                        <th>Epin</th>
                        <th>Amount</th>
                        <td>Time</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\purchaseEpin::all() as $p)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{App\User::find($p->user_id)->username}}</td>
                            <td>{{$p->epin->epin}}</td>
                            <td>{{$p->epin->EpinCategory->rate}}</td>
                            <td><strong>{{Carbon\Carbon::parse($p->created_at)->diffForHumans()}}</strong> <br>({{$p->created_at}})</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection