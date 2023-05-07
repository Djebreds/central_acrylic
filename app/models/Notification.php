<?php 

class Notification extends Model {
    protected $table = 'products';
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function get() {
        $query = "SELECT 
                notifications.division, notifications.message, products.code, notifications.status FROM notifications
                INNER JOIN products ON products.id = notifications.id_product
                WHERE MONTH(notifications.created_at) = MONTH(now())";

        $this->db->query($query);

        return $this->db->all();
    }

    public function getNotification() {
        $query = "SELECT notifications.id, notifications.message, notifications.division, staffs.name, notifications.status, orders.code, notifications.created_at FROM notifications
                  JOIN orders ON notifications.id_order = orders.id
                  JOIN staffs ON notifications.id_staff = staffs.id
                  LEFT JOIN notification_readers ON notifications.id = notification_readers.id_notification AND notification_readers.id_staff = :id_staff WHERE notification_readers.id_staff IS NULL OR notification_readers.read_at < notifications.created_at
                  ORDER BY notifications.id DESC";

        $this->db->query($query);
        $this->db->bind('id_staff', $_SESSION['id']);
        
        return $this->db->all();
    }

    public function setNotification($data) {
        $query = "INSERT INTO notifications (`id_order`, `id_staff`, `division`, `message`, `created_at`) 
                  VALUES (:id_order, :id_staff, :division, :message, CURRENT_TIMESTAMP())";

        $this->db->query($query);
        $this->db->bind('id_order', $data['id_order']);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('division', $data['division']);
        $this->db->bind('message', $data['message']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function checkNotifications($data) {
        $query = "SELECT COUNT(*) AS count FROM notifications n LEFT JOIN notification_readers nr ON n.id = nr.id_notification AND nr.id_staff = :id_staff WHERE nr.id_staff IS NULL OR nr.read_at < n.created_at";

        $this->db->query($query);
        $this->db->bind('id_staff', $data['id_staff']);

        return $this->db->first();
    }

    public function markNotifications($data) {
        $query = "INSERT INTO notification_readers (id_staff, id_notification, is_read, read_at)
                    SELECT :id_staff, id, :is_read, NOW() FROM notifications
                    WHERE id NOT IN (SELECT id_notification FROM notification_readers WHERE id_staff = :id_staff)";

        $this->db->query($query);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('is_read', $data['is_read']);
        $this->db->execute();

        return $this->db->rowCount();
    }

}