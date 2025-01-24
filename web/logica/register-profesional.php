<?php
header('Content-Type: application/json'); // Establecer el tipo de respuesta como JSON

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
// Obtener los datos enviados en formato JSON


// Verificar si los datos fueron enviados correctamente
if (empty($_POST['email']) || empty($_POST['password'])) {
    echo json_encode(['success' => false, 'error' => 'Faltan los campos requeridos']);
    exit;
}

// Incluir la configuración de la base de datos
include_once('../php_lib/config.ini.php');

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
$email = $_POST['email'];
$password = $_POST['password'];

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
var_dump($_POST);
die();
// Insertar el nuevo usuario en la base de datos
$query = "INSERT INTO users (email, password, otp) VALUES ('$email', '$hashed_pass', '$password')";
if (mysqli_query($link, $query)) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $fecha = $_POST['fecha'];
    $cabello = $_POST['cabello'];
    $piel = $_POST['piel'];
    $email = $_POST['email'];
    $complexion = $_POST['complexion'];
    $sexo = $_POST['sexo'];
    $medida_pechos = $_POST['pechos'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $objetivo = json_encode($_POST['objetivo']);
    $descripcion = $_POST['descripcion'];

    $query1 = "INSERT INTO profesionales (nombre,email,password,apellido,pais,telefono,ciudad,fecha,cabello,piel,complexion,sexo,medida_pechos,altura,peso,descripcion,objetivo) 
    VALUES ('$nombre','$email','$password','$apellido','$pais','$telefono','$ciudad','$fecha','$cabello','$piel','$complexion','$sexo','$medida_pechos',$altura,$peso,'$descripcion','$objetivo')";
        if (mysqli_query($link, $query1)) {
            $query = "SELECT id from profesionales where email = '$email'";
            $result2 = mysqli_query($link, $query);
            $profesionalesId = mysqli_fetch_assoc($result2)["id"];
            $ruta = '../profesionales/'.$_POST['email'];
            if($_FILES["foto"]["error"] > 0)
            {

            }
            else
            {
                $archivonombre = $_FILES["foto"]["name"];
                $fuente = $_FILES["foto"]["tmp_name"];

                if(!file_exists($ruta)){
                    mkdir($ruta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
                }

                $directorio = opendir($ruta); //ruta actual
                $target_path = $ruta.'/'.$archivonombre;
                if(move_uploaded_file($fuente, $target_path)) 
                {
                    $query1="INSERT INTO fotos (userId, ruta) VALUES ('$profesionalesId','$target_path')";
                    if (mysqli_query($link, $query1)) 
                    {
                        $query2="select * from fotos where userId = '$profesionalesId' and ruta = '$target_path'";
                        $idfoto = mysqli_fetch_assoc(mysqli_query($link, $query2))["idfotos"];
                        if(mysqli_query($link, $query2))
                        {
                            $query3 = "update profesionales set fotoPrincipal = '$idfoto' where id = '$profesionalesId'";
                            if(mysqli_query($link, $query3))
                            {
                               
                            }
                            else
                            {
                                
                            }
                        }
                        else
                        {
                            
                        }
                    }
                } 
                else 
                {
                    
                }
                closedir($directorio);

            }

            if($_FILES["fotos"]["name"] < 1)
            {
                
            }
            else
            {
                $json =[];
                if($_FILES["fotos"]["name"] < 2)
                {
                    $archivonombre = $_FILES["fotos"]["name"];
                    $fuente = $_FILES["fotos"]["tmp_name"];
                    $target_path = $ruta.'/'.$archivonombre;
                    if(move_uploaded_file($fuente, $target_path)) {


                      
                        $query1="INSERT INTO fotos (userId, ruta) VALUES ('$profesionalesId','$target_path')";
                        if (mysqli_query($link, $query1)) 
                        {
                            $query2="select * from fotos where userId = '$profesionalesId' and ruta = '$target_path'";
                            $idfoto = mysqli_fetch_assoc(mysqli_query($link, $query2))["idfotos"];
                            array_push($json, $idfoto);
                            if(mysqli_query($link, $query2))
                            {
                                
                                $query3 = "update profesionales set fotos = '".json_encode($json)."' where id = '$profesionalesId'";
                                if(mysqli_query($link, $query3))
                                {
                                    
                                }
                                else
                                {
                                   
                                }
                            }
                            else
                            {
                               
                            }
                        }
                    } else {
                        
                    }
                }
                else
                {
                    foreach($_FILES["fotos"]['tmp_name'] as $key => $tmp_name)
                    {
                        $archivonombre = $_FILES["fotos"]["name"][$key];
                        $fuente = $_FILES["fotos"]["tmp_name"][$key];
                        $target_path = $ruta.'/'.$archivonombre;
                        if(move_uploaded_file($fuente, $target_path)) {
                           
                            $query1="INSERT INTO fotos (userId, ruta) VALUES ('$profesionalesId','$target_path')";
                            if (mysqli_query($link, $query1)) 
                            {
                                $query2="select * from fotos where userId = '$profesionalesId' and ruta = '$target_path' limit 1";
                                
                                $idfoto = mysqli_fetch_assoc(mysqli_query($link, $query2))["idfotos"];
                                array_push($json, $idfoto);
                                if(mysqli_query($link, $query2))
                                {
                                    $query3 = "update profesionales set fotos = '".json_encode($json)."' where id = '$profesionalesId'";
                                    if(mysqli_query($link, $query3))
                                    {
                                      
                                    }
                                    else
                                    {
                                        echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
                                    }
                                }
                                else
                                {
                                    echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
                                }
                            }
                        } else {
                            echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
                        }
                    }
                }
            }
            echo json_encode(['success' => true]);
        } 
        else 
        {
            echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
        }
} else {
    echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
}
    

// Cerrar la conexión a la base de datos
mysqli_close($link);
?>