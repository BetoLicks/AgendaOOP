<?php
include_once ('banco.php');

class agenda{
   private $age_codigo;
   private $age_nome;
   private $age_telefone;
   private $age_email;
   protected $conbanco;

   public function __construct($age_codigo,$age_nome,$age_telefone,$age_email){
      $this->age_codigo   = $age_codigo;
      $this->age_nome     = $age_nome;
      $this->age_telefone = $age_telefone;
      $this->age_email    = $age_email;

      //-> CONEXÃO COM O BANCO DE DADOS...
      $servidor = 'localhost';
      $usuario  = 'root';
      $senha    = '';
      $banco    = 'agendaoop';

      try {      
         $this->conbanco = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);    
      } catch(PDOException $erro) {
         echo 'ERRO NA CONEXÃO COM O BANCO DE DADOS: ' . $erro->getMessage();
      }      
   }

   //-> GET / SETTERS...
   public function getage_codigo($age_codigo){
      $this->age_codigo = $age_codigo;
   }
   public function setage_codigo(){
      return $this->age_codigo;
   }
   public function getage_nome($age_nome){
      $this->age_nome = $age_nome;
   }
   public function setage_nome(){
      return $this->age_nome;
   }
   public function getage_telefone($age_telefone){
      $this->age_telefone = $age_telefone;
   }
   public function setage_telefone(){
      return $this->age_telefone;
   }
   public function getage_email($age_email){
      $this->age_email = $age_email;      
   }
   public function setage_email(){
      return $this->age_email;
   }

   public function inserirAgenda(){
      try {      
         $pdo = $this->conbanco->prepare('INSERT INTO tab_agenda (age_nome,age_telefone,age_email) VALUES (?,?,?)');
         $pdo->execute($this->age_nome,$this->age_telefone,$this->age_email);

      } catch(Exception $erro) {
         echo 'ERRO NA INSERÇÃO DOS DADOS: ' . $erro->getMessage();
      }    
   }
}
?>