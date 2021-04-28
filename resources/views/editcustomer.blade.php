@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container-fluid">
    <div class="row justify-content-center">
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card">
  
   
    <div class="card-header">Update Customer</div> 
    <span style="display:flex;">
    <button style="width:30%;" type="button" class="btn btn-info" data-toggle="collapse" data-target="#customer_account">Update Customer Account</button>&nbsp;&nbsp;
    <button style="width:30%;" type="button" class="btn btn-info" data-toggle="collapse" data-target="#customer_profile">Update Customer Profile</button>
    </span>

    <div class="card-body collapse" id="customer_account"> 
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <form action="{{ route('update_customer_account') }}" method="POST">
    @foreach ($customerdata as $item)
    @csrf
    <div class="input-group">
    <lable class="lable-style">Amount</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="amount" type="text" class="form-control" value="{{ $item->amount }}">
    </div>
    
    <div class="input-group">
    <lable class="lable-style">Utilized Token</lable>
        <i class="fa fa-vcard-o icon"></i>
        <input name="no_of_token_utilized" type="text" class="form-control" value="{{ $item->no_of_token_utilized }}">
    </div>

    <div class="input-group">
    <lable class="lable-style">Total tokan</lable>
        <i class="fa fa-money icon" style="font-size:18px;" ></i>
        <input name="total_token" type="text" class="form-control" value="{{ $item->total_token }}">
    </div>

    <div class="input-group">
    <lable class="lable-style">Cost Of Per Token</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="cost_of_per_token" type="text" class="form-control" value="{{ $item->cost_of_per_token }}">
    </div>

    <div class="input-group">
    <lable class="lable-style">Remaining Token</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="remaning_token" type="text" class="form-control" value="{{ $item->remaning_token }}">
    </div>
    
    <div class="input-group">
    <lable class="lable-style">Product Name</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="product_name" type="text" class="form-control" value="{{ $item->product_name }}">
        <input name="id" type="hidden" class="form-control" value="{{ $item->id }}">
    </div>
    

    <div class="input-group">
    <lable class="lable-style">Token Valid Upto</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="token_expire_date" type="date" class="form-control" value="{{ $item->token_expire_date }}">
    </div>
<!-- 
    <div class="input-group">
    <lable class="lable-style">Start Date</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="start_date" type="date" class="form-control" value="{{ $item->start_date }}">
    </div>

    <div class="input-group">
    <lable class="lable-style">End Date</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="end_date" type="date" class="form-control" value="{{ $item->end_date }}">
    </div>
  -->

    <div class="input-group" style="text-align: center;width:30%;margin-left:45%;">
            <input name="submit" type="submit" class="form-control btn btn-info text-white" value="Update Account">
        </div>
    @endforeach
    </form>
     </div>
    </div>
    </div>



    <!-- add customer profile -->
    <div class="card-body collapse" id="customer_profile"> 
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <form action="{{ route('update_customer') }}" method="POST">
     @csrf
    <div class="row">
    @foreach ($customerdata as $item)

    <div class="input-group">
    <lable class="lable-style">Name</lable>
        <i class="fa fa-vcard-o icon"></i>
        <input name="name" type="text" class="form-control" value="{{ $item->name }}">
    </div>
   
    <!-- <div class="input-group">
    <lable class="lable-style">Mobile</lable>
        <i class="fa fa-money icon" style="font-size:18px;" ></i>
        <input name="mobile1" type="text" class="form-control" value="{{ $item->mobile1 }}">
    </div> -->
 
    <div class="input-group">
    <lable class="lable-style">Address</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="address" type="text" class="form-control" value="{{ $item->address }}">
    </div>

    <div class="input-group">
    <lable class="lable-style">Pincode</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="pincode" type="text" class="form-control" value="{{ $item->pincode }}">
    </div>

    <div class="input-group">
    <lable class="lable-style">Status</lable>
    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
        <input name="status" type="text" class="form-control" value="{{ $item->status }}">
    </div>
    
    </div>
    <div class="input-group" style="text-align: center;width:30%;margin-left:45%;">
    <input name="id" type="hidden" class="form-control" value="{{ $item->id }}">
            <input name="submit" type="submit" class="form-control btn btn-info text-white" value="Update">
        </div>
    @endforeach
 

    </form>
    </div>
            </div>
        </div>
    </div>
</div>

@endsection
