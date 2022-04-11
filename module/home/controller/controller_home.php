<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/motors_PHP_OO_MVC/';
include($path . "module/home/model/Home.php");

if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case 'home':
            include("module/home/view/index.php");
            break;
        default;
            Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=car");
            break;
    }
} else {
    include("module/home/view/index.php");
}
