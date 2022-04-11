<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Mark {

    function delete_mark($id){
        $sql = "DELETE FROM marks WHERE id_mark = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function save_mark($data) {
        $name = $data['name'];
        // $img = $data['img'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){
            $id = Utils::gen_id(6);
            $search = mysqli_query($conn, "SELECT * FROM marks WHERE id_mark = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }
        $sql = "INSERT INTO marks (id_mark, name_mark) VALUES ('$id', '$name')";
        $res['status'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_marks(){
        $sql = "SELECT * FROM marks";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
}