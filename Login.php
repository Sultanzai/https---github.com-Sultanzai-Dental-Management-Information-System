<?php
    session_start(); 
    $servername = "localhost";
    $userName= "root";
    $password = "";
    $database = "dms";
    // Create Connection
    $con = new mysqli($servername, $userName, $password, $database);
    
    
    $Name ="";
    $pas = "";
    $userID = "";
    $type = "";
    
    $error = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $Name = $_POST["username"];
      $pas = $_POST["password"];
    }
  
    #USER DATA 
    $sql ="SELECT * FROM `tbl_user` WHERE name ='$Name';";
    $run = mysqli_query($con,$sql);
    
    $stmt = $con->prepare("SELECT Password FROM tbl_user WHERE Name = ?");
    $stmt->bind_param('s', $Name);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    
    if (password_verify($pas, $hashedPassword)) {

      if(!$run){
        $error = "Fail to login";
        echo "<script>
        alert('Login Faild');
        </script>";
        
        die("Invalid Query: " . $con->error);
      }
      else{
        
        if (mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_assoc($run);
          
          $Name = $row["Name"];
          $pas = $row["Password"];
          $userID = $row["UserId"];
          $type = $row["Type"];
          if($type =="Admin" OR $type =="User"){
            
            #SESSION TO GFT USER RECORD
            $_SESSION["Username"] = $Name;
            $_SESSION["type"] = $type; 
            $_SESSION["userid"] = $userID;
            
            header("location: /DMS/dist/index.php");
            exit;  
          }
          
        }
        
      }

    } 
      
      
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DMS</title>

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./Logincss.css">
</head>
<body>
  <div class="content">
    <form method="post" action="#" class="form-content">
      <span class="logo"><img src="imgs/logo.PNG"> </span>
        <div class="form-item">
            <input type="text" class="text" name="username" required="">
            <label class="move" for="username">User Name</label>
        </div>
        <div class="form-item">
            <input type="password" class="text" name="password" required="">
            <label class="move" for="password">password</label>
        </div>
        <div class="button">
            <button><span style="z-index: 99;">Login</span></button>
            <div class="button-ball"></div>
        </div>
    </form>
</div>


<script src="./script.js"> </script>
</body>
</html>