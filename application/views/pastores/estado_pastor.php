<!-- Modal alta pastor -->
<div id="estado_pastor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  box box-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><i class="fa fa-trash"></i> Estado pastor</h3>
      </div>
      <div class="modal-body">
             <?php echo form_open('api/estado_pastor', 'class="form-horizontal"');?>
			<div class="panel-body">		
        		 <div class="tab-content">
        		            <input type="hidden" class="form-control" id="id_pastor" name="id_pastor" value="" >
        		            <div class="form-group">
                    				<label for="estado" class="col-sm-3 control-label">Estado</label>
                    				<div class="col-md-8">
                    				   <select required  class="form-control" name="estado">
            			                    <option value ="">-- Seleccione --</option>
            			                    <option value ="Cesado">Cesado</option>
            			                    <option value ="Disciplinado">Disciplinado</option>
            			                    <option value ="Fallecido">Fallecido</option>
            			                    <option value ="Misionero">Misionero</option>
            			                    <option value ="Suspendido">Suspendido</option>
            			                    <option value ="Destituido">Destituido</option>
            			                    <option value ="Inactivo">Inactivo</option>
            				            </select>
                    				</div>
                			</div>
                    	    <div class="form-group">
                    				<label for="fecha" class="col-sm-3 control-label">Fecha</label>
                    				<div class="col-md-8">
                    				  <input type="date" class="form-control" id="fecha" name="fecha" value=""  placeholder="Fecha de cambio de estado" required>
                    				</div>
                    	    </div>

                			


                			<div class="form-group">
                    				<label for="motivo" class="col-sm-3 control-label">Motivo</label>
                    				<div class="col-md-8">
                    				  <textarea class="form-control" name="motivo" id="motivo" rows="3" required></textarea>
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





