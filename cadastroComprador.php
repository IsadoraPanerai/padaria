<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $telefone_comprador = $_POST['telefone_comprador'];
    $endereco_comprador = $_POST['endereco_comprador'];
    $nome_comprador = $_POST['nome_comprador'];

    $sql = "INSERT INTO comprador (telefone_comprador, endereco_comprador, nome_comprador)
            VALUES (:telefone_comprador, :endereco_comprador, :nome_comprador)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':telefone_comprador', $telefone_comprador);
    $stmt->bindParam(':endereco_comprador', $endereco_comprador);
    $stmt->bindParam(':nome_comprador', $nome_comprador);

    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Comprador - Padaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.php">Registrar Venda</a>
        <a href="cadastroProduto.php">Cadastro de Produtos</a>
        <a href="cadastroComprador.php">Cadastrar Comprador</a>
    </nav>

    <h1>Cadastro de Comprador</h1>
    <form action="cadastroComprador.php" method="POST">
        <label for="nome_comprador">Nome do Comprador:</label>
        <input type="text" id="nome_comprador" name="nome_comprador" required><br>

        <label for="telefone_comprador">Telefone:</label>
        <input type="text" id="telefone_comprador" name="telefone_comprador" required><br>

        <label for="endereco_comprador">Endereço:</label>
        <input type="text" id="endereco_comprador" name="endereco_comprador"><br>

        <button type="submit">Cadastrar Comprador</button>
    </form>
</body>
</html>