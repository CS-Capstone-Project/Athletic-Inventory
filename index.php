<?php

include_once 'connectToDataBase.php';
include_once 'functions.php';



$user_data = check_login($conn);

?>

  <head lang="en">
        <meta charset="utf-8"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Choose a Sport </title>
    <link rel="icon" type="image/png" href="Logo_Favicon-01.png"/>

<!--imports google font-->
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



<html>

<head>
  <!--
    <title>Toast</title>
    <link href="toastr.css" rel="stylesheet"/>
    <script src="toastr.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
    $(document).ready(function() {
    //toastr.info('Are you the 6 fingered man?')


    Command: toastr[success]("   ", "Settings Saved!")

    toastr.options: {
    "debug": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "fadeIn": 300,
    "fadeOut": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000
    }
    });
    </script>
  -->
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
          <button type="button" class="btn buttonlogout">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
      </div>
      </td>
  </tr>
</table>
<div class="well well-lg">
    <h1 align="text-center" style="font-size:5vw;">Pick a Sport</h1>
</div>

<div class="row">
<div class="column">
  <div style=" float:center;   margin:10px">
    <h1> Men&apos;s Sports </h1>

<?php

$sql = "SELECT Sport, RelatedInventoryName FROM `0_sports` WHERE Type='Men''s'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $sportsName = $row["Sport"]; ?>
    
  <form action="inventoryTemplate2.php" method="post" id="theBUTTON">
 
     <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
      <button class="btn sportButton"><?php echo $row["Sport"]?></button>
     
  </form> <?php
  }
}
?>
</div>
</div>
<div class="column">
  <div style="float:center;  margin:10px">
    <h1> Women&apos;s Sports </h1>

 <?php

$sql = "SELECT Sport, RelatedInventoryName FROM `0_sports` WHERE Type='Women''s'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $sportsName = $row["Sport"]; ?>
   
  <form action="inventoryTemplate2.php" method="post" id="theBUTTON">
     <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
     <button class="btn sportButton"><?php echo $row["Sport"]?></button>   
  </form> <?php  
  }
}
?>
</div>
</div>
</div>
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
</footer>

</html>