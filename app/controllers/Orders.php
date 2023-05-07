<?php 


class Orders extends Controller {
    public function index() {
        switch ($_SESSION['division']) {
            case 'Admin' :
                $data['current_division'] = $_SESSION['division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Kasir' :
                $data['current_division'] = $_SESSION['division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin Cutting' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin CNC' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin Print Stiker' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin Print UV' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin Grafir' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin 3D Print' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Mesin Bending & Welding' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
            case 'Operator Assembly' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->get();
                break;
        } 
            
        $data['title'] = 'Data Order';
        $this->view('staff/layouts/header', $data);
        $this->divisionView('orders/index', $_SESSION['division'], $data);
        $this->view('staff/layouts/footer');
    }

    public function detail($code) {
        $data['orders'] = $this->model('Order')->show($code);
        $data['title'] = 'Detail Order';
        $data['id'] = $code;

        $this->view('staff/layouts/header', $data);
        $this->divisionView('orders/detail', $_SESSION['division'], $data);
        $this->view('staff/layouts/footer');
    }

    public function create() {
        if ($this->model('Order')->checkOrderCode($this->generateOrderCode()) > 0) {
            $_SESSION['error_order_code'] = 'Order code sudah terpakai';
            Flasher::setNotyf('Order gagal ditambahkan', 'danger');
            Flasher::setFlash('Code sudah terpakai', 'danger');

            return redirectTo('cashier/index');
        } else if ($file = UploadFile::upload($_FILES, $this->generateOrderCode())) {
            $data['costumer_name'] = Validate::validates($_POST['costumer_name']);
            $data['code'] = Validate::validates($this->generateOrderCode());
            $data['product'] = Validate::validates($_POST['product']);
            $data['machine_process'] = $_POST['machine_process'];
            array_unshift($data['machine_process'], 1, 2);
            array_push($data['machine_process'], 10);

            $data['order_file'] = $file;
            $data['qty'] = Validate::validates($_POST['qty']);
            $data['description'] = Validate::validates($_POST['description']);
            $data['status_description'] = "Pesanan telah dikonfirmasi";
            $data['id_staff'] = $_SESSION['id'];
            $data['division'] = $_SESSION['division'];
            $data['estimate_complete'] = $this->getEstimateComplete();
            $data['id_process'] = 1; // this initial value id

            if ($this->model('Order')->create($data)) {
                Flasher::setNotyf('Order berhasil ditambahkan', 'success');

                return redirectTo('cashier/index');
            } 
        }
        
        Flasher::setNotyf('Order gagal ditambahkan', 'danger');
        return redirectTo('cashier/index');
    }

    public function edit($code) {
        $data['code'] = $code;

        switch ($_SESSION['division']) {
            case 'Admin' :
                $data['current_division'] = $_SESSION['division'];
                $data['orders'] = $this->model('Order')->edit($data['code']);
                
                break;
            case 'Kasir' :
                $data['current_division'] = $_SESSION['division'];
                $data['orders'] = $this->model('Order')->edit($data['code']);
                break;
            case 'Operator Mesin Cutting' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Mesin CNC' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Mesin Print Stiker' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Mesin Print UV' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Mesin Grafir' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Mesin 3D Print' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Mesin Bending & Welding' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
            case 'Operator Assembly' :
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->editByDivision($data);
                break;
        } 
        
        $data['orders']['process_names'] = explode(', ', $data['orders']['process_names']);
        unset($data['orders']['process_names'][0], $data['orders']['process_names'][1]);
        array_pop($data['orders']['process_names']);
        $data['orders']['process_names'] = implode(', ', $data['orders']['process_names']);
        
        $data['process'] = $this->model('Order')->getOrderDivisionByCode($data['code']);
        $data['title'] = 'Design & Edit Order';
        // $data['previous'] = $this->model('Order')->checkPreviousOrderProcessing($data);

        $data['previous'] = $this->model('Order')->checkPreviousOrderProcessing($data);   

        $this->view('staff/layouts/header', $data);
        $this->divisionView('orders/edit', $_SESSION['division'], $data);
        $this->view('staff/layouts/footer');
    }

    public function update() {
        if ($file = UploadFile::upload($_FILES, Validate::validates($_POST['code']), 'uploaded/design/')) {
            $data['code'] = Validate::validates($_POST['code']);
            $data['design_file'] = Validate::validates($file);
            $data['note'] = Validate::validates($_POST['note']);
            $data['status'] = 'processing';
            $data['id_order'] = Validate::validates($_POST['id']);
            $data['id_staff'] = $_SESSION['id'];
            $data['id_process'] = 2;
            $data['id_order_detail'] = $_POST['id_order_detail'];
            $data['division'] = $_SESSION['division'];
            $data['estimate_complete'] = 0;
            $data['description'] = 'Pesanan telah diteruskan';

            $processMachines = explode(', ', $_POST['process_names']);
            
            foreach ($processMachines as $process) {
                $id_division[] = implode('', $this->model('Division')->getIDByName($this->getProcessDivision($process)));
            }

            $data['id_division'] = implode(',', $id_division);

            if ($this->model('Order')->update($data)) {
                Flasher::setNotyf('Order berhasil disimpan', 'success');
                return redirectTo('admin/index');
            }
        }

        Flasher::setNotyf('Order gagal disimpan', 'danger');
        return redirectTo('admin/index');
    }

    public function processDivision() {
        $data['current_division'] = $_SESSION['current_division'];
        $data['id_staff'] = $_SESSION['id'];
        $data['id'] = $_POST['id'];
        $data['id_order_detail'] = $_POST['id_order_detail'];
        $data['id_process'] = $this->model('MachineProcess')->getIDByName($this->divisionProcess($data['current_division']));
        $data['time'] = $this->model('MachineProcess')->getTime($data['id_process']['id']);
        $data['estimate_complete'] = $data['time']['time'] * $_POST['qty'];
        $data['description'] = 'Pesanan telah diteruskan';
 
        if ($this->model('Order')->process($data)) {
            Flasher::setNotyf('Order telah diprocess', 'success');
            return redirectTo('operator/index');
        }

        Flasher::setNotyf('Order gagal diprocess', 'danger');
        return redirectTo('operator/index');

    }

    public function completeOrderDirectly() {
        $data['current_division'] = $_SESSION['current_division'];
        $data['id_staff'] = $_SESSION['id'];
        $data['id'] = $_POST['id'];
        $data['id_order_detail'] = $_POST['id_order_detail'];
        $data['id_process'] = $this->model('MachineProcess')->getIDByName($this->divisionProcess($data['current_division']));
        $data['time'] = $this->model('MachineProcess')->getTime($data['id_process']['id']);
        $data['estimate_complete'] = $data['time']['time'] * $_POST['qty'];
        $data['description'] = 'Pesanan telah diteruskan';
 
        if ($this->model('Order')->process($data)) {
            $this->completeOrderDivision();
            
            Flasher::setNotyf('Order telah selesai', 'success');
            return redirectTo('operator/index');
        }

        Flasher::setNotyf('Order gagal diprocess', 'danger');
        return redirectTo('operator/index');

    }

    // public function completeOrderDirectly() {
    //     $data['current_division'] = $_SESSION['current_division'];
    //     $data['id_staff'] = $_SESSION['id'];
    //     $data['id'] = $_POST['id'];
    //     $data['id_order_detail'] = $_POST['id_order_detail'];
    //     $data['id_process'] = $this->model('MachineProcess')->getIDByName($this->divisionProcess($data['current_division']));
    //     $data['time'] = $this->model('MachineProcess')->getTime($data['id_process']['id']);
    //     $data['estimate_complete'] = $data['time']['time'] * $_POST['qty'];
    //     $data['description'] = 'Pesanan telah diteruskan';
 
    //     if ($this->model('Order')->process($data)) {
    //         $data['current_division'] = $_SESSION['current_division'];
    //         $data['id_staff'] = $_SESSION['id'];
    //         $data['id'] = $_POST['id'];
    //         $data['id_order_detail'] = $_POST['id_order_detail'];
    //         $data['id_process'] = $this->model('MachineProcess')->getIDByName($this->divisionProcess($data['current_division']));
    //         $data['time'] = $this->model('MachineProcess')->getTime($data['id_process']['id']);
    //         $data['estimate_complete'] = $data['time']['time'] * $_POST['qty'];
    //         $data['description'] = 'Pesanan telah diteruskan';
    //         if ($this->model('Order')->updateOrderStatus($data)) {
    //             $data['current_division'] = $_SESSION['current_division'];
    //             $data['id'] = $_POST['id'];
    //             $data['id_staff'] = $_SESSION['id'];
    //             $data['id_order_detail'] = $_POST['id_order_detail'];
    //             $data['id_process'] = 10;
    //             $data['division'] = $_SESSION['current_division'];
    //             $data['estimate_complete'] = 0;
    //             $data['description'] = 'Pesanan telah selesai'; 
    //             if ($this->model('Order')->complete($data)) {
    //                 if ($this->model('Order')->updateOrderStatusComplete($data)) {
    //                     Flasher::setNotyf('Order telah selesai', 'success');
    //                     return redirectTo('operator/index');
    //                 }
    //                 Flasher::setNotyf('Order telah selesai', 'success');
    //                 return redirectTo('operator/index');
    //             }
    //             Flasher::setNotyf('Order telah selesai', 'success');
    //             return redirectTo('operator/index');
    //         }
    //     }

    //     Flasher::setNotyf('Order gagal diprocess', 'danger');
    //     return redirectTo('operator/index');
    // }

    public function completeOrderDivision() {
        $data['current_division'] = $_SESSION['current_division'];
        $data['id_staff'] = $_SESSION['id'];
        $data['id'] = $_POST['id'];
        $data['id_order_detail'] = $_POST['id_order_detail'];
        $data['id_process'] = $this->model('MachineProcess')->getIDByName($this->divisionProcess($data['current_division']));
        $data['time'] = $this->model('MachineProcess')->getTime($data['id_process']['id']);
        $data['estimate_complete'] = $data['time']['time'] * $_POST['qty'];
        $data['description'] = 'Pesanan telah diteruskan';
        if ($this->model('Order')->updateOrderStatus($data)) {
            $data['current_division'] = $_SESSION['current_division'];
            $data['id'] = $_POST['id'];
            $data['id_staff'] = $_SESSION['id'];
            $data['id_order_detail'] = $_POST['id_order_detail'];
            $data['id_process'] = 10;
            $data['division'] = $_SESSION['current_division'];
            $data['estimate_complete'] = 0;
            $data['description'] = 'Pesanan telah selesai';
            if ($this->model('Order')->complete($data)) {
                if($this->model('Order')->updateOrderStatusComplete($data)) {
                    Flasher::setNotyf('Order telah selesai', 'success');
                    return redirectTo('operator/index');
                }
                Flasher::setNotyf('Order telah selesai', 'success');
                return redirectTo('operator/index');
            }
            Flasher::setNotyf('Order gagal selesai', 'danger');
            return redirectTo('operator/index');
        }
        Flasher::setNotyf('Order gagal selesai', 'danger');
        return redirectTo('operator/index');
    }

    public function delete($id) {
        if ($order = $this->model('Order')->getOrderByID($id)) {
            $order_file = $order['order_file'];
            $design_file = $order['design_file'];

            unlink('../public/uploaded/' . $order_file);
            unlink('../public/uploaded/design/' . $design_file);

            if ($this->model('Order')->delete($id) > 0) {
                Flasher::setNotyf('Order berhasil dihapus', 'success');
                return redirectTo('admin/orders/index');
            }    
        }
        Flasher::setNotyf('Order gagal dihapus', 'danger');
        return redirectTo('admin/orders/index');
    }

    private function getProcessDivision($process) {
        switch ($process) {
            case 'Cutting' : 
                return 'Operator Mesin Cutting';
                break;
            case 'Print UV' :
                return 'Operator Mesin Print UV';
                break;
            case 'Print Stiker' :
                return 'Operator Mesin Print Stiker';
                break;
            case 'Grafir':
                return 'Operator Mesin Grafir';
                break;
            case 'Bending & Welding' :
                return 'Operator Mesin Bending & Welding';
                break;
            case '3D Print' :
                return 'Operator Mesin 3D Print';
                break;
            case 'Assembly / Finishing';
                return 'Operator Assembly';
                break;
            default :
                return 'Operator Mesin CNC';
                break;
        }
    }

    private function divisionProcess ($division) {
        switch ($division) {
            case 'Operator Mesin Cutting' : 
                return 'Cutting';
                break;
            case 'Operator Mesin Print UV' :
                return 'Print UV';
                break;
            case 'Operator Mesin Print Stiker' :
                return 'Print Stiker';
                break;
            case 'Operator Mesin Grafir':
                return 'Grafir';
                break;
            case 'Operator Mesin Bending & Welding' :
                return 'Bending & Welding';
                break;
            case 'Operator Mesin 3D Print' :
                return '3D Print';
                break;
            case 'Operator Assembly';
                return 'Assembly / Finishing';
                break;
            default :
                return 'Operator Mesin CNC';
                break;
        }
    }

    private function getEstimateComplete() {
        foreach ($_POST['machine_process'] as $process) {
            $getTime[] = implode('', $this->model('MachineProcess')->getTime($process));
        }

        foreach ($getTime as $time) {
            $estimateComplete[] = $time * Validate::validates($_POST['qty']);
        }

        return array_sum($estimateComplete);
    }

    private function generateOrderCode() {
        $productCode = $this->model('Product')->getCodeByID($_POST['product']);

        foreach ($_POST['machine_process'] as $process) {
            $getCode[] = implode('', $this->model('MachineProcess')->getID($process));
        }

        $machineCode = implode('', $getCode);
        $current_date = date('dmy');
        $costumer = explode(' ', Validate::validates($_POST['costumer_name']));
        
        // hardcoded 
        // the order number is get from 1 month
        $current_order = (count($this->model('Order')->getOrderByMonth()) + 1) < 10 ? ('0' . count($this->model('Order')->get()) + 1) : (count($this->model('Order')->get()) + 1); 
        
        $orderCode = $productCode['code'] . "-" . $machineCode . "-" . $current_order . $current_date . "-" . strtolower($costumer[0]);

        return $orderCode;
    }
}