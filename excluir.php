<?php
include 'conexao.php';

$id = $_POST['id'];

$stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);

echo "ok";