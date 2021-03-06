@extends('layouts.app2')
@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
<style>
   .card-header:first-child {
    border-radius: calc(2.25rem - 1px) calc(2.25rem - 1px) 0 0;
    }
    .card {
      border-radius: 2.25rem;
    }
    .select-all-button{
      margin-bottom: .5rem!important;
    }
    .form-style {
      padding: 1rem 1rem!important;
    }
    .checkbox-style-label {
      padding: 0px!important;
    }
    label {
    display: inline-block;
    margin-bottom: 1rem!important;
   }

    @media only screen and (max-width:360px){
      .Add-Product {
        font-size: 18px;
      }
      .choose-cutomer-style{
          font-size: 14px!important;
          font-weight: 600;
          
      }
     }
    @media only screen and (max-width:411px){
      .select-all-button {
          margin-bottom: .5rem!important;
          width: 100%;
        }
        .choose-cutomer-style {
          font-weight: 600;
          font-size: 15px;
        }
    } 
    @media only screen and (max-width:320px){
      .Add-Product {
        font-size: 15px;
      }
      #myInput-style {
           width: 138px;
           
      }
      .checkbox-style-label {
        font-size:12px!important;
      }
    }
   @media only screen and (max-width:280px){
        #myInput-style {
        width: 124px!important;
        font-size: 11px!important;
        }
        .choose-cutomer-style {
          font-size:11px!important;
        }
        

   }

</style>



<div class="row justify-content-center">
  <div class="col-md-12">


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
      <div class="card-header">
        <span class="Add-Product"> Assign Customer To Pos</span>
      </div>
      <div class="card-body">
        <form action="/save_pos_customers" method="post" class="form-style">
          @csrf
          <b class="choose-cutomer-style">Choose The Customers</b>
          <input type="text" id="myInput" class="myInput-style" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
          <br><br>
          <div class="select-deselect-style">
            <input type="button" class="btn select-all-button btn-sm" onclick='selects()' value="Select All" />
            <input type="button" class="btn select-all-button btn-sm" onclick='deSelect()' value="Deselect All" />
          </div>
          <br/>
         <h5> <b class="choose-cutomer-style" style="font-family: 'Mate SC', serif;">Choose The Customers</b></h5>
          <div id="myUL">
            @foreach($get_customers as $item)

            <li class="checkbox">

              <label class="checkbox-style-label">
              <input type="checkbox" name="customer_id[]" value="{{$item->id}}">

                {{$item->name}}-{{$item->mobile1}}
              </label>

</li>

            @endforeach
          </div>
          <input type="hidden" value="{{$mobile}}" name="pos_mobile">
          <input type="hidden" value="{{$pos_id}}" name="pos_id">
          <input class="btn btn-submit" type="submit" name="submit" value="Submit">
        </form>
        <br>

     
        <br>



<div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr class="table-row">
              <th>Customer Name</th>
              <th>Unlink Customer</th>
            </tr>
          </thead>
          <tbody>

            @foreach($get_poscustomers as $data)
            <tr class="table-row-data">
              <td>{{$data->customer_name}}</td>
              <td><a href="/delete_pos_customer/{{$data->id}}" class="delete-button-style">Delete</td>
            </tr>
            @endforeach

          </tbody>
        </table>

        </div>

      </div>
    </div>
  </div>
</div>


</div>
<script>
  function myFunction() {

    var input, filter, ul, li, la, i, txtValue;
    input = document.getElementById("myInput");
  
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");

 
    console.log(li.length); 

    for (i = 0; i < li.length; i++) {
      la = li[i].getElementsByTagName("label")[0];
      txtValue = la.textContent || la.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
</script>
<script>
  function selects() {
    var ele = document.getElementsByName('customer_id[]');
    for (var i = 0; i < ele.length; i++) {
      if (ele[i].type == 'checkbox')
        ele[i].checked = true;
    }
  }

  function deSelect() {
    var ele = document.getElementsByName('customer_id[]');
    for (var i = 0; i < ele.length; i++) {
      if (ele[i].type == 'checkbox')
        ele[i].checked = false;

    }
  }
</script>




@endsection