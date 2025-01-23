<?php
// Conectamos a la base de datos
include_once('php_lib/config.ini.php');

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

if (isset($_GET['provincia_id'])) {
    $provincia_id = (int)$_GET['provincia_id'];

    // Consulta para obtener las ciudades de la provincia seleccionada
    $query = "SELECT * FROM tags WHERE status = $provincia_id";
    $result = mysqli_query($link, $query);

    $cities = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = [
            'id' => $row['id'],
            'name' => $row['name']
        ];
    }

    // Devolver los datos en formato JSON
    echo json_encode($cities);
}
?>