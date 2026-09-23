<?php
// Configuración de la conexión a la base de datos con sus credenciales de acceso.
$servidor = 'localhost';
$baseDatos = 'inventario';
$usuario = 'TU_USUARIO';
$contrasena = 'TU_CONTRASEÑA';

try {
    $conexion = new PDO(
        "mysql:host=$servidor;dbname=$baseDatos;charset=utf8mb4",
        $usuario,
        $contrasena
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $error) {
    die(
        'No fue posible conectarse con la base de datos: '
        . $error->getMessage()
    );
}