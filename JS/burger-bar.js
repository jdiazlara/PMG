const short_menu = document.querySelector(".container-short_menu");
const button = document.querySelector(".bar");
const main = document.querySelector(".all");


button.addEventListener("click", show_menu);
main.addEventListener("click", hidden_menu );

function show_menu(){
    short_menu.classList.toggle("short_menu-open");
    main.classList.toggle("container-main-active");
}

function hidden_menu(){
    main.classList.remove("container-main-active");
    short_menu.classList.remove("short_menu-open");
}
