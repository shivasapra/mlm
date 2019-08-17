@extends('layouts.app', ['titlePage' => __('Tickets')])
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@stop
@section('content-body')
<h1>Tickets</h1><hr>
    <table class="table table-bordered" id="myTable">
        <thead class="bg-light">
            <tr>
                <th>Sno.</th>
                <th>Username</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Attachment</th>
                <th>Post Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($tickets as $t)
                <tr>
                    <th>{{$i++}}.</th>
                    <td>{{$t->user->username}}</td>
                    <td>{{$t->category}}</td>
                    <td>{{$t->priority}}</td>
                    <td>{{$t->subject}}</td>
                    <td>
                        <button class="btn btn-sm btn-info" onclick="message(this);" id="message">View
                            <input type="hidden" class="ticket" value="{{$t}}">
                        </button>    
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info" onclick="attachment(this);" id="attachment">View
                            <input type="hidden" class="ticket" value="{{$t}}">
                        </button>
                    </td>
                    <td>{{$t->created_at->toDateString()}}</td>
                    <td>
                        @if($t->status)
                            <span class="text-success"><strong>{{__('Approved')}}</strong></span>
                        @else
                            <a href="{{route('approve.ticket',$t)}}" class="btn btn-sm btn-success">Approve</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" id="modalButton" data-toggle="modal" data-target="#Modal" style="display:none;"></button>
    <div id="modalDisplay"></div>
@endsection
@section('js')
        <script>
            function message(temp){
                var ticket = JSON.parse($(temp).find('.ticket').val());
                var modal =
                '<div class="modal fade" id="Modal">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<!-- Modal Header -->'+
                        '<div class="modal-header">'+
                        '<h4 class="modal-title">Message</h4>'+
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                        '</div>'+

                        '<!-- Modal body -->'+
                        '<div class="modal-body">'+
                        '<p>'+ ticket['message'] +'</p>'+
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

            function attachment(temp){
                var ticket = JSON.parse($(temp).find('.ticket').val());
                var base_url = window.location.origin;
                var attachment = base_url+"/"+ticket["attachment"];
                console.log(attachment);
                
                
                var modal =
                '<div class="modal fade" id="Modal">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<!-- Modal Header -->'+
                        '<div class="modal-header">'+
                        '<h4 class="modal-title">Attachment</h4>'+
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                        '</div>'+

                        '<!-- Modal body -->'+
                        '<div class="modal-body">'+
                            '<iframe src="'+attachment+'" frameborder="0" style="width:100%;height:500px;"></iframe>'+
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
        </script>
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