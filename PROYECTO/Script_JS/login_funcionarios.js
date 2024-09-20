document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const role = document.getElementById('role').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    if (role && username && password) {
        switch(role) {
            case 'chef':
                window.location.href = 'interfaz_chef.html';
                break;
            case 'cajero':
                window.location.href = 'interfaz_cajero.html';
                break;
            case 'mesero':
                window.location.href = 'interfaz_mesero.html';
                break;
            default:
                alert('Seleccione un rol válido.');
        }
    } else {
        alert('Por favor, complete todos los campos.');
    }
});
