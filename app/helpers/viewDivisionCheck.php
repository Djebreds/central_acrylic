<?php 

class Sidebar {
    public static function sidebarDivision($division) {
        switch($division) {
            case 'Admin' :
                return include_once('../app/views/staff/layouts/components/admin_sidebar.php');
                break;
            case 'Kasir' :
                return include_once('../app/views/staff/layouts/components/cashier_sidebar.php');
                break;
            case 'Operator Mesin Cutting' :
            case 'Operator Mesin CNC' :
            case 'Operator Mesin Print Stiker' :
            case 'Operator Mesin Print UV' :
            case 'Operator Mesin Grafir' :
            case 'Operator Mesin 3D Print' :
            case 'Operator Mesin Bending & Welding' :
            case 'Operator Assembly' :
                return include_once('../app/views/staff/layouts/components/operator_sidebar.php');
                break;
        } 
    }
}
