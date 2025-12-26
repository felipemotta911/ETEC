<?php
    $id = $_GET["id"];
    $con = mysqli_connect("127.0.0.1", "root", "", "biblioteca");
    $sql = "DELETE FROM Livros WHERE id = $id";
    mysqli_query($con, $sql);
    header("location:livros.php");
?>    