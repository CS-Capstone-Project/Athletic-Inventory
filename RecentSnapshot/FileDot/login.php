<?php 
session_set_cookie_params(0);
session_start();

include_once 'imports.php';
include_once 'functions.php';
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';

?>
<link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>

<!--imports bootstrap3 and jquery-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--imports toastr-->
<link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<!--import fontawesome-->
<script src="https://kit.fontawesome.com/a2507bf492.js" crossorigin="anonymous"></script>

<?php


if (isset($_POST['submit'])){
    
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    

    $sql = "SELECT id, pass FROM active_accounts where email='$email' limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ( $result ){

        $_SESSION['id'] = $row['id'];
       
        
        if (password_verify($password, $row['pass'])){
            header("Location: index.php");
            die;
            
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
<!--imports google font-->
<style>
</style>
</head>

<!--CSS File Link-->
<link rel="stylesheet" href="Login_Page.css">


<body>

<table class="tablelogo">
  <tr>
      <td>
        <div>
          <!--Logo must be on everypage-->
          <img src="Logo-01.png" class="align-right small" alt="FileDot Logo">
        </div>    
      </td>
  </tr>
</table>


<div class="loginHeader" class=>
  <br><br>
  <h1 style="font-size:7vw; margin-left:250px;">Lets Get Sorting</h1>
  <br>
</div>
<div class="container">
  <div class="loginBox">
    <h1 style="font-size:60px;"> Welcome to FileDot</h1>
  <div class="login">
      <h1> First, lets login</h1>
  </div>
  
    <div class="container">
      <div>
<?php if ($msg != "")echo $msg; ?>

<form action="login.php" method="POST">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username..." name="email" required>
      </div>
      <div>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password..." name="password" required>
      </div>
      <div>

        <button type="submit" name="submit" class="btn loginButton">Login <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
  </form>
 <form action ="index.php" method ="POST" >    
<button type="submit" name="submit" class="btn loginView">View Only</button>
 </form>
        <br>
      </div>
    </div>
 
  </div>
</div>



<hr>
<!--Must be at the bottom of every page-->
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
</footer>

</body>
</html>
