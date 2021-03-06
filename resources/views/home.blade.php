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

    .button-skip-customer-style {
        display: flex;
        justify-content: space-between;
    }

    .skip-add-customer {
        background: linear-gradient(0deg, rgba(255, 151, 0, 1) 0%, rgba(251, 75, 2, 1) 100%) !important;
        line-height: 42px;
        padding: 0rem 1rem;
        border: none;
        color: white;
        font-size: 14px;
        margin-right: 1rem;

    }

    .skip-add-customer:hover {
        color: white !important;
        background: rgb(255,151,0)!important;
        

    }
    .boxes{
        width:18rem !important;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="Add-Product"> {{ __('Add Product') }} </span>
                </div>
                <div class="card-body">


                    @if ($message = Session::get('status'))
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

                    <form action="/save_product" method="post">
                        @csrf
                        <div id="InputsWrapper">
                            <div>
                                <input type="text" class="boxes" placeholder="Enter Product Name" name="pro_name[]" id="field_1" value="" required>
                                <input type="number" class="boxes" placeholder="Enter Price" name="pro_price[]" value="" required>
                                <input type="text" class="boxes" placeholder="Measurement Unit" name="pro_unit[]" value="" required>

                                <a href="#" id="AddMoreFileBox" class="btn btn-success add-more">+Add More</a>


                                <a href="#" class="removeclass"></a>
                            </div>
                        </div>
                        <br>
                        <div class="button-skip-customer-style">
                            <input type="submit" id="submit" name="submit" class="btn-submit" style="margin-left:27rem;" value="Submit">
                            <a href="/add_customers_info" class="btn btn-sm skip-add-customer">Skip/Add Customer</a>
                        </div>

                        <div id="lineBreak"></div>

                    </form>
                    @isset($product_get)
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_get as $item)
                            <tr>
                                <td>{{$item->pro_name}}</td>
                                <td>{{$item->pro_price}}</td>
                                <td>{{$item->pro_unit}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endisset
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
            $(InputsWrapper).append('<div style="margin-top:1%;"><input type="text"  class="boxes"  required placeholder="Enter Product Name" name="pro_name[]" id="field_' + FieldCount + '"/>&nbsp;<input required type="text" placeholder="Enter Price"  class="boxes"  name="pro_price[]"/>&nbsp;<input type="text"  class="boxes"  required placeholder="Measurement Unit" name="pro_unit[]" />&nbsp;<a href="#" style="text-decoration: none;color: #fff;  black; padding: 6px;border-radius: 5px;" class="removeclass btn-remove">Remove</a></div>');
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