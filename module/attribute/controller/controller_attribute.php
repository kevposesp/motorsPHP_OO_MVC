<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "module/attribute/model/Attributes.php");

switch ($_GET['op']) {
    case 'list_attributes':
        try{
            $dattribute = new Attributes();
            $attributes = $dattribute->select_attributes();
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$attributes){
            echo json_encode("error");
        }else{
            $rows = array();
            while($r = mysqli_fetch_assoc($attributes)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        break;
    case 'create';
        if (isset($_POST) && !empty($_POST)) {
            try {
                $attribute = new Attributes();
                $rdo = $attribute->save_attribute($_POST);
            } catch (Exception $e) {
                Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=attribute:create");
            }

            if ($rdo['status']) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        }
        // echo json_encode("Llega");
        break;
    default;
        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=car");
        break;
}
