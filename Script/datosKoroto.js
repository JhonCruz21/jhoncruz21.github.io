
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

        // Cargar contenido dinámico para cada sección
        if (idseccion === 'seccion5') {
        
            fetch('../PHP/consultaDatos.php')
                .then(response => response.text())
                .then(data => document.getElementById('contenido-consultaDatos').innerHTML = data);
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