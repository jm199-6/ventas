<?php
	class EmpleadoM extends conexionBD {
		public static function getInfo($dui){
			$conn = new conexionBD();
			$sql = "select * from empleado where dui = '".$dui."'";
			$pdo = $conn->cBD()->prepare($sql);
			$pdo->execute();
			return $pdo->fetch();
		}
	}
?>