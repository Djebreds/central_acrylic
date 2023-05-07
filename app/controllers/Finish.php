<?php 


class Finish extends Controller {
    public function index() {
         switch ($_SESSION['division']) {
            case 'Admin' :
            case 'Kasir' :
                $data['title'] = 'Data Order';
                $data['orders'] = $this->model('Order')->getFinish();
                break;
            case 'Operator Mesin Cutting' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Mesin CNC' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Mesin Print Stiker' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Mesin Print UV' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Mesin Grafir' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Mesin 3D Print' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Mesin Bending & Welding' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
            case 'Operator Assembly' :
                $data['title'] = 'Data Order';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderFinishByDivision($data);
                break;
        } 

        $this->view('staff/layouts/header', $data);
        $this->divisionView('finish/index', $_SESSION['division'], $data);
        $this->view('staff/layouts/footer');
    }

    public function detail($code) {
        $data['orders'] = $this->model('Order')->show($code);
        $data['title'] = 'Detail Order';
        $data['id'] = $code;

        $this->view('staff/layouts/header', $data);
        $this->divisionView('finish/detail', $_SESSION['division'], $data);
        $this->view('staff/layouts/footer');
    }
}