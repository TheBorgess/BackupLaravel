
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Log In</title>

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

    </head>

    <body>

		<!-- FORM THAT FILLOUTS DATA'S ACESS OF THE USER  -->
        <form method="POST" action="validar_login.php">
        
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
             <td><input type="password" value="" placeholder="Senha" id="senha" name="senha" maxlength="4" size="17">
                <input type="checkbox" onclick="myFunction()">Mostrar senha
             </td>
          </tr>
  
      <script>
          
          //FUNCTION THAT SHOWS THE PASSWORD IN JAVASCRIPT
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
      <tr>
        <td><br><button type="submit" class="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Log In</b>&nbsp;&nbsp;&nbsp;&nbsp;</button>
                      &nbsp;&nbsp;&nbsp;Not a member?&nbsp;&nbsp;<a href='signup.php'><font color="blue"><b>Sign Up</b></font></a>
        </td>
      </tr>

      <tr>
        <td>
            <br><a href='http://127.0.0.1:8000/app'><font color="blue"><b>Forgot Password?</b></font></a>
        </td>
      </tr>

     </table>  
    </body>
</html>
