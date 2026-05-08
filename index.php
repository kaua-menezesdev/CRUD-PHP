<?php

include 'conexao.php';

$usuarios = $db->query("
    SELECT * FROM usuarios ORDER BY id DESC
")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4">CRUD PHP + SQLite</h3>

    <button class="btn btn-primary mb-3" id="btnNovo">
        + Novo Registro
    </button>

    <!-- FORM -->
    <div class="card p-3 mb-3" id="formCard" style="display:none;">
        <form id="formUsuario">

            <input type="hidden" id="id">

            <input type="text" id="nome" class="form-control mb-2" placeholder="Nome">
            <input type="email" id="email" class="form-control mb-2" placeholder="Email">

            <button class="btn btn-success">Salvar</button>

        </form>
    </div>

    <!-- TABELA -->
    <table id="tabela" class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach ($usuarios as $u): ?>

            <tr>
                <td><?= $u['id'] ?></td>

                <td><?= htmlspecialchars($u['nome']) ?></td>

                <td><?= htmlspecialchars($u['email']) ?></td>

                <td>

                    <button class="btn btn-warning btn-sm editar"
                        data-id="<?= $u['id'] ?>"
                        data-nome="<?= htmlspecialchars($u['nome'], ENT_QUOTES) ?>"
                        data-email="<?= htmlspecialchars($u['email'], ENT_QUOTES) ?>">
                        Editar
                    </button>

                    <button class="btn btn-danger btn-sm excluir"
                        data-id="<?= $u['id'] ?>">
                        Excluir
                    </button>

                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="script.js"></script>

</body>
</html>