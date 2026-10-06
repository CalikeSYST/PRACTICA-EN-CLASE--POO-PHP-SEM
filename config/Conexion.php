<?php

class Conexion
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new PDO("mysql:host=localhost;dbname=colegio_estudiante;charset=utf8mb4", "root", "");

        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConexion()
    {
        return $this->conexion;
    }
}
