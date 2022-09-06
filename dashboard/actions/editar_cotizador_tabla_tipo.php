<?php include('../db.php'); ?>
<?php 

$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $valor_por_persona = $_POST['valor_por_persona'];
    

    
    $query = "UPDATE `tipo_picada` SET `titulo`= '$titulo', `precio`='$precio', `valor_por_persona`='$valor_por_persona' WHERE id = $id";
    $result = mysqli_query($conn, $query);
   
    if(!$result) {
        

        echo "<script>
                alert('Ups, Tipo de Tabla no Editado!!');
                location.href='../views/cotizador_tabla_tipo.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Tipo de Tabla ha cambiado correctamente');
                location.href='../views/cotizador_tabla_tipo.php'; 
                </script>";   
    }
        
}
