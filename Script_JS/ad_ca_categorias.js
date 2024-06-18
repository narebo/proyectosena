function agregarCategoria() {
    const id = document.getElementById('categoria-id').value;
    const nombre = document.getElementById('categoria-nombre').value;
    const descripcion = document.getElementById('categoria-descripcion').value;

    if (id && nombre && descripcion) {
        const tbody = document.querySelector('#tabla-categorias tbody');
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${id}</td>
            <td>${nombre}</td>
            <td>${descripcion}</td>
            <td>
                <button onclick="editarCategoria(this)">Editar</button>
                <button onclick="eliminarCategoria(this)">Eliminar</button>
            </td>
        `;

        tbody.appendChild(fila);

        document.getElementById('categoria-id').value = '';
        document.getElementById('categoria-nombre').value = '';
        document.getElementById('categoria-descripcion').value = '';
    } else {
        alert('Por favor, completa todos los campos.');
    }
}

function editarCategoria(boton) {
    const fila = boton.parentElement.parentElement;
    const celdas = fila.children;

    document.getElementById('categoria-id').value = celdas[0].innerText;
    document.getElementById('categoria-nombre').value = celdas[1].innerText;
    document.getElementById('categoria-descripcion').value = celdas[2].innerText;

    fila.remove();
}

function eliminarCategoria(boton) {
    const fila = boton.parentElement.parentElement;
    fila.remove();
}