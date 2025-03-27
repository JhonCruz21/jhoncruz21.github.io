<?php

$conexion = mysqli_connect("localhost", "root", "", "m_ambiente");

//include 'conexion.php'; //llave


$nombreMaterial = $_POST['Nombre_material'];
$tipoMaterial = $_POST['Tipo_material'];
$tipoResiduo = $_POST['Tipo_residuo'];
$capacidad = $_POST['Capacidad']; 
$reciclable = $_POST['Reciclable'];


$consulta= "INSERT INTO materiales (`Nombre_material`, `Tipo_material`, `Tipo_residuo`, `Reciclable`, `Capacidad`) 
                            VALUES ('$nombreMaterial', '$tipoMaterial', '$tipoResiduo', '$reciclable', '$capacidad')";


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



