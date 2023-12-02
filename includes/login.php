<?php

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['pass'])) {

    include_once('../config/config.php');

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE Email = '$email' and Senha = '$pass'");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {};

    if ($row['Status_func'] == "Ativo" and $row['Funcao'] == "Gerente") {
        $numRows = count($rows);
    } else {
        $numRows = 0;
    };

    if ($numRows == 1) {
        echo "<script>";
        echo "alert('O usuário está correto, Bem-vindo!');";
        echo "window.location.href = '../pages/home.php';";
        echo "</script>";

    } else {
        echo "<script>";
        echo "alert('Os dados estão incorretos, tente novamente.');";
        echo "window.location.href = '../index.html';";
        echo "</script>";

    }
} else {
    echo "<script>";
    echo "alert('Preencha todos os campos!');";
    echo "window.location.href = '../index.html';";
    echo "</script>";
    
}
?>
