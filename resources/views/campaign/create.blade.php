@extends('layouts.app', ['titlePage' => __('Add Campaign')])
@section('content-body')
      <h1>Add Campaign</h1><hr>
      <h3>Recipient</h3>
      {{-- <p class="text-muted">TIP Who should funds be sent to?</p> --}}
      <ul class="nav nav-tabs tabs-design mt-2" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#all" role="tab">All</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#someone-else" role="tab">Someone Else</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#business" role="tab">A Business</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#charity" role="tab">A Charity</a>
        </li> --}}
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
            <form method="post" action="{{route('campaign.store',$user)}}" enctype="multipart/form-data">
              @csrf
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-3"><label>Full Name</label></div>
                <div class="col-md-9">{{$user->details->full_name}}</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Email Address</label></div>
                <div class="col-md-9">{{$user->email}}</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>State</label></div>
                <div class="col-md-9">{{$user->details->state}}</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Country</label></div>
                <div class="col-md-9">{{$user->details->country}}</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Campaign Start Date*</label></div>
                <div class="col-md-9"><input type="date" placeholder=""  value="" name="campaign_start_date" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Campaign End Date*</label></div>
                <div class="col-md-9"><input type="date" placeholder=""  value="" name="campaign_end_date" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Campaign Category *</label></div>
                <div class="col-md-9">
                  <select class="form-control" name="category">
                    <option value="Adoption" >Adoption</option>
                    <option value="Animals" >Animals</option>
                    <option value="Art" >Art</option>
                    <option value="Buy a Car" >Buy a Car</option>
                    <option value="Buy a Home" >Buy a Home</option>
                    <option value="Cancer Treatment" >Cancer Treatment</option>
                    <option value="Churches & Religious Organizations" >Churches & Religious Organizations</option>
                    <option value="Organizations" >Organizations</option>
                    <option value="Community" >Community</option>
                    <option value="Crafts" >Crafts</option>
                    <option value="Creative Projects" >Creative Projects</option>
                    <option value="Dance" >Dance</option>
                    <option value="Design" >Design</option>
                    <option value="Design a Website" >Design a Website</option>
                    <option value="Develop a Software" >Develop a Software</option>
                    <option value="Education" >Education</option>
                    <option value="Emergencies" >Emergencies</option>
                    <option value="Events" >Events</option>
                    <option value="Family" >Family</option>
                    <option value="Fashion" >Fashion</option>
                    <option value="Film/Video" >Film/Video</option>
                    <option value="Food" >Food</option>
                    <option value="For Individuals" >For Individuals</option>
                    <option value="For Kids" >For Kids</option>
                    <option value="Fraternities and Sororities" >Fraternities and Sororities</option>
                    <option value="Games" >Games</option>
                    <option value="Get Out of Debt" >Get Out of Debt</option>
                    <option value="Groups" >Groups</option>
                    <option value="Holidays" >Holidays</option>
                    <option value="Medical & Health" >Medical & Health</option>
                    <option value="Memorials & Funerals" >Memorials & Funerals</option>
                    <option value="Military & Veterans" >Military & Veterans</option>
                    <option value="Neighbours" >Neighbours</option>
                    <option value="Nonprofits & Charity" >Nonprofits & Charity</option>
                    <option value="Pets" >Pets</option>
                    <option value="Politics and Public Office" >Politics and Public Office</option>
                    <option value="Publish a Book" >Publish a Book</option>
                    <option value="Repay a Loan" >Repay a Loan</option>
                    <option value="Run/Walk/Rides" >Run/Walk/Rides</option>
                    <option value="Schools" selected>Schools</option>
                    <option value="Sports" >Sports</option>
                    <option value="To Fund My Business" >To Fund My Business</option>
                    <option value="To Have a Good Life" >To Have a Good Life</option>
                    <option value="To Start a Business" >To Start a Business</option>
                    <option value="Trip" >Trip</option>
                    <option value="Weddings & Honeymoons" >Weddings & Honeymoons</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Title of your Campaign *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="title" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Fundraising Target</label></div>
                <div class="col-md-9">
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <select class="form-control" name="currency">
                        <option value="INR ₹" data-minigoal = "50000" selected='selected' >INR ₹</option>
                        <option value="USD $" data-minigoal = "1000" >USD $</option>
                        <option value="EUR €" data-minigoal = "1000" >EUR €</option>
                        <option value="GBP £" data-minigoal = "1000" >GBP £</option>
                        <option value="BTC ฿" data-minigoal = "1" >BTC ฿</option>
                      </select>
                    </div>
                  </div>
                  <input type="number" name="fundraising_target" class="form-control"  name="" value="">
                </div>
                
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Short URL *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="short_url" value="{{$short_url}}" class="form-control" readonly/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Story of the Project/Campaign *</label></div>
                <div class="col-md-9"><textarea id="summernote" name="description" class="form-control" value=""></textarea></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Upload your campaign image</label></div>
                <div class="col-md-9">
                  <input type="file" id="upload_campaign_image" name="image" value onchange="readURL(this);" required accept="image/*"/><br>
                  {{-- <label for="upload_campaign_image" class="btn btn-danger"><i class="icon-upload"></i> Upload</label><br> --}}
                  <img id="blah" src="{{asset('app/images/upload-image.jpg')}}" alt="upload image" class="img-fluid"/>
                  
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Campaign Video</label></div>
                <div class="col-md-9">
                  <label>Vimeo Video</label>
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/ value="vimeo">
                    </div>
                  </div>
                  <input type="text" class="form-control" name="vimeo_value" value="">
                </div>
                <label class="mt-1">YouTube Video</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/ value="youtube">
                    </div>
                  </div>
                  <input type="text" class="form-control" name="youtube_value" value="">
                </div>
                  <div class="bg-light p-1 mt-2">
                      <ul class="pl-1 l-height-auto">
                        <li>Simply upload your video to vimeo.com and type in your video's URL here - it's completely free. <br>
            <b>For example:</b> if your video's URL was www.vimeo.com/123456, you'd just need to type in 123456.<br>
            <b>Note:</b> if your video is set to private, you will need to have a pro account.</li>
            <li>We can also embed your project video from YouTube. Simply upload your video to youtube.com and enter your video url code here. <br>
            <b>Note:</b> You should only include the letters and numbers between "watch?v=" and "&feature=youtu.be".<br>
            <b>For example:</b> if your URL is "www.youtube.com/watch?v=87ObToBepkM&feature=youtu.be" or "https://youtu.be/87ObToBepkM", enter 87ObToBepkM only.</li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Website URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="website_url" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your LinkedIn URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="linkedin_url" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Facebook URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="facebook_url" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Twitter URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="twitter_url" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div><hr>
            <div class="form-group">
             <p><b>I have read and agree to the Terms & Conditions.</b></p>
             <div><input type="checkbox" checked name=""/> I hereby confirm and agree with the company's terms and policies and declare that I have understood all the terms carefully. I also agree that I am creating my own campaign and all the contents, facts, figures, circumstances, rewards and promises that I might have published in my campaign, are the sole responsibility of me myself and company does not have any role to play in that. Content of my campaign cannot be held against the company in any situation whatsoever.</div>
             <div class="mt-1 mb-1"><input type="checkbox" checked name=""/> I also agree and understand that OnlineSensor is not any kind of business opportunity and I have signed up on this platform to raise funds for my campaigns/projects and that I have signed up after carefully understanding the entire business model. I clearly understand that there are no investment or returns involved on this platform and I may or may not be able to raise money.</div>
             <div class="bg-light p-1">
               <p class="p-0"><b>Review/Feedback</b><br> Once you submit your campaigns/projects for review, we sometimes offer tips and advice to help give it the best chance of succeeding. When we provide the review/feedback, you'll find it here.
               </p>
             </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Campaign</button>
          </form>
        </div>

        {{-- <div class="tab-pane fade show" id="someone-else" role="tabpanel" aria-labelledby="home-tab">
          <form method="" action="">
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-3"><label>Recipient's Full Name</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Recipient's Last Name</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Full Name</label></div>
                <div class="col-md-9">Balraj Aggarwal</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Email Address</label></div>
                <div class="col-md-9">balrajaggarwal002@gmail.com</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>State</label></div>
                <div class="col-md-9">Chandigarh</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Country</label></div>
                <div class="col-md-9">India</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Campaign Category *</label></div>
                <div class="col-md-9">
                  <select class="form-control">
                    <option value="1" >Adoption</option>
                    <option value="2" >Animals</option>
                    <option value="3" >Art</option>
                    <option value="4" >Buy a Car</option>
                    <option value="5" >Buy a Home</option>
                    <option value="6" >Cancer Treatment</option>
                    <option value="7" >Churches & Religious Organizations</option>
                    <option value="8" >Organizations</option>
                    <option value="9" >Community</option>
                    <option value="10" >Crafts</option>
                    <option value="11" >Creative Projects</option>
                    <option value="12" >Dance</option>
                    <option value="13" >Design</option>
                    <option value="14" >Design a Website</option>
                    <option value="15" >Develop a Software</option>
                    <option value="16" >Education</option>
                    <option value="17" >Emergencies</option>
                    <option value="18" >Events</option>
                    <option value="19" >Family</option>
                    <option value="20" >Fashion</option>
                    <option value="21" >Film/Video</option>
                    <option value="22" >Food</option>
                    <option value="23" >For Individuals</option>
                    <option value="24" >For Kids</option>
                    <option value="25" >Fraternities and Sororities</option>
                    <option value="26" >Games</option>
                    <option value="27" >Get Out of Debt</option>
                    <option value="28" >Groups</option>
                    <option value="29" >Holidays</option>
                    <option value="30" >Medical & Health</option>
                    <option value="31" >Memorials & Funerals</option>
                    <option value="32" >Military & Veterans</option>
                    <option value="33" >Neighbours</option>
                    <option value="34" >Nonprofits & Charity</option>
                    <option value="35" >Pets</option>
                    <option value="36" >Politics and Public Office</option>
                    <option value="37" >Publish a Book</option>
                    <option value="38" >Repay a Loan</option>
                    <option value="39" >Run/Walk/Rides</option>
                    <option value="40" selected>Schools</option>
                    <option value="41" >Sports</option>
                    <option value="42" >To Fund My Business</option>
                    <option value="43" >To Have a Good Life</option>
                    <option value="44" >To Start a Business</option>
                    <option value="45" >Trip</option>
                    <option value="46" >Weddings & Honeymoons</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Title of your Campaign *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Fundraising Target</label></div>
                <div class="col-md-9">
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <select class="form-control">
                        <option value="2" data-minigoal = "50000" selected='selected'>INR ₹</option>
                        <option value="1" data-minigoal = "1000" >USD $</option>
                        <option value="9" data-minigoal = "1000" >EUR €</option>
                        <option value="10" data-minigoal = "1000" >GBP £</option>
                        <option value="13" data-minigoal = "1" >BTC ฿</option>
                      </select>
                    </div>
                  </div>
                  <input type="number" class="form-control" name="" value="0">
                </div>
                <span class="text-danger">Enter Minimum target amount 50000 INR ₹</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Short URL *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control" disabled/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Story of the Project/Campaign *</label></div>
                <div class="col-md-9"><textarea id="summernote1" name="editordata" class="form-control" value=""></textarea></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Upload your campaign image</label></div>
                <div class="col-md-9">
                  <input type="file" id="upload_campaign_image" name="" value style="display:none;"/>
                  <label for="upload_campaign_image" class="btn btn-danger"><i class="icon-upload"></i> Upload</label><br>
                  <img src="images/upload-image.jpg" alt="upload image" class="img-fluid"/>
                  <div class="bg-light p-1 mt-2"><p class="m-0">TIP Project image needs to be at least 1200px by 650px. We suggest using a photograph with a clean and simple design. File dimensions : at least 1200px (wide) by 650px (high) - Max file size : 5MB - Accepted file formats : JPG, PNG or GIF.</p></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Campaign Video</label></div>
                <div class="col-md-9">
                  <label>Vimeo Video</label>
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="" value="http://www.vimeo.com/">
                </div>
                <label class="mt-1">YouTube Video</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="" value="http://www.youtube.com/watch?v=">
                </div>
                  <div class="bg-light p-1 mt-2">
                      <ul class="pl-1 l-height-auto">
                        <li>Simply upload your video to vimeo.com and type in your video's URL here - it's completely free. <br>
            <b>For example:</b> if your video's URL was www.vimeo.com/123456, you'd just need to type in 123456.<br>
            <b>Note:</b> if your video is set to private, you will need to have a pro account.</li>
            <li>We can also embed your project video from YouTube. Simply upload your video to youtube.com and enter your video url code here. <br>
            <b>Note:</b> You should only include the letters and numbers between "watch?v=" and "&feature=youtu.be".<br>
            <b>For example:</b> if your URL is "www.youtube.com/watch?v=87ObToBepkM&feature=youtu.be" or "https://youtu.be/87ObToBepkM", enter 87ObToBepkM only.</li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Website URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your LinkedIn URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Facebook URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Twitter URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div><hr>
            <div class="form-group">
             <p><b>I have read and agree to the Terms & Conditions.</b></p>
             <div><input type="checkbox" name=""/> I hereby confirm and agree with the company's terms and policies and declare that I have understood all the terms carefully. I also agree that I am creating my own campaign and all the contents, facts, figures, circumstances, rewards and promises that I might have published in my campaign, are the sole responsibility of me myself and company does not have any role to play in that. Content of my campaign cannot be held against the company in any situation whatsoever.</div>
             <div class="mt-1 mb-1"><input type="checkbox" name=""/> I also agree and understand that OnlineSensor is not any kind of business opportunity and I have signed up on this platform to raise funds for my campaigns/projects and that I have signed up after carefully understanding the entire business model. I clearly understand that there are no investment or returns involved on this platform and I may or may not be able to raise money.</div>
             <div class="bg-light p-1">
               <p class="p-0"><b>Review/Feedback</b><br> Once you submit your campaigns/projects for review, we sometimes offer tips and advice to help give it the best chance of succeeding. When we provide the review/feedback, you'll find it here.
               </p>
             </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Campaign</button>
          </form>
        </div>

        <div class="tab-pane fade show" id="business" role="tabpanel" aria-labelledby="home-tab">
          <form method="" action="">
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-3"><label>Recipient Business Name</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Legal Representative First Name</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Legal Representative Last Name</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Full Name</label></div>
                <div class="col-md-9">Balraj Aggarwal</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Email Address</label></div>
                <div class="col-md-9">balrajaggarwal002@gmail.com</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>State</label></div>
                <div class="col-md-9">Chandigarh</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Country</label></div>
                <div class="col-md-9">India</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Campaign Category *</label></div>
                <div class="col-md-9">
                  <select class="form-control">
                    <option value="1" >Adoption</option>
                    <option value="2" >Animals</option>
                    <option value="3" >Art</option>
                    <option value="4" >Buy a Car</option>
                    <option value="5" >Buy a Home</option>
                    <option value="6" >Cancer Treatment</option>
                    <option value="7" >Churches & Religious Organizations</option>
                    <option value="8" >Organizations</option>
                    <option value="9" >Community</option>
                    <option value="10" >Crafts</option>
                    <option value="11" >Creative Projects</option>
                    <option value="12" >Dance</option>
                    <option value="13" >Design</option>
                    <option value="14" >Design a Website</option>
                    <option value="15" >Develop a Software</option>
                    <option value="16" >Education</option>
                    <option value="17" >Emergencies</option>
                    <option value="18" >Events</option>
                    <option value="19" >Family</option>
                    <option value="20" >Fashion</option>
                    <option value="21" >Film/Video</option>
                    <option value="22" >Food</option>
                    <option value="23" >For Individuals</option>
                    <option value="24" >For Kids</option>
                    <option value="25" >Fraternities and Sororities</option>
                    <option value="26" >Games</option>
                    <option value="27" >Get Out of Debt</option>
                    <option value="28" >Groups</option>
                    <option value="29" >Holidays</option>
                    <option value="30" >Medical & Health</option>
                    <option value="31" >Memorials & Funerals</option>
                    <option value="32" >Military & Veterans</option>
                    <option value="33" >Neighbours</option>
                    <option value="34" >Nonprofits & Charity</option>
                    <option value="35" >Pets</option>
                    <option value="36" >Politics and Public Office</option>
                    <option value="37" >Publish a Book</option>
                    <option value="38" >Repay a Loan</option>
                    <option value="39" >Run/Walk/Rides</option>
                    <option value="40" selected>Schools</option>
                    <option value="41" >Sports</option>
                    <option value="42" >To Fund My Business</option>
                    <option value="43" >To Have a Good Life</option>
                    <option value="44" >To Start a Business</option>
                    <option value="45" >Trip</option>
                    <option value="46" >Weddings & Honeymoons</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Title of your Campaign *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Fundraising Target</label></div>
                <div class="col-md-9">
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <select class="form-control">
                        <option value="2" data-minigoal = "50000" selected='selected'>INR ₹</option>
                        <option value="1" data-minigoal = "1000" >USD $</option>
                        <option value="9" data-minigoal = "1000" >EUR €</option>
                        <option value="10" data-minigoal = "1000" >GBP £</option>
                        <option value="13" data-minigoal = "1" >BTC ฿</option>
                      </select>
                    </div>
                  </div>
                  <input type="number" class="form-control" name="" value="0">
                </div>
                <span class="text-danger">Enter Minimum target amount 50000 INR ₹</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Short URL *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control" disabled/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Story of the Project/Campaign *</label></div>
                <div class="col-md-9"><textarea id="summernote2" name="editordata" class="form-control" value=""></textarea></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Upload your campaign image</label></div>
                <div class="col-md-9">
                  <input type="file" id="upload_campaign_image" name="" value style="display:none;"/>
                  <label for="upload_campaign_image" class="btn btn-danger"><i class="icon-upload"></i> Upload</label><br>
                  <img src="images/upload-image.jpg" alt="upload image" class="img-fluid"/>
                  <div class="bg-light p-1 mt-2"><p class="m-0">TIP Project image needs to be at least 1200px by 650px. We suggest using a photograph with a clean and simple design. File dimensions : at least 1200px (wide) by 650px (high) - Max file size : 5MB - Accepted file formats : JPG, PNG or GIF.</p></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Campaign Video</label></div>
                <div class="col-md-9">
                  <label>Vimeo Video</label>
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="" value="http://www.vimeo.com/">
                </div>
                <label class="mt-1">YouTube Video</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="" value="http://www.youtube.com/watch?v=">
                </div>
                  <div class="bg-light p-1 mt-2">
                      <ul class="pl-1 l-height-auto">
                        <li>Simply upload your video to vimeo.com and type in your video's URL here - it's completely free. <br>
            <b>For example:</b> if your video's URL was www.vimeo.com/123456, you'd just need to type in 123456.<br>
            <b>Note:</b> if your video is set to private, you will need to have a pro account.</li>
            <li>We can also embed your project video from YouTube. Simply upload your video to youtube.com and enter your video url code here. <br>
            <b>Note:</b> You should only include the letters and numbers between "watch?v=" and "&feature=youtu.be".<br>
            <b>For example:</b> if your URL is "www.youtube.com/watch?v=87ObToBepkM&feature=youtu.be" or "https://youtu.be/87ObToBepkM", enter 87ObToBepkM only.</li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Website URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your LinkedIn URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Facebook URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Twitter URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div><hr>
            <div class="form-group">
             <p><b>I have read and agree to the Terms & Conditions.</b></p>
             <div><input type="checkbox" name=""/> I hereby confirm and agree with the company's terms and policies and declare that I have understood all the terms carefully. I also agree that I am creating my own campaign and all the contents, facts, figures, circumstances, rewards and promises that I might have published in my campaign, are the sole responsibility of me myself and company does not have any role to play in that. Content of my campaign cannot be held against the company in any situation whatsoever.</div>
             <div class="mt-1 mb-1"><input type="checkbox" name=""/> I also agree and understand that OnlineSensor is not any kind of business opportunity and I have signed up on this platform to raise funds for my campaigns/projects and that I have signed up after carefully understanding the entire business model. I clearly understand that there are no investment or returns involved on this platform and I may or may not be able to raise money.</div>
             <div class="bg-light p-1">
               <p class="p-0"><b>Review/Feedback</b><br> Once you submit your campaigns/projects for review, we sometimes offer tips and advice to help give it the best chance of succeeding. When we provide the review/feedback, you'll find it here.
               </p>
             </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Campaign</button>
          </form>
        </div>

        <div class="tab-pane fade show" id="charity" role="tabpanel" aria-labelledby="home-tab">
          <form method="" action="">
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-3"><label>Full Name</label></div>
                <div class="col-md-9">Balraj Aggarwal</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Email Address</label></div>
                <div class="col-md-9">balrajaggarwal002@gmail.com</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>State</label></div>
                <div class="col-md-9">Chandigarh</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Country</label></div>
                <div class="col-md-9">India</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Campaign Category *</label></div>
                <div class="col-md-9">
                  <select class="form-control">
                    <option value="1" >Adoption</option>
                    <option value="2" >Animals</option>
                    <option value="3" >Art</option>
                    <option value="4" >Buy a Car</option>
                    <option value="5" >Buy a Home</option>
                    <option value="6" >Cancer Treatment</option>
                    <option value="7" >Churches & Religious Organizations</option>
                    <option value="8" >Organizations</option>
                    <option value="9" >Community</option>
                    <option value="10" >Crafts</option>
                    <option value="11" >Creative Projects</option>
                    <option value="12" >Dance</option>
                    <option value="13" >Design</option>
                    <option value="14" >Design a Website</option>
                    <option value="15" >Develop a Software</option>
                    <option value="16" >Education</option>
                    <option value="17" >Emergencies</option>
                    <option value="18" >Events</option>
                    <option value="19" >Family</option>
                    <option value="20" >Fashion</option>
                    <option value="21" >Film/Video</option>
                    <option value="22" >Food</option>
                    <option value="23" >For Individuals</option>
                    <option value="24" >For Kids</option>
                    <option value="25" >Fraternities and Sororities</option>
                    <option value="26" >Games</option>
                    <option value="27" >Get Out of Debt</option>
                    <option value="28" >Groups</option>
                    <option value="29" >Holidays</option>
                    <option value="30" >Medical & Health</option>
                    <option value="31" >Memorials & Funerals</option>
                    <option value="32" >Military & Veterans</option>
                    <option value="33" >Neighbours</option>
                    <option value="34" >Nonprofits & Charity</option>
                    <option value="35" >Pets</option>
                    <option value="36" >Politics and Public Office</option>
                    <option value="37" >Publish a Book</option>
                    <option value="38" >Repay a Loan</option>
                    <option value="39" >Run/Walk/Rides</option>
                    <option value="40" selected>Schools</option>
                    <option value="41" >Sports</option>
                    <option value="42" >To Fund My Business</option>
                    <option value="43" >To Have a Good Life</option>
                    <option value="44" >To Start a Business</option>
                    <option value="45" >Trip</option>
                    <option value="46" >Weddings & Honeymoons</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Title of your Campaign *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>My Fundraising Target</label></div>
                <div class="col-md-9">
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <select class="form-control">
                        <option value="2" data-minigoal = "50000" selected='selected'>INR ₹</option>
                        <option value="1" data-minigoal = "1000" >USD $</option>
                        <option value="9" data-minigoal = "1000" >EUR €</option>
                        <option value="10" data-minigoal = "1000" >GBP £</option>
                        <option value="13" data-minigoal = "1" >BTC ฿</option>
                      </select>
                    </div>
                  </div>
                  <input type="number" class="form-control" name="" value="0">
                </div>
                <span class="text-danger">Enter Minimum target amount 50000 INR ₹</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Short URL *</label></div>
                <div class="col-md-9"><input type="text" placeholder="" name="" value="" class="form-control" disabled/></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Story of the Project/Campaign *</label></div>
                <div class="col-md-9"><textarea id="summernote2" name="editordata" class="form-control" value=""></textarea></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Upload your campaign image</label></div>
                <div class="col-md-9">
                  <input type="file" id="upload_campaign_image" name="" value style="display:none;"/>
                  <label for="upload_campaign_image" class="btn btn-danger"><i class="icon-upload"></i> Upload</label><br>
                  <img src="images/upload-image.jpg" alt="upload image" class="img-fluid"/>
                  <div class="bg-light p-1 mt-2"><p class="m-0">TIP Project image needs to be at least 1200px by 650px. We suggest using a photograph with a clean and simple design. File dimensions : at least 1200px (wide) by 650px (high) - Max file size : 5MB - Accepted file formats : JPG, PNG or GIF.</p></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3"><label>Campaign Video</label></div>
                <div class="col-md-9">
                  <label>Vimeo Video</label>
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="" value="http://www.vimeo.com/">
                </div>
                <label class="mt-1">YouTube Video</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text pl-1 pr-1">
                      <input type="radio" name="video"/>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="" value="http://www.youtube.com/watch?v=">
                </div>
                  <div class="bg-light p-1 mt-2">
                      <ul class="pl-1 l-height-auto">
                        <li>Simply upload your video to vimeo.com and type in your video's URL here - it's completely free. <br>
            <b>For example:</b> if your video's URL was www.vimeo.com/123456, you'd just need to type in 123456.<br>
            <b>Note:</b> if your video is set to private, you will need to have a pro account.</li>
            <li>We can also embed your project video from YouTube. Simply upload your video to youtube.com and enter your video url code here. <br>
            <b>Note:</b> You should only include the letters and numbers between "watch?v=" and "&feature=youtu.be".<br>
            <b>For example:</b> if your URL is "www.youtube.com/watch?v=87ObToBepkM&feature=youtu.be" or "https://youtu.be/87ObToBepkM", enter 87ObToBepkM only.</li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Website URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your LinkedIn URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Facebook URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="row">
                <div class="col-md-4"><label>Your Twitter URL</label></div>
                <div class="col-md-8"><input type="text" placeholder="www.yourerbsite.com" name="" value="" class="form-control"/></div>
              </div>
            </div>
              </div>
            </div><hr>
            <div class="form-group">
             <p><b>I have read and agree to the Terms & Conditions.</b></p>
             <div><input type="checkbox" name=""/> I hereby confirm and agree with the company's terms and policies and declare that I have understood all the terms carefully. I also agree that I am creating my own campaign and all the contents, facts, figures, circumstances, rewards and promises that I might have published in my campaign, are the sole responsibility of me myself and company does not have any role to play in that. Content of my campaign cannot be held against the company in any situation whatsoever.</div>
             <div class="mt-1 mb-1"><input type="checkbox" name=""/> I also agree and understand that OnlineSensor is not any kind of business opportunity and I have signed up on this platform to raise funds for my campaigns/projects and that I have signed up after carefully understanding the entire business model. I clearly understand that there are no investment or returns involved on this platform and I may or may not be able to raise money.</div>
             <div class="bg-light p-1">
               <p class="p-0"><b>Review/Feedback</b><br> Once you submit your campaigns/projects for review, we sometimes offer tips and advice to help give it the best chance of succeeding. When we provide the review/feedback, you'll find it here.
               </p>
             </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Campaign</button>
          </form>
        </div> --}}


      </div>
@stop
@section('js')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
@endsection