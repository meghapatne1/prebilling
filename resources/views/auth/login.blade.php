@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    /* body{
        background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%) no-repeat;
        min-height:655px; 
    } */
    .maindiv{
	   content: "";
	        
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			background: linear-gradient(330deg,#DA70D6 55%, #fff 0% );
			z-index:-1;
	}
	  .form-decoration input {
	       height: 42px;
		   border-radius: 5px;
		   border: 0;
		   font-size: 18px;
		   letter-spacing: 2px;
		   padding-left: 54px;
		   box-shadow: 2px 0px 0px 3px #d10062;
	  }
	 
		.form-input button {
		    width: 40%;
			margin: 5px 0 25px;
		}
		.mybtn{
		       background: linear-gradient(45deg, #c20169, #800080ab)!important;
               border-color:none!important;
               color:#fff!important;
		}
		  .avatar {
				width: 90px;
				height: 91px;
				border-radius: 50%;
				position: absolute;
				top: -72px;
				left: calc(50% - 50px);
             }
             .mybtn:hover,
             .mybtn:focus,
             .mybtn:active
             {
                outline:0px !important;
                -webkit-appearance:none;
                box-shadow: none !important;
             }
             .form-button a:hover,
             .form-button a:focus,
             .form-button a:active
             {
                outline:0px !important;
                -webkit-appearance:none;
                box-shadow: none !important;
             }

         @media only screen and (max-width:382px){
            .btn-lg, .btn-group-lg>.btn {
            padding: 0.5rem 1rem;
            font-size: 1.125rem;
            line-height: 1.5;
            border-radius: 0.3rem;
            height: 45px!important;
            margin: auto!important;
         }
         }    
</style>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
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
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf -->
                        <!--old old code here----->
                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                        <!--old old code here----->

                        <!-- <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="login-form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="login-form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary login-form-button ">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-----code start by nisha-------->

<div class="container-fluid pt-3   maindiv ">
            
        <section class="login " id="contactid" style="margin-top:23vh;">
         <div class="content headings text-center">
             
             
          </div>
          <div class="container" >
              <div class="row">
                  <div class="col-lg-4 col-md-8 col-10 offset-lg-4 offset-md-2 col-1 mx-auto " style="box-shadow: 1px 2px 3px 6px #6a008a!important;padding: 20px;">
                    <img src= "{{ asset('./avatar.png') }}" class="avatar">
					<form method="POST" action="{{ route('login') }}">
                    @csrf
					        <div>
					           <h3 class="text-center font-weight-bold">{{ __('Login') }}</h3>
                            </div>
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
                          <div class="form-group first form-decoration">
						     
                          <label for="mobile" class=" col-form-label text-md-right">{{ __('Mobile') }}</label>

                                
                                    <input id="mobile" type="text" class="login-form-control @error('mobile') is-invalid @enderror" placeholder="Enter Mobile" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus >

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                          </div>
						  <div class="form-group second form-decoration">
                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                    
                                        <input id="password" type="password" class="login-form-control  @error('password') is-invalid @enderror"  placeholder="Enter Password" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                        </div>
                        <div class="form-group ">
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            
                        </div>

                        
                          
                        
                        <div class="d-flex justify-content-center form-button">
                        <button type="submit" class="btn  mybtn btn-lg" style="border-color: palegoldenrod;">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link"  style="color:#fff!important;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                         </div>
                    </form>
                  </div>

                </div>
           </div>
      </section>
</div>
         






<!-----code start by nisha-------->
@endsection
