@extends('layouts.app', ['titlePage' => __('Epin Requests')])
@section('content-body')
<h1>Epin Requests</h1><hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach(Auth::user()->EpinRequests as $r)
                <tr>
                    <th>{{$i++}}.</th>
                    <td>{{$r->user->details->username}}</td>
                    <td>{{$r->amount}}</td>
                    <td>
                        @if($r->status)
                            <strong><span class="text-success">Assigned</span></strong>
                        @else
                            <strong><span class="text-danger">Pending</span></strong>
                        @endif
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection