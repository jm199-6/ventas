<script type="text/javascript">
  setTtle("Instalador - Servidor");
  host='<?php echo $_SERVER["SERVER_ADDR"].":".$_SERVER["SERVER_PORT"]; ?>';
</script>
<div class="row">
  <div class="col-8 col-sm-8 col-lg-8">
    <div class="card ">
      <div class="card-header bg-primary text-white">Instalador del Sistema de Ventas</div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="mytab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="server-tab" data-toggle="tab" href="#server" role="tab" aria-controls="server" aria-selected="true"><span class="badge badge-primary" >1</span> <i class="fa fa-database"></i> Servidor</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="enterprise-tab" data-toggle="tab" href="#enterprise" role="tab" aria-controls="enterprise" aria-selected="true"><span class="badge badge-secondary" >2</span> <i class="fa fa-home"></i> Empresa</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="true"><span class="badge badge-secondary" >3</span> <i class="fa fa-map-marker"></i> Ubicación</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="fPagos-tab" data-toggle="tab" href="#fPagos" role="tab" aria-controls="fPagos" aria-selected="true"><span class="badge badge-secondary" >4</span> <i class="fa fa-credit-card"></i> Formas de Pago</a>
          </li>
          <li class="nav-item" role="presentation">
          	<a class="nav-link disabled" id="cargos-tab" data-toogle="tab" href="#cargos" role="tab" aria-controls="cargos" aria-selected="true"><span class="badge badge-secondary" >5</span> <i class="fa fa-user" ></i> Cargos</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true"><span class="badge badge-secondary" >6</span> Administrador</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="finish-tab" data-toggle="tab" href="#finish" role="tab" aria-controls="finish" aria-selected="true"><span class="badge badge-secondary" >7</span> Finalizar</a>
          </li>
        </ul>
        <div class="tab-content" id="mytab-content">
          <div class="tab-pane fade show active" id="server" role="tabpanel" aria-labelledby="server-tab">
            <form method="post" class="was-validated">
            	<span class="text-info">Información necesaria para la coneccion al servidor de Base de Datos</span>
              <div class="row">
                <div class="col"><br>
                  <div class="input-group is-invalid">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend"><span class="fa fa-server"></span></span>
                    </div>
                    <input type="text" class="form-control is-invalid" name="server" aria-describedby="validatedInputGroupPrepend" required>
                  </div>
                  <div class="invalid-feedback">
                    Ingrese el nombre o dirección IP del servidor
                  </div>
                  <div class="input-group is-invalid">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend2"><span class="fa fa-database"></span></span>
                    </div>
                    <input type="text" class="form-control is-invalid" name="bd" aria-describedby="validatedInputGroupPrepend2" required>
                  </div>
                  <div class="invalid-feedback">
                    Ingrese el nombre de la base de Datos a utilizar
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col"><br>
                  <div class="input-group is-invalid">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend1"><span class="fa fa-user"></span></span>
                    </div>
                    <input type="text" class="form-control is-invalid" name="userName" aria-describedby="validatedInputGroupPrepend1" required>
                  </div>
                  <div class="invalid-feedback">
                    Nombre de Usuario de la Base de Datos
                  </div>
                  <div class="input-group is-invalid">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3"><span class="fa fa-key"></span></span>
                    </div>
                    <input type="password" class="form-control is-invalid" name="pwd" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="invalid-feedback">
                    Contraseña del Usuario de la base de datos
                  </div>
                </div>
              </div>
              <br>
              <input type="submit" class="btn btn-primary right" name="ok" value="Continuar">
            </form>
          </div>
          <div class="tab-pane fade" id="enterprise" role="tabpanel" aria-labelledby="enterprise-tab">
          	<span class="text-info">Información de la empresa</span>
            <form enctype="multipart/form-data" method="post">
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validatedInputGroupPrepend">Nombre Juridico</span>
                </div>
                <input type="text" class="form-control" name="nombreJ" aria-describedby="validatedInputGroupPrepend" >
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validatedInputGroupPrepend">Nombre Comercial</span>
                </div>
                <input type="text" class="form-control" name="nombreC" aria-describedby="validatedInputGroupPrepend" >
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validatedInputGroupPrepend">Giro</span>
                </div>
                <input type="text" class="form-control" name="giro" aria-describedby="validatedInputGroupPrepend" >
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validatedInputGroupPrepend">NIT</span>
                </div>
                <input type="text" class="form-control" onKeyUp="setGuion(3,'nitE')" maxlength="17" id="nitE" name="nit" aria-describedby="validatedInputGroupPrepend" >
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validatedInputGroupPrepend">NRC</span>
                </div>
                <input type="text" class="form-control" name="nrc" aria-describedby="validatedInputGroupPrepend" >
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="validatedInputGroupPrepend">Logo</span>
                </div>
                <input type="file" class="form-control" name="logo" aria-describedby="validatedInputGroupPrepend" >
              </div>
              <button type="submit" class="btn btn-primary right" name="setEnterprise" value="Continuar"><span class="fa fa-arrow-right"></span></button>
            </form>
          </div>
          <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
          	<span class="text-info">Información de la ubicacion de las oficinas centrales</span>
            <form method="post">
              	<!-- cod varchar 6,
							nombre varchar 150,
							direccion varchar 150,
							telefono varchar 9,
							idEmpresa int 3 -->
    					<div class="input-group bottom">
      					<div class="input-group-prepend">
      						<span class="input-group-text" id="loc0">Id Ubicación</span>
      					</div>
      					<input type="text" class="form-control" name="cod" maxlength="6" aria-describedby="loc0" >
      				</div>
              <div class="input-group bottom">
      					<div class="input-group-prepend">
      						<span class="input-group-text" id="loc1">Nombre</span>
      					</div>
      					<input type="text" class="form-control" name="nombre" maxlength="150" aria-describedby="loc1" >
      				</div>
      				<div class="input-group bottom">
      					<div class="input-group-prepend">
      						<span class="input-group-text" id="loc2">Dirección</span>
      					</div>
      					<textarea class="form-control" name="direccion" maxlength="150" aria-describedby="loc2"></textarea>
      					<!--input type="text" class="form-control" name="direccion" aria-describedby="loc2" -->
      				</div>
				      <div class="input-group bottom">
    					<div class="input-group-prepend">
    						<span class="input-group-text" id="loc3">Telefono</span>
    					</div>
    					<input type="text" class="form-control" onkeyup="setGuion(2,'telefono')" id="telefono" name="telefono" maxlength="9" aria-describedby="loc3" >

    				</div>
  				    <div class="input-group bottom">
    					<div class="input-group-prepend">
    						<span class="input-group-text" id="loc4">Empresa</span>
    					</div>
    					<select class="form-control" id="idEmp" name="idEmp" maxlength="3" aria-describedby="loc4" >
                				<!-- Datos de options llenados desde la API -->
                				<script type="text/javascript">
                				  getListEmpresas(host);
                				</script>
              			</select>
    				</div>
              <button type="submit" class="btn btn-primary right" name="addLocation" value="Continuar"><span class="fa fa-arrow-right"></span></button>
            </form>
          </div>
          <div class="tab-pane fade" id="fPagos" role="tabpanel" aria-labelledby="fPagos-tab">
            <span class="text-info">Agregue las formas de pago aceptadas por el establecimiento</span>
            <button class="btn btn-secondary right" id="addPaymentField" onclick='addFields("Nombre forma de Pago", "payments", "fPagos")'><span class="fa fa-plus"></span></button>
	          <form method="post">
            	<div id="fPagosFields">
            		<!-- Campos generados -->
            	</div>
            	<button type="submit" class="btn btn-primary right" name="addPayments" value="Continuar"><span class="fa fa-arrow-right"></span></button>
             </form>
          </div>
          <div class="tab-pane fade" id="cargos" role="tabpanel" aria-labelledby="cargos-tab">
          	<span class="text-info">Agregue los cargos que estaran disponibles dentro de la empresa</span>
            <button class="btn btn-secondary right" id="addCargoField" onclick='addFields("Nombre del Cargo", "cargos", "cargos")'><span class="fa fa-plus"></span></button>
	          <form method="post">
            	<div id="cargosFields">
            		<!-- Campos generados -->
            	</div>
            	<button type="submit" class="btn btn-primary right" name="addCargos" value="Continuar"><span class="fa fa-arrow-right"></span></button>
             </form>
          </div>
          <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
          	<!--
			  int(5) 		 	codigo  autoincremental
              varchar(10)   dui
              varchar(17)   nit
              varchar(150) nombres
              varchar(150) apellidos
              varchar(255) dirección
              date 				fechaNacimiento
              date 				fechaIngreso
              varchar(250) foto
              double			  salario
              idTienda		api tienda
              codCargo		api cargo
              char(1)		   estado
            -->
    				<form method="post" enctype="multipart/form-data">
    					<fieldset title="Informacion Personal">
    						<legend class="bg-secondary text-white text-center">Información Personal</legend>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Nombres</span>
                    			</div>
                    			<input type="text" class="form-control" id="nombres" name="nombres" maxlength="150" aria-describedby="validatedInputGroupPrepend" placeholder="Nombres del Administrador"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Apellidos</span>
                    			</div>
                    			<input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="150" aria-describedby="validatedInputGroupPrepend" placeholder="Apellidos del Administrador"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Direccion</span>
                    			</div>
                    			<textarea class="form-control" name="direccion" rows="3" maxlength="250" aria-describedby="validatedInputGroupPrepend" placeholder="Direccion del Domicilio"  ></textarea>
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">DUI</span>
                    			</div>
                    			<input type="text" class="form-control" onKeyUp="setGuion(1,'duiA');setDuiC();" id="duiA" name="dui" maxlength="10" aria-describedby="validatedInputGroupPrepend" placeholder="00000000-0"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">NIT</span>
                    			</div>
                    			<input type="text" class="form-control" onKeyUp="setGuion(3,'nitA')" id="nitA" name="nit" maxlength="17" aria-describedby="validatedInputGroupPrepend" placeholder="0000-000000-000-0"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Fecha de Nacimiento</span>
                    			</div>
                    			<input type="date" class="form-control" name="fechaNacimiento" aria-describedby="validatedInputGroupPrepend"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Fecha de Ingreso</span>
                    			</div>
                    			<input type="date" class="form-control" name="fechaIngreso" aria-describedby="validatedInputGroupPrepend"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Cargo</span>
                    			</div>
    							<select class="form-control" id="idCrg" name="codCargo" maxlength="3" >
    								<option value="0">Selecciona una opcion</option>
    								<script >
    									getListCrg(host);
    								</script>
    							</select>
    						</div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Salario $</span>
                    			</div>
                    			<input type="number" class="form-control" name="salario" aria-describedby="validatedInputGroupPrepend" placeholder="0000.00"  >
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Foto</span>
                    			</div>
                    			<input type="file" class="form-control" name="foto" aria-describedby="validatedInputGroupPrepend"  >
                  		  </div>
    					</fieldset>
    					<fieldset title="Lugar de Trabajo">
    						<legend class="bg-secondary text-white text-center">Información del lugar de trabajo</legend>
    						<div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Sucursal</span>
                    			</div>
    							<select class="form-control" id="idTda" name="idTienda" maxlength="3" >
    								<option value="0">Selecciona una opcion</option>
    								<script >
    									getListTda(host);
    								</script>
    							</select>
    						</div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Direccion</span>
                    			</div>
                    			<textarea rows="3" class="form-control" id="dirTda" aria-describedby="validatedInputGroupPrepend"  readOnly disabled></textarea>
                  		  </div>
                  		  <div class="input-group bottom">
                    			<div class="input-group-prepend">
    								<span class="input-group-text" id="validatedInputGroupPrepend">Telefono</span>
                    			</div>
                    			<input type="text" class="form-control" id="telTda" aria-describedby="validatedInputGroupPrepend"  readonly disabled>
                  		  </div>
    					</fieldset>
    					<fieldset title="Datos de Acceso">
    						<legend class="bg-secondary text-white text-center">Datos de Acceso</legend>
    						<div class="input-group bottom">
            					<div class="input-group-prepend">
			            	    	<span class="input-group-text" id="validatedInputGroupPrepend">Id Usuario</span>
            					</div>
            					<input type="text" class="form-control" id="duiC" name="duiC" aria-describedby="validatedInputGroupPrepend" readonly >
                  		</div>
          		  	  <div class="input-group bottom">
            				<div class="input-group-prepend">
		                	<span class="input-group-text" id="validatedInputGroupPrepend">Contraseña</span>
            			  </div>
            			<input type="password" class="form-control" id="pw" name="pwC" aria-describedby="validatedInputGroupPrepend"  >
          		  </div>
          		  <div class="input-group bottom">
            			<div class="input-group-prepend">
		                <span class="input-group-text" id="validatedInputGroupPrepend">Repetir Contraseña</span>
            			</div>
            			<input type="password" class="form-control" id="rPw" name="rPwC" aria-describedby="validatedInputGroupPrepend"  >
        		    </div>
          		  <label>
          		  	<input type="checkbox" id="vPw" onclick="vPwd('pw','rPw')"> Mostrar contraseñas
	              </label>
    					</fieldset>
    					<button type="submit" class="btn btn-primary right" name="addAdmin" value="Continuar"><span class="fa fa-arrow-right"></span></button>
    				</form>
          </div>
        </div>
        
      </div>
      <div class="tab-pane fade " id="finish" role="tabpanel" aria-labelledby="finish-tab">
      	
        	<a href="./" class="btn btn-success right cent">Finalizar Proceso</a>
        </div>
    </div>
  </div>
  <div class="col-4">
    <div class="alert alert-success" id="resultados">
      <ul id=listResultados>
        <?php $Install = new installC();
        echo $Install->createDB();
        echo $Install->createEnterprise();
        echo $Install->addLocation();
        echo $Install->addPayments();
        echo $Install->addCargos();
        echo $Install->addAdmin();
        ?>
      </ul>
    </div>
  </div>
</div>
<?php
	//show_source("./models/install.php");
?>
