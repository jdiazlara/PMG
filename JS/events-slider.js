// Referencias a los objetos del DOM
const slider = document.querySelector('.card__container');
const sliderButtons = document.querySelector('.slider-buttons').children;
const noticiasSlider = document.querySelector('.noticias__slider')
const max = slider.children.length;
const sldBtnContainer = document.querySelector('.sld_btn_container');

// Variable del boton de slider seleccionado, posicion y elemento
let selected;

// Funcion para ver cuantas noticias son visibles o caben en el contenedor
function getInView() {
  return Math.floor(noticiasSlider.getBoundingClientRect().width / slider.children[0].getBoundingClientRect().width);
}

// Funcion para obtener la posicion
function getPosition() {
  return slider.style.marginLeft == '' ? 0 : parseInt(slider.style.marginLeft.split('px')[0]);
}

// Evento para controlar los controles del slider, si hay pocas noticias no hay por que navegar
window.addEventListener("resize", e => {
  if (slider.children.length == 0) return;

  ControlsSld()
  sldButtons()
  slider.style.marginLeft = '0px'

  fixWidth()
})

if (slider.children.length !== 0) {
  fixWidth()
  ControlsSld()

  const notAccess = document.querySelector('#notAccess');
  if (slider.children.length <= 3) {
    notAccess.style.display = 'none'
  }

} else {
  const sliderButtons = document.querySelector('.slider-buttons');
  const noticias__link = document.querySelector('.noticias__link');
  const events = document.querySelector('.events')
  const content__container = document.querySelector('.content__container')

  sliderButtons.style.display = 'none'
  noticias__link.style.display = 'none'
  events.style.display = 'none'
  content__container.style.display = 'none'
}


// Function para controlar el tamaño de las noticias 
function setNotWidth(width) {
  for (let index = 0; index < slider.children.length; index++) {
    slider.children[index].style.width = width + "px"
  }
}

function fixWidth() {
  const normalWidth = 350;

  const widthNoticias = noticiasSlider.getBoundingClientRect().width

  if (widthNoticias <= 600) {
    setNotWidth(widthNoticias - 40)
  }
  else if (widthNoticias <= 960) {
    setNotWidth(widthNoticias / 2 - 40)
  }
  else if (widthNoticias <= 1180) {
    setNotWidth(widthNoticias / 3 - 40)
  }
  else {
    setNotWidth(normalWidth)
  }
}

// Funcion pra activar o desactivar los controles segun las noticias y si se ven
function ControlsSld() {

  if (slider.children.length <= getInView() || slider.children.length == 0) {
    const sliderButtons = document.querySelector('.slider-buttons');
    const arrowsContainer = document.querySelectorAll('.arrowsContainer');

    sliderButtons.classList.add('disabled')
    arrowsContainer.forEach(arrow => {
      arrow.classList.add('disabled')
    })
  }
  else {
    const sliderButtons = document.querySelector('.slider-buttons');
    const arrowsContainer = document.querySelectorAll('.arrowsContainer');

    sliderButtons.classList.remove('disabled')
    arrowsContainer.forEach(arrow => {
      arrow.classList.remove('disabled')
    })
  }
}

// Funcion para cuando se presiona un boton de slider
function sldBtnClick(e, i) {
  const jump = slider.children[1].getBoundingClientRect().x - slider.children[0].getBoundingClientRect().x;
  if (!e.target.classList.contains("active")) {
    e.target.classList.add("active")
    sliderButtons[selected].classList.remove("active")
    selected = i

  }
  slider.style.marginLeft = ((i) * (jump) * (-1)) + "px"
}

// Funcion para crear los botones de slider
function sldButtons() {

  fixSpaceMissed()

  if (slider.children.length <= 1 || getInView() >= slider.children.length) return;

  const sliderBtnC = document.querySelector('.slider-buttons');
  sliderBtnC.innerHTML = "";

  sliderBtnC.innerHTML += '<button onClick="sldBtnClick(event, 0)" class="slider-button active"></button>'
  selected = 0;

  for (let i = 0; i < (slider.children.length - getInView()); i++) {
    sliderBtnC.innerHTML += '<button onClick="sldBtnClick(event, ' + (i + 1) + ')" class="slider-button"></button>'
  }

}
sldButtons()

function fixSpaceMissed() {
  if (window.screen.width >= 1090 || window.screen.width <= 802) {
    sldBtnContainer.style.transform = `translateX(0px)`
    return
  }

  const jump = slider.children[1].getBoundingClientRect().x - slider.children[0].getBoundingClientRect().x;
  let move = Math.round((getPosition()) / jump) * (-1)

  if (move == (slider.children.length - getInView())) {
    sldBtnContainer.style.transform = `translateX(0px)`
  }
  else {
    sldBtnContainer.style.transform = `translateX(${(jump - slider.children[0].getBoundingClientRect().width) / 4}px)`
  }
}

// Funcion para mover el slider
function slide(direction) {

  // No se puede mover el slider si hay menos noticias de las que se ven
  if (getInView() >= max) return;

  // Cada salto en el slider debe ser la distancia de uno y otro
  const jump = slider.children[1].getBoundingClientRect().x - slider.children[0].getBoundingClientRect().x;

  // Cual es su posicion en px
  let position = getPosition();

  // Cual es su posicion de 1 en 1
  let move = Math.round((position) / jump) * (-1)

  // Se quiere mover a la izquierda
  if (direction == 'left') {

    // Si no estamos al inicio
    if (move !== 0) {

      // Cambiar el boton de slider seleccionado
      activar(selected - 1)

      // Reposicionamiento
      position += jump
      slider.style.marginLeft = position + 'px'
    }
    else {

      // Cambiar el boton de slider seleccionado
      activar(sliderButtons.length - 1)

      // Reposicionamiento
      position = jump * (max - (getInView())) * (-1)
      slider.style.marginLeft = position + 'px'
    }

  }

  // Se quiere mover a la derecha
  else {

    if (move < (max - (getInView()))) {
      // Cambiar el boton de slider seleccionado
      activar(selected + 1)

      // Reposicionamiento
      position -= jump
      slider.style.marginLeft = position + 'px'
    }
    else {
      // Cambiar el boton de slider seleccionado
      activar(0)

      // Reposicionamiento
      position = 0
      slider.style.marginLeft = position + 'px'
    }

  }

  fixSpaceMissed()
}

// Evento para mover el slider con las flechas del mouse
document.addEventListener("keyup", e => {
  if (e.key == "ArrowLeft") {
    slide("left")
  }
  if (e.key == "ArrowRight") {
    slide("right")
  }
})

// Funcion para activar un boton de slider
function activar(num) {
  sliderButtons[selected].classList.remove("active")
  sliderButtons[num].classList.add("active")
  selected = num
}

// --------- Arrastre del slider-------------

// Variable general para ser si se esta clickando
let clicking = false
let prevMousePosition;
let actualPosition;

function numeroMasCercano(numero, array) {
  return array.reduce((anterior, actual) => Math.abs(actual - numero) < Math.abs(anterior - numero) ? actual : anterior);
}

function SwipeDeviceSelect() {
  Swipe()
}
SwipeDeviceSelect()


function Swipe() {
  const array = [["mousedown", "mousemove", "mouseup"], ["touchstart", "touchmove", "touchend", "movil"]]

  for (let i = 0; i < array.length; i++) {
    const start = array[i][0];
    const over = array[i][1];
    const up = array[i][2];
    const device = ["pc","movil"][i]

    window.addEventListener(over, function (event) {

      if (!clicking || slider.children.length <= 1 || getInView() >= slider.children.length) return
      const clientX = (device == "pc") ? event.clientX : event.touches[0].clientX

      const jump = slider.children[1].getBoundingClientRect().x - slider.children[0].getBoundingClientRect().x;
      let distance = (clientX - prevMousePosition)

      const lastJump = Math.trunc((jump * (-1) * (slider.children.length - getInView())))

      if (sliderButtons[0].classList.contains("active") && distance > 0) {
        distance = 0
        prevMousePosition = clientX
      } else if (sliderButtons[sliderButtons.length - 1].classList.contains("active") && distance < 0) {
        distance = 0
        prevMousePosition = clientX
      }

      slider.style.marginLeft = distance + actualPosition + "px";
    });

    window.addEventListener(up, function (event) {

      if (clicking) clicking = false

      // Lista de posiciones de las tarjetas
      const jump = slider.children[1].getBoundingClientRect().x - slider.children[0].getBoundingClientRect().x;
      const arr = Array.from({ length: slider.children.length - getInView() + 1 }, (_, i) => jump * i * -1)

      // Posicionar el slider en la posicion mas cercana
      const position = numeroMasCercano(parseFloat(slider.style.marginLeft.split("px")[0]), arr)
      slider.style.transition = 'margin-left 0.3s'
      sliderButtons[arr.indexOf(position)].click()
    });

    // Cada elemento entra o sale del click
    for (let i = 0; i < slider.children.length; i++) {
      const sld = slider.children[i];

      sld.addEventListener(start, function (event) {
        const clientX = (device == "pc") ? event.clientX : event.touches[0].clientX

        clicking = true
        prevMousePosition = clientX
        actualPosition = getPosition()

        slider.style.transition = 'none'
      });
    }
  }
}

