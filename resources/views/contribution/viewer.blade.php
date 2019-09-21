<?php use App\Details; ?>
@extends('layouts.app', ['titlePage' => __('Contribution Viewer')])
@section('content-body')
    <h1>Contribution Viewer</h1>
        @if($user->coordinates != null)
            <div class="tree-view">
                <ul style="margin-top: 20px;">
                    <li><a href="javascript:void(0)" class="addBorderBefore" style="font-weight: normal; color: rgb(66, 139, 202);">{{$user->details->username}}
                        ({{$user->name}})
                        ({{ (($user->coordinates->children != null)? count(explode(',',$user->coordinates->children)): 0)  + (($user->coordinates->super_children != null)? count(explode(',',$user->coordinates->super_children)): 0) + (($user->coordinates->super_duper_children != null)? count(explode(',',$user->coordinates->super_duper_children)) : 0)}})    
                        </a> 
                        <ul style="margin-top: 20px;">
                            @foreach(collect($user->findChildren($user->id)) as $name)
                                <li style="border-left: 1px solid gray;">
                                    @if(Auth::user()->admin and $name != 'N/A')
                                    <a href="{{route('contribution.viewer',App\User::where('username',$name)->first())}}" style="background-image:none !important; color:#000 !important;">View</a>
                                    @endif
                                    <a  href="javascript:void(0)" onclick="clickContributors(this);" style="font-weight: normal; color: rgb(66, 139, 202);"><span class="@if($name != 'N/A') @if(Details::where('username',$name)->first()->invited_by == $user->details->username)  @endif @endif">  {{$name}} 
                                        @if($name != 'N/A')
                                            ({{App\User::where('username',$name)->first()->name}})
                                            - Team({{ ((App\User::where('username',$name)->first()->coordinates->children != null)? count(explode(',',App\User::where('username',$name)->first()->coordinates->children)): 0)  + ((App\User::where('username',$name)->first()->coordinates->super_children != null)? count(explode(',',App\User::where('username',$name)->first()->coordinates->super_children)): 0) + ((App\User::where('username',$name)->first()->coordinates->super_duper_children != null)? count(explode(',',App\User::where('username',$name)->first()->coordinates->super_duper_children)) : 0)}}) - Level(1)   
                                        @endif


                                        @if($name != 'N/A') @if(Details::where('username',$name)->first()->user->donations->pluck('package')->contains('BASIC'))
                                            <div class="heading-tag" style="margin-left:10px;margin-bottom:0;">Basic</div> 
                                        @endif @endif
                                        @if($name != 'N/A') @if(Details::where('username',$name)->first()->user->donations->pluck('package')->contains('STANDARD'))
                                            <div class="heading-tag standard-gradient" style="margin-left:10px;margin-bottom:0;">STANDARD</div> 
                                        @endif @endif
                                        @if($name != 'N/A') @if(Details::where('username',$name)->first()->user->donations->pluck('package')->contains('Premium'))
                                            <div class="heading-tag premium-gradient" style="margin-left:10px;margin-bottom:0;">PREMIUM</div>
                                        @endif @endif
                                    </span></a>
                                    
                                    @if($name != 'N/A')
                                        <ul class="openContributors" style="display:none;border-left: 1px solid gray; margin-top: 30px;">
                                            @foreach(collect($user->findChildren(Details::where('username',$name)->first()->user->id)) as $c)
                                                <li>
                                                    @if(Auth::user()->admin and $c != 'N/A')
                                                        <a href="{{route('contribution.viewer',App\User::where('username',$c)->first())}}" style="background-image:none !important; color:#000 !important;">View</a>
                                                    @endif
                                                    <a href="javascript:void(0)" onclick="clickContributors(this);"><span class="@if($c != 'N/A') @if(Details::where('username',$c)->first()->invited_by == $user->details->username)  @endif @endif">{{$c}} 
                                                    @if($c != 'N/A')
                                                        ({{App\User::where('username',$c)->first()->name}}) 
                                                        - Team({{ ((App\User::where('username',$c)->first()->coordinates->children != null)? count(explode(',',App\User::where('username',$c)->first()->coordinates->children)): 0)  + ((App\User::where('username',$c)->first()->coordinates->super_children != null)? count(explode(',',App\User::where('username',$c)->first()->coordinates->super_children)): 0) + ((App\User::where('username',$c)->first()->coordinates->super_duper_children != null)? count(explode(',',App\User::where('username',$c)->first()->coordinates->super_duper_children)) : 0)}}) - Level(2)  
                                                    @endif


                                                    @if($c != 'N/A') @if(Details::where('username',$c)->first()->user->donations->pluck('package')->contains('BASIC'))
                                                        <div class="heading-tag" style="margin-left:10px;margin-bottom:0;">Basic</div> 
                                                    @endif @endif
                                                    @if($c != 'N/A') @if(Details::where('username',$c)->first()->user->donations->pluck('package')->contains('STANDARD'))
                                                        <div class="heading-tag standard-gradient" style="margin-left:10px;margin-bottom:0;">STANDARD</div> 
                                                    @endif @endif
                                                    @if($c != 'N/A') @if(Details::where('username',$c)->first()->user->donations->pluck('package')->contains('Premium'))
                                                        <div class="heading-tag premium-gradient" style="margin-left:10px;margin-bottom:0;">PREMIUM</div>
                                                    @endif @endif
                                                </span></a>
                                                
                                                    @if($c != 'N/A')
                                                        <ul class="openContributors" style="display:none;border-left: 1px solid gray; margin-top: 30px;">
                                                            @foreach(collect($user->findChildren(Details::where('username',$c)->first()->user->id)) as $d)
                                                                <li>
                                                                    @if(Auth::user()->admin and $d != 'N/A')
                                                                        <a href="{{route('contribution.viewer',App\User::where('username',$d)->first())}}" style="background-image:none !important; color:#000 !important;">View</a>
                                                                    @endif
                                                                    <a href="javascript:void(0)"><span class="@if($d != 'N/A') @if(Details::where('username',$d)->first()->invited_by == $user->details->username)  @endif @endif">{{$d}} 
                                                                    @if($d != 'N/A')
                                                                        ({{App\User::where('username',$d)->first()->name}})
                                                                        - Team({{ ((App\User::where('username',$d)->first()->coordinates->children != null)? count(explode(',',App\User::where('username',$d)->first()->coordinates->children)): 0)  + ((App\User::where('username',$d)->first()->coordinates->super_children != null)? count(explode(',',App\User::where('username',$d)->first()->coordinates->super_children)): 0) + ((App\User::where('username',$d)->first()->coordinates->super_duper_children != null)? count(explode(',',App\User::where('username',$d)->first()->coordinates->super_duper_children)) : 0)}}) - Level(3)   
                                                                    @endif


                                                                    @if($d != 'N/A') @if(Details::where('username',$d)->first()->user->donations->pluck('package')->contains('BASIC'))
                                                                    <div class="heading-tag" style="margin-left:10px;margin-bottom:0;">Basic</div> 
                                                                    @endif @endif
                                                                    @if($d != 'N/A') @if(Details::where('username',$d)->first()->user->donations->pluck('package')->contains('STANDARD'))
                                                                        <div class="heading-tag standard-gradient" style="margin-left:10px;margin-bottom:0;">STANDARD</div> 
                                                                    @endif @endif
                                                                    @if($d != 'N/A') @if(Details::where('username',$d)->first()->user->donations->pluck('package')->contains('Premium'))
                                                                        <div class="heading-tag premium-gradient" style="margin-left:10px;">PREMIUM</div>
                                                                    @endif @endif
                                                                </span></a></li>
                                                               
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
@endsection
@section('js')
        <script>
            function clickContributors(temp){
                $(temp).next('.openContributors').toggle();
            };
        </script>
@endsection