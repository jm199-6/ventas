<?php

	header("Content-Type: APPLICATION/JSON");
	require_once "clases/tienda.php";
	$client = array('tipo'=>$_SERVER["REQUEST_METHOD"],
					'server_addr'=>$_SERVER["SERVER_ADDR"],
					'server_port'=>$_SERVER["SERVER_PORT"],
					'remote_addr'=>$_SERVER["REMOTE_ADDR"],
					'remote_port'=>$_SERVER["REMOTE_PORT"],
						);
	$datosTda=array();
	switch ($_SERVER["REQUEST_METHOD"]){
		case "GET":
		//$datostda=array();
		    if(isset($_GET["id"])){
				$tda=Tienda::getTiendaById($_GET["id"]);
				if ($tda){
					$datosTda=array("codigo"=>$tda["codigo"], "nombre"=>$tda["nombre"], "direccion"=>$tda["direccion"], "telefono"=>$tda["telefono"], "idEmpresa"=>$tda["idEmpresa"], "status"=>"ok");
				}else{
					$datosTda=array("status"=>"No se encuentran registros");
				}
			}else{
				$tda=Tienda::getTienda();
				if($tda){
					foreach ($tda as $key => $value){
						$datosTda[]=array("codigo"=>$value["codigo"], "nombre"=>$value["nombre"], "direccion"=>$value["direccion"], "telefono"=>$value["telefono"], "idEmpresa"=>$value["idEmpresa"], "status"=>"ok");
					}
				}else{
					$datosTda=array("status"=>"No se encuentran registros");
				}
			}
			echo json_encode($datosTda);
		break;
		case "POST":
			$data = file_get_contents("php://input");
			$_POST = json_decode($data,true);

			$tda= new Tienda($_POST["codigo"], $_POST["nombre"], $_POST["direccion"], $_POST["telefono"], $_POST["idEmpresa"]);
			$rows=$tda->addTienda();
			if($rows==1){
				$msg = array("result" => "Tienda Agregada");
			}else{
				$msg = array("result" => "Error al agregar la Tienda");
			}
			echo json_encode($msg);
		break;
		case "PUT":
			$_PUT = json_decode(file_get_contents("php://input"),true);
			if(isset($_GET["id"])){
				$tda= new Tienda($_PUT["codigo"], $_PUT["nombre"], $_PUT["direccion"], $_PUT["telefono"], $_PUT["idEmpresa"]);
				$result = $tda -> updTienda($_GET["id"]);
				if($result>0){
					$msg = array("result" => "Datos de Tienda Actualizada");
				}
			}
			echo json_encode($msg);
		break;
		case "DELETE":
			if(isset($_GET["id"])){
				$result = Tienda::delTienda($_GET["id"]);
				if($result>0){
					$msg = array("result" => "Tienda Eliminada");
				}
			}
			echo json_encode($msg);
		break;
	}
?>
