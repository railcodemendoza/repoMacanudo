 
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php

    
?>
<br>
<div class="container-fluid">
  <div  class="card">
    <div style="text-align:center;"  class="card-header">
        Picadas listas
    </div>
    <div class="card-body card-block">
      <div class="dataTables_info responsive" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
        <table class="table table-striped table-advance table-hover">
          <thead style="text-align: center;">
            <tr>
              <th>id</th>
              <th>Fecha</th>
              <th>Picada</th>
              <th>Tamaño</th>
              <th>Tipo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT * FROM `preparadas` WHERE asignacion = 'NO ASIGNADA'" ;
              $result = mysqli_query($conn, $query);                        
              while($row = mysqli_fetch_assoc($result)) { 
                $id = $row['id'];
                $picada = $row['picada'];
                $tamano = $row['tamano'];
                $tipo = $row['tipo'];
                $fecha_preparacion = $row['fecha_preparacion'];
                $user = $row['user'];      
                ?>
            <tr>
              <td><?php echo $id;?></td>
              <td><?php echo $fecha_preparacion;?></td>
              <td><?php echo $picada;?></td>
              <td><?php echo $tamano;?></td>
              <td><?php echo $tipo;?></td>
              
              <td style="text-align: center;">
                <div class="btn-group">
                  <a class="btn btn-primary mr-2" title="Asignar a Pedido" href="../views/asignarAPedido.php?id=<?php echo $id;?>" type="button"><i class="fa fa-hand-o-up"></i></a>      
                  <a class="btn btn-primary" title="Eliminar" href="../actions/DeletePicada.php?id=<?php echo $id;?>" type="button" ><i class="fa fa-trash"></i></a>
              </td>
            </tr>
        
          <?php };?>
          </tbody>
        </table>
      </div>
      <br>
      <div class="row" style="text-align: center;">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
          <form action="../report/report_listas.php" method="POST">
            <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button> 
          </form> 
        </div> 
        <div class="col-sm-2">
          <a href="../views/agregar_picada.php"type="button" class="btn btn-primary">Agregar Picada</a> 
        </div>
      </div>
      <br>
    </div>
  </div> 
  <br>



<?php include('../fijos/footer.php');?>

            