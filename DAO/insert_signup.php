<?php

require_once 'config.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

//INSERI UM USUÁRIO
$insertUsuario = new Login();

$insertUsuario->insert($email,$senha);

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
    </head>

<body>
	
        <script>
               alert('Usuário cadastrado com sucesso!')
               window.location.href = 'index.php';
        </script>

</body>
</html>