<?php



/**
 * Description of FlightBookingMapper
 *
 * @author richard_lovell
 * mapping detail from the food order data table
 */
class FoodOrderMapper {

    public static function map(FoodOrder $foodOrder, array $properties) {
//        var_dump($properties);
//        die();
        if (array_key_exists('order_id', $properties)) {
            $foodOrder->setOrderId($properties['order_id']);
        }
        if (array_key_exists('user_id', $properties)) {
        $foodOrder->setUserId($properties['user_id']);
        }
        if (array_key_exists('full_name', $properties)) {
        $foodOrder->setFullName($properties['full_name']);
        }        
        if (array_key_exists('email', $properties)) {
        $foodOrder->setEmail($properties['email']);
        }
        
        if (array_key_exists('product_id', $properties)) {
        $foodOrder->setProductId($properties['product_id']);
        }
        if (array_key_exists('phone_number', $properties)) {
        $foodOrder->setPhoneNumber($properties['phone_number']);
        } 
        
        if (array_key_exists('product_name', $properties)) {
        $foodOrder->setProductName($properties['product_name']);
        }
        
        if (array_key_exists('date', $properties)) {
            $formattedDate = $properties['date'];
            $date = self::createDateTime($formattedDate);
            if ($date) {
                $foodOrder->setDate($date);
                
            }
        }
         
    }

    private static function createDateTime($input) {
        return DateTime::createFromFormat('Y-n-j H:i:s', $input);
//        $date = explode('-', $input);
//        $time = mktime(0, 0, 0, $date[2], $date[1], $date[0]);
//        $mysqldate = date('Y-m-d H:i:s', $time);
//        return $mysqldate;
        //return date('d/m/Y', strtotime($input));
        //return new DateTime($input);//date('Y-m-d H:i:s', strtotime($input));
    }

}

