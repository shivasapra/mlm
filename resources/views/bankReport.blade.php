@extends('layouts.app', ['titlePage' => __('Bank Report')])
@section('content-body')
<h1>Bank Report</h1><hr>
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
@endsection