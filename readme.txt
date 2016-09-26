- Hay un Vagrantfile + un fichero bootstrap.sh que puede provisionar una máquina virtual con
  todo lo necesario para ejecutar (incluyendo creación de DBs y tablas).
- Para ejecutarlo en un lamp existente:
    - instalar la extensión de multi-byte (php-mb)
    - editar config/db.local.php con credenciales a una base de datos
    - importar database.sql en esa DB (crea pruebaxxx_alojamiento, pruebaxxx_alojamiento_tipo y pruebaxxx_alojamiento_meta)
    - marcar como ejecutable "search.php" (`chmod +x search.php`)
- Existen unos tests muy básicos:
    phpunit --bootstrap src/Yivi/Buscador/autoload.php tests

Forma de uso:
./search.php patron_de_busqueda

El patrón de búsqueda debe tener por lo menos tres caracteres, y busca sólo en principio del nombre del establecimiento.
Hay sólo 10 establecimientos de prueba, así que los resultados no son particularmente divertidos. :P