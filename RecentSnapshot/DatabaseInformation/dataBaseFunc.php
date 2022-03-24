<?php 
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';

function selectAllItems($conn, $sportid){
    $sql = "SELECT item_name, color, price, small, medium, large, xl, xxl, quantity, date_purch FROM equipment WHERE sport_id = $sportid";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function selectItemByType($conn, $sportid, $type){
    $sql = "SELECT item_name, color, price, small, medium, large, xl, xxl, quantity, date_purch FROM equipment WHERE sport_id = $sportid AND item_type = $type";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


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



?>