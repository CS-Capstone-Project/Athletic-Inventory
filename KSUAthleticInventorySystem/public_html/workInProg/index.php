<?php
session_start();
$_SESSION;
include_once 'functions.php';
include_once 'imports.php';
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';

$_SESSION['permLevel'];

if ($_SESSION['id'] == "Guest"){
$_SESSION['permLevel'] = "Guest";
}
else{
$user_data = check_login($conn);
$_SESSION['permLevel'] = checkPermission($conn);
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }
    
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sportPicked']))
    {
        $_SESSION['sportName'] = $_POST['sport'];
        $_SESSION['sportTable'] = $_POST['table'];
        header("Location: inventoryTemplate2.php");
    }
    
?>

  <head lang="en">
        <meta charset="utf-8"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Choose a Sport </title>
    <link rel="icon" type="image/png" href="Logo_Favicon-01.png"/>





<html>

<head>
</head>
<link rel="stylesheet" href="Website.css">




<table class="tablelogo">
  <tr>
      <td>
          <div>
          <!--Logo must be on everypage-->
          <img src="Logo-01.png" class="align-right small" alt="FileDot Logo">
      </div>    
      <div>
          <!--logout button-->
          <?php if ( $_SESSION['permLevel'] == "Admin") { ?> 

<form action="adminPage.php">
<input type="submit" value="Manage Accounts" class="btn buttonlogout">
</form>

<?php } ?>
          <form method = 'post' action = 'index.php'>
	<!-- correct logout button working-->
          <button type="submit" class="btn buttonlogout" name="logout">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
          </form>
      </div>
      </td>
  </tr>
</table>
<div class="well well-lg">   
    <h1 align="text-center" style="font-size:5vw; margin-left:275px;">Pick a Sport</h1>
</div>
<div class="container">
<div class="row">
<div class="column">
  <div style=" float:center">
    <h1> Men&apos;s Sports </h1>

<?php


$result = selectMensSports($conn);
$spacing = 0;
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $sportsName = $row["Sport"]; ?>
    <div class="column">
  <form action="index.php" method="post" id="theBUTTON">
      <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
      <button name = "sportPicked" type = "submit" class="btn sportButtonMen"><?php echo $row["Sport"]?></button>     
  </form>
</div> 
  <?php
  
  
  }
}
?>
</div>
</div>
<div class="column">
  <div style="float:center">
    <h1> Women&apos;s Sports </h1>

 <?php

$result = selectWomensSports($conn);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $sportsName = $row["Sport"]; ?>
  <div class="column">
  <form action="index.php" method="post" id="theBUTTON">
      <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
      <button name = "sportPicked" type = "submit" class="btn sportButtonWomen"><?php echo $row["Sport"]?></button>     
  </form>
</div>
 <?php  

  }
}
?>
</div>
</div>
</div>
</div>
<hr>
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
</footer>

</html>