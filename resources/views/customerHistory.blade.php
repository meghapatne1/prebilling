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
            <th>Cost Of Per Token</th>
            <th>Total Token</th>
            <th>Consumed Token</th>
            <th>Remaning Token</th>
            <th>Product Name</th>
            <th>Mobile1</th>
           
        </tr>
        <?php $i=0;?>
        @foreach ($customer_history_data as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->customer_firstname }}{{ $item->customer_lastname }}</td>
            <td>{{ $item->mobile1 }}</td>
            <td>{{ $item->cost_of_per_token }}</td>
            <td>{{ $item->total_token }}</td>
            <td>{{ $item->no_of_token_utilized }}</td>
            <td>{{ $item->remaning_token }}</td>   
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->mobile1 }}</td>
            
           
        </tr>
        @endforeach
    </table>
</div>
</div>
        </div>
    </div>
</div>

@endsection
