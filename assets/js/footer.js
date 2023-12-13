window.addEventListener('resize', function () {
    let contentHeight = document.querySelector('article').offsetHeight;
    console.log("alto: "+contentHeight);
    let viewportHeight = window.innerHeight;
    console.log("viewport: "+viewportHeight);

    if (viewportHeight < contentHeight+76.43+73.73) {
        // Si el viewport es mayor que la altura del contenido, cambia a posición absolute
        document.querySelector('footer').style.position = 'relative';
    } else {
        // Si el viewport es menor que la altura del contenido, cambia a posición fixed
        document.querySelector('footer').style.position = 'fixed';
        document.querySelector('footer').style.bottom = 0;
    }
});

// Disparar el evento de resize al cargar la página para aplicar el estilo inicial
window.dispatchEvent(new Event('resize'));