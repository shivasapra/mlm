@php
use App\Settings;
$activation_amount = 0;
 foreach($used_epins as $e)   {
     if($e->used_by == Auth::id()){
         $activation_amount = $activation_amount + $e->EpinCategory->rate;
     }
 }

 $transferred_amount = 0;
 foreach($transferred_epins as $e)   {
    $transferred_amount = $transferred_amount + $e->EpinCategory->rate;
 }

 $purchase_amount = 0;
 foreach(App\purchaseEpin::where('user_id',Auth::id())->get() as $e)   {
    $purchase_amount = $purchase_amount + $e->epin->EpinCategory->rate;
 }

 $request_amount = 0;
 foreach(App\WithdrawRequest::where('user_id',Auth::id())->get() as $r)   {
    $request_amount = $request_amount + $r->amount;
 }

 $commission_amount = 0;
 foreach($commissions as $c)   {
    $commission_amount = $commission_amount + $c->amount;
 }
 $commission_amount = $commission_amount - $purchase_amount -$request_amount;

@endphp

@extends('layouts.app', ['titlePage' => __('Wallets')])
@section('content-body')
<h1>Wallets</h1><hr>

<ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link  active " id="contact-tab" data-toggle="tab" href="#commission" role="tab" aria-controls="contact">Contribution Wallet</a>
    </li>
        <li class="nav-item">
            <a class="nav-link " id="home-tab" data-toggle="tab" href="#activation" role="tab" aria-controls="home">Activation Wallet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="profile">Epin Transfer Wallet</a>
        </li>
</ul>

<div class="tab-content" id="myTabContent">
    @if(!Auth::user()->admin)
        <div class="tab-pane fade show " id="activation" role="tabpanel" aria-labelledby="home-tab">
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
                    <table class="table table-bordered datatable">
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
                            @if($e->used_by == Auth::id())
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
                                                {{App\User::find(App\Transfer::where('epin_id',$e->id)->where('to',Auth::id())->first()->from)->details->username}} ({{App\User::find(App\Transfer::where('epin_id',$e->id)->where('to',Auth::id())->first()->from)->name}})
                                            @endif
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>{{Carbon\Carbon::parse($e->used_at)->diffForHumans()}}</strong> <br>({{$e->used_at}})
                                    </td>
                                </tr>
                            @endif
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
                    <table class="table table-bordered datatable">
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
                                        <strong>{{App\User::find(App\Transfer::where('epin_id',$e->id)->where('from',Auth::id())->first()->to)->username}} ({{App\User::find(App\Transfer::where('epin_id',$e->id)->where('from',Auth::id())->first()->to)->name}})</strong>
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
    @endif

    <div class="tab-pane fade  show active " id="commission" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>INR {{$commission_amount}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-info" type="button" id="buyPin" onclick="buyPin();">Buy Pin</button>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->bankTransfer != null)
                            <form action="{{route('withdraw')}}" method="post">
                                @csrf
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" placeholder="Enter Amount To Withdraw..." onkeyup="calculateFacilitaion(this);" max="{{$commission_amount}}" class="form-control"><br>
                                <label for="facilitation_charges">Facilitation Charges:</label>
                                <input type="text" readonly name="facilitation_charges" class="form-control" id="facilitation"><br>
                                <div class="text-right">
                                    <button class="btn btn-sm btn-info" type="submit" id="withdraw">Withdraw</button>
                                </div>
                            </form>
                        @else
                            <p> <b>Please Fill Your Bank Details in Account Settings To Withdraw.</b></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Contribution By</th>
                            <th>Amount</th>
                            <th>Level</th>
                            <th>Contributed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($commissions as $c)
                            <tr>
                                <th>{{$i++}}.</th>
                                <td>{{App\User::find($c->from)->details->username}} ({{App\User::find($c->from)->name}})</td>
                                <td>{{$c->amount}}</td>
                                <td>{{App\User::find($c->from)->coordinates->row - Auth::user()->coordinates->row + 1}}</td>
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

    {{-- <div class="tab-pane fade show" id="withdrawal" role="tabpanel" aria-labelledby="home-tab">
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
    </div> --}}
</div>
@stop

@section('js')
<script>
    function calculateFacilitaion(temp){
        var amount = temp.value;
        var fac = {{Settings::first()->facilitation_percentage}}
        $('#facilitation').val((fac/100)*amount);
    }
    function withdraw(){

        var fac = {{Settings::first()->facilitation_percentage}}
        swal({
            title: 'Withdraw Amount',
            content: {
            element: "input",
            attributes: {
            placeholder: "Enter Amount To Withdraw",
            type: "number",
            },
        },
            icon:'info',
        })
        .then(amount => {
            if (!amount) throw null;

            swal({
                title: "Withdraw",
                text: `Amount: ${amount}\n Facilitation Charges: `+(fac/100)*amount,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Withdrawal Successfull", {
                icon: "success",
                });
            } else {
                swal("Withdrawal Process Cancelled ",{
                    icon: "error",
                });
            }
            });
        });
    }

    function buyPin(){
       @if(App\Epin::where('sent_to',Auth::id())->where('used_by',Auth::id())->count())
        @php
            $ep =  floor($commission_amount / App\Epin::where('sent_to',Auth::id())->where('used_by',Auth::id())->first()->EpinCategory->rate );

        @endphp
        swal({
            title: "Buy Epins",
            text: `Enter Number Of Epins To Buy\n You can Buy Max `+ {{$ep}} +` epins`,
            content: "input",
                buttons:{
                cancel: true,
                confirm: true,
            },
        })
        .then(amount => {
            if ((amount > {{$ep}})){
                swal("Process Cancelled ",{
                    title: `You Can't Buy ${amount} Epins. You Don't Have Sufficient Funds`,
                    icon: "error",
                });
            }
            else if((amount == 0)){
                swal("Process Cancelled ",{
                    title: `Invalid`,
                    icon: "error",
                });
            }
            else{
                return fetch(`https://galaxycrowd.com/app/galaxycrowd/public/buy?amount=${amount}`);
            }
        })
        .then(results => {
            return results.json();
        })
        .then(amount => {
            if(!amount){
                swal({
                    title: "Process Cancelled!!",
                    icon: "error",
                })
            }else{

                swal({
                    title: "Purchased!!",
                    icon: "success",
                })
                location.reload();
            }
        })
       @endif
    }
</script>
@stop
