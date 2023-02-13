<?php

include_once("connections/connection.php");

$con = connection();
$id = $_GET['ID'];


$sql ="SELECT * FROM guest_list WHERE id='$id' ";
$guests = $con->query($sql) or die ($con->error);
$row = $guests->fetch_assoc();

if(isset($_POST['submit'])){


   
  $fname =$_POST['firstname'];
  $lname =$_POST['lastname'];
  $email =$_POST['email'];
  $gender =$_POST['gender'];

  $sql = "UPDATE guest_list SET first_name='$fname', last_name='$lname', email='$email', gender = '$gender' WHERE id='$id'";
  $con->query($sql) or die ($con->error);


  echo header("Location: details.php?ID=".$id);


 

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

      .add-container{
        margin: 0 10px;
        padding-top: 2rem;
      }

      .add-container input,
      .add-container select{
        display: block;
        font-size: 22px;
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #888888;
        margin: 12px 0;

      }

      .add-container label{
        font-size: 22px;

        
      }


      .add-container input[type="submit"]{
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

      .add-container input[type="submit"]:hover{
        background-color: aqua;
      }
      

    




    </style>

   
</head>
<body>
    <div class="add-container">
     <form action="" method="post">

     <label>First Name</label>
     <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">


     <label>Last Name</label>
     <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">

     <label>Email</label>
       <input type="email" name="email" id="email" required placeholder="Enter Last Email">

     <label>Gender</label>
       <select name="gender" id="gender" required placeholder="Enter Gender">
       <option value=""></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
       </select>

       <label>Room</label>
       <select name="room" id="room" required >
        <option value=""></option>
        <option value="Deluxe">Deluxe</option>
        <option value="Vip">VIP</option>
        <option value="Royale">Royale</option>
       </select>

       <label>Person</label>
       <select name="person" id="person" required >
        <option value=""></option>
        <option value="Solo">Solo</option>
        <option value="Couple">Couple</option>
        <option value="Family">Family(3-10)</option>
        <option value="Barkada">Barkada(11-20)</option>
    
        
       </select>


     <input type="submit" name="submit" value="Update">



     </form>
     </div>
    
</body>
</html>

