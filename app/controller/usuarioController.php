<?php 

require_once __DIR__ . '/../model/usuario.php';

class UsuarioController {
    private $usuarioModel;
    
    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function autenticar(){
        if(!isset($_POST['email'], $_POST['senha'])){
            header("Location: index.php");
            exit;
        }

        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if(empty($email) || empty($senha)){
            $erroLogin = "Preencha corretamente seu e-mail e senha.";
            $tarefas = [];
            include __DIR__ . '/../view/listar.php';
            exit; 
        }

        $usuario = $this->usuarioModel->buscarPorEmail($email); 

        if($usuario && password_verify($senha, $usuario['senha'])){
            session_regenerate_id(true); 

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php"); 
            exit;
        }

        $erro = "E-mail ou senha inválidos.";
        include __DIR__ . '/../view/listar.php';
        exit;
    }

    public function logout(){
        session_destroy(); 

        header("Location: index.php");
        exit; 
    }
}
?>