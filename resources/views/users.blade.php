@extends('layouts.app', ['titlePage' => __('users')])
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@stop
@section('content-body')
    <h1>Users</h1><hr>
    <ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#active_users" role="tab" aria-controls="profile">Active Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#inactive_users" role="tab" aria-controls="home">Inactive Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#campaign_users" role="tab" aria-controls="home">Campaign Users</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="active_users" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Invited By</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Security Pin</th>
                            <th>Signed Up</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($users as $user)
                            @if($user->coordinates and !$user->campaign)
                                <tr>
                                    <th>{{$i++}}.</th>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->details->invited_by}} ({{ App\User::where('username',$user->details->invited_by)->first()->name}})</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->details->mobile}}</td>
                                    <td>{{$user->details->security_pin}}</td>
                                    <th>{{$user->created_at->diffForHumans()}}</th>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade show" id="inactive_users" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <table class="table table-bordered myTablee" id="myTablee">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Invited By</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Security Pin</th>
                            <th>Signed Up</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($users as $user)
                            @if(!$user->coordinates and !$user->campaign)
                                <tr>
                                    <th>{{$i++}}.</th>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->details->invited_by}} ({{ App\User::where('username',$user->details->invited_by)->first()->name}})</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->details->mobile}}</td>
                                    <td>{{$user->details->security_pin}}</td>
                                    <th>{{$user->created_at->diffForHumans()}}</th>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade show" id="campaign_users" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <table class="table table-bordered myTablee" id="myTablee">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Security Pin</th>
                            <th>Signed Up</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($users as $user)
                            @if($user->campaign)
                                <tr>
                                    <th>{{$i++}}.</th>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->details->mobile}}</td>
                                    <td>{{$user->details->security_pin}}</td>
                                    <th>{{$user->created_at->diffForHumans()}}</th>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
        $(document).ready(function() {
      $('#myTable').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          ]
      } );

      $('.myTablee').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          ]
      } );
  } );
  </script>
@endsection