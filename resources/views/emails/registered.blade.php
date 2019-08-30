<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Thank You</title>
    <style>
    	@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap');
    	body{margin:0;padding:0;font-family: 'Open Sans', sans-serif;background-color:#ffedc3;word-break:break-word;}
    	h1 {
	    background: linear-gradient(to left, #61dec7 0%, #8e2ef7 50%);
	    -webkit-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -moz-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -o-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -ms-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -webkit-background-clip: text;
	    -webkit-text-fill-color: transparent;
	    font-size:50px;
	    font-weight:900;}
	    .container{
	    	width:900px;
	    	margin:50px auto;
	    	background-color:#fff;
	    	padding:30px;
	    }
	    .text-center {
    		text-align: center;
		}
	    hr{
	    	border-top:#ddd;
	    }
	    .fw-600{font-weight:600;}
	    p.card-text {color: #787878;}

		h5 {
		    font-size: 1.25rem;
		    font-weight: 400;
		    color: #444242;
		}
		.footer{
			margin:0;
			padding:0;
			list-style:none;
			margin-bottom:0.5rem;
		}
		.footer li{
			display:inline-block;
			padding:5px 5px;
		}
		.footer li a {
			display: block;
			width: 35px;
			height: 35px;
			border-radius: 50%;
			text-align: center;
			color: #fff;
			border: 1px solid rgba(255,255,255,0.1);
			padding-top: 6px;
		}
		.footer li a:hover{
			background-color:#fff;
			color:#333;
		}
		.border-radius0{
			border-radius:0;
		}
		.border0{
			border:0;
		}
		.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.card-footer {
    margin-top: 3rem;
    border-top: 1px solid #ddd;
    padding-top: 1rem;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-decoration:none;
    font-size:16px;
}
.text-center{
	text-align: center;
}
    </style>
  </head>
  <body>
    <div class="container text-center">
		<div class="card-header bg-white border-radius0 border0" style="width:100%; float:left;margin-bottom:15px;">
			<img src="{{asset('auth/images/galaxy-crowd.png')}}" alt="logo" class="img-fluid" style="width:280px;float:left;"/>
		</div><hr>
	  <div class="card-body">
	  	<h1><b>Welcome!</b> {{$user->name}}</h1>
	  	<p>Congratulations on becoming a part of the Galaxy Crowd Community.</p>
	  	<img src="{{asset('app/images/welcome.png')}}" alt="logo" class="img-fluid" style="width:280px;"/>
	  	<div class="" style="background-color:#d6e7f0;padding:20px;margin-top:20px;">
	  	<p style="line-height:35px;font-size:22px;">Details : <br>
		Username:   <b>{{$user->username}}</b> <br>
		Security PIN: <b> {{$security_pin}} </b></p>
		<p style="line-height:35px;font-size:22px;">Verify your Email ID: <a href="{{route('verify.email',$verify_token)}}"><b>Verify</b></a></p>
	</div>
	    <h2 style="margin-bottom:10px;color:#2190e3;font-size:35px;">Let's start an amazing journey together!!! </h2>
		<h5 style="margin-top:0px;">Don't share your Security Pin with anyone else </h5>
	  </div>
	  <div class="card-footer text-center bg-dark text-white border-radius0 border0">
		  <ul class="footer">
			  <li><a href="#" target="blank"><img src="{{asset('auth/images/facebook.png')}}"/></a></li>
			  <li><a href="#" target="blank"><img src="{{asset('auth/images/linkedin.png')}}"/></a></li>
			  <li><a href="#" target="blank"><img src="{{asset('auth/images/twitter.png')}}"/></a></li>
		  </ul>
		  <p class="mb-1 mt-3">SCO 53,First Floor,Sector 47D, Chandigarh-160047 <br>
	  	© 2019 All Right Reserved | <a href="https://galaxycrowd.com" class="text-white">www.galaxycrowd.com<a></p>
	  </div>
    </div>
  </body>
</html>