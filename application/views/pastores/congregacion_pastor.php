<!-- Modal congregacion pastor -->
<div id="congregacion_pastor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  box box-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><i class="fa fa-exchange"></i> Asignar congregación a pastor</h3>
      </div>
      <div class="modal-body">
             <?php echo form_open_multipart('api/asignar_congregacion_pastor', 'class="form-horizontal"');?>
			<div class="panel-body">		
        		 <div class="tab-content">
        		            <div class="form-group">
        		                    <input type="hidden" class="form-control" id="id_pastor_congregacion" name="id_pastor_congregacion" value="" >
                    				<label for="estado" class="col-sm-3 control-label">Congregación</label>
                    				
                    				
                    				<div class="col-md-8">
                    				    <select  data-placeholder="Elija una congregación" class="chosen-select" tabindex="2" style="width: 90%;" name="id_congregacion">
                    			            <option value ="">-- Elija una congregación --</option>
                    			            <option value ="">-- Sin asignación --</option>
                    						<?php foreach ($congregaciones as $row): ?>
                    						    <option value="<?php echo $row->id; ?>"><?php echo $row->nombre_iglesia; ?></option>
                    						<?php endforeach; ?> 
            				            </select>
                    				</div>
                			</div>

                			<div class="form-group">
                    				<label for="observacion" class="col-sm-3 control-label">Observación</label>
                    				<div class="col-md-8">
                    				  <textarea class="form-control" name="observacion" id="observacion" rows="3"></textarea>
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





