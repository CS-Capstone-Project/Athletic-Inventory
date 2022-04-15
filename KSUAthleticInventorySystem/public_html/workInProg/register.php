<?php 
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';
include_once 'imports.php';

$msg = "";

if (isset($_POST['submit'])){
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $conPassword = $conn->real_escape_string($_POST['conPassword']);

    if ($password != $conPassword)
        $msg = "Passwords do not match";
    else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        requestAccount($conn, $firstName, $lastName, $email, $hash);
        #$conn->query("INSERT INTO pending_accounts (first_name, last_name, email, pass) values ('$firstName', '$lastName', '$email', '$hash')");
        $msg = "Account waiting for approval.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<!--imports google font-->
<link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    
<!--import fontawesome-->
<script src="https://kit.fontawesome.com/a2507bf492.js" crossorigin="anonymous"></script>

<!--imports bootstrap3 and jquery-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--import css file-->
 <link rel="stylesheet" href="register.css">

</head>
<body>
<div class="container-backgroundImage" style="background-image:url('Website_Login_Background-03.png');">
<div class="well well-lg" style="background-image:url('Website_Login_Background-03.png');">
    <h1 align="text-center" style="font-size:5vw">Request an Account</h1>
</div>
<?php if ($msg != "")echo $msg; ?>
<div class="loginBox">
    <form action="login.php" method="POST">
        <button type="submit" class="btn buttonBack">Back <i class="fa-solid fa-square-caret-left"></i></button>
        <br><br>
    </form>
</div>
<div class="container">
    <br>
    <div class ="login">
        <form method = "post" action = "register.php">
            <div>
                <h2>Please fill out the form</h2>
            </div>
            <br>
            <div>
                <input name = "first_name" placeholder = "First Name" type = "text">
            </div>
            <div>
                <input name = "last_name" placeholder = "Last Name" type = "text">
            </div>
            <div>
                <input name = "email" placeholder = "Email" type = "email">
            </div>
            <div>
                <input name = "password" placeholder = "Password" type = "password">
            </div>
            <div>
                <input name = "conPassword" placeholder = "Confirm Password" type = "password">
            </div>
            <br>
            <div>
                <button name = "submit" class =" btn submitButton" type = "submit"> Request Account </button>
            </div>
        </form>
    </div>  
</div>

<hr>
<!--Must be at the bottom of every page-->
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
</footer>

</body>
</html>