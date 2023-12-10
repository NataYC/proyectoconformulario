<?php
include_once('../config/config.php');
include('../config/database.php');

class sexologia1
{
    public $conexion;

    function __construct()
    {
        $db = new Database();
        $this->conexion = $db->connectToDatabase();
        if (!$this->conexion) {
            die("Error de conexión a la base de datos");
        }
    }

    function save($params)
    {
        $nombre = isset($params["nombreoapodo"]) ? $params["nombreoapodo"] : null;
        $email = isset($params["correoelectronico"]) ? $params["correoelectronico"] : null;
        $preguntacorrespo = isset($params["preguntacorrespo"]) ? $params["preguntacorrespo"] : null;

        // Utilizar sentencias preparadas para evitar inyección SQL
        $insert = "INSERT INTO sexologia1 (nombreoapodo, correoelectronico, preguntacorrespo) VALUES (?, ?, ?)";

        // Preparar la sentencia
        $stmt = mysqli_prepare($this->conexion, $insert);

        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $preguntacorrespo);

        // Ejecutar la sentencia
        $result = mysqli_stmt_execute($stmt);

        // Cerrar la sentencia preparada
        mysqli_stmt_close($stmt);

        if ($result) {
            return true;
        } else {
            // Manejar el error de la consulta
            echo "Error en la consulta: " . mysqli_error($this->conexion);
            return false;
        }
    }

    function getAll()
    {
        $sql = "SELECT * FROM sexologia1";
        return mysqli_query($this->conexion, $sql);
    }

    function getOne($id)
    {
        $sql = "SELECT * FROM sexologia1 WHERE id= $id";
        return mysqli_query($this->conexion, $sql);
    }

    function update($params)
    {
        $nombre = isset($params["nombreoapodo"]) ? $params["nombreoapodo"] : null;
        $email = isset($params["correoelectronico"]) ? $params["correoelectronico"] : null;
        $preguntacorrespo = isset($params["preguntacorrespo"]) ? $params["preguntacorrespo"] : null;
        $id = isset($params["id"]) ? $params["id"] : null;

        // Consulta preparada para evitar inyección SQL
        $update = "UPDATE sexologia1 SET nombreoapodo=?, correoelectronico=?, preguntacorrespo=? WHERE id = ?";

        // Preparar la consulta
        $stmt = mysqli_prepare($this->conexion, $update);

        if ($stmt) {
            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, 'sssi', $nombre, $email, $preguntacorrespo, $id);

            // Ejecutar la consulta
            $resultado = mysqli_stmt_execute($stmt);

            // Cerrar la consulta preparada
            mysqli_stmt_close($stmt);

            return $resultado;
        } else {
            // Manejar el error en la preparación de la consulta
            echo "Error en la preparación de la consulta." . PHP_EOL;
            return false;
        }
    }

    function delete($id)
    {
        $delete = "DELETE FROM sexologia1 WHERE id = $id ";
        return mysqli_query($this->conexion, $delete);
    }
}
?>
