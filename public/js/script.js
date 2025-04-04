function App() {}

window.onload = function (event) {
    var app = new App();
    window.app = app;
};

App.prototype.processingButton = function (event) {
    const btn = event.currentTarget;
    const carruselList = event.currentTarget.parentNode;
    const track = carruselList.querySelector('#track');
    const carrusel = track.querySelectorAll('.carrusel');

    const carruselWidth = carrusel[0].offsetWidth;
    const trackWidth = track.scrollWidth; // Cambié a scrollWidth para obtener el tamaño completo
    const listWidth = carruselList.offsetWidth;

    // Asegurarnos de que el valor de left siempre sea un número
    let leftPosition = track.style.left ? parseFloat(track.style.left.replace('px', '')) : 0;

    if (btn.dataset.button === "button-prev") {
        prevAction(leftPosition, carruselWidth, track);
    } else {
        nextAction(leftPosition, trackWidth, listWidth, carruselWidth, track);
    }
};

let prevAction = (leftPosition, carruselWidth, track) => {
    if (leftPosition < 0) { // Mover hacia la izquierda
        track.style.left = `${leftPosition + carruselWidth}px`; // Desplaza a la derecha
    }
};

let nextAction = (leftPosition, trackWidth, listWidth, carruselWidth, track) => {
    if (leftPosition > -(trackWidth - listWidth)) { // Mover hacia la derecha
        track.style.left = `${leftPosition - carruselWidth}px`; // Desplaza a la izquierda
    }
};