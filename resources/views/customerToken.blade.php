@extends('layouts.pos_app')
@section('content')
<style>
.box-style2{
    margin-top: 16px!important;
    margin-bottom: 16px!important;
    box-shadow: 2px 2px 17px 1px grey;
    padding: 16px;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pos Dashboard</div>
                <div class="card-body">
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
            
           <div class="table-responsive">
            <table class="table table-bordered">
            <h3> Customer Information </h3>
            <thead>
            <tr>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Mobile</th>
            <th>Shift</th>
            <th>Payment Type</th>
            <th>Total Token</th>
            <th>Remainig Token</th>
            <th>Used Token</th>
            <th>Expiry Date </th>
            <th>Pay</th>
            </tr>
            </thead>
            <tbody>
            @foreach($get_customers as $data)
            <tr>
            <td>{{$data->product_name}} </td> 
            <td>{{$data->amount}}</td>
            <td>{{$data->customer_mobile}}</td>
            <td>{{$data->shift}}</td>
            <td>{{$data->payment_type}}</td>
            <td>{{$data->total_token}}</td>
            <td>{{$data->remaning_token}}</td>
            <td>{{$data->no_of_token_utilized}}</td>
            <td>{{ \Carbon\Carbon::parse( $data->token_expire_date)->format('d-m-Y')}}</td>
            <td>
                <?php $id = $data->id ?>
                
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{$id}}">Pay</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{$id}}" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                        <form class="w3-container" action="{{ route('use_token') }}" method="Post">
                            @csrf
                            <div class="w3-section box-style2">
                            <label><b style="font-family:-webkit-pictograph;">Enter No Of Token Utilized</b></label>
                            <input class="w3-input w3-border" type="number" value="" placeholder="Enter No Of Token Utilized" name="no_of_token_utilized" required>
                            <input type="hidden" name="product_name" value="{{$data->product_name}}">
                            <input type="hidden" name="cost_of_per_token" value="{{$data->cost_of_per_token}}">
                            <input type="hidden" name="remaning_token" value="{{$data->remaning_token}}">
                            <input type="hidden" name="total_token" value="{{$data->total_token}}">
                            <input type="hidden" name="customer_id" value="{{$data->customer_id}}">
                            <input type="hidden" name="customer_mobile" value="{{$data->customer_mobile}}">
                            <input type="hidden" name="pro_cus_id" value="{{$data->id}}">

                            
                            <input class="w3-button w3-block w3-green w3-section w3-padding btn-submit3" value="Submit" name="submit" type="submit" style="width:25%;"/>
                        </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                    </div>

                    <!-- model end -->
            </td>
          
            </tr>
            @endforeach
            </tbody>
            </table>



            <table class="table table-bordered">
                            <thead>
                                <tr class="table-row">
                                    <th>Product Name</th>
                                    <th>Customer Mobile</th>
                                    <th>Used Token</th>
                                    <th>Delivery Date</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            @foreach($get_history as $history)
                            <tr>
                               <td>{{$history->product_name}}</td>
                               <td>{{$history->customer_mobile}}</td>
                               <td>{{$history->no_of_token_utilized}}</td>
                               <td>
                               {{ \Carbon\Carbon::parse( $history->created_at)->format('d-m-Y') }}</td>
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

@endsection
