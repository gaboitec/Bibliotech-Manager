<?php
require_once __DIR__ . '/../book/Libro.php';

$libro = new Libro();
$libros = $libro->obtenerTodos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $libro->crear($_POST['titulo'], $_POST['autor'], $_POST['categoria']);
    } elseif (isset($_POST['editar'])) {
        $libro->editar($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['categoria']);
    } elseif (isset($_POST['eliminar'])) {
        $libro->eliminar($_POST['id']);
    }
    header("Location: ../views/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filtro'])) {
    $libros = $libro->filtrar($_GET['filtro']);
}
