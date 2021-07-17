<?php
    require_once "conex.php";
	class Tienda {
		private $codigo; //varchar 6
		private $nombre; //varchar 150
		private $direccion; //varchar 150
		private $telefono; //vaarchar 9
		private $idEmpresa; //int 3

		public function __construct($codigo, $nombre, $direccion, $telefono, $idEmpresa){

			$this->codigo = $codigo;
			$this->nombre = $nombre ;
			$this->direccion = $direccion;
			$this->telefono = $telefono ;
			$this->idEmpresa = $idEmpresa;
		}

		public function addTienda(){
			$res = Conexx::cBd()->prepare("INSERT INTO tienda (codigo, nombre, telefono, direccion, idEmpresa) VALUES ('".$this->codigo."', '".$this->nombre."', '".$this->telefono."', '".$this->direccion."', '".$this->idEmpresa."');");
			
			if($res->execute()){
				return $res->rowCount();
			}
		}

		public static function delTienda($id){
			$res = Conexx::cBd()->prepare("DELETE from tienda WHERE codigo = '".$id."';");

			if($res->execute()){
				return $res->rowCount();
			}
		}

		public static function getTienda(){
			$sql = "SELECT * FROM tienda;";
			$res = Conexx::cBd()->prepare($sql);

			if($res->execute()){
				return $res->fetchAll();
			}
		}

		public static function getTiendaById($id){
			$sql = "SELECT *  FROM tienda WHERE codigo='".$id."';";
			$res = Conexx::cBd()->prepare($sql);
			if ($res->execute()){
				return $res->fetch();
			}
		}

		public function updTienda($id){
			$res = Conexx::cBd()->prepare("UPDATE tienda SET codigo = '".$this->codigo."', nombre = '".$this->nombre."', telefono = '".$this->telefono."', direccion = '".$this->direccion."', idEmpresa = '".$this->idEmpresa."' WHERE codigo = '".$id."';");

			if($res->execute()){
				return $res->rowCount();
			}
		}
	}
?>
