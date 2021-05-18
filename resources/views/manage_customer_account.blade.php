@extends('layouts.app2')
@section('content')
<div class="responsive">
<table class="table table-bordered">
        <tr class="table-row">
            <th>No</th>
            <th>Amount</th>
            <th>Cost Of Per Token</th>
            <th>Total Token</th>
            <th>Consumed Token</th>
            <th>Remaning Token</th>   
            <th>Product Name</th> 
            <th>Token Expire Date</th> 
            <th>Action</th>
        </tr>
        <?php $i=0;?>
        @foreach($product_customer as $item)
        <tr>
            <td>{{ ++$i }}</td>   
            <td>{{ $item->amount }}</td>
            <td>{{ $item->cost_of_per_token }}</td>
            <td>{{ $item->total_token }}</td>
            <td>{{ $item->no_of_token_utilized }}</td>
            <td>{{ $item->remaning_token }}</td> 
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->token_expire_date }}</td>
            <td class="view-customer-button">
            <a class="btn btn-dark btn-sm mb-1 use-token-button" href="/delivertoken/{{$item->id}}">Use Token</a>
            <a class="btn btn-success btn-sm mb-1 add-token-button" href="/issuetoken/{{$item->id}}">Add Token</a>
            <a class="btn btn-danger btn-sm delete-token-button"  href="/delete_product_customer/{{$item->id}}">Delete</a>
            <a class="btn btn-primary btn-sm mb-1 edit-token-button" href="/edit_product_customer/{{$item->id}}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table> 
    </div>
@endsection 