<?php
	//session_start();
	$sec = new Seguridad();
 ?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a href="./" class="navbar-brand"><span class="fa fa-home"></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li id="pgIni" class="nav-item active">
          <a class="nav-link" href="./?p=<?php echo $sec->encript("p1"); ?>">P1</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      	<?php
				if(isset($_SESSION["isLogged"])){
					if($_SESSION["isLogged"]){
		    ?>
          <li id="pgIni" class="nav-item">
            <a class="nav-link" href="./?p=<?php echo $sec->encript("logout"); ?>"><span class="fas fa-sign-out-alt" title="Cerrar Sesion"></span></a>
          </li>
        <?php
        	}
				}
        ?>
      </ul>
    </div>
</nav>
<?php
//var_dump($_SESSION);
?>