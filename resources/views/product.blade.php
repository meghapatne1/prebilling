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
    margin: 1rem !important;
}
@media only screen and (max-width:768px){
    

 .boxes{
    width: 100%!important;
    margin: .3rem 0rem;
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
            <div class="card">
                <div class="card-header">
                <span class="Add-Product">  Add Product </span>

                </div>
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
        <br>
        <form action="{{ route('importProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success import-button-style">Import Product Data</button>
                <a class="btn btn-warning export-button-style" href="{{ route('export') }}">Export Product Data</a>
            </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
