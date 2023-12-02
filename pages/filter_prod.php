<?php

include_once('../config/config.php');

if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM produto WHERE Id_prod LIKE '%$search%' or Descricao LIKE '%$search%' or Estante LIKE '%$search%' or Cor LIKE '%$search%'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} else {
    $stmt = $conn->prepare("SELECT * FROM produto");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
};

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="shortcut icon" href="../assets/images/high-heels.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/painels.css">
    <link rel="stylesheet" href="../assets/css/style_pattern.css">
    <link rel="stylesheet" href="../assets/css/modals.css">
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
                <h1>Produtos Filtrados</h1>
            </div>

            <div class="form">
                <a href="produtos.php">
                <button class="button btn" type="submit">Voltar</button>
                </a>
            </div>

            <table class="table">

                <thead class="col">
                    <tr class="header center_itens">
                        <th id="th_2" scope="col">Id</th>
                        <th id="th_3" scope="col">Descrição</th>
                        <th id="th_4" scope="col">Preço V.</th>
                        <th id="th_5" scope="col">Preço C.</th>
                        <th id="th_6" scope="col">Marca</th>
                        <th id="th_7" scope="col">Estante</th>
                        <th id="th_9" scope="col">Cor</th>
                        <th id="th_10" scope="col">Tam.</th>
                        <th id="th_8" scope="col">Qtde</th>
                        <th id="th_11" scope="col">...</th>
                    </tr>
                </thead>

                <tbody class="body-table center_itens">

                    <?php
                    // Lista Funcionários
                    foreach ($result as $user_data) {
                        echo '<tr class="line_table">';
                        echo '<th scope="row">' . $user_data['Id_prod'] . '</th>';
                        echo '<td>' . $user_data['Descricao'] . '</td>';
                        echo '<td>' . $user_data['Vl_venda'] . '</td>';
                        echo '<td>' . $user_data['Vl_custo'] . '</td>';
                        echo '<td>' . $user_data['Marca'] . '</td>';
                        echo '<td>' . $user_data['Estante'] . '</td>';
                        echo '<td>' . $user_data['Cor'] . '</td>';
                        echo '<td>' . $user_data['Tamanho'] . '</td>';
                        echo '<td>' . $user_data['Qtde'] . '</td>';
                        echo "<td>
                        <div class='d-flex justify-content-center align-items-center'>
                            <a class='' href='edit_prod.php?id=$user_data[Id_prod]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                    <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                </svg>
                            </a>
                    <!-- Adding a space between the two <a> elements -->
                    &nbsp;&nbsp;
                            <a class='' href='javascript:void(0);' onclick='confirmarExclusao($user_data[Id_prod]);'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-trash' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                </svg>
                            </a>
                        </div>
                        </td>";
                        echo '</tr>';

                    }
                    ?>

                    <script>
                        function confirmarExclusao(idProduto) {
                            if (confirm("Tem certeza de que deseja excluir este produto?")) {
                                window.location.href = '../includes/delete_prod.php?id=' + idProduto;
                            }
                        }
                    </script>
                </tbody>

        </div>
    </main>

    <?php
    include '../includes/depen_bootstrap.php';
    ?>
</body>
 
</html>