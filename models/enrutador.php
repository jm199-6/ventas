<?php
  class routerM {


    public static function getPage($r){
      $validRoutes = array('forgotPassword', 'login', 'index', 'logout', 'p1', 'install', 'menu-installer', 'menu-index');

      for ($i=0; $i < count($validRoutes); $i++) {
        if($r==$validRoutes[$i]){
          if($r=="index"){
            $page = "./views/modules/home.php";
          }else{
            $page = "./views/modules/".$r.".php";
          }
          break;
        }else{
          $page = "./views/modules/login.php";
        }
      }

      return $page;
    }
  }
?>
