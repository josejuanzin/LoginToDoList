<?php 

class Database {
    private $host = 'localhost'; 
    private $username = 'root'; 
    private $senha = ''; 
    private $banco = 'todo_list'; 

    public $conn = ''; 

    public function conectar(){
        $this->conn = new mysqli($this->host, $this->username, $this->senha, $this->banco); 
        if($this->conn->connect_error){
            die("Erro na conexão com o banco: " . $this->conn->connect_error);
        }

        return $this->conn; 
    }
}
?>