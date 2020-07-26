<?php

require_once 'config.php';

$nome = ucwords(strtolower($_POST['nome'])); //strtoupper
$end  = ucwords(strtolower($_POST['end'])); //strtoupper
$fone = $_POST['fone'];

//INSERI UM CLIENTE
$insertCliente = new Cliente();

$insertCliente->insert($nome,$end,$fone);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	 <script>
               alert('Dados cadastrados com sucesso!');
               
               //var nome = prompt('Whats your name???') //TESTS OF JAVASCRIPT
               //alert(nome)
               //console.log(nome)
               
               window.location.href = 'listar.php';
               
      </script>

</body>
</html>
  