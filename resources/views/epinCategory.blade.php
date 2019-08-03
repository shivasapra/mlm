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
            <th>Used By</th>
            <th>Used At</th>
            <th class="text-center">Transfer History</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1?>
        @foreach($category->epins as $epin)
            <tr>
                <th>{{$i++}}.</th>
                <td>{{$epin->epin}}</td>
                <td>{{$category->rate}}</td>
                <td>
                    @if($epin->sent_to)
                        {{App\User::find($epin->sent_to)->details->username}}
                    @else
                        {{__('N/A')}}
                    @endif
                </td>
                <td>
                    @if($epin->used_by)
                        {{App\User::find($epin->used_by)->details->username}}
                    @else
                        {{__('N/A')}}
                    @endif
                </td>
                <td>
                    @if($epin->used_at)
                        {{$epin->used_at}}
                    @else
                        {{__('N/A')}}
                    @endif
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info">View</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection