    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Usuarios Registrados</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- mostrando los usuarios -->
                        <table id="example1" class="table table-hover table-condensed table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Nombres y Apellidos</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Actualizado</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i=0; ?>
                                <?php foreach ($users as $user): ?>
                                    <tr> 
                                        <td class="text-center"><?php echo $i=$i+1; ?></td>
                                        <td ><a href="http://"><?php echo $user['nombre_completo']; ?></a></td>   
                                        <td ><?php echo $user['correo']; ?></td> 
                                        <td class="text-center"><?php echo $user['usuario']; ?></td>
                                        <td class="text-center"><?php echo $user['id_congregacion']; ?></td>
                                        <td class="text-center">
                                            
                                            <button type="button" class="btn btn-primary btn-flat btn-xs"><span class="fa fa-eye"></span></button>
                                            <button type="button" class="btn btn-primary btn-flat btn-xs"> <span class="fa fa-edit"></span> </button>
                                            <button type="button" class="btn btn-primary btn-flat btn-xs"> <span class="fa fa-trash-o"></span></button>
                                            
                                        </td>
                                
                                    </tr> 
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- /.content -->
  </div>

