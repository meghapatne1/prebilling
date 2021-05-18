@extends('layouts.customer_app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.grid-container {
    display: grid;
    grid-template-columns: auto auto auto auto auto;
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

.details span {
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
  .sidebar-style > p {
    font-weight: 800;
    text-align: center;
  }
  .token-box-style {
      background:white;
  }
  .box-style-customer {
    color: #f7f1f1;
    font-weight: 600;
    font-family: inherit;
    font-size: 1.2rem;
}
.box-style-customer > span > p> b{
color:black;
}
.grad {
background-color: red; /* For browsers that do not support gradients */
background-image: linear-gradient(red, yellow);
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
    <div class="row" >
    <div class="col-md-12" >
    <table class="table table-bordered">
     <thead>
      <tr style="background-color: #272626d9 !important;color: cornsilk;">
        <th colspan="3"><center><h5 class="text-light">Customer Account Information</h5></center></th>
      </tr>
      </thead>
      <tbody class="grad">
      <tr><td>Total Token : {{ $productcustomers->total_token }}</td>
     <td>Remaning Token : {{ $productcustomers->remaning_token }}</td>
      <td>Cost Of Per Token : {{ $productcustomers->cost_of_per_token }}</td></tr>
      </tbody>
      </table>
     </div>
     <div class="col-md-4" style="background:#151414;"> 
      <br>
     <table class="table table-bordered" style="max-height:50px;overflow:auto;">
     <thead>
     <tr><th colspan="2"><center><h5 style="color:white;">Customer History </h5></center></th></tr>
      <tr style="background-color: #272626d9 !important;color: cornsilk;">
        <th>Used Token</th>
        <th>Date</th>
      </tr>
      </thead>
      <tbody class="grad">
      <?php $total=0; ?>
          @foreach($customer_history as $value)
              <tr>
              <td> <span>{{$value->no_of_token_utilized}}</span></td>
              <td> <span>{{ \Carbon\Carbon::parse( $value->created_at)->format('d-m-Y')}}  </span></td>
              <?php $total=$total+$value->no_of_token_utilized; ?>
             </tr>
          @endforeach
          <tr><td><b>Total Used Token</b></td><td><b>{{$total}}</b></td></tr>
      </tbody>
      </table>
     </div>
    
    <div class="col-md-8 token-box-style">
    <h3>Available Token</h3>
    <div class="grid-container">
 
    <?php $count = $productcustomers->remaning_token; ?>
    @for($i = 1 ; $i <= $count ; $i++)
    <div class="item1">
          <ul class="ul-class">
            <li>
              <a href="">
                <i class="fa fa-rupee blink "></i>{{ $productcustomers->cost_of_per_token }} 
              </a>
            </li>
          </ul>
        </div>
    @endfor
      </div>
     </div>
</div>
</div>
</div>



@endsection
