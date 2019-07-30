<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Sign Up</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<!-- Bootstrap CSS -->
		<link href="{{('auth/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
		<!-- CSS Start -->
		<link href="{{('auth/css/style.css')}}" rel="stylesheet" type="text/css"/>
		<!-- <link href="css/responsive.css" rel="stylesheet" type="text/css"/> -->
		<!-- font Awsome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	</head>
	<body>
		<section>
				<form class="form" method="POST" action="{{ route('register') }}">
						@csrf
	        <div class="login-bg h-100vh">
	            <div class="container">
	            <div class="row justify-content-center h-100vh">
	                <div class="col-md-8 p-0 align-self-center">
	                    <div class="login-box">
						<img src="{{asset('auth/images/galaxy-crowd.png')}}" alt="logo" class="logo"/><hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Referral Code</label>
									<input type="text" class="form-control @error('referral_code') is-invalid @enderror" name="referral_code" value="{{ old('referral_code') }}" placeholder="Enter Referral Code" required/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Cause</label>
									<select name="cause" id="cause" class="form-control">
										<option value="">--Select--</option>
										@foreach(App\Cause::all() as $cause)
											<option value="{{$cause->name}}">{{$cause->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input id="name" type="text" placeholder="Enter Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  required autocomplete="username" autofocus>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Full Name</label>
									<input id="name" type="text" placeholder="Enter Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Email id</label>
									<input id="email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mobile Number</label>
									<input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Country</label>
									<input type="text" name="country" class="form-control" placeholder="Country" value="{{ old('country') }}" required/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>City</label>
									<input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm Password</label>
									<input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>
						</div>
	                    <div class="row">
        	                <div class="col-md-12">
        	                    <div class="form-group">
        	                        <div class="custom-control custom-checkbox mt-3 mt-4">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label text-muted" for="customControlInline">By signing up you agree to our Terms of Use and Privacy Policy.</label>
                                    </div>
        	                    </div>
        	                </div>
        	                <div class="col-md-12">
        	                    <div class="form-group">
        	                        <button type="submit" class="btn btn-primary btn-lg w-100">SignUp</button>
        	                   </div>
        	                </div>
        	           </div>     
        	           <div class="row">
        	               <div class="col-md-12 text-center">
        	                   <ul class="social-media m-0 p-0">
        							<li><a href="#"><img src="{{asset('auth/images/facebook.png')}}" alt="facebook"/></a></li>
        							<li><a href="#"><img src="{{asset('auth/images/twitter.png')}}" alt="twitter"/></a></li>
        							<li><a href="#"><img src="{{asset('auth/images/google-plus.png')}}" alt="google-plus"/></a></li>
        							<li><a href="#"><img src="{{asset('auth/images/linkedin.png')}}" alt="linkedin"/></a></li>
        					   </ul>
        	               </div>
        	           </div>
        	           
        	           
	                   <!-- <div>
	                   <a href="#" class="float-right">Login <i class="fas fa-arrow-right"></i></a>
	                   </div> -->
	                </div>
	                </div>
	            </div>
	            </div>
			</div> 
				</form> 
		</section>

	<!-- required javascript -->
	<script src="{{asset('auth/js/jquery-3.3.1.slim.min.js')}}"></script>
	<script src="{{asset('auth/js/popper.min.js')}}"></script>
	<script src="{{asset('auth/js/bootstrap.min.js')}}"></script>
	<!-- close -->
	
	</body>
</html>	