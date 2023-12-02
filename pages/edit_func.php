<?php

include_once('../config/config.php');

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE Id_Func=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0) {

        foreach ($rows as $user_data) {
            $nome = $user_data['Nome'];
            $senha = $user_data['Senha'];
            $funcao = $user_data['Funcao'];
            $email = $user_data['Email'];
            $sexo = $user_data['Sexo'];
            $salario = $user_data['Salario'];
            $data_admi = $user_data['Dt_Admissao'];

            if ($user_data['Dt_Demissao'] == "1900-01-01") {
                $data_demi = null;
            } else {
                $data_demi = $user_data['Dt_Demissao'];
            }
            ;

            $status = $user_data['Status_func'];
        }
    } else {
        header('Location: funcionarios.php');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="shortcut icon" href="../assets/images/high-heels.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/painels.css">
    <link rel="stylesheet" href="../assets/css/style_pattern.css">
    <link rel="stylesheet" href="../assets/css/modals.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">

</head>

<body>
    <header>
        <?php
        include '../includes/sidebar.php';
        include '../includes/navbar.php';
        ?>
    </header>

    <main style="margin-top: 98px;">

        <div class="content">

            <div class="title_main center_itens">
                <?php
                echo "<h1>$nome</h1>";
                ?>
            </div>

            <div class="form middle_of_content">

                <form action=" <?php echo "../includes/save_edit_func.php?id=$id"; ?>" method="POST">

                    <input type="hidden" name="id" value="aqui_o_seu_valor">

                    <div class="modal-body">
                        <div class="data_inputs">
                            <div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nome</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                        value="<?php echo $nome ?>" name="nome" maxlength="100">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Senha</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3" placeholder=""
                                        value="<?php echo $senha ?>" name="senha" maxlength="20">
                                </div>

                                <div class="form-group">
                                    <label for="função">Função</label>
                                    <select id="função_2" class="form-control cria_função" onchange="" name="funcao">
                                        <option value="" selected disabled hidden></option>
                                        <option value="Atendente" <?php echo ($funcao == 'Atendente') ? 'selected' : ''; ?>>Atendente</option>
                                        <option value="Caixa" <?php echo ($funcao == 'Caixa') ? 'selected' : ''; ?>>Caixa
                                        </option>
                                        <option value="Gerente" <?php echo ($funcao == 'Gerente') ? 'selected' : ''; ?>>
                                            Gerente</option>
                                        <option value="Assistente Administrativo" <?php echo ($funcao == 'Assistente Administrativo') ? 'selected' : ''; ?>>Assistente Administrativo
                                        </option>
                                        <option value="Estoquista" <?php echo ($funcao == 'Estoquista') ? 'selected' : ''; ?>>Estoquista</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput9">Email</label>
                                    <input type="email" class="form-control" id="formGroupExampleInput9" placeholder=""
                                        name="email" value="<?php echo $email ?>">
                                </div>

                                <div class="form-group">
                                    <label for="sexo">Sexo</label>
                                    <select id="sexo" name="sexo" class="form-control" name="sexo" <?php $sexo == 'F' ? 'checked' : '' ?>>
                                        <option value="" selected disabled hidden></option>
                                        <option value="F" <?php echo ($sexo == 'F') ? 'selected' : ''; ?>>Feminino
                                        </option>
                                        <option value="M" <?php echo ($sexo == 'M') ? 'selected' : ''; ?>>Masculino
                                        </option>
                                        <option value="O" <?php echo ($sexo == 'O') ? 'selected' : ''; ?>>Outros</option>
                                    </select>
                                </div>

                            </div>

                            <div>

                                <div class="form-group">
                                    <label for="formGroupExampleInpu6">Salário</label>
                                    <input type="text" class="form-control" id="formGroupExampleInpu6" name="salario"
                                        placeholder="" value="<?php echo $salario ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput8">Data Admissão</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput8" name="data_admi"
                                        placeholder="" value="<?php echo $data_admi ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput9">Data Desligamento</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput9" name="data_demi"
                                        placeholder="" value="<?php echo $data_demi ?>">
                                </div>

                                <div class="form-group">
                                    <label for="Status">Status</label>
                                    <select id="sexo" class="form-control" name="status">
                                        <option value="" selected disabled hidden></option>
                                        <option value="Inativo" <?php echo ($status == 'Inativo') ? 'selected' : ''; ?>>
                                            Inativo</option>
                                        <option value="Ativo" <?php echo ($status == 'Ativo') ? 'selected' : ''; ?>>Ativo
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">

                        <a href="funcionarios.php">
                            <button type="button" class="close-modal-venda btn-pattern " data-bs-dismiss="modal">
                                <strong>Cancelar</strong></button>
                        </a>
                        &nbsp;&nbsp;
                        <input type="submit" class="save-modal-venda btn-pattern" value="Salvar" name="update"
                            id="update">
                        </input>

                    </div>
                </form>
            </div>

    </main>

    <?php
    include '../includes/depen_bootstrap.php';
    ?>

</body>

</html>