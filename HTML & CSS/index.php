<?php
session_start();
$_SESSION;
include_once 'connectToDataBase.php';
include_once 'functions.php';
?>

<html>

<div style=" float:left;   margin:10px">
<h2> Men&apos;s Sports </h2>

<?php

$sql = "SELECT Sport, RelatedInventoryName FROM `0_sports` WHERE Type='Men''s'";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $testtest="testit";
    $sportsName = $row["Sport"]; ?>
    
  <form action="softball.php" method="post" id="theBUTTON">
    
    <input type="hidden" name="<?php echo $sportsName?>" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
      <input type="submit" value="<?php echo $row["Sport"]?>">
    
  </form> <?php
  }
}
?>
</div>

<div style="float:left;  margin:10px">
<h2> Women&apos;s Sports </h2>

<?php

$sql = "SELECT Sport, RelatedInventoryName FROM `0_sports` WHERE Type='Women''s'";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $sportsName = $row["Sport"]; ?>
   
  <form action="softball.php" method="post" id="theBUTTON">
    
     <input type="hidden" name="table" value="<?php echo $row["RelatedInventoryName"]?>">
      <input type="hidden" name="sport" value="<?php echo $row["Sport"]?>">
      <input type="submit" value="<?php echo $row["Sport"]?>">
      
  </form> <?php  
  }
}
?>
</div>



</html>