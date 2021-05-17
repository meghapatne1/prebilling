@extends('layouts.app')
@section('content')

<div class="container">


          <h3>Customer Profile Information</h3>
      <div class="table-responsive">
          <table class="table table-bordered" >
          <tr class="bg-success text-light">
          <td>Customer Name </td>
          <td>Address</td>
          <td>Mobile </td>
          <td>Pincode</td>
          <td>Status </td>
          </tr>
          <tr>
              <td> <span>{{$customer->name}}</span></td>
              <td> <span>{{$customer->address}}</span></td>
              <td> <span>{{$customer->mobile1}}</span></td>
              <td> <span>{{$customer->pincode}}</span> </td>
              <td> 
              <span>
              @if($customer->status == 0)
              Deactive
              @else
              Active
              @endif 
              </span>
              </td>
              </tr>
              </table>

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
    <td> <a href="/customertoken/{{$customer_pro->id}}"><span>{{ $customer_pro->product_name }}</span></td>
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
