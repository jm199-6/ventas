<?php
	//session_start();
	$_SESSION["isLogged"]=false;
	//session_destroy();
  class routerC extends Seguridad{
    public function getTemplate(){
      include("./views/plantilla.php");
    }

    public function getMenu(){
      if(!file_exists("./models/cBD.php")){
        $menu="menu-installer";
      }else{
        $menu="menu-index";
      }
      include(RouterM::getPage($menu));
    }

    public function getResource($name){
		$resp = RouterM::getPage($name);
		if(file_exists($resp)){
			include $resp;
		}
	}

    public function route(){
		if(!file_exists("./models/cBD.php")){
        	$r="install";
		}else{
        	if(isset($_GET['p'])){
				$r=$_GET['p'];
          	  $r=$this->desencript($r);
        	}else{
        		if($_SESSION["isLogged"]==true){
        			$r="index";
        		}else{
          	  	$r="login";
       			}
        	}
		}
      $resp = routerM::getPage($r);
      if(file_exists($resp)){
        include $resp;
      }else{
        echo "404 HTTP ERROR FILE NOT FOUND";
      }
    }
  }
?>
