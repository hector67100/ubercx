<?php
class ProfesionalController
{

    public function registerProfesional($link,$post,$file)
    {
        $email = $post['email'];
        $password = $post['password'];
        
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
        $link = mysqli_connect("localhost", "root", "", "megacobc_ubercx");
        
        // Cifrar la contraseña
        $hashed_pass = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
        
        // Insertar el nuevo usuario en la base de datos
        $query = "INSERT INTO users (email, password, otp) VALUES ('$email', '$hashed_pass', '$password')";
        if (mysqli_query($link, $query)) {
            $nombre = $post['nombre'];
            $apellido = $post['apellido'];
            $pais = $post['pais'];
            $telefono = $post['telefono'];
            $ciudad = $post['ciudad'];
            $fecha = $post['fecha'];
            $cabello = $post['cabello'];
            $piel = $post['piel'];
            $email = $post['email'];
            $complexion = $post['complexion'];
            $sexo = $post['sexo'];
            $medida_pechos = $post['pechos'];
            $altura = $post['altura'];
            $peso = $post['peso'];
            $objetivo = json_encode($post['objetivo']);
            $descripcion = $post['descripcion'];
        
            $query1 = "INSERT INTO profesionales (nombre,email,password,apellido,pais,telefono,ciudad,fecha,cabello,piel,complexion,sexo,medida_pechos,altura,peso,descripcion,objetivo) 
            VALUES ('$nombre','$email','$password','$apellido','$pais','$telefono','$ciudad','$fecha','$cabello','$piel','$complexion','$sexo','$medida_pechos',$altura,$peso,'$descripcion','$objetivo')";
                if (mysqli_query($link, $query1)) {
                    $query = "SELECT id from profesionales where email = '$email'";
                    $result2 = mysqli_query($link, $query);
                    $profesionalesId = mysqli_fetch_assoc($result2)["id"];
                    $ruta = '../profesionales/'.$post['email'];
                    if($file["foto"]["error"] > 0)
                    {
        
                    }
                    else
                    {
                        $archivonombre = $file["foto"]["name"];
                        $fuente = $file["foto"]["tmp_name"];
        
                        if(!file_exists($ruta)){
                            mkdir($ruta, 0777,true) or die("Hubo un error al crear el directorio de almacenamiento");	
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
        
                    if($file["fotos"]["name"] < 1)
                    {
                        
                    }
                    else
                    {
                        $json =[];
                        if($file["fotos"]["name"] < 2)
                        {
                            $archivonombre = $file["fotos"]["name"];
                            $fuente = $file["fotos"]["tmp_name"];
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
                            foreach($file["fotos"]['tmp_name'] as $key => $tmp_name)
                            {
                                $archivonombre = $file["fotos"]["name"][$key];
                                $fuente = $file["fotos"]["tmp_name"][$key];
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
                    return json_encode(['success' => true]);
                } 
                else 
                {
                    echo json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
                }
        } else {
            return json_encode(['success' => false, 'error' => 'Error al registrar el usuario: ' . mysqli_error($link)]);
        }
    }

    public function getProfesionales($link, $id = null)
    {
        $query = "SELECT * FROM profesionales";
        if($id != null)
        {
            $query .= " WHERE id = $id";
        }
        $result = mysqli_query($link,$query);
        $profesional = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($profesional, $row);
        }
        return $profesional;
    }

    public function getProfesionalesEmail($link, $email)
    {
        $query = "SELECT * FROM profesionales where email = '$email'";
        $result = mysqli_query($link,$query);
        $profesional = mysqli_fetch_assoc($result);
        return $profesional;
    }

    public function getProfesionalByCiudad($link,$ciudad, $sex = false)
    {
        if(isset($ciudad))
        {
            $query = "SELECT * FROM profesionales inner join fotos on profesionales.id = fotos.userId where fotoPrincipal = fotos.idfotos and ciudad = '$ciudad'";
            if(isset($sex))
            {
                $query .= " and sexo = '$sex'";
            }
            $result = mysqli_query($link,$query);
            $profesional = [];
            
            while($row = mysqli_fetch_assoc($result))
            {
                $detalles = [];
                $row["objetivo"] = json_decode($row["objetivo"]);
                $query3 = "SELECT id,descripcion FROM detalles where id in (".$row["cabello"].",".$row["piel"].",".$row["sexo"].","
                .$row["complexion"].",".$row["medida_pechos"];
                foreach($row["objetivo"] as $key)
                {
                    $query3 .=",".$key;
                }
                $query3 .= ")";
                $result3 = mysqli_query($link,$query3);
                while($row2 = mysqli_fetch_assoc($result3))
                {
                    array_push($detalles, $row2);
                }
                
                $row["cabello"] = $this->searchArray($row["cabello"],$detalles,"descripcion");
                $row["piel"] = $this->searchArray($row["piel"],$detalles,"descripcion");
                $row["sexo"] = $this->searchArray($row["sexo"],$detalles,"descripcion");
                $row["complexion"] = $this->searchArray($row["complexion"],$detalles,"descripcion");
                $row["medida_pechos"] = $this->searchArray($row["medida_pechos"],$detalles,"descripcion");
                $row["objetivo"] = $this->searchArray($row["objetivo"],$detalles,"descripcion");

                array_push($profesional, $row);
            }

            return $profesional;
        }
    }

    public function getProfesionalesPerfil($link, $id)
    {
        $query = "SELECT nombre,telefono,fecha,cabello,piel,apellido,fotoPrincipal,fotos,complexion,sexo,medida_pechos,altura,peso,descripcion,objetivo,
        servicios,fotos.idfotos,fotos.ruta,provincia.name as pais, tags.name as ciudad
        FROM profesionales 
        inner join fotos on profesionales.id = fotos.userId 
        inner join provincia on profesionales.pais = provincia.id
        inner join tags on profesionales.ciudad = tags.id
        where fotoPrincipal = fotos.idfotos and profesionales.id = $id";
        $result = mysqli_query($link,$query);
        $profesional = [];
        while($row = mysqli_fetch_assoc($result))
        {   
            $fotosid = [];
            foreach(json_decode($row["fotos"]) as $foto)
            {
              array_push($fotosid, $foto);
            }

            $query2 = "SELECT ruta FROM fotos where idfotos in (".implode(",",$fotosid).")";
            $result2 = mysqli_query($link,$query2);
            $fotos = [];

            while($row1 = mysqli_fetch_assoc($result2))
            {
                array_push($fotos, $row1);
            }
            $row["objetivo"] = json_decode($row["objetivo"]);
            $detalles = [];
            $query3 = "SELECT id,descripcion FROM detalles where id in (".$row["cabello"].",".$row["piel"].",".$row["sexo"].","
            .$row["complexion"].",".$row["medida_pechos"];
            foreach($row["objetivo"] as $key)
            {
                $query3 .=",".$key;
            }
            $query3 .= ")";
            $result3 = mysqli_query($link,$query3);
            while($row2 = mysqli_fetch_assoc($result3))
            {
                array_push($detalles, $row2);
            }

            $row["fotos"] = $fotos;
            $row["cabello"] = $this->searchArray($row["cabello"],$detalles,"descripcion");
            $row["piel"] = $this->searchArray($row["piel"],$detalles,"descripcion");
            $row["sexo"] = $this->searchArray($row["sexo"],$detalles,"descripcion");
            $row["complexion"] = $this->searchArray($row["complexion"],$detalles,"descripcion");
            $row["medida_pechos"] = $this->searchArray($row["medida_pechos"],$detalles,"descripcion");
            $i = 0;
            foreach($row["objetivo"] as $key)
            {
                $key = $this->searchArray($key,$detalles,"descripcion");
                $row["objetivo"][$i] = $key;
                $i++;
            }
            array_push($profesional, $row);
        }

        return $profesional[0];
    }

    public function updateProfesional($link, $id)
    {
        $query = "UPDATE profesionales SET ";
        $query .= "nombre = '".$_POST["nombre"]."',";
        $query .= "apellido = '".$_POST["apellido"]."',";
        $query .= "telefono = '".$_POST["telefono"]."',";
        $query .= "fecha = '".$_POST["fecha"]."',";
        $query .= "cabello = '".$_POST["cabello"]."',";
        $query .= "piel = '".$_POST["piel"]."',";
        $query .= "sexo = '".$_POST["sexo"]."',";
        $query .= "complexion = '".$_POST["complexion"]."',";
        $query .= "medida_pechos = '".$_POST["pechos"]."',";
        $query .= "altura = '".$_POST["altura"]."',";
        $query .= "peso = '".$_POST["peso"]."',";
        $query .= "descripcion = '".$_POST["descripcion"]."',";
        $query .= "objetivo = '".json_encode($_POST["objetivo"])."',";
        $query .= "pais = '".$_POST["pais"]."',";
        $query .= "ciudad = '".$_POST["ciudad"]."'";
        $query .= " WHERE id = $id";
        $result = mysqli_query($link,$query);
        if($result)
        {
            return json_encode(['success' => true]);
        }
       
        return json_encode(['success' => false]);
       
    }

    public function updateProfesionalPictures($link, $id, $profile, $pictures)
    {
        $delete = "DELETE FROM fotos WHERE userId = '$id'";
        mysqli_query($link, $delete);
        $query = "SELECT email from profesionales where id = '$id'";
        $result2 = mysqli_query($link, $query);
        $email = mysqli_fetch_assoc($result2)["email"];
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        $profesionalesId = $id;
        $root = str_replace("logica","",__DIR__);
        $ruta = $root.'/profesionales/'.$email;
        if($profile["error"] > 0)
        {

        }
        else
        {
            $archivonombre = $profile["name"];
            $fuente =$profile["tmp_name"];
            $directorio = opendir($ruta); //ruta actual
            $target_path = str_replace($root,"../",$ruta).'/'.$archivonombre;
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

        if($pictures["name"] < 1)
        {
            
        }
        else
        {
            $json =[];
            if($pictures["name"] < 2)
            {
                $archivonombre = $pictures["name"];
                $fuente = $pictures["tmp_name"];
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
                foreach($pictures['tmp_name'] as $key => $tmp_name)
                {
                    $archivonombre = $pictures["name"][$key];
                    $fuente = $pictures["tmp_name"][$key];
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
        return json_encode(['success' => true]);
       
    }

    public function getProfesionalesServicios($link, $id)
    {
        $query = "SELECT servicios FROM profesionales where id = $id";
        $result = mysqli_query($link,$query);
        $servicios = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($servicios, $row);
        }
        return $servicios[0];
    }

    public function updateProfesionalesServicios($link, $id, $data)
    {
        $query = "update profesionales set servicios ='".json_encode($data)."'  where id = $id";
        $result = mysqli_query($link,$query);
        $servicios = [];
        return json_encode(['success' => true]);
    }

    public function searchArray($value, $array, $column)
    {
        foreach($array as $key)
        {
            if($value == $key["id"])
            {
                return $key[$column];
            }
        }

        return null;
    }

}
?>