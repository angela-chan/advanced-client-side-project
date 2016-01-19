<?php
class UserDao {

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




public function findByUserId($userId) {
        $row = $this->query('SELECT * FROM users WHERE user_id = ' . (int) $userId)->fetch();
        if (!$row) {
            return null;
        }
        $user = new User();
        UserMapper::map($user, $row);
        return $user;
    }
    /**
  find user's detail by sql
     */
    public function find($status = null) {
        $result = array();
        $sql = 'SELECT user_id, first_name, last_name, email, phone_number FROM products;';
        //product_name

        foreach ($this->query($sql) as $row) {
           
            $user = new User;
            UserMapper::map($user, $row);
            $result[$user->getUserId()] = $user;
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
