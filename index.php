<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = $db->prepare("
    
        INSERT INTO usuarios (nome, email)
        VALUES (:nome, :email)
    
    ");

    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);

    $sql->execute();

    header('Location: index.php');
    exit;
}

$usuarios = $db->query("
    SELECT * FROM usuarios
    ORDER BY id DESC
")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD PHP</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>CRUD PHP + SQLite</h1>

    <form method="POST">

        <input
            type="text"
            name="nome"
            placeholder="Digite o nome"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Digite o email"
            required
        >

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <table>

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>

        </tr>

        <?php foreach($usuarios as $usuario): ?>

        <tr>

            <td><?= $usuario['id'] ?></td>

            <td><?= $usuario['nome'] ?></td>

            <td><?= $usuario['email'] ?></td>

            <td>

                <a
                    class="editar"
                    href="editar.php?id=<?= $usuario['id'] ?>"
                >
                    Editar
                </a>

                <a
                    class="excluir"
                    href="excluir.php?id=<?= $usuario['id'] ?>"
                    onclick="return confirm('Temn certeza que deseja excluir esse usário?')"
                >
                    Excluir
                </a>

    

            </td>

        </tr>

        <?php endforeach; ?>

    </table>

</div>

</body>

</html>