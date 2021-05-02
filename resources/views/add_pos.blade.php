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
                <div class="card-header">{{ __('ADD POS') }}</div>
                <div class="card-body">
                <form action="{{ route('save_pos') }}" method="POST">
                     @csrf
                    <div class="row">
                    <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">
                        <div class="input-group">
                                <i class="fa fa-user-o icon"></i>
                            <input name="name"  type="text" class="form-control" value="" placeholder="Enter Name" required>
                        </div>
                      
                        <div class="input-group">
                           <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                            <input name="mobile" type="text" class="form-control" value="" placeholder="Enter Mobile Number" minlength="10" required="">
                        </div>

                        <div class="input-group">
                           <i class="fa fa-vcard-o icon"></i>
                            <input name="address" type="text" class="form-control" value="" placeholder="Enter Address">
                        </div>
                       
                        <div class="input-group">
                        <i class="ion-ios-home-outline icon" style="font-size:20px;"></i>
                            <input name="city" type="text" class="form-control" value="" required="" placeholder="Enter City">
                        </div>
                       
                        <div class="input-group">
                           <i class="ion-social-whatsapp-outline icon" style="font-size:18px;"></i>
                            <input name="pincode" type="text" class="form-control" value="" placeholder="Enter Pin Code" minlength="6">
                        </div>
                        <div class="input-group" style="width:30%;">
                            <input name="submit" class="btn btn-info" type="submit" class="form-control" value="Submit" >
                        </div>
                    
                       </form>    
                    </div>

                    <div class="responsive">
                   
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Pincode</th>
                                <th>status</th>
                                <th>Link To Customer</th>
                                <th>Action</th>
                            </tr>
                    </thead>
                    <tbody>
                         @foreach($pos_data as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->pincode}}</td>
                                

                                @if($item->status == 1)
                                <td>Active</td>
                                @else
                                <td>Deactive</td>
                                @endif
                                <td><a href="/pos_link_customers/{{$item->mobile}}"> Link to customer</a></td> 
                                <td>
                                <a href="/deletepos/{{$item->id}}"  class="btn btn-danger btn-sm">Delete</a>
                                <a href="/editpos/{{$item->id}}" class="btn btn-primary btn-sm mb-1" >Edit</a>
                                </td>   

                              
                            </tr>
                         @endforeach  
                    </tbody>
                        </table>
                     
                </div> 
            </div>

@endsection
