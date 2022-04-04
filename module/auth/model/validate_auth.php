<?php

    function validate_email($email){
        $auth = new Auth();
        if($auth->select_email($email)){
            $check=false;
        } else {
            $check=true;
        }
        return $check;
    }

    function validate_username($username){
        $auth = new Auth();
        if($auth->select_username($username)){
            $check=false;
        } else {
            $check=true;
        }
        return $check;
    }

    function validate_usr($username){
        $auth = new Auth();
        if($auth->select_usr($username)){
            $check=false;
        } else {
            $check=true;
        }
        return $check;
    }

    function validate_regex($reg, $string){
        return preg_match($reg,$string);
    }

    function validate($data){

        $errors['check'] = true;

        $username = $data['username'];
        $r_username = validate_username($username);

        $email = $data['email'];
        $r_email = validate_email($email);

        $password = $data['password'];
        
        if(!$r_username){
            $error_username = " * El username ya existe";
            $errors['check'] = false;
            $errors['username'] = $error_username;
        }else{
            if(!validate_regex('/^[a-zA-Z0-9\_]{1,}$/', $username)) {
                $error_username = "Error en los carácteres";
                $errors['check'] = false;
                $errors['username'] = $error_username;
            } else {
               $error_username = ""; 
            }
        }

        if(!$r_email){
            $error_email = " * El email ya existe";
            $errors['check'] = false;
            $errors['email'] = $error_email;
        }else{
            if(!validate_regex('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) {
                $error_email = "Error en los carácteres";
                $errors['check'] = false;
                $errors['email'] = $error_email;
            } else {
                $error_email = ""; 
            }
        }

        if(!validate_regex('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/', $password)) {
            $error_password = "Error en los carácteres";
            $errors['check'] = false;
            $errors['password'] = $error_password;
        } else {
            $error_password = ""; 
        }
        
        return $errors;
    }

    function validate_login($data) {
        $errors['check'] = true;

        $username = $data['usr'];
        $r_username = validate_usr($username);

        $password = $data['pssw'];
        
        if(!$r_username){
            $error_username = " * El username ya existe";
            $errors['check'] = false;
            $errors['username'] = $error_username;
        }else{
            if(!validate_regex('/^[a-zA-Z0-9\_]{1,}$/', $username)) {
                $error_username = "Error en los carácteres";
                $errors['check'] = false;
                $errors['username'] = $error_username;
            } else {
               $error_username = ""; 
            }
        }

        if(!validate_regex('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/', $password)) {
            $error_password = "Error en los carácteres";
            $errors['check'] = false;
            $errors['password'] = $error_password;
        } else {
            $error_password = ""; 
        }
        
        return $errors;
    }