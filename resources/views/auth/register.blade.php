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
               border-color: palegoldenrod;
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
             @media only screen and (max-width:398px){
                .form-decoration input {
                    height: 42px;
                    border-radius: 5px;
                    border: 0;
                    font-size: 14px!important;
                    letter-spacing: 1px!important;
                    
                    box-shadow: 2px 0px 0px 3px #d10062;
                  }
             }
             @media only screen and (max-width:280px){
                .form-decoration input {
                    height: 42px;
                    border-radius: 5px;
                    border: 0;
                    font-size: 12px!important;
                    letter-spacing: 1px!important;
                    
                    box-shadow: 2px 0px 0px 3px #d10062;
                  }
             }
</style>

<!---kanchan code ----<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf---kanchan code--->

                        <!------old code start------ <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
<!-- 
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
<!-- 
                        <div class="form-group row">
                            <label for="merchant_type" class="col-md-4 col-form-label text-md-right">{{ __('Merchant Type') }}</label>

                            <div class="col-md-6">
                                <input id="merchant_type" type="merchant_type" class="form-control @error('merchant_type') is-invalid @enderror" name="merchant_type" value="{{ old('merchant_type') }}" required autocomplete="merchant_type">

                                @error('merchant_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 ---old code end here------->
                 <!-----kanchan code start
                     <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="login-form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

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
                                <input id="password" type="password" class="login-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="login-form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary login-form-button ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>----kanchan code end here-------->

<!-----start code by nisha---------->
<div class="container-fluid pt-3   maindiv ">
            
            <section class="login " id="contactid" style="margin-top:23vh;">
             <div class="content headings text-center">
                 
                 
              </div>
              <div class="container" >
                  <div class="row">
                      <div class="col-lg-4 col-md-8 col-10 offset-lg-4 offset-md-2 col-1 mx-auto " style="box-shadow: 1px 2px 3px 6px #6a008a!important;padding: 20px;">
                          <img src="avatar.png" class="avatar">
                           <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div>
                                   <h3 class="text-center font-weight-bold">{{ __('Register') }}</h3>
                                </div>
                              <div class="form-group first form-decoration">
                                 
                                   <label for="mobile" class=" col-form-label text-md-right">{{ __('Mobile') }}</label>

                                        
                                            <input id="mobile" type="text" placeholder="Enter Mobile" class="login-form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        
                              </div>
                              <div class="form-group second form-decoration">
                              <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                    
                                        <input id="password" type="password" placeholder="Enter Password" class="login-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                            </div>
                            <div class="form-group  second form-decoration">
                              <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" placeholder="Enter Confirm Password" class="login-form-control" name="password_confirmation" required autocomplete="new-password">
                            
                            </div>
                              
                            
                            <div class="d-flex justify-content-center form-button">
                            <button type="submit" class="btn  mybtn btn-lg">{{ __('Register') }}</button>
                             </div>
                        </form>
                      </div>
    
                    </div>
               </div>
          </section>
    </div>
    

<!-----end code by nisha---------->
@endsection
