@extends('layouts.app2')
@section('content')
<style>
    .table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
    text-align: center!important;
   }
     .card-header{
         text-align:center;
     }
     .table thead th {
        vertical-align: text-top;
        border-bottom: 2px solid mediumorchid;
      }
   .table-bordered td, .table-bordered th {
    border: 1px solid mediumorchid;
   }
   .card-header:first-child {
    border-radius: calc(1.25rem - 1px) calc(1.25rem - 1px) 0 0;
  }
  .card {
    border-radius: 1.25rem!important;
  }
  
  @media only screen and (max-width:411px){
      .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        width: 100%!important;
        margin-bottom: 5px;
    }
    .btn-primary {
      width: 100%!important;

    }
  } 
  @media only screen and (min-width:412px) and (max-width:768px){
    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        width: 100%!important;
        margin-bottom: 5px;
    }
    .btn-primary {
      width: 100%!important;

    }
    
  }
  @media only screen and (min-width:769px) and (max-width:968px){
    .btn-dark{
      width:100%!important;
    }
    .btn-success {
      width:100%!important;

    }
    .btn-primary {
      width: 100%!important;

    }
    .btn-danger {
      width: 100%!important;
      margin-bottom:5px;

    }

  }
  @media only screen and (min-width:969px){
        .btn-sm{
        width:50%!important;
        margin-left:25%!important;
        margin-right:25%!important;
      }
      .btn-danger {
          
          margin-bottom:5px!important;

        }

  }
  
</style>
<!----start code by Kanchan-------> 

<!---<div class="responsive">
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
    </div>---->
 <!----end code by Kanchan------->    
<!----start code by nisha------->  
<div class="container-fluid">
<div class="row">
<div class="card">
  <div class="card-header">Manage Account</div>
  <div class="card-body">
  <div class="table-responsive">
        <table class="table table-bordered">
  
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Amount</th>
                <th scope="col">Cost Of Per Token</th>
                <th scope="col">Total Token</th>
                <th scope="col">Consumed Token</th>
                <th scope="col">Remaning Token</th>
                <th scope="col">Product Name</th>
                <th scope="col">Token Expire Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
             @foreach($product_customer as $item)
                <tr>
                <th scope="row">{{ ++$i }}</th>
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
                
            </tbody>
       </table>
  
     
  </div>
                               
     
  </div>
  
</div>
</div>
</div>
<!----end  code by nisha------->    

@endsection 
