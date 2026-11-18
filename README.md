CREATE DATABASE IF NOT EXISTS todo_list;
USE todo_list;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

INSERT INTO usuarios (id, nome, email, senha) 
VALUES (1, 'Juangner', 'juangner@gmail.com', '$2y$10$wT.hI1m9u7L8qK3pZ5x2CeH8j9K0l1M2n3O4p5Q6r7S8t9U0v1W2x');
