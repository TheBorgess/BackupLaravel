@extends('signup.layout')

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


<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped" border="0">
    <thead>
        <tr>
          <!--<td><b>ID</td>-->
          <td><b>Name</td>
          <td><b>Price</td>
          <td><b>Quantity</td>
          <td>&nbsp;</td>
          <td><a href="http://127.0.0.1:8000/shares/create" class="btn btn-primary"><b>&nbsp;Novo&nbsp;</b></a></td>
        </tr>
    </thead>

    <tbody>
        @foreach($shares as $share)
        <tr>
           <!-- <td>{{$share->id}}</td> -->
            <td>{{$share->share_name}}</td>
            <td>{{$share->share_price}}</td>
            <td>{{$share->share_qty}}</td>
            <td align="right"><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Editar</a>&nbsp;&nbsp;&nbsp;</td>
            <td>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection