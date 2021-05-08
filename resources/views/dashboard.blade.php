@extends('layouts.app3')
@section('content')

<style>


input:focus {
    outline: none;
}

    </style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
            <div class="card">
                <div class="card-header">
                    
              <span class="Add-Product">  {{ __('Dashboard') }}</span>
                
              
                </div>


     <div class="card-body">
               <div class="row text-center">
                <div class="col-sm-6">
                <button type="button"  class="box-style" data-toggle="collapse" data-target="#product_id">
                Product List
                </button>
                
                </div>
                <div class="col-sm-6">
                <button type="button"  class="box-style" data-toggle="collapse" data-target="#customer_id">
                Customer List
                </button>
                </div>
              
              </div>

   

<br><br>

       <div class="responsive">
        @isset($product_data) 
            <table class="table table-bordered collapse" id="product_id">
            <thead>
            <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Unit</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_data as $item)
            <tr>
            <td>{{$item->pro_name}}</td>
            <td>{{$item->pro_price}}</td>
            <td>{{$item->pro_unit}}</td>
            <td>
            <a class="btn btn-info" href="/deleteproduct/{{$item->id}}">Delete</a>
            <a class="btn btn-info" href="/editproduct/{{$item->id}}">Edit</a>
            </td>
       
            </tr>
            @endforeach
            </tbody>
            </table>
           
            @endisset

            @isset($customer_data) 
            <table class="table table-bordered  collapse" id="customer_id">
            <thead>
            <tr>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Pincode</th>
            <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer_data as $item)
            <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->mobile1}}</td>
            <td>{{$item->pincode}}</td>
            @if($item->status == 0)
            <td>Deactive</td>
            @else
            <td>Active</td>
            @endif
            </tr>
            @endforeach
            </tbody>
            </table>
           
            @endisset
        </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
