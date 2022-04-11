<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "model/connect.php");
include($path . "model/utils.php");

class Category {

    function delete_category($id){
        $sql = "DELETE FROM categories WHERE id_category = '$id'";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function save_category($data) {
        $name = $data['name'];
        $title = $data['title'];
        $description = $data['overview'];
        // $img = $data['img'];
        $conn = connect::con();
        $switch = false;
        $id = null;
        while(!$switch){
            $id = Utils::gen_id(6);
            $search = mysqli_query($conn, "SELECT * FROM categories WHERE id_category = '$id'")->fetch_object();
            if ($search == null) {
                $switch = true;
            } else {
                $switch = false;
            }
        }
        $sql = "INSERT INTO categories (id_category, name_category, title_category, description_category, img_category) VALUES ('$id', '$name', '$title', '$description', '/')";
        $res['status'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_categories($limit){
        if($limit) {
            $sql = "SELECT * FROM categories LIMIT $limit";
        } else {
            $sql = "SELECT * FROM categories";
        }
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }
}