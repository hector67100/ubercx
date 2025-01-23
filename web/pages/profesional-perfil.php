<?php
$root ="../";
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
$profesional = (new ProfesionalController())->getProfesionalesPerfil($link, $pr);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uber-Sex</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../mediasQuerys.css" />
    <link rel="stylesheet" href="../input.css" />
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

        body
        {
            background-color: #f0f0f0;
        }

        .flex 
        {
            display: flex;
        }

        .container-select 
        {
            width: 100%;
            display: flex;
            flex-direction: column;
            font-size: 30px;
            background-color: #ffffff;
            margin: 5% 0;
            border-radius: 50px;
        }

        .billetera-cantidad
        {
            font-weight: bold;
        }

        .perfil
        {
            width: 60%;
        }

        .perfil-botones
        {
            width: 35%;
        }

        .imagen-perfil
        {
            background-image: url("<?php echo $root.$profesional["ruta"];?>");
            background-size: cover;
            background-position: center;
            border-radius: 55px;
            margin-top: 4%;

        }

        .perfil-billetera
        {
            margin-top: 5%;
        }

        .billetera-texto img
        {
            margin:auto 3% auto auto ;
        }

        .billetera-texto p
        {
            margin:auto auto auto 3% ;
        }

        .billetera-cantidad
        {
            font-weight: bold;
            width: 80%;
            margin: 0 auto;
            background-color: #de1e14;
            padding: 10px 0;
            border-radius: 15px;
        }

        .perfil-billetera .botones
        {
            background-color: #333;
            width: 40%;
            margin: 3% auto;
            display: block;
            font-size: 20px;
            border-radius: 12px;
            color: white;
            font-weight: initial;
            padding: 1% 0;
        }

        .billetera-cantidad p
        {
            color: white;
            text-align: center;
        }

        .log-out
        {
            display: flex;
        }

        .log-out button
        {
            display: flex;
            font-size: 20px;
            text-align: center;
            margin: auto 3% auto auto;
            width: 40%;
        }

        .log-out button p
        {
            margin: auto 5% auto auto;
        }

        .perfil-boton p
        {
            font-size: 20px;
            text-align: center;
            margin-top: 25%;
            margin-bottom: 10px;
        }

        .perfil-boton .botones
        {
            background-color: white;
            padding: 10px;
            border: 3px solid #f0f0f0;
            border-radius: 55px;
            position: relative;
            max-width: 244px;
            width: 100vh;
        }

        .perfil-boton .botones img
        {
            margin-bottom: 16%;
        }

        .perfil-boton .botones p
        {
            position: absolute;
            bottom: 0;
            right: 15%;
            color: #de1e14;
            font-weight: bold;
            font-size: 50px;
            margin: 0;
        }

        .perfil-boton:nth-child(2) .botones
        {
            padding: 0;
            background-color: #f0f0f0;
        }

        .perfil-boton:nth-child(2) .botones img
        {
            margin: auto;
        }

        .perfil-boton:nth-child(2) .botones p
        {
            position: relative;
            right: auto;
        }

        .boton-opciones
        {
            margin: 3% 1%;
        }

        .boton-opciones:nth-child(1)
        {
            margin-left: auto;
        }

        .boton-opciones:nth-child(4)
        {
            margin-right: auto;
        }

        .boton-opciones .imagen
        {
            background-color: #f0f0f0;
            padding: 3px;
            border: 3px solid #f0f0f0;
            border-radius: 55px;
            position: relative;
            max-width: 220px;
            width: 100vh;
            max-height: 166px;
            height: 100%;
        }

        .boton-opciones .imagen img
        {
            margin:auto;
        }

        .flotando
        {
            position: absolute;
            bottom: 0;
            right:  13%;
        }

        @media (max-width: 768px) {

            .imagen
            {
                display: none;
            }

            .container-select .text-container 
            {
                flex-direction: column;

            }

            .botones
            {
                width: 100%;
            }

            .container-select .text-container .text
            {
                margin: 0 auto 2%;
            }

            .container-select .text-container h2
            {
                font-size: 25px;
                margin: 0 auto 5%  ;
            }

        }
	</style>
  </head>
  <body>
    <?php
        include 'components/navbar.php';
    ?>
    <div class="container m-auto">
        <div class="flex">
            <div class='container-select'>
                <div class="flex">
                    <div class="perfil m-auto flex flex-row">
                        <div class="imagen-perfil w-1/2">
                        </div>
                        <div class="perfil-billetera w-1/2">
                            <h1 class="text-center">Bienvenid@:<?php echo $profesional["nombre"]?></h2>
                            <div class="flex billetera-texto">
                                <img src="<?php echo $root;?>assets/icon-billetera.png" alt="">
                                <p clas>Mi Billetera</p>
                            </div>
                            <div class="billetera-cantidad">
                                <p>USD: 2.354,50</p>
                            </div>
                            <button class="botones">Retirar</button>
                        </div>
                    </div>
                    <div class="perfil-botones m-auto">
                        <div class="log-out">
                            <button class="botones" onclick="location.href='<?php echo $root;?>logout.php'">
                                <p>Cerrar sesión</p>
                                <img src="<?php echo $root;?>assets/icon-logout.png" alt=""> 
                            </button>
                        </div>
                        <div class="flex">
                            <div class="perfil-boton">
                                <p>Visitas a tu Perfil este Mes</p>
                                <button class="botones">
                                    <img src="<?php echo $root;?>assets/boton1.png" alt=""> 
                                    <p>23.340</p>
                                </button>
                            </div>
                            <div class="perfil-boton m-auto">
                                <p>Clientes en Agenda</p>
                                <button class="botones">
                                    <img src="<?php echo $root;?>assets/calendario.png" alt=""> 
                                    <p>12</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <button class="boton-opciones" id="perfil">
                        <div class="imagen">
                            <img src="<?php echo $root;?>assets/icon-editarperfil.png" alt="">
                        </div>
                        <p>Editar Perfil</p>
                    </button>
                    <button class="boton-opciones" id="fotos">
                        <div class="imagen">
                            <img src="<?php echo $root;?>assets/icon-subirfotos.png" alt="">
                        </div>
                        <p>Mis Fotos</p>
                    </button>
                    <button class="boton-opciones" id="tarifas">
                        <div class="imagen">
                            <img src="<?php echo $root;?>assets/icon-tarifas.png" alt="">
                        </div>
                        <p>Mis Tarifas</p>
                    </button>
                    <button class="boton-opciones" id="ajustes">
                        <div class="imagen ">
                        <img class="flotando" src="<?php echo $root;?>assets/icon-config.png" alt="">
                        </div>
                        <p>Mis Ajustes</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            console.log("ready");
            $("#perfil").on('click',function(){
                console.log("click");
                window.location.href = "<?php echo $root;?>pages/profesional-update.php?pr=<?php echo $pr;?>";
            });
            $("#fotos").click(function(){
                window.location.href = "<?php echo $root;?>pages/profesional-update-pictures.php?pr=<?php echo $pr;?>";
            });
            $("#tarifas").click(function(){
                window.location.href = "<?php echo $root;?>pages/profesional-services.php?pr=<?php echo $pr;?>";
            });
            // $("#ajustes").click(function(){
            //     window.location.href = "<?php echo $root;?>pages/mis-ajustes.php";
            // });
        });
    </script>
    <?php
    include 'components/footer.php';
    include 'components/scripts.php';
    ?>
  </body>
</html>