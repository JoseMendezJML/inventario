<?php

require_once __DIR__ . '/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$cantidad = $_POST['cantidad'] ?? '';

if ($nombre === '' || $cantidad === '') {
    header('Location: index.php?estado=incompleto');
    exit;
}

if (preg_match_all('/./us', $nombre) < 3) {
    header('Location: index.php?estado=nombre_invalido');
    exit;
}

$cantidadValidada = filter_var($cantidad, FILTER_VALIDATE_INT);

if ($cantidadValidada === false || $cantidadValidada <= 0) {
    header('Location: index.php?estado=cantidad_invalida');
    exit;
}

$sentencia = $conexion->prepare(
    'INSERT INTO productos (nombre, cantidad)
     VALUES (:nombre, :cantidad)'
);

$sentencia->execute([
    'nombre' => $nombre,
    'cantidad' => $cantidadValidada
]);

header('Location: index.php?estado=guardado');
exit;