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
        <div class="col-md-4">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#contributionViewModal">
                <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag">Basic</div>
                            <h6 class="text-muted mt-1">DOU : 14-02-2016 18:54:49</h6>
                            <h2>Amount: INR 26,000.00</h2>
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal3.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#contributionViewModal">
                <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag standard-gradient">Standard</div>
                            <h6 class="text-muted mt-1">DOU : 18-08-2016 10:25:00</h6>
                            <h2>Amount: INR 7,800.00</h2>
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal2.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#contributionViewModal">
                <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag premium-gradient">Premium</div>
                            <h6 class="text-muted mt-1">DOU : 18-08-2016 10:14:03</h6>
                            <h2>Amount: INR 6,500.00</h2>
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#contributionViewModal">
                <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag standard-gradient">Standard</div>
                            <h6 class="text-muted mt-1">DOU : 18-08-2016 10:25:00</h6>
                            <h2>Amount: INR 7,800.00</h2>
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal2.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#contributionViewModal">
                <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag premium-gradient">Premium</div>
                            <h6 class="text-muted mt-1">DOU : 18-08-2016 10:14:03</h6>
                            <h2>Amount: INR 6,500.00</h2>
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#contributionViewModal">
            <div class="col-md-4">
                <div class="contribute-div">
                    <div class="media overflow-visible">
                        <div class="media-body media-middle overflow-visible">
                            <div class="heading-tag premium-gradient">Premium</div>
                            <h6 class="text-muted mt-1">DOU : 18-08-2016 10:14:03</h6>
                            <h2>Amount: INR 6,500.00</h2>
                        </div>
                        <div class="media-right">
                            <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="modal fade" id="contributionViewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                <p>Topup On14-02-2016 18:54:49 <br>
                Activated On14-02-2016 18:54:49 <br>
                Payment TypeOS Contribution Wallet <br>
                WalletOS Contribution Wallet <br>
                Amount1625 INR </p>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop