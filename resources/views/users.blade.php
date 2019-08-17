@extends('layouts.app', ['titlePage' => __('users')])
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@stop
@section('content-body')
    <h1>Users</h1><hr>
    <div class="row">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>{{$loop->index + 1}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
  } );
  </script>
@endsection