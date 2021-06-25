@extends('layouts.app2')
@section('content')
<style>
         /* start code by @nisha */
    .card{
        border-radius: 2.25rem!important;
    }
    .card-header:first-child {
        border-radius: calc(2.25rem - 1px) calc(2.25rem - 1px) 0 0!important;
        }
    /* end code by @nisha */
    .delete-edit-td-style{
        display: flex;
        justify-content: space-between;

    }
    .col-lg-6.col-md-6.col-sm-6.col-xs-12 {

        padding: 1rem;
        margin: 0rem 15rem 0rem 15rem;
        border-radius: 5px;
        box-shadow: 1px 1px 16px #7906f0;
    }




    .submit-button-style {
        background: rgb(96, 9, 240) !important;
        background: linear-gradient(0deg, rgba(96, 9, 240, 1) 0%, rgba(129, 5, 240, 1) 100%) !important;
        border: none !important;
        width: 100% !important;
    }

    .submit-button-style:hover {
        box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .5),
            -4px -4px 6px 0 rgba(116, 125, 136, .5),
            inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
            inset 4px 4px 6px 0 rgba(0, 0, 0, .4) !important;
    }

    .responsive {
        width: 100%;
        margin: 1rem;
    }

    .delete-style {
        background: linear-gradient(0deg, rgba(255, 151, 0, 1) 0%, rgba(251, 75, 2, 1) 100%) !important;
        font-family: "roboto";
    }

    .edit-style {
        background: rgb(6, 14, 131) !important;
        background: linear-gradient(0deg, rgba(6, 14, 131, 1) 0%, rgba(12, 25, 180, 1) 100%) !important;
        font-family: "roboto";
        width: 100% !important;
        margin-left:2px!important;
        border: 1px solid red!important;
    }
          /* start code by @nisha */
             .btn-sm:hover,
             .btn-sm:focus,
             .btn-sm:active
             {
                outline:0px !important;
                -webkit-appearance:none;
                box-shadow: none !important;
             }
              /* end code by @nisha */

    @media only screen and (max-width:768px) {
        .col-lg-6.col-md-6.col-sm-6.col-xs-12 {
            margin: 0rem;

        }

        .responsive {
            width: 100%;
            margin: 1rem 0rem;
            overflow-x: scroll;
        }

        .delete-style {
            width: 50% !important;
        }

        .edit-style {
            width: 50% !important;
            
        }

        .form-control-style {

            width: 100%;
            margin-left: 0rem;
        }
           /*start style by nisha*/
        .fa {
            display:none;
        }
           /*end style by nisha*/

        .submit-button-style {
           width: 100% !important;
        }
        /*start style by nisha*/
        .row {
            justify-content:center!important;
        }
                /*end style by nisha*/
        }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                <div class="card-header">{{ __('ADD POS') }}</div>
                <div class="card-body">
                    <form action="{{ route('save_pos') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <i class="fa fa-user-o icon"></i>
                                    <input name="name" type="text" class="form-control-style" value="" placeholder="Enter Name" required>
                                </div>

                                <div class="input-group">
                                    <i class="fa fa-phone icon" style="font-size:18px;"></i>
                                    <input name="mobile" type="text" class="form-control-style" value="" placeholder="Enter Mobile Number" minlength="10" required="">
                                </div>

                                <div class="input-group">
                                    <i class="fa fa-vcard-o icon"></i>
                                    <input name="address" type="text" class="form-control-style" value="" placeholder="Enter Address">
                                </div>

                                <div class="input-group">
                                    <i class="fa fa-home icon" style="font-size:20px;"></i>
                                    <input name="city" type="text" class="form-control-style" value="" required="" placeholder="Enter City">
                                </div>

                                <div class="input-group">
                                    <i class="fa fa-map-marker  icon" style="font-size:18px;"></i>
                                    <input name="pincode" type="text" class="form-control-style" value="" placeholder="Enter Pin Code" minlength="6">
                                </div>
                                <div class="input-group" style="width: 100%;">
                                    <input name="submit" class="btn btn-info submit-button-style" type="submit" class="form-control" value="Submit">
                                </div>

                    </form>
                </div>

                <div class="responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-row">
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Pincode</th>
                                <th>status</th>
                                <th>Link To Customer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pos_data as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->pincode}}</td>


                                @if($item->status == 1)
                                <td>Active</td>
                                @else
                                <td>Deactive</td>
                                @endif
                                <td><a href="/pos_link_customers/{{$item->mobile}}" style="color:blueviolet!important;"> Link to customer</a></td>
                                <td class="delete-edit-td-style">
                                    <a href="/deletepos/{{$item->id}}" class="btn btn-danger btn-sm delete-style">Delete</a>
                                    <a href="/editpos/{{$item->id}}" class="btn btn-primary btn-sm edit-style">Edit</a>
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            @endsection