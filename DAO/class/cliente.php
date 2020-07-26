<?php

class Cliente{
    
    private $idcliente;
    private $nome;
    private $end;
    private $fone;

    public function getIdcliente(){
    	return $this->idcliente;
    }

    public function setIdcliente($value){
    	$this->idcliente = $value;
    }

    public function getNome(){
    	return $this->nome;
    }

    public function setNome($value){
    	$this->nome = $value;
    }


    public function getEnd(){
    	return $this->end;
    }

    public function setEnd($value){
    	$this->end = $value;
    }

    public function getFone(){
    	return $this->fone;
    }

    public function setFone($value){
    	$this->fone = $value;
    }

    public function loadById($id){

      $sql = new Sql();
      $results = $sql->select("select * from clientes where id = :ID", array(
         ":ID"=>$id    
      ));
      
      if (count($results) > 0){
        
           $row = $results[0];

           $this->setIdcliente($row['id']);
           $this->setNome($row['nome']);
           $this->setEnd($row['end']);
           $this->setFone($row['fone']);
      
      } 
      else {

         throw new Exception("Cliente não existe!!!");
         
      }

    }

    public static function getList(){

      $sql = new Sql();

      return $sql->select("select * from clientes order by id desc");//RETORNA TODOS OS CLIENTES

    }


    //MADE BY MARCIO BORGES
    public static function getClienteById($id){

      $sql = new Sql();

      return $sql->select("select * from clientes where id = :ID", array(
         ":ID"=>$id
      ));

    }

    
    public function insert($nome, $end, $fone){
      
      $sql = new Sql();

      $results = $sql->query("insert into clientes (nome, end, fone) values(:NOME, :END , :FONE)",array(
          ":NOME"=>$nome,
          ":END"=>$end,
          ":FONE"=>$fone
      ));
        
    }

    
    public function update( $nome, $end, $fone){
    
      $this->setNome($nome);
      $this->setEnd($end);
      $this->setFone($fone);

      $sql = new Sql();

      $results = $sql->query("update clientes set nome = :NOME,  end = :END, fone = :FONE where id = :ID",array(
          ":NOME"=>$this->getNome(),
          ":END"=>$this->getEnd(),
          ":FONE"=>$this->getFone(),
          ":ID"=>$this->getIdCliente()
      ));
        
    }


    public function delete(){

      $sql = new Sql();

      $results = $sql->query("delete from clientes where id = :ID",array(
          ":ID"=>$this->getIdcliente()
      ));
        
    }


    public function __toString(){

       return json_encode(array(
                                "id"=>$this->getIdcliente(),
                                "nome"=>$this->getNome(),
                                "endereco"=>$this->getEnd(),
                                "Telefone"=>$this->getFone(),
       ));
    
    }

 
}//end class 


?>