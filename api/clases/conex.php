<?php
	class Conexx{
    	public static function cBd(){
			$bd = new PDO("mysql:host=localhost;dbname=prueba","root","");
			return $bd;
		}
    }
?>
