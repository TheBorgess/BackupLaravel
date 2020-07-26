<?php

session_start();
if (!isset($_SESSION['id_usuario'])){
      header('Location:logout.php');
}

require_once 'config.php';

if (isset($_GET['id'])){
      $id = $_GET['id'];
}

?>


<!DOCTYPE HTML>
<html lang="pt-br">

<head>
<title>Cadastro de Clientes</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<style type="text/css">
  .tabela {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 18px;
  }
  
  body {
            background-image: url("../images/foto.jpg");
            background-color: #E0E0F8;
  }
   
  button {
                    background-color: #3498DB; /* color */
                    border: none;
                    color: white;
                    padding: 4px 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
          }

   
        .parent {display: block;position: relative;float: left;line-height: 30px;background-color: #4FA0D8;border-right:#CCC 1px solid;}
        .parent a{margin: 10px;color: #FFFFFF;text-decoration: none;}
        .parent:hover > ul {display:block;position:absolute;}
        .child {display: none;}
        .child li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:95%;}
        .child li a{color: #000000;}
        ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
        ul ul ul{left: 100%;top: 0;margin-left:1px;}
        li:hover {background-color: #95B4CA;}
        .parent li:hover {background-color: #F0F0F0;}
        .expand{font-size:12px;float:right;margin-right:5px;}


</style>

  <script>
     // function formatar(mascara, documento){
     //    var i = documento.value.length;
     //    var saida = mascara.substring(0,1);
     //    var texto = mascara.substring(i);
          
     //   //alert ('i= ' + i);
     //   //alert ('saida= ' + saida);
     //   //alert ('texto=' + texto);


      //   if (texto.substring(0,1) != saida){
      //        documento.value += texto.substring(0,1);
      //        //alert ('if=' + documento.value);
      //   }
     // }

     function confirmLogOut() {
                    if(!confirm("Deseja mesmo sair?")) {
                        return false;
                    }
                    this.form.submit();
    }
                  
</script>

</head>

<body>
 <br>
 <table  border="0" align="right">
    <tr>
      <td><img src="../DAO/images/user.jpg" style="width:30px;height:31px;"></td>
      <td>
           <ul id="menu">
             <li class="parent"><a href="#"><?php echo $_SESSION['email']?></a>
              <ul class="child">
                <li><a onclick="return confirmLogOut();" href="logout.php">Log Out</a></li>
                <li><a href="signup.php">Alterar Senha</a></li>
              </ul>
            </li>
          </ul>
      </td>
    <td>&nbsp;&nbsp;&nbsp;</td>
   </tr>
 </table>

<?php

 echo "<br><br><br><br><br><br><br><br><br><br><br>";
 
 if (isset($id)){ 
  
  $atualizarCliente = new Cliente();
  
  $atualizarCliente->loadById($id);

?>
 
<form action="update.php" method="post">
<table width="301" height="170" border="0" cellspacing="0" class="tabela" align="center">
  
  <tr>
    <td></td>
    <td><font face="Arial" color="black" size="3"><b>Atualizar dados</b></font></td>
  </tr>

  <tr>
    <td width="32" height="24">Nome:</td>
    <td width="265">
      <input type="hidden" name="id" value="<?php echo $atualizarCliente->getIdcliente();?>">
      <input type="text" title="Preencha o campo Nome" required name="nome" value="<?php echo $atualizarCliente->getNome();?>" size="30">
    </td>
  </tr>
  <tr>
    <td height="24">Endereço:</td> 
    <td><input type="text" name="end" value="<?php echo $atualizarCliente->getEnd();?>" size="30"></td>
  </tr>
  
    <!----------------------------------JQUERY e JAVASCRIPT------------------------------------------------------------>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

      <script>

         //MASCARA TELEFONE
         $(document).ready(function(){
         $('#fone').mask('(99) 99999-9999');
      
         });
      
      </script>
    <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <td height="24">Telefone:</td>
    <td><!--<input type="text" name="fone" maxlength="13" OnKeyPress="formatar('## #####-####', this)" size="40">-->
        <input type="text" name="fone" id="fone" value="<?php echo $atualizarCliente->getFone();?>" size="30">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
        <button type="submit" class="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Atualizar</b>&nbsp;&nbsp;&nbsp;&nbsp;</button>
                              &nbsp;&nbsp;<a href='listar.php'>Listar clientes</a>
    </td>
  </tr>
</table>
</form>

<?php } else{ ?>

<form action="insert.php" method="post">
<table width="301" height="170" border="0" cellspacing="0" class="tabela" align="center">
  
  
  <tr>
    <td></td>
    <td><font face="Arial" color="black" size="3"><b>Adicionar cliente</b></font></td>
  </tr>

  <tr>
    <td width="32" height="24">Nome:</td>
    <td width="265"><input type="text"  required name="nome" size="30"></td>
  </tr>
  <tr>
    <td height="24">Endereço:</td> 
    <td><input type="text" name="end" size="30"></td>
  </tr>
  
<!----------------------------------JQUERY e JAVASCRIPT------------------------------------------------------------>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

     
      <!--Senha: <input type="password" value="" id="senha" maxlength="4">
             <input type="checkbox" onclick="myFunction()">Mostrar senha
      
      <br><br>

      Email: <input type="email" id="email" name="email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">-->

      <script>
          
          //Função que mostra a senha em JavaScript
          function myFunction() {
             var x = document.getElementById("senha");
             if (x.type === "password") {
                    x.type = "text";
             } 
             else {
                    x.type = "password";
             }
           }
      
      </script>

    <!--CPF:<input type="text" name="paramCpf" id="paramCpf" value="">
     &nbsp;FONE222:<input type="text" name="fone222" id="fone222" value="">-->
          
      <script>

         //MASCARA TELEFONE E CPF EM JQUERY
         $(document).ready(function(){
         $('#fone').mask('(99) 99999-9999');
        
         //$('#paramCpf').mask('***.999.999-99');// * ALPHANUMERIC, 9 ONLY NUMBERS
         });
      
      </script>
<!----------------------------------------------------------------------------------------------------------------->

  <tr>
    <td height="24">Telefone:</td>
    <td><!--<input type="text" name="fone" maxlength="13" OnKeyPress="formatar('## #####-####', this)" size="40">-->
        <input type="text" name="fone" id="fone" value="" size="30">
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td><button type="submit" class="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Adicionar</b>&nbsp;&nbsp;&nbsp;&nbsp;</button>
                              &nbsp;&nbsp;<a href='listar.php'>Listar clientes</a>
    </td>
  </tr>
</table>
</form>
<?php } ?>
</body>
</html>