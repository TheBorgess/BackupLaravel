@extends('share.layout')

@section('content')
 
<style>
  .uper {
    margin-top: 70px;
  }
</style>


<div class="card uper" style="width: 27rem;" align="left">
  
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div class="card-header" align="left">
     <b>API and Date</b>
  </div>
  <br>
  <div class="card-body" style="width: 27rem;">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <!--<form method="get" action="{{ route('signup.create') }}">-->
      <form method="get" action="{{ route('api2') }}">
        <?php //@method('PATCH')
              //@csrf  ?>

          <div class="form-group">
              <label for="name">Url API:</label>
              <input type="text" class="form-control" name="urlapi" required />
          </div>

          <div class="form-group">
            <label for="tipoAPI">Type</label>
            <select id="tipoAPI" name="tipoAPI" class="form-control" required>
              <option selected value="">Choose...</option>
              <option value="1" >Finance</option>
              <option value="2" >Weather</option>
            </select>
          </div>
          
           <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
           <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
           <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
           
          <div class="form-group">
             <label for="name">Date:</label>
             <input id="datepicker" name="datepicker" width="250" required />
           
             <script>
                $('#datepicker').datepicker({
                  uiLibrary: 'bootstrap4',
                  format: 'dd-mm-yyyy'
                });
             </script>
          </div>
         
         <br>
         <button type="submit" class="btn btn-primary">Send</button>
      
      </form>

  </div>      

</div>


@endsection