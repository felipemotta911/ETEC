<?php 
$email = $_POST["email"];
$senha = $_POST["senha"];
$nome;

     $con = mysqli_connect("localhost","root","","biblioteca");
     $sql = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
     $result = mysqli_query($con, $sql);
     if (mysqli_num_rows($result) > 0) {
        header("location:principal.php");
        while($row = mysqli_fetch_assoc($result)) {
          $nome = $row["nome"];
          echo $nome;
        }
      } else {
        echo "USUÁRIO NÃO ENCONTRADO!!!";
        header("location:login.php");
      }

      mysqli_close($con);

      session_start();
      $_SESSION["nome"] = $nome;

      
?>