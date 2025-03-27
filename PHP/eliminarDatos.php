<?php
$conexion = mysqli_connect("localhost", "root", "", "m_ambiente");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMaterial = $_POST['IDMaterial']; // Obtener el IDMaterial del formulario

    // Consulta DELETE para eliminar el registro por IDMaterial
    $consulta = "DELETE FROM materiales WHERE IDMaterial = $idMaterial";

    $ejecutar = mysqli_query($conexion, $consulta);

    if ($ejecutar) {
        echo '<script>alert("Registro eliminado correctamente"); window.history.back();</script>';
    } else {
        echo '<script>alert("Error al eliminar el registro: ' . mysqli_error($conexion) . '"); window.history.back();</script>';
    }

    mysqli_close($conexion);
}
?>