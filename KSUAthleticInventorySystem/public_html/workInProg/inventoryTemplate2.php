
<?php
session_start();
$_SESSION;
include_once 'functions.php';
include_once 'imports.php';
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';

#$_SESSION['sportName'] = $_REQUEST['sport'];
#$_SESSION['sportTable'] = $_REQUEST['table'];
$tableName = $_SESSION['sportTable'];


if ($_SESSION['id'] != "Guest"){
    $user_data = check_login($conn);
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addClothing'])) 
    {
        addClothingItem($conn, $tableName, $_POST["item_id"], $_POST["item_name"], $_POST["color"], $_POST["price"], $_POST["small"],
         $_POST["medium"], $_POST["large"], $_POST["xl"], $_POST["xxl"], $_POST["quantity"], $_POST["date"]); 
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addShoe'])) 
    {
        addShoe($conn, $tableName, $_POST["item_name"], $_POST["color"], $_POST["price"], $_POST["date"],
         $_POST["six"], $_POST["sixhalf"], $_POST["seven"], $_POST["sevenhalf"], $_POST["eight"], $_POST["eighthalf"], $_POST["nine"], $_POST["ninehalf"],
         $_POST["ten"], $_POST["tenhalf"], $_POST["eleven"], $_POST["elevenhalf"], $_POST["twelve"], $_POST["other"]); 
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addMisc'])) 
    {
        addMisc($conn, $tableName, $_POST["item_name"], $_POST["color"], $_POST["price"], $_POST["date"], $_POST["other"], $_POST["quantity"]); 
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editClothingItem'])) 
    {
        editClothingItem($conn, $tableName, $_POST["item_id"], $_POST["item_name"], $_POST["color"], $_POST["price"], $_POST["small"],
         $_POST["medium"], $_POST["large"], $_POST["xl"], $_POST["xxl"], $_POST["quantity"], $_POST["date_purch"]); 
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editShoes'])) 
    {
        editShoes($conn, $tableName, $_POST["item_id_shoe"], $_POST["item_name_shoe"], $_POST["color_shoe"], $_POST["price_shoe"], $_POST['date'], $_POST["six"],
         $_POST["sixhalf"], $_POST["seven"], $_POST["sevenhalf"], $_POST["eight"], $_POST["eighthalf"], $_POST["nine"], 
         $_POST["ninehalf"], $_POST["ten"], $_POST["tenhalf"], $_POST["eleven"], $_POST["elevenhalf"], $_POST["twelve"]); 
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editMisc'])) 
    {
        editMisc($conn, $tableName, $_POST["item_id_misc"], $_POST["item_name_misc"], $_POST["color_misc"], $_POST["price_misc"], $_POST['date_misc'], $_POST["other_misc"],$_POST["quantity_misc"]);
    }
?>

<!--FileDot Softball Inventory Page-->
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $_SESSION['sportName'];?> Inventory </title>
<!--FileDot Softball Inventory Page-->
    <link rel="icon" type="image/png" href="Logo_Favicon-01.png"/>



<!--CSS File Link-->
<link rel="stylesheet" href="Website.css">

<style>

</style>
</head>


<?php


$result = getAll($conn, $tableName);

$result2 = getClothes($conn, $tableName);

$result3 = getShoes($conn, $tableName);

$result4 = getMisc($conn, $tableName);


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
         <div>
            <!--logout button-->
<?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 

            <form method = 'post' action = 'index.php'>
              <button type="submit" class="btn buttonlogout" name="logout">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
            </form>
<?php } ?>
        </div>
        </td>
    </tr>
</table>

<div class="well well-lg">
   <h1 align="text-center" style="font-size:5vw; margin-left:275px;"><?php echo $_SESSION['sportName'];?> Inventory</h1>
</div>
<div class="container">
     <!--connect to php file here with a form-->
    <div align="left">
    <form action="index.php" method="POST">
    <button type="submit" class="btn buttonBack">Back <i class="fa-solid fa-square-caret-left"></i></button>
    </form>
    <form action="search.php" method="POST">
    <input type="text" placeholder="Search Inventory..." name="search">
    <input type="hidden" name="table" value="<?php echo $tableName;?>">
    <input type="hidden" name="sport" value="<?php echo $sportName;?>">
    <button type="submit" class="buttonSearch" name="searchTable"><i class="fa-solid fa-magnifying-glass">
    </i></button>
	</form>
        <!--Trigger the modal-->


	</div>
    	
        <!--Add Clothing modal-->
        <div class="modal modal-centered" id="add" role="dialog">
            <div class="model-dialog">
                <!--Add Clothing Items-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type ="button" class="close" data-dismiss="modal">&times;</button>
			
                            <h1 class="modal-title">Add Inventory <i class="fa-solid fa-square-plus"></i></h1>
                        </div>
	<form action="inventoryTemplate2.php" method="POST">
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table tableadd">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Color</th>
                                                <th>Price</th>
                                                <th>Date of Purchase</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                               
                                                    <td>
                                                        <label for="item"></label>
                                                        <input type="text" name="item_name" placeholder="Type description...">
                                                    </td>
                                                    <td>
                                                        <label for="color"></label>
                                                        <input type="text" name="color" placeholder="Type color...">
                                                    </td>
                                                    <td>
                                                        <label for="price"></label>
                                                        <input type="text" name="price" placeholder="Type price...">
                                                    </td>
                                                    <td>
                                                        <label for="date"></label>
                                                        <input type="date" name="date" placeholder="Date...">
                                                    </td>
                                                </tr>
                                        </tbody>
                                            <tr>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>XL</th>
                                                <th>XXL</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                   <td>
                                                        <label for="small"></label>
                                                        <input type="number" name="small" placeholder="Quantity..." value="0">
                                                    </td>
                                                    <td>
                                                        <label for="medium"></label>
                                                        <input type="number" name="medium" placeholder="Quantity..." value="0">
                                                    </td>
                                                    <td>
                                                        <label for="large"></label>
                                                        <input type="number" name="large" placeholder="Quantity..." value="0">
                                                    </td>
                                                    <td>
                                                        <label for="xl"></label>
                                                        <input type="number" name="xl" placeholder="Quantity..." value="0">
                                                    </td>
                                                    <td>
                                                        <label for="xxl"></label>
                                                        <input type="number" name="xxl" placeholder="Quantity..." value="0">
                                                    </td>
                                                    <td>
                                                        <label for="quantity"></label>
                                                        <input type="number" name="quantity" placeholder="Quantity..." value="0">
                                                    </td>                                             
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 text-center">
		<input type="hidden" name="sportName" value="<?php echo $sportName;?>">

		<input type="hidden" name="tableName" value="<?php echo $tableName;?>">
                <input type="hidden" name="type" value="Clothing">

                                    <button type="submit" name = "addClothing" class="btn buttonaddinventory" data-toggle="modal" data-target="#add" onclick="toastr.success('Added Clothing!')">Add <i class="fa-solid fa-square-plus"></i></button>
                                    <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
		</form>
                                </div>
                            </div>
                    </div>
            </div>
        </div>

        <br>
        <!--Inventory Table-->
        <h1 align="left">Clothing</h1>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
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
<th><center>
<?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
    <button type="button" class="btn buttonaddinventory" data-toggle="modal" data-target="#add">Add <i class="fa-solid fa-square-plus"></i></button>
<?php } ?>
</center></th>
                </tr>

<?php
if (mysqli_num_rows($result2) > 0) {
  // output data of each row
?>
<tr><?php
  while($row = mysqli_fetch_assoc($result2)) {
?>
      <td><?php echo $row["item_id"];?></td>
	    <td><?php echo $row["item_name"];?></td>
	    <td><?php echo $row["color"];?></td>
	    <td><?php echo $row["price"];?></td>
	    <td><?php echo $row["small"];?></td>
	    <td><?php echo $row["medium"];?></td>
 	    <td><?php echo $row["large"];?></td>
	    <td><?php echo $row["xl"];?></td>
	    <td><?php echo $row["xxl"];?></td>
	    <td><?php echo $row["quantity"];?></td>
	    <td><?php echo $row["date_purch"];?></td>
        <?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
            <td><center><button type="button" class="btn buttoneditclothing" name="editButton"> Edit <i class="fa-solid fa-pen-to-square"></i></button>
        <?php } ?>
</tr>

<?php
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

       <!--Add Shoe modal-->
       <div class="modal modal-centered" id="addshoe" role="dialog">
           <div class="model-dialog">
               <!--Add Shoe Items-->
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type ="button" class="close" data-dismiss="modal">&times;</button>
                           <h1 class="modal-title">Add Inventory <i class="fa-solid fa-square-plus"></i></h1>
                       </div>
                           <div class="modal-body">
                               <div class="table-responsive">
                                   <table class="table tableadd">
                                       <thead>
                                           <tr>
                                               <th>Item</th>
                                               <th>Color</th>
                                               <th>Price</th>
                                               <th>Date of Purchase</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                  <form action="inventoryTemplate2.php" method="POST">
                                                   <td>
                                                       <label for="itemshoe"></label>
                                                       <input type="text" name="item_name" placeholder="Type description...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="colorshoe"></label>
                                                       <input type="text" name="color" placeholder="Type color...">
                                                   </td>
                                             
                                                   <td>
                                                       <label for="priceshoe"></label>
                                                       <input type="text" name="price" placeholder="Type price...">
                                                   </td>
                                               
                                                   <td>
                                                       <label for="dateshoe"></label>
                                                       <input type="date" name="date" placeholder="Date...">
                                                   </td>
                                              
                                           </tr>
                                       </tbody>
                                       <thead>
                                           <tr>
                                                <th>6</th>
                                                <th>6.5</th>
                                                <th>7</th>
                                                <th>7.5</th>
                                                <th>8</th>
                                                <th>8.5</th>
                                                <th>9</th>
                                                
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>                                              
                                                   <td>
                                                       <label for="six"></label>
                                                       <input type="number" name="six" placeholder="Quantity..." value="0">
                                                   </td>
                                              
                                                    <td>
                                                        <label for="sixhalf"></label>
                                                        <input type="number" name="sixhalf" placeholder="Quantity..." value="0">
                                                    </td>
                                                
                                                    <td>
                                                        <label for="seven"></label>
                                                        <input type="number" name="seven" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="sevenhalf"></label>
                                                        <input type="number" name="sevenhalf" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="eight"></label>
                                                        <input type="number" name="eight" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="eighthalf"></label>
                                                        <input type="number" name="eighthalf" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="nine"></label>
                                                        <input type="number" name="nine" placeholder="Quantity..." value="0">
                                                    </td>                          
                                                    
                                               
                                            </tr>
                                       </tbody>
                                                <thead>
                                                    <tr>
							<th>9.5</th>
                                                        <th>10</th>
                                                        <th>10.5</th>
                                                        <th>11</th>
                                                        <th>11.5</th>
                                                        <th>12</th>
                                                        <th>Other</th>                                           
                                                    </tr>
                                                </thead>
                                        <tbody>
                                            <tr>
						    <td>
                                                        <label for="ninehalf"></label>
                                                        <input type="number" name="ninehalf" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="ten"></label>
                                                        <input type="number" name="ten" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="tenhalf"></label>
                                                        <input type="number" name="tenhalf" placeholder="Quantity..." value="0">
                                                    </td>
                                                
                                                    <td>
                                                        <label for="eleven"></label>
                                                        <input type="number" name="eleven" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="elevenhalf"></label>
                                                        <input type="number" step="0.5" name="elevenhalf" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="twelve"></label>
                                                        <input type="number" name="twelve" placeholder="Quantity..." value="0">
                                                    </td>
                                                
                                                    <td>
                                                        <label for="other"></label>
                                                        <input type="text" name="other" placeholder="Other...">
                                                    </td>
                                                                                                                                                  
                                           </tr>
                                       </tbody>
                                   </table>
                                   </div>
                           </div>
                           <div class="modal-footer">
                               <div class="col-md-12 text-center">
<input type="hidden" name="sportName" value="<?php echo $sportName;?>">

		<input type="hidden" name="tableName" value="<?php echo $tableName;?>">
                <input type="hidden" name="type" value="Shoes">

                                   <button type="submit" name = "addShoe" class="btn buttonaddinventory" data-toggle="modal" data-target="#addshoe" onclick="toastr.success('Added Shoes!')">Add <i class="fa-solid fa-square-plus"></i></button>
                                   <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
			</form>
                               </div>
                           </div>
                   </div>
           </div>
       </div>

    <br>

    <!--Inventory Table-->
    <h1 align="left">Shoes</h1>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Item ID</th>
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
<th><center>
      <?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
        <button type="button" class="btn buttonaddinventory" data-toggle="modal" data-target="#addshoe">Add <i class="fa-solid fa-square-plus"></i></button>
      <?php } ?>
</center></th>
            </tr>

<?php
if (mysqli_num_rows($result3) > 0) {
  // output data of each row
?><tr><?php
  while($row = mysqli_fetch_assoc($result3)) {
?>

      <td><?php echo $row["item_id"];?></td>
	    <td><?php echo $row["item_name"];?></td>
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
        <?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
            <td><center><button type="submit" class="btn buttoneditshoes" name="editShoesButton"> Edit <i class="fa-solid fa-pen-to-square"></i></button>
        <?php } ?>

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
<?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
        <!--button type="button" class="btn buttonadd" data-toggle="modal" data-target="#addmisc">Add <i class="fa-solid fa-square-plus"></i></button-->
<?php } ?>
    <!--Add Miscellaneous modal-->
       <div class="modal modal-centered" id="addmisc" role="dialog">
           <div class="model-dialog">
               <!--Add Miscellaneous Items-->
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h1 class="modal-title">Add Inventory <i class="fa-solid fa-square-plus"></i></h1>
                       </div>
                           <div class="modal-body">
                               <div class="table-responsive">
                                   <table class="table tableadd">
                                       <thead>
                                           <tr>
                                               <th>Item</th>
                                               <th>Color</th>
                                               <th>Price</th>
                                               <th>Date of Purchase</th>
                                               <th>Other</th>
                                               <th>Qty</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>                                    
                                              <form action="inventoryTemplate2.php" method="POST">
                                                   <td>
                                                       <label for="itemmisc"></label>
                                                       <input type="text" name="item_name" placeholder="Type description...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="colormisc"></label>
                                                       <input type="text" name="color" placeholder="Type color...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="pricemisc"></label>
                                                       <input type="text" name="price" placeholder="Type price...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="datemisc"></label>
                                                       <input type="date" name="date" placeholder="Date...">
                                                   </td>
                                               
                                                    <td>
                                                        <label for="othermisc"></label>
                                                        <input type="text" name="other" placeholder="Other...">
                                                    </td>
                                              
                                                    <td>
                                                        <label for="quantitymisc"></label>
                                                        <input type="number" name="quantity" placeholder="Quantity...">
                                                    </td>
                                              
                                           </tr>
                                       </tbody>
                                   </table>
                                   </div>
                           </div>
                           <div class="modal-footer">
                               <div class="col-md-12 text-center">
<input type="hidden" name="sportName" value="<?php echo $sportName;?>">

		<input type="hidden" name="tableName" value="<?php echo $tableName;?>">
                <input type="hidden" name="type" value="Misc">

                                   <button type="submit" name = "addMisc" class="btn buttonaddinventory" data-toggle="modal" data-target="#addmisc" onclick="toastr.success('Added Miscellaneous!')">Add <i class="fa-solid fa-square-plus"></i></button>
                                   <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
				</form>
                               </div>
                           </div>
                   </div>
           </div>
       </div>

    <br>

    <!--Inventory Table-->
    <h1 align="left">Miscellaneous</h1>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item</th>
                <th>Color</th>
                <th>Price</th>
                <th>Other</th>
                <th>Qty</th>
                <th>Date of Purchase</th>
<th><center>
      <?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
          <button type="button" class="btn buttonaddinventory" data-toggle="modal" data-target="#addmisc">Add <i class="fa-solid fa-square-plus"></i></button>
      <?php } ?>
</center></th>
            </tr>

<?php
if (mysqli_num_rows($result4) > 0) {
  
?><tr><?php

  while($row = mysqli_fetch_assoc($result4)) {
?>

      <td><?php echo $row["item_id"];?></td>
 	    <td><?php echo $row["item_name"];?></td>
	    <td><?php echo $row["color"];?></td>
	    <td><?php echo $row["price"];?></td>
	    <td><?php echo $row["other"];?></td>
	    <td><?php echo $row["quantity"];?></td>
	    <td><?php echo $row["date_purch"];?></td>
        <?php if ( $_SESSION['permLevel'] == "Manager" || $_SESSION['permLevel'] == "Admin") { ?> 
            <td><center><button type="submit" class="btn buttoneditmisc" name="editMiscModal">Edit <i class="fa-solid fa-pen-to-square"></i></button>
        <?php } ?>

</center></td>

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



 <!--Edit Clothing modal*********************************************************************************************************************-->
        <div class="modal modal-centered" id="editclothing" role="dialog">
            <div class="model-dialog">
                <!--Add Clothing Items-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type ="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="modal-title">Edit Clothing <i class="fa-solid fa-pen-to-square"></i></h1>
                        </div>
	<form action="inventoryTemplate2.php" method="POST">
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table tableadd">
                                    
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Color</th>
                                                <th>Price</th>
                                                <th>Date of Purchase</th>						
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                        <input type="hidden" id = "item_id" name = "item_id">
                                                    <td>
                                                        <label for="item"></label>
                                                        <input type="text" name="item_name" id="item_name">
                                                    </td>
                                                    <td>
                                                        <label for="color"></label>
                                                        <input type="text" name="color" id="color">
                                                    </td>
                                                    <td>
                                                        <label for="price"></label>
                                                        <input type="text" name="price" id="price">
                                                    </td>
                                                    <td>
                                                        <label for="date"></label>
                                                        <input type="date" name="date_purch" id="date_purch">
                                                    </td>
							
                                                </tr>
                                        </tbody>
                                            <tr>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>XL</th>
                                                <th>XXL</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                   <td>
                                                        <label for="small"></label>
                                                        <input type="number" name="small" id="small">
                                                    </td>
                                                    <td>
                                                        <label for="medium"></label>
                                                        <input type="number" name="medium" id="medium">
                                                    </td>
                                                    <td>
                                                        <label for="large"></label>
                                                        <input type="number" id="large" name="large">
                                                    </td>
                                                    <td>
                                                        <label for="xlarge"></label>
                                                        <input type="number" id="xl" name="xl">
                                                    </td>
                                                    <td>
                                                        <label for="xxlarge"></label>
                                                        <input type="number" id="xxl" name="xxl">
                                                    </td>
                                                    <td>
                                                        <label for="quantity"></label>
                                                        <input type="number" id="quantity" name="quantity">
                                                    </td>     
                                                                                         
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 text-center">
		<input type="hidden" name="sportName" value="<?php echo $sportName;?>">
		<input type="hidden" name="tableName" value="<?php echo $tableName;?>">
    <input type="hidden" name="type" value="Clothing">
                                    
                                    <button type="submit" class="btn buttoneditinventory"  name = "editClothingItem">Save <i class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button>
                                    <button type="submit" class="btn buttondelete"  name = "deleteItem">Delete <i class="fa-solid fa-trash-can"></i></button>

		</form>
                                </div>
                            </div>
                    </div>
            </div>
        </div>


 <!--Edit Miscellaneous modal***********************************************************************************************************************************-->
       <div class="modal modal-centered" id="editmisc" role="dialog">
           <div class="model-dialog">
               <!--Add Miscellaneous Items-->
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h1 class="modal-title">Edit Items <i class="fa-solid fa-pen-to-square"></i></h1>
                       </div>
                           <div class="modal-body">


                               <div class="table-responsive">
                                   <table class="table tableadd">
                                       <thead>
                                           <tr>
                                               <th>Item</th>
                                               <th>Color</th>
                                               <th>Price</th>
                                               <th>Date of Purchase</th>
                                               <th>Other</th>
                                               <th>Qty</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>                              
                                              <form action="inventoryTemplate2.php" method="POST">
                                                       <input type="hidden" id = "item_id_misc" name="item_id_misc">
                                                   <td>
                                                       <label for="itemmisc"></label>
                                                       <input type="text" name="item_name_misc" id="item_name_misc">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="colormisc"></label>
                                                       <input type="text" name="color_misc" id="color_misc">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="pricemisc"></label>
                                                       <input type="text" name="price_misc" id="price_misc">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="datemisc"></label>
                                                       <input type="date" name="date_misc" id="date_misc">
                                                   </td>
                                               
                                                    <td>
                                                        <label for="othermisc"></label>
                                                        <input type="text" name="other_misc" id="other_misc">
                                                    </td>
                                              
                                                    <td>
                                                        <label for="quantitymisc"></label>
                                                        <input type="number" name="quantity_misc" id="quantity_misc">
                                                    </td>
                                              
                                           </tr>
                                       </tbody>
                                   </table>
                                   </div>
                           </div>
 <div class="modal-footer">
                               <div class="col-md-12 text-center">

                                   <button type="submit" class="btn buttoneditinventory" name = "editMisc">Save <i class="fa-solid fa-pen-to-square"></i></button>
                                   <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
                                   <button type="submit" class="btn buttondelete"  name = "deleteItem">Delete <i class="fa-solid fa-trash-can"></i></button>
				</form>
                               </div>
                           </div>
                   </div>
           </div>
       </div>

    <br>










 <!--Edit Shoe modal***********************************************************************************************************************************************-->
       <div class="modal modal-centered" id="editshoes" role="dialog">
           <div class="model-dialog">
               <!--Add Shoe Items-->
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type ="button" class="close" data-dismiss="modal">&times;</button>
                           <h1 class="modal-title">Edit Shoes <i class="fa-solid fa-pen-to-square"></i></h1>
                       </div>
                   <form action="inventoryTemplate2.php" method="POST">
                           <div class="modal-body">
                               <div class="table-responsive">
                                   <table class="table tableadd">
                                       <thead>
                                           <tr>
                                               <th>Item</th>
                                               <th>Color</th>
                                               <th>Price</th>
                                               <th>Date of Purchase</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>                                        
                                               
                                                       <input type = "hidden" id = "item_id_shoe" name = "item_id_shoe">
                                                   <td>
                                                       <label for="item_name"></label>
                                                       <input type="text" name="item_name_shoe" id ="item_name_shoe">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="color"></label>
                                                       <input type="text" name="color_shoe" id="color_shoe">
                                                   </td>
                                             
                                                   <td>
                                                       <label for="price"></label>
                                                       <input type="text" name="price_shoe" id="price_shoe">
                                                   </td>
                                               
                                                   <td>
                                                       <label for="date"></label>
                                                       <input type="date" name="date" id="date">
                                                   </td>
                                              
                                           </tr>
                                       </tbody>
                                       <thead>
                                           <tr>
                                                <th>6</th>
                                                <th>6.5</th>
                                                <th>7</th>
                                                <th>7.5</th>
                                                <th>8</th>
                                                <th>8.5</th>
                                                <th>9</th>
                                                
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>                                              
                                                   <td>
                                                       <label for="six"></label>
                                                       <input type="number" name="six" id="six">
                                                   </td>
                                              
                                                    <td>
                                                        <label for="sixhalf"></label>
                                                        <input type="number" name="sixhalf" id="sixhalf">
                                                    </td>
                                                
                                                    <td>
                                                        <label for="seven"></label>
                                                        <input type="number" name="seven" id="seven">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="sevenhalf"></label>
                                                        <input type="number" name="sevenhalf" id="sevenhalf" >
                                                    </td>
                                               
                                                    <td>
                                                        <label for="eight"></label>
                                                        <input type="number" name="eight" id="eight">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="eighthalf"></label>
                                                        <input type="number" name="eighthalf" id="eighthalf">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="nine"></label>
                                                        <input type="number" name="nine" id="nine">
                                                    </td>                          
                                                    
                                               
                                            </tr>
                                       </tbody>
                                                <thead>
                                                    <tr>
							                                          <th>9.5</th>
                                                        <th>10</th>
                                                        <th>10.5</th>
                                                        <th>11</th>
                                                        <th>11.5</th>
                                                        <th>12</th>
                                                        <th>Other</th>                                           
                                                    </tr>
                                                </thead>
                                        <tbody>
                                            <tr>
						    <td>
                                                        <label for="ninehalf"></label>
                                                        <input type="number" name="ninehalf" id="ninehalf" >
                                                    </td>
                                               
                                                    <td>
                                                        <label for="ten"></label>
                                                        <input type="number" name="ten" id="ten" >
                                                    </td>
                                               
                                                    <td>
                                                        <label for="tenhalf"></label>
                                                        <input type="number" name="tenhalf" id="tenhalf">
                                                    </td>
                                                
                                                    <td>
                                                        <label for="eleven"></label>
                                                        <input type="number" name="eleven" id="eleven">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="elevenhalf"></label>
                                                        <input type="number"  name="elevenhalf" id="elevenhalf">
                                                    </td>
                                               
                                                    <td>
                                                        <label for="twelve"></label>
                                                        <input type="number" name="twelve" id="twelve" >
                                                    </td>
                                                
                                                    <td>
                                                        <label for="other"></label>
                                                        <input type="text" name="other" id="other">
                                                    </td>
                                                                                                                                                  
                                           </tr>
                                       </tbody>
                                   </table>
                                   </div>
                           </div>
                           <div class="modal-footer">
                               <div class="col-md-12 text-center">
<input type="hidden" name="sportName" value="<?php echo $sportName;?>">

		<input type="hidden" name="tableName" value="<?php echo $tableName;?>">
                <input type="hidden" name="type" value="Shoes">

                                   <button type="submit" class="btn buttoneditinventory" name = "editShoes">Save <i class="fa-solid fa-pen-to-square"></i></button>
                                   <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button>
                                   <button type="submit" class="btn buttondelete"  name = "deleteItem">Delete <i class="fa-solid fa-trash-can"></i></button> 
					
			</form>
                               </div>
                           </div>
                   </div>
           </div>
       </div>

    <br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
     $(document).ready(function () {

        $('.buttoneditclothing').on('click', function () {

            $('#editclothing').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#item_id').val(data[0]);
            $('#item_name').val(data[1]);
            $('#color').val(data[2]);
            $('#price').val(data[3]);
            $('#small').val(data[4]);
            $('#medium').val(data[5]);
            $('#large').val(data[6]);
            $('#xl').val(data[7]);
            $('#xxl').val(data[8]);
            $('#quantity').val(data[9]);
            $('#date_purch').val(data[10]);

        });
    });
    </script>
    
    <script>
     $(document).ready(function () {

        $('.buttoneditshoes').on('click', function () {

            $('#editshoes').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#item_id_shoe').val(data[0]);
            $('#item_name_shoe').val(data[1]);
            $('#color_shoe').val(data[2]);
            $('#price_shoe').val(data[3]);
            $('#six').val(data[4]);
            $('#sixhalf').val(data[5]);
            $('#seven').val(data[6]);
            $('#sevenhalf').val(data[7]);
            $('#eight').val(data[8]);
            $('#eighthalf').val(data[9]);
            $('#nine').val(data[10]);
            $('#ninehalf').val(data[11]);
            $('#ten').val(data[12]);
            $('#tenhalf').val(data[13]);
            $('#eleven').val(data[14]);
            $('#elevenhalf').val(data[15]);
            $('#twelve').val(data[16]);
            $('#other').val(data[17]);
            $('#date').val(data[18]);

        });
    });
    </script>
    
    <script>
     $(document).ready(function () {

        $('.buttoneditmisc').on('click', function () {

            $('#editmisc').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#item_id_misc').val(data[0]);
            $('#item_name_misc').val(data[1]);
            $('#color_misc').val(data[2]);
            $('#price_misc').val(data[3]);
            $('#other_misc').val(data[4]);
            $('#quantity_misc').val(data[5]);
            $('#date_misc').val(data[6]);
        

        });
    });
    </script>
    
   


</html>