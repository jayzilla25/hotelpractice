<?php

if (!isset ($_SESSION)){
    session_start();
}

include_once("connections/connection.php");

$con = connection();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password =$_POST['password'];

    $sql = "SELECT * FROM hotel_users WHERE username = '$username' AND password = '$password' ";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc(); 
    $total = $user->num_rows;




    if($total > 0){
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Access'] = $row['access'];

   

    echo header("Location: index.php");
  
    }else{
        echo "<div class='message warning'>No user found.</div>";
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="css/style.css">



    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .login-container{
             margin: 0 auto;
             width: 50%;
             margin-top: 8vh;
             
             
              
        }

        .form-element{
            width: 100%;

        }

        .form-element label{
            display: block;
            font-size: 22px;
            margin-top: 1rem;
        }

        .form-element input {

            font-size: 22px;
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: black;

        }

        .login-container button{
            width: 100%;
            letter-spacing: 6px;
            border-radius: 4px;
            margin-top: 2rem;
            font-size: 32px;
            padding: 1rem;
            background-color: rgb(2, 110, 165);
            border: none;
            color: white;
            cursor: pointer;
        }

        .login-container button:hover{
            background-color: rgb(50, 216, 218)
        }

        .login-container{
            background-color: white;
            border: 1px solid grey;
            border-radius: 4px;
            height: auto;
            padding: 2rem;
            box-shadow: 5px 6px 18px #888888;
        }

        #formlogin{
            background-image: linear-gradient(to right, blue, aqua);
        }

        /* message */

        .message{
            width: 100%;
            padding: 1rem;
        }

        .message.warning{
            background: #e9e77f;
            border-left: 6px solid #ceca09;
            color: #817f05;
        }
    </style>


    
    



   
</head>
<body id="formlogin">



   <div class="login-container">
   <h1>Login Page</h1>
   <br>

   <form action="" method="post">


    <div class="form-element">
   <label>Username</label>
   <input type="text" name="username" id="username" placeholder="Enter Username" required>
   


   <label>Password</label>
   <input type="password" name="password" id="password" placeholder="Enter Password" required>
   
   </div>
   <button type="submit" name="login">Login</button>



   </form>
   </div>
</body>
</html>

