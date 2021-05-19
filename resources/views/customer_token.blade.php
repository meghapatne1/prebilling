@extends('layouts.customer_app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .grid-container {
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    grid-gap: .6rem;
    padding: 10px;
    width: 100%;
  }

  /* Custom, iPhone Retina */
  @media only screen and (min-width: 329px) and (max-width: 768px) {
    .grid-container {
      grid-template-columns: auto auto;
    }
  }

  .grid-container>div {
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
    color: black;
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
    border-bottom: 1px solid #f7f4f46b;
    border-radius: 20px;
    font-weight: 100;
    font-family: fantasy;
    color: white;
    display: flex;
    justify-content: space-between;
  }

  .sidebar-style>p {
    font-weight: 800;
    text-align: center;
  }

  .token-box-style {
    background: white;
    padding: 1rem;
    box-shadow: 1px 1px 13px grey;
    background-color: #1fd1f9;
    background-image: linear-gradient(315deg, #1fd1f9 0%, #b621fe 74%);
    min-height: 400px;
    max-width: 65.5% !important;
  }

  .box-style-customer {
    color: #f7f1f1;
    font-weight: 600;
    font-family: inherit;
    font-size: 1.2rem;
  }

  .token-heading {
    font-size: 20px;
    text-align: center;
    font-family: 'FontAwesome';
    color: white;
  }

  .box-style-customer>span>p>b {
    color: black;
  }

  .grad {
    text-align: center;
  }

  .grad td {
    color: #1a3b8a;
    font-family: 'Roboto';
    font-size: 15px;

  }

  .table-edit {
    width: 100% !important;
    box-shadow: 2px 1px 7px #c0076e;

  }

  .row-heading {
    background: linear-gradient(45deg, #4fa6ee, #1247dc);
  }

  .row-heading-table {
    background: linear-gradient(45deg, #d10062, #2d41d1);
  }

  .second-heading {
    text-align: center;
  }

  .second-heading th {
    color: black;
    font-family: 'roboto';

  }

  #top-container {
    min-height: 600px !important;

  }


  .heading5 {
    color: white !important;
  }

  .grad2 td {
    text-align: center;
  }

  @media only screen and (max-width:900px) {
    .table-edit {
      width: 100% !important;
      margin: 1rem auto !important;
      float: none
    }
  }

  /* sidebar style */
  
  #sidebar-wrapper {
    width: 0px;
  }

  #my-navbar-close {
    margin-left: 0rem;
  }

  #top-container {
    margin-left: 0rem;
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
<div class="row edit-row">
  <div class="col-md-12">
    <table class="table table-bordered table-edit">
      <thead>
        <tr class="row-heading-table">
          <th colspan="3">
            <center>
              <h5 class="heading5">Customer Account Information</h5>
            </center>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="grad">
          <td>Total Token : {{ $productcustomers->total_token }}</td>
          <td>Remaning Token : {{ $productcustomers->remaning_token }}</td>
          <td>Cost Of Per Token : {{ $productcustomers->cost_of_per_token }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-4 second-table">

    <table class="table table-bordered" style="max-height:50px;overflow:auto;">
      <thead>
        <tr class="table-row">
          <th colspan="2">
            <center>
              <h5 style="color:white;">Customer History </h5>
            </center>
          </th>
        </tr>
        <tr class="second-heading">
          <th>Used Token</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0; ?>
        @foreach($customer_history as $value)
        <tr class="grad2">
          <td> <span>{{$value->no_of_token_utilized}}</span></td>
          <td> <span>{{ \Carbon\Carbon::parse( $value->created_at)->format('d-m-Y')}} </span></td>
          <?php $total = $total + $value->no_of_token_utilized; ?>
        </tr>
        @endforeach
        <tr class="grad2">
          <td><b>Total Used Token</b></td>
          <td><b>{{$total}}</b></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="col-md-8 token-box-style">
    <h3 class="token-heading">Available Token</h3>
    <div class="grid-container">

      <?php $count = $productcustomers->remaning_token; ?>
      @for($i = 1 ; $i <= $count ; $i++) <div class="item1">
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