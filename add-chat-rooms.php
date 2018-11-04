<?php
    include 'DB.php';
    $data = json_decode(file_get_contents("php://input"));
    $db = DB::getInstance();
    header('Content-Type: application/json');
    if(!isset($data->{'room_name'}))
        print "{\"status\":0,\"message\":\"room name is missing\"}";
    else if(!isset($data->{'room_desc'}))
        print "{\"status\":0,\"message\":\"room description is missing\"}";
    else{
        $room_name = $data->{'room_name'};
        $room_desc = $data->{'room_desc'};

        $insert = $db->table('rooms')->insert(['room_name'=>$room_name,'room_desc'=>$room_desc]);
        if($insert)
            print "{\"status\":1,\"message\":\"room added successfully\"}";
        else
            print "{\"status\":0,\"message\":\"failed to add room\"}";
    }
