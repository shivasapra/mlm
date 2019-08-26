@extends('layouts.app', ['titlePage' => __('Epin Category Details')])
<?php use App\User; ?>
@section('content-body')
<h1>{{$category->name}}</h1><hr>
<table class="table table-bordered datatable">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Epin</th>
            <th>Rate</th>
            <th>Sent To</th>
            <th>Used By</th>
            <th>Used At</th>
            <th class="text-center">Transfer History</th>
            <th class="text-center">Action</th>
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
                        {{App\User::find($epin->sent_to)->details->username}} ({{App\User::find($epin->sent_to)->name}})
                    @else
                        {{__('N/A')}}
                    @endif
                </td>
                <td>
                    @if($epin->used_by)
                        {{App\User::find($epin->used_by)->details->username}} ({{App\User::find($epin->used_by)->name}})
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
                    <button class="btn btn-sm btn-info" onclick="history(this)">View
                        <input type="hidden" class="epin_id" value={{$epin->id}}>
                    </button>
                </td>
                <td>
                    @if(!$epin->transfers->count() and !$epin->used_by and $epin->sent_to)
                        <a href="{{route('revert.epin',$epin)}}" class="btn btn-sm btn-danger">Revert</a>
                    @else
                        {{__('--')}}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<button type="button" id="modalButton" data-toggle="modal" data-target="#transferModal" style="display:none;"></button>
<div id="modalDisplay"></div>
@endsection
@section('js')
    <script>
        function history(temp){
            
            var epin_id = $(temp).find('.epin_id').val();
            @foreach(App\Epin::all() as $epin)
            var fetched_epin_id = {!! json_encode($epin->id) !!}
                if(fetched_epin_id == epin_id){
                    var modal = 
                    '<div class="modal fade" id="transferModal">'+
                        '<div class="modal-dialog">'+
                            '<div class="modal-content">'+
                                '<!-- Modal Header -->'+
                                '<div class="modal-header">'+
                                '<h4 class="modal-title">Epin Transfer History</h4>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                '</div>'+
                                '<!-- Modal body -->'+
                                '<div class="modal-body">'+
                                        '<table class="table table-bordered datatable">'+
                                            '<thead>'+
                                                '<tr>'+
                                                    '<th>Sno.</th>'+
                                                    '<th>Transferred By</th>'+
                                                    '<th>Transferred To</th>'+
                                                    '<th>Transferred On</th>'+
                                                '</tr>'+
                                            '</thead>'+
                                            '<tbody>'+
                                                '<?php $j = 1;?>'+
                                                    '@if($epin->transfers->count() > 0)'+
                                                        '@foreach($epin->transfers as $transfer)'+
                                                        '<tr>'+
                                                            '<td><b>{{$j++}}</b></td>'+
                                                            '<td>{{User::find($transfer->from)->details->username}} ({{User::find($transfer->from)->name}})</td>'+
                                                            '<td>{{User::find($transfer->to)->details->username}} ({{User::find($transfer->to)->name}})</td>'+
                                                            '<td>{{$transfer->created_at}}</td>'+
                                                        '</tr>'+
                                                        '@endforeach'+
                                                    '@endif'+
                                            '</tbody>'+
                                            '</table>'+
                                '</div>'+
                        
                                '<!-- Modal footer -->'+
                                '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                    $('#modalDisplay').html(modal);
                    $('#modalButton').click();
                }
          @endforeach
        }


  
        
	  
    </script>
@stop