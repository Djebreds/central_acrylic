<?php 

class Operator extends Controller {
    public function __construct() {
        $data['current_division'] = $_SESSION['division'];
        $_SESSION['products_count'] = count($this->model('Product')->get());
        $_SESSION['users_count'] = count($this->model('Staff')->get());
        $_SESSION['orders_count'] = count($this->model('Order')->get($data));
        $_SESSION['finish_count'] = count($this->model('Order')->getOrderFinishByDivision($data));
        $_SESSION['notifications'] = $this->model('Notification')->getNotification();
        Validate::authOperator($_SESSION['division']);
    }

    public function index() {
        $this->divisionChecker($_SESSION['division']);
    }

    private function divisionChecker($division) {
        switch($division) {
            case 'Operator Mesin Cutting' :
                $data['title'] = 'Dashboard Operator Mesin Cutting';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin CNC' :
                $data['title'] = 'Dashboard Operator Mesin CNC';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Print Stiker' :
                $data['title'] = 'Dashboard Operator Mesin Print Stiker';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Print UV' :
                $data['title'] = 'Dashboard Operator Mesin Print UV';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Grafir' :
                $data['title'] = 'Dashboard Operator Mesin Grafir';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin 3D Print' :
                $data['title'] = 'Dashboard Operator Mesin 3D Print';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Mesin Bending & Welding' :
                $data['title'] = 'Dashboard Operator Mesin Bending & Welding';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
            case 'Operator Assembly' :
                $data['title'] = 'Dashboard Operator Assembly';
                $data['current_division'] = $_SESSION['current_division'];
                $data['orders'] = $this->model('Order')->getOrderByDivision($data);

                $this->view('staff/layouts/header', $data);
                $this->view('staff/operator/dashboard/index', $data);
                $this->view('staff/layouts/footer');
                break;
        } 
    }

    public function setting() {
        $data['title'] = 'Setting';
        $this->view('staff/layouts/header', $data);
        $this->view('staff/operator/setting/index');
        $this->view('staff/layouts/footer');
    }

    public function updatePassword() {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['password_confirmation'];

        if ($newPassword != $confirmPassword) {
            $_SESSION['error_new_password'] = 'password yang anda masukkan tidak cocok';
            Flasher::setNotyf('Password gagal diubah', 'danger');
            Flasher::setFlash('password yang anda masukkan tidak cocok', 'danger');

            return redirectTo('operator/setting/index');
        } else if ($this->model('Staff')->updatePassword($_POST)) {
            Flasher::setNotyf('Password berhasil diubah', 'success');
            
            return redirectTo('operator/setting/index');   
        } else {
            Flasher::setNotyf('Password gagal diubah', 'danger');

            return redirectTo('operator/setting/index');
        }
    }

    public function checkNotifications() {
        $data['id_staff'] = $_SESSION['id'];
        $notifications = $this->model('Notification')->checkNotifications($data);
        
        echo json_encode($notifications);
    }

    public function markNotifications() {
        $data['id_staff'] = $_SESSION['id'];
        $data['is_read'] = 1;

        $this->model('Notification')->markNotifications($data);

        echo json_encode(array('success' => true));
    }
}