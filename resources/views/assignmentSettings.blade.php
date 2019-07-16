@extends('layouts.app', ['titlePage' => __('Assignment Settings')])
@section('content-body')
    <h1>Manual Transfer Settings</h1><hr>
    <div class="row">
    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">Bank Transfer</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.bankTransfer',$user)}}">
        @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD" {{($user->bankTransfer != null and $user->bankTransfer->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->bankTransfer != null and $user->bankTransfer->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->bankTransfer != null and $user->bankTransfer->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account type</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="account_type">
              <option>Select Account Type</option>
              <option value="Savings" {{($user->bankTransfer != null and $user->bankTransfer->account_type == 'Savings')? 'selected' : ' ' }}>Savings</option>
              <option value="Current" {{($user->bankTransfer != null and $user->bankTransfer->account_type == 'Current')? 'selected' : ' ' }}>Current</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Nick Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Nick Name" name="nick_name" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->nick_name }}" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Holder Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Account Holder Name" name="account_holder_name" class="form-control" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->account_holder_name }}"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Number</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Number" name="account_no" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->account_no }}" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Bank Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Bank Name" name="bank_name" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->bank_name }}" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Bank Branch</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Bank Branch" name="bank_branch" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->bank_branch }}" class="form-control" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Bank/IFSC Code</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Bank/IFSC Code" name="IFSC_code" class="form-control" value="{{($user->bankTransfer == null)? " ": $user->bankTransfer->IFSC_code }}" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->bankTransfer != null and $user->bankTransfer->status == 0)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->bankTransfer != null and $user->bankTransfer->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">PayPal Payment</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.paypal',$user)}}">
    @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD"  {{($user->paypal != null and $user->paypal->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->paypal != null and $user->paypal->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->paypal != null and $user->paypal->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Paypal Account ID</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Paypal Account ID" name="account_id" class="form-control" value="{{($user->paypal == null)? " ": $user->paypal->account_id }}" class="form-control" value="balrajaggarwal"/>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Name" name="account_name" value="{{($user->paypal == null)? " ": $user->paypal->account_name }}" class="form-control" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->paypal != null and $user->paypal->status == 0)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->paypal != null and $user->paypal->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">Perfect Money</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.perfectMoney',$user)}}">
        @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD" {{($user->perfectMoney != null and $user->perfectMoney->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->perfectMoney != null and $user->perfectMoney->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->perfectMoney != null and $user->perfectMoney->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Perfect Money Account ID</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Paypal Account ID"  value="{{($user->perfectMoney == null)? " ": $user->perfectMoney->account_id }}" class="form-control" class="form-control" name="account_id"/>
            {{-- <span class="text-danger">Please Enter the valid Perfect Money ID Ex:U1234567</span> --}}
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Name" class="form-control" value="{{($user->perfectMoney == null)? " ": $user->perfectMoney->account_name }}" class="form-control" name="account_name"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->perfectMoney != null and $user->perfectMoney->status == 0)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->perfectMoney != null and $user->perfectMoney->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">Payza Payment</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.payza',$user)}}">
        @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD"  {{($user->payza != null and $user->payza->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->payza != null and $user->payza->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->payza != null and $user->payza->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Payza Account Email-ID</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Payza Account Email-ID" class="form-control" value="{{($user->payza == null)? " ": $user->payza->account_email_id }}" name="account_email_id" class="form-control" value="balrajaggarwal"/>
            {{-- <span class="text-danger">Please enter a valid email address</span> --}}
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Name" class="form-control" value="{{($user->payza == null)? " ": $user->payza->account_name }}" name="account_name" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->payza != null and $user->payza->status == 1)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->payza != null and $user->payza->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">Skrill Payment</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.skrill',$user)}}">
        @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD" {{($user->skrill != null and $user->skrill->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->skrill != null and $user->skrill->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->skrill != null and $user->skrill->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Skrill Account Email-ID</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Payza Account Email-ID" name="account_email_id"  class="form-control" class="form-control" value="{{($user->skrill == null)? " ": $user->skrill->account_email_id }}"/>
            {{-- <span class="text-danger">Please enter a valid email address</span> --}}
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Name" name="account_name" value="{{($user->skrill == null)? " ": $user->skrill->account_name }}" class="form-control" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->skrill != null and $user->skrill->status == 0)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->skrill != null and $user->skrill->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">BKash Payment</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.bkash',$user)}}">
        @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD" {{($user->bkash != null and $user->bkash->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->bkash != null and $user->bkash->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->bkash != null and $user->bkash->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>BKash Account Number</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="BKash Account Number" name="account_no" value="{{($user->bkash == null)? " ": $user->bkash->account_no }}" class="form-control" class="form-control" value="balrajaggarwal"/>
            {{-- <span class="text-danger">Please enter the Account Number</span> --}}
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Name" name="account_name" value="{{($user->bkash == null)? " ": $user->bkash->account_name }}" class="form-control" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->bkash != null and $user->bkash->status == 0)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->bkash != null and $user->bkash->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control"  class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <div class="card-header bg-light h4 p-1">Solid Trust Payment</div>
    <div class="card-body p-1">
    <form method="post" action="{{route('update.solidTrust',$user)}}">
        @csrf
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Handling Currency</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="currency">
              <option>Select Currency</option>
              <option value="USD" {{($user->solidTrust != null and $user->solidTrust->currency == 'USD')? 'selected' : ' ' }}>USD</option>
              <option value="INR" {{($user->solidTrust != null and $user->solidTrust->currency == 'INR')? 'selected' : ' ' }}>INR</option>
              <option value="IDR" {{($user->solidTrust != null and $user->solidTrust->currency == 'IDR')? 'selected' : ' ' }}>IDR</option>
            </select>
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Solid Trust Pay Account User Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Solid Trust Pay Account User Name"  value="{{($user->solidTrust == null)? " ": $user->solidTrust->account_user_name }}" name="account_user_name" class="form-control" class="form-control" />
          </div>
        </div>
      </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Account Name</label> :
          </div>
          <div class="col-md-8">
            <input type="text" placeholder="Enter Account Name" name="account_name"  value="{{($user->solidTrust == null)? " ": $user->solidTrust->account_name }}" class="form-control" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Status</label> :
          </div>
          <div class="col-md-8">
            <select class="form-control" name="status">
              <option value="0" {{($user->solidTrust != null and $user->solidTrust->status == 0)? 'selected' : ' ' }}>In-Active</option>
              <option value="1" {{($user->solidTrust != null and $user->solidTrust->status == 1)? 'selected' : ' ' }}>Active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Security Pin *</label> :
          </div>
          <div class="col-md-8">
            <input type="password" placeholder="" class="form-control" class="form-control" name="security_pin"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>

    </div>
@stop