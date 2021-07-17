<?php
    require_once "conex.php";
	class Empresa {

		private $nombreJ;
		private $nombreC;
		private $nit;
		private $nrc;
		private $giro;
		private $logo;

		public function __construct($nombreJ, $nombreC, $nit, $nrc, $giro, $logo){

			$this->nombreJ = $nombreJ;
			$this->nombreC = $nombreC ;
			$this->nit = $nit;
			$this->nrc = $nrc;
			$this->giro = $giro ;
			$this->logo = $logo;
		}

		public function addEmpresa(){
			$res = Conexx::cBd()->prepare("INSERT INTO empresa (nombreJ, nombreC, giro, nit, nrc, logo) VALUES ('".$this->nombreJ."', '".$this->nombreC."', '".$this->giro."', '".$this->nit."', '".$this->nrc."', '".$this->logo."');");
			
			if($res->execute()){
				return $res->rowCount();
			}
		}

		public static function delEmpresa($id){
			$res = Conexx::cBd()->prepare("DELETE from empresa WHERE codigo = '".$id."';");

			if($res->execute()){
				return $res->rowCount();
			}
		}

		public static function getEmpresa(){
			$sql = "SELECT * FROM empresa;";
			$res = Conexx::cBd()->prepare($sql);

			if($res->execute()){
				return $res->fetchAll();
			}
		}

		public static function getEmpresaById($id){
			$sql = "SELECT *  FROM empresa WHERE codigo='".$id."';";
			$res = Conexx::cBd()->prepare($sql);
			if ($res->execute()){
				return $res->fetch();
			}
		}

		public function updEmpresa($id){
			$res = Conexx::cBd()->prepare("UPDATE empresa SET nombreJ = '".$this->nombreJ."', nombreC = '".$this->nombreC."', giro = '".$this->giro."', nit = '".$this->nit."', nrc = '".$this->nrc."', logo = '".$this->logo."' WHERE codigo = '".$id."';");

			if($res->execute()){
				return $res->rowCount();
			}
		}
	}
?>
