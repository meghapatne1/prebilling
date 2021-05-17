@extends('layouts.customer_app')
@section('content')

<div class="container">
<div class="table-responsive">
<h3>Customer Account Information</h3>
<table class="table table-bordered" >
<tr class="bg-success text-light">
<td>SNo</td>
<td>Product Name</td>
<td>Amount</td>
<td>Cost of Per token </td>
<td>Total Token</td>
<td>Consumed Token </td>
<td>Remaining Token</td>
<td>Token Expire Date </td>
</tr>
<?php $i=0;?>
@foreach($productcustomers as $customer_pro)
<tr>
     <td> <span>{{++$i}}</span></td>
    <td> <b><a href="/customertoken/{{$customer_pro->id}}"><span class="text-danger">{{ $customer_pro->product_name }}</span></b></td>
    <td> <span>{{ $customer_pro->amount }}</span></td>
    <td> <span>{{ $customer_pro->cost_of_per_token }}</span></td>
    <td> <span>{{ $customer_pro->total_token }}</span> </td>
    <td> <span>{{ $customer_pro->no_of_token_utilized }}</span></td>
    <td> <span>{{ $customer_pro->remaning_token }}</span></td>
    <td>
    <span>
    {{ \Carbon\Carbon::parse( $customer_pro->token_expire_date)->format('d-m-Y')}}    
    </span>
    </td>
    </tr>
  @endforeach
    </table>
</div>
</div>


@endsection
