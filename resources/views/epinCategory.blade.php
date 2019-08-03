@extends('layouts.app', ['titlePage' => __('Epin Category Details')])
@section('content-body')
<h1>{{$category->name}}</h1><hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Epin</th>
            <th>Rate</th>
            <th>Sent To</th>
            <th>Transferred To</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1?>
        @foreach($category->epins as $epin)
            <tr>
                <th>{{$i++}}.</th>
                <td>{{$epin->epin}}</td>
                <td>{{$category->rate}}</td>
                <td>{{$epin->sent_to}}</td>
                <td>{{$epin->transferred_to}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection