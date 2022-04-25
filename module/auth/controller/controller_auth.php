<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "module/auth/model/Auth.php");
include($path . "module/auth/model/validate_auth.php");
include($path . "model/middleware_auth.php");
@session_start();

if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case 'auth':
            include("module/auth/view/auth.html");
            break;
        case 'login':
            if (isset($_POST)) {
                try {
                    $auth = new Auth();
                    $rdo = $auth->login($_POST);
                } catch (Exception $e) {
                    echo json_encode($e);
                }
                if ($rdo == false) {
                    $res['status'] = false;
                    echo json_encode($res);
                } else {
                    $_SESSION['time'] = time();
                    $res['status'] = true;
                    $res['data'] = $rdo;
                    echo json_encode($res);
                }
            }
            break;
        case 'register':
            if ($_POST) {
                $errors = validate($_POST);
                if ($errors['check']) {
                    try {
                        $auth = new Auth();
                        $reg = $auth->register($_POST);
                    } catch (Exception $e) {
                        echo json_encode($e);
                    }

                    
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/PHPMailer/config.php');

                    $mail->ClearAllRecipients();

                    $mail->AddAddress($_POST['email']);

                    $mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
                    $mail->Subject = "Mensaje enviado desde el modulo de auth en motors";

                    $msg = "<h1>Bienvenido a motors</h1><br>";

                    $mail->Body = $msg;
                    $mail->Send();
                }
                echo json_encode($errors);
            }
            break;
        case 'actividad':
            $act = false;
            if (!isset($_SESSION['time'])) {
                $act = false;
            } else {
                if ((time() - $_SESSION['time']) >= 1800) {
                    $act = false;
                } else {
                    $act = true;
                    // $act = time() - $_SESSION['time'];
                }
            }
            echo json_encode($act);
            break;
        case 'controluser':
            $token = MiddlewareAuth::middlewareAuth();

            $auth = new Auth();
            $rdo = $auth->select_usr_id($token['id_usr']);
            if ($rdo) {
                if (isset($_SESSION['id_usr']) && ($_SESSION['id_usr']) == $rdo->id_user) {
                    echo json_encode(true);
                } else {
                    echo json_encode(false);
                }
            } else {
                echo json_encode(false);
            }
            // echo json_encode(true);
            break;
        case 'refreshsesion':
            session_regenerate_id();
            $_SESSION['time'] = time();
            echo json_encode(true);
            break;
        case 'refreshtoken':
            $token = MiddlewareAuth::middlewareAuth();

            $auth = new Auth();
            $rdo = $auth->select_usr_id($token['id_usr']);
            if ($rdo) {
                $rdo2 = $auth->refresh_token($token['id_usr']);
                if ($rdo2) {
                    echo json_encode($rdo2);
                } else {
                    echo json_encode(false);
                }
            } else {
                echo json_encode(false);
            }
            break;
        case 'pruebaheaders':
            $token = MiddlewareAuth::middlewareAuth();
            echo json_encode($token);
            break;
        case 'infBut':
            $token = MiddlewareAuth::middlewareAuth();
            if ($token != false) {
                try {
                    $auth = new Auth();
                    $rdo = $auth->infBut($token);
                } catch (Exception $e) {
                    echo json_encode($e);
                }
                if ($rdo) {
                    echo json_encode($rdo);
                } else {
                    echo json_encode("error_server");
                }
            } else {
                echo json_encode(false);
            }
            // $headers = apache_request_headers();
            // echo json_encode($headers);
            break;
        case 'logout':
            session_unset();
            echo json_encode(true);
            break;
        default;
            Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=auth");
            break;
    }
} else {
    include("module/auth/view/auth.html");
}
