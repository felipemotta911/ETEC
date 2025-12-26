<?php
    include_once "./app/DAO.php";
    $dao = new DAO();
    $dados = $dao->buscarID($_GET["id"]);
    var_dump($dados)
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
<h1 class= "text-center">Atualização</h1>
    <br>
    <form action="./app/controller.php?op=2" method="post" class="container">
        <label for="">ID</label>
        <input type="text" name="id" class="form-control" readonly> <br>
        <label for="">Nome</label>
        <input type="text" name="nome" class="form-control"> <br>
        <label for="">Cidade</label>
        <input type="text" name="cidade" class="form-control"> <br>
        <label for="">Idade</label>
        <input type="text" name="idade" class="form-control"> <br>
        <input type="submit" value="ATUALIZAR" class="btn btn-success">
    </form>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>