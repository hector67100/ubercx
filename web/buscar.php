<?php
include_once('php_lib/config.ini.php');
include('php_lib/conv.php');
include('logica/profesionalController.php');
    
$dipr=$_REQUEST['pr'];      
$hash=$_REQUEST['h'];
$sex=$_REQUEST['sex'];

session_start();   
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
	
	$query2je = "SELECT * FROM tags WHERE id='$dipr'";
	$result2je = mysqli_query($link,$query2je);
    while ($row2je = mysqli_fetch_assoc($result2je)) {

        $nombresci2 = $row2je["name"];
        $prciudad = $row2je["status"];
        
    }
    
    $query2ie = "SELECT * FROM provincia WHERE id='$prciudad'";
	$result2ie = mysqli_query($link,$query2ie);
    while ($row2ie = mysqli_fetch_assoc($result2ie)) {

        $nombrespr2 = $row2ie["name"];
        
    }
    
    $query = "SELECT * FROM users WHERE password = '$hash'";
             $result = mysqli_query($link,$query);
             $numero=1;
             while ($row = mysqli_fetch_assoc($result)) {
                   
            		$cedula = $row["email"];
            	
              }

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
    <link rel="stylesheet" href="input.css" />
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

.imagenCardEscort
{
  width: 40%;
}

.escortComunImg
{
  width: 100%;
  border-radius: 13px;
  height: 100%;
}

@media (max-width: 1024px) { 

  .imagenCardEscort
  {
    display:flex;
    width: 100%;
  }
}
   </style>
  </head>
  <body>
    <header
      class="w-full flex flex-col mx-auto text-white fixed duration-500 shadow-sm bg-primary-banner relative mb-12"
    >
      <nav
        class="px-4 h-14 container md:h-20 md:container md:px-3 flex justify-between items-center mx-auto relative z-index-sup"
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
                  <div class="flex flex-col min-w-[28em]">
                    <form
                      class="flex rounded-full bg-buscador justify-between w-full"
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

                      <!-- <div
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
                      </div> -->
                      <div class="relative flex items-center">
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
                      </div>

                      <input type="hidden" name="location-id" value="1" />
                      <input
                        class="text-black rounded-full px-8 py-4 m-1 hover:opacity-80 bg-red cursor-pointer text-white uppercase font-bold text-sm"
                        type="submit"
                        value="Buscar"
                      />
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
                  <div id="ciudadesContainer3"></div>
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
                <div
                  class="range-slider-two items-center flex h-max pl-2 gap-4"
                >
                  <span
                    class="font-medium rangeValuesTwo w-min text-nowrap"
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
      <div class="flex items-center gap-2">
        <img src="assets/iconNavigate.png" alt="" srcset="" />
        <img src="assets/iconArrowRight.png" alt="" />
        <span class="font-semibold"><a href=""><?php echo $nombrespr2 ?></a></span>
        <img src="assets/iconArrowRight.png" alt="" />
        <span class="font-semibold"><a href=""><?php echo $nombresci2 ?></a></span>
      </div>
      <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
          <?php
        $profesionales = (new ProfesionalController())->getProfesionalByCiudad($link,$dipr,$sex);
        // while ($row2 = mysqli_fetch_assoc($result2)) {
        foreach($profesionales as $row2){
                $idcliente = $row2['id'];
                $ciudad = $row2['ciudad'];
                $pais = $row2['pais'];
                $color_cabello = $row2['cabello'];
                $tipo_piel = $row2['piel'];
                $complexion = $row2['complexion'];
                $peso = $row2['peso'];
                $altura = $row2['altura'];
                $medida_pechos = $row2['medida_pechos'];
                $pechos_naturales = null;
                $sexo=$row2['sexo'];
                $ruta =str_replace("../","", $row2['ruta']);
                
                
                if($sexo=="H"){$sexo="Hombre";}
                if($sexo=="M"){$sexo="Mujer";}
                if($sexo=="T"){$sexo="Trans";}
                
                $query2j = "SELECT * FROM tags WHERE id='$ciudad'";
        		$result2j = mysqli_query($link,$query2j);
                while ($row2j = mysqli_fetch_assoc($result2j)) {

                    $nombresci = $row2j["name"];
                    
                }
                
                $query2i = "SELECT * FROM provincia WHERE id='$pais'";
        		$result2i = mysqli_query($link,$query2i);
                while ($row2i = mysqli_fetch_assoc($result2i)) {

                    $nombrespr = $row2i["name"];
                    
                }
                
                $nacimiento = new DateTime($row2['fecha']);
                $ahora = new DateTime(date("Y-m-d"));
                $edad = $ahora->diff($nacimiento)->format("%y");
                $nombres = $row2['nombre']; 
                $descripcion = $row2['descripcion'];
                echo' <div
          class="flex flex-col md:flex-row bg-card-escort rounded-lg cursor-pointer"
          onclick="redirigir('.$idcliente.')"
        >
          <div class="grid grid-cols-2 md:grid-cols-1 gap-2 imagenCardEscort lg:w-1/2 lg:flex">
            <img class="escortComunImg h-min" src="' . $ruta . '" alt="" />
            
          </div>
          <div class="flex flex-col justify-between py-8 px-4 gap-4">
            <div class="flex flex-col gap-4 justify-start">
              <span
                class="txt-card-escort font-semibold cursor-pointer hover:underline"
                >'.$nombres.'</span
              >
              <div
                class="w-14 bg-gray-500 descriptionCardEscort"
                style="height: 0.3px"
              ></div>
              <p class="descriptionCardEscort">
                '.$descripcion.'
              </p>
            </div>
            <div class="flex items-center gap-2">
              <img class="icons" src="assets/iconUbication.png" alt="" />
              <span class="font-semibold">'.$nombresci.'</span>
            </div>
            <div class="flex gap-4 flex-wrap w-full">
              <div
                class="flex items-center gap-2 bg-white px-2 py-1 rounded-lg border min-w-max"
              >
                <img class="icons" src="assets/iconWoman.png" alt="" /><span
                  class="text-nowrap text-xs sm:text-sm"
                  >'.$sexo.'</span
                >
              </div>
              <div
                class="flex items-center gap-2 bg-white px-2 py-1 rounded-lg border min-w-max"
              >
                <img class="icons" src="assets/iconBirthdat.png" alt="" />
                <span class="text-nowrap text-xs sm:text-sm">'.$edad.' años</span>
              </div>
              <div
                class="flex items-center gap-2 bg-white px-2 py-1 rounded-lg border min-w-max"
              >
                <img src="assets/iconPais.png" alt="" /><span
                  class="text-nowrap text-xs sm:text-sm"
                  >'.$nombrespr.'</span
                >
              </div>
            </div>
          </div>
        </div>';
                
                
        }   
        ?>

        
      </div>
      <div
        class="flex items-center justify-between gap-4 w-full px-2 md:w-2/4 mx-auto"
      >
        <div class="flex items-center gap-2 cursor-pointer" id="btnPre">
          <img id="arrowPre" src="assets/iconArrow.png" alt="" />
          <span class="font-semibold">Anterior</span>
        </div>
        <ul class="flex items-center gap-4">
          <li
            class="font-semibold cursor-pointer activePagination hover:border-b hover:border-black border-b border-transparent"
          >
            1
          </li>
          <li
            class="font-semibold cursor-pointer hover:border-b hover:border-black border-b border-transparent"
          >
            2
          </li>
          <li
            class="font-semibold cursor-pointer hover:border-b hover:border-black border-b border-transparent"
          >
            3
          </li>
          <li
            class="font-semibold cursor-pointer hover:border-b hover:border-black border-b border-transparent"
          >
            4
          </li>
          <li
            class="font-semibold cursor-pointer hover:border-b hover:border-black border-b border-transparent"
          >
            5
          </li>
        </ul>
        <div class="flex items-center gap-2 cursor-pointer" id="btnSig">
          <span class="font-semibold">Siguiente</span>
          <img id="arrowSig" src="assets/iconArrowRight.png" alt="" />
        </div>
      </div>
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

    <script src="rangeInput.js"></script>
    <script src="logica/controllerModalBuscador.js"></script>
    <script src="index.js"></script>
    
    <script>
        function redirigir(idpr)
        {
       
            var destino = "<?php echo isset($cedula) && !empty($cedula) ? 'index.php' : 'login.php'; ?>";
            if (destino === 'index.php') {
                window.location.href = 'perfil.php?pr=' + idpr+'&h='+ '<?php echo $hash ?>';
            } else {
                window.location.href = 'perfil.php?pr=' + idpr;
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
    
  </body>
</html>
