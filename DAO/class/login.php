<?php

//CLASS THAT GETS THE USER'S DATA(LOG IN) AND INSERTS A NEW USER(SIGN UP)
class Login{
    
    private $idusuario;
    private $email;
    private $senha;

    public function getIdusuario(){
    	return $this->idusuario;
    }

    public function setIdusuario($value){
    	$this->idusuario = $value;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function setEmail($value){
    	$this->email = $value;
    }


    public function getSenha(){
    	return $this->senha;
    }

    public function setSenha($value){
    	$this->senha = $value;
    }

    
    public function loadByLogin($email, $senha){

      $sql = new Sql();
      $results = $sql->select("select * from usuarios where email = :EMAIL and senha = :SENHA", array(
         ":EMAIL"=>$email,
         ":SENHA"=>$senha   
      ));
      
      if (count($results) > 0){
        
           $row = $results[0];

           $this->setIdusuario($row['id_usuario']);
           $this->setEmail($row['email']);
           $this->setSenha($row['senha']);
      
      } 
    }

    
    public function insert($email, $senha){
    
      ////////////////////////IF THE USER HAS ALREADY INSERTED THEN RETURN AN ERROR/////////////////////////////////////
      $sql = new Sql();
      
      $results = $sql->select("select * from usuarios where email = :EMAIL", array(
         ":EMAIL"=>$email   
      ));
      
      if (count($results) == 0){

      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $this->setEmail($email);
        $this->setSenha($senha);

        //////$sql = new Sql();

         $results = $sql->query("insert into usuarios (email, senha) values(:EMAIL, :SENHA)",array(
            ":EMAIL"=>$this->getEmail(),
            ":SENHA"=>$this->getSenha()
        ));
    
      }
    
      else {

           echo "<script>
                   alert('Usuário já existe!')
                   window.location.href = 'Login.php';
                </script>";
           //throw new Exception(" USUÁRIO JÁ EXISTE!!! ");
         
      }    
    
    
    }

  
    public function updateSenha($id, $senha){
    
        $sql = new Sql();
  

        $this->setIdusuario($id);
        $this->setSenha($senha);


        $results = $sql->query("update usuarios set senha = :SENHA where id_usuario = :ID",array(
            ":ID"=>$this->getIdusuario(),
            ":SENHA"=>$this->getSenha()
        ));
    
    }
    

}//end class

?>