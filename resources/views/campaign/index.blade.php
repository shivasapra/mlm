@extends('layouts.app', ['titlePage' => __('My Campaigns')])
@section('content-body')
<h1>My Campaigns</h1>
<div class="row">
  {{-- <div class="col-md-9">
    <form class="form-inline">
      <h4>Search by</h4>
      <input type="text" placeholder="Search Item" class="form-control" name="" value=""/>
      <select class="form-control">
        <option value="">All</option>
        <option value="13">Abuse</option>
        <option value="10">Cancelled</option>
        <option value="8">Closed</option>
        <option value="1">Draft</option>
        <option value="7">Funded</option>
        <option value="9">Paid</option>
        <option value="6">Published</option>
        <option value="5">Re-Declined</option>
        <option value="4">Re-Submitted</option>
        <option value="3">Reviewed</option>
        <option value="2">Submitted</option>
        <option value="11">Unpublished</option>
        <option value="12">Unsuccess</option>
      </select>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div> --}}
  <div class="col-md-12 text-right">
    <a href="{{route('add.campaign',$user)}}" class="btn btn-success mt-2">Add Campaign</a>
  </div>
</div>
<hr>

@foreach($campaigns as $campaign)
    <div class="row">
    <div class="col-md-4">
        <img src="{{asset($campaign->image)}}" alt="portfolio" class="img-fluid"/>
    </div>
    <div class="col-md-8">
        <h2>Help me raise funds ({{$campaign->campaign_id}})</h2>
        <span class="mr-1"><b>Created On</b> : {{$campaign->created_at}}</span>
        <span class="mr-1"><b>Last Updated On</b> : {{$campaign->updated_at}}</span>
        <span><b>Status</b> : 
          @if($campaign->status == 1)
              <span class="text-success"><strong>Published</strong></span>
          @elseif($campaign->status == 0)
              <span class="text-danger"><strong>Rejected</strong></span>
          @elseif($campaign->status == 2)
              <span class="text-warning"><strong>Pending</strong></span>
          @endif
        </span> 
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

{{-- <div class="row">
  <div class="col-md-12 text-right">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="icon-angle-left"></i> Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next <i class="icon-angle-right"></i></a></li>
    </ul>
  </div>
</div> --}}
@stop