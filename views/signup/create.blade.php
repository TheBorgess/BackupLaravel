@extends('signup.layout')

@section('content')
<style>
  .uper {
    margin-top: 110px;
  }
</style>
<div class="card uper" style="width: 27rem;" align="left">
  
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div class="card-header" align="left">
     <b>Sign Up</b>
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
      <form method="post" action="{{ route('signup.store') }}">
          
          <div class="form-group">
              @csrf
              <label for="name">Email:</label>
              <input type="text" class="form-control" name="nome" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"/>
          </div>
          <div class="form-group">
              <label for="price">Senha:</label>
              <input type="password" class="form-control" name="senha" required />
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        
      </form>
  </div>
</div>
@endsection