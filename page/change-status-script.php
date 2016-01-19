<?php
//functionality of status change when delete item.
//status of list
//$status = Utils::getUrlParam('status');
//command
$cmd = Utils::getUrlParam('cmd');
$foodOrder = Utils::getFoodOrderByGetId();
$foodOrder->setStatus($cmd);
//if (array_key_exists('comment', $_POST)) {
//    $todo->setComment($_POST['comment']);
//}

$dao = new FoodOrderDao();
$dao->save($foodOrder);
$msg = '';
//if($cmd === FoodOrder::VOIDED){
    $msg = 'Food Order deleted successfully.';
//}
//else{
//    $msg = 'Food Order status changed successfully.';
//}
Flash::addFlash($msg);

Utils::redirect('list');
//array('status' => $status)
