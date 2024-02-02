const slides1 = document.querySelectorAll('.item-slide1');
const paginationItems1 = document.querySelectorAll('.pagination-item1');

let currentSlide1 = 0;

function changeSlide(index1) {
    if (index1 >= 0 && index1 < slides1.length) {
        slides1[currentSlide1].classList.remove('active');
        paginationItems1[currentSlide1].classList.remove('active');
        currentSlide1 = index1;
        slides1[currentSlide1].classList.add('active');
        paginationItems1[currentSlide1].classList.add('active');
    }
}

paginationItems1.forEach((paginationItem1, index1) => {
    paginationItem1.addEventListener('click', () => {
        changeSlide1(index1);
    });
});

// Añade el siguiente cOdigo si deseas que el slider cambie automticamente
function nextSlide1(){
    const nextIndex1 = (currentSlide1 + 1) % slides1.length;
    changeSlide1(nextIndex1);
}

var timer = setInterval(nextSlide1, 5000); //Cambia de slide cada 5 segundos 

function changeSlide1(index1) {
    // Verifica si el indice es valido
    if (index1 >= 0 && index1 < slides1.length) {
        // Oculta el slide actual
        slides1[currentSlide1].classList.remove('active');
        paginationItems1[currentSlide1].classList.remove('active');

        // Actualiza el indice del slide actual
        currentSlide1 = index1;

        // Mostra el nuevo slide
        slides1[currentSlide1].classList.add('active');
        paginationItems1[currentSlide1].classList.add('active');
        
    }
}

// Agrega evento de click a cada elemento de paginacion
paginationItems1.forEach((paginationItem1, index1) => {
    paginationItem1.addEventListener('click', () => {
        changeSlide1(index1);
        clearInterval(timer)
        timer = setInterval(nextSlide1, 5000);

        paginationItems1.forEach((item1) =>{
            item1.classList.remove("active");
        });
        paginationItem1.classList.add("active");   
    });
});
