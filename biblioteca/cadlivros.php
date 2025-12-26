<?php 
    $titulo       = $_POST["titulo"];
    $genero     = $_POST["genero"];
    $preco     = $_POST["preco"];
    $autor      = $_POST["autor"];
    $qnt_livros      = $_POST["qnt_livros"];
    $status_livros     =$_POST["status_livros"];

    $con = mysqli_connect("localhost","root","","biblioteca");
    $sql = "INSERT INTO Livros VALUES(0,'$titulo','$genero','$preco','$autor','$qnt_livros','$status_livros')";

    if (mysqli_query($con, $sql)) {
        echo "Gravado com sucesso";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      
      mysqli_close($con);
      header("location:livros.php")
?>