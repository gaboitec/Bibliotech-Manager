<?php
require_once __DIR__ . '/../poo/LibroClass.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
</head>

<body>
    <h1>Gestión de Libros</h1>
    <form method="POST" action="../controllers/libroController.php">
        <input type="hidden" name="id" id="id">
        <input type="text" name="titulo" id="titulo" placeholder="Título" required>
        <input type="text" name="autor" id="autor" placeholder="Autor" required>
        <input type="text" name="categoria" id="categoria" placeholder="Categoría" required>
        <button type="submit" name="agregar">Agregar</button>
        <button type="submit" name="editar">Editar</button>
    </form>

    <form method="GET">
        <input type="text" name="filtro" placeholder="Buscar por título, autor o categoría">
        <button type="submit">Filtrar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $l): ?>
                <tr>
                    <td><?= $l['id'] ?></td>
                    <td><?= $l['titulo'] ?></td>
                    <td><?= $l['autor'] ?></td>
                    <td><?= $l['categoria'] ?></td>
                    <td>
                        <button onclick="editar(<?= $l['id'] ?>, '<?= $l['titulo'] ?>', '<?= $l['autor'] ?>', '<?= $l['categoria'] ?>')">Editar</button>
                        <form method="POST" action="../controllers/libroController.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $l['id'] ?>">
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function editar(id, titulo, autor, categoria) {
            document.getElementById('id').value = id;
            document.getElementById('titulo').value = titulo;
            document.getElementById('autor').value = autor;
            document.getElementById('categoria').value = categoria;
        }
    </script>
</body>

</html>