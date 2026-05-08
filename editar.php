<?php

include 'conexao.php';

$id = $_GET['id'];

$sql = $db->prepare("
    SELECT * FROM usuarios
    WHERE id = :id
");

$sql->bindValue(':id', $id);

$sql->execute();

$usuario = $sql->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $update = $db->prepare("
    
        UPDATE usuarios
        
        SET nome = :nome,
            email = :email
        
        WHERE id = :id
    
    ");

    $update->bindValue(':nome', $nome);
    $update->bindValue(':email', $email);
    $update->bindValue(':id', $id);

    $update->execute();

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Usuário</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Editar Usuário</h1>

    <form method="POST">

        <input
            type="text"
            name="nome"
            value="<?= $usuario['nome'] ?>"
            required
        >

        <input
            type="email"
            name="email"
            value="<?= $usuario['email'] ?>"
            required
        >

        <button type="submit">
            Atualizar
        </button>

    </form>

</div>

</body>

</html>