<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:lightgreen;">

<body>
<?php
$chosen = $_POST['billtype'];
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bills";
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<img src="searchbillsimg.png">
<br></br>
<?php
$sql = "SELECT * FROM allbills WHERE $chosen IS NOT NULL";
$result = mysqli_query($conn, $sql);
?>
<table><?php

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) { 	?>
	<tr>
	<td> <?php  echo $row["Date"] . " &nbsp &nbsp &nbsp &nbsp &nbsp $chosen was $" . $row["$chosen"] ;?></td>		
        </tr> <?php
    }
}
else{
echo "No results for $chosen.";
}
?>
</table>
<br></br>
<form action="viewbills.php" method="POST">
<input type="submit" value="Search Bills" />
</form>


</body>
</html>