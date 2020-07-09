@extends('share.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
     <b>Add Share</b>
  </div>
  <br>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('shares.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="share_name"/>
          </div>
          <div class="form-group">
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="share_price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" name="share_qty"/>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          <!--&nbsp;&nbsp;&nbsp;<a href="http://127.0.0.1:8000/shares" class="btn btn-primary">&nbsp;Listar&nbsp;</a>-->
      </form>
  </div>
</div>
@endsection