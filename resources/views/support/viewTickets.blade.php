
@extends('layouts.app', ['titlePage' => __('View Tickets')])
@section('content-body')
<ul class="nav nav-tabs tabs-design mt-2" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" href="{{route('support.createTickets')}}">Create Tickets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('support.viewTickets')}}" role="tab">View Tickets</a>
        </li>
          {{-- <a class="nav-link btn btn-success float-right" href="#">Submit New Ticket</a> --}}
      </ul>
        
       {{-- <form method="" action="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" class="form-control" placeholder="" name=""/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" class="form-control" placeholder="" name=""/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="" class="form-control">
                                <option value="">Choose Status</option>
                                <option value="1" >open</option>
                                <option value="2" >in progress</option>
                                <option value="3" selected>answered</option>
                                <option value="4" >closed</option>
                                <option value="5" >customer reply</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary" name="">Search</button>
                        </div>
                    </div>
                </div>
            </form> --}}
            <div class="table-responsive mt-2">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th>Sno.</th>
                            <th>Subject</th>
                            <th>Priority</th>
                            <th>Post Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" class="text-center">No Data Available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#"><i class="icon-angle-left"></i> Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next <i class="icon-angle-right"></i></a></li>
                </ul>
            </div>
        </div> 
@endsection