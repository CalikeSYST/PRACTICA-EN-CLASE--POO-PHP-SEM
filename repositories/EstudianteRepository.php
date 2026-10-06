<?php

class EstudianteRepository
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    //FUNCION PARA LISTAR LOS REGISTROS
    public function listar()
    {
        $sql = "SELECT * FROM estudiantes ORDER BY id DESC";

        $stm = $this->conexion->prepare($sql);

        $stm->execute();

        return $stm->fetchALL(PDO::FETCH_ASSOC);
    }

    //FUNCION PARA GUARDAR UN REGISTRO
    public function guardar(Estudiante $estudiante)
    {

        $sql = "INSERT INTO estudiantes(nombre,apellido,email,edad) VALUES(?,?,?,?);";
        $stm = $this->conexion->prepare($sql);

        return $stm->execute([
            $estudiante->getNombre(),
            $estudiante->getApellido(),
            $estudiante->getEmail(),
            $estudiante->getEdad()
        ]);
    }

    public function actualizar(Estudiante $estudiante)
    {
        $sql = "UPDATE estudiantes 
            SET nombre = ?, apellido = ?, email = ?, edad = ?
            WHERE id = ?";

        $stm = $this->conexion->prepare($sql);

        return $stm->execute([
            $estudiante->getNombre(),
            $estudiante->getApellido(),
            $estudiante->getEmail(),
            $estudiante->getEdad(),
            $estudiante->getId()
        ]);
    }
}
