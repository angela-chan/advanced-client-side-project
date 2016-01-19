<?php

/**
user model
 */
class User {



    private $userId;
    private $firstName;
    private $lastName;
    private $email;
    private $phoneNumber;
    //private $productName;
    



 
    function geUserId() {
    return $this->userId;
    }
    
    function setUserId($productId){
        $this -> userId = $productId;
    }
    
    function getFirstName(){
        return $this -> firstName;
    
    }
    function setFirstName($firstName){
    $this ->firstName = $firstName;
    }
    function getLastName(){
        return $this -> lastName;
    
    }
    function setlastName($lastName){
    $this ->lastName = $lastName;
    }

    
    function getEmail(){
        return $this -> email;
    }
    function setEmail($email){
        $this -> email = $email;
    }
    function getPhoneNumber(){
        return $this -> phoneNumber;
    }
    function setPhoneNumber($phoneNumber){
        $this -> phoneNumber = $phoneNumber;
    }
//    function getProductName(){
//        return $this -> productName;
//    }
//    function setProductName($productName){
//        $this -> productName = $productName;
//    }

   
        
        //  function getPickupTime(){
        //     return $this -> pickupTime;
        // }
        
        // function setPickupTime($pickupTime){
        //     $this -> pickupTime = $pickupTime;
        // }
    }



