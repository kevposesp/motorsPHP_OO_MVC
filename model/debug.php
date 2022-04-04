<?php

class Debug {
    public static function console_log($data){
        $r = '<script>';
        $r .= 'console.log('. json_encode( $data ) .')';
        $r .= '</script>';
        echo $r;
    }
}