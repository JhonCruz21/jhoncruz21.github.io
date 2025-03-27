
    function mostrar(idseccion) {
        var secciones = document.getElementsByTagName('main');
        for (var i = 0; i < secciones.length; i++) {
            secciones[i].style.display = 'none';
        }
        document.getElementById(idseccion).style.display = 'block';

        // Cargar contenido dinámico para cada sección
        if (idseccion === 'seccion2') {
            fetch('PHP/datosBarrios.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-datosBarrios').innerHTML = data);
                //.then(data => document.getElementById('contenido-rutas').innerHTML = data);
                
            
            fetch('PHP/rutaBarrio.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-rutaBarrio').innerHTML = data);
                //.then(data => document.getElementById('contenido-rutas').innerHTML = data);
              
            fetch('PHP/recoleccion.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-rutaRecolectar').innerHTML = data);
                //.then(data => document.getElementById('contenido-rutas').innerHTML = data);
        
            fetch('PHP/vehiculo.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-vehiculo').innerHTML = data);
             
            fetch('PHP/contenedores.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-contenedores').innerHTML = data);
                
            fetch('PHP/residuos.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-residuos').innerHTML = data);
                
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


