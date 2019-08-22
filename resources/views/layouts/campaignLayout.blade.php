<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Campaigns</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<!-- Bootstrap CSS -->
		<link href="{{asset('campaign/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
		<!-- CSS Start -->
		<link href="{{asset('campaign/css/style.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('campaign/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
        <link type="text/css" rel="stylesheet" href="{{asset('campaign/css/lightslider.css')}}" /> 
		<!-- font Awsome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        @yield('css')
	</head>
	<body>
		<section>
			<header>
				<div class="topbar">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 text-center text-md-left">
								<span><i class="fas fa-envelope"></i> support@galaxycrowd.com</span> &nbsp; | &nbsp;
								<span><i class="fas fa-phone"></i> (+91) 0000 000 000</span>
							</div>
							<div class="col-md-6 text-center text-md-right">
								<span><a href="http://galaxycrowd.com/app/galaxycrowd/public/login"><i class="fas fa-sign-in-alt"></i> Login</a></span>&nbsp; | &nbsp;
								<span><a href="http://galaxycrowd.com/app/galaxycrowd/public/register"><i class="fas fa-edit"></i> Register Now</a></span>
							</div>
						</div>
					</div>
				</div>
			</header>
			<nav class="sticky-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="navbar navbar-expand-lg">
								<a class="navbar-brand p-0" href="index.php"><img src="{{asset('campaign/images/galaxy-crowd.png')}}" alt="logo" class="logo"/></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
									<ul class="navbar-nav ml-auto">
										<li class="nav-item active">
											<a class="nav-link" href="index.php">Home</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="about.php">About Galaxy Crowd</a>
										</li>
									<!--	<li class="nav-item">
											<a class="nav-link" href="promotion-rules.php">Promotion Rules</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="project-rules.php">Project Rules</a>
										</li> -->
										<li class="nav-item">
											<a class="nav-link" href="contact.php">Contact Us</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </nav>
            
            <div class="online-fundraiser mb-5">
                    <div class="row justify-content-center align-items-center height400">
                        <div class="col-md-6 text-center">
                            <h2 class="text-white">Browse Campaigns</h2>
                            <p class="text-white">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search by name,title, or categories"  name="">
                              <div class="input-group-append">
                                <a href="#" class="btn btn-primary">Search</a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="item campaign-slider">
                                <ul id="content-slider" class="content-slider">
                                    <a href="#">
                                        <li>
                                            <img src="{{asset("campaign/images/adoption.png")}}" alt="adoption"/>
                                            <span class="d-block mt-2">Adoption</span>
                                        </li>
                                    </a>    
                                    <a href="#">
                                        <li>
                                            <img src="{{asset("campaign/images/animals.png")}}" alt="animals"/>
                                            <span class="d-block mt-2">Animals</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset("campaign/images/art.png")}}" alt="adoption"/>
                                            <span class="d-block mt-2">Art</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset("campaign/images/organization.png")}}" alt="organization"/>
                                            <span class="d-block mt-2">Organization</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset("campaign/images/community.png")}}" alt="community"/>
                                            <span class="d-block mt-2">Community</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset("campaign/images/projects.png")}}" alt="projects"/>
                                            <span class="d-block mt-2">Projects</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="i{{asset('campaign/mages/dance.png')}}" alt="dance"/>
                                            <span class="d-block mt-2">Dance</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="i{{asset('campaign/mages/software.png')}}" alt="software"/>
                                            <span class="d-block mt-2">Software</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="i{{asset('campaign/mages/education.png')}}" alt="education"/>
                                            <span class="d-block mt-2">Education</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/emergencies.png')}}" alt="emergencies"/>
                                            <span class="d-block mt-2">Emergencies</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/events.png')}}" alt="events"/>
                                            <span class="d-block mt-2">Events</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/family.png')}}" alt="family"/>
                                            <span class="d-block mt-2">Family</span>
                                        </li>
                                    </a>
                                     <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/fashion.png')}}" alt="fashion"/>
                                            <span class="d-block mt-2">Fashion</span>
                                        </li>
                                    </a>
                                     <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/film-video.png')}}" alt="film video"/>
                                            <span class="d-block mt-2">Film/Video</span>
                                        </li>
                                    </a>
                                     <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/food.png')}}" alt="food"/>
                                            <span class="d-block mt-2">Food</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/holidays.png')}}" alt="holidays"/>
                                            <span class="d-block mt-2">Holidays</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/health.png')}}" alt="health"/>
                                            <span class="d-block mt-2">Health</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/memorials.png')}}" alt="Memorials"/>
                                            <span class="d-block mt-2">Memorials</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/military-veterans.png')}}" alt="military veterans"/>
                                            <span class="d-block mt-2">Military Veterans</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/charity.png')}}" alt="charity"/>
                                            <span class="d-block mt-2">Charity</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/pets.png')}}" alt="pets"/>
                                            <span class="d-block mt-2">Pets</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/books.png')}}" alt="books"/>
                                            <span class="d-block mt-2">Books</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/rides.png')}}" alt="Rides"/>
                                            <span class="d-block mt-2">Rides</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/sports.png')}}" alt="sports"/>
                                            <span class="d-block mt-2">Sports</span>
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li>
                                            <img src="{{asset('campaign/images/trips.png')}}" alt="trips"/>
                                            <span class="d-block mt-2">Trips</span>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

            <footer>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{asset('campaign/images/galaxy-crowd-white.png')}}" alt="logo" class="img-fluid"/>
                                <p align="justify">CloudReach Services Pvt. Ltd. is a company founded by a group of industry experts that have decades of experience between them. Each of them has spent years understanding the needs of the people around them and knowing how to ensure the financial freedom of the people around them.</p>
                            </div>
                            <div class="col-md-3">
                                <h3 class="after-underline">About Galaxy Crowd</h3>
                                <ul>
                                    <li><a href="about.php">What Is Galaxy Crowd</a></li>
                                    <li><a href="contact.php"Contact Us</a></li>
                                
                                    
                                <!--	<li><a href="work-with-us.php">Work With Us</a></li>
                                    <li><a href="partner.php">Partner With Us</a></li>
                                    <li><a href="promotion-rules.php">Promotion Rules</a></li>
                                    <li><a href="project-rules.php">Project Rules</a></li> -->
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3 class="after-underline">Support</h3>
                                <ul>
                                    <li><a href="trust-and-safety.php">Trust & Safety</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3 class="after-underline">Follow Us</h3>
                                <ul class="social-media">
                                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                                <h4>Payment Methods</h4>
                                <ul class="social-media hover-disable">
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/visa.png')}}" alt="visa"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/master-card.png')}}" alt="master-card"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/mastero.png')}}" alt="mastero"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/paypal.png')}}" alt="paypal"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/paytm.png')}}" alt="paytm"></a></li>
                                    <li><a href="#javascript:void(0)"><img src="{{asset('campaign/images/rupay.png')}}" alt="rupay"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/solid-truest-pay.png')}}" alt="solid truest pay"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/upi.png')}}" alt="upi"></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('campaign/images/net-banking.png')}}" alt="net-banking"></a></li>
                                </ul>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="mb-1">
                                    <li class="d-inline-block pr-3 border-right"><a href="privacy-policy.php">Privacy Policy</a></li>
                                    <li class="d-inline-block pl-3 pr-3 border-right"><a href="terms-of-use.php">Terms of Use</a></li>
                                    <li class="d-inline-block pl-3 pr-3 border-right"><a href="cookie-policy.php">Cookie Policy</a></li>
                                    <li class="d-inline-block pl-3"><a href="campaign-owner-agreement.php">Campaign Owner Agreement</a></li>
                                </ul>
                                <p>&copy; 2019 www.galaxycrowd.com | All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
    
        <!-- required javascript -->
        <script src="{{asset('campaign/js/jquery-3.3.1.slim.min.js')}}"></script>
        <script src="{{asset('campaign/js/popper.min.js')}}"></script>
        <script src="{{asset('campaign/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('campaign/js/lightslider.js')}}"></script>
        <!-- close -->
        
        <script>
             $(document).ready(function() {
                $("#content-slider").lightSlider({
                    loop:true,
                    keyPress:true
                });
                $('#image-gallery').lightSlider({
                    gallery:true,
                    item:1,
                    thumbItem:9,
                    slideMargin: 0,
                    speed:500,
                    auto:true,
                    loop:true,
                    onSliderLoad: function() {
                        $('#image-gallery').removeClass('cS-hidden');
                    }  
                });
            });
        </script>
        </body>
    </html>