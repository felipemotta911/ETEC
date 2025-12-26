<?php
include_once "DAO.php";

$op = $_GET["op"];
$dao = new DAO();
$cliente = new Cliente();

if($op == "1"){
    $cliente->setNome($_POST["nome"]);
    $cliente->setCidade($_POST["cidade"]);
    $cliente->setIdade($_POST["idade"]);

    if($dao->salvar($cliente)){
        echo "<script>
                alert('Sucesso ao cadastrar!');
                document.location='../index.php';
                </script>";
    }else{
        echo $dao->salvar($cliente);
        echo "<script>
                alert('falha ao cadastrar');
                document.location='../index.php';
                </script>";
    }

    $dao->salvar($cliente);
}else if($op == "2"){
    $cliente->setId($_POST["id"]);
    $cliente->setNome($_POST["nome"]);
    $cliente->setCidade($_POST["cidade"]);
    $cliente->setIdade($_POST["idade"]);

    if($dao->salvar($cliente)){
        echo "<script>
                alert('Sucesso ao cadastrar!');
                document.location='../index.php';
                </script>";
    }else{
        echo $dao->salvar($cliente);
        echo "<script>
                alert('falha ao cadastrar');
                document.location='../index.php';
                </script>";
    }

    $dao->salvar($cliente);
}else if($op == "3"){

}else if($op == "4"){
    if($dao->excluir($_GET["id"])){
        echo "<script>
                alert('Sucesso ao excluir!');
                document.location='../index.php';
                </script>";
    }else{
        echo $dao->excluir($_GET["id"]);
        echo "<script>
                alert('falha ao excluir');
                document.location='..index.php';
                </script>";
    }
    }


include_once "Cliente.php";

$nome = $_POST["nome"];
$cidade = $_POST["cidade"];
$idade = $_POST["idade"];

$dao = new DAO();
$cliente = new Cliente();

$cliente->setNome($nome);
$cliente->setCidade($cidade);
$cliente->setIdade($idade);

/*if($dao->salvar($cliente)){
    echo "Sucesso ao cadastrar";
}else{
    echo "Erro ao cadastrar";
}*/
?>
