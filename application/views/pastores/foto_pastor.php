<!-- Modal alta pastor -->
<div id="cambiar_foto_pastor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  box box-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><i class="fa fa-trash"></i> Foto pastor</h3>
      </div>
      <div class="modal-body">
             <?php echo form_open_multipart('api/cambiar_foto_pastor', 'class="form-horizontal"');?>
            <input type="hidden" class="form-control" id="id_pastor_foto" name="id_pastor_foto" value="" >
			<div class="panel-body">		
        		 <div class="tab-content">
    		          <div class="form-group">
                				<label for="foto_pastor" class="col-sm-3 control-label">Foto Pastor</label>
                				<div class="col-md-8">
                				  <input type="file" name="foto_pastor" id="foto_pastor"  >
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





