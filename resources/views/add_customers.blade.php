@extends('layouts.app')
@section('content')

<style>
    * {
        font-family: Arial;
    }

    a {
        color: #999;
        text-decoration: none;
    }

    a:hover {
        color: #802727;
    }

    input {
        padding: 5px;
        border: 1px solid #999;
        border-radius: 4px;
    }

    /* new css */

    input:focus {
        outline: none;
    }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <span class="Add-Product"> {{ __('Add Customer') }}</span>

                    <a href="#" style="float:right;" id="AddMoreFileBox" class="btn btn-success add-more">+Add More</a><br><br>

                </div>

                <div class="card-body">


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
                    <form action="/save_customers_info" method="post">
                        @csrf
                        <div id="InputsWrapper">
                            <div>
                                <input type="text" placeholder="Customer Name" class="boxes" name="name[]" id="field_1" value="" required>
                                <input type="text" placeholder="Customer Address" class="boxes" name="address[]" value="" required>
                                <input type="text" placeholder="Customer Mobile" class="boxes" name="mobile1[]" value="" required>
                                <input type="text" placeholder="Customer Colony" class="boxes" name="colony[]" value="" required>
                                <input type="text" placeholder="Customer Pincode" class="boxes" name="pincode[]" value="" required>
                                <input type="submit" name="submit" class="btn-submit" value="Submit">


                                <a href="#" class="removeclass"></a>
                            </div>
                        </div>
                        <br>

                        <a href="/dashboard" style="color:white;" class="btn btn-success">Skip/Next</a>
                        <div id="lineBreak"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function() {

        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileBox"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = 1; //to keep track of text box added

        //on add input button click
        $(AddButton).click(function(e) {
            //max input box allowed

            FieldCount++; //text box added ncrement
            //add input box
            $(InputsWrapper).append('<div style="margin-top:1%;"><input type="text"  class="boxes" required placeholder="Customer Name" name="name[]" id="field_' + FieldCount + '"/>&nbsp;<input  class="boxes" required type="text" placeholder="Customer Address" name="address[]"/>&nbsp;<input type="text"  class="boxes" required placeholder="Customer Mobile" name="mobile1[]" />&nbsp;<input  class="boxes" required type="text" placeholder="Customer Colony" name="colony[]"/>&nbsp;<input  class="boxes" required type="text" placeholder="Customer Pincode" name="pincode[]"/>&nbsp;<a href="#" style="text-decoration: none;color: #fff;padding: 6px;border-radius: 5px;" class="removeclass btn-remove">Remove</a></div>');
            x++; //text box increment

            $("#AddMoreFileId").show();

            $('AddMoreFileBox').html("Add field");

        });

        $("body").on("click", ".removeclass", function(e) { //user click on remove text
            if (x > 1) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox

                $("#AddMoreFileId").show();

                $("#lineBreak").html("");

                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
            }
            return false;
        })

    });
</script>

@endsection