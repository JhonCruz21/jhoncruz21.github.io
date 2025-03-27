<?php

$conexion = mysqli_connect("localhost", "root", "", "m_ambiente");

//include 'conexion.php'; //llave


$nombres= $_POST['nombres'];
$apellidos= $_POST['apellidos'];
$tipoDocumento= $_POST['TipoDocumento'];
$numeroIdentificacion= $_POST['NumeroIdentificacion'];
$correoElectronico= $_POST['CorreoElectronico'];
$contraseña= $_POST['Contraseña'];

$consulta= "INSERT INTO usuario (`Nombres`, `Apellidos`, `TipoDocumento`, `NumeroIdentificacion`, `CorreoElectronico`, `Contraseña`) 
VALUES ('$nombres','$apellidos','$tipoDocumento','$numeroIdentificacion','$correoElectronico','$contraseña')";

//Comprobar si existe el numero de identificacion para evitar que se repita
$comprobar_identificacion = mysqli_query($conexion, "SELECT * FROM usuario WHERE TipoDocumento='$tipoDocumento' and NumeroIdentificacion='$numeroIdentificacion' ");
if (mysqli_num_rows($comprobar_identificacion) > 0) {    //si numero de identificacion llega a tener un correo ya existente (mayor a 0) entonces 
    echo '
    <script>
    alert("Este número de identificación ya existe, intentelo con otro nuevamente");
    window.history.back()
    </script>
    ';
    exit();
}
 
//Comprobar si existe correo para evitar que se repita
$comprobar_correo= mysqli_query($conexion, "SELECT * FROM usuario WHERE CorreoElectronico='$correoElectronico' ");
if (mysqli_num_rows($comprobar_correo) > 0) {    //si correo llega a tener un correo ya existente (mayor a 0) entonces 
    echo '
    <script>
    alert("Este correo ya existe, intentelo con otro nuevamente");
    window.history.back()
    </script>
    ';
    exit();
}



$ejecutar = mysqli_query($conexion, $consulta); //conecta la base de datos y la tabla


if ($ejecutar){
    echo ' 
    <script>
        alert("usuario registrado correctamente");
        window.history.back()
    </script>
        ';
    } else {
    echo ' 
    <script>
        alert("usuario no registrado, intentelo de nuevo");
        window.history.back()
    </script>
        ';

    }

    mysqli_close($conexion);
?>