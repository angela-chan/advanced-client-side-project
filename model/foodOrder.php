<?php

/**
 * Description of FoodOrder
 * class foodOrder 
 *
 * @author richard_lovell
 */
class FoodOrder {

    private $orderId;
    private $userId;
    private $fullName;
    private $email;
    private $phoneNumber;
    private $productId;
    private $date;
 //   private $pickupTime;
    private $status = self::PENDING;

    const PENDING = 'pending';
    const ACTIVE = 'active';
    const VOIDED = 'voided';


    function getProductName() {
        return $this->productName;
    }

    function setProductName($productName){
        $this -> productName = $productName;
    }

    function getOrderId(){
        return $this -> orderId;
    }
    function getUserId() {
    return $this->userId;
    }

    function getFullName() {
        return $this->fullName;
    }

  
 
    function setOrderId($orderId){
        $this -> orderId = $orderId;
    }

        function setUserId($userId) {

        $this->userId = $userId;
        
    }
    
    function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    function getEmail(){
       return $this ->email;
    }
            function setEmail($email){
        $this ->email = $email;
    }

        function getPhoneNumber(){
       return $this ->phoneNumber;
    }
    
    function setPhoneNumber($phoneNumber){
        $this ->phoneNumber = $phoneNumber;
    }
    
    function getProductId(){
        return $this -> productId;
    }
    function setProductId($productId){
        $this -> productId = $productId;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
        
    //      function getPickupTime(){
    //         return $this -> pickupTime;
    //     }
        
    //     function setPickupTime($pickupTime){
    //         $this -> pickupTime = $pickupTime;
    //     }
    // }

}

    public static function allStatuses() {
        return array(
            self::PENDING,
            self::ACTIVE,
            self::VOIDED
        );
    }
    function getDate() {
        return $this-> date;
    }

    function setDate($date) {
        $this->date = $date;
    }
       
    
}

