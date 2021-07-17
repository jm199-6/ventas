<?php

	header("Content-Type: APPLICATION/JSON");
	require_once "clases/empresa.php";
	$client = array('tipo'=>$_SERVER["REQUEST_METHOD"],
					'server_addr'=>$_SERVER["SERVER_ADDR"],
					'server_port'=>$_SERVER["SERVER_PORT"],
					'remote_addr'=>$_SERVER["REMOTE_ADDR"],
					'remote_port'=>$_SERVER["REMOTE_PORT"],
						);
	$datosEmp=array();
	switch ($_SERVER["REQUEST_METHOD"]){
		case "GET":
		//$datostda=array();
		    if(isset($_GET["id"])){
				$emp=Empresa::getEmpresaById($_GET["id"]);
				if ($emp){
					$datosEmp=array("codigo"=>$emp["codigo"],"nombreJ"=>$emp["nombreC"], "giro"=>$emp["giro"], "nit"=>$emp["nit"], "nrc"=>$emp["nrc"], "logo"=>$emp["logo"]);
				}
			}else{
				$emp=Empresa::getEmpresa();
				if($emp){
					foreach ($emp as $key => $value){
						$datosEmp[]=array("codigo"=>$value["codigo"],"nombreJ"=>$value["nombreJ"], "nombreC"=>$value["nombreC"], "giro"=>$value["giro"], "nit"=>$value["nit"], "nrc"=>$value["nrc"], "logo"=>$value["logo"]);
					}
				}
				//$datosEmp["client"]=$client;
			}
			echo json_encode($datosEmp);
		break;
		case "POST":
			$data = file_get_contents("php://input");
			$_POST = json_decode($data,true);

			$emp= new Empresa($_POST["nombreJ"], $_POST["nombreC"], $_POST["nit"], $_POST["nrc"], $_POST["giro"], $_POST["logo"]);
			$rows=$emp->addEmpresa();
			if($rows==1){
				$msg = array("result" => "Empresa Agregada");
			}else{
				$msg = array("result" => "Error al agregar la Empresa");
			}
			echo json_encode($msg);
		break;
		case "PUT":
			$_PUT = json_decode(file_get_contents("php://input"),true);
			if(isset($_GET["id"])){
				$emp= new Empresa($_PUT["nombreJ"], $_PUT["nombreC"], $_PUT["nit"], $_PUT["nrc"], $_PUT["giro"], $_PUT["logo"]);
				$result = $emp -> updEmpresa($_GET["id"]);
				if($result>0){
					$msg = array("result" => "Datos de Empresa Actualizada");
				}
			}
			echo json_encode($msg);
		break;
		case "DELETE":
			if(isset($_GET["id"])){
				$result = Empresa::delEmpresa($_GET["id"]);
				if($result>0){
					$msg = array("result" => "Empresa Eliminada");
				}
			}
			echo json_encode($msg);
		break;
	}
?>
