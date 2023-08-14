<?php
	class Conexx{
    	public static function cBd(){
			$bd = new PDO("mysql:host=localhost;dbname=ventas","root","");
			return $bd;
		}
    }
?>
