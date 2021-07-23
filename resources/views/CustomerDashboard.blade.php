@extends('layouts.customer_app')
@section('content')
<style>
      .table thead th {
                vertical-align: top;
                border-bottom: 2px solid #dee2e6;
     }
</style>


 <div class="container">
     

 @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
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

            @if (session('error'))
            
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
 <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card" style="box-shadow: 2px 3px 3px 2px #6a008a!important;">
                        <div class="header" style="background:linear-gradient(#6a008a  ,#800080ab)!important;">
                            <h6 style="text-align:center;font-weight:bold;color:#fff;padding: 10px;">
                            Customer Profile Information
                                
                            </h6>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                             <table  class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Pincode</th>
                                        <th>Status</th>
                                        <th>Change Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->mobile1}}</td>
                                        <td>{{$customer->pincode}}</td>
                                        <td>
                                        @if($customer->status == 0)
                                            Deactive
                                            @else
                                            Active
                                            @endif 

                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">Change</button>
                                        </td>

                                    </tr>           
                                </tbody>
                                
                             </table>
                            </div> 

                        </div>


                            <!-- Modal -->
                            <div class="modal fade" id="update" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="/update_cus_pswd" method="POST">
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
<!-------nisha end code here----------->


@endsection
