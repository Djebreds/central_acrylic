<?php 

class Login extends Controller {
    // public function __construct() {
    //     Validate::checkAuthUser();
    // }

    public function index() {
        Validate::checkAuthUser();

        $data['title'] = 'Login Staff';
        $data['divisions'] = $this->model('Division')->get();

        $this->view('layouts/header', $data);
        $this->view('staff/login/index', $data);
        $this->view('layouts/footer');
    }

    public function process() {
        Validate::checkAuthUser();

        $staff_ID = $_POST['staff_ID'];
        $password = $_POST['password'];
        $staff = $this->model('Staff')->checkStaffID($staff_ID);

        if ($staff != null) {
            if (password_verify($password, $staff['password'])) {
                if ($staff['division'] == 'admin' && $_POST['division'] == 'Admin') {
                    $this->properties($staff);
                    $this->checkRememberMe();

                    return redirectTo('admin');
                } else if ($staff['division'] == 'staff' && $_POST['division'] != 'Admin') {
                    $this->properties($staff);
                    $this->checkRememberMe();
                    
                    return Validate::checkDivision($_POST['division']);
                } else if ($staff['division'] == 'admin' && $_POST['division'] != 'Admin') {
                    $this->properties($staff);
                    $this->checkRememberMe();
                    
                    return Validate::checkDivision($_POST['division']);
                }
                Flasher::setFlash('ID atau password salah.', 'danger');
                return redirectTo('login');
            } else {
                Flasher::setFlash('ID atau password salah.', 'danger');
                return redirectTo('login');
            }
        }

        Flasher::setFlash('ID atau password salah.', 'danger');
        return redirectTo('login');
    }

    private function properties($data) {
        $_SESSION['login'] = true;
        $_SESSION['name'] = $data['name'];
        $_SESSION['division'] = $_POST['division'];
        $_SESSION['staff_ID'] = $data['staff_ID'];
        $_SESSION['id'] = $data['id'];
    }

    private function checkRememberMe() {
        if (isset($_POST['remember_me'])) {
            $expire = time()+2678400;
            setcookie('staff_ID', $_POST['staff_ID'], $expire);
            setcookie('division', $_POST['division'], $expire);
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        
        return redirectTo('login');
    }
}