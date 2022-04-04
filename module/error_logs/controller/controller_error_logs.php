<?php
include("module/error_logs/model/ErrorLog.php");
switch ($_GET['op']) {
    case 'save';

        $data['type'];
        if (isset($_GET['type'])) {
            $data['type'] = $_GET['type'];
        } else {
            $data['type'] = null;
        }

        $data['desc'];
        if (isset($_GET['desc'])) {
            $data['desc'] = $_GET['desc'];
        } else {
            $data['desc'] = null;
        }

        $data['org'];
        if (isset($_GET['org'])) {
            $data['org'] = $_GET['org'];
        } else {
            $data['org'] = null;
        }

        $errorlog = new ErrorLog();
        $rdo = $errorlog->save($data);

        if ($data['type'] == "503") {
            Utils::callback("index.php?module=error_logs&op=503");
        } else {
            Utils::callback("index.php?module=error_logs&op=404");
        }

        break;
    case 'list';
        try {
            $errorlog = new ErrorLog();
            $rdo = $errorlog->select_errors();
        } catch (Exception $e) {
            Utils::callback("index.php?page=503");
        }

        if (!$rdo) {
            Utils::callback("index.php?page=503");
        } else {
            include("module/error_logs/view/list_errors.php");
        }
        break;
    case '503';
        include("module/error_logs/view/503.php");
        break;
    case '404';
        include("module/error_logs/view/404.php");
        break;
    default;
        include("view/inc/error404.php");
        break;
}
