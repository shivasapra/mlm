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
        {{-- <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#change-email-mobile" role="tab" aria-controls="contact">Change Email id/Mobile Number</a>
        </li> --}}
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#change-security-pin" role="tab" aria-controls="contact">Change Security Pin</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#bank-transfer" role="tab" aria-controls="contact">Bank Transfer</a>
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
                <h4><span>Sex </span> : <select class="form-control" name="sex"><option>---Select---</option><option value="Male" {{($user->details->sex == "Male")?'selected':''}}>Male</option><option value="Female" {{($user->details->sex == "Female")?'selected':''}}>Female</option><option value="Transgender" {{($user->details->sex == "Transgender")?'selected':''}}>Transgender</option></select></h4>
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
            <form method="post" action="{{route('update.pin',$user)}}" class="form-inline">
              @csrf
              <h4><span>Enter Security Pin * </span> : <input type="password" placeholder="" value="" name="old_pin" required class="form-control"/></h4>
              <h4><span>New Security Pin * </span> : <input type="password" placeholder="" value="" name="new_pin" required class="form-control"/></h4>
              <h4><span>Confirm New Security Pin * </span> : <input type="password" placeholder="" value="" name="new_pin_confirm" required class="form-control"/> &nbsp;
              {{-- <a href="#">Forgot Security Pin ?</a></h4> --}}
              <button type="submit" class="btn btn-primary mt-1">Update Pin</button>
            </form>
        </div>
        </div>
        </div>
        <div class="tab-pane fade" id="bank-transfer" role="tabpanel" aria-labelledby="contact-tab">
            <form method="post" action="{{route('update.bankTransfer',$user)}}">
                @csrf
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Handling Currency</label> :
                  </div>
                  <div class="col-md-8">
                    <select class="form-control" name="currency">
                      <option>Select Currency</option>
                      <option value="USD" {{($user->bankTransfer != null and $user->bankTransfer->currency == 'USD')? 'selected' : ' ' }}>USD</option>
                      <option value="INR" {{($user->bankTransfer != null and $user->bankTransfer->currency == 'INR')? 'selected' : ' ' }}>INR</option>
                      <option value="IDR" {{($user->bankTransfer != null and $user->bankTransfer->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Account type</label> :
                  </div>
                  <div class="col-md-8">
                    <select class="form-control" name="account_type">
                      <option>Select Account Type</option>
                      <option value="Savings" {{($user->bankTransfer != null and $user->bankTransfer->account_type == 'Savings')? 'selected' : ' ' }}>Savings</option>
                      <option value="Current" {{($user->bankTransfer != null and $user->bankTransfer->account_type == 'Current')? 'selected' : ' ' }}>Current</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Nick Name</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="Enter Nick Name" name="nick_name" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->nick_name }}" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Account Holder Name</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="Account Holder Name" name="account_holder_name" class="form-control" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->account_holder_name }}"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Account Number</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="Enter Account Number" name="account_no" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->account_no }}" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Bank Name</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="Enter Bank Name" name="bank_name" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->bank_name }}" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Bank Branch</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="Enter Bank Branch" name="bank_branch" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->bank_branch }}" class="form-control" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Bank/IFSC Code</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="Enter Bank/IFSC Code" name="IFSC_code" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->IFSC_code }}" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Status</label> :
                  </div>
                  <div class="col-md-8">
                    <select class="form-control" name="status">
                      <option value="0" {{($user->bankTransfer != null and $user->bankTransfer->status == 0)? 'selected' : ' ' }}>In-Active</option>
                      <option value="1" {{($user->bankTransfer != null and $user->bankTransfer->status == 1)? 'selected' : ' ' }}>Active</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Security Pin *</label> :
                  </div>
                  <div class="col-md-8">
                    <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
        </div>
        <div class="tab-pane fade" id="verify-identity" role="tabpanel" aria-labelledby="contact-tab">
          @if(Auth::user()->KYC->count()<3)
            <div class="text-right mb-1"><a href="{{route('KYC',$user)}}" class="btn btn-primary">Upload Proof</a></div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Created On</th>
                  <th>Proof For</th>
                  <th>Document Type</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                @if($user->kyc != null)
                <?php $i = 1; ?>
                @foreach($user->KYC as $k)
                  <tr>
                    <th>{{$i++}}</th>
                    <td>{{$k->created_at}}</td>
                    <td>{{$k->proof_for}}</td>
                    <td>{{$k->type}}</td>
                    <td>
                        <button class="btn btn-sm btn-info" onclick="proof(this);" id="proof">View
                            <input type="hidden" class="proof" value="{{$k}}">
                        </button>
                    </td>
                  </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
        </div>
        </div>
        </div>

        <button type="button" id="modalButton" data-toggle="modal" data-target="#Modal" style="display:none;"></button>
        <div id="modalDisplay"></div>
@stop
@section('js')
    <script>
      function proof(temp){
              var proof = JSON.parse($(temp).find('.proof').val());
              var base_url = window.location.origin;
              var attachment = base_url+"/"+proof["proof"];
              console.log(attachment);
              
              var modal =
              '<div class="modal fade" id="Modal">'+
              '<div class="modal-dialog">'+
                  '<div class="modal-content">'+
                      '<!-- Modal Header -->'+
                      '<div class="modal-header">'+
                      '<h4 class="modal-title">Attachment</h4>'+
                      '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                      '</div>'+

                      '<!-- Modal body -->'+
                      '<div class="modal-body">'+
                          '<iframe src="'+attachment+'" frameborder="0" style="width:100%;height:500px;"></iframe>'+
                      '</div>'+
              
                      '<!-- Modal footer -->'+
                      '<div class="modal-footer">'+
                      '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>'+
                      '</div>'+

                  '</div>'+
              '</div>'+
          '</div>';
          $('#modalDisplay').html(modal);
          $('#modalButton').click();
        }
    </script>
@endsection