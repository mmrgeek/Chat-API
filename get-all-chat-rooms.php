<?php
include 'DB.php';
$db = DB::getInstance();
header('Content-Type: application/json');

echo $db->table("chat_rooms")->get();
