<?php
  session_start();
  class installC extends Seguridad{
    private $conection;

    public static function createDB(){
      if(isset($_POST['ok'])){
        if(isset($_POST['pwd'])){
          $pass=$_POST['pwd'];
        }else{
          $pass='';
        }

        $_SESSION['server']=$_POST['server'];
        $_SESSION['bd']=$_POST['bd'];
        $_SESSION['userName']=$_POST['userName'];
        $_SESSION['pwd']=$pass;
        $_SESSION['responseModel']="";
		
		$inserts = array("INSERT INTO tipousuario (nombre) VALUES ('admin')",
		  "INSERT INTO tipousuario (nombre) VALUES ('user')");
        $dropTables=array(
          "DROP TABLE IF EXISTS `detalleventa`",
          "DROP TABLE IF EXISTS `venta`",
          "DROP TABLE IF EXISTS `empleado`",
          "DROP TABLE IF EXISTS `cuenta`",
          "DROP TABLE IF EXISTS `productotda`",
          "DROP TABLE IF EXISTS `tienda`",
          "DROP TABLE IF EXISTS `producto`",
          "DROP TABLE IF EXISTS `cliente`",
          "DROP TABLE IF EXISTS `empresa`",
          "DROP TABLE IF EXISTS `formapago`",
          "DROP TABLE IF EXISTS `tcomprobante`",
          "DROP TABLE IF EXISTS `tipousuario`",
          "DROP TABLE IF EXISTS `cargo`",
          "DROP TABLE IF EXISTS `departamento`"
        );
        $cTables = array(
          "CREATE TABLE `cargo` (
            `codigo` int(9) NOT NULL AUTO_INCREMENT,
            `nombre` varchar(150) NOT NULL,
            PRIMARY KEY (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `cliente` (
            `dui` varchar(10) NOT NULL,
            `nombres` varchar(150) NOT NULL,
            `apellidos` varchar(150) NOT NULL,
            `direccion` varchar(255) DEFAULT NULL,
            `fechaNacimiento` date DEFAULT NULL,
            `nit` varchar(17) DEFAULT NULL,
            PRIMARY KEY (`dui`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `departamento` (
            `codigo` int(3) NOT NULL AUTO_INCREMENT,
            `nombre` varchar(150) NOT NULL,
            PRIMARY KEY (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `empresa` (
            `codigo` int(3) NOT NULL AUTO_INCREMENT,
            `nombreJ` varchar(150) NOT NULL,
            `nombreC` varchar(150) NOT NULL,
            `giro` varchar(150) NOT NULL,
            `nit` varchar(17) NOT NULL,
            `nrc` varchar(25) NOT NULL,
            `logo` varchar(200) DEFAULT NULL,
            PRIMARY KEY (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `formapago` (
            `codigo` int(2) NOT NULL AUTO_INCREMENT,
            `nombre` varchar(75) NOT NULL,
            PRIMARY KEY (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `tcomprobante` (
            `codigo` int(4) NOT NULL AUTO_INCREMENT,
            `nombre` varchar(150) NOT NULL,
            PRIMARY KEY (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `tipousuario` (
            `codigo` int(9) NOT NULL AUTO_INCREMENT,
            `nombre` varchar(150) NOT NULL,
            PRIMARY KEY (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `producto` (
            `barra` int(25) NOT NULL,
            `descripcion` varchar(150) NOT NULL,
            `costo` double NOT NULL,
            `precioVenta` double NOT NULL,
            `foto` varchar(200) DEFAULT NULL,
            `estado` char(1) NOT NULL COMMENT 'A=activo, I=inactivo',
            `idDepto` int(3) NOT NULL COMMENT 'llave foranea con departamento',
            PRIMARY KEY (`barra`),
            KEY `idDepto` (`idDepto`),
            CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idDepto`) REFERENCES `departamento` (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `tienda` (
            `codigo` varchar(6) NOT NULL,
            `nombre` varchar(150) NOT NULL,
            `direccion` varchar(150) DEFAULT NULL,
            `telefono` varchar(9) DEFAULT NULL,
            `idEmpresa` int(3) DEFAULT NULL,
            PRIMARY KEY (`codigo`),
            KEY `idEmpresa` (`idEmpresa`),
            CONSTRAINT `tienda_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `cuenta` (
            `dui` varchar(10) NOT NULL,
            `clave` varchar(255) NOT NULL,
            `idTipoUsuario` int(9) NOT NULL,
            PRIMARY KEY (`dui`),
            KEY `idTipoUsuario` (`idTipoUsuario`),
            CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `productotda` (
            `codigo` int(10) NOT NULL AUTO_INCREMENT,
            `idTienda` varchar(6) NOT NULL,
            `idProducto` int(25) NOT NULL,
            `cantidad` int(4) DEFAULT NULL,
            PRIMARY KEY (`codigo`),
            KEY `idTienda` (`idTienda`),
            KEY `idProducto` (`idProducto`),
            CONSTRAINT `productotda_ibfk_1` FOREIGN KEY (`idTienda`) REFERENCES `tienda` (`codigo`),
            CONSTRAINT `productotda_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`barra`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `empleado` (
            `codigo` int(5) NOT NULL AUTO_INCREMENT,
            `dui` varchar(10) NOT NULL,
            `nit` varchar(17) NOT NULL,
            `nombres` varchar(150) NOT NULL,
            `apellidos` varchar(150) NOT NULL,
            `direccion` varchar(255) DEFAULT NULL,
            `fechaNacimiento` date DEFAULT NULL,
            `fechaIngreso` date NOT NULL,
            `foto` varchar(250) DEFAULT NULL,
            `salario` double NOT NULL,
            `idTienda` varchar(6) NOT NULL COMMENT 'llave foranea con tienda',
            `codCargo` int(9) NOT NULL COMMENT 'llave foranea con cargo',
            `estado` char(1) DEFAULT NULL COMMENT 'A=activo, I=inactivo',
            PRIMARY KEY (`codigo`),
            UNIQUE KEY `dui` (`dui`),
            KEY `idTienda` (`idTienda`),
            KEY `codCargo` (`codCargo`),
            CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idTienda`) REFERENCES `tienda` (`codigo`),
            CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`codCargo`) REFERENCES `cargo` (`codigo`),
            CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`dui`) REFERENCES `cuenta` (`dui`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `venta` (
            `codigo` int(10) NOT NULL AUTO_INCREMENT,
            `idCliente` varchar(10) NOT NULL,
            `idUsuario` int(5) NOT NULL,
            `idTComprobante` int(4) NOT NULL,
            `noComprobante` int(8) NOT NULL,
            `fecha` date NOT NULL,
            `estado` char(1) NOT NULL COMMENT 'f=finalizado, p=pendiente',
            `idFPago` int(2) NOT NULL,
            PRIMARY KEY (`codigo`),
            KEY `idCliente` (`idCliente`),
            KEY `idUsuario` (`idUsuario`),
            KEY `idTComprobante` (`idTComprobante`),
            KEY `idFPago` (`idFPago`),
            CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`dui`),
            CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `empleado` (`codigo`),
            CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`idTComprobante`) REFERENCES `tcomprobante` (`codigo`),
            CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`idFPago`) REFERENCES `formapago` (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
          "CREATE TABLE `detalleventa` (
            `codigo` int(10) NOT NULL AUTO_INCREMENT,
            `idProdTda` int(10) NOT NULL,
            `idVenta` int(10) NOT NULL,
            `cantidad` int(2) DEFAULT NULL,
            PRIMARY KEY (`codigo`),
            KEY `idProdTda` (`idProdTda`),
            KEY `idVenta` (`idVenta`),
            CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idProdTda`) REFERENCES `productotda` (`codigo`),
            CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`codigo`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
        );
        $con = new installM($_SESSION['server'],$_SESSION['bd'],$_SESSION['userName'],$_SESSION['pwd']);
        $resTables=$con->createDB($dropTables,$cTables,$inserts);
        $_SESSION['responseModel'].= $resTables;
        echo $_SESSION['responseModel'];
        echo '<script type="text/javascript">disableTabById("server");activeTabById("enterprise");setTtle("Instalador - Empresa");</script>';
      }
    }
    
    public function addAdmin(){
		if(isset($_POST["addAdmin"])){
			// edited at 12/abr./2021 17:26
			$dataAccount = array("dui"=> $_POST["duiC"], "clave"=> $this->encript($_POST["pwC"]),"idTipoUsuario"=> "1");
			if(isset($_FILES["foto"])){
				if(is_uploaded_file($_FILES["foto"]["tmp_name"])){
					$folder = "media/img/img_profile/";
					$tmp_name = $_FILES["foto"]["tmp_name"];
					$name = $_FILES["foto"]["name"];
					$imgRuta = $folder.$name;

					if(move_uploaded_file($tmp_name, "./".$imgRuta)){
						$dataAdmin = array("dui"=> $_POST["dui"], "nit"=> $_POST["nit"], "nombres"=> $_POST["nombres"], "apellidos"=> $_POST["apellidos"], "direccion"=> $_POST["direccion"], "fechaNacimiento"=> $_POST["fechaNacimiento"], "fechaIngreso"=> $_POST["fechaIngreso"], "foto"=>$imgRuta, "salario"=> $_POST["salario"], "idTienda"=> $_POST["idTienda"], "codCargo"=> $_POST["codCargo"], "estado"=>"A");
					}
				}
			}
			$installer = new installM($_SESSION['server'],$_SESSION['bd'],$_SESSION['userName'], $_SESSION['pwd']);
			$resAc= $installer->createAccount($dataAccount);
			if($resAc==1){
				$_SESSION["responseModel"] .= "<li>Cuenta creada correctamente <span class='fa fa-check'></span></li>";
				$resAd = $installer->createAdmin($dataAdmin);
				$_SESSION["responseModel"] .= $resAd;
				$_SESSION["responseModel"] .= $installer->createFile();
				
				echo $_SESSION["responseModel"];
				echo '<script type="text/javascript">disableTabById("server");disableTabById("enterprise");disableTabById("location");disableTabById("fPagos");disableTabById("cargos");disableTabById("admin");activeTabById("finish");setTtle("Instalador - Finalizar");</script>';
			}
			session_destroy();
		}
	}
    public function createEnterprise(){
      if(isset($_POST['setEnterprise'])){
      	if(isset($_FILES["logo"])){
        	if(is_uploaded_file($_FILES['logo']['tmp_name'])){
        		$folder= "media/img/";
        		$tmpName = $_FILES["logo"]["tmp_name"];
        		$name = $_FILES["logo"]["name"];
        		$imgRuta = $folder.$name;

        		if(move_uploaded_file($tmpName,"./".$imgRuta)){
        			$data=array("nombreJ"=>$_POST["nombreJ"], "nombreC"=>$_POST["nombreC"], "giro"=>$_POST["giro"], "nit"=>$_POST["nit"], "nrc" => $_POST["nrc"], "logo"=>$imgRuta);
    			}
        	}
     	  }

        $con = new installM($_SESSION['server'],$_SESSION['bd'],$_SESSION['userName'],$_SESSION['pwd']);
     	  $res = $con->addEnterprise($data,"empresa");
        // edited at 2021/01/06 22:53
        $_SESSION['responseModel'].= $res;
        echo $_SESSION['responseModel'];
        echo '<script type="text/javascript">disableTabById("server");disableTabById("enterprise");activeTabById("location");setTtle("Instalador - Ubicacion");</script>';


      }
    }
    public function addLocation(){
      if (isset($_POST['addLocation'])) {
        $data = array('codigo'=>$_POST['cod'],'nombre' => $_POST['nombre'] ,'direccion' => $_POST['direccion'], 'telefono' => $_POST['telefono'], 'idEmp' => $_POST['idEmp']);

        $con = new installM($_SESSION['server'],$_SESSION['bd'],$_SESSION['userName'],$_SESSION['pwd']);
        $res = $con->addLocation($data,"tienda");
        $_SESSION['responseModel'].= $res;
        echo $_SESSION['responseModel'];
        echo '<script type="text/javascript">disableTabById("server");disableTabById("enterprise");disableTabById("location");activeTabById("fPagos");setTtle("Instalador - Formas de Pago");</script>';
      }
    }
    
    public function addPayments(){
    	if(isset($_POST["addPayments"])){
    		$data = $_POST['payments'];
    		$con = new installM($_SESSION['server'],$_SESSION['bd'],$_SESSION['userName'],$_SESSION['pwd']);
    		foreach ($data as $value){
    			$res = $con->addPayment($value,'formapago');
    			$_SESSION['responseModel'].=$res;
    		}
    		
    		echo $_SESSION['responseModel'];
        	echo '<script type="text/javascript">disableTabById("server");disableTabById("enterprise");disableTabById("location");disableTabById("fPagos");activeTabById("cargos");setTtle("Instalador - Cargos");</script>';
    	}
    }
    
    public function addCargos(){
		if(isset($_POST["addCargos"])){
			$data=$_POST["cargos"];
			$installer = new installM($_SESSION['server'],$_SESSION['bd'],$_SESSION['userName'], $_SESSION['pwd']);
			foreach ($data as $value){
				$res = $installer->addCargo($value,"cargo");
				$_SESSION["responseModel"].=$res;
			}
			
			echo $_SESSION["responseModel"];
			echo '<script type="text/javascript">disableTabById("server");disableTabById("enterprise");disableTabById("location");disableTabById("fPagos");disableTabById("cargos");activeTabById("admin");setTtle("Instalador - Administrador");</script>';
		}
	}
	
  }
?>
