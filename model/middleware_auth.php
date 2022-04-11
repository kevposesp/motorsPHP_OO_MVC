<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "view/vendor/jwt/JWT.php");
class MiddlewareAuth {
    public static function middlewareAuth() {
        $headers = apache_request_headers();
        // echo json_encode($headers['token']);

        if($headers['token'] != "false") {
            $inifile = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/secret.ini');
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
