<?php
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
include_once('../php_lib/config.ini.php');
include '../logica/panel-info.php';
$link = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);
if (!$link) {
    echo json_encode(['success' => false, 'error' => 'Error al conectar al servidor mysql']);
    exit;
}

$db_selected = mysqli_select_db($link, BASE_DATOS);
if (!$db_selected) {
    echo json_encode(['success' => false, 'error' => 'Error al conectar a la base de datos']);
    exit;
}

$pr = $_REQUEST['pr'];
mysqli_set_charset($link, "utf8");
$categorias = (new PanelInfo())->getCategories($link);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex</title>
    <link rel="stylesheet" href="../../style.css" />
    <link rel="stylesheet" href="../../mediasQuerys.css" />
    <link rel="stylesheet" href="../../input.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
      .group
      {
        position: relative;
      }

      .submenu
      {
        top:0
      }

      li.group:hover .submenu {
        display: block;
      }
		    .swal2-popup {
            max-width: 80%; /* Ajusta este valor según sea necesario */
            width: auto !important; /* Asegúrate de que el ancho se ajuste */
        }

        .imagen-registro
        {
            background-image: url(<?php echo $root;?>assets/cover2.jpg);
            background-size: cover;
            background-position: center;
        }

        .hide
        {
          display: none !important;
        }

        .select-multiple
        {
          max-height: 50%;
        }
        
        .general-input
        {
          width: 100%;
          background-color: #f0f0f0;
          color: #666;
          font-weight: bold;
          padding: 10px 0;
          text-align: center;
          border-radius: 12px;
          font-size:30px;
          margin: 0 auto 0;
        }

        .title
        {
          margin: 0 auto 9%;
        }

        .subtitle
        {
          font-size: 20px;
          color: #666;
          margin-bottom:10px;
          display: block;
          text-align: center;
          font-weight: bold;
        }

        .div-96
        {
          width: 96%;
        }

        .input-file img
        {
          margin: auto;
          cursor: pointer;
          max-height: 150px;
        }

        #imagen-registro
        {
          transition: 1s;
        }

        .service-title img
        {
          margin-right: 0;
        }

        .service-title h3
        {
          margin: auto auto auto 2%;
        }

        .service-container
        {
          display: flex;
          justify-content: space-between;
          align-items: center;
        }

        .service-container div
        {
          margin-top:auto;
        }

        .service-select
        {
          width: 60%;
        }

        .service-button
        {
          width: 11%;
        }

        .service-select select
        {
          padding: 12px 0;
        }

        .service-select .subtitle
        {
          width: 50%;
          margin: 0 auto 10px 10%;
        }

        .service-precio
        {
          position: relative;
          width: 25%;
        }

        .service-precio input
        {
          text-align: left;
          padding-left: 24%;
          width: 100%;
        }

        .service-precio p
        {
          position: absolute;
          bottom: 0;
          right: 0;
          padding: 10px 20px;
          background-color: #de1e14;
          color: white;
          font-weight: bold;
          border-radius: 9px;
          font-size: 30px;
        }

        .button-service
        {
          padding: 33px 45px;
          background-color: #de1e14;
          border-radius: 9px;
          position: relative;
        }

        .suma
        {
          background-color: #006600;
        }

        .suma::before
        {
          position: absolute;
          content: "";
          font-size: 20px;
          color: white;
          bottom: 14%;
          width: 50px;
          height: 50px;
          background-repeat: no-repeat;
          background-position: center;
          right: 20%;
          background-image: url("<?php echo $root;?>/assets/icon-suma.png");
        }

        .restar::before
        {
          position: absolute;
          content: "";
          font-size: 20px;
          color: white;
          bottom: 14%;
          width: 50px;
          height: 50px;
          background-repeat: no-repeat;
          background-position: center;
          right: 20%;
          background-image: url("<?php echo $root;?>/assets/icon-negativo.png");
        }

        @media (max-width: 768px) {

          .telefono
          {
            flex-direction: row !important;
          }

          #form-2 .flex, #form-3 .flex, #form-4 .flex
          {
            flex-direction: column;
          }

          #form-2 .flex div, #form-3 .flex div, #form-4 .flex div
          {
            width: 100%;
          }

        }
	</style>
  </head>
  <body>
    <?php
        include 'components/navbar.php';
    ?>
     <main class="relative mx-auto w-full">
      <div
        class="flex-grow columns-1 lg:columns-2 flex lg:overflow-hidden containerMainRegister"
      >
        <div
          class="hidden w-full justify-end lg:flex imagen-registro"
          id="imagen-registro"
        >
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
              class="rounded-t-3xl flex-1 flex flex-col bg-white items-center lg:items-start m-auto w-full"
            >
              <div
                class="w-full h-full flex px-3 lg:px-4 "
              >
                <div
                  class="fixed top-0 flex flex-col self-center gap-y-2 m-8 z-50"
                ></div>

                <div class="flex-grow text-purple-100 p-6 m-auto w-full">
                  <form
                    id="kt_register_form"
                    action="" method="POST"
                    class="flex-1 flex flex-col"
                  >
                    <div id="form-2" class="flex flex-col">
                      <div class="flex mb-16 service-title">
                        <img src="../assets/IconService.png" class="m-auto" />
                        <h3 class="text-2xl lg:text-4xl text-center font-bold title">
                        Crear Cuenta Profesional
                        </h3>
                      </div>
                      <div class="service-container mb-10">
                        <div class="service-select">
                          <label for="service" class="subtitle" >Seleccione Servicio</label>
                          <select name="service" class="general-input" id="serviciosActivos">
                          </select>
                        </div>
                        <div class="service-precio">
                          <label for="precio" class="subtitle" >Introduzca su Costo:</label>
                          <input type="text" name="precio" class="general-input" placeholder="0" id="serviciosActivosPrecio"/>
                          <p>USD</p>
                        </div>
                        <div class="service-button">
                        <label for="precio" class="subtitle">Quitar 
                        Servicio</label>
                          <button class="button-service restar m-auto" id="quitar"></button>
                          </button>
                        </div>
                      </div>
                      <div class="service-container mb-10">
                        <div class="service-select">
                          <label for="service" class="subtitle" >Seleccione Servicio</label>
                          <select name="service" class="general-input" id="servicios">
                            <option value="">Seleccione un servicio</option>
                            <?php
                            foreach($categorias as $categoria)
                            {
                              echo '<option value="'.$categoria["id"].'">'.$categoria["name"].'</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="service-precio">
                          <label for="precio" class="subtitle">Introduzca su Costo:</label>
                          <input type="text" name="precio" class="general-input" placeholder="0" id="serviciosPrecio" value="0"/>
                          <p>USD</p>
                        </div>
                        <div class="service-button">
                        <label for="precio" class="subtitle">Agregar 
                        Servicios</label>
                          <button class="button-service suma m-auto" id="agregar"></button>
                          </button>
                        </div>
                      </div>

                      <button
                        id="kt_register"
                          class="m-auto w-3/4 h-14 rounded-2xl uppercase text-white bg-red disabled:opacity-50 enabled:hover:bg-purple-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100 shadow-sm font-bold"
                        >
                        Guardar Tarifas
                        </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  <script>
var servicios = [];
$(document).ready(function() {
  $.ajax({
    url: '<?php echo $root;?>rutas.php/profesionales/servicios/<?php echo $pr;?>',
    type: 'GET',
    success: function(response){
      let serviciosProfesional = JSON.parse(response);
      serviciosProfesional = serviciosProfesional.servicios ? JSON.parse(serviciosProfesional.servicios) : [];
      if(serviciosProfesional.length > 0)
      { 
        serviciosProfesional.map((servicio) => {
          $('#serviciosActivos').append('<option value="'+servicio.id+'">'+servicio.nombre+'</option>');
        });
      }
      servicios = serviciosProfesional;
      if(servicios.length > 0)
      {
        let precio = servicios.find(x => x.id == $("#serviciosActivos").val()).precio;
        $('#serviciosActivosPrecio').val(precio);
      }
    }
  });
});


$("#serviciosActivos").on("change", function(){
  let precio = servicios.find(x => x.id == $("#serviciosActivos").val()).precio;
  $('#serviciosActivosPrecio').val(precio);
});

$("#agregar").on("click", function(e){
  e.preventDefault();
  if(servicios.find(x => x.id == $("#servicios").val())){
    alert("Ya esta el servicio agregado");
  }
  else
  {
    let servicio = {
      id: $("#servicios").val(),
      nombre: $("#servicios option:selected").text(),
      precio: $("#serviciosPrecio").val()
    }
    servicios.push(servicio);
    $('#serviciosActivos').html("");
    servicios.map((servicio) => {
      $('#serviciosActivos').append('<option value="'+servicio.id+'">'+servicio.nombre+'</option>');
    });
    let precio = servicios.find(x => x.id == $("#serviciosActivos").val()).precio;
    $('#serviciosActivosPrecio').val(precio);
  }
});

$("#quitar").on("click", function(e){
  e.preventDefault();
  let servicioAQuitar = servicios.find(x => x.id == $("#serviciosActivos").val())
  let index = servicios.indexOf(servicioAQuitar);
  if(index > -1)
  {
    servicios.splice(index, 1); 
  }
  $('#serviciosActivos').html("");
    servicios.map((servicio) => {
      $('#serviciosActivos').append('<option value="'+servicio.id+'">'+servicio.nombre+'</option>');
  });
});

$("#kt_register").on("click", function(e){
  e.preventDefault();
  $.ajax({
    url: '<?php echo $root;?>rutas.php/profesionales/servicios/update/<?php echo $pr;?>',
    type: 'POST',
    contentType: "application/json; charset=utf-8",
    data: JSON.stringify(servicios),
    success: function(response){
      alert("Servicios actualizados correctamente");
    }
  });
});

  </script>
    <?php
    include 'components/footer.php';
    include 'components/scripts.php';
    ?>
  </body>
</html>