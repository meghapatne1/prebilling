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
                <div class="card-header">{{ __('EDIT PRODUCT') }}</div>
                <div class="card-body">
                @foreach($product_data as $item)
                <form action="{{ route('update_product') }}" method="POST">
                     @csrf
                    <div class="row">
                    <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">

                        <div class="input-group">
                        <div><lable class="lable-style">Name </lable></div>
                                <i class="fa fa-user-o icon"></i>
                            <input name="pro_name"  type="text" class="form-control" value="{{$item->pro_name}}" required>
                        </div>
                      
                     
                        <div class="input-group">
                        <lable class="lable-style">Price </lable>
                           <i class="fa fa-vcard-o icon"></i>
                            <input name="pro_price" type="number" class="form-control" value="{{$item->pro_price}}" >
                        </div>
                       
                        <div class="input-group">
                        <lable  class="lable-style">Unit </lable>
                        <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
                            <input name="pro_unit" type="text" class="form-control" value="{{$item->pro_unit}}" required="">
                        </div>
                    
                        <input name="id" type="hidden"  value="{{$item->id}}">
                            <input name="update" class="btn btn-info" type="submit" class="form-control" value="Update" >
                        </div>
                    </form>
                        @endforeach   
                    </div>

               
            </div>

@endsection
