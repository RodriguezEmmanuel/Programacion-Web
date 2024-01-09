
document.addEventListener('DOMContentLoaded', function() {
    var textarea = document.querySelector('textarea');
    var counter = document.createElement('span');
    counter.textContent = '0/255'; // Inicializa el contador

    textarea.addEventListener('input', function() {
        var currentLength = textarea.value.length;
        counter.textContent = currentLength + '/255';

        // Puedes agregar una lógica para cambiar el color del contador si se excede el límite
        if (currentLength > 255) {
            counter.style.color = 'red';
        } else {
            counter.style.color = 'black';
        }
    });

    // Agrega el contador al DOM
    document.querySelector('.box-imgg').appendChild(counter);
});
