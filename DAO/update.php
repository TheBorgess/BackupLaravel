<?php

require_once 'config.php';

$nome = ucwords(strtolower($_POST['nome'])); //strtoupper
$end  = ucwords(strtolower($_POST['end'])); //strtoupper
$fone = $_POST['fone'];
$id   = $_POST['id'];


//UPDATE A CLIENT
$updateCliente = new Cliente();

$updateCliente->loadById($id); 

$updateCliente->update($nome, $end, $fone);

echo "<script>alert('Dados atualizados com sucesso!');
            window.location.href = 'listar.php';
      </script>";

?>