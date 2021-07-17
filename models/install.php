<?php
  class installM{
    private $server;
    private $db;
    private $userName;
    private $pwd;
    private $msg;

    public function __construct($server,$db,$userName,$pwd=null){
      $this->server=$server;
      $this->db=$db;
      $this->userName=$userName;
      $this->pwd=$pwd;

    }

    private function connect(){
      //$bd = new PDO("mysql:host=localhost;dbname=archivos","root","");
      $bd = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->userName, $this->pwd);
      return $bd;
    }

    private function insertValues($inserts){
    	for($i=0; $i<count($inserts);$i++){
    		$pdo = $this->connect()->prepare($inserts[$i]);
    		if($pdo->execute()){
    			$result = $i;
    		}
		}
		return $result;
	}
    private function dropTables($tables){
      for($i=0;$i<count($tables);$i++){
        $pdo = $this->connect()->prepare($tables[$i]);

        if($pdo->execute()){
          $result = $i;
        }
      }
      return $result;
    }
    private function cTables($tables){
      for($j=0;$j<count($tables);$j++){
        $pdo = $this->connect()->prepare($tables[$j]);

        if($pdo->execute()){
          $result= $j;
        }
      }
      return $result;
    }
    public function createAccount($data){
    	$sql = "insert into cuenta (dui, clave, idTipoUsuario) values ('".$data["dui"]."','".$data["clave"]."','".$data["idTipoUsuario"]."')";
    	$pdo = $this->connect()->prepare($sql);
    	if( $pdo->execute()){
    		if($pdo->rowCount()==1){
    			return $pdo->rowCount();
    		}
    	}
    }
    public function createAdmin($data){
    	$sql= "INSERT INTO empleado (dui, nit, nombres, apellidos, direccion, fechaNacimiento, fechaIngreso, foto, salario, idTienda, codCargo, estado) VALUES ('".$data["dui"]."', '".$data["nit"]."', '".$data["nombres"]."', '".$data["apellidos"]."', '".$data["direccion"]."', '".$data["fechaNacimiento"]."', '".$data["fechaIngreso"]."', '".$data["foto"]."', '".$data["salario"]."', '".$data["idTienda"]."', '".$data["codCargo"]."', '".$data["estado"]."')";
    	
		$pdo = $this->connect()->prepare($sql);
    	if($pdo->execute()){
    		if($pdo->rowCount()>0){
    			$this->msg .= "<li>Se ha agregado ".$data["nombres"]." ".$data["apellidos"]." como Administrador <span class='fa fa-check'></span></li>";
			}else{
				$this->msg .= "<li>Ha ocurrido un error al agregar al usuario Administrador <span class='fa fa-cross text-danger' ></span></li>";
			}
		}
		return $this->msg;
    }
    public function createFile(){
		$fConn = fopen("./models/cBD.php", "w");
		fwrite($fConn, "<?php class conexionBD{".PHP_EOL);
        fwrite($fConn, "public function cBD(){".PHP_EOL);
        fwrite($fConn, '$bd = new PDO("mysql:host='.$this->server.':3306;dbname='.$this->db.'", "'.$this->userName.'", "'.$this->pwd.'");'.PHP_EOL);
        fwrite($fConn, "return \$bd;".PHP_EOL);
        fwrite($fConn, "}".PHP_EOL);
    	fwrite($fConn, "} ?>".PHP_EOL);
    	fclose($fConn);

    	return "<li>Archivo de Conexión creado <span class='fa fa-check'></span></li>";
	}
    public function createDB($dropTables,$cTables,$inserts){
      if($this->dropTables($dropTables)==count($dropTables)-1){
        $this->msg .= "<li>100% Tablas existentes eliminadas <span class='fa fa-check'></span></li>";
        if($this->cTables($cTables)==count($cTables)-1){
          $this->msg.="<li>100% Tablas creadas exitosamente <span class='fa fa-check'></span></li>";
          if($this->insertValues($inserts)==count($inserts)-1){
          	$this->msg.="<li>Tipos de Usuarios creados exitosamente <span class='fa fa-check'></span></li>";
          }else{
          	$this->msg.="<li>Hubo Un error </li>";
		  }
        }else{
        	$this->msg.="<li>No se crearon tablas </li>";
        }
      }
      return $this->msg;
    }
    public function addEnterprise($data,$table){
      $sql = "insert into ".$table." (nombreJ,nombreC,giro,nit,nrc,logo) values ('".$data['nombreJ']."', '".$data['nombreC']."', '".$data['giro']."', '".$data['nit']."', '".$data['nrc']."', '".$data['logo']."');";

      $pdo = $this->connect()->prepare($sql);

      if($pdo->execute()){
        if( $pdo->rowCount() > 0 ){
        	$this->msg.= "<li>Empresa creada correctamente. <span class='fa fa-check'></span></li>";
        }else{
        	 $this->msg.= "<li>Ha ocurrido un error. </li>";
        }

      }
      return $this->msg;
    }
    public function addLocation($data, $table){
      $sql="insert into ".$table." (codigo,nombre, direccion, telefono, idEmpresa) values ('".$data['codigo']."','".$data['nombre']."','".$data['direccion']."','".$data['telefono']."','".$data['idEmp']."')";
      $pdo = $this->connect()->prepare($sql);

      if($pdo->execute()){
        if( $pdo->rowCount() > 0 ){
        	$this->msg.= "<li>Ubicacion creada correctamente. <span class='fa fa-check'></span></li>";
        }else{
        	 $this->msg.= "<li>Ha ocurrido un error. <span class='fa fa-at'></span></li>";
        }

      }else{
      	$this->msg.="<li>no se ejecuto la instrucción. <strong>$sql</strong><span class='fa fa-at'></span></li>";
      }
      return $this->msg;
    }
    public function addPayment($data,$table){
    	$sql = "insert into ".$table." (nombre) values ('".$data."');";
    	$pdo = $this->connect()->prepare($sql);

    	if($pdo->execute()){
    		if($pdo->rowCount()>0){
    			$this->msg="<li>".$data." agregado como forma de pago.</li>";
    		}else{
    			$this->msg="<li> Ha ocurrido un error al intentar agregar $data como forma de pago.</li>";
    		}
    	}

    	return $this->msg;
    }

    public function addCargo($data,$table){
    	$sql = "insert into ".$table." (nombre) values ('".$data."');";
    	$pdo = $this->connect()->prepare($sql);

    	if($pdo->execute()){
    		if($pdo->rowCount()>0){
    			$this->msg="<li>".$data." agregado como Cargo.</li>";
    		}else{
    			$this->msg="<li> Ha ocurrido un error al intentar agregar $data como Cargo.</li>";
    		}
    	}

    	return $this->msg;
    }

  }
 ?>
