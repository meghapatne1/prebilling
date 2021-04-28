@extends('layouts.app2')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
         @endif


@if ($errors->any())
        <div class="alert alert-danger">
      
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
            </div>
     @endif

     @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
            <div class="card">
                <div class="card-header">{{ __('Add Customer') }}</div>
                <div class="card-body">
                <form action="{{ route('save_customer') }}" method="POST">
                     @csrf
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                           
                                <i class="fa fa-user-o icon"></i>
                         
                            <input name="first_name" id="first_name" type="text" class="form-control" value="" placeholder="First Name" required>
                        </div>
                        <div class="input-group">
                           <i class="fa fa-user-o icon"></i>
                            <input name="last_name" id="last_name" type="text" class="form-control" value="" placeholder="Last Name" required>
                        </div>
                        <div class="input-group">
                           <i class="fa fa-vcard-o icon"></i>
                            <input name="address" type="text" class="form-control" value="" placeholder="Address1">
                        </div>
                        <div class="input-group">
                           <i class="fa fa-money icon" style="font-size:18px;" ></i>
                            <input name="colony" type="text" class="form-control" value="" placeholder="colony">
                        </div>
                        <div class="input-group">
                        <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
                            <input name="city" type="text" class="form-control" value="" required="" placeholder="City">
                        </div>
                        <div class="input-group">
                           <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                            <input name="mobile1" type="text" class="form-control" value="" placeholder="Phone 1" minlength="10" required="">
                        </div>
                        <div class="input-group">
                           <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                            <input name="mobile2" type="text" class="form-control" value="" placeholder="Phone 2" minlength="10">
                        </div>
                        <div class="input-group">
                            <i class="ion-ios-location-outline icon" style="font-size:18px;"></i>
                                <select name="shift" class="form-control" style="width:50%;">
                                    <option value="1">Select Shift</option>
                                    <option value="1">Morning</option>
                                    <option value="2">Evening</option>
                                    <option value="3">Both</option>
                                </select>
                            </div>
                          
                           
                    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                            <i class="ion-ios-location-outline icon"></i>
                            <select name="agent" class="form-control" style="width:50%;" required="">
                                <option value="">Select Agent</option>
                                    <option value="27" style="display:  ">Prakash</option>
                                    <option value="28" style="display:  ">Mogli</option>
                                    <option value="29" style="display:  ">Sachin</option>
                                </select>
                        </div>
        <div class="input-group">  
        <i class="ion-ios-location-outline icon" style="font-size:18px;"></i>
        <select name="status" required="" class="form-control" style="width:50%; margin-right:1px;">
                <option value="">Status</option>
                <option value="prepaid">Prepaid</option>
                <option value="postpaid">Post Paid</option>
            
            </select>            
        </div>


        <div class="input-group">
        <i class="fa fa-money icon"></i>
            <input name="amount" type="number" step="0.01" class="form-control" value="" data-limitrecharge="" placeholder="Amount">
            <span style="color:red;" id="limit_span">
        </div>

        <div class="input-group">
        <i class="fa fa-vcard-o icon"></i>
        <input name="total_token" type="text" class="form-control" value="" placeholder="Total Token">
       </div>

        <div class="input-group">
            <i class="fa fa-vcard-o icon"></i>
            <input name="cost_of_per_token" type="text" class="form-control" value="" placeholder="Cost of per Token">
        </div>

        <div class="input-group">
            <i class="fa fa-vcard-o icon"></i>
            <input name="no_of_token_utilized" type="text" class="form-control" value="" placeholder="No of Token utilized">
        </div>

        <div class="input-group">
            <i class="fa fa-vcard-o icon"></i>
            <input name="remaning_token" type="text" class="form-control" value="" placeholder="Remaning Token">
        </div>
        
        <div class="input-group">
            <i class="fa fa-vcard-o icon"></i>
            <input name="product_name" type="text" class="form-control" value="" placeholder="Product name">
        </div>
        
        </div> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
       <div class="card-header">Select Validity Of Token</div>
       <div class="card-body">
        <div class="input-group">
            Start Date<i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i><input name="start_date" type="date" class="form-control" value="" placeholder="Start Date" minlength="10">
            End Date<i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i><input name="end_date" type="date" class="form-control" value="" placeholder="End Date" minlength="10">
        </div>
        </div>
        </div>
        </div>

        <div class="input-group" style="text-align: center;width:10%;margin-left:45%;margin-top:1%;">
            <input name="submit" type="submit" class="form-control btn btn-info" value="Submit">
        </div>

        </div>
        </form>
        </div>
            </div>
        </div>
    </div>
</div>

@endsection
