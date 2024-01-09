<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>


<?php

    $id = $_GET['id'];
    $usuario = 'Tincho'; 

    $conn_builit = mysqli_connect(
        '195.179.239.0',
        'u101685278_buildit',
        'Pachiman2020',
        'u101685278_buildit'
        );

    $query = "SELECT * FROM `ticket_macanudas`  WHERE `id` = '$id'";
    $result = mysqli_query($conn_builit, $query);    

    if (mysqli_num_rows($result) == 1) {
        
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $title = $row['title'];
        $descripcion = $row['descripcion'];
        $status = $row['status'];
        $solucion = $row['solucion'];
        $deadline = $row['dead_line']; 
        $area = $row['area']; 

        if($solucion == null){
            $solucion = 'Estamos revisando este ticket, en breve te respondemos';
        }
    }
?>
<br>
<br>
<div class="container-fluid">
    <div class="card col-sm-10 mx-auto">
        <div class="card-header">
            <h3 style="text-align:center;">Problema:<?php echo $title;?></h3>
        </div>
        <div class="card-body col-lg-10 mx-auto">
            Status:
            <p><?php echo $status; ?></p>
            Detalle:
            <p><?php echo $descripcion; ?></p>
            Respuesta:
            <p><?php echo $solucion; ?></p>
            <hr>
                <h5 style="text-align:center;" class="pb-2">Responder:</h5>
                <form action="ayuda_enviar.php" method="POST">
                    <textarea name="description"  placeholder="Respuesta para el tecnico" class="form-control"></textarea>
                        <input type="hidden" value="<?php echo $title; ?>" name="title">
                        <input type="hidden" value="<?php echo $deadline; ?>" name="deadline">
                        <input type="hidden" value="<?php echo $area; ?>" name="area">
                        <input type="hidden" value="<?php echo $deadline; ?>" name="deadline">
                    <br>
                    <div class="row">
                        <button type="submit" name="enviar_respuesta" class="btn btn-primary col-sm-2 mx-auto">Enviar</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<script src="//code.tidio.co/64clap1geeskjukzxzptkrvxi9xvooro.js" async></script>
<?php include('../fijos/footer.php');?>