<?php
header('Content-Type: application/json'); // Establecer el tipo de respuesta como JSON

// Obtener los datos enviados en formato JSON
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si los datos fueron enviados correctamente
if (empty($data['email']) || empty($data['password'])) {
    echo json_encode(['success' => false, 'error' => 'Faltan los campos requeridos']);
    exit;
}

// Incluir la configuración de la base de datos
include_once('php_lib/config.ini.php');

// Conectar a la base de datos
$link = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);
if (!$link) {
    echo json_encode(['success' => false, 'error' => 'Error al conectar al servidor mysql']);
    exit;
}

// Seleccionar la base de datos activa
$db_selected = mysqli_select_db($link, BASE_DATOS);
if (!$db_selected) {
    echo json_encode(['success' => false, 'error' => 'Error al conectar a la base de datos']);
    exit;
}

mysqli_set_charset($link, "utf8");

// Obtener los datos del formulario
$email = $data['email'];
$password = $data['password'];

// Validación de la contraseña
if (strlen($password) < 8) {
    echo json_encode(['success' => false, 'error' => 'La contraseña debe tener al menos 8 caracteres']);
    exit;
}

if (!preg_match('/[A-Z]/', $password)) {
    echo json_encode(['success' => false, 'error' => 'La contraseña debe contener al menos una letra mayúscula']);
    exit;
}

if (!preg_match('/[a-z]/', $password)) {
    echo json_encode(['success' => false, 'error' => 'La contraseña debe contener al menos una letra minúscula']);
    exit;
}

if (!preg_match('/\d/', $password)) {
    echo json_encode(['success' => false, 'error' => 'La contraseña debe contener al menos un número']);
    exit;
}

// Validar si el correo ya está registrado
$query_check_email = "SELECT COUNT(*) AS total FROM users WHERE email = '$email'";
$result_check = mysqli_query($link, $query_check_email);
$row = mysqli_fetch_assoc($result_check);
if ($row['total'] > 0) {
    echo json_encode(['success' => false, 'error' => 'Este correo ya está registrado']);
    exit;
}

// Cifrar la contraseña
$hashed_pass = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);

// Insertar el nuevo usuario en la base de datos
$query = "INSERT INTO users (email, password, otp) VALUES ('$email', '$hashed_pass', '$password')";
if (mysqli_query($link, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
}

// Cerrar la conexión a la base de datos
mysqli_close($link);
?>