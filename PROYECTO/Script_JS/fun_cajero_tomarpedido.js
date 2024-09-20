let mesaSeleccionada = 0;
let productoSeleccionado = "";
let precioSeleccionado = 0;

function abrirMenu(mesa) {
    mesaSeleccionada = mesa;
    // Ocultar todos los menús
    document.querySelectorAll('.menu').forEach(menu => menu.style.display = 'none');
    // Mostrar el menú correspondiente
    document.getElementById('menu' + mesa).style.display = 'block';
}

function agregarProducto(producto, precio) {
    productoSeleccionado = producto;
    precioSeleccionado = precio;
}

function finalizarPedido() {
    if (mesaSeleccionada > 0 && productoSeleccionado !== "") {
        document.getElementById('mesa').value = mesaSeleccionada;
        document.getElementById('producto').value = productoSeleccionado;
        document.getElementById('precio').value = precioSeleccionado;
        document.getElementById('pedidoForm').submit();
    } else {
        alert("Por favor seleccione una mesa y un producto.");
    }
}
