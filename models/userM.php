<?php
	class UserM extends conexionBD {
		public static function login($userData,$table){
			$sql = "select * from cuenta where dui = '".$userData["dui"]."'";
			$pdo = conexionBD::cBD()->prepare($sql);
			$pdo->execute();
			return $pdo->fetch();
		}
	}
?>