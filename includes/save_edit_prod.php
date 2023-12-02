<?php

include_once('../config/config.php');

if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $descri = $_POST['descricao'];
    $vl_venda = $_POST['vl_venda'];
    $vl_custo = $_POST['vl_custo'];
    $marca = $_POST['marca'];
    $estante = $_POST['estante'];
    $qtde = $_POST['qtde'];
    $cor = $_POST['cor'];
    $genero = $_POST['genero'];
    $tamanho = $_POST['tamanho'];

    if (!empty($descri) && !empty($vl_venda) && !empty($vl_custo) && !empty($marca) && !empty($estante) && !empty($qtde) && !empty($cor) && !empty($tamanho)) {
        $sqlUpdate = $conn->prepare("UPDATE produto SET Vl_custo=$vl_custo, Vl_venda=$vl_venda, Marca='$marca', Estante='$estante',
     Descricao='$descri' , Cor='$cor' , Genero='$genero' ,Tamanho=$tamanho , Qtde=$qtde
     WHERE Id_prod=$id");

        $sqlUpdate->execute();

        echo "<script>";
        echo "alert('Dados atualizados com sucesso!!!');";
        echo "window.location.href = '../pages/produtos.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Preencha todos os campos.');";
        echo "window.location.href = '../pages/produtos.php';";
        echo "</script>";
    };
}
?>