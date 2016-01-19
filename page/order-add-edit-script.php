<?php
//script of editing the order
$errors = array();
$foodOrder = null;


$edit = array_key_exists('id', $_GET);
if ($edit) {
    $foodOrder = Utils::getFoodOrderByGetId();
} else {
    // set defaults
    $foodOrder = new FoodOrder();
   // $foodOrder ->  setPickupTime( new PickupTime());
    $foodOrder->setDate(new DateTime());
    
    // get product id from GET
    $product_id = $_GET['product_id'];
    $foodOrder -> setProductId($product_id);
    //$flightBooking->setPriority(Todo::PRIORITY_MEDIUM);
    //$dueOn = new DateTime("+1 day");
    //$dueOn->setTime(0, 0, 0);
    //$flightBooking->setDueOn($dueOn);
}


if (array_key_exists('cancel', $_POST)) {
    // redirect
    Utils::redirect('home');
} elseif (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    //pretending to have values in $_POST
    //$data = array('first_name' => 'Bob', 'no_of_passengers' => 2);
    //populate with user data
    $user_id = 1; //get from session
    // get from DB
   // $full_name = 'Bob Smith';
    //$phone_number = '0278839406';
    //$email = 'abc123@hotmail.com';
    
    $foodOrder -> setUserId($user_id);   
    $foodOrder -> setFullName($full_name);
    $foodOrder -> setPhoneNumber($phone_number);
    $foodOrder -> setEmail($email);
    $foodOrder ->setProductId($product_id);
    //set default status
    $foodOrder -> setStatus('PENDING');
    //$foodOrder -> setPickupTime($pickup_time);
    $foodOrder -> setDate(date("Y-m-d H:i:s"));
    
    $status='';
    if(isset($_POST['food_order']['status'])){
    $status = filter_var($_POST['food_order']['status'],FILTER_SANITIZE_STRING);
}else{
    $status= 'PENDING';
}
    
    $data = array(

        'product_id' => $_POST['food_order']['order_list'],
        
        'user_id' => 1,
        'full_name' => 'Bob Smith',
        'email' => 'abc123@hotmail.com',
        'phone_number' => '0278839406',
        
        'date' => date("Y-m-d H:i:s"),
        'status' => $status
        
        //'date' => $_POST['food_order']['date'].' 00:00:00' change to pick up date later
    );
    


    
    
    // var_dump($_POST);
    // die();
    // map
    FoodOrderMapper::map($foodOrder, $data);
    // validate
 //   $errors = FoodOrderValidator::validate($foodOrder);

 //   if (empty($errors)) {
        // save
        $dao = new FoodOrderDao();
        $foodOrder = $dao->save($foodOrder);
        Flash::addFlash('Thank you for ordering with us.');
        // redirect
        Utils::redirect('home');
 //   }
}
    $productDao = new ProductDao();
    
    $product_id = Utils::getUrlParam('product_id');
 
    $products = $productDao -> find();
