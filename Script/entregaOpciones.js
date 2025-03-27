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