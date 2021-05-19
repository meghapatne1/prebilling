@extends('layouts.app2')
@section('content')
<style>
    .view-customer-button{
        display:grid;
    }
    .btn-sm {
     margin: 0.2rem 0rem!important;
    }
    .use-token-button{
        border: none;
        background: rgb(251,33,117);
        background: linear-gradient(0deg, rgba(251,33,117,1) 0%, rgba(234,76,137,1) 100%)!important;
        color: #fff;
        overflow: hidden;
        font-family: "roboto";
}

    
    .add-token-button{
        background: linear-gradient(green ,#8bc34a )!important ;
        font-family: "roboto";
    }
    .delete-token-button{
        background: linear-gradient(0deg, rgba(255,151,0,1) 0%, rgba(251,75,2,1) 100%)!important;
        font-family: "roboto";

    }
    .edit-token-button{
        background: rgb(6,14,131)!important;
       background: linear-gradient(0deg, rgba(6,14,131,1) 0%, rgba(12,25,180,1) 100%)!important;
       font-family: "roboto";
    }
    @media only screen and (max-width:768px){
        .card-body{
            overflow-x: scroll;
        }
    }
    

</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    <div class="card">
    <div class="card-header">Manage Customer</div> 
    <div class="card-body"> 
    



    <table class="table table-bordered">
        <tr class="table-row">
            <th>No</th>
            <th>Customer Name</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Colony</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php $i=0;?>
        @foreach ($customerdata as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mobile1 }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->colony }}</td>
            <td>@if($item->status == 1)
                 Active
                @else
                Inactive
                @endif
            </td>
        
            
      
            <td class="view-customer-button">
            <a class="btn btn-dark btn-sm mb-1 update-button-style" href="/return_view_customer_account/{{$item->id}}">Add Account</a>
            <a class="btn btn-dark btn-sm mb-1 use-token-button" href="/manage_customer_account/{{$item->id}}">Manage Account</a>
            <a href="/deletecustomer/{{$item->id}}"  class="btn btn-danger btn-sm delete-token-button">Delete</a>
            <a class="btn btn-primary btn-sm mb-1 edit-token-button" href="/editcustomer/{{$item->id}}">Edit</a>

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
