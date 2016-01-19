<?php

class Utils {

    public static function createLink($page, array $params = array()) {
        $mergedParams = array_merge(array('page' => $page), $params);
        return 'index.php?' . http_build_query($mergedParams);
    }

    public static function redirect($page, array $params = array()) {
        header('Location: ' . self::createLink($page, $params));
        die();
    }

    public static function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES . ENT_QUOTES);
    }

    public static function getUrlParam($param) {
        if (!array_key_exists($param, $_GET)) {
            throw new NotFoundException('URL parameter ' . $param . ' not found.');
        }
        return $_GET[$param];
    }

    /**
     * Get {@link FlightBooking} by the identifier 'id' found in the URL.
     * @return FlightBooking {@link FlightBooking} instance
     * @throws NotFoundException if the param or {@link FlightBooking} instance is not found
     */
    public static function getFoodOrderByGetId() {
        $orderId = null;
        try {
            $orderId = self::getUrlParam('id');
        } catch (Exception $ex) {
            throw new NotFoundException('No FoodOrder identifier provided.');
        }
        if (!is_numeric($orderId)) {
            throw new NotFoundException('Invalid FoodOrder identifier provided.');
        }
        $dao = new FoodOrderDao();
        $foodOrder= $dao->findByOrderId($orderId);
        if ($foodOrder === null) {
            throw new NotFoundException('Unknown FoodOrder identifier provided.');
        }
        return $foodOrder;
    }

    /**
     * Capitalize the first letter of the given string
     * @param string $string string to be capitalized
     * @return string capitalized string
     */
    public static function capitalize($string) {
        return ucfirst(mb_strtolower($string));
    }

    /**
     * Format date and time.
     * @param DateTime $date date to be formatted
     * @return string formatted date and time
     */
    public static function formatDateTime(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('d/m/Y H:i:s');
        //date('d-m-Y H:i:s', strtotime('2011-04-11 19:31:30'));
    }

}
