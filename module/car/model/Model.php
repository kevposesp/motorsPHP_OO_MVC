<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Model {

    function delete_model($id){
        $sql = "DELETE FROM models WHERE id_model = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function save_model($data) {
        $name = $data['name'];
        $mark = $data['mark'];
        // $img = $data['img'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){
            $id = Utils::gen_id(6);
            $search = mysqli_query($conn, "SELECT * FROM models WHERE id_model = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }
        $sql = "INSERT INTO models (id_model, name_model, img_model, mark_model) VALUES ('$id', '$name', '/', '$mark')";
        $res['status'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_models_by_mark($mark){
        $sql = "SELECT * FROM models where mark_model = '$mark'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
}