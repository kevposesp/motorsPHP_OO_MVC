<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Car {
    function save_car($data, $dum) {

        $model = $data['model'];
        $cv = $data['cv'];
        $manufacturingdate = $data['manufacturingdate'];
        $km = $data['km'];
        $price = $data['price'];
        $framenumber = $data['framenumber'];
        $fuel = $data['fuel'];
        $overview = $data['overview'];
        $numcylinders = $data['numberofcylinders'];
        $doors = $data['doors'];
        $drive = $data['drive'];
        $color_ext = $data['color_ext'];
        $color_int = $data['color_int'];
        $category = $data['category'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){ // Genera id random
            $id = Utils::gen_id(6);
            $search = mysqli_query($conn, "SELECT * FROM cars WHERE id_car = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }

        $sql = "INSERT INTO cars (id_car, model_car, cv_car, manufacturingdate_car, km_car, fuel_type_car, overview_car,
        numberofcylinders_car, doors_car, color_ext_car, color_int_car, price_car, drive_car, framenumber_car, category_car)
        VALUES ('$id', '$model', '$cv', '$manufacturingdate', '$km', '$fuel', '$overview', '$numcylinders',
        '$doors', '$color_ext', '$color_int', '$price', '$drive', '$framenumber', '$category')";
        $res['status'] = mysqli_query($conn, $sql);
        
        if ($data['attributes'] != "") {
            $attributes = explode(",", $data['attributes']);
            $sql = "INSERT INTO car_have_attribute (attribute_cha, car_cha) VALUES ";
            foreach ($attributes as $key => $att) {
                $sql .= "('$att', '$id'),";
            }
            $sql = trim($sql, ',');
            $sql .= ";";
            $res['status_atts'] = mysqli_query($conn, $sql);
        } else {
            $res['status_atts'] = true;
        }

        $sql_image_name = "insert into img_cars (id_car, url_img) values 
        ('$id', '/cars/".$data['nameImage'].".jpg'),
        ('$id', '/cars/".$data['nameImage']."2.jpg'),
        ('$id', '/cars/".$data['nameImage']."3.jpg'),
        ('$id', '/cars/".$data['nameImage']."4.jpg'),
        ('$id', '/cars/".$data['nameImage']."5.jpg'),
        ('$id', '/cars/".$data['nameImage']."6.jpg');";
        $res['image_name'] = mysqli_query($conn, $sql_image_name);

        connect::close($conn);
        return $res;
    }

    function select_all_car(){
        $sql = "SELECT * FROM cars";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
    
    function select_car($id){
        $sql = "SELECT * FROM cars WHERE id = '$id'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql)->fetch_object();
        connect::close($conexion);
        return $res;
    }

    function update_car($data){
        $conn = connect::con();
        $id = $data['id'];
        $car = $this->select_car($id);
        $res['status'] = false;
        if ($car) { // Compruebo que existe el coche a actualizar
            $mark = $data['mark'];
            $model = $data['model'];
            $cv = $data['cv'];
            $manufacturingdate = $data['manufacturingdate'];
            $km = $data['km'];
            $price = $data['price'];
            $overview = $data['overview'];
            $numcylinders = $data['numcylinders'];
            $doors = $data['doors'];
            $drive = $data['drive'];
            $color_ext = $data['color_ext'];
            $color_int = $data['color_int'];
            $framenumber = $data['framenumber'];
            $fuel = $data['fuel'];

            if ($framenumber == $car->framenumber) {
                $sql = "UPDATE cars SET mark = '$mark', model = '$model', cv = '$cv', manufacturingdate = '$manufacturingdate', km = '$km',
                price = '$price', fuel = '$fuel', overview = '$overview', numberofcylinders = '$numcylinders', doors = '$doors', drive = '$drive',
                color_ext = '$color_ext', color_int = '$color_int'
                WHERE id = '$car->id'";
                $res['status'] = mysqli_query($conn, $sql);
            } else {
                $search_framenumber = mysqli_query($conn, "SELECT COUNT(*) FROM cars WHERE framenumber = '$framenumber'");
                // die(Debug::console_log(mysqli_fetch_assoc($search_framenumber)['COUNT(*)']));
                if (mysqli_fetch_assoc($search_framenumber)['COUNT(*)'] > 0) {
                    $res['error'] = 'error_framenumber_duplicate';
                    $res['status'] = false;
                } else {
                    $sql = "UPDATE cars SET mark = '$mark', model = '$model', cv = '$cv', manufacturingdate = '$manufacturingdate', km = '$km',
                    price = '$price', fuel = '$fuel', overview = '$overview', numberofcylinders = '$numcylinders', doors = '$doors',
                    drive = '$drive', color_ext = '$color_ext', color_int = '$color_int', framenumber = '$framenumber'
                    WHERE id = '$car->id'";
                    $res['status'] = mysqli_query($conn, $sql);
                }
            }
        }
        connect::close($conn);
        return $res;
    }

    function delete_car($id){
        $sql = "DELETE FROM cars WHERE id = '$id'";
        
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function delete_all(){
        $sql = "DELETE FROM cars";
        
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function create_dummies($num) {
        $res = true;
        for ($i=0; $i < $num; $i++) { 
            $r = $this->save_car(Utils::getDummie(), true);
            if (!$r) {
                $res = false;
            }
        }
        return $res;
    }

    function create_attribute($data) {
        $name = $data['name'];
        $title = $data['title'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){
            $id = Utils::gen_id(11);
            $search = mysqli_query($conn, "SELECT * FROM attributes WHERE id_attribute = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }
        $sql = "INSERT INTO attributes (id_attribute, name_attribute, title_attribute) VALUES ('$id', '$name', '$title')";
        $res['status'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
}