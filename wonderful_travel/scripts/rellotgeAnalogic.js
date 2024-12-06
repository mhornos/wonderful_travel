function actualizarReloj() {
    var fecha = new Date();

    var hora = fecha.getHours();
    var minuto = fecha.getMinutes();
    var segundo = fecha.getSeconds();

    // Calcular los ángulos de las manecillas
    var horaAngulo = (hora % 12) * 30 + (minuto / 60) * 30;
    var minutoAngulo = minuto * 6;
    var segundoAngulo = segundo * 6;

    // Aplicar los ángulos a las manecillas
    document.querySelector('.hora').style.transform = `rotate(${horaAngulo}deg)`;
    document.querySelector('.minuto').style.transform = `rotate(${minutoAngulo}deg)`;
    document.querySelector('.segundo').style.transform = `rotate(${segundoAngulo}deg)`;
}

// Actualizar el reloj cada segundo
setInterval(actualizarReloj, 1000);

// Iniciar el reloj al cargar la página
actualizarReloj();
