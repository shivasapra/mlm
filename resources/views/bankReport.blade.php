@extends('layouts.app', ['titlePage' => __('Bank Report')])
@section('content-body')
@php
    if(session('withdraw_requests') == null){
        $withdraw_requests = App\WithdrawRequest::all();
    }else{
        $withdraw_requests = session('withdraw_requests');
    }

@endphp
<h1>Bank Report</h1><hr>

<ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#bank_report" role="tab" aria-controls="home">Bank Report</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="#withdrawal_requests" role="tab" aria-controls="home">Withdrawal Requests</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="bank_report" role="tabpanel" aria-labelledby="home-tab">
        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>User</th>
                    <th>Currency</th>
                    <th>Account Type</th>
                    <th>Account Holder Name</th>
                    <th>Account No.</th>
                    <th>Bank Name</th>
                    <th>Bank Branch</th>
                    <th>IFSC Code</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\BankTransfer::all() as $b)
                    <tr>
                        <th>{{$loop->index + 1}}</th>
                        <td>{{$b->user->username}} ({{$b->user->name}})</td>
                        <td>{{$b->currency}}</td>
                        <td>{{$b->account_type}}</td>
                        <td>{{$b->account_holder_name}}</td>
                        <td>{{$b->account_no}}</td>
                        <td>{{$b->bank_name}}</td>
                        <td>{{$b->bank_branch}}</td>
                        <td>{{$b->IFSC_code}}</td>
                        <td>
                            @if($b->status)
                                {{__("Active")}}
                            @else
                                {{__("In-Active")}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="tab-pane fade show" id="withdrawal_requests" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
        <div class="col-md-12 text-right">
            <input type="date" class="from">
            <input type="date" class="to">
            <button class="btn btn-info btn-sm" onclick="dateRange(this)">Search</button>
        </div>
    </div><br>
        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>User</th>
                    <th>Account Type</th>
                    <th>Account Holder Name</th>
                    <th>Account No.</th>
                    <th>Bank Name</th>
                    <th>Bank Branch</th>
                    <th>IFSC Code</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Facilitation Charges</th>
                    <th>Request Date:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdraw_requests as $b)
                    <tr>
                        @php
                            $bank_transfer = $b->user->bankTransfer;
                        @endphp
                        <th>{{$loop->index + 1}}</th>
                        <td>{{$b->user->username}} ({{$b->user->name}})</td>
                        <td>{{$bank_transfer->account_type}}</td>
                        <td>{{$bank_transfer->account_holder_name}}</td>
                        <td>{{$bank_transfer->account_no}}</td>
                        <td>{{$bank_transfer->bank_name}}</td>
                        <td>{{$bank_transfer->bank_branch}}</td>
                        <td>{{$bank_transfer->IFSC_code}}</td>
                        <td>
                            @if($bank_transfer->status)
                                {{__("Active")}}
                            @else
                                {{__("In-Active")}}
                            @endif
                        </td>
                        <td>{{$b->amount}}</td>
                        <td>{{$b->facilitation_charges}}</td>
                        <td>{{$b->created_at->toDateString()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
@section('js')

<script>
    function nullify(){
        var Url = "https://galaxycrowd.com/app/galaxycrowd/public/nullify";
            var xhr = new XMLHttpRequest();
            xhr.open('GET', Url, true);
            xhr.send();
            xhr.onreadystatechange = processRequest;
            function processRequest(e) {
            }
    }


    function dateRange(temp){
        var from = $(temp).parents('.text-right').find('.from').val();
        var to = $(temp).parents('.text-right').find('.to').val();

        var Url = "https://galaxycrowd.com/app/galaxycrowd/public/dateRange/"+from+"/"+to;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', Url, true);
            xhr.send();
            xhr.onreadystatechange = processRequest;
            function processRequest(e) {
                var response1 = JSON.parse(xhr.responseText);
                if(response1){
                    window.location.reload(true);
                }
            }
    }
</script>
<script>
    window.onload = function(){
        nullify();
    }
</script>

@endsection
