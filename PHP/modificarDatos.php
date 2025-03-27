<?php
$conexion = mysqli_connect("localhost", "root", "", "m_ambiente");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMaterial = $_POST['IDMaterial']; // Obtener el IDMaterial del formulario
    $nombreMaterial = $_POST['Nombre_material'];

    $tipoResiduo = $_POST['Tipo_residuo'];
    $capacidad = $_POST['Capacidad'];
    $reciclable = $_POST['Reciclable'];

    // Consulta UPDATE para actualizar el registro por IDMaterial
    $consulta = "UPDATE materiales SET 
                    Nombre_material = '$nombreMaterial', 
 
                    Tipo_residuo = '$tipoResiduo', 
                    Reciclable = '$reciclable', 
                    Capacidad = '$capacidad' 
                WHERE IDMaterial = $idMaterial";

    $ejecutar = mysqli_query($conexion, $consulta);

    if ($ejecutar) {
        echo '<script>alert("Datos actualizados correctamente"); window.history.back();</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos: ' . mysqli_error($conexion) . '"); window.history.back();</script>';
    }

    mysqli_close($conexion);
}
?>