<?php 
include("db.php");

$username = '';
$email = '' ;
$error = '';

    if(isset($_POST['register'])){

        $check = $_POST['check'];
        if($check == 'on'){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $pass =md5($_POST['pass']);
            $name = $_POST['name'];
            $last_name = $_POST['last_name'];
            $celular = $_POST['celular'];
            $empresa = $_POST['empresa'];
            
            $query_user = "SELECT * FROM users WHERE username='$username' ";
            $result_user = mysqli_query($conn, $query_user);  

            if(mysqli_num_rows($result_user) == 0){
                
            $query_bd = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";
            $result_bd = mysqli_query($conn, $query_bd);  

            if(mysqli_num_rows($result_bd) == 0){

                $query = "INSERT INTO users(username, email, pass, name, last_name, empresa, celular) VALUE ('$username', '$email','$pass', '$name','$last_name','$empresa','$celular') ";
                $result = mysqli_query($conn, $query);


                if($result) {
                    $_SESSION['message'] = 'El registro se realizó con éxito. Debe esperar aprobacion del administrador';
                    $_SESSION['message_type'] = 'info';
                    header('location:index.php'); 
                }
            }
        }else{

            $_SESSION['message'] = 'Usuario ya existente!';
            $_SESSION['message_type'] = 'warning';
            header('location:register.php');
        }
}else{

    $_SESSION['message'] = 'Debe acepatar terminos y condiciones.';
    $_SESSION['message_type'] = 'warning';
    header('location:register.php');

}
    }
?>

    
    



