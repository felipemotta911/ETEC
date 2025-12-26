<?php
class Conexao{
    private static $instance;

    public static function getConexao(){
        if(!isset(self::$instance)){
            self::$instance = new PDO('mysql:host=localhost;dbname=loja2','root','');
        }
        return self::$instance;
    }
}