SCRIPT SQL: 
(database crud)

CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    plataforma VARCHAR(50) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    ano_lancamento INT NOT NULL
);
