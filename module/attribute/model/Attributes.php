<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Attributes {

    function delete_attribute($id){
        $sql = "DELETE FROM attributes WHERE id_attribute = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function save_attribute($data) {
        $name = $data['name'];
        $title = $data['title'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){
            $id = Utils::gen_id(6);
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

    function select_attributes(){
        $sql = "SELECT * FROM attributes";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
}