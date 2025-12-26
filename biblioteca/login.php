
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Loja</title>
</head>
<body>
    <form action="logar.php" class="form" method="post">
        <h1>Login</h1>

        Email: <br><input type="email" name="email" class="input"><br><br>
        Senha: <br><input type="password" name="senha" class="input" maxlength="8"><br><br>
        
        <input type="submit" value="ENVIAR" class="btn">
        <input type="reset" value="RESETAR" class="btn">
        
        <h5>Caso não tenha uma conta <a href="cadastro.php" class="link">CADASTRE-SE AQUI</a></h5>
        
    </form>
</body>
</html>