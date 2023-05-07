<?php 

class Controller {

    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../app/models/Model.php';
        require_once '../app/models/' . $model . '.php';
        
        return new $model;
    }

    public function divisionView($view, $division, $data = []) {
        switch($division) {
            case 'Admin' :
                require_once '../app/views/staff/admin/' . $view . '.php';
                break;
            case 'Kasir' :
                require_once '../app/views/staff/cashier/' . $view . '.php';
                break;
            case 'Operator Mesin Cutting' :
            case 'Operator Mesin CNC' :
            case 'Operator Mesin Print Stiker' :
            case 'Operator Mesin Print UV' :
            case 'Operator Mesin Grafir' :
            case 'Operator Mesin 3D Print' :
            case 'Operator Mesin Bending & Welding' :
            case 'Operator Assembly' :
                require_once '../app/views/staff/operator/' . $view . '.php';
                break;
        } 
    }
}
