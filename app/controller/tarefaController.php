<?php
require_once __DIR__ . '/../model/tarefa.php';

class TarefaController {
    private $tarefaModel;

    public function __construct(){
        $this->tarefaModel = new Tarefa();
    }

    public function index(){
        $tarefas = [];
        if(isset($_SESSION['id'])){
            $tarefas = $this->tarefaModel->listar($_SESSION['id']);
        }
        include __DIR__ . '/../view/listar.php';
    }

    public function criar(){
        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
            $this->tarefaModel->criar($_POST['descricao'], $_SESSION['id']);
        }
        header("Location: index.php");
        exit;
    }

    public function excluir(){
        if(isset($_GET['id'])){
            $this->tarefaModel->excluir($_GET['id']);
        }
        header("Location: index.php");
        exit;
    }

    public function editar(){
        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao'])) && isset($_POST['id'])){
            $this->tarefaModel->editar($_POST['descricao'], $_POST['id']);
        }
        header("Location: index.php");
        exit;
    }
}