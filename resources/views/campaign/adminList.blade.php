@extends('layouts.app', ['titlePage' => __('Campaigns')])
@section('content-body')
<h1>Campaigns</h1>
<hr>
@foreach(App\Campaigns::all() as $campaign)
    <div class="row">
    <div class="col-md-4">
        <img src="{{asset($campaign->image)}}" alt="portfolio" class="img-fluid"/>
    </div>
    <div class="col-md-8">
        <h2>Help me raise funds ({{$campaign->campaign_id}})</h2>
        <span class="mr-1"><b>Created On</b> : {{$campaign->created_at}}</span>
        <span class="mr-1"><b>Last Updated On</b> : {{$campaign->updated_at}}</span>
        {{-- <span><b>Status</b> : Published</span> --}}
        <p class="mt-1"><b>Fund</b> : {{$campaign->currency}} 0,000.00 of {{$campaign->currency}} {{$campaign->fundraising_target}} </p>
        <p><b>Campaign URL</b> : {{'www.galaxycrowd.com'}}/{{$campaign->campaign_id}}</p>
        <a href="{{route('campaign.edit',$campaign)}}" class="btn btn-danger">Edit</a>
        <a href="{{route('campaign.view',$campaign)}}" class="btn btn-primary">View</a>
    </div>
    </div>
    <hr>
    <div class="text-right">
        {{$campaigns->links()}}
    </div>
@endforeach

@stop