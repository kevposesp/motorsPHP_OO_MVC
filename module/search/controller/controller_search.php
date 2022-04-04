<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/daw_php/programacion/motors/';
include($path . "module/search/model/Search.php");

switch ($_GET['op']) {
    case 'getSearchAttributes':
        try{
            $dsearch = new Search();
            $options = $dsearch->getSearchAttributes($_POST);
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$options){
            echo json_encode("error");
        }else{
            echo json_encode($options);
        }
        break;
    case 'getSearchBrands':
        try{
            $dsearch = new Search();
            $options = $dsearch->getSearchBrands($_POST);
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$options){
            echo json_encode("error");
        }else{
            echo json_encode($options);
        }
        break;
    case 'getSearchCity':
        try{
            $dsearch = new Search();
            $options = $dsearch->getSearchCity($_POST);
        }catch (Exception $e){
            echo json_encode("error");
        }
        if(!$options){
            echo json_encode("error");
        }else{
            echo json_encode($options);
        }
        break;
    default;
        Utils::callback("index.php?module=error_logs&op=save&type=404&desc=op_not_found&org=mark");
        break;
}
