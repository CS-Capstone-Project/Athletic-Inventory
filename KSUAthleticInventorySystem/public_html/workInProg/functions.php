<?php

session_start();

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

function logout(){
session_unset();
session_destroy();
header("Location: login.php");
die;

}
function afk_kill(){

	$inactive = 60;
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['start'];
		if($session_life > $inactive)
			{ session_destroy(); header("Location: login.php"); }
	}
	$_SESSION['timeout'] = time();
	die;
}

function checkPermission ($conn){
	
	if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
		
		if ($_SESSION['id'] == "Guest"){

				echo "You are in view mode";
				return false;
				die;
			
		}
		else{
				$sql = "SELECT perm, first_name, last_name FROM active_accounts where id='$id' limit 1";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				
				if ( $row['perm'] == 1 ){
					return "Admin";
					die;
				}
				else if ( $row['perm'] == 0 ){
					return "Manager";
					die;
				}
		}

	}

	else{
		header("Location: index.php");
	}

}




?>