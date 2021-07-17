<?php
	class EmpleadoM extends conexionBD {
		public static function getInfo($dui){
			$sql = "select * from empleado where dui = '".$dui."'";
			$pdo = conexionBD::cBD()->prepare($sql);
			$pdo->execute();
			return $pdo->fetch();
		}
	}
?>