@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
           <div class="container">
                 

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

                    @foreach($user_profile as $item)
                    <form  class="form-style" action="{{ route('save_user_profile') }}" method="POST">
                         @csrf
                        <div class="form-group">
                        <label class="" for="email">Name:</label>
                        <input type="text" class="form-control" value="{{$item->name}}" name="name">
                        </div>
                        <div class="form-group">
                        <label class="" for="email">Email:</label>
                        <input type="email" class="form-control" value="{{$item->email}}" name="email">
                        </div>
                        <div class="form-group">
                        <label class="" for="email">Mobile:</label>
                        <input type="text" class="form-control" value="{{$item->mobile}}" name="mobile">
                        </div>
                        <div class="form-group">
                        <label class="" for="email">Merchant Type:</label>
                        <input type="text" class="form-control" value="{{$item->merchant_type}}" name="merchant_type">
                        </div>
                        <div class="form-group">
                        <label class="" for="pwd">Password:</label>
                        <input type="password" class="form-control"  value="{{$item->password}}" name="password">
                        <input type="hidden" class="form-control" value="{{$item->id}}" name="id">
                        </div>
                        <div class="form-group">
                        <input type="Submit" class="form-control" class="btn btn-primary" name="Submit" value="Submit">
</div>
                    </form>
                    @endforeach
            </div>
        </div>
    </div>
</div>
            @endsection