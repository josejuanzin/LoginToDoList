<?php
require_once __DIR__ . '/../config/database.php';

class Tarefa {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function listar($usuarioId){
        $usuarioId = (int) $usuarioId;
        $sql = "SELECT * FROM tarefas WHERE usuario_id = $usuarioId";
        $resultado = $this->conn->query($sql);

        $tarefas = [];
        if($resultado && $resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $tarefas[] = $row;
            }
        }
        return $tarefas;
    }

    public function criar($descricao, $usuarioId){
        $descricao = $this->conn->real_escape_string($descricao);
        $usuarioId = (int) $usuarioId;
        $sql = "INSERT INTO tarefas (descricao, usuario_id) VALUES ('$descricao', $usuarioId)";
        return $this->conn->query($sql);
    }

    public function excluir($id){
        $id = (int) $id;
        $sql = "DELETE FROM tarefas WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function editar($descricao, $id){
        $descricao = $this->conn->real_escape_string($descricao);
        $id = (int) $id;
        $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id = $id";
        return $this->conn->query($sql);
    }
}