<?php
require 'vendor/autoload.php'; #Cargar todas las dependencias
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
include 'logica/panel-info.php';
include 'logica/BDcon.php';
include 'logica/profesionalController.php';


$collector = new RouteCollector();

$collector->get('/profesionales', function() {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->getProfesionales($link);
    return json_encode($profesional);
});

$collector->get('/profesionales/{id}', function($id) {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->getProfesionales($link,$id);
    return json_encode($profesional);
});

$collector->post('/profesionales/register', function() {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->updateProfesional($link,$id);
    return json_encode($profesional);
});

$collector->get('/profesionales/perfil/{id}', function($id) {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->getProfesionalesPerfil($link,$id);
    return json_encode($profesional);
});


$collector->get('/profesionales/ciudad/{ciudad}', function($ciudad) {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->getProfesionalByCiudad($link,$ciudad);
    return json_encode($profesional);
});

$collector->post('/profesionales/update/{id}', function($id) {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->updateProfesional($link,$id);
    return json_encode($profesional);
});

$collector->post('/profesionales/update/{id}', function($id) {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->updateProfesional($link,$id);
    return json_encode($profesional);
});

$collector->post('/profesionales/update/pictures/{id}', function($id) {

    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->updateProfesionalPictures($link,$id,$_FILES["foto"],$_FILES["fotos"]);
    return json_encode($profesional);
});

$collector->get('/profesionales/servicios/{id}', function($id) {
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->getProfesionalesServicios($link,$id);
    return json_encode($profesional);
});

$collector->post('/profesionales/servicios/update/{id}', function($id) {
    $data = json_decode(file_get_contents('php://input'), true);
    $link = (new BDcon())->conect();
    $profesional = (new ProfesionalController())->updateProfesionalesServicios($link,$id,$data);
    return json_encode($profesional);
});

$collector->get('/panel-info/get-ciudades/{id}', function($id) {
    $link = (new BDcon())->conect();
    $ciudades = (new PanelInfo())->getCiudad($link, $id);
    return json_encode($ciudades);
});


$collector->get('/panel-info/get-paises', function() {
    $link = (new BDcon())->conect();
    $ciudades = (new PanelInfo())->getProvinciaData($link);
    return json_encode($ciudades);
});

$despachador = new Dispatcher($collector->getData());
$rutaCompleta = str_replace("/rutas.php","", $_SERVER["REQUEST_URI"]);
$metodo = $_SERVER['REQUEST_METHOD'];

try {
    echo $despachador->dispatch($metodo, $rutaCompleta); # Mandar sólo el método y la ruta limpia
} catch (HttpRouteNotFoundException $e) {
    echo $e;
} catch (HttpMethodNotAllowedException $e) {
    echo "Error: Ruta encontrada pero método no permitido";
}

?>