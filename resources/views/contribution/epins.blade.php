@extends('layouts.app', ['titlePage' => __('Epins')])
@section('content-body')
<h1>Epins</h1><hr>
<table class="table tabel-bordered">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Epin</th>
            <th>Used By</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $i =1; ?>
        @foreach($user->epins as $epin)
            <tr>
                <th>{{$i++}}.</th>
                <td>{{$epin->epin}}</td>
                <td>{{"--"}}</td>
                <td>{{"--"}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop