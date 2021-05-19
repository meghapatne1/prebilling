@extends('layouts.customer_app')
@section('content')

<div class="container">


          <h3 class="information-heading">Customer Profile Information</h3>
      <div class="table-responsive">
          <table class="table table-bordered" >
          <tr class=" text-light table-row-data">
          <td>Customer Name </td>
          <td>Address</td>
          <td>Mobile </td>
          <td>Pincode</td>
          <td>Status </td>
          </tr>
          <tr class="table-row-data">
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

</div>
</div>


@endsection
