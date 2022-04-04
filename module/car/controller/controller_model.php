<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "module/car/model/Model.php");

switch ($_GET['op']) {
    case 'list_models_by_mark':
        try{
            $dmodel = new Model();
            $models = $dmodel->select_models_by_mark($_GET['mark']);
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$models){
            echo json_encode("error");
        }else{
            $rows = array();
            while($r = mysqli_fetch_assoc($models)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        break;
    case 'create';
        if (isset($_POST) && !empty($_POST)) {
            try {
                $model = new Model();
                $rdo = $model->save_model($_POST);
            } catch (Exception $e) {
                Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=model:create");
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
