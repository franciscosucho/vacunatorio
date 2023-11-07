var ver_vacunas = document.querySelector(".ver_vacunas");
var ver_info = document.querySelector(".ver_info");
var sec_vacunas = document.querySelector(".sec_vacunas");
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



btn_menu.addEventListener("click",() => {
    cont_menu.classList.toggle("active")


})

btn_close.addEventListener("click", () => {
    cont_menu.classList.toggle("active")


})



ver_vacunas.addEventListener("click", () => {
    sec_vacunas.classList.toggle("active")
    sec_info.classList.remove("active")
    sec_img.classList.remove('active')
    sec_horarios.classList.remove("active")

})

ver_info.addEventListener("click", () => {
    sec_info.classList.toggle('active');
    sec_vacunas.classList.remove("active")
    sec_img.classList.remove('active')
    sec_horarios.classList.remove("active")

})

ver_img.addEventListener("click", () => {
    sec_img.classList.toggle('active')
    sec_vacunas.classList.remove("active")
    sec_info.classList.remove('active');
    sec_horarios.classList.remove("active")

})
ver_horarios.addEventListener("click", () => {

    sec_horarios.classList.toggle("active")
    sec_img.classList.remove('active')
    sec_vacunas.classList.remove("active")
    sec_info.classList.remove('active');

})

