<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "module/car/model/Car.php");

switch ($_GET['op']) {
    case 'read_modal':
        try{
            $dcar = new Car();
            $rdo = $dcar->select_car($_GET['id']);
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$rdo){
            echo json_encode("error");
        }else{
            $car=get_object_vars($rdo);
            echo json_encode($car);
        }
        break;
    case 'create_dummies';
        try {
            $car = new Car();
            $rdo = $car->create_dummies(50);
            // Debug::console_log($rdo);
        } catch (Exception $e) {
            Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:create_dummies");
        }
        if ($rdo) {
            Utils::callback("index.php?module=car&op=list&act_dum=correct");
        } else {
            Utils::callback("index.php?module=error_logs&op=save&type=404&desc=not_found&org=car:create_dummies");
        }
    break;
    case 'delete_all';
        try {
            $car = new Car();
            $rdo = $car->delete_all();
            // Debug::console_log($rdo);
        } catch (Exception $e) {
            Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:delete_all");
        }
        if ($rdo) {
            Utils::callback("index.php?module=car&op=list&act_da=correct");
        } else {
            Utils::callback("index.php?module=error_logs&op=save&type=503&desc=not_found&org=car:delete_all");
        }
    break;
    case 'list';
        // Debug::console_log("Llega");
        try {
            $car = new Car();
            Debug::console_log("Va");
            $rdo = $car->select_all_car();
            
        } catch (Exception $e) {
            Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:list");
        }

        if ($rdo) {
            include("module/car/view/list_car.php");
        } else {
            Utils::callback("index.php?module=error_logs&op=save&type=503&desc=not_found&org=car:list");
        }

        break;
    case 'create';
        // $errors;
        // include("module/car/model/validate.php");
        if (isset($_POST) && !empty($_POST)) {
            // $errors['check'] = true;
            // if ($errors['check']) {
                try {
                    $car = new Car();
                    $rdo = $car->save_car($_POST, false);
                } catch (Exception $e) {
                    // Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:create");
                    echo json_encode($e);
                }

                if ($rdo['status'] && $rdo['status_atts']) {
                    echo json_encode(true);
                } else {
                    echo json_encode(false);
                }
                // echo json_encode($rdo);
                // echo json_encode($_POST);
            // } else {
            //     Debug::console_log("Error al validar");
            // }
            // echo json_encode(Utils::gen_id(6));
        }
        // echo json_encode($_POST);
        break;
    // case 'create';
    //     if (isset($_POST) && !empty($_POST)) {
    //         echo json_encode($_POST);
    //     }
    //     break;
    case 'read';
        try {
            $dcar = new Car();
            $car = $dcar->select_car($_GET['id']);
            // Debug::console_log($car->mark);
        } catch (Exception $e) {
            Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:read");
        }
        if ($car){
            include("module/car/view/read_car.php");
        } else if($car == null) {
            Utils::callback("index.php?module=error_logs&op=save&type=404&desc=id_not_found&org=car:read");
        }
        break;
    case 'delete';
        if (isset($_POST['delete'])) {
            try {
                $car = new Car();
                $rdo = $car->delete_car($_GET['id']);
            } catch (Exception $e) {
                Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:delete");
            }

            if ($rdo) {
                Utils::callback("index.php?module=car&op=list&act_d=correct");
            } else if ($rdo == null) {
                Utils::callback("index.php?module=error_logs&op=save&type=404&desc=id_not_found&org=car:delete");
            }
        }

        include("module/car/view/delete_car.php");
        break;
    case 'update';
    
        $errors;
        include("module/car/model/validate.php");

        $id = $_GET['id'];
        
        if (isset($_POST) && !empty($_POST)) {
            // die(Debug::console_log("llega"));
            $errors = validate();

            if ($errors['check']) {
                try {
                    $dcar = new Car();
                    $car = $dcar->update_car($_POST);
                } catch (Exception $e) {
                    Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=car:list");
                }
                // die(Debug::console_log("llega"));

                if ($car['status']) {
                    Utils::callback("index.php?module=car&op=list&act_u=correct");
                } else {
                    if($car['error'] == "error_framenumber_duplicate") {
                        $errors['framenumber'] = "Este codigo ya existe";
                    } else {
                        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=id_not_found&org=car:update");
                    }
                }
            }
        }

        try {
            $dcar = new Car();
            $car = $dcar->select_car($_GET['id']);
        } catch (Exception $e) {
            Utils::callback("index.php?module=error_logs&op=save&type=404&desc=$e&org=car:updates");
        }

        include("module/car/view/update_car.php");

        break;
    case 'dash':
        include("module/car/view/dashboard.html");
        break;
    default;
        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=car");
        break;
}
