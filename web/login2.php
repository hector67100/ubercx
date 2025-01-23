<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // ¿Nos mandan datos por el formulario?
    include('php_lib/config.ini.php'); // incluimos configuración
    include('php_lib/login.lib.php'); // incluimos las funciones

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
	$cedula=$_POST['email'];
	$pass=$_POST['password'];
	$query = "SELECT * FROM users WHERE email = '$cedula' AND otp = '$pass'";
             $result = mysqli_query($link,$query);
             $numero=1;
             while ($row = mysqli_fetch_assoc($result)) {
                    $hash = $row["password"];
              }

    // verificamos el usuario y contraseña mandados
    if (login($_POST['email'], $_POST['password'])) {
        // Acciones a realizar cuando un usuario se identifica
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'hash' => $hash]); // Respuesta JSON de éxito
        exit;
    } else {
        // Respuesta JSON de error
        header('Content-Type: application/json');
        echo json_encode(['success' => false]); // Respuesta JSON de fallo
        exit;
    }
}
?>