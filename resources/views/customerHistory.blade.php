@extends('layouts.app2')
@section('content')
<style>
    /* start code by @nisha */
   .card{
      border-radius: 1.25rem!important;
   }
   .card-header:first-child {
    border-radius: calc(1.25rem - 1px) calc(1.25rem - 1px) 0 0!important;
    }
    customer-header th{
        color:black!important;
        font-weight:600!important;
        background:none!important;
    }
    /* end code by @nisha */
    .customerhistory-row-style{
        background: blueviolet;
    }
    .customerhistory-row-style th{
        color:white!important;
        font-size: 16px;
    }
    @media only screen and (max-width:768px){
        .card-body{
            overflow-x: scroll;
        }
    }
 

</style>
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card">
    <div class="card-header"> Customer-history</div> 
    <div class="card-body"> 
    <table class="table table-bordered">
        <tr class="customerhistory-row-style">
            <th>No</th>
            <th>Name</th>
            <th>Customer Mobile</th>
            <th>Cost Of Per Token</th>
            <th>Total Token</th>
            <th>Consumed Token</th>
            <th>Remaning Token</th>
            <th>Product Name</th>
           
        </tr>
        <?php $i=0;?>
        @foreach ($customer_history_data as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->customer_mobile }}</td>
            <td>{{ $item->cost_of_per_token }}</td>
            <td>{{ $item->total_token }}</td>
            <td>{{ $item->no_of_token_utilized }}</td>
            <td>{{ $item->remaning_token }}</td>   
            <td>{{ $item->product_name }}</td>
        </tr>
        @endforeach
    </table>
</div>
</div>
        </div>
    </div>
</div>
<!----start code by nisha--->
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card">
    <div class="card-header" style="text-align:center;"> Customer-history</div> 
    <div class="card-body"> 
    <table class="table table-striped">
        <tr class="customerhistory-row-style customer-header">
            <th style="color:black!important;">No</th>
            <th style="color:black!important;">Name</th>
            <th style="color:black!important;">Customer Mobile</th>
            <th style="color:black!important;">Cost Of Per Token</th>
            <th style="color:black!important;">Total Token</th>
            <th style="color:black!important;">Consumed Token</th>
            <th style="color:black!important;">Remaning Token</th>
            <th style="color:black!important;">Product Name</th>
           
        </tr>
        <?php $i=0;?>
        @foreach ($customer_history_data as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->customer_mobile }}</td>
            <td>{{ $item->cost_of_per_token }}</td>
            <td>{{ $item->total_token }}</td>
            <td>{{ $item->no_of_token_utilized }}</td>
            <td>{{ $item->remaning_token }}</td>   
            <td>{{ $item->product_name }}</td>
        </tr>
        @endforeach
    </table>
</div>
</div>
        </div>
    </div>
</div>

<!---------end code by nisha----------->

@endsection
