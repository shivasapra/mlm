<?php use App\Details; ?>
@extends('layouts.app', ['titlePage' => __('Contribution Viewer')])
@section('content-body')
    <h1>Contribution Viewer</h1>
        @if($user->coordinates != null)
            <div class="tree-view">
                <ul style="margin-top: 20px;">
                    <li><a href="#" class="addBorderBefore" style="font-weight: normal; color: rgb(66, 139, 202);">{{$user->details->username}}</a>
                        <ul style="margin-top: 20px;">
                            @foreach(collect($user->findChildren($user->id)) as $name)
                                <li style="border-left: 1px solid gray;">
                                    <a href="#" style="font-weight: normal; color: rgb(66, 139, 202);"><span class="@if($name != 'N/A') @if(Details::where('username',$name)->first()->invited_by == $user->details->username) text-danger @endif @endif">{{$name}}
                                        @if($name != 'N/A') @if(Details::where('username',$name)->first()->user->donations->pluck('package')->contains('BASIC'))
                                            <div class="heading-tag" style="margin-left:10px;">Basic</div> 
                                        @endif @endif
                                        @if($name != 'N/A') @if(Details::where('username',$name)->first()->user->donations->pluck('package')->contains('STANDARD'))
                                            <div class="heading-tag standard-gradient" style="margin-left:10px;">STANDARD</div> 
                                        @endif @endif
                                        @if($name != 'N/A') @if(Details::where('username',$name)->first()->user->donations->pluck('package')->contains('Premium'))
                                            <div class="heading-tag premium-gradient" style="margin-left:10px;">PREMIUM</div>
                                        @endif @endif
                                    </span></a>
                                    @if($name != 'N/A')
                                        <ul style="border-left: 1px solid gray; margin-top: 30px;">
                                            @foreach(collect($user->findChildren(Details::where('username',$name)->first()->user->id)) as $c)
                                                <li ><a href="#"><span class="@if($c != 'N/A') @if(Details::where('username',$c)->first()->invited_by == $user->details->username) text-danger @endif @endif">{{$c}}
                                                    @if($c != 'N/A') @if(Details::where('username',$c)->first()->user->donations->pluck('package')->contains('BASIC'))
                                                        <div class="heading-tag" style="margin-left:10px;">Basic</div> 
                                                    @endif @endif
                                                    @if($c != 'N/A') @if(Details::where('username',$c)->first()->user->donations->pluck('package')->contains('STANDARD'))
                                                        <div class="heading-tag standard-gradient" style="margin-left:10px;">STANDARD</div> 
                                                    @endif @endif
                                                    @if($c != 'N/A') @if(Details::where('username',$c)->first()->user->donations->pluck('package')->contains('Premium'))
                                                        <div class="heading-tag premium-gradient" style="margin-left:10px;">PREMIUM</div>
                                                    @endif @endif
                                                </span></a>
                                                    @if($c != 'N/A')
                                                        <ul style="border-left: 1px solid gray; margin-top: 30px;">
                                                            @foreach(collect($user->findChildren(Details::where('username',$c)->first()->user->id)) as $d)
                                                                <li><a href="#"><span class="@if($d != 'N/A') @if(Details::where('username',$d)->first()->invited_by == $user->details->username) text-danger @endif @endif">{{$d}}
                                                                    @if($d != 'N/A') @if(Details::where('username',$d)->first()->user->donations->pluck('package')->contains('BASIC'))
                                                                    <div class="heading-tag" style="margin-left:10px;">Basic</div> 
                                                                    @endif @endif
                                                                    @if($d != 'N/A') @if(Details::where('username',$d)->first()->user->donations->pluck('package')->contains('STANDARD'))
                                                                        <div class="heading-tag standard-gradient" style="margin-left:10px;">STANDARD</div> 
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