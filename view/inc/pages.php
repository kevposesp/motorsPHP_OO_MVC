<?php
	if (isset($_GET['module'])) {
		switch($_GET['module']){
		case "home";
			include("module/home/controller/controller_".$_GET['module'].".php");
			break;
		case "auth";
			include("module/auth/controller/controller_".$_GET['module'].".php");
			break;
		case "shop";
			include("module/shop/controller/controller_".$_GET['module'].".php");
			break;
		case "car";
			include("module/car/controller/controller_".$_GET['module'].".php");
			break;
		case "error_logs";
			include("module/error_logs/controller/controller_".$_GET['module'].".php");
			break;
		default;
			include("module/home/controller/controller_".$_GET['module'].".php");
			break;
		}
	} else {
		include("module/home/controller/controller_home.php");
	}
	
?>