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

    </style>


<div class="container">
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
                    <input type="text" placeholder="Customer Name" class="boxes" name="name[]" id="field_1" value="" required>
                    <input type="text" placeholder="Customer Address" class="boxes" name="address[]" value="" required>
                    <input type="number" placeholder="Customer Mobile" class="boxes" name="mobile1[]" value="" required>
                    <input type="text" placeholder="Customer Colony" class="boxes" name="colony[]" value="" required>
                    <input type="number" placeholder="Customer Pincode"  class="boxes" name="pincode[]" value="" required>
                    <input type="submit"  name="submit" class="btn-submit" value="Submit">

                   
                <a href="#" class="removeclass"></a></div>
            </div>
            <br>
  
           
        </form>
     
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
