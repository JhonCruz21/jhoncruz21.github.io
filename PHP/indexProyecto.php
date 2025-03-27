<?php
// Habilitar visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'm_ambiente';

// Conectar sin especificar base de datos primero
$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Conexión fallida al servidor: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Error al crear la base de datos: " . $conn->error);
}

// Seleccionar la base de datos
$conn->select_db($dbname);

// Crear las tablas si no existen
$tablas = [
    "materiales" => "CREATE TABLE IF NOT EXISTS materiales (
        IDMaterial VARCHAR(50) PRIMARY KEY,
        Nombre_material VARCHAR(100) NOT NULL,
        Tipo_material VARCHAR(100) NOT NULL,
        Tipo_residuo VARCHAR(100) NOT NULL,
        Reciclable VARCHAR(5) NOT NULL
    )",
    
    "puntos_reciclaje" => "CREATE TABLE IF NOT EXISTS puntos_reciclaje (
        IDPunto VARCHAR(50) PRIMARY KEY,
        Nombre_punto VARCHAR(100) NOT NULL,
        Direccion VARCHAR(200) NOT NULL,
        Telefono VARCHAR(20) NOT NULL,
        Tipo_materiales_aceptados VARCHAR(200) NOT NULL,
        Horario_atencion VARCHAR(100) NOT NULL
    )",
    
    "contenedores" => "CREATE TABLE IF NOT EXISTS contenedores (
        IDContenedor VARCHAR(50) PRIMARY KEY,
        Color VARCHAR(50) NOT NULL,
        Tipo_material VARCHAR(100) NOT NULL,
        Capacidad_Kg DECIMAL(10,2) NOT NULL,
        Descripcion TEXT NOT NULL,
        IDMaterial VARCHAR(50),
        IDPunto VARCHAR(50),
        FOREIGN KEY (IDMaterial) REFERENCES materiales(IDMaterial),
        FOREIGN KEY (IDPunto) REFERENCES puntos_reciclaje(IDPunto)
    )"
];

foreach ($tablas as $nombre => $query) {
    if ($conn->query($query) === FALSE) {
        echo "Error al crear la tabla $nombre: " . $conn->error . "<br>";
    }
}

function obtenerOpciones($tabla, $idCampo, $nombreCampo) {
    global $conn;
    $opciones = "";
    $result = $conn->query("SELECT $idCampo, $nombreCampo FROM $tabla");
    if (!$result) {
        return "<option value=''>Error: " . $conn->error . "</option>";
    }
    while ($row = $result->fetch_assoc()) {
        $opciones .= "<option value='" . $row[$idCampo] . "'>" . $row[$nombreCampo] . "</option>";
    }
    return $opciones ?: "<option value=''>No hay datos disponibles</option>";
}

$mensaje_material = "";
$mensaje_contenedor = "";
$mensaje_punto = "";

// Valor predeterminado para la página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
$subpagina = isset($_GET['subpagina']) ? $_GET['subpagina'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    $tabla = $_POST['tabla'];

    switch ($tabla) {
        case 'materiales':
            $idMaterial = $_POST['IDMaterial'];
            $nombreMaterial = $_POST['Nombre_material'];
            $tipoMaterial = $_POST['Tipo_material'];
            $tipoResiduo = $_POST['Tipo_residuo'];
            $reciclable = $_POST['Reciclable'];

            // tabla materiales materiales
            if ($accion == 'crear') {
                $sql = "INSERT INTO materiales (IDMaterial, Nombre_material, Tipo_material, Tipo_residuo, Reciclable) VALUES ('$idMaterial', '$nombreMaterial', '$tipoMaterial', '$tipoResiduo', '$reciclable')";
                $mensaje_material = $conn->query($sql) ? "Registro creado exitosamente" : "Error al crear registro: " . $conn->error;
            } elseif ($accion == 'modificar') {
                $sql = "UPDATE materiales SET Nombre_material='$nombreMaterial', Tipo_material='$tipoMaterial', Tipo_residuo='$tipoResiduo', Reciclable='$reciclable' WHERE IDMaterial='$idMaterial'";
                $mensaje_material = $conn->query($sql) ? "Registro modificado exitosamente" : "Error al modificar registro: " . $conn->error;
            } elseif ($accion == 'buscar') {
                $sql = "SELECT * FROM materiales WHERE IDMaterial='$idMaterial'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $mensaje_material = "ID: {$row['IDMaterial']}, Nombre: {$row['Nombre_material']}, Tipo: {$row['Tipo_material']}, Tipo Residuo: {$row['Tipo_residuo']}, Reciclable: {$row['Reciclable']}";
                } else {
                    $mensaje_material = "No se encontraron registros";
                }
            } elseif ($accion == 'eliminar') {
                $sql = "DELETE FROM materiales WHERE IDMaterial='$idMaterial'";
                $mensaje_material = $conn->query($sql) ? "Registro eliminado exitosamente" : "Error al eliminar registro: " . $conn->error;
            }
            $pagina = 'materiales'; // Mantener en la página de materiales después de la acción
            break;

        case 'contenedores':
            $idContenedor = $_POST['IDContenedor'];
            $color = $_POST['Color'];
            $tipoMaterialContenedor = $_POST['Tipo_material_contenedor'];
            $capacidad = $_POST['Capacidad_Kg'];
            $descripcion = $_POST['Descripcion'];
            $idMaterialContenedor = $_POST['IDMaterial'];
            $idPunto = $_POST['IDPunto'];

            /// tabla  contenedores
            if ($accion == 'crear') {
                $sql = "INSERT INTO contenedores (IDContenedor, Color, Tipo_material, Capacidad_Kg, Descripcion, IDMaterial, IDPunto) VALUES ('$idContenedor', '$color', '$tipoMaterialContenedor', '$capacidad', '$descripcion', '$idMaterialContenedor', '$idPunto')";
                $mensaje_contenedor = $conn->query($sql) ? "Registro creado exitosamente" : "Error al crear registro: " . $conn->error;
            } elseif ($accion == 'modificar') {
                $sql = "UPDATE contenedores SET Color='$color', Tipo_material='$tipoMaterialContenedor', Capacidad_Kg='$capacidad', Descripcion='$descripcion', IDMaterial='$idMaterialContenedor', IDPunto='$idPunto' WHERE IDContenedor='$idContenedor'";
                $mensaje_contenedor = $conn->query($sql) ? "Registro modificado exitosamente" : "Error al modificar registro: " . $conn->error;
            } elseif ($accion == 'buscar') {
                $sql = "SELECT * FROM contenedores WHERE IDContenedor='$idContenedor'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $mensaje_contenedor = "ID: {$row['IDContenedor']}, Color: {$row['Color']}, Tipo: {$row['Tipo_material']}, Capacidad: {$row['Capacidad_Kg']}, Descripción: {$row['Descripcion']}";
                } else {
                    $mensaje_contenedor = "No se encontraron registros";
                }
            } elseif ($accion == 'eliminar') {
                $sql = "DELETE FROM contenedores WHERE IDContenedor='$idContenedor'";
                $mensaje_contenedor = $conn->query($sql) ? "Registro eliminado exitosamente" : "Error al eliminar registro: " . $conn->error;
            }
            $pagina = 'contenedores'; // Mantener en la página de contenedores después de la acción
            break;

        case 'puntos_reciclaje':
            $idPunto = $_POST['IDPunto'];
            $nombrePunto = $_POST['Nombre_punto'];
            $direccion = $_POST['Direccion'];
            $telefono = $_POST['Telefono'];
            $tipoMaterialesAceptados = $_POST['Tipo_materiales_aceptados'];
            $horarioAtencion = $_POST['Horario_atencion'];

            // tabla puntos_reciclaje
            if ($accion == 'crear') {
                $sql = "INSERT INTO puntos_reciclaje (IDPunto, Nombre_punto, Direccion, Telefono, Tipo_materiales_aceptados, Horario_atencion) VALUES ('$idPunto', '$nombrePunto', '$direccion', '$telefono', '$tipoMaterialesAceptados', '$horarioAtencion')";
                $mensaje_punto = $conn->query($sql) ? "Registro creado exitosamente" : "Error al crear registro: " . $conn->error;
            } elseif ($accion == 'modificar') {
                $sql = "UPDATE puntos_reciclaje SET Nombre_punto='$nombrePunto', Direccion='$direccion', Telefono='$telefono', Tipo_materiales_aceptados='$tipoMaterialesAceptados', Horario_atencion='$horarioAtencion' WHERE IDPunto='$idPunto'";
                $mensaje_punto = $conn->query($sql) ? "Registro modificado exitosamente" : "Error al modificar registro: " . $conn->error;
            } elseif ($accion == 'buscar') {
                $sql = "SELECT * FROM puntos_reciclaje WHERE IDPunto='$idPunto'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $mensaje_punto = "ID: {$row['IDPunto']}, Nombre: {$row['Nombre_punto']}, Dirección: {$row['Direccion']}, Teléfono: {$row['Telefono']}, Materiales Aceptados: {$row['Tipo_materiales_aceptados']}, Horario: {$row['Horario_atencion']}";
                } else {
                    $mensaje_punto = "No se encontraron registros";
                }
            } elseif ($accion == 'eliminar') {
                $sql = "DELETE FROM puntos_reciclaje WHERE IDPunto='$idPunto'";
                $mensaje_punto = $conn->query($sql) ? "Registro eliminado exitosamente" : "Error al eliminar registro: " . $conn->error;
            }
            $pagina = 'puntos_reciclaje'; // Mantener en la página de puntos_reciclaje después de la acción
            break;
    }
}

// Función para obtener los tipos de materiales según el tipo de residuo
function obtenerTiposMateriales($tipoResiduo) {
    switch ($tipoResiduo) {
        case 'RESIDUOS APROVECHABLES':
            return ["Plástico", "Cartón", "Vidrio", "Papel", "Metal"];
        case 'RESIDUOS NO APROVECHABLES':
            return ["Papel higiénico", "Servilletas usadas", "Papeles y cartones contaminados con comida", "Papeles metalizados", "Pañales desechables"];
        case 'RESIDUOS ORGANICOS APROVECHABLES':
            return ["Restos de fruta y verduras", "Cáscaras de huevo", "Posos de café", "Restos de jardinería (hojas, ramas pequeñas)"];
        default:
            return [];
    }
}

// Obtener el tipo de residuo seleccionado
$tipoResiduoSeleccionado = isset($_GET['tipo_residuo']) ? $_GET['tipo_residuo'] : '';
$tiposMateriales = obtenerTiposMateriales($tipoResiduoSeleccionado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Ambiental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        header {
            background-color: #2E8B57;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }
        
        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 1200px;
        }
        
        nav {
            background-color: #4CAF50;
            margin-bottom: 20px;
        }
        
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        nav li {
            float: left;
        }
        
        nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        nav li a:hover {
            background-color: #45a049;
        }
        
        .menu-activo {
            background-color: #45a049;
            font-weight: bold;
        }
        
        .formulario {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .formulario h2 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        
        .formulario label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        
        .formulario input[type="text"],
        .formulario input[type="email"],
        .formulario select,
        .formulario textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .formulario input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        
        .formulario input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .mensaje {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #e8f5e9;
            border-left: 5px solid #4CAF50;
            border-radius: 3px;
        }
        
        .home-cards {
            display: flex;
            flex-direction: row; /* Asegura que las tarjetas estén en línea horizontal */
            justify-content: space-between; /* Distribuye el espacio entre las tarjetas */
            align-items: center; /* Alinea las tarjetas verticalmente */
            margin-bottom: 20px;
        }
        
        .card {
            flex: 1; /* Cada tarjeta ocupa el mismo espacio */
            margin: 0 10px; /* Margen horizontal entre tarjetas */
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:first-child {
            margin-left: 0;
        }
        
        .card:last-child {
            margin-right: 0;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .card h3 {
            color: #4CAF50;
        }
        
        .card-icon {
            font-size: 48px;
            margin-bottom: 15px;
            color: #4CAF50;
        }
        
        .card a {
            display: inline-block;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        
        .card a:hover {
            background-color: #45a049;
        }
        
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
        
        .submenu {
            background-color: #e8f5e9;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        .submenu a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        
        .submenu a:hover {
            background-color: #45a049;
        }
        
        @media screen and (max-width: 768px) {
            .home-cards {
                flex-direction: column; /* Cambia a vertical en pantallas pequeñas */
            }
            
            .card {
                margin: 10px 0; /* Ajusta los márgenes para disposición vertical */
                width: 100%;
            }
            
            nav li {
                float: none;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Sistema de Gestión Ambiental</h1>
        </div>
    </header>
    
    <div class="container">
    
        <?php if (!empty($mensaje_material)): ?>
            <div class="mensaje"><?php echo $mensaje_material; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($mensaje_contenedor)): ?>
            <div class="mensaje"><?php echo $mensaje_contenedor; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($mensaje_punto)): ?>
            <div class="mensaje"><?php echo $mensaje_punto; ?></div>
        <?php endif; ?>
        
        <?php if ($pagina == 'home'): ?>
            <!-- Página de inicio -->
            <div class="formulario">
                <h2>Bienvenido al Sistema de Gestión Ambiental</h2>
                <p>Seleccione uno de los módulos para gestionar la información:</p>
                
                <div class="home-cards">
                    <div class="card">
                        <div class="card-icon">♻️</div>
                        <h3>Materiales</h3>
                        <p>Gestione los tipos de materiales reciclables</p>
                        <a href="?pagina=materiales">Acceder</a>
                    </div>
                    
                    <div class="card">
                        <div class="card-icon">🗑️</div>
                        <h3>Contenedores</h3>
                        <p>Administre los contenedores de reciclaje</p>
                        <a href="?pagina=contenedores">Acceder</a>
                    </div>
                    
                    <div class="card">
                        <div class="card-icon">📍</div>
                        <h3>Puntos de Reciclaje</h3>
                        <p>Gestione los puntos de recolección</p>
                        <a href="?pagina=puntos_reciclaje">Acceder</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ($pagina == 'materiales'): ?>
            <!-- Submenu para Tipos de Residuos -->
            
            
            <!-- formulario para Materiales -->
            <div class="formulario">
    <h2>Gestión de Materiales</h2>
    <form method="POST">
        <input type="hidden" name="tabla" value="materiales">
        <label>ID Material:</label>
        <input type="text" name="IDMaterial" required>
        
        <label>Nombre del Material:</label>
        <input type="text" name="Nombre_material" required>
        
        <label>Tipo de Residuo:</label>
        <select name="Tipo_residuo" id="tipo_residuo">
            <option value="">Seleccione un tipo de residuo</option>
            <option value="RESIDUOS APROVECHABLES">RESIDUOS APROVECHABLES</option>
            <option value="RESIDUOS NO APROVECHABLES">RESIDUOS NO APROVECHABLES</option>
            <option value="RESIDUOS ORGANICOS APROVECHABLES">RESIDUOS ORGANICOS APROVECHABLES</option>
        </select>
        
        <label>Tipo de Material:</label>
        <select name="Tipo_material" id="tipo_material">
            <option value="">Seleccione un tipo de material</option>
            <!-- Las opciones se llenarán dinámicamente -->
        </select>
        
        <label>Reciclable:</label>
        <select name="Reciclable">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
        
        <input type="submit" name="accion" value="crear">
        <input type="submit" name="accion" value="modificar">
        <input type="submit" name="accion" value="buscar">
        <input type="submit" name="accion" value="eliminar">
    </form>
</div>
        <?php endif; ?>

        <?php if ($pagina == 'contenedores'): ?>
            <!-- formulario de contenedores -->
            <div class="formulario">
                <h2>Gestión de Contenedores</h2>
                <form method="POST">
                    <input type="hidden" name="tabla" value="contenedores">
                    <label>ID Contenedor:</label>
                    <input type="text" name="IDContenedor" required>
                    
                    <label>Color:</label>
                    <input type="text" name="Color" required>
                    
                    <label>Tipo de Material:</label>
                    <input type="text" name="Tipo_material_contenedor" required>
                    
                    <label>Capacidad (Kg):</label>
                    <input type="text" name="Capacidad_Kg" required>
                    
                    <label>Descripción:</label>
                    <input type="text" name="Descripcion" required>
                    
                    <label>ID Material Asociado:</label>
                    <select name="IDMaterial">
                        <!-- codigo php -->
                        <?php echo obtenerOpciones('materiales', 'IDMaterial', 'Nombre_material'); ?>
                    </select>
                    
                    <label>ID Punto de Reciclaje Asociado:</label>
                    <select name="IDPunto">
                        <!-- Ocodigo php -->
                        <?php echo obtenerOpciones('puntos_reciclaje', 'IDPunto', 'Nombre_punto'); ?>
                    </select>
                    
                    <input type="submit" name="accion" value="Crear">
                    <input type="submit" name="accion" value="Modificar">
                    <input type="submit" name="accion" value="Buscar">
                    <input type="submit" name="accion" value="Eliminar">
                </form>
            </div>
        <?php endif; ?>

        <?php if ($pagina == 'puntos_reciclaje'): ?>
            <!-- formulario para Puntos de Reciclaje -->
            <div class="formulario">
                <h2>Gestión de Puntos de Reciclaje</h2>
                <form method="POST">
                    <input type="hidden" name="tabla" value="puntos_reciclaje">
                    <label>ID Punto:</label>
                    <input type="text" name="IDPunto" required>
                    
                    <label>Nombre del Punto:</label>
                    <input type="text" name="Nombre_punto" required>
                    
                    <label>Dirección:</label>
                    <input type="text" name="Direccion" required>
                    
                    <label>Teléfono:</label>
                    <input type="text" name="Telefono" required>
                    
                    <label>Tipos de Materiales Aceptados:</label>
                    <input type="text" name="Tipo_materiales_aceptados" required>
                    
                    <label>Horario de Atención:</label>
                    <input type="text" name="Horario_atencion" required>
                    
                    
                    <input type="submit" name="accion" value="Modificar">
                    
                    <input type="submit" name="accion" value="Eliminar">
                </form>
            </div>
        <?php endif; ?>
    </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Sistema de Gestión Ambiental. Todos los derechos reservados.</p>
        </div>
    </footer>
    
    <script>
    
    document.addEventListener('DOMContentLoaded', function() {
    const tipoResiduoSelect = document.getElementById('tipo_residuo');
    const tipoMaterialSelect = document.getElementById('tipo_material');

    // Función para obtener los tipos de materiales según el tipo de residuo
    function obtenerTiposMateriales(tipoResiduo) {
        switch (tipoResiduo) {
            case 'RESIDUOS APROVECHABLES':
                return ["Plástico", "Cartón", "Vidrio", "Papel", "Metal"];
            case 'RESIDUOS NO APROVECHABLES':
                return ["Papel higiénico", "Servilletas usadas", "Papeles y cartones contaminados con comida", "Papeles metalizados", "Pañales desechables"];
            case 'RESIDUOS ORGANICOS APROVECHABLES':
                return ["Restos de fruta y verduras", "Cáscaras de huevo", "Posos de café", "Restos de jardinería (hojas, ramas pequeñas)"];
            default:
                return [];
        }
    }

    // Evento para manejar el cambio en el tipo de residuo
    tipoResiduoSelect.addEventListener('change', function() {
        const tipoResiduo = this.value;
        const tiposMateriales = obtenerTiposMateriales(tipoResiduo);
        
        // Limpiar las opciones actuales
        tipoMaterialSelect.innerHTML = "<option value=''>Seleccione un tipo de material</option>";
        
        // Agregar nuevas opciones
        tiposMateriales.forEach(tipo => {
            const option = document.createElement('option');
            option.value = tipo;
            option.textContent = tipo;
            tipoMaterialSelect.appendChild(option);
        });
    });
});
</script>