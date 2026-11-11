<?php


require_once __DIR__."/../Controller/RegistrationModel.php";
require_once __DIR__."/../Controller/fetchAll.php";




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="../../public/bootstrapAll/bootstrap-icons/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="../../public/bootstrapAll/bootstrap/css/bootstrap.min.css"> -->
     <style>
        *{
            box-sizing: border-box;
        }
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 1vh;
            animation: movetocenter 5s   infinite alternate;   
        }
        @keyframes  movetocenter{
    0%{
        background: orange;
    }
    
    50%{
        background: BLUE;
    }
    
    100%{ 
        background: black;
    } 
}
        main{
            display: flex;
            flex-direction: column;
            gap: 3vh;
            margin-top: 18vh;
            /* width: 60%; */
            background-color: white;
            padding: 2vh;
            border-radius: 10px;
            align-self: center;
            
        }
        td{
            height: auto;
            padding: 0.8vh;
        }
        td i{
            background-color: rgba(128, 128, 128, 0.4);
            padding: 0.5vh 0.7vh;
            border-radius: 50%;
            font-size: 4vh;
            
        }
        #linkadd{
            text-decoration: none;
            color: white;
            background-color: green;
            padding: 2vh 3vh;
            border-radius: 7px;
            margin-right: 3vh;
            display: flex;
            flex-wrap: wrap;
            justify-self: end;
        }
         #linkadd span{
            font-size: 3vh;
         }
         h2{
            text-align: center;
         }

         
         table{
            min-width: 500px;
            border-collapse: collapse;
            white-space: nowrap;
         }
         nav{
            position: absolute;
            top: 0;
            left: 0;
            padding: 2vh 4vh;
            width: 100%;
            /* background: yellow; */
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            height: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
         }

         .brand{
            display: flex;
            align-items: center;
            gap: 2vh;
         }
         .brand span{
            padding: 1vh 3vh;
            border-radius: 50%;
            font-size: 7vh;
            background-color: WHITE;
         }
         .brand div{
            font-size: 5vh;
            color: white;
            display: flex; 
            gap : 1vh;
         }

        #nav{
            display: flex;
            align-items: center;
            gap: 3vh;
         }

         #nav ul{
            display: flex;
            gap: 5vh;
         }
         #nav ul a{
            text-decoration: none;
            color: white;
            
            height: 5vh;
            width: 14vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            transition: all 0.4s;
            border: 1px solid GRAY;
         }
          #nav ul a:hover{
            color: white;
            background-color: blue;
          }

         #nav ul a li{
            list-style: none;
         }

         #nav button{
            height: 5vh;
            width: 15vh;
            border: NONE;
            border-radius: 5px;
            background-color: black;
            border: 1px solid white;
            color: white;
            font-size: 2.5vh;
            cursor: pointer;
         }
         table{
            width: 100%;
         }
         .update.hide{
            position: relative;
         }

         .active{
            background: green;
         }
         .inactive{
            background: rgba(128, 128, 128, 0.6);
         }
         .disactivate{
            cursor: not-allowed;
            pointer-events: none;
         }

         @media screen and (max-width: 740px) {
            
            #me span:nth-child(2){
                display: none;
            }
            nav{
                width: 100%;
               
            }
            #nav ul{
                display: none;
            }

            main{
                overflow: hidden;
                overflow-x: scroll;
                scrollbar-width: none;
                width: 100%;
                
            }
            .brand{
                gap: 0.4vh;
            }
            .brand span{
                padding: 1vh 3vh;
            }

            .brand div article{
                display: none;
            }
            
         }

     </style>
</head>

<body>
    <nav>
        <div class="brand"><span class="bi bi-perso"><?php echo strtoupper(substr($_SESSION['name'], 0,1));?></span> <div><article style ="color: green">Hello! welcome</article><?php echo strtoupper($_SESSION['name']);?></div></div>
        <div id="nav">
            <ul class="link">
                <a href="#"><li>Home</li></a>
                <a href="#"><li>About</li></a>
                <a href="#"><li>Contact</li></a>
            </ul>
            
            <form action="../Controller/RegistrationModel.php" method="POST">
                
                <input type="hidden" name="id" id="b" value="<?php echo $_SESSION['id'];?>">
                <button type="submit" name="logout"> <i class="bi bi-box-arrow-right"></i> Logout</button>   
            </form>
        </div>
    </nav>
    <main>
        <div>
            <h2>List of All</h2>
        </div>
        <div>
            <a href="?move=register" id="linkadd"><i class="bi bi-plus"></i>Add Student</a>
        </div>
        <div>
            <table border="3">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>Status</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <?php foreach ($fetchAll as $fetch):  ?>
                <tbody>
                    <tr>
                        <td class="td"><i class="bi bi-person-fill"></i></td>
                        <td><?php echo $fetch['name']?></td>
                        <td><?php echo $fetch['email']?></td>
                        <td><span class="<?php echo $fetch['status'] == 'active' ? 'active': 'inactive'?>" style=" border-radius: 20px; padding: 0.8vh; text-align: center; color: white; display: flex; align-items: center; justify-content: center;"><?php echo $fetch['status']?></span></td>
                        <td style="display: flex; flex-wrap: wrap; gap: 1vh; justify-content: center;">
                            <a href="?move=Update&id=<?php echo $fetch['id']?>" id="me" class="<?php echo $fetch['status'] == 'active' ? 'delete': 'disactivate'?>" style="text-decoration: none; padding: 1vh 2vh; background-color: ORANGE; border-radius: 5px; color: white; display: flex; gap: 1vh;"><span class="bi bi-pen"></span> <span>Update</span></a>
                            <a href="?move=delete&id=<?php echo $fetch['id']?>" id="me" class="<?php echo $fetch['status'] == 'active' ? 'update': 'disactivate'?>" style="text-decoration: none; padding: 1vh 2vh; background-color: red; border-radius: 5px; color: white; display: flex; gap: 1vh;"><span class="bi bi-trash"></span><span>Delete</span></a>
                            <a href="?move=activate&id=<?php echo $fetch['id']?>" id="me" class="activate" style="text-decoration: none; padding: 1vh 2vh; background-color: BLUE; border-radius: 5px; color: white; display: flex; gap: 1vh;"><span class="bi bi-power"></span><span>Activate</span></a>
                        </td>
                    </tr>
                   <?php endforeach;?> 
                    
                </tbody>
            </table>
        </div>
    </main>

    
</body>
</html>