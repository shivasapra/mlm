@extends('layouts.app', ['titlePage' => __('Contribution Packages')])
@section('content-body')
    <h1>My Contribution/Donation</h1><hr>
    <ul class="nav nav-tabs tabs-design mt-2">
        <li class="nav-item">
            <a class="nav-link" href="{{route('contribution.packages',Auth::user())}}">Contribute to a Campaign</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('contribution.donations',Auth::user())}}">My Contribution/Donation</a>
        </li>
    </ul>
    <div class="row">
        @foreach($user->donations->groupBy('package') as $donation)
            <div class="col-md-4">
                @foreach($donation->reverse() as $d)
                <a href="javascript:void(0)" onclick="displayInfo(this);">
                    <input type="hidden" id="test" value="{{$d}}">
                        <div class="contribute-div">
                            <div class="media overflow-visible">
                                <div class="media-body media-middle overflow-visible">
                                    <div class="heading-tag @if($d->package == 'STANDARD') standard-gradient @elseif($d->package == 'Premium') premium-gradient @endif">{{$d->package}}</div>
                                    <h6 class="text-muted mt-1">DOU : {{$d->created_at}}</h6>
                                    <h2>Amount: INR {{$d->amount}}</h2>
                                </div>
                                <div class="media-right">
                                    <img src="{{asset('app/images/medal'.$d->level.'.png')}}" alt="gold medal" class="media-object"/>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    
    
    <button type="button" id="modalButton" data-toggle="modal" data-target="#contributionViewModal" style="display:none;"></button>
    <div id="modalDisplay"></div>
@stop
@section('js')
    <script>
        function displayInfo(temp){
            var obj = JSON.parse($(temp).find('#test').val());
            var modal =
            '<div class="modal fade" id="contributionViewModal">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<!-- Modal Header -->'+
                        '<div class="modal-header">'+
                        '<h4 class="modal-title">Details</h4>'+
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                        '</div>'+
                
                        '<!-- Modal body -->'+
                        '<div class="modal-body">'+
                        '<p>Topup On: '+ obj["created_at"]+' <br>'+
                        'Activated On: '+ obj["created_at"]+'<br>'+
                        'Payment Type: OS Contribution Wallet <br>'+
                        'WalletOS:  Contribution Wallet <br>'+
                        'Amount: '+ obj["amount"] +'INR</p>'+
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
@stop