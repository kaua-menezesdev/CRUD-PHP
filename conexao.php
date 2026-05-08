<?php

try {

    $db = new PDO('sqlite:banco.db');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("
    
        CREATE TABLE IF NOT EXISTS usuarios (
        
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL
        
        )
    
    ");

} catch(PDOException $e) {

    die("Erro: " . $e->getMessage());

}