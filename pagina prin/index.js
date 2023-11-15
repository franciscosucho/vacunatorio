var ver_vacunas = document.querySelector(".ver_vacunas");
var ver_info = document.querySelector(".ver_info");
var sec_info = document.querySelector(".sec_info");
var ver_img = document.querySelector(".ver_img");
var sec_img = document.querySelector(".sec_img");
var ver_img = document.querySelector(".ver_img");
var sec_img = document.querySelector(".sec_img");
var ver_horarios = document.querySelector(".ver_horarios");
var sec_horarios = document.querySelector(".sec_horarios");
var main = document.querySelector(".main");
var btn_menu = document.querySelector(".btn_menu");
var btn_close = document.querySelector(".btn_close");
var cont_menu = document.querySelector(".cont_menu");
var sec_prin = document.querySelector(".sec_prin");
var img_prin = document.getElementById("img_main");
const ver_turno = document.getElementById("ver_turnos");
const modificar_turno = document.getElementById("modificar_turno");
const cont_modificar_turno = document.getElementById("cont_modificar_turno");
const btn_enviar = document.querySelector(".btn_enviar");
modificar_turno.addEventListener("click", () => {

    sec_prin.classList.add("ocultar")
    img_prin.classList.add("ocultar")
    cont_modificar_turno.classList.toggle("active")
})

btn_menu.addEventListener("click", () => {
    cont_menu.classList.toggle("active")
})

btn_close.addEventListener("click", () => {
    cont_menu.classList.toggle("active")
})

img_prin.addEventListener("click", () => {
    sec_info.classList.toggle('active');
    sec_img.classList.remove('active')
    sec_horarios.classList.remove("active")
    sec_prin.classList.remove("ocultar")
})
ver_info.addEventListener("click", () => {
    sec_info.classList.toggle('active');

    sec_img.classList.remove('active')
    sec_horarios.classList.remove("active")
    sec_prin.classList.add("ocultar")
})

ver_img.addEventListener("click", () => {
    sec_img.classList.toggle('active')
    sec_info.classList.remove('active');
    sec_horarios.classList.remove("active")
    sec_prin.classList.add("ocultar")
})
ver_horarios.addEventListener("click", () => {
    sec_horarios.classList.toggle("active")
    sec_img.classList.remove('active')
    sec_info.classList.remove('active');
    sec_prin.classList.add("ocultar")
})

