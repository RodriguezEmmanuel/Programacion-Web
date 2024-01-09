//bloque funcioones como copiar(solo se habilita en input de user), cortar y pegar en los input de contraseña
//ademas no permite al usuario crear la cuenta cuando la contranas son diferentes

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('Rpassword');
    const submitButton = document.querySelector('.newcount');
    const usernameInput = document.getElementById('Usser');
    
    // Bloquear cortar, copiar y pegar en los campos de contraseña
    passwordInput.addEventListener('cut', preventDefaultAction);
    passwordInput.addEventListener('copy', preventDefaultAction);
    passwordInput.addEventListener('paste', preventDefaultAction);

    confirmPasswordInput.addEventListener('cut', preventDefaultAction);
    confirmPasswordInput.addEventListener('copy', preventDefaultAction);
    confirmPasswordInput.addEventListener('paste', preventDefaultAction);

    // Permitir copiar en el campo de usuario
    usernameInput.addEventListener('cut', preventDefaultAction);
    usernameInput.addEventListener('paste', preventDefaultAction);

    // Validar contraseñas al escribir
    passwordInput.addEventListener('input', validatePasswords);
    confirmPasswordInput.addEventListener('input', validatePasswords);

    function preventDefaultAction(event) {
        event.preventDefault();
        alert("Accion no valida");
    }

    function validatePasswords() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password === confirmPassword) {
            submitButton.removeAttribute('disabled');
        } else {
            submitButton.setAttribute('disabled', 'disabled');
        }
    }
});
