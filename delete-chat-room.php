<?php
include 'DB.php';
$db = DB::getInstance();
header('Content-Type: application/json');
if(!isset($_POST['id']))
    print "{\"status\":0,\"message\":\" room id not found !\"}" ;
else{
    $room_id = $_POST['id'];
    $delete_room= $db->delete("chat_rooms")->where("id", $room_id)->exec();
    if($delete_room)
      print "{\"status\":1,\"message\":\"Room Deleted Successfully !\"}" ;
    else
      print "{\"status\":0,\"message\":\"Error While Deleteing Room !\"}" ;

}
