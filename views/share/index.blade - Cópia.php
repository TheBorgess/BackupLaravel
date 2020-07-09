@extends('share.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<script src="path/to/jquery.js"></script>
<script src="path/to/popper.js"></script>
<script src="path/to/bootstrap.js"></script>
<script src="path/to/bootstrap-confirmation.js"></script>

<!-------------------------------------------------PAGINATOR--------------------------------------------------------->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

       <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
            } );
       </script>

<!-------------------------------------------------------------------------------------------------------------------->

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped" border="0" id="example">
    <thead>
        <tr>
          <!--<td><b>ID</td>-->
          <td><b>Name</td>
          <td><b>Price</td>
          <td><b>Quantity</td>
          <td align="right"><a href="http://127.0.0.1:8000/shares/create" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;Novo&nbsp;&nbsp;&nbsp;</a></td>
        <td><!--<a href="{{ route('signup.show',0) }}" class="btn btn-primary" onclick="return confirm('Deseja mesmo sair?');" ><b>Log Out</b></a>--></td>
        </tr>
    </thead>

    <tbody>
        @foreach($shares as $share)
        <tr>
           <!-- <td>{{$share->id}}</td> -->
            <td>{{$share->share_name}}</td>
            <td>{{$share->share_price}}</td>
            <td>{{$share->share_qty}}</td>
            <td align="right"><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editar&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
            <td>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Deseja mesmo deletar?');">&nbsp;&nbsp;&nbsp;Deletar&nbsp;&nbsp;&nbsp;</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

  </table>

</div>

<br><br>

@endsection