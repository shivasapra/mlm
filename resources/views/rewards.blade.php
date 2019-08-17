@extends('layouts.app', ['titlePage' => __('rewards')])
@section('content-body')
    <h1>Rewards</h1><hr>
    <div class="row">
        <div class="col-md-4">
            <div class="contribute-div">
                <div class="media overflow-visible">
                    <div class="media-body media-middle overflow-visible">
                        <div class="heading-tag">Reward 1</div>
                        <h2>INR </h2>
                        @if(Auth::user()->coordinates->reward_one_achieved)
                            <span class="badge bg-info">Reward Achieved</span>
                        @else
                            <h6>Complete 5 Members In STANDARD Level 1 To Achieve This Reward</h6>
                        @endif
                    </div>
                    <div class="media-right">
                        <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contribute-div">
                <div class="media overflow-visible">
                    <div class="media-body media-middle overflow-visible">
                        <div class="heading-tag standard-gradient">Reward 2</div>
                        <h2>INR </h2>
                        @if(Auth::user()->coordinates->reward_two_achieved)
                            <span class="badge bg-success">Reward Achieved</span>
                        @else
                            <h6>Complete 25 Members In STANDARD Level 2 To Achieve This Reward</h6>
                        @endif
                    </div>
                    <div class="media-right">
                        <img src="{{asset('app/images/medal2.png')}}" alt="gold medal" class="media-object"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contribute-div">
                <div class="media overflow-visible">
                    <div class="media-body media-middle overflow-visible">
                        <div class="heading-tag premium-gradient">Reward 3</div>
                        <h2>INR </h2>
                        @if(Auth::user()->coordinates->reward_three_achieved)
                            <span class="badge bg-success">Reward Achieved</span>
                        @else
                            <h6>Complete 125 Members In STANDARD Level 3 To Achieve This Reward</h6>
                        @endif
                    </div>
                    <div class="media-right">
                        <img src="{{asset('app/images/medal3.png')}}" alt="gold medal" class="media-object"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection