
@if (session('nome') !== null)
     
     @php
        header("Location: " . URL::to('/shares'), true, 302);
        exit();
     @endphp
 
@endif


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<!--barra de menu-->

<nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top" style="background-color: #D6DBDF;"  >

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Laravel</a>
     </div>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item  {{ (Route::current()->getName() == 'login' ? 'active' : '') }} ">
        <a class="nav-link" href="/">Home <span class="sr-only">(página atual)</span></a>
      </li>
      
      <li class="nav-item {{ (Route::current()->getName() == 'shares.index' ? 'active' : '') }} ">
        <a class="nav-link" href="/shares">Shares <span class="sr-only">(página atual)</span></a>
      </li>

      <li class="nav-item {{ (Route::current()->getName() == 'api.product' ? 'active' : '') }} ">
        <a class="nav-link" href="/api/product">Products <span class="sr-only">(página atual)</span></a>
      </li>

       <li class="nav-item {{ (Route::current()->getName() == 'api1' ? 'active' : '') }} ">
        <a class="nav-link" href="/api1">API <span class="sr-only">(página atual)</span></a>
      </li>
     
   </ul>
   
    <ul class="navbar-nav navbar-right">
      <li><a class="nav-link" onclick="return confirm('Deseja mesmo sair?');" href="/signup/0">Log Out&nbsp;&nbsp;&nbsp; 
          <span class="sr-only">(página atual)</span></a>
      </li>
    </ul>   

  </div>

</nav>

<!--fim barra menu-->

  <div class="container" align="center">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>