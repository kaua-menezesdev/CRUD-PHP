<?php

    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: index.php?msg=403');
        exit;
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = $db->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);

    $sql->execute();

    header('Location: index.php');