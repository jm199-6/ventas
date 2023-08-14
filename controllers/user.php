<?php
	//session_start();
	
	class UserC extends Seguridad{
		public function login(){
			if(isset($_POST["login"])){
				$userData = array("dui"=> $_POST["login"], "clave" => $this->encript($_POST["cl"]));
				$table = "cuenta";

				$resp = UserM::login($userData,$table);
				
				if($resp!=null){
					if($resp["dui"]==$userData["dui"]){

						if($resp["clave"]==$userData["clave"]){
							
							$infoEmpleado = EmpleadoM::getInfo($userData["dui"]);
							$userInfo = array("dui"=> $infoEmpleado["dui"], "nit"=> $infoEmpleado["nit"], "nombres"=> $infoEmpleado["nombres"], "apellidos"=> $infoEmpleado["apellidos"], "direccion"=> $infoEmpleado["direccion"], "fechaNacimiento"=> $infoEmpleado["fechaNacimiento"], "fechaIngreso"=> $infoEmpleado["fechaIngreso"], "foto"=>"./".$infoEmpleado["foto"], "salario"=> $infoEmpleado["salario"], "idTienda"=> $infoEmpleado["idTienda"], "codCargo"=> $infoEmpleado["codCargo"], "estado"=>"A");
							$_SESSION["isLogged"]=true;
							$_SESSION["profile"]=$userInfo;
							echo "<script>$('#notificacion').addClass('alert-danger');
							$('#notificacion').show(); window.location='./';</script>";
						}else{
							echo "<script> $('#notificacion').addClass('alert-danger');
							$('#notificacion').show();</script>";
							return "La clave ingresada es incorrecta";
						}
					}
				}else{
					echo "<script> $('#notificacion').addClass('alert-danger');
					$('#notificacion').show();</script>";
					return "El usuario ".$userData["dui"]." no existe";
				}
			}
		}
		public function logout(){
			$_SESSION['isLogged']=false;
			$_SESSION['profile']="";
			session_destroy();
			echo "<script>window.location='./';</script>";
		}
	}
?>
