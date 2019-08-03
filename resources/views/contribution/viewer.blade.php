@extends('layouts.app', ['titlePage' => __('Contribution Viewer')])
@section('content-body')
    <h1>Contribution Viewer</h1><hr>
    @if($user->coordinates != null)
        <div class="tree-view">
            <ul style="margin-top: 20px;">
                <li><a href="#" class="addBorderBefore" style="font-weight: normal; color: rgb(66, 139, 202);">{{$user->name}}</a>
                    <ul style="margin-top: 20px;">
                        @foreach(collect($user->findChildren($user->id)) as $name)
                            <li style="border-left: 1px solid gray;"><a href="#" style="font-weight: normal; color: rgb(66, 139, 202);">{{$name}}</a>
                                @if($name != 'N/A')
                                    <ul style="border-left: 1px solid gray; margin-top: 30px;">
                                        @foreach(collect($user->findChildren(App\User::where('name',$name)->first()->id)) as $c)
                                            <li ><a href="#">{{$c}}</a>
                                                @if($c != 'N/A')
                                                    <ul style="border-left: 1px solid gray; margin-top: 30px;">
                                                        @foreach(collect($user->findChildren(App\User::where('name',$c)->first()->id)) as $d)
                                                            <li><a href="#">{{$d}}</a></li>
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