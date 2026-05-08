<?php

include 'conexao.php';

$id = $_GET['id'];

$sql = $db->prepare("
    DELETE FROM usuarios
    WHERE id = :id
");

$sql->bindValue(':id', $id);

$sql->execute();

header('Location: index.php');


exit;