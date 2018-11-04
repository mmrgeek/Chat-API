<?php
include 'DB.php';
$db = DB::getInstance();
header('Content-Type: application/json');
if(!isset($_POST['room_id'])){
    print "{\"status\":0,\"message\":\" room id is missing !\"}" ;
}else{
    $room_id = $_POST['room_id'];
    echo $db->table("messages")->where('room_id',$room_id)->limit(25)->get();
}
