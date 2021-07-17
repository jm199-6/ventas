<div class="row">
	<div class="col-sm-4 col-md-4 col-lg-4">
 		&nbsp;
	</div>
	<div class="col-sm-6 col-md-6 col-lg-6">
		<div class="card card-primary">
			<div class="card-header bg-primary text-white">Iniciar Sesion</div>
		    <div class="card-body">
				<form method='post'>
					<div id="nUsuario" class="form-group input-group">
						<div class="input-group-preppend">
							<span class="input-group-text">
								<font style="vertical-align:inherit;">
									<i style="vertical-align:inherit;"  class='fa fa-user'></i>
								</font>
							</span>
						</div>
						<input class='form-control' onKeyUp="setGuion(1,'duiA');" id="duiA" maxlength="10" type="text" name="login" placeholder="DUI" pattern="[0-9\-]{10,10}" title="Dígitos separados por un Guion. Tamaño: 10 caracteres ********-*" required/>
					</div>
					<div id="cUsuario" class="form-group input-group">
						<div class="input-group-preppend">
							<span class="input-group-text">
								<font style="vertical-align:inherit;">
									<i style="vertical-align:inherit;" class='fa fa-unlock-alt'></i>
								</font>
							</span>
						</div>
						<input class='form-control' id="cl" type="password" name="cl" placeholder="Contraseña" />
					</div>
					<center>
						<input class="btn btn-outline btn-primary btn-lg btn-block" type="submit" name='entrar' value='Iniciar Sesión' />
					</center>
				</form>
				<div class="tooltip-demo" >
					<button type="button" class="btn btn-outline btn-link" data-target="#modalPass" data-toggle="modal" data-placement="right" title="Olvide mi contraseña">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Olvidé mi contraseña</font>
						</font>
					</button>
				</div>
				<?php
				$router = new routerC();
				$router->getResource("forgotPassword");
				?>
				<!--Notificacion-->
				<br>
				<div id="notificacion" style="display: none;" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
	                    <font style="vertical-align: inherit;">
	                        <font style="vertical-align: inherit;">×</font>
						</font>
					</button>
					<font style="vertical-align: inherit;">
		                <label style="vertical-align: inherit; float:'left'" id="textoN">
							<?php
								$UserC = new UserC();
								$respLogin= $UserC->login();
								echo $respLogin;
							?>
						</label>
					</font>
				</div>
			</div>
		</div>
	</div>
</div>