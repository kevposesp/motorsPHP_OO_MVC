<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "view/vendor/jwt/JWT.php");
class MiddlewareAuth {
    public static function middlewareAuth() {
        $headers = apache_request_headers();
        // echo json_encode($headers['token']);

        if($headers['token'] != "false") {
            $inifile = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/secret.ini');
            $secret = $inifile['secret'];
            $JWT = new JWT;
            $token = $JWT->decode($headers['token'], $secret);
            $token = json_decode($token, TRUE);
            return $token;
        } else {
            return false;
        }
        // return true;
    }
}
