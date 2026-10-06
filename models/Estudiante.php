
<?php

class Estudiante
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $edad;

    public function __construct($nombre, $apellido, $email, $edad)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->edad = $edad;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEdad()
    {
        return $this->edad;
    }
}
