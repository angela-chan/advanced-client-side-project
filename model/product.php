<?php

/**
 * Description of FlightBooking
 *
 * @author richard_lovell
 */
class Product {



    private $productId;
    private $productName;
    private $price;


    function getProductId() {
    return $this->productId;
    }
    
    function setProductId($productId){
        $this ->productId = $productId;
    }
    
    function getProductName(){
        return $this -> productName;
    
    }
    function setProductName($productName){
    $this ->productName = $productName;
    }


    
    function getPrice(){
        return $this -> price;
    }
    function setPrice($price){
        $this -> price = $price;
    }

   }
        
        //  function getPickupTime(){
        //     return $this -> pickupTime;
        // }
        
        // function setPickupTime($pickupTime){
        //     $this -> pickupTime = $pickupTime;
        // }
    



