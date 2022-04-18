<?php 
session_set_cookie_params(1);
session_start();

include_once 'imports.php';
include_once 'functions.php';
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';
?>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewButton']))
{
  $_SESSION['id'] = "Guest";
  header("Location: index.php");
}

if (isset($_POST['submit'])){
    
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    
    $result = selectEmailToLogin($conn, $email);
    $row = mysqli_fetch_assoc($result);

    if ( $result ){
    
        $_SESSION['id'] = $row['id'];
        if (password_verify($password, $row['pass'])){
            header("Location: index.php");
            die;
            
        } else {
         $msg = "You have entered invalid credentials. Please try again";
        }
        
    }         
    
}


?>

<!--FileDot Login Page-->
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8"/>
 	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Login </title>
  <link rel="icon" type="image/png" href="Logo_Favicon-01.png"/>
  <link rel="stylesheet" type="image/png" href="Website_Login_Background-01.png"/>

<style>
</style>
</head>

<!--CSS File Link-->
<link rel="stylesheet" href="Login_Page.css">


<body>

<div class="container-backgroundImage" style="background-image:url('Website_Login_Background-01.png');">
<div class="container" align="center">
  <h1 style="font-size:120px">Lets Get Sorting</h1>
</div>
<div class="container" align="center">
  <div class="loginBox">
    <h1 style="font-size:50px;"> Welcome to</h1>
      <h1 style="font-size:100px;">File Dot</h1>
  <div class="login">
      <h1>Sign In</h1>
  </div>
<?php if ($msg != "")echo $msg; ?>

<form action="login.php" method="POST">
<div>
       <input type="text" placeholder="Enter Username..." name="email" >
      </div>
      <div>
      <input type="password" placeholder="Enter Password..." name="password" >
      </div>
      <div>
        <button type="submit" name="submit" class="btn loginButton">Sign In <i class="fa-solid fa-arrow-right-from-bracket"></i></button>

<form action ="login.php" method ="POST" >    
<button type="submit" name="viewButton" class="btn loginView">View Only </button>
        <br>
	</div>
</form>
</form>
    <div class="text-center">
      <a href="register.php">Sign Up</a>
    </div>
     </div>
   </div> 

<br>

<hr>
<!--Must be at the bottom of every page-->
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
</footer>
</div>
</body>
</html>
