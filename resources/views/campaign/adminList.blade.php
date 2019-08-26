@extends('layouts.app', ['titlePage' => __('Campaigns')])
@section('content-body')
<h1>Campaigns</h1>
<hr>
@foreach(App\Campaign::all() as $campaign)
    <div class="row">
    <div class="col-md-4">
        <img src="{{asset($campaign->image)}}" alt="portfolio" class="img-fluid"/>
    </div>
    <div class="col-md-8">
        <h2>{{$campaign->title}} ({{$campaign->campaign_id}})</h2>
        <span class="mr-1"><b>From</b> : {{$campaign->start_date}}</span>
        <span class="mr-1"><b>To</b> : {{$campaign->end_date}}</span>
        <span><b>Status</b> : 
            @if($campaign->status == 1)
                <span class="text-success"><strong>Published</strong></span>
            @elseif($campaign->status == 0)
                <span class="text-danger"><strong>Rejected</strong></span>
            @elseif($campaign->status == 2)
                <span class="text-warning"><strong>Pending</strong></span>
            @elseif($campaign->status == 3)
                <span class="text-warning"><strong>Paused</strong></span>
            @endif
        </span>
        <p class="mt-1"><b>Fund</b> : {{$campaign->currency}} 0,000.00 of {{$campaign->currency}} {{$campaign->fundraising_target}} </p>
        <p><b>Campaign URL</b> : {{'www.galaxycrowd.com'}}/{{$campaign->campaign_id}}</p>
        <a href="{{route('campaign.view',$campaign)}}" class="btn btn-primary">View</a>
        @if($campaign->status == 2)
            <a href="{{route('campaign.approve',$campaign)}}" class="btn btn-success">Approve</a>
            <a href="{{route('campaign.reject',$campaign)}}" class="btn btn-danger">Reject</a>
        @endif
        @if($campaign->status == 1)
            <a href="{{route('campaign.pause',$campaign)}}" class="btn btn-warning">Pause Campaign</a>
        @endif
        @if($campaign->status == 3)
            <a href="{{route('campaign.resume',$campaign)}}" class="btn btn-success">Resume Campaign</a>
        @endif
    </div>
    </div>
    <hr>
@endforeach

@stop