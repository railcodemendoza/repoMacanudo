<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php 

$id = $_GET['id'];

$query = "SELECT * FROM preparadas WHERE id = $id";
$result = mysqli_query($conn, $query);

if($row = mysqli_fetch_assoc($result)) { 
                                                
    $picada = $row['picada'];
    $tamano = $row['tamano'];
    $tipo = $row['tipo'];
    $fecha_preparacion = $row['fecha_preparacion'];
    $user = $row['user'];

}
?>
<br>
<div class="container-fluid">
    <div class="card">
        <br>
        <div class="card-header">
            <h4 style="text-align: center;">Asignar picada <strong><?php echo $picada; ?> - <?php echo $tamano; ?> - <?php echo $tipo; ?></strong></h4> 
        </div>
        <div class="card-body">
           
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>id</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Picada</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query = "SELECT * FROM `general` WHERE status = 'PARA HACER' ORDER BY `created_at` DESC" ;
                        $result = mysqli_query($conn, $query);                        
                        while($row = mysqli_fetch_assoc($result)) { 
                        
                        $id_pedido = $row['id'];
                        $delivery_date = $row['delivery_date'];
                        $customer = $row['customer'];
                        $product = $row['product'];
                        $add1 = $row['add1'];
                        $add2 = $row['add2'];
                        $payment_mode = $row['payment_mode'];
                        $status = $row['status'];
                        $cel_phone = $row['cel_phone'];
                        $cnee_cel_phone = $row['cnee_cel_phone'];
                        $cnee = $row['cnee'];
                        $inscription = $row['inscription']; 
                        $schedule_available = $row['schedule_available'];
                        $address = $row['address'];
                        $referencia = $row['referencia'];
                        $location = $row['location'];                      
                        
                        ?>
                        <tr>
                            <td><?php echo $id_pedido;?></td>
                            <td><?php echo $delivery_date;?></td>
                            <td><?php echo $customer;?></td>
                            <td><?php echo $product;?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary" title="Ver Detalle" type="button" data-toggle="modal" data-target="#ver<?php echo $id_pedido;?>"><i class="fa fa-eye"></i></button>
                                        <div class="modal fade" id="ver<?php echo $id_pedido;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Detalles de Picada para <strong><?php echo $customer;?></strong></h4>    
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border border-secondary">
                                                            <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align:center;"> <strong> Nombre: </strong> <?php echo $customer .' ('.$cel_phone . ') ' ?> </h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"> <strong> Dedicatoria: </strong></h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"><?php echo $inscription;?></h4>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"> <strong> Fecha: </strong> <?php echo $delivery_date ; ?> </h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"> <strong> Horario: </strong> <?php echo $schedule_available ; ?> </h4>
                                                                </div>
                                                            </div> 
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"><strong>Picada: </strong> <?php echo $product . ' ( '. $add1 . ')';?></h4>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"><strong>Agregados:</strong> <?php echo $add2;?></h4>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8" > 
                                                                <h4 style="text-align: center;"><strong>Forma de Pago:</strong> <?php echo $payment_mode; ?></h4>
                                                                </div>
                                                            </div> 
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-4" style="text-align: center;">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
                                                            </div>
                                                            <div class="col-sm-4"></div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Final Modal View CNTR--> 
                                                   
                                    <a class="btn btn-primary" title="Asignar" href="../actions/asignaPedido.php?id_pedido=<?php echo $id_pedido;?>&id=<?php echo $id;?>" type="button"><i class="fa fa-check"></i></a>
                            </td>
                            <!--Modal asigned CNTR-->
                            
                        </tr>

                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php include('../fijos/footer.php'); ?>