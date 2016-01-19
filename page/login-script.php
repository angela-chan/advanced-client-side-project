<?php //
//
//$login=array_key_exist(user_id,email, phone_number, first_name, last_name, $GET )
//
//log out function

$cmd = Utils::getUrlparam('cmd');
if($cmd==="login"){
    $user_id = 1;
    
    $role = 'admin';
    //$role = 'customer';
    $_SESSION["role"]=$role;
    
$_SESSION["user_id"]=$user_id;
Utils::redirect("home");
}else if ($cmd === 'logout'){
    session_destroy();
    session_unset();
    Utils::redirect("home");
}