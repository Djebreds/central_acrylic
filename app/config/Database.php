<?php 

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $name = DB_NAME;

    private $db;
    private $query;

    // initialize the database
    public function __construct() {
        $dsn = "mysql:host=". $this->host . ";dbname=" . $this->name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->db = new PDO($dsn, $this->user, $this->password, $option);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    // get query parameters
    public function query($sql) {
        $this->query = $this->db->prepare($sql);
    }

    // binding parameter & value to avoid SQL injection
    public function bind($params, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default: 
                    $type = PDO::PARAM_STR;
            }
        }
        $this->query->bindValue($params, $value, $type);
    }

    // execute the query
    public function execute() {
        $this->query->execute();
    }

    // get all data from database
    public function all() {
        $this->execute();
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }

    // get single data from database
    public function first() {
        $this->execute();
        return $this->query->fetch(PDO::FETCH_ASSOC);
    }

    // counting row
    public function rowCount() {
        return $this->query->rowCount();
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
}