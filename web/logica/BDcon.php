<?php
include_once('php_lib/config.ini.php');
class BDcon
{
    public function conect()
    {
        $link = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);
        if (!$link) {
            echo json_encode(['success' => false, 'error' => 'Error al conectar al servidor mysql']);
            exit;
        }

        $db_selected = mysqli_select_db($link, BASE_DATOS);
        if (!$db_selected) {
            echo json_encode(['success' => false, 'error' => 'Error al conectar a la base de datos']);
            exit;
        }

        mysqli_set_charset($link, "utf8");
        return $link;
    }

    public function disconect($link)
    {
        mysqli_close($link);
    }
}

?>