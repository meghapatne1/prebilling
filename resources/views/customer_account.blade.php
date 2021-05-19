@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
 

    .section {
        margin-top: 1rem;
        text-align: center;
        margin-bottom: 1rem;
        width: 100%;
    }

    .update-button-style {
        background: rgb(0, 172, 238) !important;
        background: linear-gradient(0deg, rgba(0, 172, 238, 1) 0%, rgba(2, 126, 251, 1) 100%) !important;
        width: 100%;
    }

    .form-control {
        margin-left: 0px !important;
    }

    .select-form {
        border:none!important;
        display: block;
        box-shadow: 1px 1px 6px #109e8f !important;
        padding: 8px 14px !important;
        font-family: 'Roboto' !important;
        width: 100%;
        border-radius: 5px;
    }

    input:focus {
        outline: none!important;
    }

    .add-update {
        display: flex;
        justify-content: space-evenly;
    }

    .row-content {
        width: 100%;
        display: block !important;
    }
    .editcustomer-input{
    box-shadow: 0px 0px 6px #1d89c9!important;
    padding: 3px 14px!important;
    font-family: 'Roboto'!important;
    margin-top: .4rem!important;
    }
    @media only screen and (max-width:1200px){
        .profile-account-style{
            width:80%
        }
        .lable-style {
     margin-right: 0rem;
        }
        .edit-cus-card{
            padding: .7rem!important;
            width: 100%!important;
        }
        .add-update{
            flex-direction: column;
        }
        .editcus-col{
            padding: 0px!important;

        }
        .card{
            margin: 1rem 0rem !important;
        }
        .update-customer {
         font-size: 16px;
        }
        .update-account{
            font-size: 15px; 
        }
        .update-button-style{
            font-size: 15px;

        }

        
    }
</style>


<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 editcus-col">

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">


                <div class="card-header">Add Customer Account</div>
            

                <div class="add-update">
                    <div class="card-body edit-cus-card" style="width:50%">
                        <div class="row-content">
                            <div class="outer-div-border">

                                <div class="update-account">Add Customer Account</div>

                                <form action="{{ route('add_customer_account') }}" method="POST">
                                    
                            
    
    @foreach ($customerdata as $item)
    @csrf
    <div class="form-group">
    <lable class="lable-style">Amount</lable>
    
        <input name="amount" type="number" class="form-control editcustomer-input" value="" required>
    </div>
    <input name="customer_mobile" type="hidden" class="form-control editcustomer-input" value="{{ $item->mobile1 }}" required>
    <div class="form-group">
    <lable class="lable-style">Utilized Token</lable>
       
        <input name="no_of_token_utilized" type="number" class="form-control editcustomer-input" value="" required>
    </div>

    <div class="form-group">
    <lable class="lable-style">Total tokan</lable>
      
        <input name="total_token" type="number" class="form-control editcustomer-input" value="" required>
    </div>

    <div class="form-group">
    <lable class="lable-style">Cost Of Per Token</lable>
    
        <input name="cost_of_per_token" type="number" class="form-control editcustomer-input" value="" required>
    </div>

    <div class="form-group">
    <lable class="lable-style">Remaining Token</lable>
    
        <input name="remaning_token" type="number" class="form-control editcustomer-input" value="" required>
    </div>
    
    <div class="form-group">
    <lable class="lable-style"> Select Product Name</lable>
        <select name="product_name" class="form-control editcustomer-input" id="sel1" required>
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
        <select name="payment_type" class="form-control editcustomer-input" required>
        <option value="prepaid"> Pre Paid</option>
        <option value="postpaid"> Post Paid</option>
        </select>
    </div>

    <div class="form-group">
    <lable class="lable-style"> Select Payment Shift</lable>
        <select name="shift" class="form-control editcustomer-input" required>
        <option value="morning"> Morning</option>
        <option value="evening"> Evening</option>
        <option value="anytime"> AnyTime</option>
        </select>
    </div>

    <div class="form-group">
    <lable class="lable-style"> Product Brand </lable>
        <select name="brand" class="form-control editcustomer-input" required>
        <option value="sanchi"> Sanchi</option>
        <option value="amul"> Amul </option>
        </select>
    </div>

    <div class="form-group">
    <lable class="lable-style">Token Valid Upto</lable>
    <input name="token_expire_date" type="date" class="form-control editcustomer-input" value="" required>
    </div>

    <div class="form-group" style="width:100%;">
    <input name="customer_id" type="hidden" class="form-control editcustomer-input" value="{{ $item->id }}">
    <input name="submit" type="submit" class=" btn btn-info text-white update-button-style" value="Save Account">
    </div>
    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>

                    
            </div>
        </div>
    </div>

    @endsection 