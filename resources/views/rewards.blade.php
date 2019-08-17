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
                    </div>
                    <div class="media-right">
                        <img src="{{asset('app/images/medal3.png')}}" alt="gold medal" class="media-object"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection