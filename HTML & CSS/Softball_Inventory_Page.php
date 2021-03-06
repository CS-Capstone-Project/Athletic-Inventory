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
<link rel="stylesheet" href="Website.css">

<style>

</style>
</head>

<body>

<!--Must be included on every page that opens database-->
<?php
$servername = "localhost:3306";
$username = "root";
$password = "capGroupProject";
$dbname = "equipmentDataBase";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM softball_inv";
$result = mysqli_query($conn, $sql);

?>


<!--Logo must be on everypage-->
<img src="FileDotLogo_01.png" class="align-right small" alt="FileDot Logo">
<div class="jumbotron text-center">
    <h1>Softball Inventory</h1>
</div>
 <!--table header-->
 <div class="container">
        <p> search bar here</p>



        <button class="button buttonadd">Add <i class="fa-solid fa-square-plus"></i></button>
        <br>
        <h2>Clothing</h2>
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
	    <td><?php echo $row["quantity"];?></td></tr><?php
  }
}
?>

            </thead>
            <tbody>
                <tr>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
                    <td>input box</td>
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