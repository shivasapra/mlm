@extends('layouts.app', ['titlePage' => __('Settings')])
@section('content-body')
<h1>Basic Package</h1><hr>
<form action="{{route('settings.saveBasic')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="basic_amount">Basic Package Amount</label>
            <input type="number" name="basic_amount" @if($settings != null) value="{{$settings->basic_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-3">
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
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="upgrade_wallet_amount">Amount To Add In Upgrade Wallet</label>
            <input type="number" name="upgrade_wallet_amount" @if($settings != null) value="{{$settings->upgrade_wallet_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-3">
            <label for="upgrade_to_standard">Upgrade To Standard Amount</label>
            <input type="number" name="upgrade_to_standard" @if($settings != null) value="{{$settings->upgrade_to_standard}}" @endif class="form-control">
        </div>
        <div class="col-md-3"><br>
            <button type="submit" class="btn btn-sm btn-info">Save</button>
        </div>
    </div>
</form><br><br>

<h1>Standard Package</h1><hr>
<form action="{{route('settings.saveStandard')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="standard_amount">Standard Package Amount</label>
            <input type="number" name="standard_amount" @if($settings != null) value="{{$settings->standard_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-3">
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
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="upgrade_wallet_amount_standard">Amount To Add In Upgrade Wallet</label>
            <input type="number" name="upgrade_wallet_amount_standard" @if($settings != null) value="{{$settings->upgrade_wallet_amount_standard}}" @endif class="form-control">
        </div>
        <div class="col-md-3">
            <label for="upgrade_to_premium">Upgrade To Premium Amount</label>
            <input type="number" name="upgrade_to_premium" @if($settings != null) value="{{$settings->upgrade_to_premium}}" @endif class="form-control">
        </div>
        <div class="col-md-3"><br>
            <button type="submit" class="btn btn-sm btn-info">Save</button>
        </div>
    </div>
</form><br><br>


<h1>Premium Package</h1><hr>
<form action="{{route('settings.savePremium')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <label for="premium_amount">Premium Package Amount</label>
            <input type="number" name="premium_amount" @if($settings != null) value="{{$settings->premium_amount}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="admin_amount_premium">Admin Amount</label>
            <input type="number" name="admin_amount_premium" @if($settings != null) value="{{$settings->admin_amount_premium}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="level_one_percentage_premium">Level One Amount</label>
                <input type="number" name="level_one_percentage_premium" @if($settings != null) value="{{$settings->level_one_percentage_premium}}" @endif class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <label for="level_two_percentage_premium">Level Two Amount</label>
            <input type="number" name="level_two_percentage_premium" @if($settings != null) value="{{$settings->level_two_percentage_premium}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="level_three_percentage_premium">Level Three Amount</label>
            <input type="number" name="level_three_percentage_premium" @if($settings != null) value="{{$settings->level_three_percentage_premium}}" @endif class="form-control">
        </div>
        <div class="col-md-2">
            <label for="upgrade_wallet_amount_premium">Upgrade Wallet Amount</label>
            <input type="number" name="upgrade_wallet_amount_premium" @if($settings != null) value="{{$settings->upgrade_wallet_amount_premium}}" @endif class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="text-right">
            <button type="submit" class="btn btn-sm btn-info">Save</button>
        </div>
    </div>
</form><br>

<h1>Facilitation Percentage</h1><hr>
    <form action="{{route('settings.saveFacilitation')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                    <label for="facilitation_percentage"><b>Facilitaion Percentage:</b></label>
                    <input type="text" id="facilitation_percentage" @if($settings != null) value="{{$settings->facilitation_percentage}}" @endif  placeholder="Enter Percentage..." name="facilitation_percentage" class="form-control">
            </div><br>
            <div class="text-center col-md-1">
                <button type="submit" class="btn btn-sm btn-info">Save</button>
            </div>
        </div><br><br><br>
    </form><br>

<h1>Rewards</h1><hr>
    <form action="{{route('settings.saveRewards')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="reward_one_prize">Reward 1 Prize</label>
                <textarea name="reward_one_prize" class="form-control">@if($settings != null){{$settings->reward_one_prize}}@endif</textarea>
            </div>
            <div class="col-md-4">
                <label for="reward_two_prize">Reward 2 Prize</label>
                <textarea name="reward_two_prize" class="form-control">@if($settings != null){{$settings->reward_two_prize}}@endif</textarea>
            </div>
            <div class="col-md-4">
                <label for="reward_three_prize">Reward 3 Prize</label>
                <textarea name="reward_three_prize" class="form-control">@if($settings != null){{$settings->reward_three_prize}}@endif</textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
                <label for="reward_one_tc">Reward 1 T&C</label>
                <textarea name="reward_one_tc" class="form-control">@if($settings != null){{$settings->reward_one_tc}}@endif</textarea>
            </div>
            <div class="col-md-4">
                <label for="reward_two_tc">Reward 2 T&C</label>
                <textarea name="reward_two_tc" class="form-control">@if($settings != null){{$settings->reward_two_tc}}@endif</textarea>
            </div>
            <div class="col-md-4">
                <label for="reward_three_tc">Reward 3 T&C</label>
                <textarea name="reward_three_tc" class="form-control">@if($settings != null){{$settings->reward_three_tc}}@endif</textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-info">Save</button>
            </div>
        </div>
    </form><br>
<div class="row">
    <div class="col-md-6">
        <form action="{{route('save.cause')}}" method="post" id="form">
            @csrf
            <h1>Causes</h1><hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th class="text-center" style="width:75%">Cause</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody >
                    <?php $i = 1; ?>
                    @foreach(App\Cause::all() as $cause)
                        <tr>
                            <td><b>{{$i++}}.</b></td>
                            <td class="text-center">
                                <a href="javascript:void(0)" onclick="FindSubCause(this);">
                                    <input type="hidden" class="cause_id" value="{{$cause->id}}">
                                    {{$cause->name}}
                                </a>
                            </td>
                            <td><a href="{{route('cause.delete',['id'=> $cause->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-10">
                <input type="text" id="cause" placeholder="Enter Cause..." onkeyup="test(this)" class="form-control" name="cause">
            </div>
            <button id="button" type="submit" class="btn btn-md btn-info">Save</button>
        </form>
    </div>
    <div class="col-md-6">
        <form action="{{route('save.subcause')}}" method="post">
            @csrf
            <h1>Sub Causes</h1><hr>
            <div class="row">
                <div class="col-md-5">
                    <select name="cause" id="" class="form-control">
                        <option value="">---Select Cause---</option>
                        @foreach(App\Cause::all() as $cause)
                            <option value="{{$cause->id}}">{{$cause->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" placeholder="Enter Sub Cause..." class="form-control" name="subcause">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-md btn-info">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<button type="button" id="modalButton" data-toggle="modal" data-target="#Modal" style="display:none;"></button>
<div id="modalDisplay"></div>
@stop
@section('js')
<script>
    function FindSubCause(temp){
        var cause_id = $(temp).find('.cause_id').val();
            @foreach(App\Cause::all() as $cause)
            var fetched_cause_id = {!! json_encode($cause->id) !!}
                if(fetched_cause_id == cause_id){
                    var modal = 
                    '<div class="modal fade" id="Modal">'+
                        '<div class="modal-dialog">'+
                            '<div class="modal-content">'+
                                '<!-- Modal Header -->'+
                                '<div class="modal-header">'+
                                '<h4 class="modal-title">Subcauses</h4>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                '</div>'+
                                '<!-- Modal body -->'+
                                '<div class="modal-body">'+
                                    '@if($cause->subcauses->count() > 0)'+
                                        '@foreach($cause->subcauses as $c)'+
                                            '<strong>{{$loop->index + 1}}. </strong>{{$c->name}}<br>'+
                                        '@endforeach'+
                                    '@endif'+
                                '</div>'+
                        
                                '<!-- Modal footer -->'+
                                '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                    $('#modalDisplay').html(modal);
                    $('#modalButton').click();
                }
          @endforeach
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