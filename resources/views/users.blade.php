@extends('layouts.app', ['titlePage' => __('users')])
@php

    use App\User;

    if(session('active_users') == null){
        $active_users = collect();
        foreach($users as $user){
            if($user->coordinates and !$user->campaign){
                $active_users->push($user);
            }
        }
    }else{
        $active_users = session('active_users');
    }


    if(session('inactive_users') == null){
        $inactive_users = collect();
        foreach($users as $user){
            if(!$user->coordinates and !$user->campaign){
                $inactive_users->push($user);
            }
        }
    }else{
        $inactive_users = session('inactive_users');
    }

    if(session('campaign_users') == null){
        $campaign_users = collect();
        foreach($users as $user){
            if($user->campaign){
                $campaign_users->push($user);
            }
        }
    }else{
        $campaign_users = session('campaign_users');
    }

@endphp
@if(Auth::user()->admin)
    @section('content-body')

            <h1>Users</h1><hr>
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="date" class="from">
                    <input type="date" class="to">
                    <button class="btn btn-info btn-sm" onclick="dateRange(this)">Search</button>
                </div>
            </div><br>
            <ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#active_users" role="tab" aria-controls="profile">Active Users </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#inactive_users" role="tab" aria-controls="home">Inactive Users  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#campaign_users" role="tab" aria-controls="home">Campaign Users </a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="active_users" role="tabpanel" aria-labelledby="home-tab">
                    <div class="text-right">
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
                                    <th>Action</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;  @endphp
                                @foreach($active_users as $user)
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
                                        <td><a href="{{route('account.settings',$user)}}" class="btn btn-sm btn-info">Edit Profile</a></td>
                                        <th>{{$user->created_at->toDateString()}}</th>
                                        <th>{{$user->created_at->toTimeString()}}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="inactive_users" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Invited By</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Security Pin</th>
                                    <th>Action</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($inactive_users as $user)
                                    <tr>
                                        <th>{{$i++}}.</th>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->details->invited_by}} ({{ App\User::where('username',$user->details->invited_by)->first()->name}})</td>
                                        <td>{{$user->email}}</td>
                                        <td>@if($user->details) {{$user->details->mobile}} @endif</td>
                                        <td>@if($user->details) {{$user->details->security_pin}} @endif</td>
                                        <td><a href="{{route('account.settings',$user)}}" class="btn btn-sm btn-info">Edit Profile</a></td>
                                        <th>{{$user->created_at->toDateString()}}</th>
                                        <th>{{$user->created_at->toTimeString()}}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show" id="campaign_users" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Security Pin</th>
                                    <th>Action</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($campaign_users as $user)
                                    <tr>
                                        <th>{{$i++}}.</th>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>@if($user->details) {{$user->details->mobile}}  @endif</td>
                                        <td>@if($user->details) {{$user->details->security_pin}} @endif</td>
                                        <td><a href="{{route('account.settings',$user)}}" class="btn btn-sm btn-info">Edit Profile</a></td>
                                        <th>{{$user->created_at->toDateString()}}</th>
                                        <th>{{$user->created_at->toTimeString()}}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endsection
@else
    @section('content-body')
        <h1>Users</h1><hr>
        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Current Package</th>
                    <th>Active</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1;
                    $us = collect();
                    foreach(App\Details::where('invited_by',Auth::user()->username)->get() as $d){
                        $us->push($d->user);
                    }
                @endphp
                @foreach($us as $user)
                    <tr>
                        <th>{{$i++}}.</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->details) {{$user->details->mobile}} @endif</td>
                        <th>{{$user->donations->last()->package}}</th>
                        <td>
                            <strong>
                                @if($user->coordinates)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </strong>
                        </td>
                        <th>{{$user->created_at->toDateString()}}</th>
                        <th>{{$user->created_at->toTimeString()}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
@endif
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
