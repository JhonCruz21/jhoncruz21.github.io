<?php

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

$tipoResiduoSeleccionado = isset($_GET['tipo_residuo']) ? $_GET['tipo_residuo'] : '';
$tiposMateriales = obtenerTiposMateriales($tipoResiduoSeleccionado);

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
                        <img src="img/Icono.png" alt=""><!--svg para guardar iconos-->
                        <a onclick="mostrar('seccion1')" href="#" class="Titulo">Koroto</a>
                        <br>
                        <nav class="navbar-nav">
                            <a onclick="mostrar('seccion2')" href="#" class="nav-link">Beneficios</a>
                            <a onclick="mostrar('seccion3')" href="#" class="nav-link">Información</a>
                            <a onclick="mostrar('seccion4')" href="#" class="nav-link">Registrar</a>                          
                        </nav>
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
                        <br>
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
                        <h3>Actualiza ó Elimina </h3>
                        <p>Modificando los registros existentes o elimina los que creas innecesarios o incorrectos.</p>
                        <a onclick="mostrar('seccion4')" href="#" class="nav-link">Acceder</a>  
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
                    </section1>


                </div>
                
            </article>

        </section >
        <input class id="btnAtras1"  onclick="mostrar('seccion1')" href="#" value="Atrás">

    </main>


    <main class="container main" id="seccion4">

        <section class="tienda" >


            <article class="cardInfo21">
                <div class="cardInfo-body">
                     <h2>Edita los datos registrados</h2>
               

                    <section1 class="muestra1" id="contenido-editarDatos">
                    </section1>


                </div>
                
            </article>

        </section >
        <input class id="btnAtras1"  onclick="mostrar('seccion1')" href="#" value="Atrás">

    </main>


    <main class="container main" id="seccion41">

    <div class="formularioSeccion2">
            <h2>Editor de Materiales registrados</h2>
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

    <main class="container main" id="seccion44">
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
                <div class="caja__trasera-register">
                    <br>
                    <h4>¿Tienes una cuenta?</h4>
                    <p>Inicia sesión para entrar a Let's Train</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="PHP/ingresoUsuario.php" method="POST" class="formulario__register">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="Correo Electronico" name="CorreoElectronico" required>
                    <input type="password" placeholder="Contraseña" name="Contraseña" required>
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="PHP/registroUsuario.php" method="POST" class="formulario__login">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombres" name="nombres" required>
                    <input type="text" placeholder="Apellidos" name="apellidos" required>
                    <input list="TipoDocumento" name="TipoDocumento" placeholder="Tipo de Documento" required />
                    <datalist id="TipoDocumento" required>
                        <option value="Cédula de Ciudadanía"></option>
                        <option value="NIT"></option>
                        <option value="Cédula de Extranjeria"></option>
                    </datalist>
                    <input type="number" placeholder="Numero identificación" min="9999999" name="NumeroIdentificacion" required>
                    
                    <input type="email" placeholder="Correo Electronico" name="CorreoElectronico" required>
                    <input type="password" placeholder="Contraseña" name="Contraseña" required>
                    <button>Registrar</button>
                </form>
            </div>
        </div>

    </main>

 



    <main class="container main" id="seccion22">
        <h1 class="main-title">Datos</h1>
        <section class="tienda" >
            <article class="card2">
             <!--  <img src="img/card-1-min.png" class="card-img"  alt="">--> 
                <div class="card2-body">

                    <p>Seleccione la opción para conocer la información referente</p>
                    <br>
                    <a onclick="muestra('contenido-datosBarrios')" href="#" class="btn2">Datos de Barrio</a>
                    <br>
                    <a onclick="muestra('contenido-rutaBarrio')" href="#" class="btn2">Ruta Barrio</a>
                    <br>
                    <a onclick="muestra('contenido-rutaRecolectar')" href="#" class="btn2">Ruta Recolección</a>
                    <br>
                    <a onclick="muestra('contenido-vehiculo')" href="#" class="btn2">Vehículo</a>
                    <br>
                    <a onclick="muestra('contenido-contenedores')" href="#" class="btn2">Contenedores</a>
                    <br>
                    <a onclick="muestra('contenido-residuos')" href="#" class="btn2">Residuos</a>
        
                </div>
            </article>

            <article class="card21">
                 <div class="card2-body">

                    <section1 class="muestra1" id="contenido-datosBarrios">
                    </section1>
                    <section1 class="muestra1" id="contenido-rutaBarrio">
                    </section1>

                    <section1 class="muestra1" id="contenido-rutaRecolectar">
                    </section1>

                    <section1 class="muestra1" id="contenido-vehiculo">
                    </section1>
                    
                    <section1 class="muestra1" id="contenido-contenedores">
                    </section1>

                    <section1 class="muestra1" id="contenido-residuos">
                    </section1>

                </div>
            </article>

        </section >

        
    </main>




    <main class="container main" id="seccion000000">
        <h1 class="main-title">Contenedores</h1>
        <section section class="tienda" >
            <article class="card3">
                <img src="img/contenedorBlanco.jpeg" class="card-img3"  alt="">
                <div class="card-body">
                    <h5>Blanco</h5>
                    <p>Tiene depositado residuos aprovechables o materiales reciclables</p>
                </div>
            </article>

            <article class="card3">
                <img src="img/contenedorNegro.jpeg" class="card-img3"  alt="">
                <div class="card-body">
                    <h5>Negro</h5>
                    <p>Deposita los residuos no aprovechables, todo lo que no se puede reciclar</p>
                </div>
            </article>

            <article class="card3">
                <img src="img/contenedorVerde.jpeg" class="card-img3"  alt="">
                <div class="card-body">
                    <h5>Verde</h5>
                    <p>Recoge los residuos orgánicos aprovechables como los restos de comida y desechos agrícolas que puede qenerar abonos para suelos  </p>
                </div>
            </article>
        </section>


</main>




    <footer class="bg-footer">
        <div class="container">
            <p>ARQUITECTURA DE SOFTWARE Y SQA - 202510-1A - 13 <br><br>
            Grupo de trabajo: Jhon Jairo Cruz Caballero, Juan Stiven Acosta, Marquisa Solano Acosta, Haimar</p>         </p>
        </div>
    </footer>

</body>



<script src="../Script/acciones.js"></script>
<script src="../Script/mostrarDatosKoroto.js"></script>
<script src="../Script/darOpciones.js"></script>




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
        if (idseccion === 'seccion4') {
            
            fetch('../PHP/editarDatos.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-editarDatos').innerHTML = data);
                //.then(data => document.getElementById('contenido-rutas').innerHTML = data);
                           
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




    function mostrarRegistro(indice) {
        if (datos && datos.length > 0 && indice >= 0 && indice < datos.length) {
            document.getElementById('idMaterial').value = datos[indice].IDMaterial;
            document.getElementById('nombreMaterial').value = datos[indice].Nombre_material;
            document.getElementById('tipoResiduo').value = $row['Tipo_residuo'];
            document.getElementById('tipoMaterial').value = datos[indice].Tipo_material;
            document.getElementById('capacidad').value = datos[indice].Capacidad;
            document.getElementById('reciclable').value = datos[indice].Reciclable;
            indiceActual = indice;
        }
    }

    function mostrarRegistroAnterior() {
        mostrarRegistro(indiceActual - 1);
    }

    function mostrarRegistroSiguiente() {
        mostrarRegistro(indiceActual + 1);
    }


    
</script>



</html>