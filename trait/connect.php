<?php

trait connectdb {
    public $host = 'localhost';
    public $database = 'vijesti';
    public $user = 'root';
    public $password = '';
   

    public function db() {
        try{
            $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
    }
}



?>