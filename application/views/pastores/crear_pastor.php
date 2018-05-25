<!-- Modal alta pastor -->
<div id="crear_pastor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  box box-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Crear pastor</h3>
      </div>
      <div class="modal-body">
             <?php echo form_open_multipart('api/crear_pastor', 'class="form-horizontal"');?>
			<div class="panel-body">		
        		 <div class="tab-content">
                    	    <div class="form-group">
                    				<label for="cedula" class="col-sm-3 control-label">Cedula</label>
                    				<div class="col-md-8">
                    				  <input type="text" class="form-control" id="cedula" name="cedula" value=""  placeholder="Cédula de ciudadanía" >
                    				</div>
                    	    </div>
                    	    <div class="form-group">
                    				<label for="foto_pastor" class="col-sm-3 control-label">Foto Pastor</label>
                    				<div class="col-md-8">
                    				  <input type="file" name="foto_pastor" id="foto_pastor" >
                    				</div>
                    	    </div>
                    	    <div class="form-group">
                    				<label for="nombre_pastor" class="col-sm-3 control-label">Nombres</label>
                    				<div class="col-md-8">
                    				  <input type="text" class="form-control" id="nombres" name="nombre_pastor" value=""  placeholder="Nombres pastor" >
                    				</div>
                    	    </div>
                    		<div class="form-group">
                    				<label for="apellido_pastor" class="col-sm-3 control-label"> Apellidos</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="apellido_pastor" name="apellido_pastor" value="" placeholder="Apellidos pastor"  required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="fecha_nacimiento" class="col-sm-3 control-label"> Fecha de nacimiento</label>
                    				<div class="col-md-8">
                    				  <input  type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value=""   required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="celular" class="col-sm-3 control-label"> Celular</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="celular" name="celular" value="" placeholder="Teléfono móvil"  required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="titulo_profesional" class="col-sm-3 control-label"> Título profesional</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="titulo_profesional" name="titulo_profesional" value="" placeholder="Título profesional"  required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="cargo_asignado" class="col-sm-3 control-label"> Cargo asignado</label>
                    				<div class="col-md-8">
                    				    <select  data-placeholder="Seleccione Cargo" class="form-control" name="cargo_asignado">
            			                    <option value ="">-- Seleccione Cargo --</option>
            			                     <?php foreach ($cargo_combo as $row): ?>
            						               <option value="<?php echo $row->nombre_cargo; ?>"><?php echo $row->nombre_cargo; ?></option>
            						        <?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="licencia" class="col-sm-3 control-label"> Licencia</label>
                    				<div class="col-md-8">
                    				    <select  data-placeholder="Seleccione Licencia " class="form-control" name="licencia">
            			                    <option value ="">-- Seleccione Licencia --</option>
            			                     <?php foreach ($licencia_combo as $row): ?>
            						               <option value="<?php echo $row->nombre_licencia; ?>"><?php echo $row->nombre_licencia; ?></option>
            						        <?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="zona_asignada" class="col-sm-3 control-label"> Zona asignada</label>
                    				<div class="col-md-8">
                    				   <select  data-placeholder="Seleccione Zona asignada " class="form-control" name="zona_asignada">
            			                    <option value ="">-- Seleccione Zona asignada --</option>
            			                    <?php foreach ($zona_asignada_combo as $row): ?>
            						               <option value="<?php echo $row->nombre_zona; ?>"><?php echo $row->nombre_zona; ?></option>
            						        <?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="aporte_iess" class="col-sm-3 control-label">Aporte IESS</label>
                    				<div class="col-md-8">
                    				   <select  data-placeholder="Seleccione Aporte IESS"  class="form-control" name="aporte_iess">
            			                    <option value ="">-- Seleccione Aporte IESS --</option>
            			                    <option value ="SI">Sí</option>
            			                    <option value ="NO">No</option>
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="valor_iess" class="col-sm-3 control-label">Valor IESS</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="valor_iess" name="valor_iess" value="0"   >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="aporte_cambia" class="col-sm-3 control-label">Aporte Cambia</label>
                    				<div class="col-md-8">
                    			        <select  data-placeholder="Seleccione Aporte Cambia"  class="form-control" name="aporte_cambia">
            			                    <option value ="">-- Seleccione Aporte Cambia --</option>
            			                    <option value ="SI">Sí</option>
            			                    <option value ="NO">No</option>
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="valor_cambia" class="col-sm-3 control-label">Valor Cambia</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="valor_cambia" name="valor_cambia" value="0" required >
                    				</div>
                			</div>

                			<div class="form-group">
                    				<label for="observacion" class="col-sm-3 control-label">Observación</label>
                    				<div class="col-md-8">
                    				  <textarea class="form-control" name="observacion" id="observacion" rows="3"></textarea>
                    				</div>
                			</div>
                			<input  type="hidden" class="form-control" id="estado" name="estado" value="s"  >

            			    
            	</div>
		    </div>

            <div class="modal-footer">
				<button type="button" class="btn btn-default  btn-md btn-flat" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger  btn-md btn-flat" id="guardar_oficios">Guardar</button>

            </div>
        </form>
      </div>

    </div>

  </div>
</div> 





