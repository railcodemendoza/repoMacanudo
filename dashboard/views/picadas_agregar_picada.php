
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<br>
<div class="container-fluid">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="navbar-item">
        <a class="nav-link active" id="compara-tab" data-toggle="tab" href="#compara" arial-controls="compara"arial-selected="true">Con Retiro</a>
    </li>
    <li class="navbar-item">
        <a class="nav-link" id="tarjetas-tab" data-toggle="tab" href="#tarjetas" arial-controls="tarjetas"arial-selected="true">Con envio</a>
    </li>
  </ul>
        <!--definición de contendores-->
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="compara" role="tabpanel" aria-labelledby="compara-tab">
            <div class="card">
            <br>
            <div style="text-align:center;"class="panel-body">
              <form action="../actions/agregar_pedido.php" class="form-horizontal " method="POST">
                <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                      <div style="margin-top:2%;" class="form-group">
                          <label class="col-sm-6 control-label" >Nombre y Apellido</label>
                          <div class="col-sm-10 mx-auto">
                              <input type="text" name="customer" placeholder="Jorge Martinez" class="form-control" required> 
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-5">
                    <div style="margin-top:2%;" class="form-group">
                          <label  class="col-sm-6 control-label">Celular</label>
                          <div class="col-sm-10 mx-auto">
                              <input type="phone" name="cel_phone" placeholder="2612128195" class="form-control" required>
                          </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Dedicatoria</label>
                  <div class="col-sm-5 mx-auto">
                    <textarea name="inscription" placeholder="Contenido de la dedicatoria" class="form-control"></textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"><h3 style="text-align: center; ">Datos de retiro:</h3></div>
                  <div class="col-sm-4"></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label  class="col-sm-5 control-label">Fecha de Entrega:</label>
                      <div class="col-sm-10 mx-auto">
                        <input name="delivery_date" type="date" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label  class="col-sm-5 control-label">Horario de Entrega:</label>
                      <div class="col-sm-10 mx-auto">
                        <select name="schedule_available[]" id="selectSm" class="form-control form-control" required>
                          <option value="">-.elegir horaio.-</option>     
                              <?php
                                  $query_schedule_available = $conn -> query ("SELECT * FROM `delivery_hour` WHERE delivery = 'con_retiro'");
                                          while ($schedule_available= mysqli_fetch_array($query_schedule_available)) {                                           
                                              echo '<option value="'.$schedule_available['hour_delivery'].'">'.$schedule_available['hour_delivery'].'</option>';
                                          }  
                              ?>
                        </select>  
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"><h3 style="text-align: center;" >Armado de Pedido</h3></div>
                  <div class="col-sm-4"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label" required>Tabla:</label>
                  <div class="col-sm-5 mx-auto">
                    <select name="product[]" id="selectSm" class="form-control form-control">
                        <option value="">-.Elegir Picada.-</option>     
                            <?php
                                $query_product = $conn -> query ("SELECT * FROM `picadas`");
                                        while ($product= mysqli_fetch_array($query_product)) {                                           
                                            echo '<option value="'.$product['title'].'">'.$product['title'].'</option>';
                                        }  
                            ?>
                    </select>  
                  </div>
                </div>
                <div class="form-group">
                  <label style="text-align:center;" class="col-sm-3 control-label">Aclaraciones:</label>
                  <div class="col-sm-5 mx-auto">
                    <input type="text" class="form-control"  name="add1" placeholder="Ej. para Celíacos / no me gustan la Aceitunas">
                  </div>
                </div>     
                <div class="form-group">
                  <label class="col-sm-3 control-label">Agregados:</label>
                  <div class="col-sm-5 mx-auto">
                      <select name="add2[]" id="selectSm" class="form-control form-control">
                          <option value="">-.Agregar a la Picada.-</option>     
                              <?php
                                  $query_add2 = $conn -> query ("SELECT * FROM `add2` where q != '0'");
                                          while ($add2= mysqli_fetch_array($query_add2)) {                                           
                                              echo '<option value="'.$add2['title'].'">'.$add2['title'].'</option>';
                                          }  
                              ?>
                      </select>  
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label" required>Forma de Pago</label>
                  <div class="col-sm-5 mx-auto">
                      <select name="payment_mode[]" id="selectSm" class="form-control form-control">
                          <option value="">-.Elige medio de Pago.-</option>     
                              <?php
                                  $query_payment = $conn -> query ("SELECT * FROM `payment_method`");
                                          while ($payment= mysqli_fetch_array($query_payment)) {                                           
                                              echo '<option value="'.$payment['modo_de_pago'].'">'.$payment['modo_de_pago'].'</option>';
                                          }  
                              ?>
                      </select>  
                  </div>
                </div>
                <br>
                <div class="col-sm-4 mx-auto"  style="text-align: center;">
                  <button type="submit" name="agregar_retiro" id="agregar_retiro"style="padding-left: 20%;padding-right: 20%;" class="btn btn-primary">Agregar</button>
                </div>
                <br>
              </form>
            </div>
          </div>
          </div>
          <div class="tab-pane fade show" id="tarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
            <div class="card">
            <div class="card">
            <br>
            <div style="text-align:center;"class="panel-body">
              <form action="../actions/agregar_pedido.php" class="form-horizontal " method="POST">
                <div class="row"> 
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                    <div style="margin-top:2%;" class="form-group">
                      <label class="col-sm-7 control-label" >Nombre y Apellido que encarga</label>
                      <div class="col-sm-10 mx-auto">
                        <input type="text" name="customer" placeholder="Alberto Acosta" class="form-control" required> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-6 control-label">Celular de quién encarga</label>
                      <div class="col-sm-10 mx-auto">
                        <input type="phone" name="cel_phone" placeholder="2612128195" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div style="margin-top:2%;" class="form-group">
                      <label ntrol-label">Nombre y Apellido Recibe</label>
                      <div class="col-sm-10 mx-auto">
                        <input type="text" name="cnee" placeholder="Bernardo Romero"class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-6 control-label">Celular de quién recibe</label>
                      <div class="col-sm-10 mx-auto">
                        <input type="phone" name="cnee_cel_phone" placeholder="2613569823" class="form-control" required>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Dedicatoria</label>
                  <div class="col-sm-5 mx-auto">
                    <textarea name="inscription" placeholder="con cariño Cacho.." class="form-control"></textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"><h3 style="text-align: center;">Datos de entrega:</h3></div>
                  <div class="col-sm-4"></div>
                </div>
                <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label  class="col-sm-5 control-label">Fecha de Entrega:</label>
                      <div class="col-sm-10 mx-auto">
                        <input name="delivery_date" type="date" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Horario de Entrega:</label>
                      <div class="col-sm-10 mx-auto">
                        <select name="schedule_available[]" id="selectSm" class="form-control form-control" required>
                            <option value="">-.elegir horaio.-</option>     
                                <?php
                                    $query_schedule_available = $conn -> query ("SELECT * FROM `delivery_hour` WHERE delivery = 'con_envio'");
                                            while ($schedule_available= mysqli_fetch_array($query_schedule_available)) {                                           
                                                echo '<option value="'.$schedule_available['hour_delivery'].'">'.$schedule_available['hour_delivery'].'</option>';
                                            }  
                                ?>
                        </select>  
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label  class="col-sm-3 control-label">Dirección</label>
                      <div class="col-sm-10 mx-auto">
                        <input type="text" name="address" placeholder="Cañadita Alegre, 554 Piso 5 Depto. 1" class="form-control" required>
                        
                      </div>
                    </div>                         
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label  class="col-sm-3 control-label">Localidad:</label>
                      <div class="col-sm-10 mx-auto">
                        <select name="location[]" id="selectSm" class="form-control form-control" required>
                            <option value="">-. Elegir localidad.-</option>     
                                <?php
                                    $query_location = $conn -> query ("SELECT * FROM `delivery`");
                                            while ($location = mysqli_fetch_array($query_location)) {                                           
                                                echo '<option value="'.$location['location'].'">'.$location['location']. '</option>';
                                            }  
                                ?>
                        </select>  
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label">Aclaración respecto al Domicilio:</label>
                  <div class="col-sm-5 mx-auto">
                    <input type="text" name="referencia" class="form-control">
                   
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"><h3 style="text-align: center; ">Armado de Pedido</h3></div>
                  <div class="col-sm-4"></div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-5 control-label" required>Tabla:</label>
                  <div class="col-sm-5 mx-auto">
                    <select name="product[]" id="selectSm" class="form-control form-control">
                        <option value="">-.Elegir Picada.-</option>     
                            <?php
                                $query_product = $conn -> query ("SELECT * FROM `picadas`");
                                        while ($product= mysqli_fetch_array($query_product)) {                                           
                                            echo '<option value="'.$product['title'].'">'.$product['title'].'</option>';
                                        }  
                            ?>
                    </select>  
                  </div>
                </div>
                <div class="form-group">
                  <label style="text-align:center;" class="col-sm-3 control-label">Aclaraciones:</label>
                  <div class="col-sm-5 mx-auto">
                    <input type="text" name="add1" class="form-control" placeholder="ej. para Celíacos / no me gustan la Aceitunas">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Agregados:</label>
                  <div class="col-sm-5 mx-auto">
                      <select name="add2[]" id="selectSm" class="form-control form-control">
                          <option value="">-.Agregar a la Picada.-</option>     
                              <?php
                                  $query_add2 = $conn -> query ("SELECT * FROM `add2` where q != '0'");
                                          while ($add2= mysqli_fetch_array($query_add2)) {                                           
                                              echo '<option value="'.$add2['title'].'">'.$add2['title'].'</option>';
                                          }  
                              ?>
                      </select>  
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label" required>Forma de Pago</label>
                  <div class="col-sm-5 mx-auto">
                      <select name="payment_mode[]" id="selectSm" class="form-control form-control">
                          <option value="">-.Elige medio de Pago.-</option>     
                              <?php
                                

                                  $query_payment = $conn -> query ("SELECT * FROM `payment_method`");
                                          while ($payment= mysqli_fetch_array($query_payment)) {                                           
                                              echo '<option value="'.$payment['modo_de_pago'].'">'.$payment['modo_de_pago'].'</option>';
                                          }  
                              ?>
                      </select>  
                  </div>
                </div>
                <br>
                <div class="col-sm-4 mx-auto"  style="text-align: center;">
                  <button type="submit" name="agregar_envios" id="agregar_envios"style="padding-left: 20%;padding-right: 20%;" class="btn btn-primary">Agregar</button>
                </div>
              </form>
            </div>
          </div> 
        </div>
      
    
</div>
<br>
    

<br>


<?php include('../fijos/footer.php');?>

            