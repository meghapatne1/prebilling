@extends('layouts.pos_app')
@section('content')
<style>
    .heading-pos{
        font-size: 18px;
        font-family: 'Roboto';
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pos Dashboard</div>
                <div class="card-body">
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
            <table class="table table-bordered">
            <h3 class="heading-pos">User Information</h3>
            <thead>
            <tr class="table-row">
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pos_user_info as $item)
            <tr class="table-row-data">
            <td>{{$item->name}}</td>
            <td>{{$item->mobile}}</td>
            <td>{{$item->address}},{{$item->city}},{{$item->pincode}}</td>
            </tr>
            @endforeach
            </tbody>
            </table>

            <table class="table table-bordered">
            <h3 class="heading-pos">Assigned Customer Information</h3>
            <thead>
            <tr class="table-row">
            <th>Name</th>
            <th>Mobile</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pos_customers as $data)
            <tr>
            <td><a href="/getCustomer/{{$data->id}}">{{$data->customer_name}}</a></td>
            <td>{{$data->customer_mobile}}</td>
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
