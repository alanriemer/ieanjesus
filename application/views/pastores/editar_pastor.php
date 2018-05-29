<!-- Modal alta pastor -->
<div id="editar_pastor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  box box-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><i class="fa fa-edit"></i> Editar pastor</h3>
      </div>
      <div class="modal-body">
             <?php echo form_open_multipart('api/editar_pastor', 'class="form-horizontal"');?>
			<div class="panel-body">		
        		 <div class="tab-content">
        		            <input type="hidden" class="form-control" id="modificar_id_pastor" name="modificar_id_pastor" value="" >
                    	    <div class="form-group">
                    				<label for="modificar_cedula_pastor" class="col-sm-3 control-label">Cedula</label>
                    				<div class="col-md-8">
                    				  <input type="text" class="form-control" id="modificar_cedula_pastor" name="modificar_cedula_pastor" value=""  placeholder="Cédula de ciudadanía" >
                    				</div>
                    	    </div>
                    	    <div class="form-group">
                    				<label for="modificar_nombre_pastor" class="col-sm-3 control-label">Nombres</label>
                    				<div class="col-md-8">
                    				  <input type="text" class="form-control" id="modificar_nombre_pastor" name="modificar_nombre_pastor" value=""  placeholder="Nombres pastor" >
                    				</div>
                    	    </div>
                    		<div class="form-group">
                    				<label for="modificar_apellido_pastor" class="col-sm-3 control-label"> Apellidos</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="modificar_apellido_pastor" name="modificar_apellido_pastor" value="" placeholder="Apellidos pastor"  required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_fecha_nacimiento_pastor" class="col-sm-3 control-label"> Fecha de nacimiento</label>
                    				<div class="col-md-8">
                    				  <input  type="date" class="form-control" id="modificar_fecha_nacimiento_pastor" name="modificar_fecha_nacimiento_pastor" value=""   required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_celular_pastor" class="col-sm-3 control-label"> Celular</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="modificar_celular_pastor" name="modificar_celular_pastor" value="" placeholder="Teléfono móvil"  required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_titulo_pastor" class="col-sm-3 control-label"> Título profesional</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="modificar_titulo_pastor" name="modificar_titulo_pastor" value="" placeholder="Título profesional"  required >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_cargo_pastor" class="col-sm-3 control-label"> Cargo asignado</label>
                    				<div class="col-md-8">
                    				    <select  class="form-control" name="modificar_cargo_pastor">
            			                    <option id="modificar_cargo_pastor" value ="">-- Seleccione Cargo --</option>
            			                     <?php foreach ($cargo_combo as $row): ?>
            						               <option value="<?php echo $row->nombre_cargo; ?>"><?php echo $row->nombre_cargo; ?></option>
            						        <?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_licencia_pastor" class="col-sm-3 control-label"> Licencia</label>
                    				<div class="col-md-8">
                    				    <select  class="form-control" name="modificar_licencia_pastor">
            			                    <option id="modificar_licencia_pastor" value ="">-- Seleccione Licencia --</option>
            			                     <?php foreach ($licencia_combo as $row): ?>
            						               <option value="<?php echo $row->nombre_licencia; ?>"><?php echo $row->nombre_licencia; ?></option>
            						        <?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_zona_pastor" class="col-sm-3 control-label"> Zona asignada</label>
                    				<div class="col-md-8">
                    				   <select   class="form-control" name="modificar_zona_pastor">
            			                    <option id="modificar_zona_pastor" value ="">-- Seleccione Zona asignada --</option>
            			                    <?php foreach ($zona_asignada_combo as $row): ?>
            						               <option value="<?php echo $row->nombre_zona; ?>"><?php echo $row->nombre_zona; ?></option>
            						        <?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_aporte_iess_pastor" class="col-sm-3 control-label">Aporte IESS</label>
                    				<div class="col-md-8">
                    				   <select   class="form-control" name="modificar_aporte_iess_pastor">
            			                    <option id="modificar_aporte_iess_pastor" value ="">-- Seleccione Aporte IESS --</option>
            			                    <option value ="SI">Sí</option>
            			                    <option value ="NO">No</option>
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_valor_iess_pastor" class="col-sm-3 control-label">Valor IESS</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="modificar_valor_iess_pastor" name="modificar_valor_iess_pastor" value="0"   >
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_aporte_cambia_pastor" class="col-sm-3 control-label">Aporte Cambia</label>
                    				<div class="col-md-8">
                    			        <select   class="form-control" name="modificar_aporte_cambia_pastor">
            			                    <option id="modificar_aporte_cambia_pastor" value ="">-- Seleccione Aporte Cambia --</option>
            			                    <option value ="SI">Sí</option>
            			                    <option value ="NO">No</option>
            				            </select>
                    				</div>
                			</div>
                			<div class="form-group">
                    				<label for="modificar_valor_cambia_pastor" class="col-sm-3 control-label">Valor Cambia</label>
                    				<div class="col-md-8">
                    				  <input  type="text" class="form-control" id="modificar_valor_cambia_pastor" name="modificar_valor_cambia_pastor" value="0" required >
                    				</div>
                			</div>

                			<div class="form-group">
                    				<label for="modificar_observacion_pastor" class="col-sm-3 control-label">Observación</label>
                    				<div class="col-md-8">
                    				  <textarea class="form-control" name="modificar_observacion_pastor" id="modificar_observacion_pastor" rows="3"></textarea>
                    				</div>
                			</div>
                			

            			    
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





