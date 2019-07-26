@extends('layouts.app', ['titlePage' => __('Edit Perk')])
@section('content-body')
<h1>Edit Perk</h1><hr>
<form method="post" action="{{route('perk.update',$perk)}}" enctype="multipart/form-data">
    @csrf
<div class="form-group mt-2">
<div class="row">
<div class="col-md-3"><label>Perk Type</label></div>
<div class="col-md-9">
    <input type="text" name="type" readonly class="form-control" value="{{$perk->type}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-3"><label>Perk Name</label></div>
<div class="col-md-9"><input type="text" name="name" value="{{$perk->name}}" placeholder="" class="form-control"/></div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-3"><label>Perk Description</label></div>
<div class="col-md-9"><textarea id="summernote" name="description" class="form-control" value="">{{$perk->description}}</textarea></div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-3"><label>Perk Image</label></div>
<div class="col-md-9">
    <input type="file" id="upload_perk_image" name="image" value="{{$perk->image}}" style="display:none;"/>
  <label for="upload_perk_image" class="btn btn-danger"><i class="icon-upload"></i> Upload</label><br>
  <img src="{{asset($perk->image)}}" alt="upload image" class="img-fluid"/>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-3"><label>Contribution Amount</label></div>
<div class="col-md-9">
  <div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text">
        <input type="text" class="form-control" name="currency" value="{{$perk->currency}}" readonly>
    </div>
  </div>
  <input type="number" class="form-control" name="amount" value="{{$perk->amount}}">
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-3"><label>Number Available</label></div>
<div class="col-md-9"><input type="number" class="form-control" name="number_available" placeholder="" value="{{$perk->number_available}}"/></div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-3"><label>Estimated Delivery Date</label></div>
<div class="col-md-9"><input type="date" placeholder="" name="delivery_date" value="{{$perk->delivery_date}}" class="form-control"/></div>
</div>
</div>

@if($perk->type == 'Product')
<div class="form-group">
    <div class="row" id="shipping">
    <div class="col-md-3"><label>Shipping Locations</label></div>
    <div class="col-md-9">
    <div id="perk-shipping-location-div" class="mt-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Shipping Address</th>
                            <th>Shipping Fee</th>
                            <th><button type="button" onclick="addPerkLocation();" class="btn btn-warning">Add Location</button></th>
                        </tr>
                    </thead>
                    <tbody id="perkRowAdd">
                        @foreach($perk->shippings as $shipping)
                        <tr class="deleteRow">
                            <td>
                                <select class="form-control" name="shipping_address[]">
                                    <option value="World Wide" {{($shipping->shipping_address == 'World Wide')?'selected':' '}}>World Wide</option>
                                    <option value="India" {{($shipping->shipping_address == 'India')?'selected':' '}}>India</option>
                                    <option value="USA" {{($shipping->shipping_address == 'USA')?'selected':' '}}>USA</option>
                                    <option value="Dubai" {{($shipping->shipping_address == 'Dubai')?'selected':' '}}>Dubai</option>
                                </select>
                            </td>
                            <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <select class="form-control" name="currencyy[]">
                                        <option value="INR ₹" {{($shipping->currency == 'INR ₹')?'selected':' '}} data-minigoal = "50000">INR ₹</option>
                                        <option value="USD $" {{($shipping->currency == 'USD $')?'selected':' '}} data-minigoal = "1000" >USD $</option>
                                        <option value="EUR €" {{($shipping->currency == 'EUR €')?'selected':' '}} data-minigoal = "1000" >EUR €</option>
                                        <option value="GBP £" {{($shipping->currency == 'GBP £')?'selected':' '}} data-minigoal = "1000" >GBP £</option>
                                        <option value="BTC ฿" {{($shipping->currency == 'BTC ฿')?'selected':' '}} data-minigoal = "1" >BTC ฿</option>
                                    </select>
                                    </div>
                                </div>
                                <input type="number" class="form-control" value="{{$shipping->shipping_fee}}" name="shipping_fee[]" >
                                </div>  
                            </td>
                            <td><a href="javascript:void(0)" onclick="removePerkLocation(this)"><i class="icon-cross"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    </div>
    </div>
</div>
@endif
<hr>
<button type="submit" class="btn btn-primary">Add Perk</button>
</form>
@endsection
@section('js')
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#perk-shipping-location-show').click(function(){
            $('#perk-shipping-location-div').toggle();
        });
    });
</script> --}}

<script>
    function cl(){
        $('#perk-shipping-location-div').toggle();
    }
</script>

<script type="text/javascript">
    function addPerkLocation(){
        var data= '<tr class="deleteRow">'+
        '<td>'+
            '<select class="form-control" name="shipping_address[]">'+
                '<option value="World Wide">World Wide</option>'+
                '<option value="India">India</option>'+
                '<option value="USA">USA</option>'+
                '<option value="Dubai">Dubai</option>'+
            '</select>'+
        '</td>'+
        '<td>'+
        '<div class="input-group">'+
            '<div class="input-group-prepend">'+
                '<div class="input-group-text">'+
                '<select class="form-control" name="currencyy[]">'+
                    '<option value="INR ₹" data-minigoal = "50000" selected>INR ₹</option>'+
                    '<option value="USD $" data-minigoal = "1000" >USD $</option>'+
                    '<option value="EUR €" data-minigoal = "1000" >EUR €</option>'+
                    '<option value="GBP £" data-minigoal = "1000" >GBP £</option>'+
                    '<option value="BTC ฿" data-minigoal = "1" >BTC ฿</option>'+
                '</select>'+
                '</div>'+
            '</div>'+
            '<input type="number" class="form-control" name="shipping_fee[]" >'+
            '</div>  '+
        '</td>'+
        '<td><a href="javascript:void(0)" onclick="removePerkLocation(this)"><i class="icon-cross"></i></a></td>'+
    '</tr>';
    $("#perkRowAdd").append(data);
    }
</script>

<script>
    function removePerkLocation(temp){
        $(temp).parents('.deleteRow').remove();
    }
</script>

<script>
    function removeShipping(temp){
        var val = temp.value;
        if (val == 'Service') {
            $('#shipping').html('');
        }
        if(val == 'Product'){
            data = 
            '<div class="col-md-3"><label>Shipping Location</label></div>'+
            '<div class="col-md-9"><input type="checkbox" id="perk-shipping-location-show" onclick="cl();" placeholder="" name="shipping"/>'+
            '<div id="perk-shipping-location-div" class="mt-1" style="display:none;">'+
                    '<div class="table-responsive">'+
                        '<table class="table table-bordered">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>Shipping Address</th>'+
                                    '<th>Shipping Fee</th>'+
                                    '<th><button type="button" onclick="addPerkLocation();" class="btn btn-warning">Add Location</button></th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody id="perkRowAdd">'+
                                '<tr>'+
                                    '<td>'+
                                        '<select class="form-control" name="shipping_address[]">'+
                                            '<option value="World Wide">World Wide</option>'+
                                            '<option value="India">India</option>'+
                                            '<option value="USA">USA</option>'+
                                            '<option value="Dubai">Dubai</option>'+
                                        '</select>'+
                                    '</td>'+
                                    '<td>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                            '<select class="form-control" name="currencyy[]">'+
                                                '<option value="INR ₹" data-minigoal = "50000" selected>INR ₹</option>'+
                                                '<option value="USD $" data-minigoal = "1000" >USD $</option>'+
                                                '<option value="EUR €" data-minigoal = "1000" >EUR €</option>'+
                                                '<option value="GBP £" data-minigoal = "1000" >GBP £</option>'+
                                                '<option value="BTC ฿" data-minigoal = "1" >BTC ฿</option>'+
                                            '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<input type="number" class="form-control" name="shipping_fee[]" >'+
                                        '</div>  '+
                                    '</td>'+
                                    '<td>&nbsp;</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
            '</div>'+
            '</div>';
            $('#shipping').html(data);
        }
    }
</script>
@stop