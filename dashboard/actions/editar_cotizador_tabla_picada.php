<?php include('../db.php'); ?>
<?php 

$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    

    
    $query = "UPDATE `tablas` SET `titulo`= '$titulo', `precio`='$precio' WHERE id = $id";
    $result = mysqli_query($conn, $query);
   
    if(!$result) {
        

        echo "<script>
                alert('Ups, Tabla no Editada!!');
                location.href='../views/cotizador_tabla_picada.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Tabla ha cambiado correctamente');
                location.href='../views/cotizador_tabla_picada.php'; 
                </script>";   
    }
        
}
