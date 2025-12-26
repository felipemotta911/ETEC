<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Document</title>
</head>
<body>
    <form action="cadastrar.php" class="form" method="post">
        <br>
        <h1>Cadastro</h1>
        Nome: <br><input type="text" class="input" name="nome"><br><br>
        Cidade: <br><input type="text" class="input" name="cidade"><br><br>
        Estado: <br><select name="estado" class="input" name="estado">
            <option>SP</option>
            <option>SC</option>
            <option>RJ</option>
            </select><br><br>
        Email: <br><input type="email" class="input" name="email"><br><br>
        Senha: <br><input type="password" class="input" name="senha" maxlength="8"><br><br>
        <input type="submit"value="ENVIAR" class="btn">
        <input type="reset" value="RESETAR" class="btn">
        <h5>Caso já tenha uma conta <a href="login.php" class="link">LOGUE AQUI</a></h5><br>
    </form>
</body>
</html>