@extends('layouts.app2')
@section('content')


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
<!--start style code by @nisha--->
<style>
  .card{
      border-radius: 1.25rem!important;
   }
   .card-header:first-child {
    border-radius: calc(1.25rem - 1px) calc(1.25rem - 1px) 0 0!important;
    }
    .btn-submit3{
        margin-top:.5rem;
    }
    .card-header{
        text-align:center!important;
    }
    
    @media only screen and (max-width:367px){
        .form-control-input{
            font-size:12px!important;
        }
    }
</style>
<!--end  style code by @nisha--->
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

                    <span class="Add-Product"> Add Customer</span>

                </div>

                <div class="card-body customer-view-card-body" style="padding-bottom:37px;">

                    <form action="/save_customers_info" method="post">
                        @csrf
                        <div id="InputsWrapper">
                            <div class="add-customer-new-style">
                                <input type="text" placeholder="Customer Name" class="boxes customer-view-form" name="name[]" id="field_1" value="" required>
                                <input type="text" placeholder="Customer Address" class="boxes customer-view-form" name="address[]" value="" required>
                                <input type="number" placeholder="Customer Mobile" class="boxes customer-view-form" name="mobile1[]" value="" required>
                                <input type="text" placeholder="Customer Colony" class="boxes customer-view-form" name="colony[]" value="" required>
                                <input type="number" placeholder="Customer Pincode" class="boxes customer-view-form" name="pincode[]" value="" required>
                                <input type="submit" name="submit" class="btn btn-submit3 " value="Submit">
                                <a href="#" class="removeclass"></a>
                            </div>
                        </div>

                    </form>
                    <hr>


                    <form action="{{ route('importCustomer') }}" method="POST" enctype="multipart/form-data">
                     <h5 style="text-align:center;font-family: 'Mate SC', serif;">  Bulk Customer  Upload</h5>
                        @csrf
                        <input type="file" name="file" class="form-control-input">
                    
                        

                        <div class="floar-right">
                            <button class="btn btn-success import-button-style">Import Customer Data</button>
                            <a class="btn btn-warning export-button-style" href="{{ route('exportCustomer') }}">Export Customer Data</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>
<!----------start code by nisha--------->
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">


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
            <div class="card" >
                <div class="card-header ">

                    <span class="Add-Product card-heading" > Add Customer</span>

                </div>

                <div class="card-body customer-view-card-body"  style="width:100%!important;box-shadow:none!important;padding-bottom:37px;">

                    <form action="/save_customers_info" method="post">
                        @csrf
                        <div id="InputsWrapper">
                            <div class="add-customer-new-style">
                                <input type="text" placeholder="Customer Name" class="boxes customer-view-form" name="name[]" id="field_1" value="" required>
                                <input type="text" placeholder="Customer Address" class="boxes customer-view-form" name="address[]" value="" required>
                                <input type="number" placeholder="Customer Mobile" class="boxes customer-view-form" name="mobile1[]" value="" required>
                                <input type="text" placeholder="Customer Colony" class="boxes customer-view-form" name="colony[]" value="" required>
                                <input type="number" placeholder="Customer Pincode" class="boxes customer-view-form" name="pincode[]" value="" required>
                                <input type="submit" name="submit" class="btn btn-submit3 " value="Submit">
                                <a href="#" class="removeclass"></a>
                            </div>
                        </div>

                    </form>
                    <hr>


                    <form action="{{ route('importCustomer') }}" method="POST" enctype="multipart/form-data">
                     <h5 style="text-align:center;font-family: 'Mate SC', serif;">  Bulk Customer  Upload</h5>
                        @csrf
                        <input type="file" name="file" class="form-control-input">
                    
                        

                        <div class="floar-right">
                            <button class="btn btn-success import-button-style">Import Customer Data</button>
                            <a class="btn btn-warning export-button-style" href="{{ route('exportCustomer') }}">Export Customer Data</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>

<!--------end code by nisha------->


@endsection