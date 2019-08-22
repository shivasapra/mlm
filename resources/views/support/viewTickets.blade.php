
@extends('layouts.app', ['titlePage' => __('View Tickets')])
@section('content-body')
    <ul class="nav nav-tabs tabs-design mt-2" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" href="{{route('support.createTickets')}}">Create Tickets</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('support.viewTickets')}}" role="tab">View Tickets</a>
        </li>
    </ul>
        <div class="table-responsive mt-2">
            <table class="table table-bordered datatable">
                <thead class="bg-light">
                    <tr>
                        <th>Sno.</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Attachment</th>
                        <th>Post Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach(Auth::user()->tickets as $t)
                        <tr>
                            <th>{{$i++}}.</th>
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
                                    <span class="text-danger"><strong>{{__("Pending")}}</strong></span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
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
@endsection