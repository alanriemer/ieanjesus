<?php echo $crear_pastor;?>
<?php echo $estado_pastor;?>
<?php echo $editar_pastor;?>
<?php echo $foto_pastor;?>
<?php echo $congregacion_pastor;?>
<?php echo $historal_pastor;?>


<!-- Main content -->
<div class="content">
<section class="col-lg-12 connectedSortable ui-sortable">
        <div class="box box-danger">
    		<div class="box-header ui-sortable-handle">
    			<i class='fa fa-users'></i><h3 class="box-title">Listado de pastores</h3>
    			
    			<div class="box-tools pull-right">	
    		        <button   data-toggle="modal" data-target="#crear_pastor"  class="btn btn-danger btn-sm btn-flat" role="button"><span class="glyphicon glyphicon-plus" ></span>Nuevo pastor</button>
    		    </div>	
    		</div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- mostrando los usuarios -->
                        <table id="pastores" class="table table-hover table-condensed table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center"> </th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Foto Pastor</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Nombre Pastor</th>
                                    <th class="text-center">Apellido Pastor</th>
                                    <th class="text-center">Cedula</th>
                                    <th class="text-center">Fecha Nacimiento</th>
                                    <th class="text-center">Congregación asignada</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
        </div>
            
</section>

</div>



