<?php 

class Model {
    protected $table = null;
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function get() {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->all();
    }

    public function where($column, $data) {
        $query = "SELECT * FROM {$this->table} WHERE {$column} = {Validate::validates($data}";
        $this->db->query($query);

        return $this->db->all();
    }

    public function first() {
        $query = "SELECT * FROM {$this->table} WHERE created_at <= CURRENT_TIMESTAMP() LIMIT 1";
        $this->db->query($query);

        return $this->db->first();
    }

    public function last() {
        $query = "SELECT * FROM {$this->table} WHERE created_at => CURRENT_TIMESTAMP() LIMIT 1";
        $this->db->query($query);

        return $this->db->first();
    }
}