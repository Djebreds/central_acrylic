<?php 

class Product extends Model {
    protected $table = 'products';
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCodeByID($id) {
        $query = "SELECT code FROM {$this->table} WHERE id = '$id'";
        $this->db->query($query);

        return $this->db->first();
    }

    public function checkProductCode($data) {
        $query = "SELECT * FROM {$this->table} WHERE code = '$data'";
        $this->db->query($query);

        return $this->db->first();
    }

    public function create($data) {
        $query = "INSERT INTO {$this->table} (`name`, `code`) 
                VALUES (:name, :code)";

        $this->db->query($query);
        $this->db->bind('name', Validate::validates($data['name']));
        $this->db->bind('code', Validate::validates($data['code']));
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', Validate::validates($id));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->first();
    }

    public function update($data) {
        $query = "UPDATE {$this->table} SET 
                 name = :name, code = :code, 
                 updated_at = :updated_at WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('name', Validate::validates($data['name']));
        $this->db->bind('code', Validate::validates($data['code']));
        $this->db->bind('id', Validate::validates($data['id']));
        $this->db->bind('updated_at', Validate::validates(date('y-m-d h:i:s', time())));

        $this->db->execute();

        return $this->db->rowCount();
    }
}