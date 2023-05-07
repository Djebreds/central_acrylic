<?php 

class Users extends Admin {
    public function __construct() {
        Validate::authAdmin($_SESSION['division']);
    }

    public function index() {
        $data['staff'] = $this->model('Staff')->staff();
        $data['admin'] = $this->model('Staff')->admin();
        $data['title'] = 'Data Staff';
        $_SESSION['custom-js'] = 'js/pages/users.js';

        $this->view('staff/layouts/header', $data);
        $this->view('staff/admin/users/index', $data);
        $this->view('staff/layouts/footer');
    }

    public function create() {
        if ($this->model('Staff')->checkStaffID($_POST['staff_ID']) > 0) {
            $_SESSION['error_staff_id'] = 'ID yang anda masukkan sudah terpakai';
            Flasher::setNotyf('Staff gagal diubah', 'danger');
            Flasher::setFlash('ID yang anda masukkan sudah terpakai', 'danger');

            return redirectTo('admin/users/index');
        } else if ($this->model('Staff')->create($_POST)) {    
            Flasher::setNotyf('Staff berhasil ditambahkan', 'success');

            return redirectTo('admin/users/index');   
        } else {
            Flasher::setNotyf('Staff gagal ditambahkan', 'danger');
            return redirectTo('admin/users/index');
        }
    }

    public function delete($id) {
        if ($this->model('Staff')->delete($id) > 0) {
            Flasher::setNotyf('Staff berhasil dihapus', 'success');
            return redirectTo('admin/users/index');
        } else {
            Flasher::setNotyf('Staff gagal dihapus', 'danger');
            return redirectTo('admin/users/index');
        }
    }

    public function update() {
        if ($_POST['password'] != $_POST['password_confirmation']) {
            $_SESSION['error_password'] = 'password yang anda masukkan tidak cocok.';
            Flasher::setNotyf('Staff gagal diubah', 'danger');
            Flasher::setFlash('password yang anda masukkan tidak cocok', 'danger');

            return redirectTo('admin/users/index');
        } else if ($staff = $this->model('Staff')->checkStaffByID($_POST['id'])) { 
            if ($_POST['staff_ID'] == $staff['staff_ID']) {
                $this->model('Staff')->update($_POST);       
                Flasher::setNotyf('Staff berhasil diubah', 'success');
        
                return redirectTo('admin/users/index');   
            } else {
                if ($this->model('Staff')->checkStaffID($_POST['staff_ID']) > 0) {
                    $_SESSION['error_staff_id'] = 'ID yang anda masukkan sudah terpakai';
                    Flasher::setNotyf('Staff gagal diubah', 'danger');
                    Flasher::setFlash('ID yang anda masukkan sudah terpakai', 'danger');

                    return redirectTo('admin/users/index');
                }
                if ($this->model('Staff')->update($_POST)) {
                    Flasher::setNotyf('Staff berhasil diubah', 'success');
        
                    return redirectTo('admin/users/index');   
                }
            }
        } else {
            Flasher::setNotyf('Staff gagal diubah', 'danger');

            return redirectTo('admin/users/index');
        }


        // if ($_POST['password'] != $_POST['password_confirmation']) {
        //     $_SESSION['error_password'] = 'password yang anda masukkan tidak cocok';
        //     Flasher::setNotyf('Staff gagal diubah', 'danger');
        //     Flasher::setFlash('password yang anda masukkan tidak cocok', 'danger');

        //     return redirectTo('admin/users/index');
        // } else if ($this->model('Staff')->checkStaffID($_POST['staff_ID']) > 0) {
        //     $_SESSION['error_staff_id'] = 'ID yang anda masukkan sudah terpakai';
        //     Flasher::setNotyf('Staff gagal diubah', 'danger');
        //     Flasher::setFlash('ID yang anda masukkan sudah terpakai', 'danger');

        //     return redirectTo('admin/users/index');
        // } else if ($this->model('Staff')->update($_POST)) {    
        //     Flasher::setNotyf('Staff berhasil diubah', 'success');
            
        //     return redirectTo('admin/users/index');   
        // } else {
        //     Flasher::setNotyf('Staff gagal diubah', 'danger');

        //     return redirectTo('admin/users/index');
        // }
    }
}