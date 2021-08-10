<div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" enctype='multipart/form-data'>
        	<div class="modal-content">
                <div class="modal-header bg-primary">
                    <span class="modal-title text-white" id="myModalLabel">Recuperar Contraseña</span>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                	<!-- CAMPOS DEL FORMULARIO-->
                	
                    <div id="ndui" class="form-group input-group">
                    	<div class="input-group-preppend">
						<span class="input-group-text">
							<font style="vertical-align:inherit;">
								<i class="fa fa-user"></i>
							</font>
						</span>
						</div>
						<?php
							/*$dui="";
							$rO="";
							if(isset($_SESSION["ID"])){
								$dui=$_SESSION["ID"];
								$rO="readonly";
							}*/
						?>
						<input required class='form-control' onKeyUp="setGuion(1,'dui1')" id="dui1" maxlength="10" type="text" name="dui_u1" value="<?php //echo desencript($dui); ?>" <?php //echo $rO; ?> placeholder="Numero de DUI" pattern="[0-9\-]{10,10}" title="Tamaño mínimo: 10. Tamaño máximo: 10" />
					</div>
					<div id="nContra" class="form-group input-group">
						<div class="input-group-preppend">
						<span class="input-group-text">
							<font style="vertical-align:inherit;">
								<i class="fa fa-lock"></i>
							</font>
						</span>
						</div>
						<input required class='form-control' id="p1" type="password" name="p1" placeholder="Contraseña" pattern="[a-zA-Z0-9\-]{6,250}" title="La Contraseña debe contener a-z A-Z y numeros. Tamaño mínimo: 6. Tamaño máximo: 250" />
						<span class="input-group-btn">
							<button id="ver1" type="button" class="btn btn-default"><i class="fa fa-eye" id="icVer1"></i>&nbsp;</button>
						</span>
					</div>

					<div id="nContraR" class="form-group input-group ">
						<div class="input-group-preppend">
						<span class="input-group-text">
							<font style="vertical-align:inherit;">
								<i class="fa fa-unlock-alt"></i>
							</font>
						</span>
						</div>
						<input required class='form-control' id="rP1" type="password" name="rp1" placeholder="Confirme Contraseña" pattern="[a-zA-Z0-9\-]{6,250}" title="La Contraseña debe contener a-z A-Z y numeros. Tamaño mínimo: 6. Tamaño máximo: 250" />
						<span class="input-group-btn">
								<button id="rVer1" type="button" class="btn btn-default"><i class="fa fa-eye" id="icRVer1"></i>&nbsp;</button>
						</span>
					</div>

					<!--FIN CAMPOS DEL FORMULARIO -->
					<div id="passwords1" style="display: none;" class="alert  alert-dismissable">
                        <font style="vertical-align: inherit; float: right;">
                    		<i class="fa" id="icPasswords1"></i>
                    	</font>

                        <label style="vertical-align: inherit;" id="texto1"></label>

                	</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="savePass" value="ok" class="btn btn-primary">Guardar Cambios</button>
                </div>
        	</div>
        </form>
        <!-- /.modal-content a-->
    </div>

</div>