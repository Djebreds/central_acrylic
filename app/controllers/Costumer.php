<?php 

class Costumer extends Controller {
    public function index() {
        $data['title'] = 'Costumer';
        $this->view('layouts/header', $data);
        $this->view('costumer/index');
        $this->view('layouts/footer');
    }

    public function search() {
        $data['product_code'] = Validate::validates($_POST['product_code']);
        $data['title'] = 'Detail Order';
        $data['orders'] = $this->model('Order')->show($data['product_code']);

        if ($this->model('Order')->show($data['product_code'])) {
            $_SESSION['orders'] = $data['orders'];
            return redirectTo('costumer/order');
        } else {
            Flasher::setFlash('Nomor pesanan yang anda cari tidak ada', 'danger');
            return redirectTo('costumer');
        }
    }

    public function order() {
        $data['title'] = 'Costumer Order';
        $data['orders'] = $_SESSION['orders'];

        $this->view('layouts/header', $data);
        $this->view('costumer/order', $data);
        $this->view('layouts/footer');
    }
}