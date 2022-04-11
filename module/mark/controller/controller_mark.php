<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "module/mark/model/Mark.php");

switch ($_GET['op']) {
    case 'list_marks':
        try{
            $dmark = new Mark();
            $marks = $dmark->select_marks();
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$marks){
            echo json_encode("error");
        }else{
            // echo json_encode($marks);
            $rows = array();
            while($r = mysqli_fetch_assoc($marks)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        break;
    case 'create';
        if (isset($_POST) && !empty($_POST)) {
            try {
                $mark = new Mark();
                $rdo = $mark->save_mark($_POST);
            } catch (Exception $e) {
                // Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=mark:create");
                echo json_encode($e);
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
        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=mark");
        break;
}
