function addProduct() {
    const productInput = document.getElementById('product');
    const quantityInput = document.getElementById('quantity');

    const product = productInput.value;
    const quantity = quantityInput.value;

    if (product && quantity) {
        const table = document.getElementById('stockTable').getElementsByTagName('tbody')[0];

        const newRow = table.insertRow();
        const productCell = newRow.insertCell(0);
        const quantityCell = newRow.insertCell(1);
        const actionsCell = newRow.insertCell(2);

        productCell.innerHTML = product;
        quantityCell.innerHTML = quantity;
        actionsCell.innerHTML = `<button onclick="editProduct(this)">Editar</button> <button onclick="deleteProduct(this)">Eliminar</button>`;

        productInput.value = '';
        quantityInput.value = '';
    } else {
        alert('Por favor, complete ambos campos.');
    }
}

function editProduct(button) {
    const row = button.parentNode.parentNode;
    const productCell = row.cells[0];
    const quantityCell = row.cells[1];

    const newProduct = prompt('Editar Producto:', productCell.innerHTML);
    const newQuantity = prompt('Editar Cantidad:', quantityCell.innerHTML);

    if (newProduct !== null && newQuantity !== null) {
        productCell.innerHTML = newProduct;
        quantityCell.innerHTML = newQuantity;
    }
}

function deleteProduct(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}