@extends('layouts.customer_app')
@section('content')
<style>
      .table thead th {
                vertical-align: top;
                border-bottom: 2px solid #dee2e6;
     }
</style>
<!----kanchan code start here-----
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
</div>----kancahan code end here--------->
<!-------nisha start code here----------->
 <div class="container">
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

                                    </tr>
                                    
                                    
                                    
                                    
                                </tbody>
                                
                             </table>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>

 </div>
<!-------nisha end code here----------->


@endsection
