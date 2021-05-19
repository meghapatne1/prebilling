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
            <div class="card">


                <div class="card-header">Update Customer</div>
                <div class="add-update">
                    <!-- add customer profile -->
                    <div class="card-body edit-cus-card"  style="width: 50%">
                        <div class="outer-div-border">

                            <div class="update-customer">Update Custumer Profile</div>
                            <form action="{{ route('update_customer') }}" method="POST">
                                @csrf

                                @foreach ($customerdata as $item)

                                <div class="form-group">
                                    <lable class="lable-style">Name</lable>

                                    <input name="name" type="text" class="form-control editcustomer-input" value="{{ $item->name }}">
                                </div>

                                <div class="form-group">
                                    <lable class="lable-style">Address</lable>

                                    <input name="address" type="text" class="form-control editcustomer-input" value="{{ $item->address }}">
                                </div>

                                <div class="form-group">
                                    <lable class="lable-style">Pincode</lable>

                                    <input name="pincode" type="number" class="form-control editcustomer-input" value="{{ $item->pincode }}">
                                </div>

                                <div class="form-group">
                                    <lable class="lable-style">Status</lable><br>
                                    @if($item->status == 1)
                                        <input type="radio" name="status" value="1" checked>
                                        <label for="male" class="lable-style">Active</label>
                                        <input type="radio" name="status" value="2">
                                        <label for="female"class="lable-style">Inactive</label>
                                        @else
                                        <input type="radio" name="status" value="1">
                                        <label for="male" class="lable-style">Active</label>
                                        <input type="radio" name="status" value="2" checked>
                                        <label for="female"class="lable-style">Inactive</label>

                                    @endif
                                </div>


                                <div class="form-group" style="text-align: center;width:100%;">
                                    <input name="id" type="hidden" class="form-control editcustomer-input" value="{{ $item->id }}">
                                    <input name="submit" type="submit" class=" btn btn-info text-white update-button-style" value="Update Customer Profile">
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