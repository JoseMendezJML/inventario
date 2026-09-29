<?php

require_once __DIR__ . '/config/conexion.php';

$id = $_GET['id'] ?? '';

if ($id === '' || !is_numeric($id)) {
    header('Location: index.php');
    exit;
}

$sentencia = $conexion->prepare(
    'SELECT id, nombre, cantidad
     FROM productos
     WHERE id = :id'
);

$sentencia->execute([
    'id' => (int) $id
]);

$producto = $sentencia->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    header('Location: index.php');
    exit;
}

$estado = $_GET['estado'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar producto</title>

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header class="encabezado">
    <div class="contenido-encabezado">

        <p class="etiqueta">
            GPDS
        </p>

        <h1>EDITAR PRODUCTO</h1>

        <p>
            Modifica la información del producto seleccionado.
        </p>

    </div>
</header>

<main class="contenedor-editar">

    <section class="tarjeta formulario-editar">

        <h2>
            Editar producto
        </h2>

        <p class="descripcion">
            Modifique el nombre o la cantidad del producto.
        </p>

        <?php if ($estado === 'incompleto'): ?>

            <div class="mensaje error">
                Debe completar todos los campos.
            </div>

        <?php endif; ?>

        <?php if ($estado === 'cantidad_invalida'): ?>

            <div class="mensaje error">
                La cantidad debe ser un número.
            </div>

        <?php endif; ?>

        <form
            action="actualizar.php"
            method="POST"
        >

            <input
                type="hidden"
                name="id"
                value="<?php echo $producto['id']; ?>"
            >

            <div class="campo">

                <label for="nombre">
                    Nombre del producto
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    maxlength="100"
                    value="<?php
                    echo htmlspecialchars(
                        $producto['nombre']
                    );
                    ?>"
                    required
                >

            </div>

            <div class="campo">

                <label for="cantidad">
                    Cantidad
                </label>

                <input
                    type="number"
                    id="cantidad"
                    name="cantidad"
                    value="<?php echo $producto['cantidad']; ?>"
                    required
                >

            </div>

            <button type="submit">
                Guardar cambios
            </button>

            <a
                href="index.php"
                class="boton-cancelar"
            >
                Cancelar
            </a>

        </form>

    </section>

</main>

<footer>
    U1. Planeación del proceso de desarrollo de software
</footer>

</body>

</html>