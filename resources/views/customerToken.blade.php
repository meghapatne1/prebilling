@extends('layouts.app')
@section('content')


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
            <h3> Customer Information </h3>
            <thead>
            <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Remainig Token</th>
            <th>Total Used Token</th>
            <th>Expiry Date </th>
            </tr>
            </thead>
            <tbody>
            @foreach($get_customers as $data)
            <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->mobile1}}</td>
            <td>{{$data->remaning_token}}</td>
            <td>{{$data->no_of_token_utilized}}</td>
            <td>{{ \Carbon\Carbon::parse( $data->token_expire_date)->format('d-m-Y')}}</td>
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
