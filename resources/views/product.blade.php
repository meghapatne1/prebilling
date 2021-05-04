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
            <div class="card">
                <div class="card-header">
                <span class="Add-Product">  Add Product </span>

                </div>
                <div class="card-body">


                    @if ($message = Session::get('status'))
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
            
                    
        <form action="/saveproduct" method="post">
        @csrf
            <div id="InputsWrapper">
                <div>
                    <input type="text" class="boxes" placeholder="Enter Product Name" name="pro_name" id="field_1" value="" required>
                    <input type="text" class="boxes" placeholder="Enter Price" name="pro_price" value="" required>
                    <input type="text" class="boxes" placeholder="Measurement Unit" name="pro_unit" value="" required>
                    <input type="submit" id="submit" name="submit" class="btn-submit" value="Submit">
                <a href="#" class="removeclass"></a></div>
            </div>
           
        
        </form>
        
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
