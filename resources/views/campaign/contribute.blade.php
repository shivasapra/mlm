@extends('layouts.campaignLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Contribute Now</div>
                <div class="card-body">
                    <form method="" action="">
                        {{-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
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
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Amount</label></div>
                                <div class="col-md-9"><input type="number" class="form-control" name="" placeholder="Enter Amount" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Full Name</label></div>
                                <div class="col-md-9"><input type="text" class="form-control" name="" placeholder="Enter full name" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Email Address</label></div>
                                <div class="col-md-9"><input type="email" name="" placeholder="Enter Email Address" class="form-control" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Billing Address:</label></div>
                                <div class="col-md-9"><textarea name="" class="form-control" placeholder="Enter Address"></textarea></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Country</label></div>
                                <div class="col-md-9">
                                    <select name="" class="form-control">
                                    <option>--Select--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>State/Province</label></div>
                                <div class="col-md-9">
                                    <select name="" class="form-control">
                                    <option>--Select--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>District</label></div>
                                <div class="col-md-9">
                                    <select name="" class="form-control">
                                    <option>--Select--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>City</label></div>
                                <div class="col-md-9">
                                    <select name="" class="form-control">
                                    <option>--Select--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Postal Code</label></div>
                                <div class="col-md-9"><input type="text" name="" placeholder="Enter Postal Code" class="form-control"/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Mobile Number</label></div>
                                <div class="col-md-9"><input type="text" name="" placeholder="Enter Number" class="form-control"/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3"><label>Leave a Comment</label></div>
                                <div class="col-md-9"><textarea name="" class="form-control mb-1" placeholder="Enter Address" style="height:100px;"></textarea>
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
                <h5><b>{{$campaign->currency}}0000.00 of {{$campaign->currency}}{{$campaign->fundraising_target}}</b> <span class="float-right"></h5>
                <h6>Received 16 Contributions</h6>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" style="width:20%"></div>
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
                <div class="bg-light p-3 mt-1">
                    <div>
                        <h3>Contributors</h3><hr>
                    </div>
                    <div class="media">
                        <div class="media-left"><img src="images/blank_profile_image.png" alt="" class="img-object" style="width:75px;"/></div>
                        <div class="media-body">
                            <span>2 years ago</span><br>
                            <h5 class="text-primary">₹780.00</h5>
                            <span>DHILLONTRAVEL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection