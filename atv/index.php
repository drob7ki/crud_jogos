<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Jogos</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }
    </style>
</head>
<body>
    <h2>🎮 Lista de Jogos Cadastrados</h2>
    <a href="add.php">➕ Adicionar Novo Jogo</a><br><br>

    <?php
    $sql = "SELECT * FROM jogos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th><th>Nome</th><th>Plataforma</th><th>Preço (R$)</th><th>Ano</th><th>Ações</th>
                </tr>";
        $soma = 0;
        $total = 0;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['plataforma']}</td>
                    <td>{$row['preco']}</td>
                    <td>{$row['ano_lancamento']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>✏️ Editar</a> | 
                        <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Deseja excluir este jogo?\")'>🗑️ Excluir</a>
                    </td>
                </tr>";
            $soma += $row['preco'];
            $total++;
        }
        echo "</table><br>";

        $media = $soma / $total;
        echo "<strong>Total de jogos:</strong> $total<br>";
        echo "<strong>Média de preços:</strong> R$ " . number_format($media, 2, ',', '.');
    } else {
        echo "<p>Nenhum jogo cadastrado ainda.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
