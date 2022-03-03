<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <?php
$servername = "localhost:3306";
$username = "root";
$password = "capGroupProject";
$dbname = "equiptmentDataBase";
$conn = new mysqli($servername, $username, $password, $dbname);
echo "Database opened!";
?>

</body>
</html>