@extends('layouts.campaignLayout')

@section('css')
    <style>
    .btn{
        border-radius:5px;
    }
    </style>
@endsection
@section('content')
<div class="container-fluid block-md mb-5 ">
        <div class="row justify-content-center mb-5">
            <div class="col-md-9">
                <img src="{{asset($campaign->image)}}" alt="" class="img-fluid"/>
                <h1 class="mt-3">{{$campaign->title}}</h1> <hr>
                <div class="row">
                    <div class="col-md-6"><b>0 Shares</b> &nbsp;&nbsp; 
                        {{-- <b><a href="#"><i class="icon-heart"></i></a> 0 Likes</b> --}}
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-primary bg-facebook"><i class="icon-facebook-square"></i> Share</a>
                    {{-- <a href="#" class="btn btn-primary bg-twitter"><i class="icon-twitter"></i> Tweet</a> --}}
                    </div>
                </div> <hr>
                <p>Hi Everyone, <br> {!!$campaign->description!!} </p>
                {{-- <div class="row">
                    <div class="col-md-12 text-right">
                    <a href="#" class="btn btn-primary bg-facebook"><i class="icon-facebook-square"></i> Share</a>
                    <a href="#" class="btn btn-primary bg-twitter"><i class="icon-twitter"></i> Tweet</a>
                    </div>
                </div> --}}
                <hr>
                <div class="row">
                    <div class="col-md-6 text-center mb-2">
                        <div class="bg-light p-2">
                            <a href="javascript:void(0)" id="embedShow" class="badge bg-info text-white">Embed</a><br>
                            <small>Share The Campaign on Your Blog or Website</small>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-2">
                            <div class="bg-light p-2">
                                <a href="{{$campaign->short_url}}" class="badge bg-danger text-white">{{$campaign->short_url}}</a><br>
                                <small>Campaign's short URL</small>
                            </div>
                    </div>
                </div>
                <div id="embedDiv" class="col-md-12 bg-light pt-1 pb-1 mb-2" style="display:none;">
                    <div class="row">
                    <div class="col-md-8">
                        <p><b>Embed this Campaign on your Blog or website :</b></p>
                        <textarea name="" class="form-control" style="height:120px;font-size:14px;">
                            <iframe src="https://onlinesensor.com/campaigns?id=FDGZFKYZ&&view=embed" allowtransparency="true" frameborder="0" scrolling="no" width="300px" height="560px"></iframe>
                        </textarea>
                        <div class="bg-warning p-1">
                            <i class="icon-info"></i> Share this widget on your site or blog by copying and pasting the code above.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-1">
                        <h4>Online Sensor</h4>
                        <img src="images/getty_505872010_195856.jpg" class="img-fluid mb-1" alt="getty_505872010_195856"/>
                        <span class="text-success">Help me raise funds</span>
                        <h2>₹8,515 <small>of ₹500,000</small></h2>
                        <h6>Received 16 Contributions</h6>
                        <div class="progress mb-0">
                          <div class="progress-bar progress-bar-striped bg-success" style="width:20%"></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                    <div class="bg-light p-3">
                        <h5 class="text-primary">Campaign ID : {{$campaign->campaign_id}}</h5>
                        <span><i class="icon-location"></i> {{$campaign->user->details->state}}</span><br>
                        <span><i class="icon-tag"></i> {{$campaign->category}}</span>
                        <hr>
                        <h5><b>{{$campaign->currency}}{{$campaign->CampaignContributions->pluck('amount')->sum()}} of {{$campaign->currency}}{{$campaign->fundraising_target}}</b> <span class="float-right"></h5>
                        <h6>Received {{$campaign->CampaignContributions->count()}} Contributions</h6>
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped bg-success"
                          style="width:{{($campaign->CampaignContributions->pluck('amount')->sum() * 100 ) / $campaign->fundraising_target}}%"
                           ></div>
                        </div><br>
                        
                        <a href="{{route('campaign.contribute',$campaign)}}" class="btn btn-primary w-100 mt-1">Contribute</a>
                        {{-- <a href="#" class="btn btn-danger w-100 mt-1">Invite Friends</a>
                        <a href="#" class="btn btn-success w-100 mt-1">Share With Friends</a> --}}
                    </div>
                    
                    <div class="bg-light p-3 my-3">
                       <div class="media">
                           <div class="media-left"><img src="images/blank_img.jpg" alt="" class="img-object" style="width:70px;"/></div>
                           <div class="media-body">
                               <span><strong>Duration:</strong><br> {{$campaign->start_date}} to {{$campaign->end_date}}</span><br><br>
                               <span><strong>User:</strong><br>{{$campaign->user->username}} ({{$campaign->user->name}})</span>
                           </div>
                       </div><hr>
                       <ul class="pl-3 small text-danger m-0">
                            <li>This person will receive your donation directly.</li>
                            <li>All payments are final and cannot be refunded.</li>
                            <li>Please donate only to the people you know.</li>
                       </ul>
                    </div>
                    
                    <div class="bg-light p-3 mt-1">
                        <div>
                            <h3>Contributors</h3><hr>
                        </div>
                        @if($campaign->CampaignContributions->count())
                            @foreach($campaign->CampaignContributions as $c)
                                <div class="media">
                                <div class="media-left"><img src="{{asset('app/images/blank_profile_image.png')}}" alt="icon" class="img-object" style="width:75px;"/></div>
                                <div class="media-body">
                                    <span>{{$c->created_at->diffForHumans()}}</span><br>
                                    <h5 class="text-primary">{{$campaign->currency}}{{$c->amount}}</h5>
                                    <span>{{$c->name}}</span>
                                </div>
                            @endforeach
                        @else
                            <p>No Contributions Yet!!</p>
                        @endif
                       </div>
                    </div>
                </div>
        </div>
    </div>
@stop