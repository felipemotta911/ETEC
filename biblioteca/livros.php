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
  <link rel="stylesheet" href="css/livro.css">
  <title>SITE</title>
</head>
<body>
  <header><br>
  <a href="deslogar.php" class="ah">logout</a>
     <h1>Livros disponiveis</h1>
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
  <h1> Livros </h1>
    <hr>
    <table>
    <table style="border: 1px solid;">    
        <tr>
            <th>id</th>
            <th>titulo</th>
            <th>genero</th>
            <th>preco</th>
            <th>autor</th>
            <th>qnt_livros</th>
            <th>status_livros</th>
        </tr>    
    <?php
        $con = mysqli_connect("127.0.0.1", "root", "", "biblioteca");
        $sql = "SELECT * FROM Livros";
        $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        echo "<tr><td>"
        .$row["id"]."</td><td>  "
        .$row["titulo"]."</td><td> "
        .$row["genero"]." </td><td> "
        .$row["preco"]." </td><td> "
        .$row["autor"]." </td><td> "
        .$row["qnt_livros"]." </td><td> "
        .$row["status_livros"]."</td>".
        "<td><a href='excluirlivro.php?id=$id'>Excluir</a></td><tr>";
    }    

    ?>
</body>
</html>