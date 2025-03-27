<?php
include '../PHP/conexion.php';

// editarDatos.php
echo '<head>
        <link rel="stylesheet" href="estilos.css">
    </head>';

echo '<div>';

// Obtener los datos de la base de datos y almacenarlos en un array
$result = $conn->query("SELECT IDMaterial, Nombre_material, Tipo_residuo, Tipo_material, Capacidad, Reciclable FROM materiales");
$datos = [];
if ($result && $result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $datos[] = $row;
    }
}

// Generar los cuadros de texto y botones
echo '<input type="text" id="idMaterial" placeholder="ID Material" readonly><br>';
echo '<input type="text" id="nombreMaterial" placeholder="Nombre material"><br>';
echo '<input type="text" id="tipoResiduo" placeholder="Tipo residuos"><br>';
echo '<input type="text" id="tipoMaterial" placeholder="Tipo material"><br>';
echo '<input type="text" id="capacidad" placeholder="Capacidad"><br>';
echo '<input type="text" id="reciclable" placeholder="Reciclable"><br>';

echo '<button onclick="mostrarRegistroAnterior()">Anterior</button>';
echo '<button onclick="mostrarRegistroSiguiente()">Siguiente</button>';

echo '</div>';

// Enviar los datos al JavaScript
echo '<script>
        var datos = ' . json_encode($datos) . ';
        var indiceActual = 0;
    </script>';
?>