<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
*{
 color: white;
  text-shadow: 1px 1px 2px white 0 0 25px blue, 0 0 5px green;
background-image: url("5658423.jpg");
font-size: 26px;
}

</style>
 <?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "haircuts";
$conn = new mysqli($servername, $username, $password, $dbname);


$temp[1]="a10";
$temp[2]="a1030";
$temp[3]="a11";
$temp[4]="a1130";
$temp[5]="a12";
$temp[6]="a1230";
$temp[7]="a1";
$temp[8]="a130";
$temp[9]="a2";
$temp[10]="a230";
$temp[11]="a3";
$temp[12]="a330";
$temp[13]="a4";
$temp[14]="a430";
$temp[15]="a5";
$temp[16]="a530";
$temp[17]="a6";
$temp[18]="a630";
$temp[19]="a7";
$temp[20]="a730";



if ($_POST){
    $day =$_POST['daychosen'];
   
if ($day=="Sunday") $sql = "SELECT * FROM sunday WHERE week='1'";
if ($day=="Monday") $sql = "SELECT * FROM monday WHERE week='1'";
if ($day=="Tuesday") $sql = "SELECT * FROM tuesday WHERE week='1'";
if ($day=="Wednesday") $sql = "SELECT * FROM wednesday WHERE week='1'";
if ($day=="Thursday") $sql = "SELECT * FROM thursday WHERE week='1'";
if ($day=="Friday") $sql = "SELECT * FROM friday WHERE week='1'";
if ($day=="Saturday") $sql = "SELECT * FROM saturday WHERE week='1'";


$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql);
$result3 = mysqli_query($conn, $sql);
$result4 = mysqli_query($conn, $sql);
$result5 = mysqli_query($conn, $sql);
$result6 = mysqli_query($conn, $sql);
$result7 = mysqli_query($conn, $sql);
$result8 = mysqli_query($conn, $sql);
$result9 = mysqli_query($conn, $sql);
$result10 = mysqli_query($conn, $sql);
$result11 = mysqli_query($conn, $sql);
$result12 = mysqli_query($conn, $sql);
$result13 = mysqli_query($conn, $sql);
$result14 = mysqli_query($conn, $sql);
$result15 = mysqli_query($conn, $sql);
$result16 = mysqli_query($conn, $sql);
$result17 = mysqli_query($conn, $sql);
$result18 = mysqli_query($conn, $sql);
$result19 = mysqli_query($conn, $sql);
$result20 = mysqli_query($conn, $sql);

$rows = mysqli_num_rows($result);

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result);
		if( $row[$temp[1]]=="yes"){
		 echo $row['Name'];
		?> &nbsp 10:00AM<br> <?php
		}				
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result2);
		if( $row[$temp[2]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 10:30AM<br> <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result3);
		if( $row[$temp[3]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 11:00AM<br>  <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result4);
		if( $row[$temp[4]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 11:30AM<br>  <?php
		}		
}
for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result5);
		if( $row[$temp[5]]=="yes"){
		 echo $row['Name'];
		?> &nbsp 12:00PM<br> <?php
		}				
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result6);
		if( $row[$temp[6]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 12:30PM<br> <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result7);
		if( $row[$temp[7]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 1:00PM<br>  <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result8);
		if( $row[$temp[8]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 1:30PM<br>  <?php
		}		
}
for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result9);
		if( $row[$temp[9]]=="yes"){
		 echo $row['Name'];
		?> &nbsp 2:00PM<br> <?php
		}				
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result10);
		if( $row[$temp[10]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 2:30PM<br> <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result11);
		if( $row[$temp[11]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 3:00PM<br>  <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result12);
		if( $row[$temp[12]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 3:30PM<br>  <?php
		}		
}
for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result13);
		if( $row[$temp[13]]=="yes"){
		 echo $row['Name'];
		?> &nbsp 4:00PM<br> <?php
		}				
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result14);
		if( $row[$temp[14]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 4:30PM<br> <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result15);
		if( $row[$temp[15]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 5:00PM<br>  <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result16);
		if( $row[$temp[16]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 5:30PM<br>  <?php
		}		
}
for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result17);
		if( $row[$temp[17]]=="yes"){
		 echo $row['Name'];
		?> &nbsp 6:00PM<br> <?php
		}				
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result18);
		if( $row[$temp[18]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 6:30PM<br> <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result19);
		if( $row[$temp[19]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 7:00PM<br>  <?php
		}		
}

for ($currentAppointment=1;$currentAppointment<=20;++$currentAppointment){ 		
		$row=mysqli_fetch_assoc($result20);
		if( $row[$temp[20]]=="yes"){
		 echo $row['Name'];
		?>  &nbsp 7:30PM<br>  <?php
		}		
}


	
	
	

}

?>
<br><br>
<form action="checkapps.php" method="POST">
<input type="submit" name="Back" value="Go Back">
</body>
</html>