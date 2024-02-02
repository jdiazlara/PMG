let btn = document.getElementById("btn");
let container_data = document.querySelector(".confirm-data");
let btn_yes = document.querySelector("#yes");
let btn_not = document.querySelector("#not");
 
btn.addEventListener("click", addClass);
btn_yes.addEventListener("click", removeClass)
btn_not.addEventListener("click", removeClass)

function removeClass(){
    container_data.classList.remove("confirm-data-active");
}

function addClass(){
    container_data.classList.add("confirm-data-active");
}