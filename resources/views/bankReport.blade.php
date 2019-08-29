@extends('layouts.app', ['titlePage' => __('Bank Report')])
@section('content-body')
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
                    <th>Amount</th>
                    <th>Facilitation Charges</th>
                    <th>Request Date:</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\WithdrawRequest::all() as $b)
                    <tr>
                        @php
                            $bank_transfer = $b->user->bankTransfer;
                        @endphp
                        <th>{{$loop->index + 1}}</th>
                        <td>{{$b->user->username}} ({{$b->user->name}})</td>
                        <td>{{$bank_transfer->currency}}</td>
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