<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class TypeFuel {

    function delete_type_fuel($id){
        $sql = "DELETE FROM type_fuel WHERE id_type_fuel = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function save_type_fuel($data) {
        $name = $data['name'];
        $title = $data['title'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){
            $id = Utils::gen_id(6);
            $search = mysqli_query($conn, "SELECT * FROM type_fuel WHERE id_type_fuel = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }
        $sql = "INSERT INTO type_fuel (id_type_fuel, name_type_fuel, title_type_fuel) VALUES ('$id', '$name', '$title')";
        $res['status'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_type_fuels($lim){

        if($lim) {
            $sql = "SELECT * FROM type_fuel LIMIT $lim";
        } else {
            $sql = "SELECT * FROM type_fuel";
        }
        
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
}