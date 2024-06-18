document.getElementById('apertura_caja_form').addEventListener('submit', function(event) {
    event.preventDefault();
    var valorIngresado = document.getElementById('ingreso_dinero').value;
    document.getElementById('valor_ingresado').innerText = "Valor ingresado: $" + valorIngresado;
    document.getElementById('ingreso_dinero').value = "";
    document.getElementById('confirmar_btn').style.display = "inline-block";
    document.getElementById('modificar_btn').style.display = "inline-block";
});