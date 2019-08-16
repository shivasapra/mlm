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
    @section('content-body')
        <h1>Generate Epin Category</h1><hr>
            <form action="{{route('generate.epinCategory')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                            <label for="rate">Rate</label>
                            <input type="number" name="rate" class="form-control" required>
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
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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
        <h1>Send Epins</h1><hr>
            <form action="{{route('epins.send')}}" method="post">
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
                        <select name="epin_type" class="form-control" required onchange="category(this);">
                            <option value="">--Select--</option>
                            @foreach(App\EpinCategory::all() as $category)
                                @if($category->epins->where('sent_to','==',null)->count())
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="no_of_pins">Number Of Pins</label>
                        <input type="number" name="no_of_pins" id="max" class="form-control">
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
                        <th>Category</th>
                        <th>Number Of Epins</th>
                        <th>Available Epins</th>
                        <th>Rate</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =1; ?>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{$i++}}.</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->epins->count()}}</td>
                            <td>{{$category->epins->where('sent_to',null)->count()}}</td>
                            <td>{{$category->rate}}</td>
                            <td>
                                <a href="{{route('category.details',$category)}}" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    @stop
@else
    @section('content-body')
            <h1>Epins</h1><hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Epin</th>
                        <th>Category</th>
                        <th>Rate</th>
                        <th>Remarks</th>
                        <th class="text-center">Transferred To</th>
                        <th>Used By</th>
                        <th>Used At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach($epins as $epin)
                        <tr>
                            <th>{{$i++}}.</th>
                            <td>{{$epin->epin}}</td>
                            <td>{{$epin->EpinCategory->name}}</td>
                            <td>{{$epin->EpinCategory->rate}}</td>
                            <td>
                                <strong>
                                    @if(App\purchaseEpin::where('epin_id',$epin->id)->first())
                                        {{'Purchased'}}
                                    @elseif($epin->sent_to == Auth::id())
                                        {{__('Sent By ')}}{{__('Admin')}}
                                    @else
                                        {{__('Sent By ')}}{{App\User::find(App\Transfer::where('epin_id',$epin->id)->where('to',Auth::id())->first()->from)->details->username}}
                                    @endif
                                </strong>
                            </td>
                            <td class="text-center">
                                @if(App\Transfer::where('epin_id',$epin->id)->where('from',Auth::id())->get()->count())
                                    <strong>{{App\User::find(App\Transfer::where('epin_id',$epin->id)->where('from',Auth::id())->first()->to)->details->username}}</strong>
                                @else
                                    @if($epin->used_by == null)
                                        <button onclick="transfer(this)" class="btn btn-sm btn-info">Transfer
                                            <input type="hidden" class="epin_id" value="{{$epin->id}}">
                                        </button>
                                    @else
                                        {{__('--')}}
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($epin->used_by)
                                    {{App\User::find($epin->used_by)->details->username}}@if($epin->used_by == Auth::id()) (You) @endif
                                @else
                                    {{__('N/A')}}
                                @endif
                            </td>
                            <td>
                                @if($epin->used_at)
                                    {{$epin->used_at}}
                                @else
                                    {{__('N/A')}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <button type="button" id="modalButton" data-toggle="modal" data-target="#transferModal" style="display:none;"></button>
        <div id="modalDisplay"></div>
    @stop
@endif
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
    <script>
            function transfer(temp){
                
                var epin_id = $(temp).find('.epin_id').val();
                var modal = 
                '<div class="modal fade" id="transferModal">'+
                    '<div class="modal-dialog">'+
                        '<div class="modal-content">'+
                            '<!-- Modal Header -->'+
                            '<div class="modal-header">'+
                            '<h4 class="modal-title">Transfer Epin</h4>'+
                            '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
                        '<form action="{{route("transfer.epin")}}" method="post">'+
                        '@csrf'+
                            '<!-- Modal body -->'+
                            '<div class="modal-body">'+
                            '<input type="hidden" value="'+ epin_id +'" name="epin_id">'+
                            '<label for="username">Username</label>'+
                            '<div class="dropdown">	<div id="myDropdown" class="dropdown-content">'+
                            '<input class="form-control username-name" onkeyup="UsernameDataExtract(this)" name="username" id="myInput" type="text" required="true" aria-required="true"/>'+
                            '<div class="username_html"></div></div></div>'+
                            '</div>'+
                    
                            '<!-- Modal footer -->'+
                            '<div class="modal-footer">'+
                            '<button type="submit" class="btn btn-success">Transfer</button>  '+
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

        <script>
            function category(temp){

                var category_id = temp.value;
				@foreach(App\EpinCategory::all() as $c)
				var fetched_category_id = {!! json_encode($c->id) !!}
			    	if(fetched_category_id == category_id){
                            var max = {!! json_encode($c->epins->where('sent_to',null)->count()) !!}
							$('#max').attr('max',max);
                            
						}
			  @endforeach
            }
        </script>
@stop