<?php include('../db.php'); ?>


<?php 


if(isset($_POST['agregar'])) {


    // traemos todos los datos. 

    $location = $_POST['location'];
    $km_to_zero = $_POST['km_to_zero'];
    $px_km = $_POST['px_km'];


    $query = "INSERT INTO `delivery`(`location`, `km_to_zero`, `px_km`) VALUES ('$location','$km_to_zero','$px_km')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        

        echo "<script>
                alert('Ups, No se agrego el lugar!!');
                location.href='../views/tabla_localidades.php'; 
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agregó la nueva localidad correctamente');
                location.href='../views/tabla_localidades.php'; 
                </script>"; 

        
    }
}

