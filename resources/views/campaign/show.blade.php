@extends('layouts.campaignLayout')

@section('content')
<div class="container-fluid block-md mb-5 ">
        <div class="row justify-content-center mb-5">
            <div class="col-md-9">
                <img src="{{asset($campaign->image)}}" alt="" class="img-fluid"/>
                <h1 class="mt-3">{{$campaign->title}}</h1> <hr>
                <div class="row">
                    <div class="col-md-6"><b>0 Shares</b> &nbsp;&nbsp; <b><a href="#"><i class="icon-heart"></i></a> 0 Likes</b></div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-primary bg-facebook"><i class="icon-facebook-square"></i> Share</a>
                    <a href="#" class="btn btn-primary bg-twitter"><i class="icon-twitter"></i> Tweet</a>
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
                    <div class="bg-light col-md-6 text-center mb-2 border-right">
                        <a href="javascript:void(0)" id="embedShow" class="badge bg-info">Embed</a><br>
                        <small>Share The Campaign on Your Blog or Website</small>
                    </div>
                    <div class="bg-light col-md-6 text-center mb-2">
                        <a href="{{$campaign->short_url}}" class="badge bg-danger">{{$campaign->short_url}}</a><br>
                        <small>Campaign's short URL</small>
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
                <div class="row">
                    <div class="col-md-12 bg-light p-1">
                        <h5 class="text-primary">Campaign ID : {{$campaign->campaign_id}}</h5>
                        <span><i class="icon-location"></i> {{$campaign->user->details->country}}</span><br>
                        <span><i class="icon-tag"></i> {{$campaign->category}}</span>
                        <hr>
                        <h3>{{$campaign->currency}}0000 <small>of {{$campaign->currency}}{{$campaign->fundraising_targe}}</small></h3>
                        <h6>Received 16 Contributions</h6>
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped bg-success" style="width:20%"></div>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <select class="form-control">
                                <option value="2" data-minigoal="50000" selected="selected">INR ₹</option>
                                <option value="1" data-minigoal="1000">USD $</option>
                                <option value="9" data-minigoal="1000">EUR €</option>
                                <option value="10" data-minigoal="1000">GBP £</option>
                                <option value="13" data-minigoal="1">BTC ฿</option>
                              </select>
                            </div>
                          </div>
                          <input type="number" class="form-control" name="" value="0">
                        </div>
                        <a href="#" class="btn btn-primary w-100 mt-1">Contribute</a>
                        <a href="#" class="btn btn-danger w-100 mt-1">Invite Friends</a>
                        <a href="#" class="btn btn-success w-100 mt-1">Share With Friends</a>
                    </div>
                    
                    <div class="col-md-12 bg-light p-1 mt-1">
                       <div class="media">
                           <div class="media-left"><img src="images/blank_img.jpg" alt="" class="img-object" style="width:70px;"/></div>
                           <div class="media-body">
                               <span>Created On {{$campaign->created_at->toDateString()}}</span><br>
                               <span><i class="icon-envelope"></i> {{$campaign->user->details->username}}</span>
                           </div>
                       </div><hr>
                       <ul class="pl-1 small text-danger m-0">
                            <li>This person will receive your donation directly.</li>
                            <li>All payments are final and cannot be refunded.</li>
                            <li>Please donate only to the people you know.</li>
                       </ul>
                    </div>
                    
                    <a href="#" class="btn btn-danger w-100 mt-1">Report this Campaign <br>  <small>If you feel this contains prohibited content.</small></a>
                    
                    <div class="col-md-12 bg-light p-1 mt-1">
                       <div class="media">
                           <div class="media-left"><img src="images/blank_profile_image.png" alt="" class="img-object" style="width:75px;"/></div>
                           <div class="media-body">
                               <span>2 years ago</span><br>
                               <h5 class="text-primary">₹780.00</h5>
                               <span>DHILLONTRAVEL</span>
                           </div>
                       </div><hr>
                       <div class="media">
                           <div class="media-left"><img src="images/blank_profile_image.png" alt="" class="img-object" style="width:75px;"/></div>
                           <div class="media-body">
                               <span>2 years ago</span><br>
                               <h5 class="text-primary">₹780.00</h5>
                               <span>DHILLONTRAVEL</span>
                           </div>
                       </div><hr>
                       <div class="media">
                           <div class="media-left"><img src="images/blank_profile_image.png" alt="" class="img-object" style="width:75px;"/></div>
                           <div class="media-body">
                               <span>2 years ago</span><br>
                               <h5 class="text-primary">₹780.00</h5>
                               <span>DHILLONTRAVEL</span>
                           </div>
                       </div><hr>
                       <div class="media">
                           <div class="media-left"><img src="images/blank_profile_image.png" alt="" class="img-object" style="width:75px;"/></div>
                           <div class="media-body">
                               <span>2 years ago</span><br>
                               <h5 class="text-primary">₹780.00</h5>
                               <span>DHILLONTRAVEL</span>
                           </div>
                       </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#"><i class="icon-angle-left"></i> Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next <i class="icon-angle-right"></i></a></li>
                            </ul>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop