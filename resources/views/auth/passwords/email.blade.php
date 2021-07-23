@extends('layouts.app')

@section('content')
<!--style start by nisha-->
<style>
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
	  .form-group input {
	       height: 42px;
		   border-radius: 5px;
		   border: 0;
		   font-size: 18px;
		   letter-spacing: 2px;
		   padding-left: 54px;
		   box-shadow: 2px 0px 0px 3px #d10062;
	  }
      
      textarea:hover, 
        input:hover, 
        textarea:active, 
        input:active, 
        textarea:focus, 
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active
        {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: 2px 0px 0px 3px #d10062!important;
        }

	 .first:before {
        font-family: FontAwesome;
        position: absolute;
		font-size: 22px;
		
        left: 28px;
		padding-top: 4px;
        padding-right:10px;
        content: "\f2c0"; 
        }
		.second:before {
		    font-family: FontAwesome;
			position: absolute;
			font-size: 22px;
			
			left: 28px;
			padding-top: 4px;
			padding-right:10px;
			content: "\f023";
		}
		.form-input button {
		    width: 40%;
			margin: 5px 0 25px;
		}
		.mybtn{
		       background: linear-gradient(45deg, #c20169, #800080ab)!important;
               border:1px solid #fff;
               color: #fff;
               font-size: 1rem;
               
		}
        .mybtn:hover{
            box-shadow:none!important;
            color: #fff;
        }
        
        
		  .avatar {
				width: 90px;
				height: 91px;
				border-radius: 50%;
				position: absolute;
				top: -72px;
				left: calc(50% - 50px);
             }
    @media only screen and (max-width:349px){
        .mybtn{
            font-size: 12px;
        }
    }         
			    
		 
  </style>
  <!--style end by nisha-->
<!-- <div class="container">
    <div class="row justify-content-center">
         
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-----start code by nisha---------->
<div class="container-fluid pt-3   maindiv ">
            
        <section class="login " id="contactid" style="margin-top:29vh;">
         <div class="content headings text-center">
             
             
          </div>
          <div class="container" >
              <div class="row">
                  <div class="col-lg-4 col-md-8 col-10 offset-lg-4 offset-md-2 col-1 mx-auto " style="box-shadow: 1px 2px 3px 6px #6a008a!important;padding: 20px;">
                    <img src= "{{ asset('./avatar.png') }}" class="avatar">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<form method="POST" action="{{ route('password.email') }}">
                    @csrf
					        <div>
					           <h3 class="text-center font-weight-bold " style="margin-bottom: 17px;"> {{ __('Reset Password') }}</h3>
                            </div>
                          
                            <div class="form-group">
                              <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            
                            </div>

                        
                          
                        
                        <div class="d-flex justify-content-center form-button">
                        <button type="submit" class="btn  mybtn btn-lg">{{ __('Send Password Reset Link') }}</button>
                         </div>
                    </form>
                  </div>

                </div>
           </div>
      </section>
</div>



<!-----end code by nisha---------->
@endsection
