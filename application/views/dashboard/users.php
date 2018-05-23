<!-- Main content -->

<div class="content">

<section class="col-md-12 connectedSortable ui-sortable">
        <div class="box box-warning">
    		<div class="box-header ui-sortable-handle">
    			<i class='fa fa-users'></i><h3 class="box-title">Listado de usuarios registrados</h3>
    			
    			<div class="box-tools pull-right">	
    		        <a href="<?php echo base_url();?>dashboard/crear_usuario"class="btn btn-warning btn-sm btn-flat" role="button"><span class="glyphicon glyphicon-plus" ></span>Nuevo usuario</a>
    		    </div>	
    		</div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- mostrando los usuarios -->
                <table id="users" class="table table-hover table-condensed table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Opciones</th>
                            <th class="text-center">id</th>
                            <th class="text-center">Nombres y Apellidos</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Perfil</th>
                            <th class="text-center">Nombre iglesia</th>
                
                        </tr>
                    </thead>
                    <tbody>
    
              
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        
        </div>
            
</section>

    <!-- /.content -->

  

</div>
