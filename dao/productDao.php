<?php
class ProductDao {

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




public function findByProductId($productId) {
        $row = $this->query('SELECT * FROM products WHERE product_id = ' . (int) $productId)->fetch();
        if (!$row) {
            return null;
        }
        $product = new Product();
        ProductMapper::map($product, $row);
        //unsure whether is product or foodOrder
        return $product;
    }
    /**find by item from the products table, matching up with product id, name and price. 
     */
    public function find($status = null) {
        $result = array();
        $sql = 'SELECT product_id, product_name, price FROM products;';

        foreach ($this->query($sql) as $row) {
           
            $product = new Product();
            ProductMapper::map($product, $row);
            $result[$product->getProductId()] = $product;
        }
        return $result;
    }

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

  

    private static function throwDbError(array $errorInfo) {
        // TODO log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

}

