<?php

require_once 'config.php';

session_start();

//echo "inicio==" . $_SESSION['id_usuario']; 

if (!isset($_SESSION['id_usuario'])){ 
      
      //DADOS DA CLASSE LOGIN
      $loginUsuario = new Login();

      $loginUsuario->loadByLogin($_POST['email'],$_POST['senha']);

      $id_usuario = $loginUsuario->getIdusuario();
      $email      = $loginUsuario->getEmail();
      $senha      = $loginUsuario->getSenha();

      //$_SESSION['email'] = $email;
      //$_SESSION['senha'] = $senha;
      
      if (!isset($id_usuario)){ 
    
            echo "<script>
                    alert ('Dados incorretos ou usuário não existe!');
                    window.location.href = 'login.php';
                  </script>";
    
      }
      else{ 
      	    
      	    $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['email']      = $email;
            $_SESSION['senha']      = $senha;
      	    //echo "index" . $_SESSION['senha'];
      	    header('Location:listar.php');

      }
}  
else{
 
     ///echo "index===" . $_SESSION['id_usuario'];
     header('Location:listar.php');

} 

?>