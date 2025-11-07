<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Jogo</title>
</head>
<body>
    <h2>🎮 Adicionar Novo Jogo</h2>
    <form action="add.php" method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Plataforma: <input type="text" name="plataforma" required><br><br>
        Preço (R$): <input type="number" name="preco" step="0.01" required><br><br>
        Ano de Lançamento: <input type="number" name="ano_lancamento" required><br><br>
        <input type="submit" name="salvar" value="Salvar Jogo">
    </form>

<?php
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $plataforma = $_POST['plataforma'];
    $preco = $_POST['preco'];
    $ano = $_POST['ano_lancamento'];

    $sql = "INSERT INTO jogos (nome, plataforma, preco, ano_lancamento) 
            VALUES ('$nome', '$plataforma', '$preco', '$ano')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>✅ Jogo salvo com sucesso!</p>";

        $ultimo = $conn->insert_id;
        $result = $conn->query("SELECT * FROM jogos WHERE id=$ultimo");
        $row = $result->fetch_assoc();

        echo "<h3>Último registro inserido:</h3>";
        echo "ID: {$row['id']} | Nome: {$row['nome']} | Plataforma: {$row['plataforma']} | Preço: R$ {$row['preco']} | Ano: {$row['ano_lancamento']}";
    } else {
        echo "<p>❌ Erro: " . $conn->error . "</p>";
    }
}
$conn->close();
?>
<br><a href="index.php">⬅️ Voltar à lista</a>
</body>
</html>
