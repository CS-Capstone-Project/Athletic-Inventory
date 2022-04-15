<?php 
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';

##################################### Index Page Functions ##############################################
function selectMensSports($conn){

    $sql = "SELECT Sport, RelatedInventoryName FROM `0_sports` WHERE Type='Men''s'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

}
function selectWomensSports($conn){

    $sql = "SELECT Sport, RelatedInventoryName FROM `0_sports` WHERE Type='Women''s'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

}
################################################## Login and Account Management Functions #############################################
function selectEmailToLogin($conn, $email){

    $sql = "SELECT id, pass FROM active_accounts where email=? limit 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

}
function selectActiveAccounts($conn){

    $sql = "SELECT first_name, last_name, email, id, perm FROM `active_accounts`";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

}

function selectInactiveAccounts($conn){

    $sql = "SELECT first_name, last_name, email, id FROM `pending_accounts`";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

}

function selectDeletedAccounts($conn){

    $sql = "SELECT first_name, last_name, email, account_id FROM `pending_deletion`";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

}

function denyRequest($conn, $id){

    $sql = "DELETE FROM pending_accounts WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");
    return $result;

}

function acceptRequest($conn, $id){
    $sql = "SELECT * FROM pending_accounts WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    
    $sql = "INSERT INTO active_accounts (first_name, last_name, email, pass) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ssss", $row['first_name'],$row['last_name'],$row['email'],$row['pass']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $sql = "DELETE FROM pending_accounts WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");
    #return $result;

}

function changeToAdmin($conn, $id){

    $sql = "UPDATE active_accounts SET perm = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");
    return $result;

}
function changeToManager($conn, $id){
    $sql = "SELECT * FROM active_accounts WHERE perm = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) < 4){ return; }

    $sql = "UPDATE active_accounts SET perm = 0 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");
    return $result;

}

function requestAccount($conn, $firstName, $lastName, $email, $hash){

    $sql = "INSERT INTO pending_accounts (first_name, last_name, email, pass) values (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $hash);
    $stmt->execute();
    $result = $stmt->get_result();
    //header("Location: login.php");
    //return $result;

}

function moveToDelete($conn, $id){
    $sql = "SELECT * FROM active_accounts WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    
    $sql = "INSERT INTO pending_deletion (first_name, last_name, email, pass) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ssss", $row['first_name'],$row['last_name'],$row['email'],$row['pass']);
    $stmt->execute();
    $result = $stmt->get_result();

    $sql = "SELECT * FROM pending_deletion";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 5){
                $sql = "SELECT MIN(account_id) AS toDelete FROM pending_deletion";
            
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = mysqli_fetch_assoc($result);
            
                $sql = "DELETE FROM pending_deletion WHERE account_id = ?";
            
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $row['toDelete']);
                $stmt->execute();
                $result = $stmt->get_result();
        }
    
    $sql = "DELETE FROM active_accounts WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");
    return $result;

}

function reinstateAccount($conn, $id){

    $sql = "SELECT * FROM pending_deletion WHERE account_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    
    $sql = "INSERT INTO active_accounts (first_name, last_name, email, pass) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ssss", $row['first_name'],$row['last_name'],$row['email'],$row['pass']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $sql = "DELETE FROM pending_deletion WHERE account_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");
    #return $result;

}
########################## Equipment Functions #######################################################################################################
function getAll($conn, $tableName){

$sql = "SELECT * FROM sports_equipment WHERE sports_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tableName);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function searchForItem($conn, $tableName, $search){

    $likeVar = "%" . $search . "%";

    $sql = "SELECT * FROM sports_equipment WHERE item_name LIKE ? AND sports_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $likeVar, $tableName);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function getClothes($conn, $tableName){

$sql = "SELECT * FROM sports_equipment WHERE sports_id = ? AND Type = 'Clothing'";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tableName);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function getShoes($conn, $tableName){

$sql = "SELECT * FROM sports_equipment WHERE sports_id = ? AND Type = 'Shoes'";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tableName);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function getMisc($conn, $tableName){

$sql = "SELECT * FROM sports_equipment WHERE sports_id = ? AND Type = 'Misc'";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tableName);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
################################ Adding Items ################################################################
function addClothingItem($conn, $tableName, $item_id, $item_name, $color, $price, $small, $medium, $large, $xl, $xxl, $quantity, $date_purch){
    $item_Type = "Clothing";

    $sql = "INSERT INTO sports_equipment (item_name, quantity, color, small, medium, large, xl, xxl, price, Type, date_purch, sports_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisiiiiidsss", $item_name, $quantity, $color, $small, $medium, $large, $xl, $xxl, $price, $item_Type, $date_purch, $tableName);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");

}
function addShoe($conn, $tableName, $item_name, $color, $price, $date, $six, $sixhalf, $seven, $sevenhalf, $eight, $eighthalf, $nine, $ninehalf, $ten, $tenhalf, $eleven, $elevenhalf, $twelve, $other){
    $item_type = "Shoes";

    $sql = "INSERT INTO sports_equipment (price, item_name, quantity, color, sz6, sz65, sz7, sz75, sz8, sz85,
     sz9, sz95, sz10, sz105, sz11, sz115, sz12, other, Type, date_purch, sports_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsisiiiiiiiiiiiiissss", $price, $item_name, $quantity, $color, $six, $sixhalf, $seven, $sevenhalf, $eight, $eighthalf, $nine, 
    $ninehalf, $ten, $tenhalf, $eleven, $elevenhalf, $twelve, $other, $item_type, $date, $tableName);
    
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");


}
function addMisc($conn, $tableName, $item_name, $color, $price, $date, $other, $quantity){
    $item_type = "Misc";

    $sql = "INSERT INTO sports_equipment (item_name, quantity, color, price, Type, date_purch, sports_id, other) values (?, ?, ?, ?, ?, ?, ?, ?)";
     
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisdssss", $item_name, $quantity, $color, $price, $item_type, $date, $tableName, $other);
    
    $stmt->execute();
    $result = $stmt->get_result();
    header("Refresh:0");

} 
function editClothingItem($conn, $tableName, $item_id, $item_name, $color, $price, $small, $medium, $large, $xl, $xxl, $quantity, $date_purch){
    $item_type = "Clothing";

    $sql = "delete from sports_equipment where item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    $sql = "INSERT INTO sports_equipment (item_id, item_name, quantity, color, small, medium, large, xl, xxl, price, Type, date_purch, sports_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isisiiiiidsss", $item_id, $item_name, $quantity, $color, $small, $medium, $large, $xl, $xxl, $price, $item_type, $date_purch, $tableName); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    header("Refresh:0");
}
function editShoes($conn, $tableName, $item_id_shoe, $item_name_shoe, $color_shoe, $price_shoe, $date, $six, $sixhalf, $seven, $sevenhalf, $eight, $eighthalf, $nine, $ninehalf, $ten, $tenhalf, $eleven, $elevenhalf, $twelve){
    $item_type = "Shoes";
    
    
    $sql = "delete from sports_equipment where item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id_shoe); 
    $stmt->execute();
    $result = $stmt->get_result();

    $sql = "INSERT INTO sports_equipment (item_id, item_name, color, price, sz6, sz65,sz7, sz75,sz8, sz85,sz9, sz95,sz10, sz105,sz11,sz115,sz12, Type, date_purch, sports_id) 
    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdiiiiiiiiiiiiisss", $item_id_shoe, $item_name_shoe, $color_shoe, $price_shoe,
                                              $six, $sixhalf, $seven, $sevenhalf, $eight, $eighthalf, $nine, $ninehalf, $ten, $tenhalf, $eleven, $elevenhalf, $twelve, 
                                              $item_type, $date, $tableName); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    header("Refresh:0");

}
function editMisc($conn, $tableName, $item_id_misc, $item_name_misc, $color_misc, $price_misc, $date_misc, $other_misc, $quantity_misc){

    $item_type = "Misc";

    $sql = "delete from sports_equipment where item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id_misc); 
    $stmt->execute();
    $result = $stmt->get_result();

    $sql = "INSERT INTO sports_equipment (item_id, item_name, color, quantity, date_purch, Type, other, sports_id, price) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississssd", $item_id_misc, $item_name_misc, $color_misc, $quantity_misc, $date_misc, $item_type, $other_misc, $tableName, $price_misc); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    header("Refresh:0");

}

?>