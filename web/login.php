<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mediasQuerys.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
     <style>
		    .swal2-popup {
    max-width: 80%; /* Ajusta este valor según sea necesario */
    width: auto !important; /* Asegúrate de que el ancho se ajuste */
}
body {
    overflow: hidden; /* Evita el desplazamiento */
}

#inscribirse
{
   background-color: #003366;
}
		</style>
  </head>
  <body>
    <!-- MENU RESPONSIVE -->
    <header
      class="w-full flex flex-col mx-auto text-white fixed duration-500 shadow-sm bg-primary-banner relative"
    >
      <div
        class="flex items-center container md:container justify-between h-14 md:h-20 mx-auto px-4"
      >
        <h1
          class="text-2xl md:text-3xl font-bold text-white flex items-center gap-3"
        >
          <img
            src="assets/iconBannerMain.png"
            class="w-8 h-10 md:w-12 md:h-14"
            alt=""
          />
          <div onclick="window.location.href = 'index.php'">
            Uber<strong class="text-2xl md:text-3xl txt-resaltado font-bold"
              >Sex</strong
            >
          </div>
        </h1>
        <nav
          class="h-14 md:h-20 md:px-3 flex justify-end items-center relative z-index-sup"
        >
          <ul class="flex gap-4 items-center" id="options-desktop">
            <li
              class="flex items-center gap-2 cursor-pointer txt-primary uppercase h-10 px-4 bg-white uppercase rounded-full font-bold text-sm hover:opacity-90"
            >
              Cuenta
              <img class="w-7 h-7" src="assets/iconPeople.png" alt="" />
            </li>
            <li
              class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm"
              id="btnLang"
            >
              <img
                src="assets/languajes/spain.svg"
                class="object-contain w-full h-full"
                alt=""
              />
              <ul class="flex flex-col gap-2 mt-2 hidden" id="languajes">
                <li
                  class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
                  id="btnLangEU"
                >
                  <img
                    src="assets/languajes/eeuu.svg"
                    class="object-contain w-full h-full"
                    alt=""
                  />
                </li>
                <li
                  class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
                  id="btnLangFR"
                >
                  <img
                    src="assets/languajes/france.svg"
                    class="object-contain w-full h-full"
                    alt=""
                  />
                </li>
                <li
                  class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
                  id="btnLangES"
                >
                  <img
                    src="assets/languajes/spain.svg"
                    class="object-contain w-full h-full"
                    alt=""
                  />
                </li>
              </ul>
            </li>
          </ul>
          <div class="flex gap-4 md:hidden">
            <button class="btnBuscadorMobile">
              <img src="assets/search-white.svg" alt="iconSearch" />
            </button>
            <button id="btn-menu-toggle" class="flex">
              <img src="assets/menu-toggle-white.svg" alt="iconMenuBurger" />
            </button>
          </div>
        </nav>
      </div>
    </header>

    <!-- BUSCADOR MODAL MOBILE -->
    <div
      id="mobileSearch"
      class="hidden top-0 left-0 w-full h-full flex flex-col bg-white fixed z-index-sup p-4"
    >
      <div class="px-4 mb-12 h-14 flex items-center border-b border-gray-50">
        <img
          alt="close"
          class="toggle-mobile-search cursor-pointer closeMobileSearch"
          width="24"
          height="24"
          src="assets/iconCloseModal.svg"
        />
        <div class="flex-grow text-center text-black">Busca</div>
      </div>
      <form class="flex flex-col flex-grow items-center" action="/search/">
        <div class="flex flex-col flex-grow gap-6 container">
          <div class="flex px-4 xs:py-2.5 rounded-2xl border border-gray-60">
            <img
              alt="search"
              width="24"
              height="24"
              src="assets/search-purple.svg"
            />
            <select
              type="text"
              placeholder="¿Qué estás buscando?"
              class="inputCustom"
            >
              <option>¿Qué estás buscando?</option>
              <option>Mujeres</option>
              <option>Hombres</option>
              <option>Trans</option>
            </select>
          </div>

          <div
            class="flex px-4 xs:py-2.5 mb-2 rounded-2xl border border-gray-60 items-center"
          >
            <img
              alt="search"
              width="24"
              height="24"
              src="assets/location-purple.svg"
            />
            <select
              type="text"
              name="geo-location-input"
              placeholder="¿Ciudad?"
              class="inputCustom"
            >
              <option value="0">¿Donde?</option>
              <option value="1">España</option>
              <option value="2">Francia</option>
              <option value="3">Italia</option>
            </select>
            <div id="mobileLocationClear" class="hidden">
              <div class="bg-gray-40 flex rounded-full items-center">
                <img
                  alt="close"
                  id="clearMobileSearchLocation"
                  class="cursor-pointer p-1 w-7 h-7"
                  width="20"
                  height="20"
                  src="assets/iconCloseModal.svg"
                />
              </div>
            </div>
          </div>
          <div id="geo-results-mobile"></div>
          <input type="hidden" name="location-id" value="0" />

          <div class="flex flex-wrap justify-center gap-4">
            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escorts en Buenos Aires"
            >
              Madrid
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escort Capital Federal"
            >
              Sevilla
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escorts Córdoba"
            >
              Bilbao
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escort en Rosario"
            >
              Barcelona
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escort en Mar del Plata"
            >
              Valencia
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Putas San Miguel de Tucumán"
            >
              Zaragoza
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Putas en Salta"
            >
              Toledo
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escorts en Santa Fe"
            >
              Murcia
            </a>

            <a
              data-test="primary-cities"
              class="px-4 py-2 bg-gray-40 text-purple-90 rounded-lg hover:opacity-50 shadow-sm hover:shadow-none shadow-neutral-20"
              title="Escort Corrientes"
            >
              Girona
            </a>
          </div>
        </div>

        <div
          class="py-4 px-8 flex justify-between items-center border-t border-gray-50 shadow-[2px_2px_8px_rgba(0,0,0,0.25)] w-full"
        >
          <button
            id="mobileSearchResetFilter"
            type="button"
            class="cursor-pointer underline text-black py-4 w-1/2"
          >
            Reset
          </button>
          <button
            class="rounded-2xl flex items-center justify-center bg-red-200 text-black px-10 py-4 w-1/2"
            type="submit"
          >
            <img
              alt="search"
              width="24"
              height="24"
              class="mr-2"
              src="assets/search-purple.svg"
            />
            Buscar
          </button>
        </div>
      </form>
    </div>

    <div
      id="menu-responsive"
      class="flex-col bg-menu-responsive hidden mt-[56px] h-[calc(100vh-56px)] absolute top-0 left-0 flex w-full z-index-sup"
    >
      <ul class="flex-col bg-white gap-4 p-4 items-center">
        <li
          class="btn bg-primary-banner opacity-80 w-full cursor-pointer text-white uppercase font-bold text-sm w100 mb-4 text-center py-4 rounded-lg"
        >
          <a href="#">Iniciar Sesión</a>
        </li>
        <li
          class="cursor-pointer bg-primary-banner text-white rounded-full uppercase font-bold text-sm py-2 px-4 hover:opacity-80 text-center py-4 rounded-lg"
        >
          <a href="#">Publicar Anuncio</a>
        </li>
      </ul>
    </div>

    <main class="relative mx-auto w-full px-4 mt-8">
      <section
        class="grid grid-cols-1 py-8 md:py-0 md:grid-cols-2 pt-18 md:pt-20 gap-4"
      >
        <div class="container flex flex-col items-center mx-auto">
          <h3 class="mb-6 text-center font-medium text-2xl">Iniciar sesion</h3>
          <form id="kt_sign_in_form" class="w-96 max-w-full" action="login2.php" method="POST">
            <input
              type="hidden"
              name="redirectURL"
              value="/private/my-ads/overview/active/"
            />
            <div class="mb-4">
              <input
                class="inputCustom"
                type="email"
                required=""
                id="email"
                name="email"
                placeholder="Correo electrónico"
              />
            </div>
            <div class="mb-4">
              <input
                class="inputCustom"
                type="password"
                required=""
                id="password"
                name="password"
                placeholder="Contraseña"
              />
            </div>
            <div>
              <input
               id="kt_sign_in_submit"
                class="tailwind-input w-full border-0 cursor-pointer py-4 bg-red hover:opacity-80 uppercase text-white font-bold rounded-full transition-all duration-300 ease-in-out"
                type="submit"
                value="Iniciar Sesión"
              />
            </div>
          </form>
          <p class="my-4 text-center">
            <a class="underline" href="#">¿Has olvidado tu contraseña?</a>
          </p>
          <hr class="my-4 text-gray-60 w-80 max-w-[90%] md:w-136" />
          <div class="w-96 max-w-full mt-4">
            <p class="text-center">¿Aún no tiene cuenta?</p>
            <button
            id="inscribirse"
            onclick="location.href='pages/select-registro.php'"
              class="w-full border-0 cursor-pointer mt-4 py-4 hover:bg-gray-400 uppercase text-purple-100 font-bold rounded-full transition-all duration-300 ease-in-out"
            >
              Inscribirse
            </button>
          </div>
        </div>
        <div class="hidden md:flex">
          <img src="assets/banner1.png" alt="" />
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <footer
      class="bg-[#152129] text-white p-8 flex flex-col gap-12 relative bottom-0 w-full"
    >
      <div>
        <div class="flex flex-col gap-8 max-w-7xl mx-auto px-10">
          <div
            class="flex flex-col lg:flex-row justify-between gap-12 py-8 border-b border-b-gray-600"
          >
            <div class="flex flex-col gap-8">
              <div class="flex items-center gap-4">
                <img class="h-20" src="assets/iconBannerMain.png" alt="" />
                <h1 class="font-bold text-4xl text-white">
                  Uber<strong class="text-4xl font-bold txt-resaltado"
                    >Sex</strong
                  >
                </h1>
              </div>
            </div>
            <div class="flex">
              <div
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 lg:py-0 w-full"
              >
                <ul class="flex flex-col gap-2">
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      class="hover:border-b hover:border-white border-b border-transparent"
                      >Quienes Somos</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      class="hover:border-b hover:border-white border-b border-transparent"
                      >Preguntas Frecuentes</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      class="hover:border-b hover:border-white border-b border-transparent"
                      >Contactanos</a
                    >
                  </li>
                </ul>
                <ul class="flex flex-col gap-2">
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      class="hover:border-b hover:border-white border-b border-transparent"
                      >Se parte de nuestros Scorts</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      class="hover:border-b hover:border-white border-b border-transparent"
                      >Términos & Condiciones</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      class="hover:border-b hover:border-white border-b border-transparent"
                      >Politicas de Privacidad</a
                    >
                  </li>
                </ul>
                <ul
                  class="flex flex-col justify-between gap-4 col-span-2 sm:col-span-1"
                >
                  <li class="text-nowrap text-sm sm:text-base">
                    Eres Scorts? Descarga nuestra app
                  </li>
                  <button
                    class="flex w-full md:w-full items-center justify-between rounded-lg bg-violet p-2 text-sm text-white shadow-sm"
                  >
                    <div class="flex w-full gap-4 items-center font-semibold">
                      <img src="assets/iconAndroid.png" alt="" srcset="" />
                      Android APP
                    </div>
                    <div class="w-max w-full px-2">
                      <img
                        class="w-full"
                        src="assets/arrow-top-right-white.svg"
                        alt=""
                        srcset=""
                      />
                    </div>
                  </button>
                </ul>
              </div>
            </div>
          </div>
          <div class="flex gap-2 flex-col justify-between lg:flex-row">
            <span class="text-xs text-white"
              >© Copyright 2025 -Todos los derechos reservados</span
            >
            <span class="text-xs text-white"
              >Seleccion VIP de scorts 100% verificadas y seguras presente en
              más de 15 paises</span
            >
          </div>
        </div>
      </div>
    </footer>

    <script src="logica/controllerModalBuscador.js"></script>
    <script src="switchLanguaje.js"></script>
    <script src="index.js"></script>
    
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('kt_sign_in_submit').addEventListener('click', function(e) {
    e.preventDefault(); // Evita el comportamiento por defecto del botón

    const form = document.getElementById('kt_sign_in_form');
    const formData = new FormData(form);

    // Envío de datos a través de fetch
    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Suponiendo que el servidor responde en JSON
    .then(data => {
        if (data.success) {
            // Muestra el mensaje de éxito
            Swal.fire({
                text: "Te has logueado correctamente!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, lo tengo!",
                customClass: { confirmButton: "btn btn-primary" },
                allowOutsideClick: false,  // Desactiva clicks fuera del modal
                backdrop: true,  // Añade un fondo oscuro
                heightAuto: false  // Evita que ajuste automáticamente la altura
            }).then(() => {
              if(data.prof){
                window.location.href = 'pages/profesional-perfil.php?'+'pr='+data.id;
              }
              else
              {
                window.location.href = 'index.php?'+'h='+data.hash;
              }
            });
        } else {
            // Muestra el mensaje de error
           Swal.fire({
                text: "Los datos de acceso son incorrectos, intente de nuevo.",
                icon: "error",
                width: '50%',
                buttonsStyling: false,
                confirmButtonText: "Ok, lo tengo!",
                customClass: { confirmButton: "btn btn-primary" },
                allowOutsideClick: false,  // Desactiva clicks fuera del modal
                backdrop: true,  // Añade un fondo oscuro
                heightAuto: false  // Evita que ajuste automáticamente la altura
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            text: "Ocurrió un error, intenta de nuevo.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, lo tengo!",
            allowOutsideClick: false,  // Desactiva clicks fuera del modal
            backdrop: true,  // Añade un fondo oscuro
            heightAuto: false  // Evita que ajuste automáticamente la altura
        });
    });
});
</script>
  </body>
</html>
