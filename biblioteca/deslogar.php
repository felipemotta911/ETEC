<?php 
    session_start();
    session_unset();//Apaga valores
    session_destroy();//Destroir

    header("location:login.php");
?>