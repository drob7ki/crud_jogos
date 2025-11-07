<?php include('db_connect.php');

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM jogos WHERE id=$id");

if ($result->num_rows == 0) {
    die("Jogo não encontrado.");
}

$jogo = $result->fetch_assoc();

if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $plataforma = $_POST['plataforma'];
    $preco = $_POST['preco'];
    $ano = $_POST['ano_lancamento'];

    $sql = "UPDATE jogos SET nome='$nome', plataforma='$plataforma', preco='$preco', ano_lancamento='$ano' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>✅ Registro atualizado com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conn->error . "</p>";
    }
}
?>

<h2>✏️ Editar Jogo</h2>
<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $jogo['nome'] ?>" required><br><br>
    Plataforma: <input type="text" name="plataforma" value="<?= $jogo['plataforma'] ?>" required><br><br>
    Preço: <input type="number" name="preco" step="0.01" value="<?= $jogo['preco'] ?>" required><br><br>
    Ano de Lançamento: <input type="number" name="ano_lancamento" value="<?= $jogo['ano_lancamento'] ?>" required><br><br>
    <input type="submit" name="atualizar" value="Salvar Alterações">
</form>
<a href="index.php">⬅️ Voltar</a>

<?php $conn->close(); ?>
