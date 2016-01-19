<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
load userMapper
 */
class UserMapper {

    public static function map(Product $user, array $properties) {
        if (array_key_exists('user_id', $properties)) {
            $user->setUserId($properties['user_id']);
        }

        if (array_key_exists('first_name', $properties)) {
        $user->setFirstName($properties['first_name']);
        }
        if (array_key_exists('last_name', $properties)) {
        $user->setLastName($properties['last_name']);
        }
        if (array_key_exists('email', $properties)) {
            $user->setEmail($properties['email']);
 
         }
        if (array_key_exists('phone_number', $properties)) {
        $user->setPhoneNumber($properties['phone_number']);
 
        }
//        if (array_key_exists('product_name', $properties)) {
//        $user->setProductName($properties['product_name']);
// 
//        }

    }

}