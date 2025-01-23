<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mediasQuerys.css" />
    <script src="https://cdn.tailwindcss.com"></script>
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
            <button id="btn-menu-toggle" class="flex">
              <img src="assets/menu-toggle-white.svg" alt="iconMenuBurger" />
            </button>
          </div>
        </nav>
      </div>
    </header>

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

    <main class="relative mx-auto w-full">
      <div
        class="flex-grow columns-1 lg:columns-2 flex lg:overflow-hidden containerMainRegister"
      >
        <div
          class="hidden w-full justify-end lg:flex"
        >
          <div
            class="mt-14 lg:mt-20 flex-1 md:max-w-3xl lg:max-w-[496px] xl:max-w-[600px] flex px-3 lg:px-4 flex-col"
          >
            <div class="flex-1 flex">
              <div class="flex items-center justify-center object-contain">
                <img src="assets/left-column.webp" alt="left-panel-img" />
              </div>
            </div>

            <div class="flex items-start flex-col gap-y-2 pb-4">
              <p class="text-base">
                © Copyright 2024 - UberSex
              </p>
            </div>
          </div>
        </div>

        <div
          class="w-full h-full relative flex flex-col lg:justify-start bg-white"
        >
          <div
            class="mt-14 lg:mb-0 mb-24 lg:mt-20 flex-1 flex flex-col lg:overflow-y-auto"
          >
            <div
              class="flex justify-center items-center lg:hidden px-3 lg:px-4"
            ></div>

            <div
              class="rounded-t-3xl flex-1 flex flex-col bg-white items-center lg:items-start"
            >
              <div
                class="w-full h-full md:max-w-3xl lg:max-w-[496px] xl:max-w-[600px] flex px-3 lg:px-4"
              >
                <div
                  class="fixed top-0 flex flex-col self-center gap-y-2 m-8 z-50"
                ></div>

                <div class="flex-grow text-purple-100 p-6 m-auto">
                  <form
                    id="kt_register_form"
                    action="register2.php" method="POST"
                    class="flex-1 flex flex-col"
                  >
                    <h3 class="text-2xl lg:text-4xl text-center font-medium">
                      Crear una cuenta
                    </h3>
                    <p
                      class="hidden lg:block text-2xl text-center font-medium mt-8"
                    >
                      Introduzca un correo electrónico válido para iniciar el
                      proceso
                    </p>

                    <input
                      type="email"
                      required=""
                      name="email"
                      class="flex bg-transparent mt-8 py-2 px-4 text-black sm:text-sm sm:leading-6 border rounded-lg"
                      placeholder="you@example.com"
                    />

                    <input
                      type="password"
                      name="password"
                      id="password"
                      required=""
                      onkeyup="validatePassword()"
                      class="flex bg-transparent mt-4 py-2 px-4 text-black sm:text-sm sm:leading-6 border rounded-lg"
                      placeholder="************"
                    />

                    <div
                      class="flex flex-col lg:flex-row lg:gap-2 w-full mt-8 lg:mt-10 py-4 px-4 bg-gray-40 rounded-lg text-black text-xs"
                    >
                      <div class="lg:flex-[50%]">
                        <div class="flex items-center gap-2 mb-2">
                          <img
                            id="pwd_constraint_length"
                            class="w-4 h-4"
                            alt="Mínimo 8 caracteres alfanuméricos"
                            src="assets/check-caption.svg"
                          />
                          Mínimo 8 caracteres alfanuméricos
                        </div>
                        <div class="flex items-center gap-2 mb-2 lg:mb-0">
                          <img
                            id="pwd_constraint_uppercase"
                            class="w-4 h-4"
                            alt="Al menos un caracter en mayúscula"
                            src="assets/check-caption.svg"
                          />
                          Al menos un caracter en mayúscula
                        </div>
                      </div>
                      <div class="lg:flex-[50%]">
                        <div class="flex items-center gap-2 mb-2">
                          <img
                            id="pwd_constraint_lowercase"
                            class="w-4 h-4"
                            alt="Al menos un caracter en minúscula"
                            src="assets/check-caption.svg"
                          />
                          Al menos un caracter en minúscula
                        </div>
                        <div class="flex items-center gap-2">
                          <img
                            id="pwd_constraint_number"
                            class="w-4 h-4"
                            alt="Al menos un número"
                            src="assets/check-caption.svg"
                          />
                          Al menos un número
                        </div>
                      </div>
                    </div>

                    <div class="flex justify-center mt-8 lg:mt-10">
                      <input
                        id="termsAndConditions"
                        required=""
                        name="termsAndConditions"
                        type="checkbox"
                        class="tailwind-input h-6 w-6 rounded border-gray-60 focus:ring-0 focus:ring-transparent cursor-pointer"
                        value="true"
                      />
                      <div class="ml-1 leading-6">
                        <label
                          for="termsAndConditions"
                          class="font-medium text-black text-center select-none cursor-pointer"
                        >
                          Acepto
                          <span class="underline">T&amp;C</span>
                          y
                          <span class="underline">Política de privacidad</span>
                        </label>
                      </div>
                    </div>

                    <div class="hidden lg:block mt-10">
                      <button
                      id="kt_register_submit"
                        type="submit"
                        class="w-full h-14 rounded-2xl uppercase text-white bg-red disabled:opacity-50 enabled:hover:bg-purple-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100 shadow-sm font-bold"
                      >
                        Cree
                      </button>

                      <div class="mt-10 text-black flex justify-center">
                        <a class="underline" href="login.php"
                          >¿Ya tiene una cuenta? Conéctese</a
                        >
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div
            id="two-column-footer"
            class="flex lg:hidden fixed w-full bottom-0 drop-shadow-md-reverse z-40 bg-white justify-center lg:justify-start"
          >
            <div
              class="w-full h-full md:max-w-3xl lg:max-w-[496px] xl:max-w-[600px] flex px-3 lg:px-4"
            >
              <div class="h-24 flex-grow flex items-center">
                <button
                  type="submit"
                  class="lg:hidden w-full h-14 rounded-2xl uppercase text-white bg-red disabled:opacity-50 enabled:hover:bg-purple-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100 shadow-sm font-bold"
                >
                  Cree
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
   <script>
    // Validaciones de la contraseña
    function validatePassword() {
        const password = document.getElementById("password").value;

        // Validaciones de la contraseña
        const minLength = password.length >= 8;
        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const hasNumber = /\d/.test(password);

        // Actualizar imágenes y mostrar resultados
        document.getElementById("pwd_constraint_length").src = minLength ? "assets/check-caption.svg" : "img/close.svg";
        document.getElementById("pwd_constraint_uppercase").src = hasUpperCase ? "assets/check-caption.svg" : "img/close.svg";
        document.getElementById("pwd_constraint_lowercase").src = hasLowerCase ? "assets/check-caption.svg" : "img/close.svg";
        document.getElementById("pwd_constraint_number").src = hasNumber ? "assets/check-caption.svg" : "img/close.svg";

        // Habilitar o deshabilitar el botón de submit según las validaciones
        document.getElementById("kt_register_submit").disabled = !(minLength && hasUpperCase && hasLowerCase && hasNumber);
    }

  document.getElementById("kt_register_form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío tradicional del formulario

    // Obtener los valores del formulario
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;

    // Construir el objeto de datos
    const data = {
        email: email,
        password: password
    };

    // Enviar los datos al servidor en formato JSON usando Fetch
    fetch('register2.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data) // Enviar los datos como JSON
    })
    .then(response => response.json()) // Procesar la respuesta JSON
    .then(data => {
        if (data.success) {
            // Si el registro fue exitoso, mostrar mensaje o redirigir
            alert('Registro exitoso');
            window.location.href = "login.php"; // Redirige al usuario
        } else {
            // Si hubo errores, mostrar el mensaje de error
            alert(data.error); // Muestra el mensaje de error que viene del servidor
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un problema al registrar el usuario');
    });
});
</script>

    <script src="logica/controllerModalBuscador.js"></script>
    <script src="switchLanguaje.js"></script>
    <script src="index.js"></script>
  </body>
</html>
