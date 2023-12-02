<?php

include_once('../config/config.php');

if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $salario = $_POST['salario'];
    $data_admi = $_POST['data_admi'];
    $data_demi = $_POST['data_demi'];
    if (empty($data_demi)) {
        $data_demi = "";
    }
    $status = $_POST['status'];

    if (!empty($nome) && !empty($senha) && !empty($data_admi) && !empty($funcao) && !empty($email) && !empty($status) && !empty($sexo) && !empty($salario)) {
        $sqlUpdate = $conn->prepare("UPDATE funcionario SET Nome='$nome', Senha='$senha', Funcao='$funcao', Email='$email',
     Sexo='$sexo' , Salario='$salario' ,Dt_Admissao='$data_admi' , Dt_Demissao='$data_demi' , Status_func='$status'
     WHERE Id_Func=$id");

        $sqlUpdate->execute();

        echo "<script>";
        echo "alert('Dados atualizados com sucesso!!!');";
        echo "window.location.href = '../pages/funcionarios.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Preencha todos os campos.');";
        echo "window.location.href = '../pages/funcionarios.php';";
        echo "</script>";
    };
}
?>