@extends('layouts.app', ['titlePage' => __('Epins')])
@section('css')
    <style>
        .username_html {
            background-color: #fff;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
        }
        .username_html option {
            border-bottom: 1px solid #f4f4f4;
            padding: 7px 15px;
        }
        .username_html option:hover{
            cursor: pointer;
            background-color:#54458b;
            color:#fff;
        }
    </style>
@stop
@if(Auth::user()->admin)
    @section('content-header')
    <h1>Generate Epin Category</h1><hr>
        <form action="{{route('generate.epinCategory')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <br><button class="btn btn-info">Generate</button>
                </div>
            </div><br><br>
        </form>
        <h1>Generate Epin</h1><hr>
        <form action="{{route('generate.epin')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="">--Select--</option>
                        @foreach(App\EpinCategory::all() as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="no">Number Of EPins</label>
                    <input type="number" name="no" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <br><button class="btn btn-info">Generate</button>
                </div>
            </div><br><br>
        </form>
    @stop
@endif

@section('content-body')
<h1>Send Epins</h1><hr>
<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="username">Username</label>
            <div class="dropdown">	<div id="myDropdown" class="dropdown-content">
            <input class="form-control username-name" onkeyup="UsernameDataExtract(this)" name="username" id="myInput" type="text" required="true" aria-required="true"/>
            <div class="username_html"></div></div></div>
        </div>
        <div class="col-md-3">
            <label for="epin_type">Epin Type</label>
            <select name="epin_type" class="form-control" required>
                <option value="">--Select--</option>
                @foreach(App\EpinCategory::all() as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="no_of_pins">Number Of Pins</label>
            <input type="number" name="no_of_pins" class="form-control">
        </div>
        <div class="col-md-3"><br>
            <button type="submit" class="btn btn-md btn-info">Send</button>
        </div>
    </div>
</form>
<br><br>
<h1>Epins</h1><hr>
<table class="table tabel-bordered">
    <thead>
        <tr>
            <th>Sno.</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Used By</th>
            <th>Used On</th>
        </tr>
    </thead>
    <tbody>
        <?php $i =1; ?>
        @foreach($user->epins as $epin)
            <tr>
                <th>{{$i++}}.</th>
                <td>{{$epin->epin}}</td>
                <td>{{$epin->amount}}</td>
                <td>
                    @if($epin->used_by)
                        {{App\User::find($epin->used_by)->name}}
                    @else
                        {{'--'}}    
                    @endif
                </td>
                <td>
                    @if($epin->used_by)
                        {{App\User::find($epin->used_by)->created_at}}
                    @else
                        {{"--"}}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
@section('js')
    <script>
        function UsernameDataExtract(test){
            $value = test.value;
            $.ajax({
                type : 'get',
                url : '{{URL::to('searchUsername')}}',
                data:{'search':$value},
                success:function(data){
                    $(test).next(".username_html").html(data);
                }
            });
        }
        function UsernameAssign(temp){
            var div = $(temp).closest(".dropdown-content");
            div.find('.username-name').val(temp.value);
            $(temp).closest(".username_html").html('');
        }

    </script>
@stop