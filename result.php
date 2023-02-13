<?php


if (!isset ($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "<div class='message success'>Welcome ".$_SESSION['UserLogin'].'</div>';
}else{
    echo "<div class='message info'>Welcome Guest</div>";
}

include_once("connections/connection.php");

$con = connection();
$search = $_GET['search'];
$sql ="SELECT * FROM guest_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' ORDER BY id DESC";
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
        /* ----------------------------------------- */

        .search-container{
            width: 20%;
            padding-bottom: 1rem;
            

        }

        .search-input{
            padding: 10px;
            font-size: 17px;
            border: 1px solid #ddd;
            float: left;
            width: 70%;
            background: #ffffff;
            
            
        }

        .search-button{
            float: left;
            width: 30%;
            padding: 10px;
            background: rgb(2, 110, 165);
            color: white;
            font-size: 17px;
            border: 1px solid #ddd;
            border-left: none;
            cursor: pointer;
            letter-spacing: 2px;
           

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

        .button-small{
            border: none;
            background: rgb(2, 110, 165);
            color: white;
            text-decoration: none;
            padding: 3px 5px 3px 5px;
            font-size: 12px;
        }

        .button-small:hover{
            background: rgb(2, 55, 82);
        }
        





    </style>




   
</head>
<body>
    <div class="wrapper">
    <h1>Hotel Sytem</h1>
    <br>
    <br>


    <div class="search-container">
    <form action="result.php" method="get">
        <input type="text" name="search" id="search" class="search-input">
        <button type="submit" class="search-button">search</button>
    </form>
    </div>



    <div class="button-container">
    <?php if (isset($_SESSION['UserLogin'])){?>
    <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php } ?>


    <a href="add.php">Add New</a>
    </div>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>First Nme</th>
            <th>Last Name</th>
        </tr>
        </thead>
        <tbody>
            <?php do{ ?>
            <tr>
                <td width="30"><a href="details.php?ID=<?php echo $row ['id']; ?> " class="button-small">view</a></td>
                <td>
                    <?php echo $row['first_name']; ?>
                </td>
                <td>
                    <?php echo $row['last_name']; ?>
                </td>
            </tr>
            <?php }while($row = $guests->fetch_assoc()) ?>
        </tbody>
     
    </table>
    </div>
    

    <!-- ----------------------------------------------- -->
    <!-- ----------------------------------------------- -->





</body>
</html>

