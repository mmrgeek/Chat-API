<?php
include 'DB.php';
$data = file_get_contents("php://input");
$obj = json_decode($data);
$db = DB::getInstance();
header('Content-Type: application/json');
if(!isset($obj->{'room_id'}))
    print "{\"status\":0,\"message\":\"Room id  is Missing !\"}" ;
else if(!isset($obj->{'user_id'}))
    print "{\"status\":0,\"message\":\"User id is Missing !\"}" ;
else if(!isset($obj->{'user_name'}))
    print "{\"status\":0,\"message\":\"Username is Missing !\"}" ;
else if(!isset($obj->{'type'}))
    print "{\"status\":0,\"message\":\"type is Missing !\"}" ;
else if(!isset($obj->{'content'}))
    print "{\"status\":0,\"message\":\"Content is Missing !\"}" ;
else{
    $room_id = $obj->{'room_id'};
    $user_id = $obj->{'user_id'};
    $user_name = $obj->{'user_name'};
    $type = $obj->{'type'};
    $content = $obj->{'content'};
    $insertnewmessage = $db->insert('messages',[
        'room_id' => $room_id,
        'user_id' => $user_id,
        'user_name' => $user_name,
        'type' => $type,
        'content' => $content
    ]);
    if($insertnewmessage)
             print "{\"status\":1,\"message\":\"Message Add Successfully !\"}" ;
    else
            print "{\"status\":0,\"message\":\"Error While Adding Message !\"}" ;
}
