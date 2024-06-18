document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var email = document.getElementById('email').value;

    console.log("Enviando correo electrónico a: " + email);

    var message = document.getElementById('message');
    message.style.display = 'block';

    var loginButton = document.getElementById('loginButton');
    loginButton.style.display = 'block';
});