@extends('layouts.app')
@section('content')

<style>
    /* body{
        background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
    } */
           /* start style code by nisha */
                .card {
					
                    box-shadow: 0px -3px 5px 6px #6a008a!important;
                    border-radius: 20px!important;
                  }	
                  .card-header:first-child {
                          border-radius: calc(1.25rem - 1px) calc(1.25rem - 1px) 0 0!important;
                      }
                      .form-group input {
					    letter-spacing: 2px;
					    box-shadow: 1px 2px 2px 1px #C000C5;
                        background-color: #fff;
                        background-clip: padding-box;
                        border: 1px solid #ced4da;
                        
					} 
                    .card-header {
                            background-color: mediumorchid!important;
                            color: white;
                            border: 2px solid white;
                            font-weight: 600;
                            font-family: 'FontAwesome';
                            font-size: 19px;
                            margin-top: -22px;
                            border-bottom: 1px solid rgba(0,0,0,.125);
                        }  
                        .btn:hover {
                            color: #fff!important;
                        } 
                        .btn:hover,
                        .btn:focus,
                        .btn:active
                        {
                            outline:0px !important;
                            -webkit-appearance:none;
                            box-shadow: none !important;
                        }
                        .gradient2
                        {
                            background-color: #C000C5;
                            /* For WebKit (Safari, Chrome, etc) */
                            background: #C000C5 -webkit-gradient(linear, left top, left bottom, from(#C000C5), to(#C0C0C0)) no-repeat;
                            /* Mozilla,Firefox/Gecko */
                            background: #C000C5 -moz-linear-gradient(top, #C000C5, #C0C0C0) no-repeat;
                            /* IE 5.5 - 7 */
                            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#C000C5, endColorstr=#C0C0C0) no-repeat;
                            /* IE 8 */
                            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#C000C5, endColorstr=#C000C5)" no-repeat;
							color:#fff;
                        }
                        .profile-label {
                            font-weight: 400!important;
                        }
        /* end style code by nisha */                
</style>
<!----start code by nisha------------>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 update-profile-column">
           
                 

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
                    <div class="card-header text-center gradient2 " >Update User Profile</div>
                    <div class="card-body">
                    @foreach($user_profile as $item)
                    <form   action="{{ route('save_user_profile') }}" method="POST">
                         @csrf
                        <div class="form-group">
                        <label class="profile-label" for="email">Name:</label>
                        <input type="text" class="update-profile-style" value="{{$item->name}}" name="name"placeholder="Enter Your Name" >
                        </div>
                        <div class="form-group">
                        <label class="profile-label" for="email">Email:</label>
                        <input type="email" class="update-profile-style" value="{{$item->email}}" name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                        <label class="profile-label" for="email">Mobile:</label>
                        <input type="text" class="update-profile-style" value="{{$item->mobile}}" name="mobile">
                        </div>
                        <div class="form-group">
                        <label class="profile-label" for="email">Merchant Type:</label>
                        <input type="text" class="update-profile-style" value="{{$item->merchant_type}}" name="merchant_type" placeholder="Enter Your Merchant">
                        </div>
                        <div class="form-group">
                        <label class="profile-label" for="pwd">Password:</label>
                        <input type="password" class="update-profile-style"  value="{{$item->password}}" name="password">
                        <input type="hidden" class="update-profile-style" value="{{$item->id}}" name="id">
                        </div>
                        
                        <div class="d-flex justify-content-center form-button">
                              <button type="submit" class="btn   btn-lg gradient2" name="Submit">Submit</button>
                          </div>
                    </form>
                       @endforeach
                    </div>   
                </div>    
            
        </div>
    </div>
</div>
            @endsection
<!----end code by nisha------------>            