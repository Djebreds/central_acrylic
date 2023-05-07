<?php 

function route($name, $params = '') {
    return BASEURL . $name . $params;
}

function redirectTo($route) {
    header('Location: ' . route($route));
    exit;
}

function asset($name) {
    return BASEURL . $name;
}

function activeLink($url) {
    $current_url =  $_SERVER['REQUEST_URI'];
    $get_current_url = explode('/', $current_url);
    $current = implode('/', [$get_current_url[1], $get_current_url[2]]);
    
    return $current == $url ? true : false;
}