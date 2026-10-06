
<?php

require_once 'config/Conexion.php';

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$edad = $_POST['edad'];

// Crear la conexión
$conexion = new Conexion();
$db = $conexion->getConexion();

// Preparar la consulta
$sql = "INSERT INTO estudiantes (nombre, apellido, email, edad)
        VALUES (?, ?, ?, ?)";

$stmt = $db->prepare($sql);

// Ejecutar la consulta con los datos
$stmt->execute([
    $nombre,
    $apellido,
    $email,
    $edad
]);

// Redirigir nuevamente al formulario
header("Location: index.php");
exit;
