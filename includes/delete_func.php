<?php

include_once('../config/config.php');

// Deletar Dados do Funcionário

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE Id_Func=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0) {
        $sqlDelete = $conn->prepare("DELETE FROM funcionario WHERE Id_Func=$id");
        $sqlDelete->execute();

        echo "<script>";
        echo "alert('Funcionário deletado com sucesso!');";
        echo "window.location.href = '../pages/funcionarios.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Funcionário não existe!');";
        echo "window.location.href = '../pages/funcionarios.php';";
        echo "</script>";
    };
};

?>