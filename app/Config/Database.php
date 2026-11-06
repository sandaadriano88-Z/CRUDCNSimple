<?php

class Database{

    private $hostname = $_ENV['DB_HOST'];
    private $username = $_ENV['DB_USER'];
    private $password = $_ENV['DB_PASSWORD'];
    private $dbname = $_ENV['DB_NAME'];

    public $con;

    public function dbConnect(){
        $ds = "mysql:host={$this->hostname};dbname={$this->dbname};charset=utf8mb4";
        
        try{
            $this->con = new PDO($ds, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->con;
        }catch(PDOException $e){
            die("Could not connect to the database ". $e->getMessage());
        }
    }
}





?>