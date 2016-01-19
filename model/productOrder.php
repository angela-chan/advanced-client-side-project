<?php

/**
 *product order extends foodOrder, to make two table join.
 */
class ProductOrder extends FoodOrder {

    private $productName;


    function getProductName(){
        return $this -> productName;
    
    }
    function setProductName($productName){
    $this ->productName = $productName;
    }
}