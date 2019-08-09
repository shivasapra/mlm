<?php use App\Details; ?>
@extends('layouts.app', ['titlePage' => __('Contribution Viewer')])
@section('content-body')
    <h1>Contribution Viewer</h1><hr>
    @if($user->coordinates != null)
        <div class="tree-view">
            <ul style="margin-top: 20px;">
                <li><a href="#" class="addBorderBefore" style="font-weight: normal; color: rgb(66, 139, 202);">{{$user->details->username}}</a>
                    <ul style="margin-top: 20px;">
                        @foreach(collect($user->findChildren($user->id)) as $name)
                            <li style="border-left: 1px solid gray;"><a href="#" style="font-weight: normal; color: rgb(66, 139, 202);"><span class="@if($name != 'N/A') @if(Details::where('username',$name)->first()->invited_by == $user->details->username) text-danger @endif @endif">{{$name}}</span></a>
                                @if($name != 'N/A')
                                    <ul style="border-left: 1px solid gray; margin-top: 30px;">
                                        @foreach(collect($user->findChildren(Details::where('username',$name)->first()->user->id)) as $c)
                                            <li ><a href="#"><span class="@if($c != 'N/A') @if(Details::where('username',$c)->first()->invited_by == $user->details->username) text-danger @endif @endif">{{$c}}</span></a>
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