@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.pb-4, .py-4 {
    padding-top: 0rem !important;
}
.grid-container {
    display: grid;
    grid-template-columns: auto auto auto auto auto auto auto;
    grid-gap: .6rem;
    padding: 10px;
    width:100%;
  }

/* Custom, iPhone Retina */ 
@media only screen and (min-width: 329px) and (max-width: 768px) { 
.grid-container {
    grid-template-columns: auto auto;
  }
}

  .grid-container>div {
    background-color: #FFFFB3;
    text-align: center;
    padding: 15px 0px;
    font-size: 30px;
  }
  .ul-class {
    transform: translate(50%, 0%);
    margin: 0px;
    background: goldenrod;
    padding: 8px 9px;
    box-shadow: -6px 0px 0px darkgoldenrod;
    width: 53%;
}


.ul-class li {
list-style: none;
}

.ul-class li a {
text-decoration: none;
color: black;
display: flex;
justify-content: space-around;
border: 1px solid #0000007d;
border-radius: 3px;
padding: 3px 0px;
font-size: 15px;
}
.fa-rupee {
        position: relative;
        top: 5px; 
    }

.blink {
animation: blink 1.3s steps(2, start) infinite !important;
-webkit-animation: blink 1.3s steps(2, start) infinite !important;
}

@keyframes blink {
to {
  visibility: hidden;
}
}

@-webkit-keyframes blink {
to {
  visibility: hidden;
}
}
.sidebar-style{
       
        background-color: #ffa726;
       }
.navbar{
    background: linear-gradient(90deg,#0c2646 0,#204065 60%,#2a5788) !important;
    box-shadow: 0 1px 1px 0 rgb(0 0 0 / 16%);
}
.details span{
    color:black;
}
.card {
  
  width: 100%;
  height: 197px;
  border: 1px solid grey;
  border-radius: 6px;
  margin: 2rem 0rem;
  box-shadow: 1px 1px 5px #090b0b;
}
li.details {
    padding: 6px 11px;
    list-style: none;
    font-size: 17px;
    border-bottom: 1px solid  #f7f4f46b;
    border-radius: 20px;
    font-weight: 100;
    font-family: fantasy;
        color: white;
    display: flex;
    justify-content: space-between;
  }
  .sidebar-style > p{
    font-weight: 800;
    text-align: center;
  }
  .token-box-style{
      background:white;
  }
</style>


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
             
    <div class="row">
    <div class="col-md-3 sidebar-style"><br>
   
    
  
        <p>Customer Profile Information</p>
        <li class="details">Customer Name : <span>{{$customer->name}}</span></li>
        <li class="details">Address : <span>{{$customer->address}}</span> </li>
        <li class="details">Mobile : <span>{{$customer->mobile1}}</span></li>
        <li class="details">Pincode : <span>{{$customer->pincode}}</span></li>
        <li class="details">Status : <span> @if($customer->status == 0)
            <td>Deactive</td>
            @else
            <td>Active</td>
            @endif </span>
        </li>
        <br>
        <p>Customer Account Information</p>
        <li class="details">Product Name : <span>{{ $customer->product_name }}</span></li>
        <li class="details">Amount : <span>{{ $customer->amount }}</span></li>
        <li class="details">Cost of Per token : <span>{{ $customer->cost_of_per_token }}</span></li>
        <li class="details">Total Token : <span>{{ $customer->total_token }}</span> </li>
        <li class="details">Consumed Token : <span>{{ $customer->no_of_token_utilized }}</span></li>
        <li class="details">Remaining Token : <span>{{ $customer->remaning_token }}</span></li>
        <li class="details">Token Expire Date : <span>
        {{ \Carbon\Carbon::parse( $customer->token_expire_date)->format('d-m-Y')}}    
        </span></li>
        <hr>
        <center> <h3 type="button"  data-toggle="collapse" data-target="#history_id"><b>History</b></h3></center>

        <br>
    </div>


    <div class="col-md-9 token-box-style">
  
    <div class="grid-container">
        <?php $count = $customer->remaning_token; ?>
    @for ($i = 1 ; $i <= $count ; $i++)
    <div class="item1">
          <ul class="ul-class">
            <li>
              <a href="">
                <i class="fa fa-rupee blink "></i>{{ $customer->cost_of_per_token }} 
              </a>
            </li>
          </ul>
        </div>
    @endfor
      </div>
      <table class="table table-bordered collapse m-1" id="history_id" >
      <tr class="bg-success">
        <th>Date</th>
        <th>Used Token</th>
      </tr>
          @foreach($customer_history as $value)
              <tr><td> <span>   
                {{ \Carbon\Carbon::parse( $value->created_at)->format('d-m-Y')}}  </span></td>
              <td> <span>{{$value->no_of_token_utilized}}</span></td>
             </tr>
          @endforeach
      </table>
     </div>
    

</div>
@endsection
