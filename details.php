<?php


if (!isset ($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
    echo "<div class='message success'>Welcome ".$_SESSION['UserLogin']."</div><br/><br/>";
}else{
    echo header("Location: index.php");
}

include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql ="SELECT * FROM guest_list WHERE id='$id' ";
$guests = $con->query($sql) or die ($con->error);
$row = $guests->fetch_assoc();


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
        .message{
            width: 100%;
            padding: 1rem;
        }

        .message.success{
            background: #4bb838;
            border-left: 6px solid #069b1e;
            color: #e9f0e6;
        }

        .message.info{
            background: #248baa;
            border-left: 6px solid #06589b;
            color: #e9f0e6;
        }

        .wrapper{
            padding: 0 2rem 0 2rem;
        }

        .button-container{
            margin: 0;
            float: right;
            padding: 1rem 0 2rem 0;
        }


        .button-container a{
            float: left;
            border: 1px solid rgb(2, 94, 139);
            background: rgb(2, 110, 165);
            padding: 8px 10px 8px 10px;
            color: #fff;
            text-decoration: none;
            letter-spacing: 2px;
        }
        .button-container a:hover{
            background: rgb(6, 77, 112);
        }

        .button-danger{
            float: left;
            background: rgb(2, 110, 165);
            padding: 8px 10px 13px 10px;
            color: #fff;
            text-decoration: none;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            
        }

        .button-danger:hover{
            background: rgb(6, 77, 112);
        }



    </style>



   
</head>
<body>


    
  <div class="wrapper">
    <form action="delete.php" method="post">


    <div class="button-container">
        <a href="index.php"> <-Back</a>
        <a href="edit.php?ID=<?php echo $row ['id'];?>">Edit</a>



        
        <?php if ($_SESSION['Access'] == "administrator"){?>
        <button type="submit" name="delete" class="button-danger">Delete</button>
        <?php } ?>
    </div>

        
        <input type="hidden" name="ID" value="<?php echo $row ['id'];?>">
   
    </form>

    <br>


    <h2>
       <?php echo $row ['first_name']; ?> <?php echo $row['last_name'];?> 
       <?php echo $row ['email']; ?> <?php echo $row['gender'];?> 
    </h2>
    
  </div>
</body>
</html>

