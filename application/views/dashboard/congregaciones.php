<!-- Main content -->

<div class="content">

<section class="col-md-6 connectedSortable ui-sortable">
        <div class="box box-success">
    		<div class="box-header ui-sortable-handle">
    			<i class='fa fa-users'></i><h3 class="box-title">Listado de congregaciones</h3>
    			
    			<div class="box-tools pull-right">	
    		        <button   data-toggle="modal" data-target="#crear_congregacion" class="btn btn-success btn-sm btn-flat" role="button"><span class="glyphicon glyphicon-plus" ></span>Nueva congregación</button>
    		    </div>	
    		</div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- mostrando los usuarios -->
                <table id="congregaciones" class="table table-hover table-condensed table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Opciones</th>
                            <th class="text-center">id</th>
                            <th class="text-center">Nombre congregación</th>
                            <th class="text-center">Estado</th>
                           
                
                        </tr>
                    </thead>
                    <tbody>
    
              
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        
        </div>
            
</section>
<!-- Modal -->
<div id="crear_congregacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crear congregación</h4>
      </div>
      <div class="modal-body">
         <form action="<?php echo base_url();?>api/alta_congregacion" class="form-horizontal" method="post" id="guardar_congregacion" name="guardar_congregacion">
    		    <div class="form-group">
    			<label for="direccion" class="col-sm-3 control-label">Nombre congregación:</label>
    			<div class="col-md-8">
    			  <input type="text" class="form-control" id="nombre_iglesia" name="nombre_iglesia" placeholder="Nombre congregación" required>
    			</div>
    		  </div>
    		    <div class="form-group">
    			<label for="tipo" class="col-sm-3 control-label">Estado</label>
    			<div class="col-sm-8">
    			 <select class="form-control" id="estado" name="estado" required>
    				<option value="s" selected>Activo</option>
    				<option value="n">Inactivo</option>
    			  </select>
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
    <!-- /.content -->

  

</div>
