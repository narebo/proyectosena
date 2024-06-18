function addEmployee() {
    const table = document.getElementById('employeeTable');
    const row = table.insertRow();
    
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const direccion = document.getElementById('direccion').value;
    const telefono = document.getElementById('telefono').value;
    const email = document.getElementById('email').value;
    const area = document.getElementById('area').value;
    
    row.insertCell(0).innerText = nombre;
    row.insertCell(1).innerText = apellido;
    row.insertCell(2).innerText = direccion;
    row.insertCell(3).innerText = telefono;
    row.insertCell(4).innerText = email;
    row.insertCell(5).innerText = area;
    row.insertCell(6).innerText = "No";

    const actionsCell = row.insertCell(7);
    const editButton = document.createElement('button');
    editButton.innerText = 'Editar';
    editButton.onclick = () => editEmployee(row);
    actionsCell.appendChild(editButton);

    const deleteButton = document.createElement('button');
    deleteButton.innerText = 'Eliminar';
    deleteButton.onclick = () => deleteEmployee(row);
    actionsCell.appendChild(deleteButton);

    document.getElementById('employeeForm').reset();
}

function editEmployee(row) {
    const cells = row.getElementsByTagName('td');
    document.getElementById('nombre').value = cells[0].innerText;
    document.getElementById('apellido').value = cells[1].innerText;
    document.getElementById('direccion').value = cells[2].innerText;
    document.getElementById('telefono').value = cells[3].innerText;
    document.getElementById('email').value = cells[4].innerText;
    document.getElementById('area').value = cells[5].innerText;
    
    row.remove();
}

function deleteEmployee(row) {
    row.remove();
}

function assignUser() {
    const email = document.getElementById('employeeEmail').value;
    const table = document.getElementById('employeeTable');
    let userAssigned = false;

    for (let i = 0, row; row = table.rows[i]; i++) {
        if (row.cells[4].innerText === email) {
            row.cells[6].innerText = "Sí";
            userAssigned = true;
            break;
        }
    }

    if (userAssigned) {
        alert(`Usuario asignado con éxito al empleado con email ${email}.`);
        document.getElementById('userForm').reset();
    } else {
        alert(`No se encontró ningún empleado con el email ${email}.`);
    }
}