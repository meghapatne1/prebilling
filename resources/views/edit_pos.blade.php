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




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                <div class="card-header">{{ __('EDIT POS') }}</div>
                <div class="card-body">
                    @foreach($get_pos as $item)
                    <form action="{{ route('update_pos') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">

                                <div class="input-group">
                                    <lable class="lable-style">Name </lable>
                                    <div class="form-control-icon-name">
                                        <i class="fa fa-user-o icon"></i>
                                        <input name="name" type="text" class="form-control-style" value="{{$item->name}}" required>
                                    </div>
                                </div>

                                <!-- <div class="input-group">
                           <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                            <input name="mobile" type="text" class="form-control" value="{{$item->mobile}}"  minlength="10" required="">
                        </div> -->

                                <div class="input-group">
                                    <lable class="lable-style">Address </lable>
                                    <div class="form-control-icon-name">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="address" type="text" class="form-control-style" value="{{$item->address}}">
                                </div>
                            </div>

                                <div class="input-group">
                                    <lable class="lable-style">City </lable>
                                    <div class="form-control-icon-name">
                                    <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
                                    <input name="city" type="text" class="form-control-style" value="{{$item->city}}" required="">
                                </div>
                                </div>

                                <div class="input-group">
                                    <lable class="lable-style">Pincode </lable>
                                    <div class="form-control-icon-name">
                                    <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                                    <input name="pincode" type="text" class="form-control-style" value="{{$item->pincode}}" minlength="6">
                                </div>
                                </div>
                                <div class="input-group">
                                    <lable class="lable-style">Status </lable>
                                    <div class="form-control-icon-name">
                                    <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                                    <input name="status" type="text" class="form-control-style" value="{{$item->status}}">
                                </div>
                                </div>
                                <div class="input-group" style="width:100%;">
                                    <input name="id" type="hidden" value="{{$item->id}}">
                                    <input name="update" class="btn btn-info submit-button-style" type="submit" class="form-control" value="Update">
                                </div>
                    </form>
                    @endforeach
                </div>


            </div>

            @endsection