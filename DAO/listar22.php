<?php

require_once 'config.php';

//----------------------------------------------------------------------------
//CONSULTA DE ACORDO COM O SELECT
////$sql = new Sql();

////$clientes = $sql->select("select * from clientes order by id desc"); 

////echo json_encode($clientes);
//----------------------------------------------------------------------------
//LISTA APENAS UM CLIENTE PELO ID
///$root = new Cliente();

///$root->loadById(40);

///echo $root; 
///echo $root->getIdcliente();
//----------------------------------------------------------------------------
//LISTA TODOS OS CLIENTES OU UM SÓ PELO ID
if (isset($_GET['id'])){
        $lista = Cliente::getClienteByID($_GET['id']);     
}
else {    
        $lista = Cliente::getList(); 
}
////echo json_encode($lista);
//----------------------------------------------------------------------------
//LISTA APENAS UM CLIENTE DE ACORDO COM O ID
///$cliente = Cliente::getClienteByID(40);

////echo "<br>" . json_encode($cliente);
//----------------------------------------------------------------------------
 ?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
   	  <meta charset="utf-8">
   	  <title>Lista de clientes</title>
   	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

<body bgcolor="black">
<div class="container">
 
   <?php echo "<br>"?>
   <a href='index.php'>Home Page</a>
   <?php echo "<br><br>"?>

 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Fone</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($lista as $row) {?>
     <tr>
              <td><a href="index.php?id=<?php echo $row['id'];?>"><?php echo $row['nome'];?></a></td>
              <td><?php echo $row['end'];?></td>
              <td><?php echo $row['fone'];?>&nbsp;&nbsp;&nbsp;</td>
              
               <script language=javascript>
                  function confirma() {
                    if(!confirm("Deseja mesmo deletar?")) {
                        return false;
                    }
                    this.form.submit();
                  }
               </script>

              <td><a onclick="return confirma();" href="delete.php?id=<?php echo $row['id'];?>">Deletar</a></td>       
     </tr>
   <?php }?>
   
  </tbody>
</table>

</div>
</body>
</html>