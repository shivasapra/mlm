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
                <form method="post" action="{{route('store.ticket')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Category</label> :
                      </div>
                      <div class="col-md-9">
                        <select name="category" class="form-control" required>
                            <option value="">--- Select ---</option>
                            <option value="Withdrawal">Withdrawal </option>  
                            <option value="Fund Transfer">Fund Transfer </option>  
                            <option value="General">General </option>  
                            <option value="Rewards">Rewards </option>  
                            <option value="Campaign Marketing">Campaign Marketing </option>  
                            <option value="Others">Others </option>  
                            <option value="Donation">Donation </option>  
                            <option value="Contribution">Contribution </option>  
                            <option value="Account Activation">Account Activation </option>
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
                        <select name="priority" class="form-control" required>
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
                        <input type="text" placeholder="Enter Subject" class="form-control" name="subject" required/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Message</label> :
                      </div>
                      <div class="col-md-9">
                        <textarea placeholder="Enter Message" class="form-control" name="message" required style="height:120px;"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label>Attachment</label> :
                      </div>
                      <div class="col-md-9">
                        <input type="file" class="form-control" name="attachment" required accept="image/*"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
@endsection