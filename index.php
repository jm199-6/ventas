<?php
  //session_start();
  date_default_timezone_set("America/El_Salvador");
  //Controladores
  require_once "controllers/encript.php";
  require_once "controllers/enrutador.php";
  require_once "controllers/install.php";

  require_once "controllers/user.php";


  //modelos

  require_once "models/enrutador.php";
  require_once "models/install.php";
  $conectFile="models/cBD.php";
  if(file_exists($conectFile)){
  	require_once $conectFile;
  	require_once "models/userM.php";
  	require_once "models/empleadoM.php";
  }




  $plantilla = new routerC();
  $plantilla->getTemplate();
?>
