<?php

require_once 'config.php';

session_start();
if (!isset($_SESSION['id_usuario'])){
      $titulo  = "Sign Up";
}
else{
      $titulo = "Alterar Senha"; 
}

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title><?=$titulo ?></title>

        <style type="text/css">
          
           .tabela {
                    font-family: Verdana, Arial, Helvetica, sans-serif;
                    font-size: 18px;
           }
          
           body {
                    background-image: url("../images/foto.jpg");
                    background-color: #E0E0F8;
           }

           input { 
                    font-size: 16px; 
                    height: 20px;
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

        </style>
    
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

    </head>

    <body>
		<!-- Criado o formulário para o usuário cadastrar os dados de acesso ao sistema.  -->
<?php if (!isset($_SESSION['id_usuario'])){ ?>
       <form method="POST" action="insert_signup.php">
        
        <br><br><br><br><br><br><br><br><br><br><br><br>

        <table border="0" align="center">    
           
           <tr> 
              <td align="center"><img src="../DAO/images/login.jpg" style="width:38px;height:39px;"></td>
          </tr>

           <tr>
             <td><input type="email" placeholder="Email" id="email" name="email" size="32" 
              required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
             </td>
           </tr>

           <tr>
              <td><input type="password" value="" placeholder="Senha" id="senha" name="senha" maxlength="4" size="17" required>
                <input type="checkbox" onclick="myFunction()">Mostrar senha
              </td>
           </tr>
           <tr>
             <td><br><button type="submit" class="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Sign Up</b>&nbsp;&nbsp;&nbsp;&nbsp;</button>
             </td>
           </tr>
        </table>  
      </form>

<?php }
    else{ ?>

      <form method="POST" action="update_signup.php">
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br>

        <table border="0" align="center">          
           <tr><td><font face="Arial" color="black" size="3"><b>Alterar Senha</b></font></td></tr>
           <tr>
             <td><input type="email" placeholder="<?=$_SESSION['email']?>" id="email" name="email" size="32" readonly>
             </td>
           </tr>

           <tr>
              <td><input type="password" value="" placeholder="Senha" id="senha" name="senha" maxlength="4" size="17" required>
                <input type="checkbox" onclick="myFunction()">Mostrar senha
              </td>
           </tr>
           <tr>
             <td><br><button type="submit" class="button">&nbsp;&nbsp;&nbsp;&nbsp;<b>Alterar Senha</b>&nbsp;&nbsp;&nbsp;</button>
             </td>
           </tr>
        </table>  
      </form>
    
<?php }?>

    </body>
</html>
