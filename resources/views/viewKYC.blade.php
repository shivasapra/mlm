@extends('layouts.app', ['titlePage' => __('KYCs')])
@section('content-body')
    <h1>KYC</h1><hr>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Sno.</th>
                    <th>Username</th>
                    <th>Proof For</th>
                    <th>Document Type</th>
                    <th>Created On</th>
                    <th>View</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kycs as $k)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{$k->user->username}} ({{$k->user->name}})</td>
                            <td>{{$k->proof_for}}</td>
                            <td>{{$k->type}}</td>
                            <td>{{$k->created_at}}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="proof(this);" id="proof">View
                                    <input type="hidden" class="proof" value="{{$k}}">
                                </button>
                            </td>
                            <td>
                                @if($k->approved)
                                    <span class="text-success"><strong>Approved</strong></span>
                                @else
                                    <a href="{{route('approve.kyc',$k)}}" class="btn btn-sm btn-success">Approve</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>

    <button type="button" id="modalButton" data-toggle="modal" data-target="#Modal" style="display:none;"></button>
    <div id="modalDisplay"></div>
@endsection

@section('js')
    <script>
      function proof(temp){
              var proof = JSON.parse($(temp).find('.proof').val());
              var base_url = window.location.origin;
              var attachment = base_url+"/app/galaxycrowd/public/"+proof["proof"];
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