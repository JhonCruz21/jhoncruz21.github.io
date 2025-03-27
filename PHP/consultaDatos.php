<?php
include '../PHP/conexion.php';

// consultaDatos.php
echo '<head>
        <link rel="stylesheet" href="estilos.css">
    </head>

<div>

            <table border="1" class="tabla-estilos">
            <tr>
                <th>ID Material</th>
                <th>Nombre material</th>
                <th>Tipo material</th>
                <th>Tipo residuos</th>
                <th>Capacidad</th>
                <th>Reciclable</th>
            </tr>';

$result = $conn->query("SELECT IDMaterial, Nombre_material, Tipo_residuo, Tipo_material, Capacidad, Reciclable FROM materiales");
if ($result && $result->rowCount() > 0) {  
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['IDMaterial']}</td>
                <td>{$row['Nombre_material']}</td>
                <td>{$row['Tipo_residuo']}</td>
                <td>{$row['Tipo_material']}</td>
                <td>{$row['Capacidad']}</td>
                <td>{$row['Reciclable']}</td>                
                </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
}
echo '</table></div>';