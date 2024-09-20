document.getElementById('branchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const branchName = document.getElementById('branchName').value;
    const branchAddress = document.getElementById('branchAddress').value;
    const branchPhone = document.getElementById('branchPhone').value;
    const branchEmail = document.getElementById('branchEmail').value;
    const isMainBranch = document.getElementById('isMainBranch').checked;
    
    addBranch(branchName, branchAddress, branchPhone, branchEmail, isMainBranch);
    
    document.getElementById('branchForm').reset();
});

function addBranch(name, address, phone, email, main) {
    const branchList = document.getElementById('branchList');
    
    const row = document.createElement('tr');
    
    row.innerHTML = `
        <td>${name}</td>
        <td>${address}</td>
        <td>${phone}</td>
        <td>${email}</td>
        <td>${main ? 'Sí' : 'No'}</td>
        <td class="actions">
            <button onclick="editBranch(this)">Editar</button>
            <button onclick="deleteBranch(this)">Eliminar</button>
        </td>
    `;
    
    branchList.appendChild(row);
}

function editBranch(button) {
    const row = button.parentNode.parentNode;
    const cells = row.children;
    
    document.getElementById('branchName').value = cells[0].textContent;
    document.getElementById('branchAddress').value = cells[1].textContent;
    document.getElementById('branchPhone').value = cells[2].textContent;
    document.getElementById('branchEmail').value = cells[3].textContent;
    document.getElementById('isMainBranch').checked = cells[4].textContent === 'Sí';
    
    deleteBranch(button);
}

function deleteBranch(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}