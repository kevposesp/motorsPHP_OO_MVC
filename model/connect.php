<?php
	class connect{
		public static function con(){
			$host = 'localhost';  
    		$user = "root";                     
    		$pass = "@Admin123";                             
    		$db = "motors";                      
    		$port = 3306;
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die("error de conexion");
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}

	}