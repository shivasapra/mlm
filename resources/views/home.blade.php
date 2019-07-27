@extends('layouts.app', ['titlePage' => __('Dashboard')])
@section('content-header')
    <div class="alert alert-success text-center" role="alert">
        Your Referral Link: <a href="javascript:void(0)" class="alert-link">https://onlinesensor.com/balrajaggarwal</a>
    </div>
    <div class="alert alert-warning text-center alert-dismissible show" role="alert">
      Your mobile is not verified. Please verify your mobile <a href="#" class="alert-link">Verify Now</a> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="alert alert-danger text-center alert-dismissible show" role="alert">
      Your KYC document is not verified, Please verify your KYC document <a href="#" class="alert-link">Verify Now</a> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endsection
@section('content-body')
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Verification</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Edit Your Profile</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Edit Campain</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Contribute / Donate</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Withdraw Funds</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Fund Transfer</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Assigned Donors</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>System Fees Code</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Customer Care</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left media-middle">
                                <h5>Add Fund</h4>
                                <a href="#">View <i class="icon-angle-right"></i></a>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ stats -->
    <!--/ project charts -->
    <div class="row">
        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-inline text-xs-center pt-2 m-0">
                        <li class="mr-1">
                            <h6><i class="icon-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                        </li>
                        <li class="mr-1">
                            <h6><i class="icon-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                        </li>
                    </ul>
                    <div class="chartjs height-250">
                        <canvas id="line-stacked-area" height="250"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-xs-3 text-xs-center">
                            <span class="text-muted">Total Projects</span>
                            <h2 class="block font-weight-normal">18</h2>
                            <progress class="progress progress-xs mt-2 progress-success" value="70" max="100"></progress>
                        </div>
                        <div class="col-xs-3 text-xs-center">
                            <span class="text-muted">Total Task</span>
                            <h2 class="block font-weight-normal">125</h2>
                            <progress class="progress progress-xs mt-2 progress-success" value="40" max="100"></progress>
                        </div>
                        <div class="col-xs-3 text-xs-center">
                            <span class="text-muted">Completed Task</span>
                            <h2 class="block font-weight-normal">242</h2>
                            <progress class="progress progress-xs mt-2 progress-success" value="60" max="100"></progress>
                        </div>
                        <div class="col-xs-3 text-xs-center">
                            <span class="text-muted">Total Revenue</span>
                            <h2 class="block font-weight-normal">$11,582</h2>
                            <progress class="progress progress-xs mt-2 progress-success" value="90" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card card-inverse bg-info">
                <div class="card-body">
                    <div class="position-relative">
                        <div class="chart-title position-absolute mt-2 ml-2 white">
                            <h1 class="display-4">84%</h1>
                            <span>Employees Satisfied</span>
                        </div>
                        <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                        <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                            <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="icon-stats-bars"></i></a> for the last year.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ project charts -->
    <!-- Recent invoice with Statistics -->
    <div class="row match-height">
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-deep-orange media-left media-middle">
                            <i class="icon-user1 font-large-2 white"></i>
                        </div>
                        <div class="p-2 media-body">
                            <h5 class="deep-orange">New Users</h5>
                            <h5 class="text-bold-400">1,22,356</h5>
                            <progress class="progress progress-sm progress-deep-orange mt-1 mb-0" value="45" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-cyan media-left media-middle">
                            <i class="icon-camera7 font-large-2 white"></i>
                        </div>
                        <div class="p-2 media-body">
                            <h5>New Products</h5>
                            <h5 class="text-bold-400">28</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 media-body text-xs-left">
                            <h5>New Users</h5>
                            <h5 class="text-bold-400">1,22,356</h5>
                        </div>
                        <div class="p-2 text-xs-center bg-teal media-right media-middle">
                            <i class="icon-user1 font-large-2 white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Invoices</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Total paid invoices 240, unpaid 150. <span class="float-xs-right"><a href="#">Invoice Summary <i class="icon-arrow-right2"></i></a></span></p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Invoice#</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th>Due</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate"><a href="#">INV-001001</a></td>
                                    <td class="text-truncate">Elizabeth W.</td>
                                    <td class="text-truncate"><span class="tag tag-default tag-success">Paid</span></td>
                                    <td class="text-truncate">10/05/2016</td>
                                    <td class="text-truncate">$ 1200.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><a href="#">INV-001012</a></td>
                                    <td class="text-truncate">Andrew D.</td>
                                    <td class="text-truncate"><span class="tag tag-default tag-success">Paid</span></td>
                                    <td class="text-truncate">20/07/2016</td>
                                    <td class="text-truncate">$ 152.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><a href="#">INV-001401</a></td>
                                    <td class="text-truncate">Megan S.</td>
                                    <td class="text-truncate"><span class="tag tag-default tag-success">Paid</span></td>
                                    <td class="text-truncate">16/11/2016</td>
                                    <td class="text-truncate">$ 1450.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><a href="#">INV-01112</a></td>
                                    <td class="text-truncate">Doris R.</td>
                                    <td class="text-truncate"><span class="tag tag-default tag-warning">Overdue</span></td>
                                    <td class="text-truncate">11/12/2016</td>
                                    <td class="text-truncate">$ 5685.00</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate"><a href="#">INV-008101</a></td>
                                    <td class="text-truncate">Walter R.</td>
                                    <td class="text-truncate"><span class="tag tag-default tag-warning">Overdue</span></td>
                                    <td class="text-truncate">18/05/2016</td>
                                    <td class="text-truncate">$ 685.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent invoice with Statistics -->
    <div class="row match-height">
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card" style="height: 480px;">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src=" {{asset('app/images/carousel/05.jpg')}}" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">Basic</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-pink">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card" style="height: 480px;">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title">List Group</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill bg-primary float-xs-right">4</span> Cras justo odio
                        </li>
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill bg-info float-xs-right">2</span> Dapibus ac facilisis in
                        </li>
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill bg-warning float-xs-right">1</span> Morbi leo risus
                        </li>
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill bg-success float-xs-right">3</span> Porta ac consectetur ac
                        </li>
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill bg-danger float-xs-right">8</span> Vestibulum at eros
                        </li>
                    </ul>
                    <div class="card-block">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12">
            <div class="card" style="height: 480px;">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title">Carousel</h4>
                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item">
                                <img src=" {{asset('app/images/carousel/02.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item active">
                                <img src=" {{asset('app/images/carousel/03.jpg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src=" {{asset('app/images/carousel/01.jpg')}}" alt="Third slide">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-block">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $user = Auth::user();
        $level_one = array();
        $child_one_children = array();
        $child_two_children = array();
        $child_three_children = array();
        $child_four_children = array();
        $child_five_children = array();
        foreach(collect(explode(',', $user->coordinates->children)) as $c){
            array_push($level_one, $c) ;
        }
        foreach(collect($level_one[0]) as $c){
            foreach(collect(explode(',', App\User::find($c)->coordinates->children)) as $c){
                array_push($child_one_children,$c);
            }
        }

        foreach(collect($level_one[1]) as $c){
            foreach(collect(explode(',', App\User::find($c)->coordinates->children)) as $c){
                array_push($child_two_children,$c);
            }
        }
    ?>
<div class="row">
    <div class="home-tree-view">
        <ul class="text-center mb-2">
            <a href="#"><i class="icon-user"></i><br>{{$user->name}}</a>
        </ul>
        <ul class="text-center">
            <li>
                <a href="#"><i class="icon-user"></i><br>@if(array_key_exists(0,$level_one) ){{App\User::find($level_one[0])->name}}@else &nbsp; @endif</a><br>
                <ul class="text-center li-width-100">
                    @foreach(collect($child_one_children) as $c)
                        <li>
                            <a href="#"><i class="icon-user"></i><br>{{App\User::find($c)->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-user"></i><br>@if(array_key_exists(1,$level_one) ){{App\User::find($level_one[1])->name}}@else &nbsp; @endif</a><br>
                <ul class="text-center li-width-100">
                    @foreach(collect($child_two_children) as $c)
                        <li>
                            <a href="#"><i class="icon-user"></i><br>{{App\User::find($c)->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-user"></i><br>@if(array_key_exists(2,$level_one)){{App\User::find($level_one[2])->name}}@else &nbsp; @endif</a><br>
                <ul class="text-center li-width-100">
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-user"></i><br>@if( array_key_exists(3,$level_one)){{App\User::find($level_one[3])->name}}@else &nbsp; @endif</a><br>
                <ul class="text-center li-width-100">
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-user"></i><br>@if(array_key_exists(4,$level_one) ){{App\User::find($level_one[4])->name}}@else &nbsp; @endif</a><br>
                <ul class="text-center li-width-100">
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i><br>No Name</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

    {{-- <div class="row">
        <div class="text-center">
                {{ $admin->name }} <br>
            @foreach(collect(explode(',', $admin->coordinates->children)) as $c)
                {{App\User::find($c)->name}} <span class="mr-2">&nbsp;</span>
            @endforeach
        </div>
    </div> --}}
@endsection
