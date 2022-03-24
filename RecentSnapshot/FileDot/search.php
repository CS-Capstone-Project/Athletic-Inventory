
<?php


include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';
include_once '/home/capstone/DatabaseInformation/functions.php';

?>

<html>
	
	


<!--CSS File Link-->
<link rel="stylesheet" href="Website.css">

<?php
$item = $_POST['search'];
$table = $_POST['table'];
$sport = $_POST['sport'];


$sql = "SELECT * FROM $table WHERE item_name='$item'";


$result = mysqli_query($conn, $sql);
?>

<h1>Items Found in Search</h1>
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
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["item_name"]. "</td><td>" . $row["color"] . "</td><td>" .
    $row["price"] . "</td><td>" . $row["small"] .  "</td><td>" . $row["medium"] . "</td><td>" . $row["large"] . "</td><td>" . $row["xl"] . 
     "</td><td>" . $row["xxl"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["date_purch"] .
     "</td></tr><br>";
  }
}


?>
</thread>
</table>

<form action="inventoryTemplate2.php" method="POST">
<input type="hidden" name="sport" value="<?php echo $sport; ?>">
<input type="hidden" name="table" value="<?php echo $table; ?>">
    <button type="submit" class="btn buttonBack">Back <i class="fa-solid fa-square-caret-left"></i></button>
    </form>

</html>