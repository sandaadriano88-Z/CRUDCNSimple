<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../../public/style/style.css">
    <link rel="stylesheet" href="../../public/bootstrapAll/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../public/bootstrapAll/bootstrap/css/bootstrap.min.css">
</head>
<style>
    body{
        height: 100vh;
        animation: movetocenter 5s   infinite alternate;   
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #message{
        position: absolute;
        top: -5vh;
        height: 10vh;
        width: 40vh;
        display: flex;
        align-items: center;
        justify-content: center;
        
        color: white;
        
        border-radius: 10px;
        opacity: 0;
        transition: all 0.5s linear;
    }

    #message.show{
        top: 1vh;
        opacity: 1;
        text-align: center;
    }

    
</style>
<body>
    <div id="message">
        Something went wrong!
    </div>
  
    <main>
        <h2>Student Registration form</h2>
        <div id="em"><em>Enter your info</em></div>
        <!-- <form action="../Controller/RegistrationModel.php" method="POST"> -->
         <form action="app/Controller/RegistrationModel.php" method="POST">
            <div>
                <label for="">Name:</label>
                <article>
                    <section class="bi bi-person-fill"></section>
                    <input type="text" name="name" id="name" class="form-control">
                </article>
            </div>
            <div>
                <label for="">Email:</label>
                <article>
                    <section class="bi bi-envelope-fill"></section>
                    <input type="text" name="email" id="email" class="form-control">
                </article>
            </div>
            <div>
                <label for="">Password:</label>
                <article>
                    <section class="bi bi-lock-fill"></section>
                    <input type="password" name="password" id="password" class="form-control">
                </article>
            </div>
            <div>
                <label for="">Confirm PassWord:</label>
                <article>
                    <section class="bi bi-lock-fill"></section>
                    <input type="password" name="cpassword" id="cpassword" class="form-control">
                </article>
            </div>
            <div>
             <button type="submit" name="register" id="btn">Submit</button>   
            </div>
            <div class="em">
                <em>Just trying to work!</em>
            </div>
     </form>
    </main>
    <script>
        const btn = document.querySelector('#btn');
        const message = document.querySelector('#message');

        const name = document.querySelector("#name");
        const email = document.querySelector("#email");
        const password = document.querySelector("#password");
        const cpassword = document.querySelector("#cpassword");
        

            
        btn.addEventListener('click', function(e){
            // e.preventDefault();
           
            message.classList.toggle("show");

            if(name.value != "" && email.value != "" && password.value != "" && cpassword.value != "" && password.value == cpassword.value){
                
                message.innerHTML = "Registration successfull!";
                message.style.background = "rgba(0, 255, 0, 0.5)";
                message.style.border = "green";
            }else{
                message.style.backgroundColor  = "rgba(255, 0, 0, 0.5)";
                message.style.border = "red"; 
                message.innerHTML = "Some fields are not field or Password does not Match!"; 
             }
                
            
            
            
            

            setTimeout(() => {
                message.classList.remove("show");
            }, 2000);
            
        });
            

    </script>
</body>
</html>