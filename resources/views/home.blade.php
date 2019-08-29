@extends('layouts.app', ['titlePage' => __('Dashboard')])
@section('content-header')
    <div class="alert alert-success text-center" role="alert">
        Username: <a href="javascript:void(0)" class="alert-link">{{Auth::user()->username}} ({{Auth::user()->name}})</a>
    </div>
    @if(!Auth::user()->details->email_verification)
        <div class="alert alert-warning text-center alert-dismissible show" role="alert">
        Your Email is not verified. Please verify your Email.  <a href="{{route('resend.verification')}}"><u> Resend Verification</u></a> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
@if(!Auth::user()->campaign)
    @if(!Auth::user()->admin)
        @if(Auth::user()->coordinates)
            @if(!Auth::user()->coordinates->eligible_for_reward)
                @php
                    $days = 7 - Carbon\Carbon::parse(Carbon\Carbon::now()->toDateString())->diffIndays(Carbon\Carbon::parse(Auth::user()->created_at->toDateString()))
                @endphp
                @if($days <= 7 and $days > 0)
                    <div class="alert alert-info text-center" role="alert">
                        Complete 5 Members in level one within {{$days}} days to unlock Reward Section.
                    </div>
                @endif
            @endif
        @endif
        @if(Auth::user()->KYC->count()<3)
            <div class="alert alert-danger text-center alert-dismissible show" role="alert">
            Your KYC document is not verified, Please verify your KYC document. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
    @endif
@endif
@endsection

@if(!Auth::user()->campaign)
    @section('content-body')
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left media-middle">
                                    <h5>Edit Your Profile</h4>
                                    <a href="{{route('account.settings',Auth::user())}}">View <i class="icon-angle-right"></i></a>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left media-middle">
                                    <h5>Campaigns</h4>
                                    <a href="{{route('my.campaign',Auth::user())}}">View <i class="icon-angle-right"></i></a>
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
                                    <h5>Contributors</h4>
                                    <a href="{{route('contribution.viewer',Auth::user())}}">View <i class="icon-angle-right"></i></a>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-grid2 red font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->admin)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left media-middle">
                                        <h5>Setings</h4>
                                        <a href="{{route('settings')}}">View <i class="icon-angle-right"></i></a>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-settings green font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left media-middle">
                                        <h5>Support Tickets</h4>
                                        <a href="{{route('support.createTickets')}}">View <i class="icon-angle-right"></i></a>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-support green font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left media-middle">
                                    <h5>Epins</h4>
                                    <a href="{{route('epins')}}">View <i class="icon-angle-right"></i></a>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-compass2 purple font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left media-middle">
                                    <h5>Wallets</h4>
                                    <a href="{{route('wallets')}}">View <i class="icon-angle-right"></i></a>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-wallet blue font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!Auth::user()->admin)
                @if(App\Details::where('username',Auth::user()->details->invited_by)->first()->user->coordinates != null)
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        @if(Auth::user()->UpgradeWallet->pluck('amount')->sum() < App\Settings::first()->upgrade_to_standard)
                            <div class="contribute-div">
                                <div class="media overflow-visible">
                                    <div class="media-body media-middle overflow-visible">
                                        <div class="heading-tag">Basic</div>
                                        <h2>INR {{App\Settings::first()->basic_amount}}</h2>
                                        @if(Auth::user()->donations()->where('package','BASIC')->first() != null)
                                            <h6 class="text-muted">{{Auth::user()->donations()->where('package','BASIC')->first()->created_at}}</h6>
                                        @else
                                            <a href="javascript:void(0)" onclick="contribute(this);"><span class="badge bg-info">Contribute Now</span><input type="hidden" class="package" value="">
                                                <input type="hidden" class="amount" name="amount" value="{{App\Settings::first()->basic_amount}}">
                                                <input type="hidden" class="packagee" name="package" value="BASIC">
                                                <input type="hidden" class="ep" name="ep"   @if(App\Epin::where('sent_to',Auth::id())->where('rate',App\Settings::first()->basic_amount)->where('used_by',null)->first()) 
                                                                                                value="{{App\Epin::where('sent_to',Auth::id())->where('rate',App\Settings::first()->basic_amount)->where('used_by',null)->first()->epin}}"
                                                                                            @endif
                                                >
                                            </a>
                                        @endif
                                    </div>
                                    <div class="media-right">
                                        <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->UpgradeWallet->pluck('amount')->sum() < App\Settings::first()->upgrade_to_premium)
                            <div class="contribute-div">
                                <div class="media overflow-visible">
                                    <div class="media-body media-middle overflow-visible">
                                        <div class="heading-tag standard-gradient">Standard</div>
                                        <h2>INR {{App\Settings::first()->standard_amount}}</h2>
                                        @if(Auth::user()->donations()->where('package','STANDARD')->first() != null)
                                            <h6 class="text-muted">{{Auth::user()->donations()->where('package','STANDARD')->first()->created_at}}</h6>
                                        @else
                                            <a href="javascript:void(0)" onclick="contribute(this);"><span class="badge bg-info">Contribute Now</span><input type="hidden" class="package" value="">
                                                <input type="hidden" class="amount" name="amount" value="{{App\Settings::first()->standard_amount}}">
                                                <input type="hidden" class="packagee" name="package" value="STANDARD">
                                                <input type="hidden" class="ep" name="ep"   @if(App\Epin::where('sent_to',Auth::id())->where('rate',App\Settings::first()->standard_amount)->where('used_by',null)->first()) 
                                                                                                value="{{App\Epin::where('sent_to',Auth::id())->where('rate',App\Settings::first()->standard_amount)->where('used_by',null)->first()->epin}}"
                                                                                            @endif
                                                >
                                            </a>
                                        @endif
                                    </div>
                                    <div class="media-right">
                                        <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->UpgradeWallet->pluck('amount')->sum() >= App\Settings::first()->upgrade_to_premium)
                            <div class="contribute-div">
                                <div class="media overflow-visible">
                                    <div class="media-body media-middle overflow-visible">
                                        <div class="heading-tag premium-gradient">Premium</div>
                                        <h2>INR {{App\Settings::first()->premium_amount}}</h2>
                                        @if(Auth::user()->donations()->where('package','Premium')->first() != null)
                                            <h6 class="text-muted">{{Auth::user()->donations()->where('package','Premium')->first()->created_at}}</h6>
                                        @else
                                            <a href="javascript:void(0)" onclick="contribute(this);"><span class="badge bg-info">Contribute Now</span><input type="hidden" class="package" value="">
                                                <input type="hidden" class="amount" name="amount" value="{{App\Settings::first()->premium_amount}}">
                                                <input type="hidden" class="packagee" name="package" value="Premium">
                                                <input type="hidden" class="ep" name="ep"   @if(App\Epin::where('sent_to',Auth::id())->where('rate',App\Settings::first()->premium_amount)->where('used_by',null)->first()) 
                                                                                                value="{{App\Epin::where('sent_to',Auth::id())->where('rate',App\Settings::first()->premium_amount)->where('used_by',null)->first()->epin}}"
                                                                                            @endif
                                                >
                                            </a>
                                        @endif
                                    </div>
                                    <div class="media-right">
                                        <img src="{{asset('app/images/medal1.png')}}" alt="gold medal" class="media-object"/>
                                    </div>
                                </div>
                            </div>
                        @else

                        @endif
                    </div>
                @endif
            @else
                <div class="col-xl-3 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Number Of Persons</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Coordinates::where('id','!=',1)->pluck('row')->unique() as $r)
                                        <tr>
                                            <th>{{__('Level ')}}{{$r}}</th>
                                            <td>
                                                {{App\Coordinates::where('row',$r)->count()}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if(Auth::user()->admin)
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">BASIC</th>
                                <th class="text-center">STANDARD</th>
                                <th class="text-center">PREMIUM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $admin_basics = App\Donation::where('package','BASIC')->pluck('user_id');
                                $admin_standards = App\Donation::where('package','STANDARD')->pluck('user_id'); 
                                $admin_premiums = App\Donation::where('package','Premium')->pluck('user_id'); 
                            @endphp
                            <tr>
                                <th class="text-center">
                                    @if($admin_basics->count())
                                        <a href="javascript:void(0)" data-target="#admin_basic_modal" data-toggle="modal">
                                            {{$admin_basics->count() .' Persons'}}
                                        </a>
                                    @else
                                        {{__("0 Persons")}}
                                    @endif
                                </th>
                                <th class="text-center">
                                    @if($admin_standards->count())
                                        <a href="javascript:void(0)" data-target="#admin_standard_modal" data-toggle="modal">
                                            {{$admin_standards->count(). ' Persons'}}
                                        </a>
                                    @else
                                        {{__("0 Persons")}}
                                    @endif
                                </th>
                                <th class="text-center">
                                    @if($admin_premiums->count())
                                        <a href="javascript:void(0)" data-target="#admin_premium_modal" data-toggle="modal">
                                            {{$admin_premiums->count(). ' Persons'}}
                                        </a>
                                    @else
                                        {{__("0 Persons")}}
                                    @endif
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="admin_basic_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Basic</h4>
                        </div>
                    
                        <!-- Modal body -->
                        <div class="modal-body">
                            @if($admin_basics->count())
                                @foreach($admin_basics->chunk(3) as $id)
                                    <div class="row">
                                        @foreach($id as $i)
                                            @php
                                            $user = App\User::find($i);
                                            @endphp
                                            <div class="col-md-4">
                                                <img 
                                                @if($user->details->avatar)
                                                src="{{$user->details->avatar}}"
                                                @else
                                                src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                @endif
                                                alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$user->username}} <br> </strong> ({{$user->name}})
                                            </div>
                                        @endforeach
                                    </div><hr><br>
                                @endforeach
                            @endif
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="admin_standard_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">STANDARD</h4>
                        </div>
                    
                        <!-- Modal body -->
                        <div class="modal-body">
                            @if($admin_standards->count())
                                @foreach($admin_standards->chunk(3) as $id)
                                    <div class="row">
                                        @foreach($id as $i)
                                            @php
                                            $user = App\User::find($i);
                                            @endphp
                                            <div class="col-md-4">
                                                <img 
                                                @if($user->details->avatar)
                                                src="{{$user->details->avatar}}"
                                                @else
                                                src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                @endif
                                                alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$user->username}} <br> </strong> ({{$user->name}})
                                            </div>
                                        @endforeach
                                    </div><hr><br>
                                @endforeach
                            @endif
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="modal fade" id="admin_premium_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">PREMIUM</h4>
                        </div>
                    
                        <!-- Modal body -->
                        <div class="modal-body">
                            @if($admin_premiums->count())
                                @foreach($admin_premiums->chunk(3) as $id)
                                    <div class="row">
                                        @foreach($id as $i)
                                            @php
                                            $user = App\User::find($i);
                                            @endphp
                                            <div class="col-md-4">
                                                <img 
                                                @if($user->details->avatar)
                                                src="{{$user->details->avatar}}"
                                                @else
                                                src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                @endif
                                                alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$user->username}} <br> </strong> ({{$user->name}})
                                            </div>
                                        @endforeach
                                    </div><hr><br>
                                @endforeach
                            @endif
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if(Auth::user()->coordinates)
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">Level 1</th>
                                    <th class="text-center">Level 2</th>
                                    <th class="text-center">Level 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:300px;">
                                        <img 
                                        @if(Auth::user()->details->avatar)
                                            src="{{Auth::user()->details->avatar}}"
                                        @else
                                            src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                        @endif
                                        alt="avatar" style="border-radius:50%;width:50px;"><strong> {{Auth::user()->username}}</strong> ({{Auth::user()->name}})
                                    </td>
                                    <th class="text-center">
                                        @if(Auth::user()->coordinates->children != null)
                                            <a href="javascript:void(0)" data-target="#modal" data-toggle="modal">{{count(explode(',',Auth::user()->coordinates->children)).' Persons'}}</a>
                                        @else
                                            {{__("0 Persons")}}
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        @if(Auth::user()->coordinates->super_children != null)
                                            <a href="javascript:void(0)" data-target="#super_modal" data-toggle="modal">{{count(explode(',',Auth::user()->coordinates->super_children)).' Persons'}}</a>
                                        @else
                                            {{__("0 Persons")}}
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        @if(Auth::user()->coordinates->super_duper_children != null)
                                            <a href="javascript:void(0)" data-target="#super_duper_modal" data-toggle="modal">{{count(explode(',',Auth::user()->coordinates->super_duper_children)).' Persons'}}</a>
                                        @else
                                            {{__("0 Persons")}}
                                        @endif
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">BASIC</th>
                                    <th class="text-center">STANDARD</th>
                                    <th class="text-center">PREMIUM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $ids = App\Coordinates::where('parent',Auth::id())->orWhere('super_parent',Auth::id())->orWhere('super_duper_parent',Auth::id())->pluck('user_id');
                                    $standards = App\Donation::where('package','STANDARD')->pluck('user_id')->concat($ids)->duplicates(); 
                                    $premiums = App\Donation::where('package','Premium')->pluck('user_id')->concat($ids)->duplicates(); 
                                @endphp
                                <tr>
                                    <th class="text-center">
                                        @if($ids)
                                            <a href="javascript:void(0)" data-target="#basic_modal" data-toggle="modal">
                                                {{$ids->count() .' Persons'}}
                                            </a>
                                        @else
                                            {{__("0 Persons")}}
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        @if($standards->count())
                                            <a href="javascript:void(0)" data-target="#standard_modal" data-toggle="modal">
                                                {{$standards->count(). ' Persons'}}
                                            </a>
                                        @else
                                            {{__("0 Persons")}}
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        @if($premiums->count())
                                            <a href="javascript:void(0)" data-target="#premium_modal" data-toggle="modal">
                                                {{$premiums->count(). ' Persons'}}
                                            </a>
                                        @else
                                            {{__("0 Persons")}}
                                        @endif
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="basic_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Basic</h4>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                @if($ids->count())
                                    @foreach($ids->chunk(3) as $id)
                                        <div class="row">
                                            @foreach($id as $i)
                                                @php
                                                $user = App\User::find($i);
                                                @endphp
                                                <div class="col-md-4">
                                                    <img 
                                                    @if($user->details->avatar)
                                                    src="{{$user->details->avatar}}"
                                                    @else
                                                    src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                    @endif
                                                    alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$user->username}} <br> </strong> ({{$user->name}})
                                                </div>
                                            @endforeach
                                        </div><hr><br>
                                    @endforeach
                                @endif
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="standard_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">STANDARD</h4>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                @if($standards->count())
                                    @foreach($standards->chunk(3) as $id)
                                        <div class="row">
                                            @foreach($id as $i)
                                                @php
                                                $user = App\User::find($i);
                                                @endphp
                                                <div class="col-md-4">
                                                    <img 
                                                    @if($user->details->avatar)
                                                    src="{{$user->details->avatar}}"
                                                    @else
                                                    src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                    @endif
                                                    alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$user->username}} <br> </strong> ({{$user->name}})
                                                </div>
                                            @endforeach
                                        </div><hr><br>
                                    @endforeach
                                @endif
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="modal fade" id="premium_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">PREMIUM</h4>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                @if($premiums->count())
                                    @foreach($premiums->chunk(3) as $id)
                                        <div class="row">
                                            @foreach($id as $i)
                                                @php
                                                $user = App\User::find($i);
                                                @endphp
                                                <div class="col-md-4">
                                                    <img 
                                                    @if($user->details->avatar)
                                                    src="{{$user->details->avatar}}"
                                                    @else
                                                    src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                    @endif
                                                    alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$user->username}} <br> </strong> ({{$user->name}})
                                                </div>
                                            @endforeach
                                        </div><hr><br>
                                    @endforeach
                                @endif
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="modal fade" id="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Level 1</h4>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                @if(Auth::user()->coordinates->children != null)
                                    @foreach(collect(App\User::find(explode(',',Auth::user()->coordinates->children)))->chunk(3) as $users)
                                        <div class="row">
                                            @foreach($users as $u)
                                                <div class="col-md-4">
                                                    <img 
                                                    @if($u->details->avatar)
                                                        src="{{$u->details->avatar}}"
                                                    @else
                                                        src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                    @endif
                                                    alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$u->username}} <br> </strong> ({{$u->name}})
                                                </div>
                                            @endforeach
                                        </div><hr><br>
                                    @endforeach
                                @endif
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="super_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Level 2</h4>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                @if(Auth::user()->coordinates->super_children != null)
                                    @foreach(collect(App\User::find(explode(',',Auth::user()->coordinates->super_children)))->chunk(3) as $users)
                                        <div class="row">
                                            @foreach($users as $u)
                                                <div class="col-md-4">
                                                    <img 
                                                    @if($u->details->avatar)
                                                        src="{{$u->details->avatar}}"
                                                    @else
                                                        src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                    @endif
                                                    alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$u->username}} <br> </strong> ({{$u->name}})
                                                </div>
                                            @endforeach
                                        </div><hr><br>
                                    @endforeach
                                @endif
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="super_duper_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Level 3</h4>
                            </div>
                        
                            <!-- Modal body -->
                            <div class="modal-body">
                                @if(Auth::user()->coordinates->super_duper_children != null)
                                    @foreach(collect(App\User::find(explode(',',Auth::user()->coordinates->super_duper_children)))->chunk(3) as $users)
                                        <div class="row">
                                            @foreach($users as $u)
                                                <div class="col-md-4">
                                                    <img 
                                                    @if($u->details->avatar)
                                                        src="{{$u->details->avatar}}"
                                                    @else
                                                        src="{{asset('app/images/portrait/small/avatar-s-1.png')}}"
                                                    @endif
                                                    alt="avatar" style="border-radius:50%;width:50px;"> <br><strong> {{$u->username}} <br> </strong> ({{$u->name}})
                                                </div>
                                            @endforeach
                                        </div><hr><br>
                                    @endforeach
                                @endif
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <!--/ stats -->
        <!--/ project charts -->
        {{-- <div class="row">
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
        </div> --}}

        

        <button type="button" id="modalButton" data-toggle="modal" data-target="#contributeModal" style="display:none;"></button>
        <div id="modalDisplay"></div>
    @endsection
@endif
@section('js')
    <script>
        function contribute(temp){
            
            var amount = $(temp).find('.amount').val();
            var packages = $(temp).find('.packagee').val();
            var epin =  $(temp).find('.ep').val();
            var route = '{{route("contribute")}}';
            if(packages == 'BASIC'){
                var a = '';
            }else if(packages == 'STANDARD'){
                var a = '_standard';
            }else if(packages == 'Premium'){
                var a = '_premium';
            }
            var modal = 
            '<div class="modal fade" id="contributeModal">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                        '<!-- Modal Header -->'+
                        '<div class="modal-header">'+
                        '<h4 class="modal-title">Details</h4>'+
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                        '</div>'+
                    '<form action="'+route+'" method="post">'+
                    '@csrf'+
                        '<!-- Modal body -->'+
                        '<div class="modal-body">'+
                        '<input type="hidden" value="'+ packages +'" name="package">'+
                        '<input type="hidden" value="'+ amount +'" name="amount">'+
                        '<input type="hidden" value="'+a+'" name="a">'+
                        '<input type="text" class="form-control" placeholder="Enter Epin" value="'+epin+'" name="epin"><br>'+
                        '<p>Are You Sure You Want To Donate INR '+amount+' in '+packages+' Package?</p>'+
                        '</div>'+
                
                        '<!-- Modal footer -->'+
                        '<div class="modal-footer">'+
                        '<input type="submit" value="Yes" onclick="this.form.submit();  this.value=`Verifying...`; this.disabled=true;"  class="btn btn-info">&nbsp;'+
                        '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>'+
                        '</div>'+
                    '</form>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $('#modalDisplay').html(modal);
            $('#modalButton').click();
        }
    </script>
@stop