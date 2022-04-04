<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Shop {

    function select_all_car(){
        $sql = "SELECT * FROM cars";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_all_car_with_names($arr, $items_page, $total_prod){
        $sql = "SELECT c.*, m.name_model, m.img_model, mm.name_mark, mm.img_mark, tf.name_type_fuel,
        tf.title_type_fuel, tf.img_type_fuel, cc.name_category, cc.title_category, cc.description_category,
        cc.img_category, cc.icon_category FROM cars c
        left join models m on (c.model_car = m.id_model)
        left join marks mm on (m.mark_model = mm.id_mark)
        left join type_fuel tf on (c.fuel_type_car = tf.id_type_fuel)
        left join categories cc on (c.category_car = cc.id_category)";
        $ids_tf = [];
        $ids_cc = [];
        $ids_mm = [];
        $ids_att = [];
        $city = null;
        $order = null;

        if (isset($arr['typeFuels'])) {
            foreach ($arr['typeFuels'] as $f) {
                $tf = explode(':', $f);
                if ($tf[1] == "true") {
        //             array_push($ids, $tf[0]);
                    array_push($ids_tf, $tf[0]);
                }
            }
            
        }
        
        if (isset($arr['categories'])) {
            foreach ($arr['categories'] as $c) {
                $cc = explode(':', $c);
                if ($cc[1] == "true") {
                    array_push($ids_cc, $cc[0]);
                }
            }
        }

        if (isset($arr['marks'])) {
            foreach ($arr['marks'] as $m) {
                $mm = explode(':', $m);
                if ($mm[1] == "true") {
                    array_push($ids_mm, $mm[0]);
                }
            }
        }

        if (isset($arr['attributes'])) {
            foreach ($arr['attributes'] as $a) {
                $aa = explode(':', $a);
                if ($aa[1] == "true") {
                    array_push($ids_att, $aa[0]);
                }
            }
        }

        if (isset($arr['city'])) {
            foreach ($arr['city'] as $a) {
                $aa = explode(':', $a);
                if ($aa[1] == "true") {
                    $city = $aa[0];
                }
            }
        }

        if (isset($arr['order'])) {
            foreach ($arr['order'] as $a) {
                $aa = explode(':', $a);
                if ($aa[1] == "true") {
                    $order = $aa[0];
                }
            }
        }
        
        $sql2 = "";
        if(!empty($ids_tf)){
            $sql2 = " where c.fuel_type_car in('".implode("','",$ids_tf)."')";
        }

        if(!empty($ids_cc) && $sql2 == ""){
            $sql2 = " where c.category_car in('".implode("','",$ids_cc)."')";
        } elseif(!empty($ids_cc) && $sql2 != "") {
            $sql2 .= " and c.category_car in('".implode("','",$ids_cc)."')";
        }

        if(!empty($ids_mm) && $sql2 == ""){
            $sql2 = " where mm.id_mark in('".implode("','",$ids_mm)."')";
        } elseif(!empty($ids_mm) && $sql2 != "") {
            $sql2 .= " and mm.id_mark in('".implode("','",$ids_mm)."')";
        }

        if(!empty($ids_att) && $sql2 == ""){
            $sql2 = " where c.id_car in (
                                        select car_cha from car_have_attribute
                                        where attribute_cha in ('".implode("','",$ids_att)."')
                                        )";
        } elseif(!empty($ids_att) && $sql2 != "") {
            $sql2 .= " and c.id_car in (
                                        select car_cha from car_have_attribute
                                        where attribute_cha in ('".implode("','",$ids_att)."')
                                        )";
        }

        if($city != null && $sql2 != "") {
            $sql2 .= " and c.city_car like '". $city ."'";
        } elseif($city != null && $sql2 == "") {
            $sql2 = " where c.city_car like '%".$city."%'";
        }

        if($order == "price") {
            $sql2 .= " order by c.price_car, c.count desc";
        } elseif($order == "km") {
            $sql2 .= " order by c.km_car, c.count desc";
        } elseif($order == null) {
            $sql2 .= " order by c.count desc";
        }

        $conn = connect::con();
        // $res['count'] = 0;
        $res['count'] = mysqli_query($conn, $sql.$sql2)->num_rows;
        $sql2 .= " limit $total_prod, $items_page";

        $sql .= $sql2;
        
        
        $res['data'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
        // return $sql;
    }
    
    function select_car($id){
        $sql = "SELECT c.*, m.name_model, mm.name_mark, mm.img_mark, tf.name_type_fuel,
        cc.name_category, cc.icon_category, mm.id_mark
        FROM cars c
        left join models m on (c.model_car = m.id_model)
        left join marks mm on (m.mark_model = mm.id_mark)
        left join type_fuel tf on (c.fuel_type_car = tf.id_type_fuel)
        left join categories cc on (c.category_car = cc.id_category)
        WHERE id_car = '$id'";
        $conexion = connect::con();

        $visited = "UPDATE cars SET count = count + 1 WHERE (`id_car` = '$id');";
        $vis = mysqli_query($conexion, $visited);

        $res = mysqli_query($conexion, $sql)->fetch_object();
        connect::close($conexion);
        return $res;
    }

    function select_releateds_by_mark($id_mark, $id_car) {
        $sql = "SELECT c.*, m.name_model, m.img_model, mm.name_mark, mm.img_mark, tf.name_type_fuel,
        tf.title_type_fuel, tf.img_type_fuel, cc.name_category, cc.title_category, cc.description_category,
        cc.img_category, cc.icon_category, i.* FROM cars c
        left join models m on (c.model_car = m.id_model)
        left join marks mm on (m.mark_model = mm.id_mark)
        left join type_fuel tf on (c.fuel_type_car = tf.id_type_fuel)
        left join categories cc on (c.category_car = cc.id_category)
        inner join img_cars i on (c.id_car = i.id_car)
        ";
        $sql .= " where mm.id_mark = '$id_mark'";
        $sql .= " and c.id_car <> '$id_car'";
        $sql .= " group by c.id_car";

        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_imgs_car($id) {
        $sql = "SELECT url_img
        FROM img_cars
        WHERE id_car = '$id'";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        if (!$res) {
            echo json_encode($conexion->error);
        }
        connect::close($conexion);
        return $res;
    }

    // Filters {
        function get_type_fuels(){
            $sql = "SELECT id_type_fuel as id, name_type_fuel as name FROM type_fuel";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        function get_categories(){
            $sql = "SELECT id_category as id, name_category as name FROM categories";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        function get_marks(){
            $sql = "SELECT id_mark as id, name_mark as name FROM marks";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        function get_attributes(){
            $sql = "SELECT id_attribute as id, name_attribute as name FROM attributes";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
    // }

}