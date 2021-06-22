@extends('layouts.app2')
@section('content')



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
          <div id="myUL">
            @foreach($get_customers as $item)

            <li class="checkbox">

              <label class="checkbox-style-label"><input type="checkbox" name="customer_mobile[]" value="{{$item->mobile1}}">
                {{$item->name}}-{{$item->mobile1}}
              </label>

</li>

            @endforeach
          </div>
          <input type="hidden" value="{{$mobile}}" name="pos_mobile">
          <input class="btn btn-submit" type="submit" name="submit" value="Submit">
        </form>
        <br>



<div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr class="table-row">
              <th>Customer Name</th>
              <th>Customer Mobile</th>
              <th>Unlink Customer</th>
            </tr>
          </thead>
          <tbody>

            @foreach($get_poscustomers as $data)
            <tr class="table-row-data">
              <td>{{$data->customer_name}}</td>
              <td>{{$data->customer_mobile}}</td>
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
    var ele = document.getElementsByName('customer_mobile[]');
    for (var i = 0; i < ele.length; i++) {
      if (ele[i].type == 'checkbox')
        ele[i].checked = true;
    }
  }

  function deSelect() {
    var ele = document.getElementsByName('customer_mobile[]');
    for (var i = 0; i < ele.length; i++) {
      if (ele[i].type == 'checkbox')
        ele[i].checked = false;

    }
  }
</script>




@endsection