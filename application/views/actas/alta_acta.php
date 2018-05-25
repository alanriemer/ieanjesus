<!-- Modal alta acta -->
<div id="nuevaActa" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header box box-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Nuevo Acta</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>api/alta_acta" class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
			<div id="resultados_ajax"></div>
		
			 <div class="panel with-nav-tabs panel-default">
			    <div class="panel-heading">
		                <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Datos de Envio</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Acta</a></li>
                         
                        </ul>
				</div>		
				<div class="panel-body">		
            		 <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">	
                            <input type="hidden" class="form-control" id="de" name="de" placeholder="De" value="<?php //echo "$user"; ?>" readonly>
            				<input type="hidden" class="form-control" id="iglesia" name="iglesia" value="<?php //echo "$sqliglesiaaaa"; ?>" readonly>
                    	    <div class="form-group">
                    				<label for="numero_acta" class="col-sm-3 control-label">No. Reunión:</label>
                    				<div class="col-md-8">
                    				  <input type="text" class="form-control" id="numero_acta" name="numero_acta" value="<?php echo "IEANJESUS-REUNION-". date("Y") ."-".str_pad(++$nro_acta,3,0, STR_PAD_LEFT); ?>"  placeholder="No. Reunión" readonly>
                    				</div>
                    	    </div>
                    		<div class="form-group">
                    				<label for="fecha_acta" class="col-sm-3 control-label">Fecha Reunión:</label>
                    				<div class="col-md-8">
                    				  <input  type="datetime-local" class="form-control" id="datetime" name="fecha_acta" value=""  required >
                    				</div>
                			</div>
                		    <div class="form-group">
                			<label for="pais" class="col-sm-3 control-label">Pais</label>
                			<div class="col-sm-8">			
                				<select  id="pais" name="pais" class="form-control" >
                                    <option value="ECUADOR">ECUADOR</option>
                                </select>			
                			</div>
            			  </div>
            				<div class="form-group">
            				<label for="provincia" class="col-sm-3 control-label">Provincia</label>
            				<div class="col-sm-8">
            			
            			     <select required id="id_provincia" name="provincia" class="form-control">
            			            <option value ="">-- Elija una provincia --</option>
            						<?php foreach ($provincias as $row): ?>
            						    <option value="<?php echo $row->id; ?>"><?php echo $row->provincia; ?></option>
            						<?php endforeach; ?> 
            				</select>
            				</div>
            			  </div>
            			    <div class="form-group">
            				<label for="canton" class="col-sm-3 control-label">Canton</label>
            				<div class="col-sm-8">
            				<select required id="idcanton" name="canton" class="form-control"  >
            				    <option value="">-- Elija un cantón --</option>
            				    
            				</select>
            				</div>
            			  </div>
            			    <div class="form-group">
            				<label for="direccion" class="col-sm-3 control-label">Dirección:</label>
            				<div class="col-md-8">
            				  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
            				</div>
            			  </div>
            			    <div class="form-group">
            				<label for="tipo" class="col-sm-3 control-label">Tipo Sesion</label>
            				<div class="col-sm-8">
            				 <select class="form-control" id="tipo" name="tipo" required>
            					<option value="">-- Seleccione tipo --</option>
            					<option value="Ordinario">Ordinario</option>
            					<option value="Extraordinario">Extraordinario</option>
            				  </select>
            				</div>
            			  </div>
            			    <div class="form-group">
            				<label for="tema" class="col-sm-3 control-label">Tema Tratado:</label>
            				<div class="col-md-8">
            				  <input type="text" class="form-control" id="tema" name="tema" placeholder="Tema Tratado" required>
            				</div>
            			  </div>
            			   </div>
            		    <div class="tab-pane fade" id="tab2default">
                             <div class="form-group">
            				<div class="col-md-12">
            				 	<textarea class="ckeditor"  name="cuerpo" id="cuerpoo">
            		        	</textarea>
            				</div>
            			  </div>
            			</div>
                	</div>
    		      </div>
    		  </div>         
	</div>
		  <div class="modal-footer">
		
			<button type="button" class="btn btn-default  btn-sm btn-flat" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-success  btn-sm btn-flat" id="guardar_oficios">Guardar acta</button>
		  </div>
		  </form>
      </div>
   
    </div>
    
    

  </div>
</div>




