    
document.addEventListener('DOMContentLoaded', function () {
        // Obtener referencias a los campos y al botón de siguiente
        var nombreInput = document.getElementById('nombre');
        var apellidoPaternoInput = document.getElementById('Aparteno');
        var apellidoMaternoInput = document.getElementById('Amarteno');
        var correoInput = document.getElementById('correo');
        var tipoCriticaInput = document.getElementsByName('Tipo_de_crit');
        var submitButton = document.getElementById('submitButton');

        // Funciones para evitar cortar, copiar y pegar
        function disableCutCopyPaste(event) {
            event.preventDefault();
            alert("Accion no valida");
        }

        // Asignar funciones a los eventos de cortar, copiar y pegar
        nombreInput.addEventListener('cut', disableCutCopyPaste);
        nombreInput.addEventListener('copy', disableCutCopyPaste);
        nombreInput.addEventListener('paste', disableCutCopyPaste);

        apellidoPaternoInput.addEventListener('cut', disableCutCopyPaste);
        apellidoPaternoInput.addEventListener('copy', disableCutCopyPaste);
        apellidoPaternoInput.addEventListener('paste', disableCutCopyPaste);

        apellidoMaternoInput.addEventListener('cut', disableCutCopyPaste);
        apellidoMaternoInput.addEventListener('copy', disableCutCopyPaste);
        apellidoMaternoInput.addEventListener('paste', disableCutCopyPaste);

        correoInput.addEventListener('cut', disableCutCopyPaste);
        correoInput.addEventListener('copy', disableCutCopyPaste);
        correoInput.addEventListener('paste', disableCutCopyPaste);
        
        // Función para deshabilitar o habilitar el botón según el estado de los campos
        function toggleSubmitButton() {
            var camposLlenos =
                nombreInput.value.trim() !== '' &&
                apellidoPaternoInput.value.trim() !== '' &&
                apellidoMaternoInput.value.trim() !== '' &&
                correoInput.value.trim() !== '' &&
                tipoCriticaInput[0].checked || tipoCriticaInput[1].checked;

            submitButton.disabled = !camposLlenos;
        }

        // Asignar la función al evento de cambio en los campos
        nombreInput.addEventListener('input', toggleSubmitButton);
        apellidoPaternoInput.addEventListener('input', toggleSubmitButton);
        apellidoMaternoInput.addEventListener('input', toggleSubmitButton);
        correoInput.addEventListener('input', toggleSubmitButton);
        tipoCriticaInput[0].addEventListener('change', toggleSubmitButton);
        tipoCriticaInput[1].addEventListener('change', toggleSubmitButton);

        // Llamar a la función inicialmente para configurar el estado inicial del botón
        toggleSubmitButton();
    });


