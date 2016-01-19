<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
mapping these 3 items from the table
 */
class ProductMapper {

    public static function map(Product $product, array $properties) {
        if (array_key_exists('product_id', $properties)) {
            $product->setProductId($properties['product_id']);
        }

        if (array_key_exists('product_name', $properties)) {
        $product->setProductName($properties['product_name']);
        }
        if (array_key_exists('price', $properties)) {
            $product->setPrice($properties['price']);

           
           
            }
        
    }

}