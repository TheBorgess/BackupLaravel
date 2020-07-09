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
     <b>Log In</b>
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
      <form method="post" action="{{ route('signup.update', 0) }}">
        @method('PATCH')
        @csrf  

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
          <button type="submit" class="btn btn-primary">Log In</button>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;
          Not a member?  <a href="http://127.0.0.1:8000/signup/create" class="btn btn-primary">Sign Up</a>
        
      </form>
  </div>
</div>
@endsection