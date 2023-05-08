<?php 


function getImageStaff($division) {
    switch($division) {
        case 'Admin' :
            return asset('img/assets/Dashboard Admin.png');
            break;
        case 'Kasir' :
            return asset('img/assets/Dashboard Kasir.png');
            break;
        case 'Operator Mesin Cutting' :
            return asset('img/assets/Dashboard Operator Mesin Cutting.png');
            break;
        case 'Operator Mesin CNC' :
            return asset('img/assets/Dashboard Operator Mesin CNC.png');
            break;
        case 'Operator Mesin Print Stiker' :
            return asset('img/assets/Dashboard Operator Mesin Print Stiker.png');
            break;
        case 'Operator Mesin Print UV' :
            return asset('img/assets/Dashboard Operator Mesin Print UV.png');
            break;
        case 'Operator Mesin Grafir' :
            return asset('img/assets/Dashboard Operator Mesin Grafir.png');
            break;
        case 'Operator Mesin 3D Print' :
            return asset('img/assets/Dashboard Operator Mesin 3D Print.png');
            break;
        case 'Operator Mesin Bending & Welding' :
            return asset('img/assets/Dashboard Operator Mesin Bending dan Welding.png');
            break;
        case 'Operator Assembly' :
            return asset('img/assets/Dashboard Operator Assembly.png');
            break;
    } 
}

function getNotificationImage($division) {
    switch($division) {
        case 'Kasir' :
            return asset('img/assets/Dashboard Kasir Dark.png');
            break;
        case 'Operator Mesin Cutting' :
            return asset('img/assets/Dashboard Operator Mesin Cutting Dark.png');
            break;
        case 'Operator Mesin CNC' :
            return asset('img/assets/Dashboard Operator Mesin CNC Dark.png');
            break;
        case 'Operator Mesin Print Stiker' :
            return asset('img/assets/Dashboard Operator Mesin Print Stiker Dark.png');
            break;
        case 'Operator Mesin Print UV' :
            return asset('img/assets/Dashboard Operator Mesin Print UV Dark.png');
            break;
        case 'Operator Mesin Grafir' :
            return asset('img/assets/Dashboard Operator Mesin Grafir Dark.png');
            break;
        case 'Operator Mesin 3D Print' :
            return asset('img/assets/Dashboard Operator Mesin 3D Print Dark.png');
            break;
        case 'Operator Mesin Bending & Welding' :
            return asset('img/assets/Dashboard Operator Mesin Bending dan Welding Dark.png');
            break;
        case 'Operator Assembly' :
            return asset('img/assets/Dashboard Operator Assembly Dark.png');
            break;
    } 
}

function divisionProcess($division) {
    switch ($division) {
        case 'Kasir' :
            return '';
            break;
        case 'Operator Mesin Cutting' : 
            return 'Cutting';
            break;
        case 'Operator Mesin Print UV' :
            return 'Print UV';
            break;
        case 'Operator Mesin Print Stiker' :
            return 'Print Stiker';
            break;
        case 'Operator Mesin Grafir':
            return 'Grafir';
            break;
        case 'Operator Mesin Bending & Welding' :
            return 'Bending & Welding';
            break;
        case 'Operator Mesin 3D Print' :
            return '3D Print';
            break;
        case 'Operator Assembly';
            return 'Assembly / Finishing';
            break;
        default :
            return 'Operator Mesin CNC';
            break;
    }
}

function divisionToProcess($division) {
    switch ($division) {
        case 'Admin' : 
            return 'Design & Setting';
            break;
        case 'Kasir' :
            return 'Konfirmasi';
            break;
        case 'Operator Mesin Cutting' : 
            return 'Cutting';
            break;
        case 'Operator Mesin Print UV' :
            return 'Print UV';
            break;
        case 'Operator Mesin Print Stiker' :
            return 'Print Stiker';
            break;
        case 'Operator Mesin Grafir':
            return 'Grafir';
            break;
        case 'Operator Mesin Bending & Welding' :
            return 'Bending & Welding';
            break;
        case 'Operator Mesin 3D Print' :
            return '3D Print';
            break;
        case 'Operator Assembly';
            return 'Assembly / Finishing';
            break;
        default :
            return 'Operator Mesin CNC';
            break;
    }
}



function routeDivision($division, $target) {
    switch($division) {
        case 'Admin' :
            return route('admin/' . $target);
            break;
        case 'Kasir' :
            return route('cashier/' . $target);
            break;
        case 'Operator Mesin Cutting' :
        case 'Operator Mesin CNC' :
        case 'Operator Mesin Print Stiker' :
        case 'Operator Mesin Print UV' :
        case 'Operator Mesin Grafir' :
        case 'Operator Mesin 3D Print' :
        case 'Operator Mesin Bending & Welding' :
        case 'Operator Assembly' :
            return route('operator/' . $target);
            break;
    } 
}


function imageIcon($fileName) {
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    if ($extension == 'doc' || $extension == 'docx') {
        return asset('img/assets/doc.png');
    } else if ($extension == 'jpg' || $extension == 'jpeg') {
        return asset('img/assets/jpg.png');
    } else if ($extension == 'pdf') {
        return asset('img/assets/pdf-2.png');
    } else if ($extension == 'ps') {
        return asset('img/assets/ps.png');
    } else if ($extension == 'psd') {
        return asset('img/assets/psd.png');
    } else if ($extension == 'png') {
        return asset('img/assets/png.png');
    } else if ($extension == 'cdr') {
        return asset('img/assets/cdr.png');
    } else if ($extension == '3ds') {
        return asset('img/assets/3ds.png');
    } else if ($extension == 'ai') {
        return asset('img/assets/ai.png');
    } else if ($extension == 'cad') {
        return asset('img/assets/cad.png');
    } else if ($extension == 'bmp') {
        return asset('img/assets/bmp.png');
    } else if ($extension == 'eps') {
        return asset('img/assets/eps.png');
    } else if ($extension == 'svg') {
        return asset('img/assets/svg.png');
    } else if ($extension == 'tif') {
        return asset('img/assets/tif.png');
    } else {
        return asset('img/assets/file.png');
    }
}