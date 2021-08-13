@extends('layouts.pos_app')
@section('content')
<style>
    .heading-pos{
        font-size: 18px;
        font-family: 'Roboto';
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pos Dashboard</div>
                <div class="card-body">
   @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif


    
     @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
    
      @if ($errors->any())
        <div class="alert alert-danger">
      
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
     @endif
            <table class="table table-bordered">
            <h3 class="heading-pos">User Information</h3>
            <thead>
            <tr class="table-row">
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Change Password</th>
            </tr>
            </thead>
            <tbody>
          
            <tr class="table-row-data">
            <td>{{$pos_user_info->name}}</td>
            <td>{{$pos_user_info->mobile}}</td>
            <td>{{$pos_user_info->address}},{{$pos_user_info->city}},{{$pos_user_info->pincode}}</td>
            <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">Change</button></td>
            </tr>
        
            </tbody>
            </table>

            <table class="table table-bordered">
            <h3 class="heading-pos">Assigned Customer Information</h3>
            <thead>
            <tr class="table-row">
            <th>Name</th>
            <th>Mobile</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pos_customers as $item)
            <tr>
            <td><a href="/getCustomer/{{$item->customer_id}}">{{$item->customer_name}}</a></td>
            <td>{{$item->customer_id}}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
              


                            <!-- Modal -->
                            <div class="modal fade" id="update" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="/update_pos_pswd" method="POST">
                                    @csrf
                                    <lable>Enter New Password </lable>
                                    <input type="password" name="password" value=""/>  <br><br>
                                    <input type="submit" name="submit" value="submit" >  
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                            </div>
                            <!-- End Modal -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
