<?php

require_once 'config.php';

session_start();
$id    = $_SESSION['id_usuario'];
$senha = $_POST['senha'];

//UPDATE THE PASSWORD OF THE USER
$updatetUser = new Login();

$updatetUser->updateSenha($id,$senha);

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Alterara Senha</title>
    </head>

<body>
	
        <script>
               alert('Senha alterada com sucesso!')
               window.location.href = 'listar.php';
        </script>

</body>
</html>