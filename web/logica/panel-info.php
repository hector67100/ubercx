<?php
class PanelInfo
{
    public function getSexo($link)
    {
        $query = "SELECT id,descripcion FROM detalles WHERE clave = '2'";
        $result = mysqli_query($link,$query);
        $resultado = [];
        while($row = mysqli_fetch_row($result))
        {
            array_push($resultado, $row);
        }
        return $result;
    }

    public function getCabello($link)
    {
        $query = "SELECT id,descripcion FROM detalles WHERE clave = '3'";
        $result = mysqli_query($link,$query);
        $resultado = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($resultado, $row);
        }
        return $result;
    }

    public function getProvincia($link)
    {
        $query = "SELECT * FROM provincia";
        $result = mysqli_query($link,$query);
        $resultado = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($resultado, $row);
        }
        return $result;
    }

    public function getCiudad($link, $id)
    {
        $query = "SELECT id,name FROM tags where status = '$id'";
        $result = mysqli_query($link,$query);
        $ciudades = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($ciudades, $row);
        }
        return $ciudades;
    }

    public function getPiel($link)
    {
        $query = "SELECT id,descripcion FROM detalles WHERE clave = '4'";
        $result = mysqli_query($link,$query);
        $resultado = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($resultado, $row);
        }
        return $result;
    }

    public function getComplexion($link)
    {
        $query = "SELECT id,descripcion FROM detalles  WHERE clave = '5'";
        $result = mysqli_query($link,$query);
        $resultado = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($resultado, $row);
        }
        return $result;
    }

    public function getPechos($link)
    {
        $query = "SELECT id,descripcion FROM detalles WHERE clave = '8'";
        $result = mysqli_query($link,$query);
        $resultado = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($resultado, $row);
        }
        return $result;
    }

    public function getProvinciaData($link)
    {
        $query = "SELECT * FROM provincia";
        $result = mysqli_query($link,$query);
        $pais = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($pais, $row);
        }
        return $pais;
    }

    public function getCategories($link)
    {
        $query = "SELECT id,name FROM categories";
        $result = mysqli_query($link,$query);
        $categorias = [];
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($categorias, $row);
        }
        return $categorias;
    }
}
?>