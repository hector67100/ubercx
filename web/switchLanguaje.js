const btnLangFR = document.getElementById("btnLangFR");
const btnLangEU = document.getElementById("btnLangEU");
const btnLangES = document.getElementById("btnLangES");
const btnLang = document.getElementById("btnLang");
const languajes = document.getElementById("languajes");
const pathname = window.location.pathname;
let lang = pathname.split("/")[2];

btnLang.addEventListener("click", () => {
    languajes.classList.toggle("hidden");
});

btnLangEU.addEventListener("click", () => {
  if (lang === "login.html") {
    return btnLang.children[0].src = "../assets/languajes/eeuu.svg";
  }
  if(lang === "register.html"){
    return btnLang.children[0].src = "../assets/languajes/eeuu.svg";
  }
  btnLang.children[0].src = "../assets/languajes/eeuu.svg";
});
btnLangFR.addEventListener("click", () => {
  if (lang === "login.html") {
    return btnLang.children[0].src = "../assets/languajes/france.svg";
  }
  if(lang === "register.html"){
    return btnLang.children[0].src = "../assets/languajes/france.svg";
  }
  btnLang.children[0].src = "../assets/languajes/france.svg";
});
btnLangES.addEventListener("click", () => {
  if (lang === "login.html") {
    return btnLang.children[0].src = "../assets/languajes/spain.svg";
  }
  if(lang === "register.html"){
    return btnLang.children[0].src = "../assets/languajes/spain.svg";
  }
  btnLang.children[0].src = "../assets/languajes/spain.svg";
});
