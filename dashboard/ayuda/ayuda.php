<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 style="text-align:center;">Mis Tickets</h3>
        </div>
        <div class="card-body">
            <div class="table-reponsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">                        
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead style="text-align:center;">
                        <tr>
                            <th>Fecha</th>
                            <th>Titulo </th>
                            <th>Area</th>
                            <th>Dead Line</th>
                            <th>Status</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $usuario = 'tincho'; 
                            $conn_builit = mysqli_connect(
                                '31.170.161.22',
                                'u101685278_buildit',
                                'Pachiman2020',
                                'u101685278_buildit'
                              );

                            $query = "SELECT * FROM `ticket_macanudas`  WHERE `user` = '$usuario'";
                            $result = mysqli_query($conn_builit, $query);    
                            while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                            <td style=" font-size: 0.7rem;"><?php echo $row['Created_at']; ?></td>
                            <td style=" font-size: 0.8rem;"><?php echo $row['title']; ?></td>
                            <td style=" font-size: 0.8rem;"><?php echo $row['area']; ?></td>
                            <td style=" font-size: 0.8rem;"><?php echo $row['dead_line'];?></td>
                            <td style=" font-size: 0.8rem;"><?php echo $row['status']; ?></td>
                            <td style=" width:15%;">
                                <div style="margin: 0 10% 0 10%;" class="row">
                                    <a title="Marcar como Resulto" style="margin: 0% 0% 0% 5%;" href="../ayuda/resuelto.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a  style="margin: 0% 0% 0% 5%;" href="../ayuda/detalle_ticket.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 style="text-align:center;">Tickets</h3>
        </div>
        <div class="card-body">
        <p style="text-align: center;">Describa con detalle su problema.</p>
            <form action="ayuda_enviar.php" method="post" class="form-horizontal">
                <div class="row form-group" style="text-align: center;">
                    <div class="col-sm-2">
                        <label for="selectSm" class=" form-control-label">Seleccionar Area</label>
                    </div>
                    <div class="col-sm-3">
                        <select name="area[]" id="selectSm" class="form-control-sm form-control">
                            <option value="">Area:</option>
                            <option value="Instructivos">Pedidos con Envio</option>
                            <option value="Base de Datos">Pedidos con Retiro</option>
                            <option value="Formularios">Pagina Principal</option>
                            <option value="Reportes">Flete / Logisitica</option>
                            <option value="Asignaciones">Agregados</option>
                            <option value="Documentacion">Picadas por día</option>

                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="selectSm" class="form-control-label">Dead Line:</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" name="deadline" class="form-control">
                    </div>
                </div>
                <div class="row form-group" style="text-align: center;">
                    
                    <div class="col-sm-2">
                        <label for="text" class="form-control-label">Título:</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="title" placeholder="Descripcion rápida del problema">
                    </div>
                </div>
                <div class="row form-group" style="text-align: center;">
                    
                    <div class="col-sm-2">
                        <label for="textarea-input" class="form-control-label">Mensaje</label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="description"  placeholder="Contenido del Problema" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                        <button type="submit" name="enviar" class="btn btn-primary col-sm-2 mx-auto">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="//code.tidio.co/64clap1geeskjukzxzptkrvxi9xvooro.js" async></script>
<?php include('../fijos/footer.php');?>