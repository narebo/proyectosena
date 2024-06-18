function addProduct() {
    const number = document.getElementById('number').value;
    const code = document.getElementById('code').value;
    const image = document.getElementById('image').value;
    const name = document.getElementById('name').value;
    const purchasePrice = document.getElementById('purchasePrice').value;
    const salePrice = document.getElementById('salePrice').value;
    const category = document.getElementById('category').value;
    const minimum = document.getElementById('minimum').value;
    const stock = document.getElementById('stock').value;

    const tableBody = document.getElementById('productTableBody');
    const row = tableBody.insertRow();
    row.insertCell(0).innerText = number;
    row.insertCell(1).innerText = code;
    row.insertCell(2).innerHTML = `<img src="${image}" alt="${name}" style="width: 50px; height: 50px;">`;
    row.insertCell(3).innerText = name;
    row.insertCell(4).innerText = purchasePrice;
    row.insertCell(5).innerText = salePrice;
    row.insertCell(6).innerText = category;
    row.insertCell(7).innerText = minimum;
    row.insertCell(8).innerText = stock;

    const actionsCell = row.insertCell(9);
    actionsCell.innerHTML = '<button onclick="editProduct(this)">Editar</button> <button onclick="deleteProduct(this)">Eliminar</button>';

    clearForm();
}

function editProduct(button) {
    const row = button.parentElement.parentElement;
    document.getElementById('number').value = row.cells[0].innerText;
    document.getElementById('code').value = row.cells[1].innerText;
    document.getElementById('image').value = row.cells[2].querySelector('img').src;
    document.getElementById('name').value = row.cells[3].innerText;
    document.getElementById('purchasePrice').value = row.cells[4].innerText;
    document.getElementById('salePrice').value = row.cells[5].innerText;
    document.getElementById('category').value = row.cells[6].innerText;
    document.getElementById('minimum').value = row.cells[7].innerText;
    document.getElementById('stock').value = row.cells[8].innerText;

    row.classList.add('hidden');
    document.getElementById('productForm').insertAdjacentHTML('beforeend', `<button type="button" id="updateButton" onclick="updateProduct(${row.rowIndex})">Actualizar Producto</button>`);
}

function updateProduct(index) {
    const number = document.getElementById('number').value;
    const code = document.getElementById('code').value;
    const image = document.getElementById('image').value;
    const name = document.getElementById('name').value;
    const purchasePrice = document.getElementById('purchasePrice').value;
    const salePrice = document.getElementById('salePrice').value;
    const category = document.getElementById('category').value;
    const minimum = document.getElementById('minimum').value;
    const stock = document.getElementById('stock').value;

    const tableBody = document.getElementById('productTableBody');
    const row = tableBody.rows[index - 1];

    row.cells[0].innerText = number;
    row.cells[1].innerText = code;
    row.cells[2].innerHTML = `<img src="${image}" alt="${name}" style="width: 50px; height: 50px;">`;
    row.cells[3].innerText = name;
    row.cells[4].innerText = purchasePrice;
    row.cells[5].innerText = salePrice;
    row.cells[6].innerText = category;
    row.cells[7].innerText = minimum;
    row.cells[8].innerText = stock;

    row.classList.remove('hidden');
    document.getElementById('updateButton').remove();
    clearForm();
}

function deleteProduct(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}

function clearForm() {
    document.getElementById('productForm').reset();
}