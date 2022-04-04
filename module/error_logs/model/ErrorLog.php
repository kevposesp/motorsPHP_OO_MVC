<?php

include('model/connect.php');
include('model/utils.php');

class ErrorLog {
    function save($data) {
        $conn = connect::con();
        $type = $data['type'];
        $description = $data['desc'];
        $origin = $data['org'];
        $sql = "INSERT INTO errorlogs (type, description, origin) VALUES ('$type', '$description', '$origin')";
        $res['status'] = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

    function select_errors(){
        $sql = "SELECT * FROM errorLogs ORDER BY created_at DESC";
        $conn = connect::con();
        $res = mysqli_query($conn, $sql);
        connect::close($conn);
        return $res;
    }

}