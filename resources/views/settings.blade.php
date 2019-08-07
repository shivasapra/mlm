@extends('layouts.app', ['titlePage' => __('Settings')])
@section('content-body')
<h1>Basic Package</h1><hr>
<form action="{{route('settings.save')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <label for="basic_amount">Basic Package Amount</label>
            <input type="number" name="basic_amount" @if($settings != null) value="{{$settings->basic_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="admin_amount">Admin Amount</label>
            <input type="number" name="admin_amount" @if($settings != null) value="{{$settings->admin_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="level_one_percentage">Level One Amount</label>
                <input type="number" name="level_one_percentage" @if($settings != null) value="{{$settings->level_one_percentage}}" @endif class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <label for="level_two_percentage">Level Two Amount</label>
            <input type="number" name="level_two_percentage" @if($settings != null) value="{{$settings->level_two_percentage}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="level_three_percentage">Level Three Amount</label>
            <input type="number" name="level_three_percentage" @if($settings != null) value="{{$settings->level_three_percentage}}" @endif class="form-control">
        </div>
        <br>
        <div class="text-center col-md-2">
            <button type="submit" class="btn btn-md btn-info">Save</button>
        </div>
    </div>
</form><br>

<h1>Standard Package</h1><hr>
<form action="{{route('settings.save')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <label for="standard_amount">Standard Package Amount</label>
            <input type="number" name="standard_amount" @if($settings != null) value="{{$settings->standard_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="admin_amount_standard">Admin Amount</label>
            <input type="number" name="admin_amount_standard" @if($settings != null) value="{{$settings->admin_amount_standard}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="level_one_percentage_standard">Level One Amount</label>
                <input type="number" name="level_one_percentage_standard" @if($settings != null) value="{{$settings->level_one_percentage_standard}}" @endif class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <label for="level_two_percentage_standard">Level Two Amount</label>
            <input type="number" name="level_two_percentage_standard" @if($settings != null) value="{{$settings->level_two_percentage_standard}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="level_three_percentage_standard">Level Three Amount</label>
            <input type="number" name="level_three_percentage_standard" @if($settings != null) value="{{$settings->level_three_percentage_standard}}" @endif class="form-control">
        </div>
        <br>
        <div class="text-center col-md-2">
            <button type="submit" class="btn btn-md btn-info">Save</button>
        </div>
    </div>
</form><br>

<h1>Causes</h1><hr>
 <div class="row">
    <div class="col-md-4" id="load">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th class="text-center" style="width:75%">Cause</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($causes as $cause)
                    <tr>
                        <td><b>{{$i++}}.</b></td>
                        <td class="text-center">{{$cause->name}}</td>
                        <td><a href="{{route('cause.delete',['id'=> $cause->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form onsubmit="saveCause(this);" action="javascript:void(0)" method="post" id="form">
    <div class="col-md-3">
        <div class="form-group">
            <label for="cause"><b>Add Cause:</b></label>
            <input type="text" id="cause" onkeyup="test(this)" name="cause" class="form-control">
        </div>
    </div><br>
    <div class="col-md-1">
        <button id="button" type="submit" class="btn btn-sm btn-info">Save</button>
    </div>
    </form>
 </div>
@stop
@section('js')
<script>
    function saveCause(test){
  
        $('#button').attr('disabled','disabled');
        var cause= $(test).find('#cause').val();
        console.log(cause);
        
        var params = 'cause='+cause;
        var Url = "https://buildatwill.com/galaxycrowd/mlm/public/save-cause";
        var xhr = new XMLHttpRequest();
        xhr.open('GET', Url+"?"+params, true);
        xhr.send();
        xhr.onreadystatechange = processRequest;
        function processRequest(e) {
            var response1 = JSON.parse(xhr.responseText);
            if (response1){
                $('#button').removeAttr('disabled');
                $("#load").load(" #load > *");
                $('#cause').val('');
            }
        }
       
    }

    function test(temp){
      if (temp.value.trim() == '') {
      $('#button').attr('disabled','disabled');
      }
      else{
        $('#button').removeAttr('disabled');
      }
    }

</script>
@stop