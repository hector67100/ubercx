<?php
$root = "../";
include_once('../php_lib/config.ini.php');
include '../logica/panel-info.php';
include '../logica/profesionalController.php';

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
$profesional = (new ProfesionalController())->getProfesionales($link, $pr);
$profesional = $profesional[0];
$panelinfo = new PanelInfo();
$sexo = $panelinfo->getSexo($link);
$cabello = $panelinfo->getCabello($link);
$provincia = $panelinfo->getProvincia($link);
$piel = $panelinfo->getPiel($link);
$complexion = $panelinfo->getComplexion($link);
$pechos = $panelinfo->getPechos($link);
$ciudad = $panelinfo->getCiudad($link, $profesional["pais"]);
$codigo = "";

foreach($provincia as $row)
{

  if($row["id"] == $profesional["pais"])
  {
    $codigo = $row["codigo"];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../mediasQuerys.css" />
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
            background-image: url(<?php echo $root;?>assets/cover.jpg);
            background-size: cover;
            background-position: center;
        }

        .imagen-registro1
        {
            background-image: url(<?php echo $root;?>assets/cover1.jpg);
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
          width: 90%;
          background-color: #f0f0f0;
          color: #666;
          font-weight: bold;
          padding: 10px 0;
          text-align: center;
          border-radius: 12px;
          font-size:20px;
          margin: 0 auto 5%;
        }

        .telefono input
        {
            width: 80%;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            position:relative;
        }

        .telefono select
        {
          width: 20%;
          text-align: center;
          border-radius: 0px;
          border-top-left-radius: 12px;
          border-bottom-left-radius: 12px;
          text-align: right;
        }

        .title
        {
          margin: 0 auto 9%;
        }

        .subtitle
        {
          font-size: 20px;
          color: #666;
        }

        .div-96
        {
          width: 96%;
        }

        .caracteristicas label
        {
          color: #666;
          font-size: 20px;
          display: block;
        }

        .caracteristicas p
        {
          color: #666;
          font-size: 20px;
          margin: auto auto auto 4%;
        }

        .caracteristicas input
        {
          margin: auto 0 auto auto;
          width: 50%;
        }

        .input-file
        {
          position: relative;
          display: flex;
          width: 65%;
          padding: 20px;
          margin: auto;
          background-color: #f0f0f0;
          border-radius: 20px;
          cursor: pointer;
          background-size: 100% 100%;
          background-repeat: no-repeat;
        }

        .input-file input[type="file"]
        {
          position: absolute;
          width: 100%;
          opacity: 0;
          cursor: pointer;
          top:0;
          left: 0;
          height: 100%;
          margin: 0;
        }

        .input-file img
        {
          margin: auto;
          cursor: pointer;
          max-height: 150px;
        }

        .telefono
        {
          position: relative;
        }

        .telefono img
        {
            position: absolute;
            top: 10%;
            width: 50px;
            left: 4%;
        }
        
        #imagen-registro
        {
          transition: 1s;
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

          .telefono img
          {
            display:none;
          }

          .caracteristicas p
          {
            margin: auto auto 3%;
          }

          .caracteristicas input
          {
            margin: auto;
            
          }
        }
	</style>
  </head>
  <body>
    <?php
        include '../navbar.php';
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
                      <h3 class="text-2xl lg:text-4xl text-center font-bold title">
                      Crear Cuenta Profesional
                      </h3>
                      <div class="flex ">
                        <div class="w-1/2 flex flex-col">
                          <input
                            type="text"
                            required="true"
                            name="nombre"
                            class="general-input"
                            placeholder="Jane"
                            value="<?php echo $profesional["nombre"];?>"
                          />
                          <select
                            required="true"
                            name="pais"
                            class="general-input"
                          >
                            <option value="">Seleccione un país</option>
                            <?php
                              foreach($provincia as $row)
                              {
                                if($row["id"] == $profesional["pais"])
                                {
                                  echo '<option value="'.$row["id"].'" selected="selected">'.$row["name"].'</option>';
                                }
                                else
                                {
                                  echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                }
                              }
                            ?>
                          </select>
                          <select
                            required="true"
                            name="sexo"
                            class="general-input"
                          >
                            <option value="">Seleccione su sexo</option>
                            <?php
                              foreach($sexo as $row)
                              {
                                if($row["id"] == $profesional["sexo"])
                                {
                                  echo '<option value="'.$row["id"].'" selected>'.$row["descripcion"].'</option>';
                                }
                                else
                                {
                                  echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>';
                                }
                              }
                            ?>
                          </select>
                        </div>
                        <div class="w-1/2 flex flex-col">
                          <input
                              type="text"
                              required="true"
                              name="apellido"
                              class="general-input"
                              placeholder="Jane"
                              value="<?php echo $profesional["apellido"];?>"
                            />
                            <select
                            required="true"
                            name="ciudad"
                            class="general-input"
                          >
                              <option value="">Seleccione una ciudad</option>
                            <?php
                              foreach($ciudad as $row)
                              {
                                if($row["id"] == $profesional["ciudad"])
                                {
                                  echo '<option value="'.$row["id"].'" selected="selected">'.$row["name"].'</option>';
                                }
                                else
                                {
                                  echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                }
                              }
                            ?>
                          </select>
                          <input
                              type="date"
                              required="true"
                              name="fecha"
                              class="general-input"
                              placeholder="Jane"
                              value="<?php echo $profesional["fecha"];?>"
                            />
                        </div>
                      </div>
                      
                      <div class="div-96 m-auto">
                        <h3 class="font-bold mb-5 subtitle">Telefono Móvil:</h3>
                        <div class="flex telefono">
                          <img src="<?php echo $root;?>/img/espana.png">
                            <select name="codigo" class="general-input">
                                <?php
                                  foreach($provincia as $row)
                                  {
                                    if($row["codigo"] == $codigo)
                                    {
                                      echo '<option value="'.$row["codigo"].'" selected>'.$row["codigo"].'</option>';
                                    }
                                    else
                                    {
                                      echo '<option value="'.$row["codigo"].'">'.$row["codigo"].'</option>';
                                    }

                                  }
                                ?>
                            </select>
                            
                          <input
                            type="phone"
                            required="true"
                            name="tel"
                            class="general-input"
                            placeholder="123456789"
                            value="<?php echo str_replace($codigo,"", $profesional["telefono"]);?>"
                          />
                        </div>
                      </div>
                      <button
                        id="kt_register_submit_2"
                          class="m-auto w-3/4 h-14 rounded-2xl uppercase text-white bg-red disabled:opacity-50 enabled:hover:bg-purple-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100 shadow-sm font-bold"
                        >
                        SIGUIENTE...
                        </button>
                    </div>
                    <div id="form-3" class="flex flex-col hide">
                      <h3 class="text-2xl lg:text-4xl text-center font-bold title">
                      Crear Cuenta Profesional
                      </h3>
                      <div class="flex ">
                        <div class="w-1/2 flex flex-col">
                          <select
                              required="true"
                              name="cabello"
                              class="general-input"
                            >
                              <option value="" >Seleccione su color de cabello</option>
                              <?php
                              foreach($cabello as $row)
                                {
                                  if($row["id"] == $profesional["cabello"])
                                  {
                                    echo '<option value="'.$row["id"].'" selected>'.$row["descripcion"].'</option>';
                                  }
                                  else
                                  {
                                    echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>';
                                  }
                                }
                                ?>
                          </select>
                          <select
                            required="true"
                            name="piel"
                            class="general-input"
                          >
                            <option value="">Seleccione su color de piel</option>
                            <?php
                              foreach($piel as $row)
                              {
                                if($row["id"] == $profesional["piel"])
                                {
                                  echo '<option value="'.$row["id"].'" selected>'.$row["descripcion"].'</option>';
                                }
                                else
                                {
                                  echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>';
                                }
                              }
                            ?>
                          </select>
                          <select
                            required="true"
                            name="pechos"
                            class="general-input"
                          >
                              <option value="" selected>Seleccione su tamaño de pechos</option>
                              <?php 
                                foreach($pechos as $row)
                                {
                                  if($row["id"] == $profesional["medida_pechos"])
                                  {
                                    echo '<option value="'.$row["id"].'" selected>'.$row["descripcion"].'</option>';
                                  }
                                  else
                                  {
                                    echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>';
                                  }
                                }
                              ?>
                          </select>
                        </div>
                        <div class="w-1/2 flex flex-col">
                          <select
                            required="true"
                            name="complexion"
                            class="general-input"
                          >
                              <option value="">Seleccione su complexión</option>
                              <?php
                                foreach($complexion as $row)
                                {
                                  if($row["id"] == $profesional["complexion"])
                                  {
                                    echo '<option value="'.$row["id"].'" selected>'.$row["descripcion"].'</option>';
                                  }
                                  else
                                  {
                                    echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>';
                                  }
                                }
                                ?>
                          </select>
                          <select
                            required="true"
                            name="objetivo[]"
                            class="general-input select-multiple"
                            multiple
                          >
                          <option value="" >Atención a?</option>
                            <?php
                              foreach($sexo as $row)
                              {
                                echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="m-auto mb-16 flex w-full">
                        <div class="caracteristicas w-1/2">
                          <label for="altura" class="font-bold mb-5 subtitle text-center">Altura</label>
                          <div class="flex">
                            <input
                              type="text"
                              required="true"
                              name="altura"
                              class="general-input"
                              placeholder="1.50"
                              value = "<?php echo $profesional["altura"];?>"
                            />
                            <p class="font-bold">Mts.</p>
                          </div>
                        </div>
                        <div class="caracteristicas w-1/2">
                        <label for="altura" class="font-bold mb-5 subtitle text-center">Peso</label>
                          <div class="flex">
                            <input
                              type="text"
                              required="true"
                              name="peso"
                              class="general-input"
                              placeholder="1.50"
                              value = "<?php echo $profesional["peso"];?>"
                            />
                            <p class="font-bold">Kgrs.</p>
                          </div>
                        </div>
                      </div>
                      <button
                        id="kt_register_submit_3"
                          class="m-auto w-3/4 h-14 rounded-2xl uppercase text-white bg-red disabled:opacity-50 enabled:hover:bg-purple-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100 shadow-sm font-bold"
                        >
                        SIGUIENTE...
                        </button>
                    </div>
                    <div id="form-4" class="flex flex-col hide">
                      <h3 class="text-2xl lg:text-4xl text-center font-bold title">
                      Crear Cuenta Profesional
                      </h3>
                      <div class="flex ">
                        <div class="m-auto mt-16 mb-10 flex w-full">
                              <textarea
                                required="true"
                                name="descripcion"
                                rows="4" cols="50"
                                class="general-input p-4 text-left"
                                placeholder="Describe tu Perfil:"
                              >
                                <?php echo $profesional["descripcion"];?>
                              </textarea>
                        </div>
                        <button
                          id="kt_register_submit_4"
                            class="m-auto w-3/4 h-14 rounded-2xl uppercase text-white bg-red disabled:opacity-50 enabled:hover:bg-purple-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100 shadow-sm font-bold"
                          >
                          TERMINAR PERFIL...
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
    var banderas =[];
    $(document).ready(function() {
      fetch('<?php echo $root;?>'+'rutas.php/panel-info/get-paises/', {
              method: 'GET',
          })
          .then(response => response.json()) // Procesar la respuesta JSON
          .then(data => {
              if (data) {
                  // Si el registro fue exitoso, mostrar mensaje o redirigir
                  data.map((pais) => {
                    let bandera = [pais.codigo,pais.image]
                    banderas.push(bandera);
                  });
                  console.log(banderas);
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

      $('#kt_register_submit_2').click(function(e){
        e.preventDefault();
        if($('#form-2 input[name="nombre"]').val() == '' || $('#form-2 input[name="apellido"]').val() == '' || $('#form-2 input[name="fecha"]').val() == '' || $('#form-2 select[name="pais"]').val() == '' || $('#form-2 select[name="sexo"]').val() == '' || $('#form-2 select[name="ciudad"]').val() == '' || $('#form-2 select[name="codigo"]').val() == '' || $('#form-2 input[name="numero"]').val() == ''){
          alert('Por favor llene todos los campos');
          return;
        }
        else
        {
          $('#form-2').addClass('hide');
          $('#form-3').removeClass('hide'); 
          $('#imagen-registro').addClass('imagen-registro1');
          $('#imagen-registro').removeClass('imagen-registro');
        }
      });

      $('#kt_register_submit_3').click(function(e){
        e.preventDefault();
        if($('#form-3 select[name="cabello"]').val() == '' || $('#form-3 select[name="piel"]').val() == '' || $('#form-3 select[name="pechos"]').val() == '' || $('#form-3 select[name="complexion"]').val() == '' || $('#form-3 select[name="complexion1"]').val() == '' || $('#form-3 select[name="objetivo"]').val() == ''){
          alert('Por favor llene todos los campos');
          return;
        }
        else
        {
          $('#form-3').addClass('hide');
          $('#form-4').removeClass('hide');
        }
      });

      $('#kt_register_submit_4').click(function(e){
        e.preventDefault();
        if($('#form-4 input[name="foto"]').val() == '' || $('#form-4 input[name="fotos"]').val() == '' || $('#form-4 textarea[name="descripcion"]').val() == ''){
          alert('Por favor llene todos los campos');
          return;
        }
        else
        {
          var formData = new FormData($('#kt_register_form')[0]);
          formData.append('telefono', $('#form-2 select[name="codigo"]').val()+$('#form-2 input[name="tel"]').val());
          fetch('<?php echo $root;?>'+'rutas.php/profesionales/update/'+<?php echo $profesional["id"] ?>, {
              method: 'POST',
              body: formData,// Enviar los datos como JSON
          })
          .then(response => response.json()) // Procesar la respuesta JSON
          .then(data => {
              data = JSON.parse(data);
              if (data.success) {
                  // Si el registro fue exitoso, mostrar mensaje o redirigir
                  alert('Registro exitoso');
                  window.location.href = "../login.php"; // Redirige al usuario
              } else {
                  // Si hubo errores, mostrar el mensaje de error
                  alert(data.error); // Muestra el mensaje de error que viene del servidor
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('Hubo un problema al registrar el usuario');
          });
        }
      });

      $('input[name="foto"]').on('change', function(){
        
        const archivo = $(this).prop('files');
        const imagen = $(this).parent().find('img');
        if(!archivo || archivo.length == 0)
        {
          // imagen.attr('src', '<?php echo $root;?>/assets/picture.png');
          $(this).parent().css('background-image', 'none)');
          imagen.css('opacity',1);
          return;
        }
        else
        {
          const primerArchivo = archivo[0];
          const objectURL = URL.createObjectURL(primerArchivo);
          imagen.css('opacity',0);
          $(this).parent().css('background-image', 'url('+objectURL+')');
          imagen.attr('src', objectURL);
        }
        console.log($(this).parent().height());
        $(this).css('height', $(this).parent().height()+40);
      });

      $('input[name="fotos[]"]').on('change', function(){
        
        
        const archivos = $(this).prop('files');
        console.log(archivos);
        const parent = $(this).parent().find('img');
        parent.remove('img');
        if(!archivos || archivos.length == 0)
        {
          imagen.attr('src', '<?php echo $root;?>/assets/picture.png');
          return;
        }
        else
        {
          if(archivos.length > 6)
          {
            alert('Solo se permiten 6 fotos adicionales');
            $(this).val('');
            return;
          }
          else
          {
            for(let i = 0; i < archivos.length; i++)
            {

            const objectURL = URL.createObjectURL(archivos[i]);
            $(this).parent().append('<img src="'+objectURL+'" style="width:'+(100/archivos.length)+'%;" />');
            }

          }
        }
        $(this).css('height', $(this).parent().height() > 0 ?$(this).parent().height()+40 : "100%");
      });

      $('#form-2 select[name="codigo"]').on('change', function(){
        const codigo = $(this).val();
        const bandera = banderas.find(bandera => bandera[0] == codigo);
        $('.telefono img').attr('src', '<?php echo $root;?>/img/'+bandera[1]);
      });

      $('#form-2 select[name="pais"]').on('change', function(){
        const pais = $(this).val();
        fetch('<?php echo $root;?>'+'rutas.php/panel-info/get-ciudades/'+pais, {
              method: 'GET',
          })
          .then(response => response.json()) // Procesar la respuesta JSON
          .then(data => {
              if (data) {
                  // Si el registro fue exitoso, mostrar mensaje o redirigir
                  $('#form-2 select[name="ciudad"]').html('');
                  $('#form-2 select[name="ciudad"]').append('<option value="">Seleccione una ciudad</option>');
                  data.map((ciudad) => {
                    $('#form-2 select[name="ciudad"]').append('<option value="'+ciudad.id+'">'+ciudad.name+'</option>');
                  });
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
    <?php
    include 'components/footer.php';
    include 'components/scripts.php';
    ?>
  </body>
</html>