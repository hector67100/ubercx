<?php
	
	  include_once('php_lib/config.ini.php');
    include('php_lib/conv.php');
    include('logica/profesionalController.php');
    session_start();
    $hash=$_REQUEST['h'];
    $pr = $_REQUEST['pr'];
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
  $profesionales = (new ProfesionalController())->getProfesionalesPerfil($link,$pr);
  $nacimiento = new DateTime($profesionales['fecha']);
  $ahora = new DateTime(date("Y-m-d"));
  $edad = $ahora->diff($nacimiento)->format("%y");
  $profesionales['servicios'] = json_decode($profesionales['servicios'],true);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex - Buscador</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mediasQuerys.css" />
    <link rel="stylesheet" href="animationBuscador.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
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
  <body class="bg-whiteLight">
    <header
      class="w-full flex flex-col mx-auto text-white fixed duration-500 shadow-sm bg-primary-banner relative mb-12"
    >
      <nav
        class="px-4 h-14 container md:h-20 md:container md:px-3 flex justify-between items-center mx-auto relative z-50"
      >
        <div
          class="flex items-center gap-2 cursor-pointer"
          onclick="window.location.href = '<?php echo isset($cedula) && !empty($cedula) ? 'index.php?h='.$hash : 'index.php'; ?>'"
        >
          <img
            class="w-8 h-10 md:w-12 md:h-14"
            src="assets/iconBannerMain.png"
            alt=""
          />
          <h1 class="font-bold text-2xl md:text-4xl text-white">
            Uber<span class="txt-resaltado">Sex</span>
          </h1>
        </div>
        <div class="flex items-center gap-24">
          <div class="flex gap-4 items-center mr-16 buscadorFiltro">
            <div
              class="flex gap-4 items-center p-1 pl-4 rounded-full h-12 bg-buscador buscadorHeader"
              id="buscador"
            >
              <input type="text" class="inputCustomCustom" />
              <button
                class="w-full border-0 cursor-pointer h-full bg-primary-banner hover:bg-red-700 uppercase text-purple-100 font-bold rounded-full transition-all duration-300 ease-in-out px-2"
                id="btnBuscar"
              >
                Buscar
              </button>
            </div>
            <div
              class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm p-2 hover:opacity-90 buscadorHeader"
              id="btnFilterHeader"
            >
              <img
                class="imgFilterIcon"
                src="assets/iconFilter.png"
                class="w-full h-full"
                alt=""
              />
            </div>
          </div>
          <ul class="flex gap-4 items-center" id="options-desktop">
            <li
              class="flex items-center gap-2 cursor-pointer txt-primary uppercase h-10 px-4 bg-white uppercase rounded-full font-bold text-sm hover:opacity-90 absolute right-0"
              onclick="window.location.href = '<?php echo isset($cedula) && !empty($cedula) ? 'index.php?h='.$hash : 'login.php'; ?>'"
            >
              <?php echo isset($cedula) && !empty($cedula) ? substr($cedula, 0, 6) : 'Cuenta'; ?>
              <img class="w-7 h-7" src="assets/iconPeople.png" alt="" />
              <!-- Submenú de Cerrar Sesión -->
              <?php if (isset($cedula) && !empty($cedula)): ?>
                <div class="submenu absolute top-full left-0 mt-2 hidden bg-white shadow-lg rounded-lg p-2" style="margin-top: 1px;">
                  <?php  if(isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"])):?>
                    <a href="pages/profesional-perfil.php?pr=<?php echo $_SESSION["profesional"]["id"];?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mi perfil</a>
                  <?php endif; ?>
                  <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Cerrar sesión</a>
                </div>
              <?php endif; ?>
            </li>
          </ul>
          <button id="btn-menu-toggle-buscador" class="flex hidden">
            <img src="assets/menu-toggle-white.svg" alt="" srcset="" />
          </button>

          <!-- BUSCADOR MODAL MOBILE -->
          <div
            id="mobileSearch"
            class="hidden top-0 left-0 w-full h-full flex flex-col bg-white fixed z-50 p-4"
          >
            <div
              class="px-4 mb-12 h-14 flex items-center border-b border-gray-50"
            >
              <img
                alt="close"
                class="toggle-mobile-search cursor-pointer closeMobileSearch"
                width="24"
                height="24"
                src="assets/iconCloseModal.svg"
              />
              <div class="flex-grow text-center text-black">Busca</div>
            </div>
            <form
              class="flex flex-col flex-grow items-center"
              action="/search/"
            >
              <div class="flex flex-col flex-grow gap-6 container">
                <div
                  class="flex px-4 xs:py-2.5 rounded-2xl border border-gray-60"
                >
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
                    src="assets/location-purple.svg"
                  />
                  <select
                    type="text"
                    name="geo-location-input"
                    placeholder="¿Ciudad?"
                    class="inputCustom"
                     id="provinciaSelect2"
                    onchange="loadCities2()"
                  >
                    <option value="0">¿Donde?</option>
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
                        src="assets/iconCloseModal.svg"
                      />
                    </div>
                  </div>
                </div>
                <div id="geo-results-mobile"></div>
                <input type="hidden" name="location-id" value="0" />
                    
                <div id="ciudadesContainer" class="flex flex-wrap justify-center gap-4">
                  
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

          <!-- BUSCADOR MODAL -->
          <div class="hidden" id="buscadorModal">
            <div
              id="desktopSearch"
              class="bg-white p-4 absolute hidden md:flex items-center justify-center top-20 left-0 right-0 opacity-0 [transition:transform_250ms_ease,opacity_100ms_ease,visibility_0ms_50ms] opacity-100 rounded-xl"
            >
              <div class="flex flex-col items-center justify-center">
                <div class="md:flex items-center justify-center">
                  <div class="flex flex-col">
                    <form
                      class="flex rounded-full bg-buscador justify-between"
                      action="/search/"
                    >
                      <select
                        type="text"
                        placeholder="¿Qué estás buscando?"
                        class="inputCustom w-max"
                      >
                        <option>¿Qué estás buscando?</option>
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

                      <div
                        id="locationPrompt"
                        class="w-28 md:w-36 lg:w-68 text-sm bg-transparent px-6 my-2 font-normal flex items-center justify-center border-l focus:border-l border-gray-60 focus:border-gray-60 hidden"
                      >
                        Buenos Aires
                        <div class="bg-white flex rounded-full ml-4">
                          <img
                            alt="close"
                            id="clearDesktopSearchLocation"
                            class="cursor-pointer mt-px p-1 w-6 h-6"
                            width="20"
                            height="20"
                            src="assets/iconCloseModal.svg"
                          />
                        </div>
                      </div>

                      <select
                    type="text"
                    name="geo-location-input"
                    placeholder="¿Ciudad?"
                    class="inputCustom"
                    id="provinciaSelect3"
                    onchange="loadCities3()"
                  >
                    <option value="0">¿Donde?</option>
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

                      <input type="hidden" name="location-id" value="1" />
                     
                    </form>
                    <div id="geo-results"></div>
                  </div>

                  <div
                    id="btnFilter"
                    class="ml-4 flex bg-gray-100 rounded-full py-4 px-5 items-center justify-center cursor-pointer text-black"
                  >
                    <img
                      class="w-5 h-5 mr-2"
                      src="assets/iconFilter.png"
                      alt="filters"
                    />
                    Filtros
                  </div>
                </div>

                <div class="mt-4 max-w-2xl">
                  <div id="ciudadesContainer3"  class="flex flex-wrap justify-center gap-4">
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <!-- MODAl -->
    <div
      class="fixed h-full w-full inset-0 overflow-y-auto hidden"
      id="modalFilter"
    >
      <div
        class="flex max-h-full items-end justify-center text-center sm:items-center"
      >
        <form
          id="filterForm"
          action="/search/"
          class="fixed top-0 bottom-0 md:top-[10%] md:bottom-[10%] inset-0 transform rounded-3xl bg-white text-left shadow-xl transition-all md:max-w-[60%] lg:max-w-[30%] mx-auto h-96"
        >
          <header
            class="bg-white z-40 rounded-t-3xl px-4 md:px-8 pt-8 pb-8 md:pb-4 border-b md:border-0 border-gray-50 flex items-start"
          >
            <button
              id="closeModal"
              type="button"
              class="cursor-pointer w-6 h-6"
            >
              <img
                alt="close"
                width="24"
                height="24"
                src="assets/iconCloseModal.svg"
              />
            </button>
            <div class="flex-1 flex flex-col justify-center mr-6">
              <div class="text-center font-medium">Filtros</div>
            </div>
          </header>

          <div
            class="px-4 md:px-8 overflow-y-auto absolute top-[70px] bottom-[87px] w-full h-max"
          >
            <div class="font-medium mb-4 pt-8">Género</div>
            <div class="flex flex-col md:flex-row md:flex-wrap gap-y-4">
              <div
                class="relative flex flex-row-reverse justify-between md:justify-start md:flex-row items-start flex-1 md:flex-[30%]"
              >
                <div class="flex h-6 items-center">
                  <input
                    id="gender_2"
                    value="hombre"
                    name="gender"
                    type="checkbox"
                    class="tailwind-input h-6 w-6 rounded border-gray-60"
                  />
                </div>
                <div class="md:ml-3 text-sm leading-6 flex flex-1 md:block">
                  <label
                    for="gender_2"
                    class="cursor-pointer text-gray-900 flex-1"
                    >Hombre</label
                  >
                </div>
              </div>

              <div
                class="relative flex flex-row-reverse justify-between md:justify-start md:flex-row items-start flex-1 md:flex-[30%]"
              >
                <div class="flex h-6 items-center">
                  <input
                    id="gender_1"
                    value="mujer"
                    name="gender"
                    type="checkbox"
                    class="tailwind-input h-6 w-6 rounded border-gray-60"
                  />
                </div>
                <div class="md:ml-3 text-sm leading-6 flex flex-1 md:block">
                  <label
                    for="gender_1"
                    class="cursor-pointer text-gray-900 flex-1"
                    >Mujer</label
                  >
                </div>
              </div>

              <div
                class="relative flex flex-row-reverse justify-between md:justify-start md:flex-row items-start flex-1 md:flex-[30%]"
              >
                <div class="flex h-6 items-center">
                  <input
                    id="gender_3"
                    value="travestis"
                    name="gender"
                    type="checkbox"
                    class="tailwind-input h-6 w-6 rounded border-gray-60"
                  />
                </div>
                <div class="md:ml-3 text-sm leading-6 flex flex-1 md:block">
                  <label
                    for="gender_3"
                    class="cursor-pointer text-gray-900 flex-1"
                    >Trans</label
                  >
                </div>
              </div>
            </div>

            <div class="py-8">
              <div class="flex items-center mb-5">
                <div class="range-slider items-center flex h-max pl-2 gap-4">
                  <span
                    class="font-medium rangeValues w-min text-nowrap"
                  ></span>
                  <input
                    min="18"
                    max="99"
                    value="18"
                    type="range"
                    class="bg-red-400"
                  />
                  <input
                    min="18"
                    max="99"
                    value="99"
                    type="range"
                    class="bg-red-400 input-range-end"
                  />
                </div>
              </div>
              <div id="age-range-validation-error" class="hidden text-red-700">
                La edad máxima no puede ser inferior a la edad mínima
              </div>
              <div id="age-validation-error" class="text-gray-80">
                La edad mínima es de 18 años y la máxima de 99.
              </div>
            </div>
            <hr class="text-gray-50" />

            <input type="hidden" name="location" value="buenos-aires" />
          </div>

          <footer
            class="fixed bottom-0 inset-x-0 md:absolute z-40 bg-white rounded-none md:rounded-b-3xl border-t border-gray-50 shadow-lg md:shadow-none"
          >
            <div class="flex py-4 px-4 md:px-8 justify-between">
              <button
                type="button"
                class="cursor-pointer underline tailwind-input py-4 w-1/2 md:w-auto md:min-w-40"
              >
                Reset
              </button>
              <button
                type="button"
                class="btn-primary rounded-2xl py-4 w-1/2 md:w-auto md:px-10 md:min-w-40"
              >
                Buscar
              </button>
            </div>
          </footer>
        </form>
      </div>
    </div>
    <!-- MODAL -->

    <main class="container mx-auto gap-8 flex flex-col py-12 p-4">
      <div>
        <button
          onclick="window.location.href = 'buscador.html'"
          class="cursor-pointer font-bold text-xl flex items-center gap-2"
        >
          <img src="assets/iconArrow.png" alt="" srcset="" />
          ATRÁS
        </button>
      </div>
      <div
        class="flex items-center gap-2 bg-white rounded-full px-4 py-3 w-max"
      >
        <img src="assets/iconNavigate.png" alt="" srcset="" />
        <img src="assets/iconArrowRight.png" alt="" />
        <span class="font-semibold"><a href="">Escorts</a></span>
        <img src="assets/iconArrowRight.png" alt="" />
        <span class="font-semibold"><a href=""><?php echo $profesionales["pais"]?></a></span>
        <img src="assets/iconArrowRight.png" alt="" />
        <span class="font-semibold"><a href=""><?php echo $profesionales["ciudad"]?></a></span>
      </div>
      <div class="flex flex-col lg:flex-row gap-8">
        <div class="col-span-2">
          <div
            class="grid sm:grid-cols-3 sm:grid-rows-2 grid-flow-col gap-4 bg-white rounded-xl p-4 relative"
          >
            <img
              class="sm:col-span-2 sm:row-span-2 w-full h-full rounded-3xl object-cover cursor-pointer"
              src="<?php echo str_replace("../","", $profesionales['ruta'])?>"
              alt=""
              onclick="openGallery(0)"
            />
            <?php
              $i = 1;
              foreach($profesionales['fotos'] as $foto)
              {
                if($i < 3)
                {
            ?>
              <img
                class="h-full rounded-3xl object-cover morePics cursor-pointer"
                src="<?php echo str_replace("../","",$foto["ruta"]) ?>"
                alt=""
                onclick="openGallery(<?php echo $i ?>)"
              />
            <?php
                }

                $i++;
              }
            ?>
            <div
              onclick="openGallery(0)"
              class="absolute flex gap-2 bottom-8 right-8 cursor-pointer hover:translate-y-[-2px] items-center justify-center bg-black/50 text-white font-semibold p-4 rounded-xl"
            >
              <img
                class="object-cover"
                src="assets/iconAllPics.png"
                alt=""
              />
              Ver todas las Fotos
            </div>
          </div>
          <div class="flex flex-col gap-4 mt-8 bg-white p-8 rounded-xl">
            <p class="font-semibold text-base sm:text-xl">
            <?php echo $profesionales["descripcion"]?>
            </p>
            <div
              class="flex items-center gap-2 font-semibold text-sm sm:text-lg"
            >
              <img
                src="assets/iconUbication.png"
                class="w-4 h-5 sm:w-5 sm:h-6"
                alt=""
              /><?php echo $profesionales["ciudad"]?>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-2">
              <span
                class="font-bold text-start w-full sm:w-max txtRed text-nowrap sm:text-base mt-2 sm:mt-0"
                >Atiende a:</span
              >
              <ul class="flex gap-2">
                <?php 
                  foreach($profesionales["objetivo"] as $objetivo)
                  {
                  ?>
                    <li class="border rounded-lg py-1 px-2 bg-violetLight">
                    <?php echo $objetivo?>
                    </li>
                  <?php 
                  }
                  ?>
              </ul>
            </div>
          </div>
          <div class="bg-white p-8 rounded-xl mt-8 gap-8 flex flex-col">
            <h3
              class="flex items-center justify-center gap-2 font-bold text-2xl txtRed"
            >
              <img src="assets/iconTitle.png" />Perfil
            </h3>
            <div class="flex justify-between">
              <div class="flex items-center gap-2">
                <img
                  class="w-20 h-20 rounded-full"
                  src="<?php echo str_replace("../","", $profesionales['ruta'])?>"
                  alt=""
                /><span class="font-bold text-xl txtRed"><?php echo $profesionales["nombre"]?></span>
              </div>
              <div
                class="flex items-center xs:h-min xs:bg-[#FF9797] rounded-br-xl rounded-tl-xl gap-2 relative mr-4"
              >
                <img
                  class="w-11 h-10 z-50"
                  src="assets/iconPro.png"
                  alt=""
                />
                <span class="font-semibold proCard z-50 text-xs sm:text-[1em]"
                  >ANUNCIANTE PRO</span
                >
                <div
                  class="bg-[#FF9797]/40 proCard rounded-xl gap-2 absolute bottom-0 right-0 h-[50px] w-[200px] sm:h-[55px] sm:w-[230px]"
                ></div>
                <div
                  class="bg-[#FF9797]/40 proCard rounded-xl gap-2 absolute top-0 right-[-35px] h-[50px] w-[190px] sm:h-[55px] sm:w-[225px]"
                ></div>
              </div>
            </div>
            <div class="w-full grid grid-cols-2 xs:px-8 gap-4">
              <span
                class="border rounded-xl text-center font-semibold p-4 bg-violetLight flex justify-center items-center"
                ><?php echo $edad?> años</span
              >
              <span
                class="border rounded-xl text-center font-semibold p-4 bg-violetLight flex justify-center items-center"
                ><?php echo $profesionales["sexo"]?></span
              >
            </div>
            <div class="grid grid-cols-2 gap-4">
              <span class="flex items-center gap-2"
                ><img
                  class="w-5 h-5"
                  src="assets/iconName.png"
                  alt=""
                /><?php echo $profesionales["ciudad"]?>, <?php echo $profesionales["pais"]?></span
              >
              <span class="flex items-center gap-2"
                ><img
                  class="w-5 h-5"
                  src="assets/iconFace.png"
                  alt=""
                /><?php echo $profesionales["cabello"]?>,<?php echo $profesionales["piel"]?></span
              >
              <span class="flex items-center gap-2"
                ><img
                  class="w-5 h-5"
                  src="assets/iconBody.png"
                  alt=""
                /><?php echo $profesionales["complexion"]?>, <?php echo $profesionales["peso"]?> kgs, altura: <?php echo $profesionales["altura"]?></span
              >
              <span class="flex items-center gap-2"
                ><img class="w-5 h-5" src="assets/iconTits.png" alt="" />(<?php echo $profesionales["medida_pechos"]?>
                cm) - Pechos Naturales</span
              >
            </div>
          </div>
        </div>
        <div
          class="w-full justify-center lg:justify-start lg:max-w-72 2xl:max-w-sm w-full flex flex-col gap-8 text-center"
        >
          <div class="bg-Tarifas p-4 rounded-xl">
            <div>
              <h2
                class="flex items-center justify-center gap-2 txtRed font-bold text-xl"
              >
                <img src="assets/iconTitle.png" alt="" />TARIFAS
              </h2>
            </div>
            <div class="flex flex-wrap lg:flex-col gap-8 mt-12">
              <?php
                foreach($profesionales['servicios'] as $servicio)
                {
              ?>
              <div class="w-full">
                <div class="flex justify-between items-end">
                  <span class="font-semibold text-nowrap"
                    ><?php echo $servicio["nombre"]?></span
                  >
                  <span class="bgPuntitos mx-2"></span>
                  <span class="font-semibold text-nowrap">USD <?php echo $servicio["precio"]?></span>
                </div>
                <button
                  class="bg-cardContrato mt-4 text-white font-bold rounded-xl py-4 w-full"
                >
                  CONTRATAR
                </button>
              </div>
              <?php
                }
              ?>
            </div>
          </div>
          <div>
            <button
              class="bg-card-wts flex items-center justify-center gap-4 text-white font-bold rounded-xl py-4 w-full"
            >
              <img src="assets/iconWhatsapp.png" alt="" />Dudas? Escribenos!
            </button>
          </div>
          <div class="bg-white rounded-xl p-4 flex flex-col gap-y-4">
            <p>Id del anuncio: 209191915</p>
            <p>🏳 Denunciar este anuncio</p>
          </div>
        </div>
      </div>
    </main>

    <!-- ZOOM PICS -->
    <div
      id="AdDetailGallery"
      class="absolute w-full h-full overflow-hidden hidden inset-0 z-50"
    >
      <div id="AdDetailGalleryCarousel" class="absolute inset-0 bg-black">
        <div
          class="fixed z-50 h-14 left-4 right-4 md:left-0 md:container md:h-20 flex items-center justify-between bg-black flex-none mx-auto"
        >
          <div
            id="AdDetailGallerySwiperCounter"
            class="text-base text-white uppercase pl-2"
          >
            1/3
          </div>
          <img
            class="w-10 md:w-12 h-10 md:h-10 cursor-pointer"
            alt="close"
            src="assets/circle-close.svg"
            onclick="closeGallery()"
          />
        </div>

        <div class="md:container px-0 pt-14 md:pt-20 w-full h-full mx-auto">
          <div class="w-full h-full flex justify-between items-center">
            <button
              id="AdDetailGallerySwiperPrevBtn"
              class="hidden md:block flex-none"
            >
              <img
                class="h-12 w-12 mr-4"
                alt="prev"
                src="assets/circle-prev.svg"
              />
            </button>

            <div
              class="swiper flex-1 h-full swiper-initialized swiper-horizontal"
              id="swiper-AdDetailGallery"
            >
              <div
                class="swiper-wrapper"
                id="swiper-wrapper-b810cc451bf8ffd54"
                aria-live="polite"
                style="
                  transition-duration: 0ms;
                  transform: translate3d(-2560px, 0px, 0px);
                  transition-delay: 0ms;
                "
              >
                <div
                  class="swiper-slide"
                  role="group"
                  aria-label="1 / 3"
                  data-swiper-slide-index="0"
                  style="width: 640px"
                >
                  <div class="swiper-zoom-container">
                    <div
                      class="swiper-zoom-target h-full flex items-center justify-center"
                    >
                      <img
                        class="object-contain "
                        src="<?php echo str_replace("../","", $profesionales['ruta'])?>"
                        alt="Escorts 🇦🇷 Argentina en Palermo: 1127617113 - Muy putita re fogosa Me gusta todo bebé"
                        loading="lazy"
                      />
                    </div>
                  </div>
                </div>
                <?php
                  $i = 1;
                  foreach($profesionales['fotos'] as $foto)
                  {
                ?>
                <div
                  class="swiper-slide"
                  role="group"
                  aria-label="2 / 10"
                  data-swiper-slide-index="<?php echo $i?>"
                  style="width: 640px"
                >
                  <div class="swiper-zoom-container">
                    <div
                      class="swiper-zoom-target h-full flex items-center justify-center"
                    >
                      <img
                        class="object-contain"
                        src="<?php echo $foto["ruta"] ?>"
                        alt="Escorts 🇦🇷 Argentina en Palermo: 1127617113 - Muy putita re fogosa Me gusta todo bebé"
                        loading="lazy"
                      />
                    </div>
                  </div>
                </div>
                <?php
                    $i++;
                  }
                ?>
              </div>
              <span
                class="swiper-notification"
                aria-live="assertive"
                aria-atomic="true"
              ></span>
            </div>

            <button
              id="AdDetailGallerySwiperNextBtn"
              class="hidden md:block flex-none"
            >
              <img
                class="h-12 w-12 ml-4"
                alt="next"
                src="assets/circle-next.svg"
              />
            </button>
          </div>
        </div>
      </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      let carouselSwiper;

      const gallery = document.getElementById("AdDetailGallery");
      const carousel = document.getElementById("AdDetailGalleryCarousel");

      const counter = document.getElementById("AdDetailGallerySwiperCounter");
      const prevBtn = document.getElementById("AdDetailGallerySwiperPrevBtn");
      const nextBtn = document.getElementById("AdDetailGallerySwiperNextBtn");
      let indexPics = counter.innerText.split("/");

      function openGallery(index) {
        window.scrollTo(0, 0);
        document.body.classList.add("overflow-hidden");

        gallery.classList.remove("hidden");
        carousel.classList.remove("hidden");

        if (carouselSwiper !== undefined) {
          carouselSwiper.destroy();
          carouselSwiper = undefined;
        }
        if (index === undefined) index = 0;
        carouselSwiper = new Swiper("#swiper-AdDetailGallery", {
          effect: "slide",
          mousewheel: true,
          initialSlide: index,
          speed: 250,
          loop: true,
          keyboard: {
            enabled: true,
            onlyInViewport: true,
          },
        });

        counter.innerText = index + 1 + "/" + indexPics[1];
        prevBtn.addEventListener("click", function () {
          carouselSwiper.slidePrev();
          indexPics[0] = carouselSwiper.realIndex + 1;
          counter.innerText = indexPics[0] + "/" + indexPics[1];
        });

        nextBtn.addEventListener("click", function () {
          carouselSwiper.slideNext();
          indexPics[0] = carouselSwiper.realIndex + 1;
          counter.innerText = indexPics[0] + "/" + indexPics[1];
        });
      }

      function closeGallery() {
        document.body.classList.remove("overflow-hidden");
        gallery.classList.add("hidden");
        carousel.classList.add("hidden");
        carouselSwiper.destroy();

        if (window["swiperMount"]) {
          window["swiperMount"]();
        }
      }
    </script>
    
    <script>
        function redirigir2(idpr) {
            var destino = "<?php echo isset($cedula) && !empty($cedula) ? 'index.php' : 'login.php'; ?>";
            if (destino === 'index.php') {
                window.location.href = 'buscar.php?pr=' + idpr+'&h='+ '<?php echo $hash ?>';
            } else {
                window.location.href = 'buscar.php?pr=' + idpr;
            }
        }
    </script>
    
      <script>
 
  
  function loadCities2() {
    const provinciaSelect = document.getElementById("provinciaSelect2");
    const ciudadesContainer = document.getElementById("ciudadesContainer");

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
                        redirigir2(ciudad.id);
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

 function loadCities3() {
    const provinciaSelect = document.getElementById("provinciaSelect3");
    const ciudadesContainer = document.getElementById("ciudadesContainer3");

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
                        redirigir2(ciudad.id);
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
  
 

  

</script>
    
    <script src="rangeInput.js"></script>
    <script src="animationBuscador.js"></script>
    <script src="logica/controllerModalBuscador.js"></script>
    <script src="index.js"></script>
  </body>
</html>

