function marcarListo(button) {
    button.parentElement.style.backgroundColor = '#d4edda';
    button.parentElement.style.borderColor = '#c3e6cb';
    button.disabled = true;
    button.textContent = 'Listo';
}