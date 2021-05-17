@extends('layouts.app2')
@section('content')
<style>
    .col-lg-6.col-md-6.col-sm-6.col-xs-12 {
        box-shadow: 1px 1px 16px #7906f0;
        padding: 1rem;
        border-radius: 5px;
        margin: 0rem auto;
    }
</style>

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
                <div class="card-header">{{ __('Edit Customer Product') }}</div>
                <div class="card-body">
                <form action="{{ route('update_poroduct_customer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">

                                <div class="input-group">
                                    <lable class="lable-style">Amount </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="amount" type="text" class="form-control-style" value="{{ $Productcustomer->amount }}">
                                </div>
                            </div>

                                <div class="input-group">
                                    <lable class="lable-style">Token Cost </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="cost_of_per_token" type="text" class="form-control-style" value="{{ $Productcustomer->cost_of_per_token }}" required="">
                                </div>
                                </div>

                                <div class="input-group">
                                    <lable class="lable-style">Total Token </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="total_token" type="text" class="form-control-style" value="{{ $Productcustomer->total_token }}" required>
                                </div>
                                </div>
                                <div class="input-group">
                                    <lable class="lable-style">Utilized Token </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="no_of_token_utilized" type="text" class="form-control-style" value="{{ $Productcustomer->no_of_token_utilized }}">
                                </div>
                                </div>

                                <div class="input-group">
                                    <lable class="lable-style">Remaning Token </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="remaning_token" type="text" class="form-control-style" value="{{ $Productcustomer->remaning_token }}" >
                                </div>
                                </div>
                                <div class="input-group">
                                    <lable class="lable-style">Product Name </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="product_name" type="text" class="form-control-style" value="{{ $Productcustomer->product_name }}" >
                                </div>
                                </div>

                                <div class="input-group">
                                    <lable class="lable-style">Expire Date </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="token_expire_date" type="text" class="form-control-style" value="{{ $Productcustomer->token_expire_date }}" >
                                </div>
                                </div>
                                <div class="input-group" style="width:100%;">
                                    <input name="procust_id" type="hidden" value="{{$Productcustomer->id}}">
                                    <input name="update" class="btn btn-info submit-button-style" type="submit" class="form-control" value="Update">
                                </div>
                             </form>
                            </div></div></div>
                        @endsection 