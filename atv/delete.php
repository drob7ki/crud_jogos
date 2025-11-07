<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM jogos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>🗑️ Registro excluído com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conn->error . "</p>";
    }
}
$conn->close();
?>
<a href="index.php">⬅️ Voltar à lista</a>
