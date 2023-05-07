<?php 

class Debug {
    public static function dump($variable = []) {
        var_dump($variable);
        die;
    }
}