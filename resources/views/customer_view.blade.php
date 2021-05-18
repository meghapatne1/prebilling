@extends('layouts.app2')
@section('content')




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

                <div class="card-body customer-view-card-body">

                    <form action="/save_customers_info" method="post">
                        @csrf
                        <div id="InputsWrapper">
                            <div class="add-customer-new-style">
                                <input type="text" placeholder="Customer Name" class="boxes customer-view-form" name="name[]" id="field_1" value="" required>
                                <input type="text" placeholder="Customer Address" class="boxes customer-view-form" name="address[]" value="" required>
                                <input type="number" placeholder="Customer Mobile" class="boxes customer-view-form" name="mobile1[]" value="" required>
                                <input type="text" placeholder="Customer Colony" class="boxes customer-view-form" name="colony[]" value="" required>
                                <input type="number" placeholder="Customer Pincode" class="boxes customer-view-form" name="pincode[]" value="" required>

                                <a href="#" class="removeclass"></a>
                            </div>
                        </div>

                    </form>


                    <form action="{{ route('importCustomer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <input type="submit" name="submit" class="btn btn-submit2" value="Submit">

                        <div class="floar-right" style="float:right">
                            <button class="btn btn-success import-button-style">Import Customer Data</button>
                            <a class="btn btn-warning export-button-style" href="{{ route('exportCustomer') }}">Export Customer Data</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


@endsection