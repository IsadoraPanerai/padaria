<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $descricao_produto = $_POST['descricao_produto'];


    $sql = "INSERT INTO venda (nome_produto, preco_produto, descricao_produto) VALUES (:nome_produto, :preco_produto, :descricao_produto)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome_produto', $nome_produto);
    $stmt->bindParam(':preco_produto', $preco_produto);
    $stmt->bindParam(':descricao_produto', $descricao_produto);
    $stmt->execute();

    header('Location: cadastroProdutos.php');
    exit;
}



$sql = "SELECT * FROM comprador";
$stmt = $conn->prepare($sql);
$stmt->execute();
$comprador = $stmt->fetchAll();

$sql = "SELECT * FROM produto";
$stmt = $conn->prepare($sql);
$stmt->execute();
$produto = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venda - Padaria</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function preencherDadosComprador() {
        var compradorId = document.getElementById("id_comprador").value;
        var telefone = document.getElementById("telefone_comprador");
        var endereco = document.getElementById("endereco_comprador");

        <?php foreach ($comprador as $comp): ?>
            if (compradorId == "<?php echo $comp['id_comprador']; ?>") {
                telefone.value = "<?php echo $comp['telefone_comprador']; ?>";
                endereco.value = "<?php echo $comp['endereco_comprador']; ?>";
            }
        <?php endforeach; ?>
    }

    function preencherDadosProdutos() {
        var produtoId = document.getElementById("id_produto").value;
        var preco = document.getElementById("preco_produto");
        var descricao = document.getElementById("descricao_produto");

        <?php foreach ($produto as $prod): ?>
            if (produtoId == "<?php echo $prod['id_produto']; ?>") {
                preco.value = "<?php echo $prod['preco_produto']; ?>";
                descricao.value = "<?php echo $prod['descricao_produto']; ?>";
            }
        <?php endforeach; ?>
    }
</script>
</head>

<body>
    <nav>
        <a href="index.php">Registrar Venda</a>
        <a href="cadastroProdutos.php">Cadastro de Produtos</a>
        <a href="cadastroComprador.php">Cadastrar Comprador</a>
    </nav>

    <h1>Registrar Venda</h1>
    <form action="index.php" method="POST">
        <label for="id_comprador">Selecione o Comprador:</label>
        <select id="id_comprador" name="id_comprador" onchange="preencherDadosComprador()" required>
            <option value="">Escolha o Comprador</option>
            <?php foreach ($comprador as $comp): ?>
                <option value="<?php echo $comp['id_comprador']; ?>"><?php echo $comp['nome_comprador']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="id_produto">Selecione o Produto:</label>
        <select id="id_produto" name="id_produto" onchange="preencherDadosProdutos()" required>
            <option value="">Escolha o Produto</option>
            <?php foreach ($produto as $prod): ?>
                <option value="<?php echo $prod['id_produto']; ?>"><?php echo $prod['nome_produto']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="telefone_comprador">Telefone:</label>
        <input type="text" id="telefone_comprador" name="telefone_comprador" disabled><br>

        <label for="endereco_comprador">Endereço:</label>
        <input type="text" id="endereco_comprador" name="endereco_comprador" disabled><br>

        <label for="preco_produto">Preço:</label>
        <input type="number" id="preco_produto" name="preco_produto" disabled><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br>

        <label for="descricao_produto">Descrição:</label>
        <input type="text" id="descricao_produto" name="descricao_produto" disabled><br>

        <button type="submit">Registrar Venda</button>
    </form>
</body>

</html>