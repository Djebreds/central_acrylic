<?php 

class Division extends Model {
    protected $table = 'divisions';
    protected $db;

    public function __construct() {
        date_default_timezone_set('Asia/Jakarta');

        $this->db = new Database;
    }
    
    public function getIDByName($name) {
        $query = "SELECT id FROM {$this->table} WHERE name = '{$name}'";

        $this->db->query($query);

        return $this->db->first();
    }
}