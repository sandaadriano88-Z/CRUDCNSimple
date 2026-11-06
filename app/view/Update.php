<?php

require_once __DIR__."/../Models/Model.php";

$id = isset($_GET['id'])? $_GET['id']: NULL;

$model = new Model();

$row = $model->chooseAPersonById($id);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../../public/style/style.css">
    <link rel="stylesheet" href="../../public/bootstrapAll/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../public/bootstrapAll/bootstrap/css/bootstrap.min.css">

</head>
<style>
    #btn{
        background: green;
    }
    article section{
        background: green;
        color: white;
    }
</style>
<body>
    
  
    <main>
        <h2>Update Student</h2>
        <div id="em"><em>update</em></div>
        <form action="../Controller/RegistrationModel.php" method="POST">
            <div>
                <label for="">Name:</label>
                <article>
                    <section class="bi bi-person-fill"></section>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']?>">
                </article>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
            </div>
            <div>
                <label for="">Email:</label>
                <article>
                    <section class="bi bi-envelope-fill"></section>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']?>">
                </article>
            </div>
            <div>
                <label for="">Password:</label>
                <article>
                    <section class="bi bi-lock-fill"></section>
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']?>">
                </article>
            </div>
            <div>
                <label for="">Confirm PassWord:</label>
                <article>
                    <section class="bi bi-lock-fill"></section>
                    <input type="password" name="cpassword" id="cpassword" class="form-control" value="<?php echo $row['password']?>">
                </article>
            </div>
            <div>
             <button type="submit" id="btn" name="update">Update</button>   
            </div>
            <div class="em">
                <em>Just trying to work!</em>
            </div>
     </form>
    </main>
</body>
</html>