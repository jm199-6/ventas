<?php
    require_once "conex.php";
	class Cargo {
		private $codigo; //varchar 6
		private $nombre; //varchar 150
		

		public function __construct($nombre){
			$this->nombre = $nombre ;
		}

		public function addCargo(){
			$res = Conexx::cBd()->prepare("INSERT INTO cargo (nombre) VALUES ('".$this->nombre."');");
			
			if($res->execute()){
				return $res->rowCount();
			}
		}

		public static function delCargo($id){
			$res = Conexx::cBd()->prepare("DELETE from cargo WHERE codigo = '".$id."';");

			if($res->execute()){
				return $res->rowCount();
			}
		}

		public static function getCargo(){
			$sql = "SELECT * FROM cargo;";
			$res = Conexx::cBd()->prepare($sql);

			if($res->execute()){
				return $res->fetchAll();
			}
		}

		public static function getCargoById($id){
			$sql = "SELECT *  FROM cargo WHERE codigo='".$id."';";
			$res = Conexx::cBd()->prepare($sql);
			if ($res->execute()){
				return $res->fetch();
			}
		}

		public function updCargo($id){
			$res = Conexx::cBd()->prepare("UPDATE cargo SET nombre = '".$this->nombre."' where codigo='".$id."';");

			if($res->execute()){
				return $res->rowCount();
			}
		}
	}
?>
