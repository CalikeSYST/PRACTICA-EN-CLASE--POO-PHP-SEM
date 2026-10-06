<?php

require_once 'config/Conexion.php';
require_once 'models/Estudiante.php';
require_once 'repositories/EstudianteRepository.php';

$conexion = new Conexion();
$db = $conexion->getConexion();

$repository = new EstudianteRepository($db);

$estudiantes = $repository->listar();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Estudiantes</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        /* TARJETA DEL FORMULARIO */
        .formulario {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.10);
        }

        h1,
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input:focus {
            border-color: #0d6efd;
            outline: none;
            box-shadow: 0 0 4px rgba(13, 110, 253, 0.3);
        }

        /* BOTONES */
        .botones {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-guardar,
        .btn-limpiar {
            width: 120px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-guardar {
            background-color: #198754;
        }

        .btn-guardar:hover {
            background-color: #157347;
        }

        .btn-limpiar {
            background-color: #dc2626;
        }

        .btn-limpiar:hover {
            background-color: #b91c1c;
        }

        /* TABLA */
        .tabla-contenedor {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.10);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #212529;
            color: white;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* BOTONES DE ACCIONES */
        .btn-editar {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
        }

        .btn-eliminar {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
        }

        .btn-editar:hover,
        .btn-eliminar:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- FORMULARIO -->
        <div class="formulario">

            <h1>
                <i class="fa-solid fa-user-graduate"></i>
                Registro de estudiante
            </h1>

            <form action="guardar.php" method="POST" autocomplete="off">

                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    required>

                <label for="apellido">Apellido</label>
                <input
                    type="text"
                    id="apellido"
                    name="apellido"
                    required>

                <label for="email">Correo</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required>

                <label for="edad">Edad</label>
                <input
                    type="number"
                    id="edad"
                    name="edad"
                    required>

                <!-- BOTONES -->
                <div class="botones">

                    <button type="submit" class="btn-guardar">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Guardar
                    </button>

                    <button type="reset" class="btn-limpiar">
                        <i class="fa-solid fa-broom"></i>
                        Limpiar
                    </button>

                </div>

            </form>

        </div>

        <br>

        <!-- LISTA DE ESTUDIANTES -->
        <div class="tabla-contenedor">

            <h2>
                <i class="fa-solid fa-users"></i>
                Lista de estudiantes
            </h2>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($estudiantes as $estudiante): ?>

                        <tr>
                            <td><?= $estudiante['id'] ?></td>
                            <td><?= $estudiante['nombre'] ?></td>
                            <td><?= $estudiante['apellido'] ?></td>
                            <td><?= $estudiante['email'] ?></td>
                            <td><?= $estudiante['edad'] ?></td>

                            <td>
                                <button
                                    type="button"
                                    class="btn-editar"
                                    data-id="<?= $estudiante['id'] ?>"
                                    data-nombre="<?= htmlspecialchars($estudiante['nombre']) ?>"
                                    data-apellido="<?= htmlspecialchars($estudiante['apellido']) ?>"
                                    data-email="<?= htmlspecialchars($estudiante['email']) ?>"
                                    data-edad="<?= $estudiante['edad'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="btn-eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </div>

    <!-- MODAL EDITAR ESTUDIANTE -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Editar estudiante
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar">
                    </button>
                </div>

                <div class="modal-body">

                    <form action="editar.php" method="POST">

                        <!-- ID oculto -->
                        <input type="hidden" name="id" id="editar_id">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text"
                                class="form-control"
                                name="nombre"
                                id="editar_nombre"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text"
                                class="form-control"
                                name="apellido"
                                id="editar_apellido"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email"
                                class="form-control"
                                name="email"
                                id="editar_email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Edad</label>
                            <input type="number"
                                class="form-control"
                                name="edad"
                                id="editar_edad"
                                required>
                        </div>

                        <div class="text-end">
                            <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button type="submit"
                                class="btn btn-primary">
                                Guardar cambios
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

<script>
    // Seleccionamos todos los botones Editar
    const botonesEditar = document.querySelectorAll('.btn-editar');

    // Recorremos cada botón
    botonesEditar.forEach(function(boton) {

        boton.addEventListener('click', function() {

            // Obtener los datos del estudiante
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;
            const apellido = this.dataset.apellido;
            const email = this.dataset.email;
            const edad = this.dataset.edad;

            // Colocar los datos dentro del modal
            document.getElementById('editar_id').value = id;
            document.getElementById('editar_nombre').value = nombre;
            document.getElementById('editar_apellido').value = apellido;
            document.getElementById('editar_email').value = email;
            document.getElementById('editar_edad').value = edad;

            // Abrir el modal de Bootstrap
            const modal = new bootstrap.Modal(
                document.getElementById('modalEditar')
            );

            modal.show();

        });

    });
</script>