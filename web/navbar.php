<?php
$root = '../';
?>
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
            src="../assets/iconBannerMain.png"
            class="w-8 h-10 md:w-12 md:h-14"
            alt=""
          />
          <div onclick="window.location.href = '../index.php'">
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
              class="flex group items-center gap-2 cursor-pointer txt-primary uppercase h-10 px-4 bg-white uppercase rounded-full font-bold text-sm hover:opacity-90 right-0"
              onclick="window.location.href = '<?php echo isset($_SESSION['profesional']) && !empty($_SESSION['profesional']) ? $root.'index.php?h=': $root.'login.php'; ?>'"
            >
              <?php echo isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"]) ? substr($_SESSION["profesional"]["email"], 0, 6) : 'Cuenta'; ?>
              <img class="w-7 h-7" src="<?php echo $root?>assets/iconPeople.png" alt="" />
              <!-- Submenú de Cerrar Sesión -->
              <?php if (isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"])): ?>
                <div class="submenu absolute hidden top-full left-0 mt-2 bg-white shadow-lg rounded-lg p-2" style="margin-top: 1px;">
                  <?php  if(isset($_SESSION["profesional"]) && !empty($_SESSION["profesional"])):?>
                    <a href="<?php echo $root?>pages/profesional-perfil.php?pr=<?php echo $_SESSION["profesional"]["id"];?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mi perfil</a>
                  <?php endif; ?>
                  <a href="<?php echo $root?>logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Cerrar sesión</a>
                </div>
              <?php endif; ?>
            </li>
            <li
              class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm"
              id="btnLang"
            >
              <img
                src="../assets/languajes/spain.svg"
                class="object-contain w-full h-full"
                alt=""
              />
              <ul class="flex flex-col gap-2 mt-2 hidden" id="languajes">
                <li
                  class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
                  id="btnLangEU"
                >
                  <img
                    src="../assets/languajes/eeuu.svg"
                    class="object-contain w-full h-full"
                    alt=""
                  />
                </li>
                <li
                  class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
                  id="btnLangFR"
                >
                  <img
                    src="../assets/languajes/france.svg"
                    class="object-contain w-full h-full"
                    alt=""
                  />
                </li>
                <li
                  class="cursor-pointer bg-white rounded-full w-10 h-10 uppercase font-bold text-sm hover:opacity-90"
                  id="btnLangES"
                >
                  <img
                    src="../assets/languajes/spain.svg"
                    class="object-contain w-full h-full"
                    alt=""
                  />
                </li>
              </ul>
            </li>
          </ul>
          <div class="flex gap-4 md:hidden">
            <button class="btnBuscadorMobile">
              <img src="../assets/search-white.svg" alt="iconSearch" />
            </button>

            <button id="btn-menu-toggle" class="flex">
              <img src="../assets/menu-toggle-white.svg" alt="iconMenuBurger" />
            </button>
          </div>
        </nav>
      </div>
    </header>