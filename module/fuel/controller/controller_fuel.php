<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "module/fuel/model/Fuel.php");

switch ($_GET['op']) {
    case 'list_type_fuels':
        try{
            $dtype_fuel = new TypeFuel();
            if(isset($_GET['lim'])) {
                $type_fuels = $dtype_fuel->select_type_fuels($_GET['lim']);
            } else {
                $type_fuels = $dtype_fuel->select_type_fuels(false);
            }
            
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$type_fuels){
            echo json_encode("error");
        }else{
            $rows = array();
            while($r = mysqli_fetch_assoc($type_fuels)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        // echo json_encode("llega");
        break;
    case 'create';
        if (isset($_POST) && !empty($_POST)) {
            try {
                $typefuel = new TypeFuel();
                $rdo = $typefuel->save_type_fuel($_POST);
            } catch (Exception $e) {
                Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=typefuel:create");
            }

            if ($rdo['status']) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        }
        // echo json_encode($_POST['name']);
        break;
    default;
        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=car");
        break;
}
