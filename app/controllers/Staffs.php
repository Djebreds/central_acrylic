<?php 

class Staffs extends Controller {
    public function index() {
        Validate::authOperator($_SESSION['division']);
        $this->divisionChecker($_SESSION['division']);
    }

    private function divisionChecker($division) {
        switch($division) {
            case 'Kasir' :
                $data['title'] = 'Dashboard Kasir';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/cashier/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Cutting' :
                $data['title'] = 'Dashboard Operator Mesin Cutting';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin CNC' :
                $data['title'] = 'Dashboard Operator Mesin CNC';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Print Stiker' :
                $data['title'] = 'Dashboard Operator Mesin Print Stiker';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Print UV' :
                $data['title'] = 'Dashboard Operator Mesin Print UV';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Grafir' :
                $data['title'] = 'Dashboard Operator Mesin Grafir';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin 3D Print' :
                $data['title'] = 'Dashboard Operator Mesin 3D Print';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Bending & Welding' :
                $data['title'] = 'Dashboard Operator Mesin Bending & Welding';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Assembly' :
                $data['title'] = 'Operator Assembly';
                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index');
                $this->view('staff/layouts/footer');
                break;
        } 
    }
}