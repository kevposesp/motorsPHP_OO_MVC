<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "module/category/model/Category.php");

switch ($_GET['op']) {
    case 'list_categories':
        try{
            $dcategory = new Category();
            if (isset($_GET['lim'])) {
                $categories = $dcategory->select_categories($_GET['lim']);
            } else {
                $categories = $dcategory->select_categories(false);
            }
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$categories){
            echo json_encode("error");
        }else{
            $rows = array();
            while($r = mysqli_fetch_assoc($categories)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        break;
    case 'create';
        if (isset($_POST) && !empty($_POST)) {
            try {
                $category = new Category();
                $rdo = $category->save_category($_POST);
            } catch (Exception $e) {
                Utils::callback("index.php?module=error_logs&op=save&type=503&desc=$e&org=category:create");
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
