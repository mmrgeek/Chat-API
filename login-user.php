<?php
include 'DB.php';
$data = file_get_contents("php://input");
$obj = json_decode($data);
$db = DB::getInstance();
header('Content-Type: application/json');
if(!isset($obj->{'email'}))
    print "{\"status\":0,\"message\":\"Email is Missing !\"}" ;
else if(!isset($obj->{'password'}))
    print "{\"status\":0,\"message\":\"Password is Missing !\"}" ;
else{
    $useremail = $obj->{'email'};
    $userpassword = $obj->{'password'};
    $check_email_password = $db->table('users')
    ->where('user_email','=',$useremail)
    ->where("user_password","=",$userpassword)
    ->select('id,user_name, user_email,is_user_admin')
    ->get()->first();

    if($db->getCount()>0)
             print "{\"status\":1,\"message\":\"Welcome !\",\"user\":$check_email_password}" ;
    else
            print "{\"status\":0,\"message\":\"Error in Email or Password\",\"user\":null}" ;
}
