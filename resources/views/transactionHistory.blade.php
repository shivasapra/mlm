@extends('layouts.app', ['titlePage' => __('Transaction History')])
@section('content-body')
<h1>Transaction History</h1><hr>
<table class="table table-bordered datatable">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Amount</th>
            <th>To</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Commision::where('from',Auth::id())->get() as $c)
            <tr>
                <th>{{$loop->index + 1}}.</th>
                <th>{{$c->amount}}.</th>
                <td> {{ $c->user->username }} ({{($c->user->name)}})</td>
                <td>{{ $c->created_at->toDateString()}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
