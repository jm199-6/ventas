<?php
	class UserM extends conexionBD {
		public static function login($userData,$table){
			$conn = new conexionBD();
			$sql = "select * from cuenta where dui = '".$userData["dui"]."'";
			$pdo = $conn->cBD()->prepare($sql);
			$pdo->execute();
			return $pdo->fetch();
		}
	}
?>