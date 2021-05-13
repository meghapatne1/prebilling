@extends('layouts.app2')
@section('content')
<style>
   .col-lg-6.col-md-6.col-sm-6.col-xs-12 {
    padding: 1rem;
    margin: 0rem 15rem 0rem 15rem;
    border-radius: 5px;
    box-shadow: 1px 1px 16px #7906f0;
   }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
          @if($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
            <div class="card">
            <div class="card-header">Issue Token</div> 
            <div class="card-body"> 
 
            <form action="{{ route('save_issue_token') }}" method="POST">
                @csrf
              <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group">
                          <i class="fa fa-user-o icon"></i>
                      <input name="total_token"  type="number" class="form-control-style" value="" placeholder="Add Token"  required>
                      <input name="id"  type="hidden" class="form-control" value="{{$id}}">
                  </div>
                  <div class="input-group">
                          <i class="fa fa-user-o icon"></i>
                      <input name="amount"  type="number" class="form-control-style" value="" placeholder="Amount" required>
                  </div>
                  <div class="input-group" style ="width:100%;">
                      <input type="submit" name="submit" class=" btn btn-info submit-button-style" value="Submit">
                  </div>
            </form>

             </div>
           </div>


        </div>
    </div>
</div>

@endsection
