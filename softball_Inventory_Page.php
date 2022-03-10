<!--FileDot Softball Inventory Page-->
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Softball Inventory </title>

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
<!--CSS File Link-->
<!--link rel="stylesheet" type="text/css" href="Website.css" /-->

</head>
<style>

body{
    font-family: 'Bebas Neue', cursive;
}

img.small{
    width:10%;
    height:10%;
}

img.align-right{
    float: right;
    margin-top:15px;
    margin-left: 15px;
    margin-right: 15px;
}
table{
    width:70%;
    border:1px solid;
}

th, td{
    text-align: left;
}
table.center{
    margin-left: auto;
    margin-right: auto;
}

.tableadd{
    border:0px;
}

.buttonadd{
    background-color: #f5cf14;
    color: white;
    padding: 10px 24px;
    font-size: 16px;
    float: right;
    
}

.buttonaddinventory{
    background-color: #f5cf14;
    color: white;
    padding: 10px 40px;
    font-size: 16px;
    float: center;
    
    
}

.buttoncancel{
    background-color: #980B84;
    color: white;
    padding: 10px 40px;
    font-size: 16px;
    float: center;
}

.modal-lg {
    width: 100%;
  }

.modal-header {
    background-color: #4FB4B0;
    padding:16px 16px;
    color:#FFF;
}

.modal-dialog{
    display:inline-block;
    text-align: left;
    vertical-align: middle;
}

</style>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "capGroupProject";
$dbname = "equipmentDataBase";
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM w_softball_inv WHERE type='Clothing'";
$sql2 = "SELECT * FROM w_softball_inv WHERE type='Shoes'";


$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

?>

<body>
<!--Logo must be on everypage-->
<img src="FileDotLogo_01.png" class="align-right small" alt="FileDot Logo">
<div class="jumbotron text-center">
    <h1>Softball Inventory</h1>
</div>

 <!--table header-->
 <div class="container">
        <p> search bar here</p>
        <!--Trigger the modal-->
        <button type="button" class="btn buttonadd" data-toggle="modal" data-target="#add" >Add <i class="fa-solid fa-square-plus"></i></button>
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
                                                <form>
                                                    <td>
                                                        <label for="item"></label>
                                                        <input type="text" id="item" name="item" placeholder="Type description...">
                                                        <input class="form-control" type="file" id="image" name="image" multiple>
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
                                    <button type="button" class="btn buttonaddinventory" data-toggle="modal" data-target="#add" >Add <i class="fa-solid fa-square-plus"></i></button>
                                    <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
                                </div>
                            </div>
                    </div>
            </div>
        </div>
        <br>
        <!--Inventory Table-->
        <h1>Clothing</h1>
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
if (mysqli_num_rows($result) > 0) {
  // output data of each row
?><tr><?php
  while($row = mysqli_fetch_assoc($result)) {
	  ?><td><?php echo $row["item_name"];?></td>
	    <td><?php echo $row["color"];?></td>
	    <td><?php echo $row["price"];?></td>
	    <td><?php echo $row["small"];?></td>
	    <td><?php echo $row["medium"];?></td>
 	    <td><?php echo $row["large"];?></td>
	    <td><?php echo $row["xl"];?></td>
	    <td><?php echo $row["xxl"];?></td>
	    <td><?php echo $row["quantity"];?></td>
	    <td><?php echo $row["date_purch"];?></td></tr><?php
  }
}
?>

            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
        </div>

    <div class="container">
        <!--Trigger the modal-->
        <button type="button" class="btn buttonadd" data-toggle="modal" data-target="#add" >Add <i class="fa-solid fa-square-plus"></i></button>
        <!--Add Shoe modal-->
        <div class="modal modal-centered" id="addshoes" role="dialog">
            <div class="model-dialog">
                <!--Add Shoe Items-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type ="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="modal-title">Add Shoes <i class="fa-solid fa-square-plus"></i></h1>
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
                                                <th>Size</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <form>
                                                    <td>
                                                        <label for="item"></label>
                                                        <input type="text" id="item" name="item" placeholder="Type description...">
                                                        <input class="form-control" type="file" id="image" name="image" multiple>
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
                                                <form>
                                                    <td>
                                                        <label for="size"></label>
                                                        <input type="number" id="size" name="size" placeholder="Size...">
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
                                    <button type="button" class="btn buttonaddinventory" data-toggle="modal" data-target="#add" >Add <i class="fa-solid fa-square-plus"></i></button>
                                    <button type="button" class="btn buttoncancel" data-dismiss="modal">Cancel <i class="fa-solid fa-rectangle-xmark"></i></button> 
                                </div>
                            </div>
                    </div>
            </div>
        </div>
        <!--Shoe Inventory-->
        <h1>Shoes</h1>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Size</th>
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
	    <td><?php echo $row["size"];?></td>
	    <td><?php echo $row["quantity"];?></td>
	    <td><?php echo $row["date_purch"];?></td></tr><?php
  }
}
?>

            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
<hr>

<hr>

<!--Must be at the bottom of every page-->
<footer class="container-fluid text-center">
    <p>&copy; Copyright of CS Capstone Project 2022 V.1.0</p>
  </footer>

</body>
</html>