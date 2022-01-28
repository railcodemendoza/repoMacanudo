
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<br>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
    <h5 style="text-align: center;" >Picada Realizada</h5>
    </div>
    <br>
    <form action="../actions/agregar_preparada.php" class="form-horizontal" method="POST">
      <div style="text-align:center;"class="panel-body">
        <div class="form-group">
          <label class="col-sm-5 control-label" required>Tabla:</label>
          <div class="col-sm-5 mx-auto">
            <select name="picada[]" id="selectSm" class="form-control form-control">
                <option value="">-.Elegir Picada.-</option>     
                    <?php
                        $query_picada= $conn -> query ("SELECT * FROM `preparada_picada`");
                                while ($picada= mysqli_fetch_array($query_picada)) {                                           
                                    echo '<option value="'.$picada['title'].'">'.$picada['title'].'</option>';
                                }  
                    ?>
            </select>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" required>Tipo:</label>
          <div class="col-sm-5 mx-auto">
            <select name="tipo[]" id="selectSm" class="form-control form-control">
                <option value="">-.Elegir Tipo.-</option>     
                    <?php
                        $query_tipo = $conn -> query ("SELECT * FROM `tipo`");
                                while ($tipo = mysqli_fetch_array($query_tipo)) {                                           
                                    echo '<option value="'.$tipo['title'].'">'.$tipo['title'].'</option>';
                                }  
                    ?>
            </select>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" required>Tamaño:</label>
          <div class="col-sm-5 mx-auto">
            <select required name="tamano[]" id="selectSm" class="form-control form-control">
                <option value="">-.Elegir Tamaño.-</option>     
                <option value="Pican 4">Pican 4</option>     
                <option value="Pican 5">Pican 5</option>     
                <option value="Pican 6">Pican 6</option>     
                <option value="Pican 8">Pican 8</option>     
                <option value="Pican 10">Pican 10</option>     
                <option value="Pican 12">Pican 12</option>    
            </select>        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Fecha preparación:</label>
          <div class="col-sm-3 mx-auto">
            <input name="fecha_preparacion" type="date" class="form-control" required>
          </div>
        </div>
      </div>
      <br>
      <div class="col-sm-4 mx-auto"  style="text-align: center;">
        <button type="submit" name="agregar" id="agregar"style="padding-left: 20%;padding-right: 20%;" class="btn btn-primary">Agregar</button>
      </div>
      <br>
    </form>
  </div>
</div>
<?php include('../fijos/footer.php');?>

            