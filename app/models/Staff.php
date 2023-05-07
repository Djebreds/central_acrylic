<?php 

class Staff extends Model {
    protected $table = 'staffs';
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function checkStaffID($data) {
        $query = "SELECT * FROM {$this->table} WHERE staff_ID = '{$data}'";
        $this->db->query($query);

        return $this->db->first();
    }

    public function staff() {
        $query = "SELECT * FROM {$this->table} WHERE division = 'staff' AND staff_ID != '{$_SESSION['staff_ID']}'";
        $this->db->query($query);

        return $this->db->all();
    }

    public function admin() {
        $query = "SELECT * FROM {$this->table} WHERE division = 'admin' AND staff_ID != '{$_SESSION['staff_ID']}' ";
        $this->db->query($query);

        return $this->db->all();
    }

    public function checkStaffByID($data) {
        $query = "SELECT * FROM {$this->table} WHERE id = '{$data}'";
        $this->db->query($query);

        return $this->db->first();
    }

    public function create($data) {
        $query = "INSERT INTO {$this->table} (`name`, `staff_ID`, `division`, `password`) 
                VALUES (:name, :staff_ID, :division, :password)";

        $this->db->query($query);
        $this->db->bind('name', Validate::validates($data['name']));
        $this->db->bind('staff_ID', Validate::validates($data['staff_ID']));
        $this->db->bind('division', Validate::validates($data['division'] == 'admin' ? 'admin' : 'staff'));
        $this->db->bind('password', password_hash('root', PASSWORD_DEFAULT));
        
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
                 name = :name, staff_ID = :staff_ID, 
                 division = :division, password = :password, 
                 updated_at = :updated_at WHERE id = :id";
        
        $currentStaff = $this->checkStaffByID($data['id']);

        $this->db->query($query);
        $this->db->bind('name', Validate::validates($data['name']));
        $this->db->bind('staff_ID', Validate::validates($data['staff_ID']));
        $this->db->bind('division', Validate::validates($data['division'] == 'admin' ? 'admin' : 'staff'));
        $this->db->bind('id', Validate::validates($data['id']));
        if ($data['password'] == $currentStaff['password']) {
            $this->db->bind('password', $currentStaff['password']);
        } else {
            $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        }
        
        $this->db->bind('updated_at', Validate::validates(date('y-m-d h:i:s', time())));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePassword($data) {
        $query = "UPDATE {$this->table} SET password = :password, updated_at = :updated_at WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('password', password_hash($data['new_password'], PASSWORD_DEFAULT));
        $this->db->bind('id', Validate::validates($data['id']));
        $this->db->bind('updated_at', Validate::validates(date('y-m-d h:i:s', time())));

        $this->db->execute();

        return $this->db->rowCount();
    }
}