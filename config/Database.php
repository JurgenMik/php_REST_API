<?php
 class Database{
     // DB param , {prop}

     private $host = 'localhost';
     private $db_name = 'mikkjurgeniktkhk_Impandmed';
     private $username = 'mikkjurgeniktkhk_jurgen';
     private $password ='Lollakas123';
     private $conn;


 // DB connect

 public function connect(){

     $this->conn = null;

     // PDO object
     // Setting attributes

     try{

         $this->conn = new PDO('mysql:host=' .$this->host . ';dbname='. $this->db_name, $this->username, $this->password );
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     } catch(PDOException $e){

         echo 'Connection Error: ' . $e->getMessage();

     }

     return $this->conn;


  }
}