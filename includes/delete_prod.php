<?php

include_once('../config/config.php');

// Deletar Dados do Produto

if (!empty($_GET['id'])) {

    $id = $_GET['id'];


    $stmt = $conn->prepare("SELECT * FROM produto WHERE Id_prod=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0) {
        $sqlDelete = $conn->prepare("DELETE FROM produto WHERE Id_prod=$id");
        $sqlDelete->execute();

        echo "<script>";
        echo "alert('Produto deletado com sucesso!');";
        echo "window.location.href = '../pages/produtos.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Produto não existe!');";
        echo "window.location.href = '../pages/produtos.php';";
        echo "</script>";
    };
};

?>