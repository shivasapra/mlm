@extends('layouts.app', ['titlePage' => __('Account Settings')])
@section('content-body')
        <div class="row">
        <div class="col-md-12">
        <ul class="nav nav-tabs tabs-design" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home">Profile</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="profile">Edit Profile</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="contact">Change Password</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#change-email-mobile" role="tab" aria-controls="contact">Change Email id/Mobile Number</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#change-security-pin" role="tab" aria-controls="contact">Change Security Pin</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#verify-identity" role="tab" aria-controls="contact">Verify Identity/KYC</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
        <div class="col-md-3"><img src="{{asset('app/images/profile-user.jpg')}}" alt="profile user" class="img-fluid"/></div>
        <div class="col-md-9 details">
            <h4><span>Signed Up on</span> : {{$user->created_at}}</h4>
            <h4><span>Username</span> : {{$user->details->username}}</h4>
            <h4><span>Email Address</span> : {{$user->email}}</h4>
            <h4><span>You are invited by</span> : {{$user->details->invited_by}}</h4>
            <h4><span>Email of your invited person</span> : {{$user->details->invited_by_email}}</h4>
            <h4><span>Promotional URL</span> : {{$user->details->promotional_url}}</h4>
            <h4><span>Name </span> : {{$user->name}}</h4>
            <h4><span>My Campaign Category </span> :  {{$user->details->campaign_category}}</h4>
            <h4><span>Sex </span> : {{$user->details->sex}}</h4>
            <h4><span>Address </span> : {{$user->details->address}}</h4>
            <h4><span>City </span> : {{$user->details->city}}</h4>
            <h4><span>District</span> : {{$user->details->district}}</h4>
            <h4><span>State </span> : {{$user->details->state}}</h4>
            <h4><span>Country</span> : {{$user->details->country}}</h4>
            <h4><span>Mobile</span> : {{$user->details->mobile}}</h4>
            <h4><span>Postal Code </span> : {{$user->details->postal_code}}</h4>
            <h4><span>Skype ID</span> : {{$user->details->skype_id}}</h4>
            <h4><span>PAN NO</span> : {{$user->details->pan_no}}</h4>
        </div>
        </div>
        </div>
        <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
        <form method="post" action="{{route('update.profile',$user)}}" class="form-inline">
            @csrf
            @method('POST')
            <div class="col-md-9 details">
                <h4><span>Signed Up on</span> : {{$user->created_at}}</h4>
                <h4><span>Username</span> : {{$user->details->username}}</h4>
                <h4><span>Email Address</span> : {{$user->email}}</h4>
                <h4><span>You are invited by</span> : {{$user->details->invited_by}}</h4>
                <h4><span>Email of your invited person</span> : {{$user->details->invited_by_email}}</h4>
                <h4><span>Promotional URL</span> : {{$user->details->promotional_url}}</h4>
                <h4><span>Full Name </span> : <input type="text" placeholder="" value="{{$user->details->full_name}}" required disabled class="form-control"/></h4>
                <h4><span>Sex </span> : <select class="form-control" name="sex"><option>---Select---</option><option value="Male" selected>Male</option><option value="Female">Female</option><option value="Transgender">Transgender</option></select></h4>
                <h4><span>DOB </span> : <input type="date" placeholder="" value="{{Carbon\Carbon::now()->toDateString()}}" class="form-control"/></h4>
                <h4><span>Address </span> : <textarea name="address" class="form-control" style="width:300px;">{{$user->details->address}}</textarea></h4>
                <h4><span>Country</span> : <select class="form-control" name="country" disabled><option>{{$user->details->country}}</option></select></h4>
                <h4><span>State </span> : <input type="text" class="form-control" name="state" value="{{$user->details->state}}"/></h4>
                <h4><span>District </span> : <input type="text" class="form-control" name="district" value="{{$user->details->district}}"/></h4>
                <h4><span>City </span> : <input type="text" class="form-control" name="city" value="{{$user->details->city}}"/></h4>
                <h4><span>Postal Code </span> : <input type="text" class="form-control" value="{{$user->details->postal_code}}" name="postal_code"/></h4>
                <h4><span>Mobile</span> : <input type="text" class="form-control" name="number" value="{{$user->details->mobile}}" disabled/></h4>
                <h4><span>My Campaign category</span> : <input type="text" class="form-control" name="campaign_category" value="{{$user->details->campaign_category}}" disabled/></h4>
                <h4><span>Skype ID</span> : <input type="text" class="form-control" name="skype_id" value="{{$user->details->skype_id}}"/></h4>
                {{-- <h4><input type="checkbox"> Hide my name, comment from everyone and contribute anonymousl</h4> --}}
                <h4><span>PAN NO</span> : <input type="text" class="form-control" name="pan_no" value="{{$user->details->pan_no}}"/></h4>
                <h4 class="mb-2"><span>Security Pin*</span> : <input type="password" class="form-control" name="security_pin" value=" " required/>
                <i class="text-danger">(To save changes, you must enter your personal pin here)</i></h4>
                <div><input type="checkbox"> I agree to be a part of the OnlineSensor Reward Fixed Amount Fundraising option and also agree to spend 2/3rd of the funds raised, towards giving rewards to the contributors. I give this right to the company to use 2/3rd of the funds raised by me towards providing rewards to the contributors from any of the third parties associated with the company, as per the terms and policies.</div>
                <button type="submit" class="btn btn-primary mt-1">Update Profile</button>
            </div>
            <div class="col-md-3">
                <div class="image-outer-div">
                    <img src="{{asset('app/images/profile-user.jpg')}}" alt="profile user" class="img-fluid"/>
                    <label for="avatar" class="upload-icon"><i class="icon-camera"></i></label>
                    <input type="file" id="avatar" name="avatar" onchange="readURL(this);" class="form-control" style="display:none;">
                </div>
            </div>
        </form>
        </div>
        </div>
        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
        <div class="col-md-12 details">
            <form method="post" action="{{route('update.password',$user)}}" class="form-inline">
              @csrf
              <h4><span>Enter Current Password * </span> : <input type="password" placeholder="Enter Current Password" value="" name="old_password" required class="form-control"/></h4>
              <h4><span>Enter New Password * </span> : <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"></h4>
              <h4><span>Confirm New Password * </span> : <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"></h4>
              <button type="submit" class="btn btn-primary mt-1">Update Password</button>
            </form>
        </div>
        </div>
        </div>
        <div class="tab-pane fade" id="change-email-mobile" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row details">
          <div class="col-md-6">
            <form method="post" action="{{route('update.email',$user)}}" class="form-inline">
              @csrf
              <h2>Change Email</h2>
              <h4><span>Current Email id </span> : <input type="email" placeholder="" value="{{$user->email}}" name="" required disabled class="form-control"/></h4>
              <h4><span>New Email id </span> : <input type="email" placeholder="" value="" name="new_email" required class="form-control"/></h4>
              <button type="submit" class="btn btn-info">Update Email</button>
            </form>
          </div>
          <div class="col-md-6">
            <form method="post" action="{{route('update.mobile',$user)}}" class="form-inline">
                @csrf
                <h2>Change Mobile Number</h2>
                <h4><span>Current Mobile Number </span> : <input type="number" placeholder="" value="{{$user->details->mobile}}" name="" required disabled class="form-control"/></h4>
                <h4><span>Enter New Mobile Number </span> : <input type="number" placeholder="" value="" name="new_mobile" required class="form-control"/></h4>
                <button type="submit" class="btn btn-info">Update Mobile</button>
              </form>
            </div>
          </div>
        </div>
        
        
        <div class="tab-pane fade" id="change-security-pin" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
        <div class="col-md-12 details">
            <form method="post" action="" class="form-inline">
            <h4><span>Enter Security Pin * </span> : <input type="password" placeholder="" value="" name="" required class="form-control"/></h4>
            <h4><span>New Security Pin * </span> : <input type="password" placeholder="" value="" name="" required class="form-control"/></h4>
            <h4><span>Confirm New Security Pin * </span> : <input type="password" placeholder="" value="" name="" required class="form-control"/> &nbsp;
            <a href="#">Forgot Security Pin ?</a></h4>
            <button type="submit" class="btn btn-primary mt-1">Update Pin</button>
            </form>
        </div>
        </div>
        </div>
        <div class="tab-pane fade" id="verify-identity" role="tabpanel" aria-labelledby="contact-tab">
          <div class="text-right mb-1"><a href="upload-kyc-proof.php" class="btn btn-primary">Upload Proof</a></div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Created On</th>
                  <th>Proof For</th>
                  <th>Document Type</th>
                  <th>Verification</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" class="text-center">No Data Found</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
        </div>
        </div>
@stop