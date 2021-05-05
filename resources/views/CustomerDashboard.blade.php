@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customer Dashboard</div>
                <div class="card-body">

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
                    
           <div class="table-responsive">
         
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Pincode</th>
            <th>Status</th>
            <th>Amount</th>
            <th>Cost Of Per Token</th>
            <th>Total Token</th>
            <th>Consumed Token</th>
            <th>Remaning Token</th>
            <th>Product Name</th> 
            <th>Token Expire Date</th>
            </tr>
            </thead>
            <tbody>
           
            <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->address}}</td>
            <td>{{$customer->mobile1}}</td>
            <td>{{$customer->pincode}}</td>
            @if($customer->status == 0)
            <td>Deactive</td>
            @else
            <td>Active</td>
            @endif       
            <td>{{ $customer->amount }}</td>
            <td>{{ $customer->cost_of_per_token }}</td>
            <td>{{ $customer->total_token }}</td>
            <td>{{ $customer->no_of_token_utilized }}</td>
            <td>{{ $customer->remaning_token }}</td> 
         
            <td>{{ $customer->product_name }}</td>
            <td>{{ $customer->token_expire_date }}</td>
            

            </tr>
            
            </tbody>
            </table>
           
           </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
