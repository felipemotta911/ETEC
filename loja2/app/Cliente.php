<?php

class Cliente{
    private $id;
    private $nome;
    private $cidade;
    private $idade;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }


    public function setCidade($cidade){
        $this->cidade = $cidade;
      
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setIdade($idade){
        $this->idade = $idade;

    }

    public function getIdade(){
        return $this->idade;

    }

} 

