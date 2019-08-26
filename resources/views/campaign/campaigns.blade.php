@extends('layouts.campaignLayout')
@section('content')
<div class="container-fluid block-md mb-5 campaign-list">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10 text-center">
            <h2 class="after-underline after-underline-center mb-4">I'm Raising Funds For...</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        </div>
    </div>
    <div class="row">
        @foreach($campaigns->where('status',1) as $campaign)
            @if( Carbon\Carbon::parse(Carbon\Carbon::now()->toDateString())->between(Carbon\Carbon::parse($campaign->start_date), Carbon\Carbon::parse($campaign->end_date) ))
                <div class="col-lg-3 col-md-6 mb-5">
                    <img src="{{asset($campaign->image)}}" alt="img" class="img-fluid"/>
                    <h3 class="my-3 font-weight-bold">{{$campaign->title}}</h3>
                    <h5><b>{{$campaign->currency}} 00000 of {{$campaign->currency}}{{$campaign->fundraising_target}}</b>
                    <p>{!! $campaign->description !!}</p>
                    <a href="{{route('campaign.view',$campaign)}}">Read More <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection