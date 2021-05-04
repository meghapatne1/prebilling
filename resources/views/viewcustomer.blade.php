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
    <div class="card">
    <div class="card-header">Manage Customer</div> 
    <div class="card-body"> 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Amount</th>
            <th>Cost Of Per Token</th>
            <th>Total Token</th>
            <th>Consumed Token</th>
            <th>Remaning Token</th>
            <!-- <th>Start Date</th>
            <th>End Date</th> -->
            <th>Product Name</th> 
            <th>Token Expire Date</th>
           
            <th>Action</th>
        </tr>
        <?php $i=0;?>
        @foreach ($customerdata as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mobile1 }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->cost_of_per_token }}</td>
            <td>{{ $item->total_token }}</td>
            <td>{{ $item->no_of_token_utilized }}</td>
            <td>{{ $item->remaning_token }}</td> 
            <!-- <td>{{ $item->start_date }}</td>  
            <td>{{ $item->end_date }}</td>    -->
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->token_expire_date }}</td>
            
      
            <td>
            <a class="btn btn-dark btn-sm mb-1" href="/delivertoken/{{$item->id}}">Use Token</a>
            <a class="btn btn-success btn-sm mb-1" href="/issuetoken/{{$item->id}}">Add Token</a>
            <a href="/deletecustomer/{{$item->id}}"  class="btn btn-danger btn-sm">Delete</a>
            <a class="btn btn-primary btn-sm mb-1" href="/editcustomer/{{$item->id}}">Edit/Update Account</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
        </div>
    </div>
</div>

@endsection
