<?php

	header("Content-Type: APPLICATION/JSON");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, DELETE, UPDATE');
	// Indica los encabezados permitidos.
	header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Origin, XMLHttpRequest');

	require_once "clases/cargo.php";
	$client = array('tipo'=>$_SERVER["REQUEST_METHOD"],
					'server_addr'=>$_SERVER["SERVER_ADDR"],
					'server_port'=>$_SERVER["SERVER_PORT"],
					'remote_addr'=>$_SERVER["REMOTE_ADDR"],
					'remote_port'=>$_SERVER["REMOTE_PORT"],
						);
	$datosCrg=array();
	switch ($_SERVER["REQUEST_METHOD"]){
		case "GET":
		//$datostda=array();
		    if(isset($_GET["id"])){
				$crg=Cargo::getCargoById($_GET["id"]);
				if ($crg){
					$datosCrg=array("codigo"=>$crg["codigo"], "nombre"=>$crg["nombre"]);
				}
			}else{
				$crg=Cargo::getCargo();
				if($crg){
				foreach ($crg as $key => $value){
					$datosCrg[]=array("codigo"=>$value["codigo"], "nombre"=>$value["nombre"]);
				}
				}
			}
			echo json_encode($datosCrg);
		break;
		case "POST":
			$data = file_get_contents("php://input");
			$_POST = json_decode($data,true);

			$crg= new Cargo($_POST["nombre"]);
			$rows=$crg->addCargo();
			if($rows==1){
				$msg = array("result" => "Cargo Agregada");
			}else{
				$msg = array("result" => "Error al agregar Cargo");
			}
			echo json_encode($msg);
		break;
		case "PUT":
			$_PUT = json_decode(file_get_contents("php://input"),true);
			if(isset($_GET["id"])){
				$crg= new Cargo($_PUT["nombre"]);
				$result = $crg -> updCargo($_GET["id"]);
				if($result>0){
					$msg = array("result" => "Datos de Cargo Actualizados");
				}
			}
			echo json_encode($msg);
		break;
		case "DELETE":
			if(isset($_GET["id"])){
				$result = Cargo::delCargo($_GET["id"]);
				if($result>0){
					$msg = array("result" => "Cargo Eliminado");
				}
			}
			echo json_encode($msg);
		break;
	}
?>
