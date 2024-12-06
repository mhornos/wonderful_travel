// actualitza els països segons el continent seleccionat
function actualitzarPaisos() {
    var continentSelect = document.getElementById("continent");
    var paisSelect = document.getElementById("pais");
    var continentSeleccionat = continentSelect.value;

    // esborra les opcions actuals del select de països
    paisSelect.innerHTML = "";

    // afegir l'opció per defecte "Selecciona un país"
    var opt = document.createElement("option");
    opt.value = "";
    opt.innerHTML = "";
    paisSelect.appendChild(opt);

    // opcions de països segons el continent
    var paisosPerContinent = {
        "Africa": ["Sud-àfrica", "Nigèria", "Egipte"],
        "Europa": ["Espanya", "França", "Alemanya"],
        "Àsia": ["Xina", "Japó", "Índia"],
        "Amèrica": ["Estats Units", "Argentina", "Brasil"]
    };

    // afegeix les opcions segons el continent seleccionat
    if (paisosPerContinent[continentSeleccionat]) {
        paisosPerContinent[continentSeleccionat].forEach(function(pais) {
            var opt = document.createElement("option");
            opt.value = pais;
            opt.innerHTML = pais;
            paisSelect.appendChild(opt);
        });
    } else {
        // si no hi ha cap continent seleccionat
        var opt = document.createElement("option");
        opt.value = "";
        opt.innerHTML = "Selecciona primer un continent";
        paisSelect.appendChild(opt);
    }
}


// habilita o deshabilita el camp de descompte segons el checkbox
function habilitarDescompte() {
    var checkbox = document.getElementById("checkboxDescompte");
    var inputDescompte = document.getElementById("inputDescompte");

    // si el checkbox està marcat habilita l'input si no el deshabilita
    if (checkbox.checked) {
        inputDescompte.disabled = false;  // habilitar l'input
    } else {
        inputDescompte.disabled = true;   // deshabilitar l'input
    }
}

// objecte amb els preus per país
var preus = {
    "Alemanya": 980,
    "Argentina": 810,
    "Brasil": 790,
    "Egipte": 1110,
    "Espanya": 710,
    "Estats Units": 1340,
    "França": 830,
    "Índia": 990,
    "Japó": 1290,
    "Nigèria": 690,
    "Sud-àfrica": 870,
    "Xina": 1250
};

// funció per actualitzar el preu total amb el descompte si és aplicable
function actualitzarPreu() {
    var paisSelect = document.getElementById("pais");
    var paisSeleccionat = paisSelect.value;
    var nPersones = document.getElementById("nPersonas").value;
    var preuTotal = 0;

    if (preus[paisSeleccionat]) {
        preuTotal = preus[paisSeleccionat] * nPersones;
    }

    // comprovar si s'ha activat el descompte
    var checkboxDescompte = document.getElementById("checkboxDescompte");
    if (checkboxDescompte.checked) {
        var descomptePercentatge = document.getElementById("inputDescompte").value || 0;
        var descompte = (preuTotal * descomptePercentatge) / 100;
        preuTotal -= descompte;
    }

    // mostrar el preu total al label
    document.getElementById("preuTotal").innerText = preuTotal + " €";

    document.getElementById("precioTotalFormulario").value = preuTotal;

    document.getElementById("formulario").addEventListener("submit", function(event) {
        // Actualizar el campo oculto antes de enviar
        var preuTotal = document.getElementById("preuTotal").innerText;
        document.getElementById("precioTotalFormulario").value = preuTotal.replace(' €', ''); // Remover el " €"
    });
    
}

// afegir l'event per actualitzar el preu quan es canviï el país, el nombre de persones o el descompte
document.getElementById("pais").addEventListener("change", actualitzarPreu);
document.getElementById("nPersonas").addEventListener("input", actualitzarPreu);
document.getElementById("checkboxDescompte").addEventListener("change", actualitzarPreu);
document.getElementById("inputDescompte").addEventListener("input", actualitzarPreu);

document.addEventListener("DOMContentLoaded", function () {
    const botoCanvi = document.getElementById("boto-canvi");
    const contenidorRellotgeDigital = document.getElementById("reloj-container");
    const contenidorRellotgeAnalogic = document.querySelector(".contenedor-reloj");

    // Inicialitzar l'estat a Digital
    let esDigital = true;
    contenidorRellotgeDigital.style.display = "block";
    contenidorRellotgeAnalogic.style.display = "none";

    botoCanvi.addEventListener("change", function () {
        esDigital = !esDigital;

        // Canvi entre Digital i Analògic
        if (esDigital) {
            contenidorRellotgeDigital.style.display = "block";
            contenidorRellotgeAnalogic.style.display = "none";
        } else {
            contenidorRellotgeDigital.style.display = "none";
            contenidorRellotgeAnalogic.style.display = "block";
        }
    });
});

// establir la data actual per defecte al calendari
document.addEventListener("DOMContentLoaded", function() {
    // obtenir la data actual
    var dataActual = new Date().toISOString().split('T')[0];
    
    // assignarla al camp de data
    document.getElementById("data").value = dataActual;
});
