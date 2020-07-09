@extends('share.layout')

@section('content')


<script type="text/javascript">
	
   alert("Email has been sent!!!");
   window.location.href = "http://127.0.0.1:8000/send-mail";


</script>


<!DOCTYPE html>
<html>
<head>
	<title>E-mail sent</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<br>
	<div class="container">
		<div class="alert alert-success" role="alert">
		 	E-mail has been sent!!!<br>
		 	Thanks, we will contact you soon!!!
		</div>
	 </div>
</body>
</html>

@endsection