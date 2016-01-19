<?php



/**
 * Description of foodOrerDao
 *
 *get database
 */
class FoodOrderDao {

    private $db = null;

    public function __destruct() {
        $this->db = null;
    }

    function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig('db');
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error:' . $ex->getMessage());
        }
        return $this->db;
    }
//loading data from foor_order table
    public function insert(FoodOrder $foodOrder) {
        //needs changing
        //$now = new DateTime();
        $foodOrder->setOrderId(null);
        //$flightBooking->setCreatedOn($now);
        //$flightBooking->setLastModifiedOn($now);
        $foodOrder->setStatus(FoodOrder::PENDING);
        //   $sql = 'INSERT INTO food_order (order_id, user_id, full_name, email, phone_number, product_id, status)
        //           VALUES (:order_id, :user_id, :full_name, :email, :phone_number, :product_id, :status)';
         $sql = '
             INSERT INTO food_orders (order_id, user_id, full_name, phone_number, email, product_id, status)
             VALUES (:order_id, :user_id, :full_name, :phone_number, :email, :product_id, :status)';
        return $this->execute($sql, $foodOrder);
    }

    /**
     * @return Todo
     * @throws Exception
     * update function
     */
    private function update(FoodOrder $foodOrder) {
        //$todo->setLastModifiedOn(new DateTime());
        $sql = '
            UPDATE food_orders SET
            
                user_id = :user_id,
                full_name = :full_name,
                
                phone_number = :phone_number,
                email = :email,
                product_id = :product_id,
                
                status = :status
            WHERE
                order_id = :order_id';
                 
        return $this->execute($sql, $foodOrder);
    }

    public function save(FoodOrder $foodOrder) {
        if ($foodOrder->getOrderId() !== null) {
            $this->update($foodOrder);
        } else {
            $this->insert($foodOrder);
        }
    }

    /**
     * find user and order id when selecting order.
     */
    public function findByUserId($userId) {
        $row = $this->query('SELECT * FROM food_orders WHERE user_id = ' . (int) $userId)->fetch();
        if (!$row) {
            return null;
        }
        $foodOrder = new FoodOrder();
        FoodOrderMapper::map($foodOrder, $row);
        return $foodOrder;
    }
    
//        public function findByProductId($productId) {
//        $row = $this->query('SELECT * FROM food_orders WHERE product_id = ' . (int) $productId)->fetch();
//        if (!$row) {
//            return null;
//        }
//        $foodOrder = new FoodOrder();
//        FoodOrderMapper::map($foodOrder, $row);
//        return $foodOrder;
//    }


public function findByOrderId($orderId) {
        $row = $this->query('SELECT * FROM food_orders WHERE order_id = ' . (int) $orderId)->fetch();
        if (!$row) {
            return null;
        }
        $foodOrder = new FoodOrder();
        FoodOrderMapper::map($foodOrder, $row);
        return $foodOrder;
    }
    /**
     *table joint - product & foodOrder
     */
    public function find() {
        $result = array();
        // $sql = 'SELECT order_id, user_id, full_name, email, phone_number, product_id, date FROM food_orders WHERE '
        //         . 'status = "'.$status.'";';
           $sql = 'SELECT f.order_id, f.user_id, f.full_name, f.email, f.product_id,f.date, f.phone_number, p.product_name FROM food_orders f, products p WHERE '
                    . 'f.product_id = p.product_id AND f.status != "voided";';
        foreach ($this->query($sql) as $row) {
            $foodOrder = new ProductOrder();
            FoodOrderMapper::map($foodOrder, $row);
            $result[$foodOrder->getUserId()] = $foodOrder;
        }
        return $result;
    }
    //private function joint($sql, FoodOrder $foodOrder){
//    $sql = 'SELECT food_order, f.product_id, f.phone_number' FROM food_order f, products p WHERE '. 'f.product_id = "'.p.product_id.'";';
//WHERE f=p_id AND f.status
//where f.product_id = p.product_id
//='"$status"'.';
//}

    /**
     * @return PDOStatement
     */
    private function query($sql) {
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb()->errorInfo());
        }
        return $statement;
    }

    /**
     * @return FoodOrder
     * @throws Exception
     */
    private function execute($sql, FoodOrder $foodOrder) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($foodOrder));
        if (!$foodOrder->getUserId()) {
            return $this->findByUserId($this->getDb()->lastInsertUserId());
        }
        if (!$statement->rowCount()) {
            throw new NotFoundException('TODO with User ID "' . $foodOrder->getUserId() . '" does not exist.');
        }
        return $foodOrder;
    }

    private function getParams(FoodOrder $foodOrder) {
        // var_dump($foodOrder);
        // die();
        $params = array(
           
            ':order_id' => $foodOrder-> getOrderId(),
            ':user_id' => $foodOrder-> getUserId(),
             ':full_name' => $foodOrder-> getFullName(),
             ':email' => $foodOrder -> getEmail(),
             ':phone_number' => $foodOrder -> getPhoneNumber(),
             ':product_id' => $foodOrder -> getProductId(),
            
             ':status' => $foodOrder->getStatus(),
            // ':date' => $date -> getDate(),
        );
//        if ($flightBooking->getId()) {
//            // unset created date, this one is never updated
//            unset($params[':created_on']);
//        } 

        return $params;
    }

    private function executeStatement(PDOStatement $statement, array $params) {
//        var_dump($statement);
//        var_dump($params);
//        die();
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
    }

    private static function throwDbError(array $errorInfo) {
        // TODO log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

    private static function formatDateTime(DateTime $date) {
        return $date->format(DateTime::ISO8601);
    }
}

//private function joint($sql, FoodOrder $foodOrder){
//    $sql = 'SELECT food_order, product_id, phone_number'
//FROM food_order f. product_id p
//WHERE f=p_id AND f.status
//='"$status"'.';
//}