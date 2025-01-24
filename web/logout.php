<?php
/* 
 * Cierra la sesi贸n como usuario validado
 */
session_start(); //iniciamos la sesion
include('php_lib/login.lib.php'); //incluimos las funciones
$_SESSION["profesional"] = null; //borramos la variable de sesion
logout(); //vacia la session del usuario actual
header('Location: login.php'); //saltamos a login.php

?>
