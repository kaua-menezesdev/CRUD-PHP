<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = $db->prepare("
    
        UPDATE usuarios
        
        SET nome = :nome,
            email = :email
        
        WHERE id = :id
    
    ");

    $sql->bindValue(':id', $id);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);

    $sql->execute();

}

header('Location: index.php');
exit;