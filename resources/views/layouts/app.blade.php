<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>MLM Software</title>
    <link rel="apple-touch-icon" sizes="60x60" href=" {{asset('app/images/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href=" {{asset('app/images/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href=" {{asset('app/images/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href=" {{asset('app/images/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href=" {{asset('app/images/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href=" {{asset('app/images/ico/favicon-32.png')}}">
    
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/bootstrap.css')}}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href=" {{asset('app/fonts/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('app/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('app/vendors/css/extensions/pace.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/colors.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('app/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/style.css')}}">
    <!-- END Custom CSS-->

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  </head>
  
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.php" class="navbar-brand nav-link"><img alt="branding logo" src="{{asset('app/images/logo.png')}}" data-expand="{{asset('app/images/logo.png')}}" data-collapse="{{asset('app/images/logo/robust-logo-small.png')}}" class="brand-logo img-fluid"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span></h6>
                  </li>
                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-cart3 icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">You have new order!</h6>
                          <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-monitor3 icon-bg-circle bg-red bg-darken-1"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading red darken-1">99% Server load</h6>
                          <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Five hour ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-server2 icon-bg-circle bg-yellow bg-darken-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                          <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-check2 icon-bg-circle bg-green bg-accent-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Complete the task</h6><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last week</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-bar-graph-2 icon-bg-circle bg-teal"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Generate monthly report</h6><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-mail6"></i><span class="tag tag-pill tag-default tag-info tag-default tag-up">8</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-info float-xs-right m-0">4 New</span></h6>
                  </li>
                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src=" images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Margaret Govan</h6>
                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start the project.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src=" images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Bret Lezama</h6>
                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Tuesday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src=" images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Carie Berra</h6>
                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Friday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src=" images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Eric Alsobrook</h6>
                          <p class="notification-text font-small-3 text-muted">We have project party this saturday night.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{asset('app/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span><span class="user-name">John Doe</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                  {{-- <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="icon-power3"></i> Logout</a> --}}
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class="nav-item"><a href="index.php"><i class="icon-home3"></i><span class="menu-title">Dashboard</span><!-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span> --></a>
          </li>
          <li class=" nav-item"><a href="account-settings.php"><i class="icon-settings"></i><span class="menu-title">Account Settings</span></a>
            <!--<ul class="menu-content">-->
            <!--  <li><a href="#" class="menu-item">1 column</a>-->
            <!--  </li>-->
            <!--  <li><a href="#" class="menu-item">2 columns</a>-->
            <!--  </li>-->
            <!--</ul>-->
          </li>
          <li class=" nav-item"><a href="assignment-settings.php"><i class="icon-settings"></i><span class="menu-title">Assignment Settings</span></a>
          </li>
          <li class=" nav-item"><a href="campaign.php"><i class="icon-briefcase4"></i><span class="menu-title">My Campaign</span></a>
          </li>
          
          <li class=" nav-item"><a href="get-package.php"><i class="icon-whatshot"></i><span class="menu-title">Contribution</span></a>
          </li>

          <li class=" nav-item"><a href="pending-assignments.php"><i class="icon-compass3"></i><span class="menu-title">My Assignments</span></a>
          </li>

          <li class=" nav-item"><a href="direct-contributors.php"><i class="icon-grid2"></i><span class="menu-title">Contributors</span></a>
          </li>

          <li class=" nav-item"><a href="withdrawals.php"><i class="icon-eye6"></i><span class="menu-title">Withdrawals</span></a>
          </li>

          <li class=" nav-item"><a href="#"><i class="icon-paper"></i><span class="menu-title">My Transactions</span></a>
          </li>

          <li class=" nav-item"><a href="#"><i class="icon-table2"></i><span class="menu-title">System Fee Code</span></a>
          </li>

          <li class=" nav-item"><a href="#"><i class="icon-bar-graph-2"></i><span class="menu-title">Security</span></a>
          </li>

          <li class=" navigation-header"><span>Support</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-support"></i><span class="menu-title">Support</span></a>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-document-text"></i><span class="menu-title">Latest Updates</span></a>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-sign-out"></i><span class="menu-title">Log Out</span></a>
          </li>
        </ul>
      </div>
    </div>

    @yield('content')

    <footer class="footer footer-static footer-light navbar-border">
            <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2019 <a href="#" target="_blank" class="text-bold-800 grey darken-2">MLM Software </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Designed by <a href="#">Himsoft Solution </a></span></p>
          </footer>
      
      <!-- The Perk Update -->
      <div class="modal fade" id="addUpdate">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Update</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <form method="" action="">
                  <textarea id="summernote4" name="editordata" class="form-control" value=""></textarea>
              </form>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
      
          </div>
        </div>
      </div>
      
      
      <!-- The Modal -->
      <div class="modal fade" id="contributionViewModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Details</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <p>Topup On14-02-2016 18:54:49 <br>
              Activated On14-02-2016 18:54:49 <br>
              Payment TypeOS Contribution Wallet <br>
              WalletOS Contribution Wallet <br>
              Amount1625 INR </p>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>
      
      
      
          <!-- BEGIN VENDOR JS-->
          <script src=" {{asset('app/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
          <script src=" {{asset('app/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
          <script src=" {{asset('app/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
          <script src="{{asset('app/ vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
          <script src=" {{asset('app/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
          <script src=" {{asset('app/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
          <script src=" {{asset('app/vendors/js/ui/jquery.matchHeight-min.j')}}s" type="text/javascript"></script>
          <script src=" {{asset('app/vendors/js/ui/screenfull.min.j')}}s" type="text/javascript"></script>
          <script src=" {{asset('app/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
          <!-- BEGIN VENDOR JS-->
          <!-- BEGIN PAGE VENDOR JS-->
          <script src=" {{asset('app/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
          <!-- END PAGE VENDOR JS-->
          <!-- BEGIN JS-->
          <script src=" {{asset('app/js/core/app-menu.js')}}" type="text/javascript"></script>
          <script src=" {{asset('app/js/core/app.js')}}" type="text/javascript"></script>
          <!-- END JS-->
          <!-- BEGIN PAGE LEVEL JS-->
          <script src=" {{asset('app/js/scripts/pages/dashboard-lite.js')}}" type="text/javascript"></script>
          <!-- END PAGE LEVEL JS-->
      
          <!-- include summernote css/js -->
          <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
      
      <script>
        $(document).ready(function() {
        $('#summernote').summernote({
          placeholder: 'Enter',
          tabsize: 2,
          height: 100
        });
        $('#summernote1').summernote({
          placeholder: 'Enter',
          tabsize: 2,
          height: 100
        });
        $('#summernote2').summernote({
          placeholder: 'Enter',
          tabsize: 2,
          height: 100
        });
        $('#summernote3').summernote({
          placeholder: 'Enter',
          tabsize: 2,
          height: 100
        });
        $('#summernote4').summernote({
          placeholder: 'Enter',
          tabsize: 2,
          height: 100
        });
      });
      </script>
      
      <script type="text/javascript">
      $(document).ready(function(){
          $('#perk-shipping-location-show').click(function(){
              $('#perk-shipping-location-div').toggle();
          });
      });
      </script>
      
      <script type="text/javascript">
          function addPerkLocation(){
              var data= '<tr class="deleteRow">'+
              '<td>'+
                  '<select class="form-control" name="country">'+
                      '<option value="">World Wide</option>'+
                      '<option value="">India</option>'+
                      '<option value="">USA</option>'+
                      '<option value="">Dubai</option>'+
                  '</select>'+
              '</td>'+
              '<td>'+
                '<div class="input-group">'+
                    '<div class="input-group-prepend">'+
                      '<div class="input-group-text">'+
                        '<select class="form-control">'+
                          '<option value="2" data-minigoal = "50000" selected>INR ₹</option>'+
                          '<option value="1" data-minigoal = "1000" >USD $</option>'+
                          '<option value="9" data-minigoal = "1000" >EUR €</option>'+
                          '<option value="10" data-minigoal = "1000" >GBP £</option>'+
                          '<option value="13" data-minigoal = "1" >BTC ฿</option>'+
                        '</select>'+
                      '</div>'+
                    '</div>'+
                    '<input type="number" class="form-control" name="" value="0">'+
                  '</div>  '+
              '</td>'+
              '<td><a href="javascript:void(0)" onclick="removePerkLocation(this)"><i class="icon-cross"></i></a></td>'+
          '</tr>';
          $("#perkRowAdd").append(data);
          }
      </script>
      
      <script>
          function removePerkLocation(temp){
              $(temp).parents('.deleteRow').remove();
          }
      </script>
      
      <script>
          $("#embedShow").click(function(){
              $("#embedDiv").toggle();
          })
      </script>
        </body>
      </html>