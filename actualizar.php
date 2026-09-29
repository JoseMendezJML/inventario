<?php

require_once __DIR__ . '/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = $_POST['id'] ?? '';
$nombre = trim($_POST['nombre'] ?? '');
$cantidad = $_POST['cantidad'] ?? '';

if (
    $id === '' ||
    $nombre === '' ||
    $cantidad === ''
) {
    header(
        'Location: editar.php?id='
        . $id
        . '&estado=incompleto'
    );

    exit;
}

if (
    !is_numeric($id) ||
    !is_numeric($cantidad)
) {
    header(
        'Location: editar.php?id='
        . $id
        . '&estado=cantidad_invalida'
    );

    exit;
}

$sentencia = $conexion->prepare(
    'UPDATE productos
     SET nombre = :nombre,
         cantidad = :cantidad
     WHERE id = :id'
);

$sentencia->execute([
    'nombre' => $nombre,
    'cantidad' => (int) $cantidad,
    'id' => (int) $id
]);

header('Location: index.php?estado=actualizado');

exit;