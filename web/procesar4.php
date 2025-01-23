<?php
// Incluir el archivo de configuración para conectar a la base de datos
include_once('php_lib/config.ini.php');

// Conexión al servidor MySQL
$link = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);
if (!$link) {
    trigger_error('Error al conectar al servidor MySQL: ' . mysqli_connect_error());
}

// Seleccionar la base de datos
$db_selected = mysqli_select_db($link, BASE_DATOS);
if (!$db_selected) {
    trigger_error('Error al conectar a la base de datos: ' . mysqli_error($link));
}

// Configurar la codificación de caracteres
mysqli_set_charset($link, "utf8");

// Obtener los datos del formulario
$hash=$_REQUEST['h'];

$query = "SELECT * FROM users WHERE password = '$hash'";
$result = mysqli_query($link,$query);
while ($row = mysqli_fetch_assoc($result)) {
$idcliente = $row["id"];
}
$query2 = "SELECT * FROM clientes WHERE idcliente = '$idcliente'";
$result2 = mysqli_query($link,$query2);
$numero=0;
while ($row2 = mysqli_fetch_assoc($result2)) {
$numero++;
}
if($numero>0){
$query3 = "DELETE FROM clientes WHERE idcliente = $idcliente";
mysqli_query($link, $query3);}


$ciudad = $_REQUEST['ciudad'];
$localidad = $_REQUEST['localidad'];
$color_cabello = $_REQUEST['colorCabello'];
$tipo_piel = $_REQUEST['tipoPiel'];
$complexion = $_REQUEST['complexion'];
$peso = $_REQUEST['peso'];
$altura = $_REQUEST['altura'];
$medida_pechos = $_REQUEST['medidaPechos'];
$pechos_naturales = isset($_REQUEST['pechosNaturales']) ? 1 : 0; // Usamos 1 para 'Sí' y 0 para 'No'

$edad = $_REQUEST['edad']; // Edad
$nombres = $_REQUEST['nombres']; // Nombres
$descripcion = $_REQUEST['descripcion']; // Descripción
$genero = $_REQUEST['genero'];

// Campos para hombre, mujer, y parejas
$hombre = isset($_REQUEST['hombre']) ? 1 : 0;
$mujer = isset($_REQUEST['mujer']) ? 1 : 0;
$parejas = isset($_REQUEST['parejas']) ? 1 : 0;

// Obtener la imagen en base64 y el tipo de imagen
$imagen_base64 = isset($_REQUEST['imagen_base64']) ? $_REQUEST['imagen_base64'] : ''; // Imagen en base64
$tipo_imagen = isset($_REQUEST['tipoimagen']) ? $_REQUEST['tipoimagen'] : ''; // Tipo de imagen (por ejemplo, image/jpeg, image/png)
/*
echo "Ciudad: " . $ciudad . "<br>";
echo "Localidad: " . $localidad . "<br>";
echo "Color de Cabello: " . $color_cabello . "<br>";
echo "Tipo de Piel: " . $tipo_piel . "<br>";
echo "Complexión: " . $complexion . "<br>";
echo "Peso: " . $peso . "<br>";
echo "Altura: " . $altura . "<br>";
echo "Medida Pechos: " . $medida_pechos . "<br>";
echo "Pechos Naturales: " . ($pechos_naturales ? 'Sí' : 'No') . "<br>";
echo "Edad: " . $edad . "<br>";
echo "Nombres: " . $nombres . "<br>";
echo "Descripción: " . $descripcion . "<br>";

echo "Hombre: " . ($hombre ? 'Sí' : 'No') . "<br>";
echo "Mujer: " . ($mujer ? 'Sí' : 'No') . "<br>";
echo "Parejas: " . ($parejas ? 'Sí' : 'No') . "<br>";

echo "Imagen Base64: " . (empty($imagen_base64) ? 'No proporcionada' : 'Proporcionada') . "<br>";
echo "Tipo de Imagen: " . (empty($tipo_imagen) ? 'No proporcionado' : $tipo_imagen) . "<br>";
*/
// Sentencia SQL con parámetros
$query = "INSERT INTO clientes 
(ciudad, localidad, color_cabello, tipo_piel, complexion, peso, altura, medida_pechos, pechos_naturales, edad, hombre, mujer, parejas, nombres, descripcion, idcliente, imagen_base64, tipoimagen, genero) 
VALUES ('$ciudad', '$localidad', '$color_cabello', '$tipo_piel', '$complexion', '$peso', '$altura', '$medida_pechos',
'$pechos_naturales', '$edad', '$hombre', '$mujer', '$parejas', '$nombres', '$descripcion', '$idcliente', '$imagen_base64', '$tipo_imagen', '$genero')";

mysqli_query($link, $query);
// Cerrar la conexión
mysqli_close($link);


header("Location: miperfil.php?h=$hash");

?>