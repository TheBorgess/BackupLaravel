@extends('share.layout')

@section('content')
<style>
  .uper {
    margin-top: 44px;
  }
</style>
<div class="card uper" style="width: 27rem;" align="left">
  
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div class="card-header" align="left">
     <b>Contact Us</b>
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
     
      <form method="post" action="{{ route('send') }}">
          <div class="form-group">
              @csrf
              <label for="name">Email:</label>
              <input type="text" class="form-control" name="email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"/>
          </div>
          <div class="form-group">
              <label for="price">Assunto:</label>
              <input type="text" class="form-control" name="subject" required />
          </div>
           <div class="form-group">
              <label for="price">Mensagem:</label>
              <textarea class="form-control" name="message" rows="4" cols="50"></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Enviar</button>
        
      </form>
  </div>
</div>
@endsection