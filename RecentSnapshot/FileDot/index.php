<?php
start_session();

include_once 'imports.php';

include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';
include_once '/home/capstone/DatabaseInformation/functions.php';


check_login($conn);




if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
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
          <form method = 'post' action = 'index.php'>
          <input type="submit" class="btn buttonlogout" name="logout" value="Log Out"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
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
  <form action="inventoryTemplate2.php" method="post" id="theBUTTON">
 
     <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
      <button class="btn sportButtonMen"><?php echo $row["Sport"]?></button>     
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


$result = $result = selectMensSports($conn);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $sportsName = $row["Sport"]; ?>
  <div class="column">
  <form action="inventoryTemplate2.php" method="post" id="theBUTTON">
     <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
     <button class="btn sportButtonWomen"><?php echo $row["Sport"]?></button>   
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