
<section class="col-lg-12 connectedSortable ui-sortable">
    <div class="box box-success">
		<div class="box-header ui-sortable-handle">
			<i class='fa fa-book'></i><h3 class="box-title"> Módulo de Actas</h3>
			
			<div class="box-tools pull-right">	
		        <a href="https://ieanjesusoficial.org/webPDF/web/viewer.php" target="_blank" class="btn btn-primary btn-sm btn-flat" role="button"> <span class="fa fa-book" ></span> Libro Actas</a>
		        <a data-toggle="modal" data-target="#nuevaActa"class="btn btn-success btn-sm btn-flat" role="button"><span class="glyphicon glyphicon-plus" ></span>Nueva acta</a>
		    </div>	
		
			
						
		
		</div>
		<div class="box-body">
	
							
			<table id="example1" class="table table-hover table-condensed table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">Número Acta</th>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Tema</th>
                        <th class="text-center">Fecha Acta</th>
                        <th class="text-center">País</th>
                        <th class="text-center">Provincia</th>
                        <th class="text-center">Cantón</th>
                        <th class="text-center">Tipo</th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($actas as $row): ?>
                        <tr> 
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-info btn-sm btn-flat dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                            	<li><a href="#" title="Editar Acta"  data-toggle="modal" data-target="#modificarActa"><i class="glyphicon glyphicon-edit"></i> Editar Acta</a></li> 
                                <li><a href="#" title="Enviar Acta" data-toggle="modal" data-target="#enviarActa"><i class="fa fa-paper-plane"></i> Enviar Acta</a></li> 
                                <li><a href="#" title="Subir Digital" onclick="obtener_datos('5');" data-toggle="modal" data-target="#myModal99"><i class="glyphicon glyphicon-cloud-upload"></i> Subir Digital</a> </li>
                                <li><a href="#" title="Visualizar Digital" onclick="obtener_datos('5');" data-toggle="modal" data-target="#myModal88"><i class="fa fa-file"></i> Visualizar Digital</a></li> 
                                <li><a href="#" title="Ver Acta" onclick="obtener_datos('5');" data-toggle="modal" data-target="#myModal46"><i class="fa fa-eye"></i> Ver Acta</a></li> 	
                            
                               	</ul>
                             </div>

                            
                         
                        </td>
                            <td ><?php echo $row->numero_acta; ?></a></td> 
                            <td ><?php echo $row->usuario; ?></a></td> 
                            <td ><?php echo $row->tema; ?></a></td> 
                            <td ><?php echo $row->fecha_acta; ?></td> 
                            <td ><?php echo $row->pais; ?></td> 
                            <td class="text-center"><?php echo $row->provincia; ?></td>
                            <td class="text-center"><?php echo $row->canton; ?></td>
                             <td class="text-center" ><?php 
                                if ($row->tipo == 'Extraordinario'){
                                    echo "<small class = 'label pull-center bg-danger' style = 'background-color: #dd4b39;'>".$row->tipo. '<small>';}
                                else {
                                     echo "<small class = 'label pull-center bg-info' style = 'background-color: #3c8dbc;'>".$row->tipo. '<small>';
                                }
                             ?>
                             </td>
                           
                    
                        </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>				
		</div>
	</div>
			    		      
				    
				</div>


		</div>

	</div>
</section>

<!--Modal alta de acta -->
<?php $alta_acta; ?>
<!--Modal alta de acta -->
<?php $modificar_acta; ?>

<!--Modal alta de acta -->
<?php $enviar_acta; ?>
	 



