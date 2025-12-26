<?php

include_once "Conexao.php";
include_once "Cliente.php";

class DAO{
    public function salvar(Cliente $cliente){
        try{
            $sql = "INSERT INTO cliente VALUES(0, :nome, :cidade, :idade)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome",$cliente->getNome());
            $stmt->bindValue(":cidade",$cliente->getCidade());
            $stmt->bindValue(":idade",$cliente->getIdade());
            return $stmt->execute();

        }catch(Exception $e){
            echo "Erro".$e;
            return false;
        }
    }

    public function listar(){
        try{
            $sql = "SELECT * FROM cliente";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            return $lista;
        }catch(Exception $e){
            echo "Erro".$e;
            return null;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM cliente WHERE id=:id";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindvalue("id",$id);
            return $stmt->execute();
        }catch(Exception $e){
            return null;
        }
    }

    public function buscarId(){
        try{
            $sql = "SELECT * FROM cliente WHERE id=:id";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $list = $stmt->fetch(PDO::FETCH_ASSOC);
            return $list;
        }catch(Exception $e){
            return null;
        }
    }

    public function atualiza(){

    }
}