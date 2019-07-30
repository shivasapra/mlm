@extends('layouts.app', ['titlePage' => __('Settings')])
@section('content-body')
<h1>Percentage</h1><hr>
<form action="{{route('settings.save')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="level_one_percentage">Level One Percentage</label>
                <input type="number" name="level_one_percentage" @if($settings != null) value="{{$settings->level_one_percentage}}" @endif class="form-control">
            </div>
        </div>
        <div class="col-md-5">
            <label for="level_two_percentage">Level Two Percentage</label>
            <input type="number" name="level_two_percentage" @if($settings != null) value="{{$settings->level_two_percentage}}" @endif class="form-control">
        </div><br>
        <div class="col-md-2 text-center">
            <button type="submit" class="btn btn-md btn-info">Save</button>
        </div>
    </div>
</form><br>
<h1>Causes</h1><hr>
 <div class="row">
    <div class="col-md-4">
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
    <div class="col-md-3">
        <div class="form-group">
            <label for="cause"><b>Add Cause:</b></label>
            <input type="text" name="cause" class="form-control">
        </div>
    </div><br>
    <div class="col-md-1">
        <button class="btn btn-sm btn-info">Save</button>
    </div>
 </div>
@stop