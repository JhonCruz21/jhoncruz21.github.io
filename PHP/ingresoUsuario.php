<?php 

session_start();


include 'conexionBE1.php';

$correo= $_POST['CorreoElectronico'];
$contraseña = $_POST['Contraseña'];

$Comprobar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE CorreoElectronico='$correo' and Contraseña='$contraseña' ");

if (mysqli_num_rows($Comprobar_login) > 0) {
    $_SESSION['usuario']=$correo;  
    header("location:./indexKoroto.php");
    exit;
} else {
    echo '
    <script> 
        alert("Por favor verifique la información ingresada e intente iniciar sesión nuevamente");
       window.history.back()
    </script>
    ';
    exit;    
}
?>