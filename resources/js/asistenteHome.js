const textArray = [
    "¡Hola!",
    "Estoy aquí para ayudarte.",
    "Sere tu guía para que llegues hasta la biblioteca.", 
    "Ubicada en la torre innovación, piso 2 a mano izquierda antes de llegar al cafecito.",
    "¡Buena suerte!"
];
let textIndex = 0;
const textElement = document.getElementById('text');
const bubble = document.getElementById('bubble');
const personImage = document.getElementById('person');

function showText() {
    if (textIndex < textArray.length) {
        textElement.textContent = textArray[textIndex];
        textIndex++;
        bubble.style.visibility = 'visible';
        bubble.style.opacity = '1';
        setTimeout(() => {
            hideText();
        }, 3000); // Ocultar -> 3 segundos
    }
}

function hideText() {
    bubble.style.opacity = '0';
    setTimeout(() => {
        bubble.style.visibility = 'hidden';
        showText();
    }, 500); // Esperar 0.5 s
}

// inicia anim
showText();

// reiniciar
personImage.addEventListener('click', () => {

    textIndex = 0;
    showText();
});