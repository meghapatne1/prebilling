@extends('layouts.app2')
@section('content')

<style>
* { font-family:Arial; }
a {
color:#999; text-decoration: none;
}
a:hover { color:#802727; }
input { 
 padding:5px;
 border:1px solid #999;
 border-radius:4px;
  }
/* new css */

input:focus {
    outline: none;
}
.import-button-style{
    background-color: #89d8d3!important;
    background-image: linear-gradient(315deg,  #158a83 0%, #03c8a8 74%)!important;
     border: none!important;
     z-index: 1!important;
     font-family: 'Roboto';
  }
.export-button-style{
  background: rgb(255,151,0)!important;
  background-image: linear-gradient(yellow,#d0d236)!important;
  border: none!important;
  z-index: 1!important;
  font-family: 'Roboto';
}
.card{
    box-shadow: 6px 6px 10px mediumorchid!important;
    margin: 1rem!important;
}
.customer-view-form{
    width: 16%!important;
    margin: .2rem;
    font-family: "roboto";
    border: 1px solid #00000052;
    color: darkslateblue;
    box-shadow: 0px 0px 6px #94007a;
    font-size: 16px!important;
}
@media only screen and (max-width:768px){
    .customer-view-form {
    width: 100%!important;
    margin: .2rem 0rem!important;
    }
    .btn-submit {
    margin: 0px!important;
    width: 100%!important;
}

.form-control{
    margin-left: 0rem!important;
}
.import-button-style {

    margin-bottom: .4rem!important;
    width: 100%!important;
}
.export-button-style{
    width: 100%!important;
}
}


    </style>


<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
        

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
            <div class="card">
                <div class="card-header">
                    
              <span class="Add-Product">  Add Customer</span>
                          
                </div>

                <div class="card-body">

        <form action="/save_customers_info" method="post">
        @csrf
            <div id="InputsWrapper">
                <div>
                    <input type="text" placeholder="Customer Name" class="boxes customer-view-form" name="name[]" id="field_1" value="" required>
                    <input type="text" placeholder="Customer Address" class="boxes customer-view-form" name="address[]" value="" required>
                    <input type="number" placeholder="Customer Mobile" class="boxes customer-view-form" name="mobile1[]" value="" required>
                    <input type="text" placeholder="Customer Colony" class="boxes customer-view-form" name="colony[]" value="" required>
                    <input type="number" placeholder="Customer Pincode"  class="boxes customer-view-form" name="pincode[]" value="" required>
                    <input type="submit"  name="submit" class="btn-submit" value="Submit">       
                <a href="#" class="removeclass"></a></div>
            </div>
            <br>
        </form>
     

        <form action="{{ route('importCustomer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success import-button-style">Import Customer Data</button>
            <a class="btn btn-warning export-button-style" href="{{ route('exportCustomer') }}">Export Customer Data</a>
        </form>

                </div>
            </div>
        </div>
    </div>


</div>


@endsection
