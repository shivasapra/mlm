@extends('layouts.app', ['titlePage' => __('Contribution Packages')])
@section('content-body')
    <h1>Contribute to a Campaign</h1><hr>
    <ul class="nav nav-tabs tabs-design mt-2">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('contribution.packages',Auth::user())}}">Contribute to a Campaign</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contribution.donations',Auth::user())}}">My Contribution/Donation</a>
        </li>
    </ul>
    @foreach ($packages->reverse()->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk->reverse() as $package)
                <div class="col-md-4">
                    <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag @if($package->package == 'STANDARD') standard-gradient @elseif($package->package == 'Premium') premium-gradient @endif">{{$package->package}}</div>
                            <h2>INR {{$package->amount}}</h2>
                            @if($user->donations->count() == 0 and $package->level == 1)
                            <a href="javascript:void(0)" onclick="contribute(this);"><span class="badge bg-info">Contribute Now</span><input type="hidden" class="package" value="{{$package}}"></a>
                            @else
                                @if($user->donations()->where('package',$package->package)->orderBy('id','desc')->first() != null)
                                    @if(($user->donations()->where('package',$package->package)->orderBy('id','desc')->first()->level)+1 == $package->level )
                                        <a href="javascript:void(0)" onclick="contribute(this);"><span class="badge bg-info">Contribute Now</span><input type="hidden" class="package" value="{{$package}}"></a>
                                    @endif
                                    @if($user->donations()->where('package',$package->package)->pluck('level')->contains($package->level))
                                        <h6 class="text-muted">{{$user->donations()->where('package',$package->package)->where('level',$package->level)->first()->created_at}}</h6>
                                    @endif
                                    @if($user->donations()->where('package',$package->package)->orderBy('id','desc')->first()->level == $package->level)
                                        <span class="badge bg-danger">Current Status</span>
                                    @endif
                                @else
                                    @if($package->level == 1)
                                        <a href="javascript:void(0)" onclick="contribute(this);"><span class="badge bg-info">Contribute Now</span><input type="hidden" class="package" value="{{$package}}"></a>
                                    @endif
                                @endif
                            @endif
                            
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal'.$package->level.'.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <button type="button" id="modalButton" data-toggle="modal" data-target="#contributeModal" style="display:none;"></button>
    <div id="modalDisplay"></div>
@stop
@section('js')
    <script>
        function contribute(temp){
            var obj = JSON.parse($(temp).find('.package').val());
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