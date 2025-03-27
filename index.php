


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koroto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="styles/style.css">


</head>

<body>
   <header class="bg-header">
        <div class="bg-navbar">
            <div class="container">
                <div class="navbar">
                    <a href="" class="navbar-brand">
                        <img src="img/Icono.png" alt=""><!--svg para guardar iconos-->
                        <a onclick="mostrar('seccion1')" href="#" class="Titulo">Koroto</a>
                        <nav class="navbar-nav">
                            <a onclick="mostrar('seccion2')" href="#" class="nav-link">Beneficios</a>
                            <a onclick="mostrar('seccion3')" href="#" class="nav-link">Información</a>
                            <a onclick="mostrar('seccion4')" href="#" class="nav-link">Registrar</a>

                            
                        </nav>

                    </a>
                    <a class="navbar-brand">
                        <nav class="navbar-nav1" >
                        <form action="PHP/ingresoUsuario.php" method="POST">
                            <input id="textos" type="email" placeholder="Correo Electronico" name="CorreoElectronico" required>
                            <input id="textos" type="password" placeholder="Contraseña" name="Contraseña" required>
                            <button id="ingresar">Iniciar Sesión</button>
                        </form>

                        </nav>

                    </a>
                    
                </div>
            </div>
        </div>
   </header>

    <main class="container main" id="seccion1">
        <section id="tienda">
            <article class="card1">

                   <div class="card1-body">
                    <h2>LLEVA TU CONTROL A OTRO NIVEL</h2>
                    <p>Mejora el conteo de los materiales reciclados en tu día a día de forma rapida y sencilla</p>
                    <br>
                    <article id="SecMenu5" onclick="mostrar('seccion4')" href="#">
                        <h4><a style="color:rgb(255, 255, 255);" onclick="mostrar('seccion4')" href="#">Registrarme</a></h4>
        
                    </article>
                    
                       
                   </div>
                   <img src="img/sistema.png" class="card1-img"  alt="">
            </article>

        </section>
    </main>


    <main class="container main" id="seccion2">

        <section class="tienda">
            <article class="card">
                <img src="img/productividad.png" class="card-img"  alt="">
               
                <h2>¿Qué te permite hacer Koroto?</h2> 

            </article>

            <article class="card">
                <div class="card-body">
                    <p>Crear registros de los materiales reciclados</p>
                </div>
                <div class="card-body">
                    <p>Consultar los datos ingresados al sistema para analizarlos</p>
                </div>
                <div class="card-body">
                    <p>Actualizar los datos, modificando los registros existentes. </p>
                </div>
                <div class="card-body">
                    <p>Eliminar los datos que creas innecesarios o incorrectos.</p>
                </div>
            </article>

        </section>
    </main>


    <main class="container main" id="seccion3">

        <section class="tienda" >
            <article class="cardInfo2">
             <!--  <img src="img/card-1-min.png" class="card-img"  alt="">--> 
                <div class="cardInfo-body">

                    <p>Seleccione la opción para conocer la información referente</p>
                    <br>
                    <a onclick="mostrando('contenido-aprovechables')" href="#" class="btn2">RESIDUOS APROVECHABLES</a>
                    <br>
                    <a onclick="mostrando('contenido-noaprovechables')" href="#" class="btn2">RESIDUOS NO APROVECHABLES</a>
                    <br>
                    <a onclick="mostrando('contenido-orgánicosaprovechables')" href="#" class="btn2">RESIDUOS ORGÁNICOS APROVECHABLES</a>

        
                </div>
            </article>

            <article class="cardInfo21">
                 <div class="cardInfo-body">

                    <section2 class="mostrando1" id="contenido-aprovechables">

                        <h2>RESIDUOS APROVECHABLES</h2>
                        <br>
                        <p>Son aquellos materiales que mediante procesos de reciclaje pueden transformarse en nuevos productos 
                            y ser aprovechados.</p>
                        <br>
                        <p>
                            <li>Plástico</li>
                            <li>Cartón</li>
                            <li>Vidrio</li>
                            <li>Papel</li>
                            <li>Metales</li></p>
                
                    </section2>

                    <section2 class="mostrando1" id="contenido-noaprovechables">

                        <h2>RESIDUOS NO APROVECHABLES</h2>
                        <br>
                        <p>Son todos materiales que debido a su composición o estado, no pueden ser reciclados o reutilizados de manera viable.</p>
                        <br>
                        <p>
                            <li>Papel higiénico y servilletas usadas</li>
                            <li>Papeles y cartones contaminados con comida</li>
                            <li>Papeles metalizados</li>
                            <li>Pañales desechables.</li></p>

                    </section2>

                    <section2 class="mostrando1" id="contenido-orgánicosaprovechables">

                        <h2>RESIDUOS ORGÁNICOS APROVECHABLES</h2>
                        <br>
                        <p>Son restos de materia orgánica que pueden descomponerse y convertirse en compost, un abono natural.</p>
                        <br>
                        <p>
                            <li>Restos de frutas y verduras</li>
                            <li>Cáscaras de huevo</li>
                            <li>Posos de café</li>
                            <li>Restos de jardinería (hojas, ramas pequeñas)</li></p>

                    </section2>

                </div>
            </article>
        </section >
        
    </main>



    <main class="container main" id="seccion4">
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

 
    <footer class="bg-footer">
        <div class="container">
            <p>ARQUITECTURA DE SOFTWARE Y SQA - 202510-1A - 13 <br><br>
            Grupo de trabajo: Jhon Jairo Cruz Caballero, Juan Stiven Acosta, Marquisa Solano Acosta, Heimar Andrés Mosquera Cuesta</p>         </p>
        </div>
    </footer>

</body>



<script src="Script/acciones.js"></script>
<script src="Script/mostrarDatos.js"></script>



</html>