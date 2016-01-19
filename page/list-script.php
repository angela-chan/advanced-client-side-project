<?php
//order list script
//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);
//
$dao = new FoodOrderDao();

// data for template
$title = 'Orders';
$foodOrders = $dao->find();

