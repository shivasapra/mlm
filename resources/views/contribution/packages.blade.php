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
                            <h2>INR {{number_format( (float) ($package->amount), 2, '.', '')}}</h2>
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

@stop