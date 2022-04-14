<?php
session_start();

include_once 'imports.php';
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/functions.php';
include_once '/home/capstone/DatabaseInformation/databaseFunc.php';

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }


$result = selectAllItems($conn, $sportid);
$sql2 = "SELECT * FROM $tableName WHERE type='Clothing'";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT * FROM $tableName WHERE type='Shoes'";
$result3 = mysqli_query($conn, $sql3);
$sql4 = "SELECT * FROM $tableName WHERE type='Misc'";
$result4 = mysqli_query($conn, $sql4);
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
            <form method = 'post' action = 'index.php'>
              <input type="submit" class="btn buttonlogout" name="logout" value="Log Out"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
            </form>
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
    <form action="index.php" method="POST">
    <button type="submit" class="btn buttonBack">Back <i class="fa-solid fa-square-caret-left"></i></button>
    </form>
    <form action="search.php" method="POST">
    <input type="text" placeholder="Search Inventory..." name="search">
    <input type="hidden" name="table" value="<?php echo $tableName;?>">
    <input type="hidden" name="sport" value="<?php echo $sportName;?>">
    <button type="submit"><i class="fa-solid fa-magnifying-glass">
    </i></button>

        <!--Trigger the modal-->

        <button type="button" class="btn buttonadd" data-toggle="modal" data-target="#add">Add <i class="fa-solid fa-square-plus"></i></button>
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
                                                <!--input picture
                                                    <form>
                                                    <td>
                                                        <label for="image"></label>
                                                        <input class="form-control" type="file" id="image" name="image">
                                                    </td>
                                                </form>
                                                <form> -->
                                                    <td>
                                                        <label for="item"></label>
                                                        <input type="text" id="item" name="item" placeholder="Type description...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="color"></label>
                                                        <input type="text" id="color" name="color" placeholder="Type color...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="price"></label>
                                                        <input type="text" id="price" name="price" placeholder="Type price...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="date"></label>
                                                        <input type="date" id="date" name="date" placeholder="Date...">
                                                    </td>
                                                </form> 
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
                                                <form>
                                                    <td>
                                                        <label for="small"></label>
                                                        <input type="number" id="small" name="small" placeholder="Quantity...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="medium"></label>
                                                        <input type="number" id="medium" name="medium" placeholder="Quantity...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="large"></label>
                                                        <input type="number" id="large" name="large" placeholder="Quantity...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="xlarge"></label>
                                                        <input type="number" id="xlarge" name="xlarge" placeholder="Quantity...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="xxlarge"></label>
                                                        <input type="number" id="xxlarge" name="xxlarge" placeholder="Quantity...">
                                                    </td>
                                                </form>
                                                <form>
                                                    <td>
                                                        <label for="quantity"></label>
                                                        <input type="number" id="quantity" name="quantity" placeholder="Quantity...">
                                                    </td>
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn buttonaddinventory" data-toggle="modal" data-target="#add" form="form1" onclick="toastr.success('Added Clothing!')">Add <i class="fa-solid fa-square-plus"></i></button>
                                    <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
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
    <button type="button" class="btn buttonadd" data-toggle="modal" data-target="#addshoe" >Add <i class="fa-solid fa-square-plus"></i></button>
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
                                               <!--input picture
                                                   <form>
                                                   <td>
                                                       <label for="imageshoe"></label>
                                                       <input class="form-control" type="file" id="imageshoe" name="imageshoe">
                                                   </td>
                                               </form> -->
                                               <form action="inputShoes.php" method="POST">
                                                   <td>
                                                       <label for="itemshoe"></label>
                                                       <input type="text" name="itemshoe" placeholder="Type description...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="colorshoe"></label>
                                                       <input type="text" name="colorshoe" placeholder="Type color...">
                                                   </td>
                                             
                                                   <td>
                                                       <label for="priceshoe"></label>
                                                       <input type="text" name="priceshoe" placeholder="Type price...">
                                                   </td>
                                               
                                                   <td>
                                                       <label for="dateshoe"></label>
                                                       <input type="date" name="dateshoe" placeholder="Date...">
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
                                                <th>9.5</th>
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
                                              
                                                    <td>
                                                        <label for="ninehalf"></label>
                                                        <input type="number" name="ninehalf" placeholder="Quantity..." value="0">
                                                    </td>
                                               
                                            </tr>
                                       </tbody>
                                                <thead>
                                                    <tr>
                                                        <th>10</th>
                                                        <th>10.5</th>
                                                        <th>11</th>
                                                        <th>11.5</th>
                                                        <th>12</th>
                                                        <th>Other</th>
                                                        <th>Qty</th>
                                                    </tr>
                                                </thead>
                                        <tbody>
                                            <tr>
                                               
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
                                               
                                                    <td>
                                                        <label for="quantityshoe"></label>
                                                        <input type="number" name="quantityshoe" placeholder="Quantity...">
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

                                   <button type="submit" class="btn buttonaddinventory" data-toggle="modal" data-target="#addshoe" onclick="toastr.success('Added Shoes!')">Add <i class="fa-solid fa-square-plus"></i></button>
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
                <th>Qty</th>
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
    <button type="button" class="btn buttonadd" data-toggle="modal" data-target="#addmisc">Add <i class="fa-solid fa-square-plus"></i></button>
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
                                               <!--input picture
                                                   <form id="misc">
                                                   <td>
                                                       <label for="imageshoe"></label>
                                                       <input class="form-control" type="file" id="imageshoe" name="imageshoe">
                                                   </td>
                                               </form> -->
                                              <form action="testinput.php" method="POST">
                                                   <td>
                                                       <label for="itemmisc"></label>
                                                       <input type="text" name="itemmisc" placeholder="Type description...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="colormisc"></label>
                                                       <input type="text" name="colormisc" placeholder="Type color...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="pricemisc"></label>
                                                       <input type="text" name="pricemisc" placeholder="Type price...">
                                                   </td>
                                              
                                                   <td>
                                                       <label for="datemisc"></label>
                                                       <input type="date" name="dateshoemisc" placeholder="Date...">
                                                   </td>
                                               
                                                    <td>
                                                        <label for="othermisc"></label>
                                                        <input type="text" name="othermisc" placeholder="Other...">
                                                    </td>
                                              
                                                    <td>
                                                        <label for="quantitymisc"></label>
                                                        <input type="number" name="quantitymisc" placeholder="Quantity...">
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

                                   <button type="submit" class="btn buttonaddinventory" data-toggle="modal" data-target="#addmisc" onclick="toastr.success('Added Miscellaneous!')">Add <i class="fa-solid fa-square-plus"></i></button>
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
</html>