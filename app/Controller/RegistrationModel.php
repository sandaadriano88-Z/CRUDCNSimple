<?php
session_start();
require_once __DIR__."/navigation.php";
require_once __DIR__."/../Models/Model.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){

    

    if(isset($_POST['register'])){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if(empty($name) && empty($email) && empty($password) && empty($cpassword)){
            echo "All fields must be field";
        }else{
            if($password !== $cpassword){
                echo "Some thing is wrong with the password";
                return;
            }else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $cpassword = password_hash($cpassword, PASSWORD_DEFAULT);
            }
                
            $model = new Model();
            $user = $model->register($name, $email, $password);
            $userEnter = $model->chooseAPerson($email);
           

            if($userEnter){

                $_SESSION['name'] = $userEnter['name'];
                $_SESSION['id'] = $userEnter['id'];
                $_SESSION['status'] = $userEnter['status'];
                $_SESSION['email'] = $userEnter['email'];
                
                // echo $_SESSION['name'];
                // echo $_SESSION['id'];
                // echo $_SESSION['status'];
                // echo $_SESSION['email'];


                sleep(2);
                header("location: ../view/listItems.php");
            }else{
                echo "Something went wrong!";
            }
            
        }
    }

    if(isset($_POST['update'])){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $id = $_POST['id'];

        if(empty($name) && empty($email) && empty($password) && empty($cpassword)){
            echo "All fields must be field";
        }else{
            if($password !== $cpassword){
                echo "Some thing is wrong with the password";
                return;
            }else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $cpassword = password_hash($cpassword, PASSWORD_DEFAULT);
            }
                
            $model = new Model();
            
            $user = $model->Update($id, $name, $email, $password);
            $userEnter = $model->chooseAPerson($email);
            

            if($userEnter){

                $_SESSION['name'] = $userEnter['name'];
                $_SESSION['id'] = $userEnter['id'];
                $_SESSION['status'] = $userEnter['status'];
                $_SESSION['email'] = $userEnter['email'];
                
                


                sleep(2);
                header("location: ../view/listItems.php");
            }else{
                echo "Something went wrong!";
            }
            
        }
    }

    if(isset($_POST['logout'])){
        $model = new Model();

        $id = $_POST['id'];
        // echo $id;
        // ../view/

        $logout = $model->logout($id);
        header("location: ../view/listItems.php");
    }

    
}



?>