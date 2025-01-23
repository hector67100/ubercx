<?php
/* 
 * Cierra la sesi贸n como usuario validado
 */

include('php_lib/login.lib.php'); //incluimos las funciones
logout(); //vacia la session del usuario actual
header('Location: login.php'); //saltamos a login.php

?>
