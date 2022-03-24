<?php 
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
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
        $conn->query("INSERT INTO pending_accounts (first_name, last_name, email, pass) values ('$firstName', '$lastName', '$email', '$hash')");
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
</head>
<body>

<?php if ($msg != "")echo $msg; ?>

<form method = "post" action = "register.php">
    <input name = "first_name" placeholder = "First Name"><br>
    <input name = "last_name" placeholder = "Last Name"><br>
    <input name = "email" type = "email" placeholder = "Email"><br>
    <input name = "password" type = "password" placeholder = "Password"><br>
    <input name = "conPassword" type = "password" placeholder = "Confirm Password"><br>
    <input type = "submit" name = "submit" value = "Request Account">
</form>








    
</body>
</html>