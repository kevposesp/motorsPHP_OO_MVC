<?php
    
    function validate_string($string){
        $reg="/^[a-zA-Z\-\ ]*$/";
        return preg_match($reg,$string);
    }
    function validate_model($model){
        $reg="/^[a-zA-Z0-9\ ]*$/";
        return preg_match($reg,$model);
    }
    function validate_int($int){
        $reg="/[0-9]{1,}$/";
        return preg_match($reg,$int);
    }
    function validate_float($float){
        $reg="/[0-9]{1,}.[0-9]{1,2}$/";
        return preg_match($reg,$float);
    }

    function validate(){

        $errors['check'] = true;

        $mark = $_POST['mark'];
        $model = $_POST['model'];
        $cv = $_POST['cv'];
        $manufacturingdate = $_POST['manufacturingdate'];
        $km = $_POST['km'];
        $price = $_POST['price'];
        
        $r_mark = validate_string($mark);
        $r_model = validate_model($model);
        $r_cv = validate_int($cv);
        $r_km = validate_int($km);
        $r_price = validate_float($price);
        
        if($r_mark !== 1){
            $error_mark = " * La marca no es valida";
            Debug::console_log($error_mark);
            $errors['check'] = false;
            $errors['mark'] = $error_mark;
        }else{
            $error_mark = "";
        }
        if($r_model !== 1){
            $error_model = " * El modelo no es valido";
            Debug::console_log($error_model);
            $errors['check'] = false;
            $errors['model'] = $error_model;
        }else{
            $error_model = "";
        }
        if($r_cv !== 1){
            $error_cv = " * Cv no valido";
            Debug::console_log($error_cv);
            $errors['check'] = false;
            $errors['cv'] = $error_cv;
        }else{
            $error_cv = "";
        }

        if(!$r_km){
            $error_km = " * Los kilometros no son validos";
            Debug::console_log($error_km);
            $errors['check'] = false;
            $errors['km'] = $error_km;
        }else{
            $error_km = "";
        }

        if(!$r_price){
            $error_price = " * El precio no es valido";
            Debug::console_log($error_price);
            $errors['check'] = false;
            $errors['price'] = $error_price;
        }else{
            $error_price = "";
        }

        return $errors;
    }