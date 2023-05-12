<?php 

class Order extends Model {
    protected $table = 'orders';
    protected $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function get() {
        $query = "SELECT 
                orders.code, 
                staffs.name, 
                (SELECT name FROM process_machines WHERE id = order_process.id_process_machine) AS current_process,
                orders.status,
                order_details.order_file,
                (SELECT name FROM process_machines WHERE id = op.id_process_machine) AS next_process,
                latest_status.updated_at
            FROM orders
            INNER JOIN order_details ON order_details.id_order = orders.id
            INNER JOIN order_status ON order_status.id_order_detail = order_details.id
            INNER JOIN order_process ON order_process.id_order_detail = order_details.id AND order_process.id_process_machine >= order_status.id_process
            INNER JOIN process_machines ON process_machines.id = order_status.id_process OR order_process.id_process_machine > order_status.id_process
            INNER JOIN process_machines ps ON ps.id = order_status.id_process OR order_process.id_process_machine = order_status.id_process
            INNER JOIN order_process op ON op.id_order_detail = order_details.id AND op.id_process_machine >= order_status.id_process + 1
            INNER JOIN staffs ON staffs.id = order_status.id_staff
            INNER JOIN (
                SELECT id_order_detail, MAX(updated_at) AS updated_at 
                FROM order_status
                GROUP BY id_order_detail
            ) AS latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
            GROUP BY orders.code
            ORDER BY latest_status.updated_at DESC
                " ;
    
        $this->db->query($query);
        
        return $this->db->all();
    }

    public function getOrderProduct() {
        $query = "SELECT
            order_details.order_file, orders.status, products.name, order_details.design_file, orders.code, orders.created_at FROM orders
            INNER JOIN order_details ON order_details.id_order = orders.id
            INNER JOIN products ON products.id = order_details.id_product
            WHERE orders.status != 'completed'
            ORDER BY orders.created_at DESC
            ";

        $this->db->query($query);

        return $this->db->all();
    }

    public function getOrderByMonth() {
        $query =  "SELECT 
        orders.code, staffs.name, process_machines.name AS process, order_details.order_file, latest_status.updated_at
        FROM orders
            INNER JOIN order_details ON order_details.id_order = orders.id
            INNER JOIN order_status ON order_status.id_order_detail = order_details.id
            INNER JOIN process_machines ON process_machines.id = order_status.id_process
            INNER JOIN staffs ON staffs.id = order_status.id_staff
            INNER JOIN (SELECT id_order_detail, MAX(updated_at) AS updated_at FROM order_status
                        GROUP BY id_order_detail)
                        latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
            WHERE MONTH(orders.created_at) = MONTH(now())
            ORDER BY orders.code";

        $this->db->query($query);

        return $this->db->all();
    }

    public function getOrderToday() {
        $query =  "SELECT 
        orders.code, staffs.name, process_machines.name AS process, order_details.order_file, latest_status.updated_at
        FROM orders
            INNER JOIN order_details ON order_details.id_order = orders.id
            INNER JOIN order_status ON order_status.id_order_detail = order_details.id
            INNER JOIN process_machines ON process_machines.id = order_status.id_process
            INNER JOIN staffs ON staffs.id = order_status.id_staff
            INNER JOIN (SELECT id_order_detail, MAX(updated_at) AS updated_at FROM order_status
                        GROUP BY id_order_detail)
                        latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
            WHERE DATE(orders.created_at) = CURDATE()
            ORDER BY orders.code";

        $this->db->query($query);

        return $this->db->all();
    }

    public function getProcessing() {
        $query = " SELECT 
            orders.code, staffs.name, process_machines.name AS process, order_details.order_file, latest_status.updated_at
            FROM orders
                INNER JOIN order_details ON order_details.id_order = orders.id
                INNER JOIN order_status ON order_status.id_order_detail = order_details.id
                INNER JOIN order_process ON order_process.id_order_detail = order_details.id AND order_process.id_process_machine > order_status.id_process
                INNER JOIN process_machines ON process_machines.id = order_status.id_process
                INNER JOIN staffs ON staffs.id = order_status.id_staff
                INNER JOIN (
                    SELECT id_order_detail, MAX(updated_at) AS updated_at FROM order_status
                        GROUP BY id_order_detail
                    ) latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
                WHERE orders.status != 'completed'
                ORDER BY orders.code;
                " ;

        $this->db->query($query);
        
        return $this->db->all();
    }

    public function getProcessingByDivision($data) {
        $query = " SELECT 
            orders.code, staffs.name, process_machines.name AS process, order_details.order_file, latest_status.updated_at
            FROM orders
                INNER JOIN order_details ON order_details.id_order = orders.id
                INNER JOIN order_status ON order_status.id_order_detail = order_details.id
                INNER JOIN process_machines ON process_machines.id = order_status.id_process
                INNER JOIN order_divisions ON order_divisions.id_order = orders.id
                INNER JOIN divisions ON divisions.id = order_divisions.id_division
                INNER JOIN staffs ON staffs.id = order_status.id_staff
                INNER JOIN (
                    SELECT id_order_detail, MAX(updated_at) AS updated_at FROM order_status
                        GROUP BY id_order_detail
                    ) latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
                    WHERE divisions.id = (SELECT id FROM divisions WHERE name = :name) AND order_divisions.status != 'complete'
                ORDER BY orders.code;
                " ;

        $this->db->query($query);
        $this->db->bind('name', $data['current_division']);
        
        return $this->db->all();
    }

    public function getFinish() {
        $query = " SELECT 
        orders.code, staffs.name, orders.status AS process, order_details.order_file, latest_status.updated_at
        FROM orders
            INNER JOIN order_details ON order_details.id_order = orders.id
            INNER JOIN order_status ON order_status.id_order_detail = order_details.id
            INNER JOIN process_machines ON process_machines.id = order_status.id_process
            INNER JOIN staffs ON staffs.id = order_status.id_staff
            INNER JOIN (
                SELECT id_order_detail, MAX(updated_at) AS updated_at FROM order_status
                    GROUP BY id_order_detail
                ) latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
            WHERE orders.status = 'completed' 
            GROUP BY orders.code;
            
            " ;

        $this->db->query($query);
        
        return $this->db->all();
    }

    public function getOrderByDivision($data) {
        $query = "SELECT
            order_details.order_file, order_details.design_file, orders.status, order_divisions.status AS status_division, products.name, order_details.design_file, orders.code, orders.created_at FROM orders
            INNER JOIN order_details ON order_details.id_order = orders.id
            INNER JOIN products ON products.id = order_details.id_product
            INNER JOIN order_divisions ON order_divisions.id_order = orders.id
            INNER JOIN divisions ON divisions.id = order_divisions.id_division
            WHERE divisions.id = (SELECT id FROM divisions WHERE name = :name) AND order_divisions.status != 'complete'
            ORDER BY orders.created_at DESC
            ";

        $this->db->query($query);
        $this->db->bind('name', $data['current_division']);

        return $this->db->all();
    }

    public function getOrderFinishByDivision($data) {
        $query = "SELECT 
                    orders.code, 
                    staffs.name, 
                    (SELECT name FROM process_machines WHERE id = order_process.id_process_machine) AS current_process,
                    orders.status,
                    order_details.order_file,
                    order_divisions.status AS division_status,
                    (SELECT name FROM process_machines WHERE id = op.id_process_machine) AS process,
                    latest_status.updated_at
                FROM orders
                INNER JOIN order_details ON order_details.id_order = orders.id
                INNER JOIN order_status ON order_status.id_order_detail = order_details.id
                INNER JOIN order_process ON order_process.id_order_detail = order_details.id AND order_process.id_process_machine >= order_status.id_process
                INNER JOIN process_machines ON process_machines.id = order_status.id_process OR order_process.id_process_machine > order_status.id_process
                INNER JOIN process_machines ps ON ps.id = order_status.id_process OR order_process.id_process_machine = order_status.id_process
                INNER JOIN order_process op ON op.id_order_detail = order_details.id AND op.id_process_machine >= order_status.id_process + 1
                INNER JOIN order_divisions ON order_divisions.id_order = orders.id AND order_divisions.id_division = (SELECT id FROM divisions WHERE name = :name)
                INNER JOIN staffs ON staffs.id = order_status.id_staff
                INNER JOIN (
                    SELECT id_order_detail, MAX(updated_at) AS updated_at 
                    FROM order_status
                    GROUP BY id_order_detail
                ) AS latest_status ON order_status.id_order_detail = latest_status.id_order_detail AND order_status.updated_at = latest_status.updated_at
                WHERE order_divisions.status = 'complete'
                GROUP BY orders.code
                ORDER BY latest_status.updated_at DESC
            " ;

        $this->db->query($query);
        $this->db->bind('name', $data['current_division']);

        return $this->db->all();
    }

    public function checkOrderCode($code) {
        $query = "SELECT code FROM {$this->table} WHERE code = '{$code}'";

        $this->db->query($query);

        return $this->db->first();
    }

    public function show($code) {
        $query = "SELECT orders.code, staffs.name as staff_name, order_details.note, order_status.division, orders.status AS status_order, order_details.description AS detail_description, order_status.description, orders.costumer_name, process_machines.name AS process, 
                order_status.estimate_complete, products.name, order_details.qty, order_status.division, orders.updated_at AS finish_at
                 FROM orders
                 INNER JOIN order_details ON order_details.id_order = orders.id
                 INNER JOIN order_status ON order_status.id_order_detail = order_details.id
                 INNER JOIN process_machines ON process_machines.id = order_status.id_process
                 INNER JOIN products ON products.id = order_details.id_product
                 INNER JOIN staffs ON staffs.id = order_status.id_staff
                 WHERE orders.code = '{$code}'";

        $this->db->query($query);

        return $this->db->all();
    }

    public function getOrderByID($id) {
        $query = "SELECT orders.id, order_details.order_file, order_details.design_file
                FROM orders
                INNER JOIN order_details ON order_details.id_order = orders.id
                INNER JOIN order_status ON order_status.id_order_detail = order_details.id
                INNER JOIN process_machines ON process_machines.id = order_status.id_process
                INNER JOIN products ON products.id = order_details.id_product
                INNER JOIN staffs ON staffs.id = order_status.id_staff
                WHERE orders.id = '{$id}'";

        $this->db->query($query);

        return $this->db->first();
    }

    public function getOrderDivisionByCode($code) {
        $query = "SELECT orders.code, order_divisions.id_order, order_divisions.id_division, divisions.name, order_divisions.status FROM orders
                INNER JOIN order_divisions ON order_divisions.id_order = orders.id
                INNER JOIN divisions ON divisions.id = order_divisions.id_division
                WHERE orders.code = :code";

        $this->db->query($query);
        $this->db->bind('code', $code);

        return $this->db->all();
    }

    public function edit($code) {
        $query = "SELECT
        orders.code AS order_code, orders.id, order_details.id AS id_order_detail, order_details.order_file, GROUP_CONCAT(process_machines.name SEPARATOR ', ') AS process_names, products.name AS product_name, 
        order_details.qty, order_details.description, orders.status, order_details.note, order_details.design_file
        FROM orders
        INNER JOIN order_details ON order_details.id_order = orders.id
        INNER JOIN order_process ON order_process.id_order_detail = order_details.id
        INNER JOIN process_machines ON process_machines.id = order_process.id_process_machine
        INNER JOIN products ON products.id = order_details.id_product
        WHERE orders.code = '{$code}'
        GROUP BY order_details.id
        ORDER BY orders.code ASC";

        $this->db->query($query);

        return $this->db->first();
    }

    public function editByDivision($data) {
        $query = "SELECT
        orders.code AS order_code, order_divisions.status AS division_status, orders.id, order_details.order_file, GROUP_CONCAT(process_machines.name SEPARATOR ', ') AS process_names, products.name AS product_name, 
        order_details.qty, order_details.id AS id_order_detail, order_details.description, orders.status, order_details.note, order_details.design_file
        FROM orders
        INNER JOIN order_details ON order_details.id_order = orders.id
        INNER JOIN order_process ON order_process.id_order_detail = order_details.id
        INNER JOIN process_machines ON process_machines.id = order_process.id_process_machine
        INNER JOIN products ON products.id = order_details.id_product
        INNER JOIN order_divisions ON order_divisions.id_order = orders.id
        INNER JOIN divisions ON divisions.id = order_divisions.id_division 
        WHERE orders.code = :code  AND divisions.id = (SELECT id FROM divisions WHERE name = :name)
        GROUP BY order_details.id, order_divisions.status
        ORDER BY orders.code ASC";

        $this->db->query($query);
        $this->db->bind('code', $data['code']);
        $this->db->bind('name', $data['current_division']);

        return $this->db->first();
    }

    public function create($data) {
        $query = "INSERT INTO {$this->table} (`code`, `costumer_name`) 
                VALUES (:code, :costumer_name)";

        $this->db->query($query);
        $this->db->bind('code', $data['code']);
        $this->db->bind('costumer_name', $data['costumer_name']);

        $this->db->execute();

        $latestOrderID = $this->db->lastInsertId();

        $query = "INSERT INTO order_details (`id_order`, `id_product`, `order_file`, `qty`, `description`, `created_at`, `updated_at`)
        VALUES (:id_order, :id_product, :order_file, :qty, :description, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());";

        $this->db->query($query);
        $this->db->bind('id_order', $latestOrderID);
        $this->db->bind('id_product', $data['product']);
        $this->db->bind('order_file', $data['order_file']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('description', $data['description']);
        $this->db->execute();

        $latestOrderDetailID = $this->db->lastInsertId();

        foreach ($data['machine_process'] as $process) {
            $query = "INSERT INTO order_process (`id_order_detail`, `id_process_machine`) VALUES (:id_order_detail, :id_process_machine)";

            $this->db->query($query);
            $this->db->bind('id_order_detail', $latestOrderDetailID);
            $this->db->bind('id_process_machine', $process);
            $this->db->execute();
        }

        $query = "INSERT INTO order_status (`id_order_detail`, `id_staff`, `id_process`, `division`, `estimate_complete`, `description`, `created_at`, `updated_at`)
                  VALUES (:id_order_detail, :id_staff, :id_process, :division, :estimate_complete, :description, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());";

        $this->db->query($query);
        $this->db->bind('id_order_detail', $latestOrderDetailID);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('id_process', $data['id_process']);
        $this->db->bind('division', $data['division']);
        $this->db->bind('estimate_complete', $data['estimate_complete']);
        $this->db->bind('description', $data['status_description']);
        $this->db->execute();

        $query = "INSERT INTO notifications (`id_order`, `id_staff`, `division`, `message`, `created_at`) 
                  VALUES (:id_order, :id_staff, :division, :message, CURRENT_TIMESTAMP())";

        $this->db->query($query);
        $this->db->bind('id_order', $latestOrderID);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('division', $data['division']);
        $this->db->bind('message', 'telah ditambahkan');
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

    public function update($data) {
        $query = "UPDATE {$this->table}
                INNER JOIN order_details ON order_details.id_order = orders.id
                SET order_details.design_file = :design_file, 
                order_details.note = :note, orders.status = :status, order_details.updated_at = CURRENT_TIMESTAMP(), orders.updated_at = CURRENT_TIMESTAMP()
                WHERE orders.code = :code";
        
        $this->db->query($query);
        $this->db->bind('design_file', $data['design_file']);
        $this->db->bind('note', $data['note']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('code', $data['code']);

        $this->db->execute();

        $id_division = explode(',', $data['id_division']);

        foreach ($id_division as $division) {
            $query = "INSERT INTO order_divisions (`id_order`, `id_division`, `status`) VALUES (:id_order, :id_division, :status)";

            $this->db->query($query);
            $this->db->bind('id_order', $data['id_order']);
            $this->db->bind('id_division', $division);
            $this->db->bind('status', 'initial');
            $this->db->execute();
        }

        $query = "INSERT INTO order_status (`id_order_detail`, `id_staff`, `id_process`, `division`, `estimate_complete`, `description`, `created_at`, `updated_at`)
                  VALUES (:id_order_detail, :id_staff, :id_process, :division, :estimate_complete, :description, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());";

        $this->db->query($query);
        $this->db->bind('id_order_detail', $data['id_order_detail']);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('id_process', $data['id_process']);
        $this->db->bind('division', $data['division']);
        $this->db->bind('estimate_complete', $data['estimate_complete']);
        $this->db->bind('description', $data['description']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function process($data) {
        $query = "UPDATE order_divisions 
                  INNER JOIN divisions ON divisions.id = order_divisions.id_division
                  INNER JOIN orders ON orders.id = order_divisions.id_order
                  SET order_divisions.status = 'processing', orders.updated_at = CURRENT_TIMESTAMP()
                  WHERE order_divisions.id_order = :id AND order_divisions.id_division = (SELECT id FROM divisions WHERE name = :name) ";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('name', $data['current_division']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function complete($data) {
        $query = "UPDATE order_divisions 
                  INNER JOIN divisions ON divisions.id = order_divisions.id_division
                  INNER JOIN orders ON orders.id = order_divisions.id_order
                  SET order_divisions.status = 'complete', orders.updated_at = CURRENT_TIMESTAMP()
                  WHERE order_divisions.id_order = :id AND order_divisions.id_division = (SELECT id FROM divisions WHERE name = :name)";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('name', $data['current_division']);

        $this->db->execute();

        $query = "INSERT INTO notifications (`id_order`, `id_staff`, `division`, `message`, `status`, `created_at`) 
                  VALUES (:id_order, :id_staff, :division, :message, :status, CURRENT_TIMESTAMP())";

        $this->db->query($query);
        $this->db->bind('id_order', $data['id']);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('division', $data['current_division']);
        $this->db->bind('status', 'process');
        $this->db->bind('message', 'telah selesai process');

        $this->db->execute();

        $query = "UPDATE orders
                INNER JOIN order_divisions ON order_divisions.id_order = orders.id
                SET orders.status = 'completed'
                WHERE orders.id = :id_order AND 
                (SELECT COUNT(*) FROM order_divisions WHERE id_order = :id_order) = (SELECT COUNT(*) FROM order_divisions WHERE id_order = :id_order AND status = 'complete')";

        $this->db->query($query);
        $this->db->bind('id_order', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateOrderStatus($data) {
        $query = "INSERT INTO order_status (`id_order_detail`, `id_staff`, `id_process`, `division`, `estimate_complete`, `description`, `created_at`, `updated_at`)
        VALUES (:id_order_detail, :id_staff, :id_process, :division, :estimate_complete, :description, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());";

        $this->db->query($query);
        $this->db->bind('id_order_detail', $data['id_order_detail']);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('id_process', $data['id_process']);
        $this->db->bind('division', $data['current_division']);
        $this->db->bind('estimate_complete', $data['estimate_complete']);
        $this->db->bind('description', 'Pesanan telah diteruskan');
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateProcessOrderStatus($data) {
        $query = "UPDATE order_status SET id_process = :id_process, updated_at = CURRENT_TIMESTAMP() WHERE id_order_detail = :id_order_detail AND updated_at = (SELECT * FROM (SELECT updated_at FROM order_status WHERE id_order_detail = :id_order_detail ORDER BY updated_at DESC LIMIT 1) AS temp)";

        $this->db->query($query);
        $this->db->bind('id_process', $data['id_process']);
        $this->db->bind('id_order_detail', $data['id_order_detail']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function checkPreviousOrderProcessing($data) {
        $query = "SELECT order_divisions.status, order_divisions.id_division, divisions.name FROM orders
                INNER JOIN order_divisions ON orders.id = order_divisions.id_order
                INNER JOIN divisions ON order_divisions.id_division = divisions.id
                WHERE orders.id = (SELECT id FROM orders WHERE code = :code) AND order_divisions.status = 'processing' LIMIT 1";
        
        $this->db->query($query);
        $this->db->bind('code', $data['code']);
        
        return $this->db->first();
    }

    public function updateOrderStatusComplete($data) {
        $query = "INSERT INTO order_status (`id_order_detail`, `id_staff`, `id_process`, `division`, `estimate_complete`, `description`, `created_at`, `updated_at`)
                  SELECT :id_order_detail, :id_staff, :id_process, :division, :estimate_complete, :description, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() FROM orders
                  INNER JOIN order_details ON orders.id = order_details.id_order
                  WHERE orders.id = :id_order AND (SELECT COUNT(*) FROM order_divisions WHERE id_order = :id_order) = (SELECT COUNT(*) FROM order_divisions WHERE id_order = :id_order AND status = 'complete')";

        $this->db->query($query);
        $this->db->bind('id_order', $data['id']);
        $this->db->bind('id_order_detail', $data['id_order_detail']);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('id_process', $data['id_process']);
        $this->db->bind('division', $data['division']);
        $this->db->bind('estimate_complete', $data['estimate_complete']);
        $this->db->bind('description', $data['description']);
        $this->db->execute();

        $query = "INSERT INTO notifications (`id_order`, `id_staff`, `division`, `message`, `status`, `created_at`) 
                  VALUES (:id_order, :id_staff, :division, :message, :status, CURRENT_TIMESTAMP())";

        $this->db->query($query);
        $this->db->bind('id_order', $data['id']);
        $this->db->bind('id_staff', $data['id_staff']);
        $this->db->bind('division', $data['division']);
        $this->db->bind('message', 'telah selesai');
        $this->db->bind('status', 'complete');
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLatestProcess($data) {
        $query = "SELECT id_process FROM order_status
                 WHERE id_order_detail = :id_order_detail
                 ORDER BY updated_at DESC";

        $this->db->query($query);
        $this->db->bind('id_order_detail', $data['id_order_detail']);
        
        return $this->db->first();
    }

}