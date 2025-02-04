<?php
require_once __DIR__ . '/../database/Database.php';

class Libro
{
    public function obtenerTodos()
    {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM libros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($titulo, $autor, $categoria)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO libros (titulo, autor, categoria) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $autor, $categoria]);
    }

    public function editar($id, $titulo, $autor, $categoria)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE libros SET titulo = ?, autor = ?, categoria = ? WHERE id = ?");
        $stmt->execute([$titulo, $autor, $categoria, $id]);
    }

    public function eliminar($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM libros WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function filtrar($filtro)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM libros WHERE titulo LIKE ? OR autor LIKE ? OR categoria LIKE ?");
        $stmt->execute(["%$filtro%", "%$filtro%", "%$filtro%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
