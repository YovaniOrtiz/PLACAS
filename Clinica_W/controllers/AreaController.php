<?php
require_once dirname(__DIR__) . "/models/Area.php";

class AreaController
{
    public function crearArea($nombre, $descripcion)
    {
        $area = new Area($nombre, $descripcion);
        return $area->crear();
    }

    public function mostrarAreas()
    {
        $area = new Area();
        return $area->mostrar();
    }
}
?>

