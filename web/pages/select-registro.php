<?php
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


        .imagen
        {
            background-image: url('../assets/banner2.jpg');
            background-size: contain;
            background-position: left bottom;
            background-repeat: no-repeat;
        }

        .flex 
        {
            display: flex;
        }

        .container-select 
        {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .container-select img
        {
            max-width: 60%;
            margin-top: 5%;
        }

        .container-select .text-container 
        {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 10px;
            width: 80%;
        }

        .m-auto
        {
            margin: auto;
        }

        .container-select .text-container h2
        {
            font-size: 25px;
            margin: 5% auto ;
        }

        .container-select .text-container .text
        {
            font-weight: bold;
            margin: 0 auto 2% 2%;
        }

        .container-select .text-container img
        {
            margin: auto 0;
        }

        .container-select .text-container:nth-child(1) 
        {
            margin: 12% auto 5%;
        }

        .container-select .text-container:nth-child(2) 
        {
            margin: 0 auto 12%;
        }

        .container-select .text-container:nth-child(1) h2
        {
            color: #59baec;
        }

        .container-select .text-container:nth-child(2) h2
        {
            color: #ff347c;
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
            <div class='container-select botones'>
                <button class="text-container" onclick="location.href='../register.php'">
                    <img src="./../assets/bunnyblue.png">
                    <div class="text">
                        <h2>Registrate como Usuario!</h1>
                        <ul>
                            <li>Acceso a cientos de Scorts verificadas</li>
                            <li>Plataforma 100% segura de pagos</li>
                            <li>Tarifas 100% visibles sin sorpresas</li>
                            <li>Buscador por ciudad, favoritos y más...</li>
                        </ul>
                    </div>
                </button>
                <button class="text-container" onclick="location.href='profesional-registrer.php'">
                    <img src="./../assets/pinkbunny.png">
                    <div class="text">
                        <h2>Registrate como Profesional!</h1>
                        <ul>
                            <li>Publicidad 24/7 en nuestra plataforma con más de 10.000 
                            clientes mensuales </li>
                            <li>Plataforma 100% segura de pagos</li>
                            <li>Agenda, notificaciones y contacto soporte</li>
                            <li>App Android de gestiòn, pagos instantaneos</li>
                        </ul>
                    </div>
                </button>
            </div>
            <div class='container-select imagen'>
            </div>
        </div>
    </div>
    <?php
    include 'components/footer.php';
    include 'components/scripts.php';
    ?>
  </body>
</html>