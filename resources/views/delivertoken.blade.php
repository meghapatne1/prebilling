@extends('layouts.app2')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
          @if($message = Session::get('success'))
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
            <div class="card">
            <div class="card-header">Use Token</div> 
            <div class="card-body"> 
 
            <form action="{{ route('save_token') }}" method="POST">
                @csrf
              <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group">
                          <i class="fa fa-user-o icon"></i>
                      <input name="no_of_token_utilized"  type="number" class="form-control" value="" placeholder="Use deliver" required>
                      <input name="id"  type="hidden" class="form-control" value="{{$id}}">
                  </div>
                  <div class="input-group" style="width:30%;">
                      <input type="submit" name="submit" class="form-control btn btn-info" value="Submit">
                  </div>
            </form>

             </div>
           </div>


        </div>
    </div>
</div>

@endsection
