<?php 
    $nome       = $_POST["nome"];
    $cidade     = $_POST["cidade"];
    $estado     = $_POST["estado"];
    $email      = $_POST["email"];
    $senha      = $_POST["senha"];

    $con = mysqli_connect("localhost","root","","biblioteca");
    $sql = "INSERT INTO clientes VALUES(0,'$nome','$estado','$cidade','$email','$senha')";

    if (mysqli_query($con, $sql)) {
        echo "Gravado com sucesso";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      
      mysqli_close($con);
      header("location:login.php")
?>