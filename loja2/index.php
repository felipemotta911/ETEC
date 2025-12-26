<?php
    include_once "./app/DAO.php";
    $dao = new DAO();
    $lista = $dao->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Loja 2</h1>
    <div class="container">
        <br>
        <a href="cadastro.php" class="btn btn-success">CADASTRAR</a>
        <br>
        <table class="table table-stripped">
            <thead class="table-dark">
                <th>Id</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Idade</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach($lista as $row): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["nome"] ?></td>
                    <td><?= $row["cidade"] ?></td>
                    <td><?= $row["idade"] ?></td>
                    <td>
                        <a href="./atualiza.php?id=<?= $row["id"] ?>" class="btn btn-warning">Atualizar</a>
                        <a href="./app/controller.php?op=4&id=<?= $row["id"] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>