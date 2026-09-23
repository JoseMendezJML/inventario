# INVENTARIO

## 1. ¿Qué hace el proyecto?

Es un sistema de inventario que permite registrar productos con su nombre y cantidad.
También muestra los productos registrados, su disponibilidad y la fecha de registro.

## 2. ¿Qué tecnologías utiliza?

El proyecto utiliza:

- PHP para el funcionamiento del sistema. Version recomentdada php 8.3 o 8.4.
- MySQL para guardar los productos.
- HTML y CSS para el diseño de la página.
- Laragon para ejecutar el servidor y la base de datos.

## 3. ¿Qué se necesita instalar?

Para ejecutar el proyecto se necesita:

1. Instalar Laragon.
2. Tener PHP y MySQL activos desde Laragon.
3. Tener un navegador web.
4. Opcionalmente, Visual Studio Code para modificar el proyecto.

## 4. ¿Cómo se configura y ejecuta?

1. Colocar la carpeta `inventario` dentro de:
   `C:\laragon\www\`

2. Iniciar Laragon y verificar que MySQL esté activo.

3. Importar el archivo `base_datos.sql` en MySQL.
Crear la base "inventario" y posterior mente correr el archivo sql.

4. Abrir una terminal dentro de la carpeta del proyecto.

5. Ejecutar el siguiente comando:

   php -S localhost:8007

6. Abrir el navegador y entrar a:

   http://localhost:8007/

7. El sistema estará listo para registrar y consultar productos.