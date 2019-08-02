@extends('layouts.app', ['titlePage' => __('Epins')])
@section('content-header')
<h1>Generate Epin</h1><hr>
<form action="{{route('generate.epin',$user)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="no">Number Of EPins</label>
            <input type="number" name="no" class="form-control" required>
        </div>
        <div class="col-md-4">
            <br><button class="btn btn-info">Generate</button>
        </div>
    </div><br><br>
</form>
@stop
@section('content-body')
<h1>Epins</h1><hr>
<table class="table tabel-bordered">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Used By</th>
            <th>Used On</th>
        </tr>
    </thead>
    <tbody>
        <?php $i =1; ?>
        @foreach($user->epins as $epin)
            <tr>
                <th>{{$i++}}.</th>
                <td>{{$epin->epin}}</td>
                <td>{{$epin->amount}}</td>
                <td>
                    @if($epin->used_by)
                        {{App\User::find($epin->used_by)->name}}
                    @else
                        {{'--'}}    
                    @endif
                </td>
                <td>
                    @if($epin->used_by)
                        {{App\User::find($epin->used_by)->created_at}}
                    @else
                        {{"--"}}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop