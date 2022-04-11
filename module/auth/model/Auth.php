<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Auth
{
    function select_usr($username)
    {
        $sql = "SELECT id_user FROM users WHERE username_user = '$username' or email_user = '$username'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql)->fetch_object();
        connect::close($conn);
        return $res;
    }

    function select_usr_id($id)
    {
        $sql = "SELECT id_user FROM users WHERE id_user = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql)->fetch_object();
        connect::close($conn);
        return $res;
    }

    function select_username($username)
    {
        $sql = "SELECT username_user FROM users WHERE username_user = '$username'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql)->fetch_object();
        connect::close($conn);
        return $res;
    }

    function select_email($email)
    {
        $sql = "SELECT email_user FROM users WHERE email_user = '$email'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql)->fetch_object();
        connect::close($conn);
        return $res;
    }

    function register($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $pass = $data['password'];
        $img = $data['img'];

        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);
        // $hashavatar = md5(strtolower(trim($username)));
        // $avatar = "https://robohash.org/$hashavatar";

        $switch = false;
        $id = null;
        $conn = connect::con();
        while (!$switch) { // Genera id random
            $id = Utils::gen_id(6);
            $search = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }

        $sql = "INSERT INTO `users`(`id_user`, `username_user`, `email_user`, `password_user`, `type_user`, `avatar_user`)
        VALUES ('$id', '$username','$email','$hashed_pass','client', '$img')";

        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_user($username)
    {
        $sql = "SELECT * FROM users WHERE username_user = '$username' or email_user = '$username'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql)->fetch_object();
        connect::close($conn);
        return $res;
    }

    function infBut($token)
    {
        $id = $token['id_usr'];
        $sql = "SELECT avatar_user as img_user, username_user as username FROM users WHERE id_user = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql)->fetch_object();
        connect::close($conn);
        return $res;
    }

    function login($data)
    {
        $rdo = $this->select_user($data['usr']);
        $pass = $rdo->password_user;
        if (password_verify($data['password'], $pass)) {
            $inifile = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/secret.ini');
            $header = $inifile['header'];
            $secret = $inifile['secret'];
            $payload = '{"iat":"' . time() . '","exp":"' . time() + (10 * 60) . '","id_usr":"' . $rdo->id_user . '"}';
            $JWT = new JWT;
            $token = $JWT->encode($header, $payload, $secret);

            $_SESSION['id_usr'] = $rdo->id_user;
        } else {
            $token = false;
        }

        return $token;
    }

    function refresh_token($id)
    {
        $inifile = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/secret.ini');
        $header = $inifile['header'];
        $secret = $inifile['secret'];
        $payload = '{"iat":"' . time() . '","exp":"' . time() + (10 * 60) . '","id_usr":"' . $id . '"}';
        $JWT = new JWT;
        $token = $JWT->encode($header, $payload, $secret);
        return $token;
    }
}
