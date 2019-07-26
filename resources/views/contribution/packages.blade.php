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
    

    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal7.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal7.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag premium-gradient">Premium</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal7.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal6.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal6.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag premium-gradient">Premium</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal6.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal5.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal5.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag premium-gradient">Premium</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal5.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal4.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal4.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag premium-gradient">Premium</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal4.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal3.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal3.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag premium-gradient">Premium </div>
                <h2>INR 26,000.00</h2>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal3.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="contribute-div">
        <div class="media overflow-visible">
            <div class="media-body media-middle overflow-visible">
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
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
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
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
                <div class="heading-tag premium-gradient">Premium</div>
                <h2>INR 26,000.00</h2>
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
                <div class="heading-tag">Basic</div>
                <h2>INR 26,000.00</h2>
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
                <div class="heading-tag standard-gradient">Standard</div>
                <h2>INR 26,000.00</h2>
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
                <div class="heading-tag premium-gradient">Premium</div>
                <h2>INR 26,000.00</h2>
                <h6 class="text-muted">27-01-2016 05:33:05</h6>
                <span class="badge bg-danger">Current Status</span>
            </div>
            <div class="media-right">
                <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
            </div>
        </div>
        </div>
    </div>
@stop