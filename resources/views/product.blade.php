@extends('layouts.app2')
@section('content')


<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="Add-Product"> Add Product </span>

                </div>
                <div class="card-body customer-view-card-body">


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
                            <div class="add-customer-new-style">
                                <input type="text" class="boxes" placeholder="Enter Product Name" name="pro_name" id="field_1" value="" required>
                                <input type="text" class="boxes" placeholder="Enter Price" name="pro_price" value="" required>
                                <input type="text" class="boxes" placeholder="Measurement Unit" name="pro_unit" value="" required>
                                <input type="submit" id="submit" name="submit" class="btn-submit3" value="Submit">
                                <a href="#" class="removeclass"></a>
                            </div>
                        </div>


                    </form>
                    
                    <form action="{{ route('importProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control-input">
                        
             
                        <div class="floar-right">
                            <button class="btn btn-success import-button-style">Import Product Data</button>
                            <a class="btn btn-warning export-button-style" href="{{ route('export') }}">Export Product Data</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection