<?php 

class Validate {
    public static function validates($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    // public static function authAdmin() {
    //     Validate::checkAuth();

    //     if ($_SESSION['division'] != 'Admin') return redirectTo('admin');
    // }

    // public static function authStaff() {
    //     Validate::checkAuth();

    //     if (!isset($_SESSION['current_division'])) {
    //         return Validate::checkDivision($_SESSION['division']);
    //     } else if ($_SESSION['division'] != $_SESSION['current_division']) {
    //         return Validate::checkDivision($_SESSION['division']);
    //     }
    // }
    public static function authCashier($division) {
        Validate::checkAuth();

        if ($division != 'Kasir') {
            return Validate::checkDivision($division);
        }
    }

    public static function authAdmin($division) {
        Validate::checkAuth();

        if ($division != 'Admin') {
            return Validate::checkDivision($division);
        }
    }

    public static function authOperator($division) {
        Validate::checkAuth();

        if ($division != Validate::division($_SESSION['current_division'])) {
            return Validate::checkDivision($division);
        } else if ($division == 'Admin') {
            return Validate::checkDivision('Admin');
        } else if ($division == 'Kasir') {
            return Validate::checkDivision('Kasir');
        }
    }

    public static function checkAuth() {
        if (!isset($_SESSION['login']) && $_SESSION['login'] != true) return redirectTo('login');
    }

    public static function checkAuthUser() {
        if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
            if ($_SESSION['division'] == 'Admin') {
                return redirectTo('admin');
            }
            return Validate::checkDivision($_SESSION['division']);
        }
    }

    public static function division($division) {
        switch($division) {
            case 'Admin' :
                return 'Admin';
                break;
            case 'Kasir' :
                return 'Kasir';
                break;
            case 'Operator Mesin Cutting' :
                return 'Operator Mesin Cutting';
                break;
            case 'Operator Mesin CNC' :
                return 'Operator Mesin CNC';
                break;
            case 'Operator Mesin Print Stiker' :
                return 'Operator Mesin Print Stiker';
                break;
            case 'Operator Mesin Print UV' :
                return 'Operator Mesin Print UV';
                break;
            case 'Operator Mesin Grafir' :
                return 'Operator Mesin Grafir';
                break;
            case 'Operator Mesin 3D Print' :
                return 'Operator Mesin 3D Print';
                break;
            case 'Operator Mesin Bending & Welding' :
                return 'Operator Mesin Bending & Welding';
                break;
            case 'Operator Assembly' :
                return 'Operator Assembly';
                break;
        } 
    }

    public static function checkDivision($division) {
        switch($division) {
            case 'Admin' :
                $_SESSION['current_division'] = 'Admin';
                return redirectTo('admin');
                break;
            case 'Kasir' :
                $_SESSION['current_division'] = 'Kasir';
                return redirectTo('cashier');
                break;
            case 'Operator Mesin Cutting' :
                $_SESSION['current_division'] = 'Operator Mesin Cutting';
                return redirectTo('operator');
                break;
            case 'Operator Mesin CNC' :
                $_SESSION['current_division'] = 'Operator Mesin CNC';
                return redirectTo('operator');
                break;
            case 'Operator Mesin Print Stiker' :
                $_SESSION['current_division'] = 'Operator Mesin Print Stiker';
                return redirectTo('operator');
                break;
            case 'Operator Mesin Print UV' :
                $_SESSION['current_division'] = 'Operator Mesin Print UV';
                return redirectTo('operator');
                break;
            case 'Operator Mesin Grafir' :
                $_SESSION['current_division'] = 'Operator Mesin Grafir';
                return redirectTo('operator');
                break;
            case 'Operator Mesin 3D Print' :
                $_SESSION['current_division'] = 'Operator Mesin 3D Print';
                return redirectTo('operator');
                break;
            case 'Operator Mesin Bending & Welding' :
                $_SESSION['current_division'] = 'Operator Mesin Bending & Welding';
                return redirectTo('operator');
                break;
            case 'Operator Assembly' :
                $_SESSION['current_division'] = 'Operator Assembly';
                return redirectTo('operator');
                break;
        } 
    }
}