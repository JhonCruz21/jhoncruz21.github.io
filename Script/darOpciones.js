function actualizarTiposMaterial() {
    var tipoResiduo = document.getElementById("tipo_residuo").value;
    var tipoMaterialSelect = document.getElementById("tipo_material");
    tipoMaterialSelect.innerHTML = "<option value=''>Seleccione un tipo de material</option>"; // Limpia el select

    if (tipoResiduo === "RESIDUOS APROVECHABLES") {
        var materialesAprovechables = ["Papel", "Cartón", "Plástico", "Vidrio", "Metal"];
        materialesAprovechables.forEach(function(material) {
            var option = document.createElement("option");
            option.value = material;
            option.text = material;
            tipoMaterialSelect.add(option);
        });
    } else if (tipoResiduo === "RESIDUOS NO APROVECHABLES") {
        var materialesNoAprovechables = ["Papel higiénico", "Servilletas usadas", "Pañales", "Icopor"];
        materialesNoAprovechables.forEach(function(material) {
            var option = document.createElement("option");
            option.value = material;
            option.text = material;
            tipoMaterialSelect.add(option);
        });
    } else if (tipoResiduo === "RESIDUOS ORGANICOS APROVECHABLES") {
        var materialesOrganicos = ["Restos de comida", "Cáscaras de frutas", "Residuos de jardín"];
        materialesOrganicos.forEach(function(material) {
            var option = document.createElement("option");
            option.value = material;
            option.text = material;
            tipoMaterialSelect.add(option);
        });
    }
}

function actualizarTMaterial() {
    var tipoResiduo = document.getElementById("tipo_residuo").value;
    var tipoMaterialSelect = document.getElementById("tipo_material");
    tipoMaterialSelect.innerHTML = "<option value=''>Seleccione un tipo de material</option>"; // Limpia el select

    if (tipoResiduo === "RESIDUOS APROVECHABLES") {
        var materialesAprovechables = ["Papel", "Cartón", "Plástico", "Vidrio", "Metal"];
        materialesAprovechables.forEach(function(material) {
            var option = document.createElement("option");
            option.value = material;
            option.text = material;
            tipoMaterialSelect.add(option);
        });
    } else if (tipoResiduo === "RESIDUOS NO APROVECHABLES") {
        var materialesNoAprovechables = ["Papel higiénico", "Servilletas usadas", "Pañales", "Icopor"];
        materialesNoAprovechables.forEach(function(material) {
            var option = document.createElement("option");
            option.value = material;
            option.text = material;
            tipoMaterialSelect.add(option);
        });
    } else if (tipoResiduo === "RESIDUOS ORGANICOS APROVECHABLES") {
        var materialesOrganicos = ["Restos de comida", "Cáscaras de frutas", "Residuos de jardín"];
        materialesOrganicos.forEach(function(material) {
            var option = document.createElement("option");
            option.value = material;
            option.text = material;
            tipoMaterialSelect.add(option);
        });
    }
}
