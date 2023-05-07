<?php 

class Products extends Controller {
    public function index() {
        $data['products'] = $this->model('Product')->get();
        $data['title'] = 'Data Produk';

        $this->view('staff/layouts/header', $data);
        $this->divisionView('products/index', $_SESSION['division'], $data);
        $this->view('staff/layouts/footer');
    }

    public function create() {
        if ($this->model('Product')->checkProductCode($_POST['code']) > 0) {
            $_SESSION['error_product_code'] = 'Code yang anda masukkan sudah terpakai';
            Flasher::setNotyf('Staff gagal ditambahkan', 'danger');
            Flasher::setFlash('Code yang anda masukkan sudah terpakai', 'danger');

            return $this->checkDivision($_SESSION['division']);
        } else if ($this->model('Product')->create($_POST)) {
            Flasher::setNotyf('Product berhasil ditambahkan', 'success');
            return $this->checkDivision($_SESSION['division']);   
        } else {
            Flasher::setNotyf('Product gagal ditambahkan', 'danger');
            return $this->checkDivision($_SESSION['division']);   
        }
    }

    public function delete($id) {
        if ($this->model('Product')->delete($id) > 0) {
            Flasher::setNotyf('Product berhasil dihapus', 'success');
            return $this->checkDivision($_SESSION['division']);
        } else {
            Flasher::setNotyf('Product gagal dihapus', 'danger');
            return $this->checkDivision($_SESSION['division']);
        }
    }

    public function update() {
        if ($this->model('Product')->checkProductCode($_POST['code']) > 0) {
            $_SESSION['error_product_code'] = 'Code yang anda masukkan sudah terpakai';
            Flasher::setNotyf('Product gagal diubah', 'danger');
            Flasher::setFlash('Code yang anda masukkan sudah terpakai', 'danger');

            return $this->checkDivision($_SESSION['division']);
        } else if ($this->model('Product')->update($_POST)) {
            Flasher::setNotyf('Product berhasil diubah', 'success');
            return $this->checkDivision($_SESSION['division']);   
        } else {
            Flasher::setNotyf('Product gagal diubah', 'danger');
            return $this->checkDivision($_SESSION['division']);
        }
    }

    private function checkDivision($division) {
        if ($division == 'Admin') {
            redirectTo('admin/products/index');
        } else if ($division == 'Kasir') {
            redirectTo('cashier/products/index');
        }
    }

}