<?php
session_start();
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
function logout(){

session_unset();
session_destroy();
header("Location: login.php");
die;

}
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
function time_out(){

	$inactive = 60;
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['start'];
		if($session_life > $inactive)
			{ session_unset(); session_destroy(); header("Location: login.php"); }
	}
	$_SESSION['timeout'] = time();
	die;
}
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
function check_login($conn){

if(isset($_SESSION['id'])){


$id = $_SESSION['id'];

$sql = "SELECT id, first_name, last_name FROM active_accounts where id='$id' limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if ( $id == $row['id'] ){
$user_data = mysqli_fetch_assoc($result);
return $user_data;
die;
	}


}

else {
header("Location: login.php");
die;
	}
	
}

?>