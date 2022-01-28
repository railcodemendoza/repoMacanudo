
<<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php

    
?>

<br>
<div class="container-fluid">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Todas las Picadas 
        </div>
        <div class="card-body card-block">
        <div class="table-responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
        
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                <thead style="text-align: center;">
                  <tr>
                    <th>Id</th>
                    <th>Recibe</th>
                    <th>Celular</th>
                    <th>Localidad</th>
                    <th>Horario</th>
                    <th>Cobro</th>

                  </tr>

                  <?php
                    
                    $query = "SELECT * FROM `general` where type = 'con_envio' and status ='PARA ENTREGAR' AND `delivery_date` >= NOW()" ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $cnne = $row['cnee'];
                      $cnee_cel_phone = $row['cnee_cel_phone'];
                      $location = $row['location'];
                      $schedule_available = $row['schedule_available'];
                      $in_ars = $row['in_ars'];
                  ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $cnne;?></td>
                    <td><?php echo $cnee_cel_phone;?></td>
                    <td><?php echo $location;?></td>
                    <td><?php echo $schedule_available;?></td>
                    <td><?php echo $in_ars;?></td>
                    
                   
                  </tr>
                  
                </tbody>
                    <?php };?>
                   </table>
                   </div>
           
                <div class="row" style="text-align: center;">

                <div class="col-sm-2 mx-auto">
                  <form action="../report/report_fletes.php" method="POST">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button> 
                    </form> 
                </div>
                <div class="col-sm-2 mx-auto">
                  <form action="../actions/envio_mail_flete.php" method="POST">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Enviar Mail </button> 
                    </form> 
                </div>

        </div> 
        
        <br> 
    </div>
</div>
<br>
    

<br>


<?php include('../fijos/footer.php');?>

            