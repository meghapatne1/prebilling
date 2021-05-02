@extends('layouts.app2')
@section('content')

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
                  <span class="Add-Product">  Assign Customer To Pos</span>       
                </div>

                <div class="card-body">
                <form action="/save_pos_customers" method="post" class="form-style">
                    @csrf
                    <b>Choose The Customers</b>
                    @foreach($get_customers as $item)
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="{{$item->mobile1}}" name="customer_mobile[]">
                        {{$item->name}} 
                        </label>
                    </div>
                    @endforeach 

                    <input type="hidden" value="{{$mobile}}" name="pos_mobile">
                    <input class="btn btn-info" type="submit" name="submit" value="Submit" style="width:10%;">
                </form>
                <br></br>

              
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Customer Name</th>
            <th>Customer Mobile</th>
            <th>Unlink Customer</th>
            </tr>
            </thead>
            <tbody>
         
            @foreach($get_poscustomers as $data)
            <tr>
            <td>{{$data->customer_name}}</td>
            <td>{{$data->customer_mobile}}</td>
            <td><a href="/delete_pos_customer/{{$data->id}}">Delete</td>
            </tr>
            @endforeach
        
            </tbody>
            </table>
           


                </div>
            </div>
        </div>
    </div>


</div>


@endsection
