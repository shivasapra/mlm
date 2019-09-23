@extends('layouts.app', ['titlePage' => __('users')])
@section('content-body')
<h1>Level {{$row}} Users</h1><hr>

<table class="table table-bordered datatable" id="active">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Username</th>
            <th>Name</th>
            <th>Invited By</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Security Pin</th>
            <th>Current Package</th>
            <th>Upgrade Wallet Amount</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1;  @endphp
        @foreach($users as $user)
            <tr>
                <th>{{$i++}}.</th>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>@if($user->details){{$user->details->invited_by}} ({{ App\User::where('username',$user->details->invited_by)->first()->name}})@endif</td>
                <td>{{$user->email}}</td>
                <td>@if($user->details) {{$user->details->mobile}} @endif</td>
                <td>@if($user->details){{$user->details->security_pin}}@endif</td>
                <th>{{$user->donations->last()->package}}</th>
                <td>{{$user->UpgradeWallet->pluck('amount')->sum() - $user->donations->pluck('amount')->sum() + $user->donations->where('package','BASIC')->first()->amount}}</td>
                <th>{{$user->created_at->toDateString()}}</th>
                <th>{{$user->created_at->toTimeString()}}</th>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
