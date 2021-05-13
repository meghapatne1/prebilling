@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.box-style {
    height: 40px;
    border-radius: 4%;
}
.section {
    margin-top: 1rem;
    text-align: center;
    margin-bottom: 1rem;
    width: 100%;
}
</style>


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
    <br>
    <div class="row text-center">
                <div class="col-sm-6">
                <button  type="button" class="box-style" data-toggle="collapse" data-target="#customer_account">Update Customer Account</button>
                </div>
                <div class="col-sm-6">
                <button type="button" class="box-style" data-toggle="collapse" data-target="#customer_profile">Update Customer Profile</button>
           
                </div>
              
              </div>

    <br>

    <div class="card-body collapse" id="customer_account"> 
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 outer-div-border">
        <div class="section">
    <button type="button" class="btn btn-primary left-button">Update Custumer Account</button>
   </div>
    <form action="{{ route('add_customer_account') }}" method="POST">
        <br>
    
    @foreach ($customerdata as $item)
    @csrf
    <div class="form-group">
    <lable class="lable-style">Amount</lable>
    
        <input name="amount" type="number" class="form-control" value="">
    </div>
    <input name="customer_mobile" type="hidden" class="form-control" value="{{ $item->mobile1 }}">
    <div class="form-group">
    <lable class="lable-style">Utilized Token</lable>
       
        <input name="no_of_token_utilized" type="number" class="form-control" value="">
    </div>

    <div class="form-group">
    <lable class="lable-style">Total tokan</lable>
      
        <input name="total_token" type="number" class="form-control" value="">
    </div>

    <div class="form-group">
    <lable class="lable-style">Cost Of Per Token</lable>
    
        <input name="cost_of_per_token" type="number" class="form-control" value="">
    </div>

    <div class="form-group">
    <lable class="lable-style">Remaining Token</lable>
    
        <input name="remaning_token" type="number" class="form-control" value="">
    </div>
    
    <div class="form-group">
    <lable class="lable-style"> Select Product Name</lable>
        <select name="product_name" class="form-control" id="sel1">
        @foreach($getProduct as $product)
        @if($product->pro_name ==  $item->product_name )
        <option value="{{ $product->pro_name }}" selected>{{ $product->pro_name }}</option>
        @else
        <option value="{{ $product->pro_name }}">{{ $product->pro_name }}</option>
        @endif
        @endforeach
        </select>
    </div>


    <div class="form-group">
    <lable class="lable-style"> Select Payment Type</lable>
        <select name="payment_type" class="form-control">
        <option value="prepaid"> Pre Paid</option>
        <option value="postpaid"> Post Paid</option>
        </select>
    </div>

    <div class="form-group">
    <lable class="lable-style"> Select Payment Shift</lable>
        <select name="shift" class="form-control">
        <option value="morning"> Morning</option>
        <option value="evening"> Evening</option>
        <option value="anytime"> AnyTime</option>
        </select>
    </div>

    <div class="form-group">
    <lable class="lable-style"> Product Brand </lable>
        <select name="brand" class="form-control">
        <option value="sanchi"> Sanchi</option>
        <option value="amul"> Amul </option>
        </select>
    </div>

    <div class="form-group">
    <lable class="lable-style">Token Valid Upto</lable>
    <input name="token_expire_date" type="date" class="form-control" value="">
    </div>

    <div class="form-group" style="text-align: center;width:30%;">
    <input name="id" type="hidden" class="form-control" value="{{ $item->id }}">
    <input name="submit" type="submit" class="form-control btn btn-info text-white" value="Save Account">
    </div>
    @endforeach
    </form>
     </div>
    </div>
    </div>

    <!-- add customer profile -->
    <div class="card-body collapse" id="customer_profile"> 
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 outer-div-border">
    <div class="section">
    <button type="button" class="btn btn-primary left-button">Update Custumer Profile</button>
    </div>
    <form action="{{ route('update_customer') }}" method="POST">
     @csrf

    @foreach ($customerdata as $item)

    <div class="form-group">
    <lable class="lable-style">Name</lable>
    
        <input name="name" type="text" class="form-control" value="{{ $item->name }}">
    </div>
   
    <div class="form-group">
    <lable class="lable-style">Address</lable>
    
        <input name="address" type="text" class="form-control" value="{{ $item->address }}">
    </div>

    <div class="form-group">
    <lable class="lable-style">Pincode</lable>
    
        <input name="pincode" type="number" class="form-control" value="{{ $item->pincode }}">
    </div>

    <div class="form-group">
    <lable class="lable-style">Status</lable>
    
        <input name="status" type="number" class="form-control" value="{{ $item->status }}">
    </div>
    
    
    <div class="form-group" style="text-align: center;width:40%;">
    <input name="id" type="hidden" class="form-control" value="{{ $item->id }}">
     <input name="submit" type="submit" class="form-control btn btn-info text-white" value="Update Customer Profile">
    </div>
    @endforeach
 

    </form>
    </div>
            </div>
        </div>
    </div>
</div>

@endsection
