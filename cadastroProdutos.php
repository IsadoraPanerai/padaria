<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $descricao_produto = $_POST['descricao_produto'];


    $sql = "INSERT INTO produto (nome_produto, preco_produto, descricao_produto) VALUES (:nome_produto, :preco_produto, :descricao_produto)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome_produto', $nome_produto);
    $stmt->bindParam(':preco_produto', $preco_produto);
    $stmt->bindParam(':descricao_produto', $descricao_produto);
    $stmt->execute();

    header('Location: cadastroProdutos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos - Padaria</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="index.php">Registrar Venda</a>
        <a href="cadastroProdutos.php">Cadastro de Produtos</a>
        <a href="cadastroComprador.php">Cadastrar Comprador</a>
    </nav>

    <h1>Cadastrar Produto</h1>
    <form action="cadastroProdutos.php" method="POST">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required><br>

        <label for="preco_produto">Preço do Produto:</label>
        <input type="text" id="preco_produto" name="preco_produto" required><br>

        <label for="descricao_produto">Descrição do Produto:</label>
        <input type="text" id="descricao_produto" name="descricao_produto"><br>

        <button type="submit">Cadastrar Produto</button>
    </form>
</body>

</html>