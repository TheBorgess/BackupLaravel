<?php

require_once 'config.php';

//DELETA UM CLIENTE
$deleteCliente = new Cliente();

$deleteCliente->loadById($_GET['id']);

$deleteCliente->delete();

//$deleteCliente->delete($_GET['id']);

echo "<script>alert('Dados excluídos com sucesso!');
              window.location.href = 'listar.php';
      </script>";

?>