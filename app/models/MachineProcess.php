<?php 

class MachineProcess extends Model {
    protected $table = 'process_machines';
    protected $db;

    public function __construct() {
        date_default_timezone_set('Asia/Jakarta');

        $this->db = new Database;
    }

    public function get() {
        $query = "SELECT * FROM {$this->table} WHERE code != '00' AND code != '20' AND code != '10'";
        $this->db->query($query);

        return $this->db->all();
    }

    public function getID($id) {
        $query = "SELECT code FROM {$this->table} WHERE id = '{$id}'";
        $this->db->query($query);
        
        return $this->db->first();
    }

    public function getTime($id) {
        $query = "SELECT time FROM {$this->table} WHERE id = '{$id}'";
        $this->db->query($query);

        return $this->db->first();
    }

    public function getIDByName($data) {
        $query = "SELECT id FROM {$this->table} WHERE name = '{$data}'";

        $this->db->query($query);

        return $this->db->first();
    }

}