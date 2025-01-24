<?php
include_once('php_lib/config.ini.php');
include('php_lib/conv.php');
include('logica/profesionalController.php');
session_start();
$hash=$_REQUEST['h'];      
      $link =  mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);
    if (!$link) {
        trigger_error('Error al conectar al servidor mysql: ');
    }
    // Seleccionar la base de datos activa
    $db_selected = mysqli_select_db($link,BASE_DATOS);
    if (!$db_selected) {
        trigger_error ('Error al conectar a la base de datos: ');
    }
	mysqli_set_charset($link,"utf8");
	
	$query = "SELECT * FROM users WHERE password = '$hash'";
             $result = mysqli_query($link,$query);
             $numero=1;
             while ($row = mysqli_fetch_assoc($result)) {
                   
            		$cedula = $row["email"];
            	
              }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mediasQuerys.css" />
    <script src="https://cdn.tailwindcss.com"></script>
   <style>
   li:hover .submenu,
li.group:hover .submenu {
  display: block; /* Mostrar el submenú cuando el mouse pasa sobre el li */
}

.submenu {
  display: none; /* Inicialmente oculto */
}

.submenu a {
  text-decoration: none;
  color: inherit;
}

.submenu a:hover {
  background-color: #f0f0f0;
}

/* Asegura que el submenú se quede visible cuando el mouse está sobre el li o el submenú */
li.group:hover .submenu {
  display: block;
}
   </style>
  </head>
  <body>
    <!-- MENU RESPONSIVE -->
 
    <header
      class="w-full flex flex-col mx-auto text-white fixed duration-500 shadow-sm bg-primary-banner relative"
    >
      <nav
        class="px-4 h-14 container md:h-20 md:container md:px-3 flex justify-end items-center mx-auto relative z-index-sup"
      >
        <ul class="flex gap-4 items-center" id="options-desktop">
          <li
              class="flex items-center gap-2 cursor-pointer txt-primary uppercase h-10 px-4 bg-white rounded-full font-bold text-sm hover:opacity-90 relative group"
              onclick="window.location.href = '<?php echo isset($_SESSION['profesional']) && !empty($_SESSION['profesional']) ? $root.'pages/profesional-perfil.php?pr='.$_SESSION['profesional']['id']: 'login.php'; ?>'"
            >
              <?php echo isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"]) ? substr($_SESSION["profesional"]["email"], 0, 6) : 'Cuenta'; ?>
              <img class="w-7 h-7" src="./assets/iconPeople.png" alt="" />
              
              <!-- Submenú de Cerrar Sesión -->
              <?php if (isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"])): ?>
                <div class="submenu absolute top-full left-0 mt-2 hidden bg-white shadow-lg rounded-lg p-2" style="margin-top: 1px;">
                  <?php  if(isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"])):?>
                  <a href="pages/profesional-perfil.php?pr=<?php echo $_SESSION["profesional"]["id"];?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mi perfil</a>
                  <?php endif; ?>
                  <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Cerrar sesión</a>
                </div>
              <?php endif; ?>
            </li>
           <li
      class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm"
      id="btnLang"
    >
      <img
        src="./assets/languajes/spain.svg"
        class="object-contain w-full h-full"
        alt="Español"
      />
      <!-- Menú de idiomas oculto inicialmente -->
      <ul class="flex flex-col gap-2 mt-2 hidden" id="languajes">
        <li
          class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
          id="btnLangEU"
        >
          <img
            src="./assets/languajes/eeuu.svg"
            class="object-contain w-full h-full"
            alt="Inglés"
          />
        </li>
        <li
          class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
          id="btnLangFR"
        >
          <img
            src="./assets/languajes/france.svg"
            class="object-contain w-full h-full"
            alt="Francés"
          />
        </li>
        <li
          class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
          id="btnLangES"
        >
          <img
            src="./assets/languajes/spain.svg"
            class="object-contain w-full h-full"
            alt="Español"
          />
        </li>
      </ul>
    </li>
        </ul>
        <div class="flex gap-4 md:hidden">
          <button class="btnBuscadorMobile">
            <img src="./assets/search-white.svg" alt="iconSearch" />
          </button>
          <button id="btn-menu-toggle" class="flex">
            <img src="./assets/menu-toggle-white.svg" alt="iconMenuBurger" />
          </button>
        </div>
      </nav>
      <div
        class="flex justify-start gap-2 mx-auto max-w-screen top-4 bg-primary-banner -translate-y-16"
      >
        <div class="w-full flex justify-center">
          <div
            id="text-banner"
            class="flex flex-col justify-start p-4 gap-12 items-center text-center"
          >
            <div class="flex items-center gap-4 mt-12">
              <img
                class="iconBannerMain"
                src="./assets/iconBannerMain.png"
                alt=""
              />
              <h1 class="text-4xl md:text-6xl font-bold text-white">
                Uber<strong class="text-4xl md:text-6xl txt-resaltado font-bold"
                  >Sex</strong
                >
              </h1>
            </div>
            <p data-translate class="text-3xl max-w-md text-white">
              Busca entre nuestra selección
              <strong class="txt-resaltado">VIP</strong> de Servicios Escorts,
              Servicios para adultos & Masajes Sensuales.
            </p>
            <span 
              class="font-bold flex gap-2 text-sm md:text-lg items-center text-white"
              ><img
                class="w-6 h-6"
                src="./assets/iconVerify.png"
                alt=""
              /><p class="text-white" data-translate>PERFILES VERIFICADOS - 100% SEGURO</p></span
            >
            <div
              class="flex gap-4 bg-white hidden md:flex items-center p-1 rounded-full h-14"
              id="buscador"
            >
              <select
                type="text"
                placeholder="¿Qué estás buscando?"
                class="inputCustom"
                id="estasBuscando"
              >
                <option data-translate>¿Qué estás buscando?</option>
                <?php
            		$query = "SELECT * FROM detalles WHERE clave = '2' && visible = '1'";
            		$result = mysqli_query($link,$query);
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $idus = $row["id"];
                        $descripcion = $row["descripcion"];
                        echo'<option value='.$idus.' style="text-transform: capitalize;">'.$descripcion.'</option>';
                    }
                                    
                ?>
                
              </select>
              <select
                  type="text"
                  name="geo-location-input"
                  placeholder="¿Ciudad?"
                  class="inputCustom"
                  id="paisSelect"
                  onchange="loadCities()"
                    oninput="doSomething()"
                  
                  >
                  <option value="0" data-translate>¿Dónde?</option>
                  <?php
                    $query2 = "SELECT * FROM provincia WHERE status = '1'";
                    $result2 = mysqli_query($link, $query2);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $idus2 = $row2["id"];
                        $descripcion2 = $row2["name"];
                        echo '<option value="' . $idus2 . '" style="text-transform: capitalize;">' . $descripcion2 . '</option>';
                    }
                  ?>
                </select>
              <select
                  type="text"
                  placeholder="¿Qué estás buscando?"
                  class="inputCustom hidden"
                  id="ciudadSelect">
                  <option value="0" data-translate>¿Ciudad?</option>
                </select>
              <button
                id="btnBuscarBuscador"
                class="w-full border-0 cursor-pointer h-full bg-primary-banner hover:bg-red-700 uppercase text-purple-100 font-bold rounded-full transition-all duration-300 ease-in-out" onclick="redirigir(19)"
              >
                Buscar
              </button>
            </div>
            <div class="hidden btnBuscadorMobile" id="btnBuscadorMobile">
              <button class="rounded-full py-2 px-8 bg-red font-semibold">
                Escorts
              </button>
            </div>
          </div>
          <div id="img-banner">
            <img src="./assets/banner1.png" alt="" />
          </div>
        </div>
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
          src="./assets/iconCloseModal.svg"
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
              src="./assets/search-purple.svg"
            />
            <select
              type="text"
              placeholder="¿Qué estás buscando?"
              class="inputCustom"
              id="estasBuscandoMobile"
            >
              <option data-translate>¿Qué estás buscando?</option>
              <?php
            		$query = "SELECT * FROM detalles WHERE clave = '2' && visible = '1'";
            		$result = mysqli_query($link,$query);
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $idus = $row["id"];
                        $descripcion = $row["descripcion"];
                        echo'<option value='.$idus.' style="text-transform: capitalize;">'.$descripcion.'</option>';
                    }
                                    
                ?>
            </select>
          </div>

          <div
            class="flex px-4 xs:py-2.5 mb-2 rounded-2xl border border-gray-60 items-center"
          >
            <img
              alt="search"
              width="24"
              height="24"
              src="./assets/location-purple.svg"
            />
            <select
              type="text"
              id="provinciaSelect2"
              name="geo-location-input"
              placeholder="¿Ciudad?"
              class="inputCustom"
              onchange="loadCities2()" 
            >
              <option value="0" data-translate>¿Donde?</option>
              <?php
                    $query2 = "SELECT * FROM provincia WHERE status = '1'";
                    $result2 = mysqli_query($link, $query2);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $idus2 = $row2["id"];
                        $descripcion2 = $row2["name"];
                        echo '<option value="' . $idus2 . '" style="text-transform: capitalize;">' . $descripcion2 . '</option>';
                    }
                  ?>
            </select>
            <div id="mobileLocationClear" class="hidden">
              <div class="bg-gray-40 flex rounded-full items-center">
                <img
                  alt="close"
                  id="clearMobileSearchLocation"
                  class="cursor-pointer p-1 w-7 h-7"
                  width="20"
                  height="20"
                  src="./assets/iconCloseModal.svg"
                />
              </div>
            </div>
          </div>
          <div id="geo-results-mobile"></div>
          <input type="hidden" name="location-id" value="0" />

          <div id="ciudadesContainer"></div>
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
              src="./assets/search-purple.svg"
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
          <a href="login.php">Iniciar Sesión</a>
        </li>
        <li
          onclick="window.location.href = 'login.php'"
          class="cursor-pointer bg-primary-banner text-white rounded-full uppercase font-bold text-sm py-2 px-4 hover:opacity-80 text-center py-4 rounded-lg"
        >
          <a data-translate href="#">Publicar Anuncio</a>
        </li>
      </ul>
    </div>

    <main
      class="relative -translate-y-16 bottom-0 bg-white w-full py-2 mb-4 flex flex-col justify-center items-center"
    >
      <section class="max-w-7xl">
        <h2 
          class="flex justify-center pl-4 py-6 items-center gap-4 font-semibold text-gray text-3xl"
        >
          <img class="w-12 h-14" src="./assets/iconWorld.png" alt="" /><p data-translate>Ciudades más Buscadas</p>
        </h2>
        <!-- CARDS -->
        <div
          class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12 md:container mx-auto p-4"
        >
            
         <?php
         
         $query = "SELECT * FROM tags";
    		$result = mysqli_query($link,$query);
    		$numero=1;
            while ($row = mysqli_fetch_assoc($result)) {
                $idus = $row["id"];
                $nombres = $row["name"];
                $imageName = $row['image'];
             
                // Generar la ruta completa a la imagen
                $imagePath = '../ebook/uploads/tags/' . $imageName;
                echo'<div
            class="relative rounded-xl w-full cursor-pointer"
            onclick="redirigir('.$idus.')"
          >
            <img
              class="relative object-contain w-full" style="border-radius: 0.75rem;width: 358px !important;height: 184px !important;object-fit: cover;"
              src="' . $imagePath . '"
              alt=""
            />
            <span
              class="absolute top-1 left-0 text-white px-4 py-2 font-bold text-xl"
              >'.$nombres.'</span
            >
          </div>';
               
                    
                }
                                        
        ?>
          
          
          
          
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
                <img class="h-20" src="./assets/iconBannerMain.png" alt="" />
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
                      data-translate class="hover:border-b hover:border-white border-b border-transparent"
                      >Quienes Somos</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      data-translate class="hover:border-b hover:border-white border-b border-transparent"
                      >Preguntas Frecuentes</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      data-translate class="hover:border-b hover:border-white border-b border-transparent"
                      >Contactanos</a
                    >
                  </li>
                </ul>
                <ul class="flex flex-col gap-2">
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      data-translate class="hover:border-b hover:border-white border-b border-transparent"
                      >Se parte de nuestros Scorts</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                       data-translate class="hover:border-b hover:border-white border-b border-transparent"
                      >Términos & Condiciones</a
                    >
                  </li>
                  <li class="text-sm sm:text-base">
                    <a
                      href=""
                      data-translate class="hover:border-b hover:border-white border-b border-transparent"
                      >Politicas de Privacidad</a
                    >
                  </li>
                </ul>
                <ul
                  class="flex flex-col justify-between gap-4 col-span-2 sm:col-span-1"
                >
                  <li data-translate class="text-nowrap text-sm sm:text-base">
                    Eres Scorts? Descarga nuestra app
                  </li>
                  <button
                    class="flex w-full md:w-full items-center justify-between rounded-lg bg-violet p-2 text-sm text-white shadow-sm"
                  >
                    <div class="flex w-full gap-4 items-center font-semibold">
                      <img src="./assets/iconAndroid.png" alt="" srcset="" />
                      Android APP
                    </div>
                    <div class="w-max w-full px-2">
                      <img
                        class="w-full"
                        src="./assets/arrow-top-right-white.svg"
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
            <span data-translate class="text-xs text-white"
              >© Copyright 2025 -Todos los derechos reservados</span
            >
            <span data-translate class="text-xs text-white"
              >Seleccion VIP de scorts 100% verificadas y seguras presente en más de 15 paises</span
            >
          </div>
         
        </div>
      </div>
    </footer>

    <script src="./logica/controllerModalBuscador.js"></script>
 
    <script src="index.js"></script>
    
   <script>
        function redirigir(idpr, sexid) {
            var destino = "<?php echo isset($cedula) && !empty($cedula) ? 'index.php' : 'login.php'; ?>";
            if (destino === 'index.php') {
                window.location.href = 'buscar.php?pr=' + idpr+'&h='+ '<?php echo $hash ?>'+'&sex='+sexid;
            } else {
                window.location.href = 'buscar.php?pr=' + idpr+'&sex='+sexid;
            }
        }
    </script>
    
    <script>
  function loadCities() {
    var provinciaId = document.getElementById('paisSelect').value;
    
    
    // Si no se ha seleccionado ninguna provincia, ocultamos el select de las ciudades
    if (provinciaId == 0) {
      document.getElementById('ciudadSelect').classList.add('hidden');
      return;
    }

    // Hacemos una llamada Ajax para obtener las ciudades correspondientes a la provincia seleccionada
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_cities.php?provincia_id=' + provinciaId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Obtén la respuesta de las ciudades y actualiza el select de ciudades
        var cities = JSON.parse(xhr.responseText);
        var ciudadSelect = document.getElementById('ciudadSelect');
        
        // Limpiar el select de ciudades
        ciudadSelect.innerHTML = '<option value="0" data-translate>¿Ciudad?</option>';

        // Agregar las ciudades obtenidas
        cities.forEach(function(city) {
          var option = document.createElement('option');
          option.value = city.id;
          option.textContent = city.name;
          ciudadSelect.appendChild(option);
        });

        // Mostrar el select de ciudades
       // ciudadSelect.classList.remove('hidden');
      }
    };
    xhr.send();
  }
  
  function loadCities2() {
    const provinciaSelect = document.getElementById("provinciaSelect2");
    const ciudadesContainer = document.getElementById("ciudadesContainer");
    const sex= document.getElementById("estasBuscandoMobile");
    // Obtener el ID de la provincia seleccionada
    const provinciaId = provinciaSelect.value;
    // Si no se ha seleccionado una provincia válida, limpiar el contenedor de ciudades
    if (provinciaId === "0") {
        ciudadesContainer.innerHTML = ''; // Limpiar las ciudades
        return;
    }

    // Realizamos una petición AJAX para obtener las ciudades
    fetch(`get_cities.php?provincia_id=${provinciaId}`)
        .then(response => response.json())
        .then(data => {
            // Limpiar el contenedor de ciudades
            ciudadesContainer.innerHTML = '';

            if (data.length > 0) {
                // Si existen ciudades, las mostramos
                data.forEach(ciudad => {
                    const ciudadLink = document.createElement('a');  // Usamos 'a' en lugar de 'button'
                    ciudadLink.classList.add("px-4", "py-2", "bg-gray-40", "text-purple-90", "rounded-lg", "hover:opacity-50", "shadow-sm", "hover:shadow-none", "shadow-neutral-20");
                    ciudadLink.textContent = ciudad.name;

                    // Agregar el evento onclick para redirigir
                    ciudadLink.onclick = function(event) {
                        event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
                        console.log(sex.value)
                        redirigir(ciudad.id,sex.value); // Redirigir a la ciudad seleccionada
                    };

                    // Agregar el enlace al contenedor
                    ciudadesContainer.appendChild(ciudadLink);
                });
            } else {
                // Si no hay ciudades, mostramos un mensaje
                ciudadesContainer.innerHTML = '<p>No hay ciudades disponibles.</p>';
            }
        })
        .catch(error => {
            console.error('Error al cargar las ciudades:', error);
            ciudadesContainer.innerHTML = '<p>Error al cargar las ciudades.</p>';
        });
}
  
 
  
  document.addEventListener("DOMContentLoaded", function () {
  const ciudadSelect = document.getElementById("ciudadSelect");
  const btnBuscarBuscador = document.getElementById("btnBuscarBuscador");
  const sexSelect = document.getElementById("estasBuscando");
  // Escuchar el evento de cambio de selección en el select de ciudades
  ciudadSelect.addEventListener("change", function () {
    const ciudadId = ciudadSelect.value; // Obtener el ID de la ciudad seleccionada
    const sexId = sexSelect.value; // Obtener el ID de la ciudad seleccionada
    // Si se seleccionó una ciudad válida (diferente de 0), asignamos el ID al botón
    if (ciudadId !== "0") {
      btnBuscarBuscador.setAttribute("onclick", `redirigir(${ciudadId},${sexId})`);
    } else {
      // Si no se ha seleccionado una ciudad válida, asignamos un valor por defecto
      btnBuscarBuscador.setAttribute("onclick", `redirigir(19)`);
    }
  });
});
  
  /*
  document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("buscadorModal");
  const modalContent = document.getElementById("desktopSearch");
  const btnBuscar = document.getElementById("btnBuscar");
  const buscadorHeader = document.getElementById("buscador");
  const btnFilterHeader = document.getElementById("btnFilterHeader");
  const closeMobileSearch = document.getElementById("closeMobileSearch");
  const closeMobileSeachClass = document.querySelectorAll(".closeMobileSearch");
  const btnBuscadorMobile = document.querySelectorAll(".btnBuscadorMobile");
  const mobileSearch = document.getElementById("mobileSearch");

  function closeModal(event) {
    if (modalContent) {
      if (
        !modalContent.contains(event.target) &&
        !modal.contains(event.target)
      ) {
        if (modal) {
          modal.classList.add("hidden");
        }

        if (btnFilterHeader) {
          btnFilterHeader.classList.remove("translateBuscador");
        }

        if (buscadorHeader) {
          buscadorHeader.classList.remove("translateBuscador");
        }

        if (btnFilterHeader && btnFilterHeader.classList.contains("translateBuscadorToBack")) {
          buscadorHeader.classList.add("animationBuscadorToBack");
        }

        if (btnFilterHeader && btnFilterHeader.classList.contains("translateBuscador")) {
          if (modal) {
            modal.classList.add("translateBuscadorToBack");
          }
        }
      }
    }

    event.stopPropagation();
  }

  document.addEventListener("click", closeModal);

  if (buscadorHeader) {
    buscadorHeader.addEventListener("click", function (event) {
      if (btnFilterHeader) {
        btnFilterHeader.classList.add("translateBuscador");
      }
      if (buscadorHeader) {
        buscadorHeader.classList.add("translateBuscador");
      }

      if (innerWidth < 1024) {
        mobileSearch.classList.remove("hidden");
        if (btnFilterHeader) {
          btnFilterHeader.classList.remove("translateBuscador");
        }
        if (buscadorHeader) {
          buscadorHeader.classList.remove("translateBuscador");
        }
      }

      // Asegúrate de que el modal exista antes de manipularlo
      if (modal) {
        setTimeout(() => {
          modal.classList.remove("hidden");
        }, 229);
      }

      event.stopPropagation();
    });
  }

  if (btnBuscadorMobile) {
    btnBuscadorMobile.forEach((element) => {
      element.addEventListener("click", function (event) {
        mobileSearch.classList.remove("hidden");
      });
    });
  }

  closeMobileSeachClass.forEach((element) => {
    element.addEventListener("click", function (event) {
      mobileSearch.classList.add("hidden");
    });
  });
});*/
</script>


    <script src="language.js"></script>
  </body>
</html>
