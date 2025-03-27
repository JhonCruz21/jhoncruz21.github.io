<?php

function obtenerTMateriales($tipoResiduo1) {
    switch ($tipoResiduo1) {
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

$tipoResiduoSeleccionado1 = isset($_GET['tipo_residuo1']) ? $_GET['tipo_residuo1'] : '';
$tiposMateriales1 = obtenerTMateriales($tipoResiduoSeleccionado1);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koroto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../CSS/normalize.css">
    <link rel="stylesheet" href="../styles/styleKoroto.css">


</head>

<body>
   <header class="bg-header">
        <div class="bg-navbar">
            <div class="container">
                <div class="navbar">
                    <a href="" class="navbar-brand">
                        <img src="../img/Icono.png" alt=""><!--svg para guardar iconos-->
                        <a onclick="mostrar('seccion1')" href="#" class="Titulo">Koroto</a>

                    </a>                    
                </div>
            </div>
        </div>
   </header>

    <main class="container main" id="seccion1">
        <section id="tienda">
            <article class="card1">

                <div class="formulario1">
                <h2>Bienvenido al Sistema de Gestión Ambiental</h2>
                <p>Seleccione uno de los módulos para gestionar la información:</p>
                
                <div class="home-cards">
                    <div class="card8">
                        <div class="card8-icon"><i class="fas fa-recycle"></i></div> 
                        <h3>Registra </h3>
                        <p>Crea registros de los materiales reciclados</p>

                        <a onclick="mostrar('seccion2')" href="#" class="nav-link">Acceder</a>
                
                    </div>
                    
                    <div class="card8">
                        <div class="card8-icon"><i class="fas fa-database"></i></div> 
                        <h3>Consulta </h3>
                        <p>Consulta los datos ingresados al sistema para analizarlos</p>
                        <a onclick="mostrar('seccion3')" href="#" class="nav-link">Acceder</a>
                    </div>
                    
                    <div class="card8">
                        <div class="card8-icon"><i class="fas fa-edit"></i></div> 
                        <h3>Actualiza </h3>
                        <p>Modifican los datos registrados en el sistema</p>
                        <a onclick="mostrar('seccion4')" href="#" class="nav-link">Acceder</a>  
                    </div>
                    <div class="card8">
                        <div class="card8-icon"><i class="fas fa-edit"></i></div> 
                        <h3>Elimina </h3>
                        <p>Desaste de los datos que creas innecesarios o incorrectos.</p>
                        <a onclick="mostrar('seccion5')" href="#" class="nav-link">Acceder</a>  
                    </div>

            </article>

        </section>
    </main>


    <main class="container main" id="seccion2">

        <div class="formularioSeccion2">
            <h2>Registro de Materiales</h2>
            <form action="../PHP/registroMateriales.php" method="POST" class="formulario__registroMaterial">
                    <input type="text" placeholder="Nombre del Material" name="Nombre_material"" required>
                    <select name="Tipo_residuo" id="tipo_residuo" required onchange="actualizarTiposMaterial()">
                        <option value="">Seleccione un tipo de residuo</option>
                        <option value="RESIDUOS APROVECHABLES">RESIDUOS APROVECHABLES</option>
                        <option value="RESIDUOS NO APROVECHABLES">RESIDUOS NO APROVECHABLES</option>
                        <option value="RESIDUOS ORGANICOS APROVECHABLES">RESIDUOS ORGANICOS APROVECHABLES</option>
                    </select>
                    <select name="Tipo_material" id="tipo_material" required>
                        <option value="">Seleccione un tipo de material</option>
                    </select>
                    <input type="number" placeholder="Volumen (gramos)" name="Capacidad" required>
                    <select name="Reciclable" id="Reciclable" required>
                        <option value="">Seleccione un tipo de residuo</option>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                    </select>
                    <br>
                                    
                  <br>

                    <input type="submit" value="Guardar" id="btnGuardar">

            </form>                    
            <input class id="btnAtras"  onclick="mostrar('seccion1')" href="#" value="Atrás">
        </div>




    </main>


    <main class="container main" id="seccion3">

        <section class="tienda" >


            <article class="cardInfo21">
                <div class="cardInfo-body">
                     <h2>Registro de materiales o residuos recolectados</h2>
               

                    <section1 class="muestra1" id="contenido-consultaDatos">
                        <p>hola</p>
                    </section1>


                </div>
                
            </article>

        </section >
        <input class id="btnAtras1"  onclick="mostrar('seccion1')" href="#" value="Atrás">

    </main>


    <main class="container main" id="seccion4">

        <div class="formularioSeccion2">
            <h2>Editor de Materiales registrados</h2>
            <form action="../PHP/modificarDatos.php" method="POST" class="formulario__registroMaterial">
                    <input type="hidden" name="tabla" value="materiales">
                    <input type="number" placeholder="Id del material" name="IDMaterial" required> 
                    <input type="text" placeholder="Nombre del Material" name="Nombre_material"" required>
                    <select name="Tipo_residuo" id="tipo_residuo" required >
                        <option value="">Seleccione un tipo de residuo</option>
                        <option value="RESIDUOS APROVECHABLES">RESIDUOS APROVECHABLES</option>
                        <option value="RESIDUOS NO APROVECHABLES">RESIDUOS NO APROVECHABLES</option>
                        <option value="RESIDUOS ORGANICOS APROVECHABLES">RESIDUOS ORGANICOS APROVECHABLES</option>
                    </select>

                    <input type="number" placeholder="Volumen (gramos)" name="Capacidad" required>
                    <select name="Reciclable" id="Reciclable" required>
                        <option value="">Seleccione un tipo de residuo</option>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                    </select>
                    <br>
                                    
                  <br>

                    <input type="submit" value="Actualizar" id="btnGuardar">

            </form>                    
            <input class id="btnAtras"  onclick="mostrar('seccion1')" href="#" value="Atrás">
        </div>
</main>

<main class="container main" id="seccion5">

    
    <div class="formularioSeccion2">
        <h2>Elimina los datos de Materiales registrados incorrectamente</h2>
        <section1 class="muestra1" id="contenido-consultaDatos-seccion5">
        </section1>
    
        
                <form action="../PHP/eliminarDatos.php" method="POST" class="formulario__registroMaterial">
                <input type="hidden" name="tabla" value="materiales">
                <input type="number" placeholder="Id del material" name="IDMaterial" widht="20%" required> 

                <br>
                                
            <br>

                <input type="submit" value="Eliminar" id="btnGuardar">

    </form>                    
    <input  id="btnAtras"  onclick="mostrar('seccion1')" href="#" value="Atrás">
    </div>
</main>







    <footer class="bg-footer">
        <div class="container">
            <p>ARQUITECTURA DE SOFTWARE Y SQA - 202510-1A - 13 <br><br>
            Grupo de trabajo: Jhon Jairo Cruz Caballero, Juan Stiven Acosta, Marquisa Solano Acosta, Heimar Andrés Mosquera Cuesta</p>         </p>
        </div>
    </footer>

</body>



<script src="../Script/acciones.js"></script>
<script src="../Script/mostrarDatosKoroto.js"></script>
<script src="../Script/darOpciones.js"></script>
<script src="../Script/datosKoroto.js"></script>
<script src="../Script/entregaOpciones.js"></script>


<script>

function mostrar(idseccion) {
        var secciones = document.getElementsByTagName('main');
        for (var i = 0; i < secciones.length; i++) {
            secciones[i].style.display = 'none';
        }
        document.getElementById(idseccion).style.display = 'block';

        // Cargar contenido dinámico para cada sección
        if (idseccion === 'seccion3') {
            
            fetch('../PHP/consultaDatos.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-consultaDatos').innerHTML = data);
                //.then(data => document.getElementById('contenido-rutas').innerHTML = data);
                           
        }

        if (idseccion === 'seccion5') {
        fetch('../PHP/consultaDatos.php')
            .then(response => response.text())
            .then(data => document.getElementById('contenido-consultaDatos-seccion5').innerHTML = data);
        }

    }

    function muestra(idcontenido) {
        var contenidos = document.getElementsByTagName('section1');
        for (var i = 0; i < contenidos.length; i++) {
            contenidos[i].style.display = 'none';
        }
        document.getElementById(idcontenido).style.display = 'block';

    }


    function mostrando(idcontenido) {
        var contenidos = document.getElementsByTagName('section2');
        for (var i = 0; i < contenidos.length; i++) {
            contenidos[i].style.display = 'none';
        }
        document.getElementById(idcontenido).style.display = 'block';

    }


    
</script>



</html>