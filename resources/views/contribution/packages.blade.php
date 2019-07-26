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
                                <span class="badge bg-info">Contribute Now</span>
                            @else
                                @if($user->donations()->where('package',$package->package)->orderBy('id','desc')->first() != null)
                                    @if(($user->donations()->where('package',$package->package)->orderBy('id','desc')->first()->level)+1 == $package->level )
                                        <span class="badge bg-info">Contribute Now</span>
                                    @endif
                                    @if($user->donations()->where('package',$package->package)->pluck('level')->contains($package->level))
                                        <h6 class="text-muted">{{$user->donations()->where('package',$package->package)->where('level',$package->level)->first()->created_at}}</h6>
                                    @endif
                                    @if($user->donations()->where('package',$package->package)->orderBy('id','desc')->first()->level == $package->level)
                                        <span class="badge bg-danger">Current Status</span>
                                    @endif
                                @else
                                    @if($package->level == 1)
                                        <span class="badge bg-info">Contribute Now</span>
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

@stop