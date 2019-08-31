@extends('layouts.campaignLayout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Contribute Now</div>
                <div class="card-body">
                    <form method="POST" action="{{route('payment',$campaign)}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Currency</label></div>
                                <div class="col-md-9"><input type="text" class="form-control" value="INR" name="currency" placeholder="Enter Currency Ex INR" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Amount</label></div>
                                <div class="col-md-9"><input type="number" class="form-control" name="amount" placeholder="Enter Amount" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Full Name</label></div>
                                <div class="col-md-9"><input type="text" class="form-control" name="name" placeholder="Enter full name" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Email Address</label></div>
                                <div class="col-md-9"><input type="email" name="email" placeholder="Enter Email Address" class="form-control" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Country</label></div>
                                <div class="col-md-9"><input type="text" name="country" placeholder="Enter Country" required class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>State/Province</label></div>
                                <div class="col-md-9"><input type="text" name="state" placeholder="Enter State" required class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>District</label></div>
                                <div class="col-md-9"><input type="text" name="district" placeholder="Enter District" required class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>City</label></div>
                                <div class="col-md-9"><input type="text" name="city" placeholder="Enter City" required class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Postal Code</label></div>
                                <div class="col-md-9"><input type="text" name="postal_code" required placeholder="Enter Postal Code" class="form-control"/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Mobile Number</label></div>
                                <div class="col-md-9"><input type="text" name="mobile" required placeholder="Enter Number" class="form-control"/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3"><label>Leave a Comment</label></div>
                                <div class="col-md-9"><textarea name="comment" class="form-control mb-1" placeholder="Leave a Comment" style="height:100px;"></textarea>
                                <p><input type="checkbox" checked required> By continuing, you agree with the OnlineSensor terms and privacy policy.</p></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12"><button type="submit" class="btn btn-success">Continue</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-12 bg-light p-3 my-3">
                <h5 class="text-primary">Campaign ID : {{$campaign->campaign_id}}</h5>
                <span><i class="icon-location"></i> {{$campaign->user->details->state}}</span><br>
                <span><i class="icon-tag"></i> {{$campaign->category}}</span>
                <hr>
                <img src="{{asset($campaign->image)}}" alt="kerala floods" class="img-fluid">
                <h4 class="my-1 font-weight-bold">{{$campaign->title}}</h4>
                <h5><b>{{$campaign->currency}}{{$campaign->CampaignContributions->pluck('amount')->sum()}} of {{$campaign->currency}}{{$campaign->fundraising_target}}</b> <span class="float-right"></h5>
                <h6>Received {{$campaign->CampaignContributions->count()}} Contributions</h6>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" 
                    style="width:{{($campaign->CampaignContributions->pluck('amount')->sum() * 100 ) / $campaign->fundraising_target}}%"
                    ></div>
                </div>
            </div>
            
            <div class="col-md-12 bg-light p-3 my-3">
                <div class="media">
                    <div class="media-left"><img src="images/blank_img.jpg" alt="" class="img-object" style="width:70px;"/></div>
                    <div class="media-body">
                        <span><strong>Duration:</strong><br> {{$campaign->start_date}} to {{$campaign->end_date}}</span><br><br>
                        <span><strong>User:</strong><br>{{$campaign->user->username}} ({{$campaign->user->name}})</span>
                    </div>
                </div><hr>
                <ul class="pl-1 small text-danger m-0">
                <li>This person will receive your donation directly.</li>
                <li>All payments are final and cannot be refunded.</li>
                <li>Please donate only to the people you know.</li>
                </ul>
            </div>
            {{-- <a href="#" class="btn btn-danger w-100 mt-1">Report this Campaign <br> <small>If you feel this contains prohibited content.</small></a> --}}
            <div class="col-md-12 bg-light p-3 mt-1 mb-5">
                <div class="">
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
</div>
@endsection