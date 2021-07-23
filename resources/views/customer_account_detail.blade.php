@extends('layouts.customer_app')
@section('content')
<style>

  .text-light td{
    color: white!important;
    font-family: monospace; 
  }
  .linkstyle a:hover{
    text-decoration:none!important;
  }
  .tag a:hover{
    text-decoration:none;

  } 
  .table thead th {
    vertical-align: top;
    border-bottom: 2px solid #dee2e6;
  }
   

  </style>
<!----kanchan code start here--------
<div class="container">
<div class="table-responsive">
<h3 class="information-heading">Customer Account Information</h3>
<table class="table table-bordered" >
<tr class=" text-light ">
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
<tr class="table-row-data">
     <td> <span>{{++$i}}</span></td>
    <td> <b><a href="/customertoken/{{$customer_pro->id}}"><span class="text-danger-style">{{ $customer_pro->product_name }}</span></b></td>
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
</div>-----kanchan code end here------->

<!---nisha start code here----->
<div class="container">
 <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card" style="box-shadow: 2px 3px 3px 2px #6a008a!important;">
                        <div class="header" style="background:linear-gradient(#6a008a  ,#800080ab)!important;">
                            <h6 style="text-align:center;font-weight:bold;color:#fff;padding: 10px;">
                            Customer Account Information
                                
                            </h6>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                             <table  class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Product Name</th>
                                        <th>Amount</th>
                                        <th>Cost of Per token</th>
                                        <th>Total Token</th>
                                        <th>Consumed Token </th>
                                        <th>Remaining Token</th>
                                        <th>Token Expire Date </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($productcustomers as $customer_pro)
                                    <tr class="table-row-data">
                                        <td> <span>{{++$i}}</span></td>
                                        <td class="tag"> <b><a href="/customertoken/{{$customer_pro->id}}"><span  style="text-decoation:none!important;background-color:#fa0053!important;color:#fff!important;padding: .4rem 1rem;border-radius: 3px;overflow: hidden;font-family: auto;">{{ $customer_pro->product_name }}</span></b></td>
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
                                    
                                    
                                    
                                    
                                </tbody>
                                
                             </table>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>

 </div>
<!---nisha end code here----->


@endsection
