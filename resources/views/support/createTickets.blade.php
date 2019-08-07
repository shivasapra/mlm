@extends('layouts.app', ['titlePage' => __('Create Tickets')])
@section('content-body')
<ul class="nav nav-tabs tabs-design mt-2" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('support.createTickets')}}">Create Tickets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('support.viewTickets')}}" role="tab">View Tickets</a>
        </li>
      </ul>
        
        <div class="row">
            <div class="col-md-8">
                <form method="post" action="">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Category</label> :
                      </div>
                      <div class="col-md-9">
                        <select class="form-control">
                            <option value="">--- Select ---</option>
                            <option value="1">Withdrawal </option>  
                            <option value="2">Fund Transfer </option>  
                            <option value="3">General </option>  
                            <option value="4">Rewards </option>  
                            <option value="5">Campaign Marketing </option>  
                            <option value="6">Others </option>  
                            <option value="7">Donation </option>  
                            <option value="8">Contribution </option>  
                            <option value="9">Account Activation </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Priority</label> :
                      </div>
                      <div class="col-md-9">
                        <select class="form-control">
                          <option>--- Select Priority ---</option>
                          <option value="Low">Low</option>
                          <option value="Medium">Medium</option>
                          <option value="High">High</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Subject</label> :
                      </div>
                      <div class="col-md-9">
                        <input type="text" placeholder="Enter Subject" class="form-control" name=""/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Message</label> :
                      </div>
                      <div class="col-md-9">
                        <textarea placeholder="Enter Message" class="form-control" name="" style="height:120px;"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Attachment</label> :
                      </div>
                      <div class="col-md-9">
                        <input type="file" class="form-control" name=""/>
                        <small>Supported file formats (jpg,jpeg,png,gif,docx,pdf,ppt,doc)</small>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
@endsection