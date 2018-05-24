<div class="content">

<section class="col-lg-12 connectedSortable ui-sortable">
        <div class="box box-warning">
    		<div class="box-header ui-sortable-handle">
    			<i class='fa fa-user'></i><h3 class="box-title">Crear usuario</h3>
    		</div>
    		
    	<div class="box-body">	
            <form action="<?php echo base_url();?>api/crear_usuario" class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
			<div class="panel-body">		
        		 <div class="tab-content">
            				<input type="hidden" class="form-control" id="foto" name="foto" value="/archivos_ieanjesus/foto_pastor/" readonly>
                    	    <div class="form-group">
                    				<label for="numero_acta" class="col-sm-3 control-label">Nombres</label>
                    				<div class="col-md-8">
                    				  <input type="text" class="form-control" id="nombres" name="nombres" value=""  placeholder="Nombres" >
                    				</div>
                    	    </div>
                    		<div class="form-group">
                    				<label for="fecha_acta" class="col-sm-3 control-label"> Apellidos</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="apellidos" name="apellidos" value="" placeholder="Apellidos"  required >
                    				</div>
                			</div>
            				<div class="form-group">
            				    <label for="congregacion" class="col-sm-3 control-label">Congregación</label>
            				    <div class="col-sm-8">
            			
            			     <select  data-placeholder="Elija una congegación" class="chosen-select" tabindex="2" name="congregacion">
            			            <option value ="">-- Elija una congregación --</option>
            						<?php foreach ($congregaciones as $row): ?>
            						    <option value="<?php echo $row->id; ?>"><?php echo $row->nombre_iglesia; ?></option>
            						<?php endforeach; ?> 
            				</select>
            				</div>
            			    </div>
            			    <div class="form-group">
            				    <label for="canton" class="col-sm-3 control-label">Usuario</label>
            				    <div class="col-md-8">
                    				  <input  type="text" class="form-control" id="usuario" name="usuario" value="" placeholder="Usuario"  required >
                    		    </div>
            			   </div>
            			    <div class="form-group">
                				<label for="tipo" class="col-sm-3 control-label">Perfil</label>
                				<div class="col-sm-8">
                			     <select required id="id_perfiles" name="perfil" class="form-control">
                			            <option value ="">-- Elija un perfil --</option>
                						<?php foreach ($perfiles as $row): ?>
                						    <option value="<?php echo $row->id; ?>"><?php echo $row->nombre; ?></option>
                						<?php endforeach; ?> 
                				</select>
                				</div>
            			  </div>
            			  <div class="form-group">
                				<label for="junta_administrativa" class="col-sm-3 control-label">Junta Administrativa</label>
                				<div class="col-sm-8">
                				    <label class="radio-inline">
                			            <input type="radio" name="junta" value="1" > Sí<br>
                			        </label>
                			        <label class="radio-inline">
                                        <input type="radio" name="junta" value="0" checked> No<br>
                                    </label>
                				</div>
            			  </div>
            			  <div class="form-group">
            				    <label for="canton" class="col-sm-3 control-label">Correo</label>
            				    <div class="col-md-8">
                    				  <input  type="email" class="form-control" id="correo" name="correo" value=""  placeholder="Ej. example@example.org"  required >
                    		    </div>
            			   </div>
            			   <div class="form-group">
            				    <label for="direccion" class="col-sm-3 control-label">Contraseña</label>
            				    <div class="col-md-8">
            				  <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            				</div>
            			  </div>

            			  <div class="form-group">
            				    <label for="direccion" class="col-sm-3 control-label">Repita contraseña</label>
            				    <div class="col-md-8">
            				  <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Repita contraseña" oninput="check(this)" required>
            				</div>
            			  </div>
            			   <script language='javascript' type='text/javascript'>
                            function check(input) {
                                if (input.value != document.getElementById('password').value) {
                                    input.setCustomValidity('Las contraseñas deben sere iguales.');
                                } else {
                                    // input is valid -- reset the error message
                                    input.setCustomValidity('');
                                }
                            }
                        </script>
            			  <div class="form-group">
                				<label for="tipo" class="col-sm-3 control-label">Estado</label>
                				<div class="col-sm-8">
                    				 <select class="form-control" id="estado" name="estado" required>
                    					<option value="s">Activo</option>
                    					<option value="n">Inactivo</option>
                    				  </select>
                				</div>
            			  </div>
            			  <div class="form-group">
                				<button type="button" class="btn btn-default  btn-sm btn-flat" onclick="window.location='/dashboard/users'">Cerrar</button>
            <button type="submit" class="btn btn-warning  btn-sm btn-flat" id="guardar_oficios">Guardar</button>
            			  </div>
            	</div>
		      </div>
       

        <div class="footer">
            
        </div>
	  </form>
        </div>
        </div>
            
</section>

    <!-- /.content -->

  

</div>





