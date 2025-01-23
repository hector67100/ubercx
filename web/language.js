const languajes = document.getElementById("languajes");
const btnLang = document.getElementById("btnLang");

let translations = {};  // Variable para almacenar las traducciones

// Función para cambiar el ícono de la bandera
function updateLanguageIcon(lang) {
  const icon = document.getElementById("btnLang").children[0]; // Obtener el ícono de la bandera
  if (lang === 'en') {
    icon.src = "./assets/languajes/eeuu.svg";  // Bandera de EE. UU.
  } else if (lang === 'fr') {
    icon.src = "./assets/languajes/france.svg";  // Bandera de Francia
  } else if (lang === 'es') {
    icon.src = "./assets/languajes/spain.svg";  // Bandera de España
  }
}

// Cargar el archivo JSON con las traducciones
function loadTranslations() {
  fetch('translations.json')  // Ruta correcta del archivo JSON
    .then(response => response.json())
    .then(data => {
      translations = data;  // Guardar las traducciones en la variable
      // Cargar el idioma seleccionado previamente desde localStorage
      const savedLanguage = localStorage.getItem('selectedLanguage') || 'es'; // Por defecto 'es' (español)
      console.log("Idioma recuperado: ", savedLanguage);  // Verificar el idioma recuperado
      changeLanguage(savedLanguage);
      updateLanguageIcon(savedLanguage);  // Actualizar el ícono de la bandera
    })
    .catch(error => console.error("Error al cargar las traducciones:", error));
}

// Llamar a la función para cargar las traducciones al cargar la página
window.onload = loadTranslations;

// Función para traducir el contenido de la página
function changeLanguage(lang) {
  if (!translations[lang]) return;  // Si no existen traducciones para el idioma

  // Obtener todos los elementos con el atributo "data-translate"
  const elements = document.querySelectorAll('[data-translate]');
  
  elements.forEach(element => {
    // Verificar si ya existe el contenido original (almacenado en un atributo data-original-content)
    let originalContent = element.getAttribute('data-original-content');
    
    // Si no existe, almacenamos el contenido original
    if (!originalContent) {
      originalContent = element.innerHTML;
      element.setAttribute('data-original-content', originalContent); // Guardamos el contenido original
    }

    // Copiar el contenido para evitar que se pierdan cambios previos
    let htmlContent = originalContent;

    // Buscar y traducir las partes del texto que necesitan traducción
    Object.keys(translations[lang]).forEach(originalText => {
      // Reemplazar el texto original con la traducción correspondiente
      const regex = new RegExp(originalText, 'g');  // Expresión regular para encontrar todas las ocurrencias
      htmlContent = htmlContent.replace(regex, translations[lang][originalText]);
    });

    // Asignar el contenido traducido al elemento
    element.innerHTML = htmlContent;
  });

  // Guardar el idioma seleccionado en localStorage
  localStorage.setItem('selectedLanguage', lang);
  console.log("Idioma guardado: ", lang);  // Verificar el idioma guardado
}

// Manejadores de clic para cambiar el idioma
btnLang.addEventListener("click", () => {
  languajes.classList.toggle("hidden");
});

document.getElementById("btnLangEU").addEventListener("click", () => {
  changeLanguage('en'); // Cambiar al idioma inglés
  updateLanguageIcon('en'); // Cambiar el ícono a la bandera de EE. UU.
});

document.getElementById("btnLangFR").addEventListener("click", () => {
  changeLanguage('fr'); // Cambiar al idioma francés
  updateLanguageIcon('fr'); // Cambiar el ícono a la bandera de Francia
});

document.getElementById("btnLangES").addEventListener("click", () => {
  changeLanguage('es'); // Cambiar al idioma español
  updateLanguageIcon('es'); // Cambiar el ícono a la bandera de España
});