<?php
class Pessoa{
   private $nome;
   private $cpf;
   private $nasc;
   private $endereco;
   
   function Pessoa(){
       $this->preparaUsuario();
   }

    function preparaUsuario(){
        $this->nome = "";
        $this->nasc = "";
        $this->cpf = "";
        $this->endereco = "";
    }
    public function getNome(){
       return $this->nome;
    }
   
    public function setNome($n){
       $this->nome = $n;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    public function getNasc(){
        return $this->nasc;
    }
    
    public function setNasc($nasc){
        $this->nasc = $nasc;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}
?>


