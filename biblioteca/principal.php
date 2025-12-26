<?php 
    session_start();
    $nome = $_SESSION["nome"];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/principal.css">
  <title>SITE</title>
</head>
<body>
  <header><br>
  <a href="deslogar.php" class="ah">logout</a>
     <h1><?php echo "Seja bem vindo, " . $nome;?></h1>
  </header><br><br>
 <br>
 <br>
  <nav class="menu">
    <ul>
      <li><a href="principal.php" >Home</a></li>
      <li><a href="locar.php" >Locar</a></li>
      <li><a href="clientes.php" >Clientes</a></li>
      <li><a href="livros.php" >Livros</a></li>
    </ul>
  </nav>
  <form action="cadlivros.php" class="form" method="post">
        <br>
        <h1>Cadastro</h1>
        titulo: <br><input type="text" class="input" name="titulo"><br><br>
        genero: <br><input type="text" class="input" name="genero"><br><br>
        preco: <br><input type="text" class="input" name="preco"><br><br>
        autor: <br><input type="text" class="input" name="autor"><br><br>
        quantidade de livros: <br><input type="text" class="input" name="qnt_livros"><br><br>
        status do livro: <br><input type="text" class="input" name="status_livros"><br><br>
        <input type="submit"value="ENVIAR" class="btn">
        <input type="reset" value="RESETAR" class="btn">
    </form>
</body>
</html>