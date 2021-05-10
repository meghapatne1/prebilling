@extends('layouts.app2')
@section('content')

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
            <div class="card card-shadow">
                <div class="card-header card-header-style ">
                    
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
            <tr class="table-row">
            <th>Product Name</th>
            <th>Price</th>
            <th>Unit</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_data as $item)
            <tr class="table-row-data">
            <td>{{$item->pro_name}}</td>
            <td>{{$item->pro_price}}</td>
            <td>{{$item->pro_unit}}</td>
            <td>
            <a class="btn btn-info delete-edit-button btn-sm" href="/deleteproduct/{{$item->id}}">Delete</a>
            <a class="btn btn-info delete-edit-button btn-sm" href="/editproduct/{{$item->id}}">Edit</a>
            </td>
       
            </tr>
            @endforeach
            </tbody>
            </table>
           
            @endisset
</div>
<div class="responsive">
            @isset($customer_data) 
            <table class="table table-bordered  collapse" id="customer_id">
            <thead>
            <tr class="table-row">
            <th>Customer Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Pincode</th>
            <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer_data as $item)
            <tr class="table-row-data">
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
