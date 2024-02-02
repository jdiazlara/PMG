let ubicacionPrincipal = window.pageYOffset
let header = document.querySelector(".header-secundary")
let headerTop = 0
console.log(headerTop)

window.addEventListener("scroll", function(){
    let ubicacionActual = window.pageYOffset

    if (ubicacionActual >= header.offsetTop){
        headerTop = 90
    }
    console.log(headerTop)

    if (ubicacionActual >= headerTop) {
        header.classList.toggle("header-secundary-active")
        console.log("HeaderTop: " + headerTop )
        console.log("UbicacionActual: " + ubicacionActual)
    }
})