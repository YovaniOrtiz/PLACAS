<?php

require_once dirname(__DIR__) . "/config/Conn.php";

class Area
{
    private $id_area;
    private $nombre;
    private $descripcion;

    public function __construct($nombre = null, $descripcion = null)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function mostrar(): PDOStatement|false
    {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Area";
        $stmt = $conexion->query($sql);
        $conn->cerrar();
        return $stmt;
    }

    public function crear(): string
    {
        $conn = new Conn();
        $conexion = $conn->conectar();

        try {
            $sql = "INSERT INTO Area (Nombre, Descripcion) VALUES ('$this->nombre', '$this->descripcion')";
            $result = $conexion->exec($sql);
            $conn->cerrar();

            if ($result) {
                return "Nueva área creada exitosamente.";
            } else {
                return "Error al crear el área.";
            }
        } catch (PDOException $e) {
            return "Error al crear el área: " . $e->getMessage();
        }
    }
}
?>
