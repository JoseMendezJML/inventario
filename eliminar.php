<?php

require_once __DIR__ . '/config/conexion.php';

$id = $_GET['id'] ?? '';

if ($id === '' || !is_numeric($id)) {
    header('Location: index.php');
    exit;
}

$consulta = $conexion->prepare(
    'DELETE FROM productos WHERE id = :id'
);

$consulta->execute([
    ':id' => $id
]);

header('Location: index.php?estado=eliminado');
exit;
?>