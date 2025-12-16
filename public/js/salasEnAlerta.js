// Contenido de boxesAlerta.js
function inicializarSalasEnAlerta() {
    const boxesEnAlerta = document.querySelectorAll('.boxEnAlerta');

    boxesEnAlerta.forEach(box => {
        const esAlerta = localStorage.getItem(box.id) === 'true';
        intervalIds[box.id] = setInterval(() => {
            if (box.classList.contains('red-background')) {
                box.classList.remove('red-background');
                box.classList.add('white-background');
            } else {
                box.classList.remove('white-background');
                box.classList.add('red-background');
            }
        }, 1000);
    });
}

document.addEventListener('DOMContentLoaded', inicializarSalasEnAlerta);
