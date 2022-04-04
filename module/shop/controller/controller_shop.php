<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "module/shop/model/Shop.php");

switch ($_GET['op']) {
    case 'list_cars':
        try {
            $dcar = new Shop();
            $cars = $dcar->select_all_car();
        } catch (Exception $e) {
            echo json_encode("error");
        }
        if (!$cars) {
            echo json_encode("error");
        } else {
            $rows = array();
            while ($r = mysqli_fetch_assoc($cars)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        // echo json_encode("hola");
        break;
    case 'list_cars_with_names':
        try{
            $dcar = new Shop();

            if (isset($_POST['filters'])) {
                $filters = $_POST['filters'];
                // $filters = "typeFuels:07d527c8ad42:false,typeFuels:9f3583a4320e:false,typeFuels:d7d515e14978:false,categories:2669b5225df0:true,categories:366d677ae0bc:false,categories:3af7467ea594:false,categories:44dd6f8f67aa:false,categories:519b3c1ba4f8:false,categories:61ffb8567a0c:false,categories:6bdddc945707:false,categories:d37cb1f9db88:false,categories:e95eb7d7a42c:false,categories:f96a5090f3bb:false,marks:7050e61205df:false,marks:758750ab8cbf:false,marks:88f0c2840305:false,marks:8cccb99e8605:false,marks:9311f4f64240:false,marks:cb8758919ec6:false,marks:d991f4b6322d:false,marks:ecd4e3424dcd:false,attributes:0d4a1374ac8c:false,attributes:15bfdaa74445:false,attributes:dffc6662ecde:false";
                $fil_arr = explode(',', $filters);
                $arr = [];
                $fil_da = [];
                foreach ($fil_arr as $f) {
                    array_push($fil_da, explode(':', $f));
                }
                foreach ($fil_da as $f) {
                    if (!isset($arr[$f[0]])) {
                        $arr[$f[0]] = [];
                        array_push($arr[$f[0]], $f[1] . ":" . $f[2]);
                    } else {
                        array_push($arr[$f[0]], $f[1] . ":" . $f[2]);
                    }
                }
                $cars = $dcar->select_all_car_with_names($arr, $_POST['items_page'], $_POST['total_prod']);
                // echo json_encode($arr);
            } else {
                $arr = null;
                $cars = $dcar->select_all_car_with_names($arr, $_POST['items_page'], $_POST['total_prod']);
            }
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$cars){
            echo json_encode("error");
        }else{
            $car = array();
            $all_cars = array();
            while($c = mysqli_fetch_assoc($cars['data'])) {
                $car['data'] = $c;
                // images
                    $rdo_images = $dcar->select_imgs_car($c['id_car']);
                    $images = array();
                    while($i = mysqli_fetch_assoc($rdo_images)) {
                        $images[] = $i['url_img'];
                    }
                    $car['imgs'] = $images;

                    $all_cars['data'][] = $car;
                    unset($car);
            }
            $all_cars['count'] = $cars['count'];
            echo json_encode($all_cars);
        }
        // echo json_encode($_POST);
        // echo json_encode($cars);
        break;
    case 'read_releated_by_mark':
        try {
            $dcar = new Shop();
            $cars = $dcar->select_releateds_by_mark($_GET['id_mark'], $_GET['id_car']);
        } catch (Exception $e) {
            echo json_encode($e);
        }
        if(!$cars){
            echo json_encode("error");
        }else{
            $car = array();
            while($c = mysqli_fetch_assoc($cars)) {
                $car[] = $c;
            }
            echo json_encode($car);
        }
        // echo json_encode($cars);
        break;
    case 'read_car':
        try {
            $dcar = new Shop();
            $rdo = $dcar->select_car($_GET['id']);
            $rdo_images = $dcar->select_imgs_car($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error: " + $e);
        }

        if ($rdo && $rdo_images) {
            $images = array();
            while ($i = mysqli_fetch_assoc($rdo_images)) {
                $images[] = $i['url_img'];
            }
            $car = get_object_vars($rdo);
            $res = array();
            $res['data'] = $car;
            $res['imgs'] = $images;
            echo json_encode($res);
        } else {
            echo json_encode("error");
        }
        // echo json_encode("Llega");
        break;
    case 'getFilters':
        $dcar = new Shop();
        try {
            $type_fuels = $dcar->get_type_fuels();
        } catch (Exception $e) {
            echo json_encode("error: " + $e);
        }

        try {
            $categories = $dcar->get_categories();
        } catch (Exception $e) {
            echo json_encode("error: " + $e);
        }

        try {
            $marks = $dcar->get_marks();
        } catch (Exception $e) {
            echo json_encode("error: " + $e);
        }

        try {
            $attributes = $dcar->get_attributes();
        } catch (Exception $e) {
            echo json_encode("error: " + $e);
        }

        if ($type_fuels && $categories && $marks && $attributes) {
            while ($t = mysqli_fetch_assoc($type_fuels)) {
                $filters['typeFuels'][] = $t;
            }
            while ($c = mysqli_fetch_assoc($categories)) {
                $filters['categories'][] = $c;
            }
            while ($m = mysqli_fetch_assoc($marks)) {
                $filters['marks'][] = $m;
            }
            while ($a = mysqli_fetch_assoc($attributes)) {
                $filters['attributes'][] = $a;
            }
            echo json_encode($filters);
        } else {
            echo json_encode("error");
        }
        // echo json_encode("Llega");
        break;
    case 'list':
        include("module/shop/view/index.html");
        break;
    default:
        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=shop");
        break;
}
