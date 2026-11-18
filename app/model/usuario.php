<?php 

require_once __DIR__ . '/../config/database.php'; 

class Usuario {
    private $conn; 

    public function __construct(){
        $db = new Database(); 
        $this->conn = $db->conectar(); 
    }

    public function buscarPorEmail($email){
        $email = $this->conn->real_escape_string($email);
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $this->conn->query($sql);

        if($resultado && $resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }

        return null;
    }
}
?>