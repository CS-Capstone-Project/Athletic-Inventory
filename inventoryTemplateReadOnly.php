<?php
session_start();
$_SESSION;
include_once 'connectToDataBase.php';
include_once 'imports.php';
require_once('functions.php');

$sportName = $_REQUEST['sport'];
$tableName = $_REQUEST['table'];

if ($_SESSION['id'] != "Guest"){
    //$user_data = check_login($conn);
}


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }

?>

<!--FileDot Softball Inventory Page-->
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $sportName; ?> Inventory </title>
<!--FileDot Softball Inventory Page-->
    <link rel="icon" type="image/png" href="Logo_Favicon-01.png"/>



<!--CSS File Link-->
<link rel="stylesheet" href="Website.css">

<style>

</style>
</head>

<?php

$sql = "SELECT item_name, color, price, small, medium, large, xl, xxl, quantity, date_purch FROM $tableName";
$result = mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM $tableName WHERE type='Clothing'";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT * FROM $tableName WHERE type='Shoes'";
$result3 = mysqli_query($conn, $sql3);
$sql4 = "SELECT * FROM $tableName WHERE type='Misc'";
$result4 = mysqli_query($conn, $sql4);


?>

<!--CSS File Link-->
<link rel="stylesheet" href="Website.css">

</head>

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

<div class="well well-lg">
   <h1 align="text-center" style="font-size:5vw; margin-left:275px;"><?php echo $sportName?> Inventory</h1>
</div>
<div class="container">
     <!--connect to php file here with a form-->
    <div align="left">
    <form action="indexReadOnly.php" method="POST">
    <button type="submit" class="btn buttonBack">Back <i class="fa-solid fa-square-caret-left"></i></button>
    </form>
    <form action="search.php" method="POST">
    <input type="text" placeholder="Search Inventory..." name="search">
    <input type="hidden" name="table" value="<?php echo $tableName;?>">
    <input type="hidden" name="sport" value="<?php echo $sportName;?>">
    <button type="submit"><i class="fa-solid fa-magnifying-glass">
    </i></button>
	</form>








        <!--Trigger the modal-->

        <!--table header-->
<div class="container">

	</div> 	
       
        </div>

        <br>
        <!--Inventory Table-->
        <h1 align="left">Clothing</h1>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>S</th>
                    <th>M</th>
                    <th>L</th>
                    <th>XL</th>
                    <th>XXL</th>
                    <th>Qty</th>
                    <th>Date of Purchase</th>
                </tr>

<?php
if (mysqli_num_rows($result2) > 0) {
  // output data of each row
?><tr><?php
  while($row = mysqli_fetch_assoc($result2)) {
	  ?><td><?php echo $row["item_name"];?></td>
	    <td><?php echo $row["color"];?></td>
	    <td><?php echo $row["price"];?></td>
	    <td><?php echo $row["small"];?></td>
	    <td><?php echo $row["medium"];?></td>
 	    <td><?php echo $row["large"];?></td>
	    <td><?php echo $row["xl"];?></td>
	    <td><?php echo $row["xxl"];?></td>
	    <td><?php echo $row["quantity"];?></td>
	    <td><?php echo $row["date_purch"];?></td>
</tr><?php
  }
}
?>

            </thead>

            <tbody>
                <tr>
                    <!--Items will get added here-->
                </tr>
            </tbody>
        </table>
        </div>
 </div>

<!--table header-->
<div class="container">
      
     

    <br>

    <!--Inventory Table-->
    <h1 align="left">Shoes</h1>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Color</th>
                <th>Price</th>
                <th>6</th>
                <th>6.5</th>
                <th>7</th>
                <th>7.5</th>
                <th>8</th>
                <th>8.5</th>
                <th>9</th>
                <th>9.5</th>
                <th>10</th>
                <th>10.5</th>
                <th>11</th>
                <th>11.5</th>
                <th>12</th>
                <th>Other</th>
                <th>Date of Purchase</th>
            </tr>

<?php
if (mysqli_num_rows($result3) > 0) {
  // output data of each row
?><tr><?php
  while($row = mysqli_fetch_assoc($result3)) {
	  ?><td><?php echo $row["item_name"];?></td>
	    <td><?php echo $row["color"];?></td>
	    <td><?php echo $row["price"];?></td>
	    <td><?php echo $row["sz6"];?></td>
            <td><?php echo $row["sz65"];?></td>
	    <td><?php echo $row["sz7"];?></td>
            <td><?php echo $row["sz75"];?></td>
 	    <td><?php echo $row["sz8"];?></td>
	    <td><?php echo $row["sz85"];?></td>
	    <td><?php echo $row["sz9"];?></td>
	    <td><?php echo $row["sz95"];?></td>
	    <td><?php echo $row["sz10"];?></td>
 	    <td><?php echo $row["sz105"];?></td>
	    <td><?php echo $row["sz11"];?></td>
	    <td><?php echo $row["sz115"];?></td>
            <td><?php echo $row["sz12"];?></td>
	    <td><?php echo $row["other"];?></td>
	    <td><?php echo $row["date_purch"];?></td>

</tr><?php
  }
}
?>
        </thead>
        <tbody>
            <tr>
                <!--Items will get added here-->
            </tr>
        </tbody>
    </table>
    </div>
</div>

<!--table header-->
<div class="container">

   
    
    <!--Add Miscellaneous modal-->
       <div class="modal modal-centered" id="addmisc" role="dialog">
           <div class="model-dialog">
              
           </div>
       </div>

    <br>

    <!--Inventory Table-->
    <h1 align="left">Miscellaneous</h1>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Color</th>
                <th>Price</th>
                <th>Other</th>
                <th>Qty</th>
                <th>Date of Purchase</th>
            </tr>

<?php
if (mysqli_num_rows($result4) > 0) {
  // output data of each row
?><tr><?php

  while($row = mysqli_fetch_assoc($result4)) {
	  ?><td><?php echo $row["item_name"];?></td>
	    <td><?php echo $row["color"];?></td>
	    <td><?php echo $row["price"];?></td>
	    <td><?php echo $row["other"];?></td>
	    <td><?php echo $row["quantity"];?></td>
	    <td><?php echo $row["date_purch"];?></td>
</tr><?php

  }
}
?>

        </thead>

        <tbody>
            <tr>
                <!--Items will get added here-->
            </tr>
        </tbody>
    </table>
    </div>
</div>
   
<hr>

<!--Must be at the bottom of every page-->
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
</footer>

</body>

    <br>


</html>