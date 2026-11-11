<?php
require_once __DIR__."/../Config/Database.php";


class Model{

    private $database;
    private $connect;

    public function __construct(){
        $this->database = new Database();
        $this->connect = $this->database->dbConnect();
    }

    public function register($name, $email, $password){
        $stm = "INSERT INTO cntable(name, email, password) 
                VALUES(:name, :email, :password)";

        $result = $this->connect->prepare($stm);

        return $result->execute([
            ':name' => $name, 
            ':email' => $email, 
            ':password' => $password
        ]);
    }

    public function chooseAPerson($email){
        $stm = "SELECT * FROM  cntable WHERE email = :email";

        $result = $this->connect->prepare($stm);
        $result->execute([
            ':email' => $email
        ]);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public function fetchAll(){
        $stm = "SELECT * FROM cntable";

        $result = $this->connect->prepare($stm);
        $result->execute();
         return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function fetch($id){
    //     $stm = "SELECT * FROM cntable WHERE id = :id";

    //     $result = $this->connect->prepare($stm);
    //     $result->execute([':id'=> $id]);
        
    //     return $result->fetch(PDO::FETCH_ASSOC);
    // }

    public function delete($id){
        $stm = "DELETE FROM  cntable WHERE id = :id";

        $result = $this->connect->prepare($stm);
        return $result->execute([
            ':id' => $id
        ]);

    }

    public function chooseAPersonById($id){
        $stm = "SELECT * FROM  cntable WHERE id = :id";

        $result = $this->connect->prepare($stm);
        $result->execute([
            ':id' => $id
        ]);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public function Update($id, $name, $email, $password){
        $stm = "UPDATE cntable 
                SET name = :name,  
                    email = :email, 
                    password = :password
                WHERE id = :id ";

        $result = $this->connect->prepare($stm);

        return $result->execute([':id' => $id,
                          ':name' => $name,
                          ':email' => $email, 
                          ':password' => $password]);

                          
    }

    public function logout($id){
        $stm = "UPDATE cntable 
                SET status = 'inactive'
                WHERE id = :id ";

        $result = $this->connect->prepare($stm);

        return $result->execute([':id' => $id]);
                    
    }

    public function activate($id){
        $stm = "UPDATE cntable 
                SET status = 'active'
                WHERE id = :id ";

        $result = $this->connect->prepare($stm);

        return $result->execute([':id' => $id]);
                    
    }

    
}


?>