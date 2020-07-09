@extends('signup.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <b>Edit Share</b>
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
      <form method="post" action="{{ route('shares.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="share_name" value='{{ $share->share_name }}' />
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" class="form-control" name="share_price" value={{ $share->share_price }} />
        </div>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <input type="text" class="form-control" name="share_qty" value={{ $share->share_qty }} />
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection