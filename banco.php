<?php

class DB{
   public static function conectaBanco(){
      $servidor = 'localhost';
      $usuario  = 'root';
      $senha    = '';
      $banco    = 'agendaoop';

      try {      
         return new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));    
      } catch(PDOException $erro) {
         echo 'ERRO NA CONEXÃO COM O BANCO DE DADOS: ' . $erro->getMessage();
      }      
   }
}