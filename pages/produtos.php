<?php

include_once('../config/config.php');

if (isset($_POST['submit'])) {

    $descri = isset($_POST['descricao']) ? $_POST['descricao'] : '';
    $vl_venda = isset($_POST['vl_venda']) ? $_POST['vl_venda'] : '';
    $vl_custo = isset($_POST['vl_custo']) ? $_POST['vl_custo'] : '';
    $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
    $estante = isset($_POST['estante']) ? $_POST['estante'] : '';
    $qtde = isset($_POST['qtde']) ? $_POST['qtde'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $cor = isset($_POST['cor']) ? $_POST['cor'] : '';
    $tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : '';

    // Verificar se todas as variáveis têm conteúdo
    if (!empty($descri) && !empty($vl_venda) && !empty($vl_custo) && !empty($marca) && !empty($estante) && !empty($qtde) && !empty($cor) && !empty($tamanho)) {
        $stmt = $conn->prepare("INSERT INTO produto (Vl_custo, Vl_venda, Marca, Estante, Descricao, Cor, Genero, Tamanho, Qtde) 
        VALUES ($vl_custo, $vl_venda, '$marca', '$estante', '$descri', '$cor', '$genero' , $tamanho, $qtde )");
        $stmt->execute();
        echo "<script>alert('Produto cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Por favor, preencha todos os campos antes de enviar o formulário.');</script>";
    }
}
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
                <h1>Painel de Produtos</h1>
            </div>

            <div class="form">
                <button class="button btn" type="submit" data-toggle="modal" data-bs-toggle="modal"
                    data-bs-target="#create_produto" onclick="">Novo Produto</button>

                <form action="produtos.php" method="POST">
                    <div class="modal fade" id="create_produto" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header modal-header-produto">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Produto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body modal-body-produto">
                                    <div class="data_inputs">
                                        <div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Descrição Produto</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="" maxlength="100" name="descricao">
                                            </div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Preço de Venda</label>
                                                <input type="number" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="" name="vl_venda">
                                            </div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput3">Preço de Custo</label>
                                                <input type="number" class="form-control" id="formGroupExampleInput3"
                                                    placeholder="" name="vl_custo">
                                            </div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput4">Marca</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput4"
                                                    placeholder="" name="marca">
                                            </div>

                                        </div>
                                        <div>

                                            <div class="form-group">
                                                <label for="estante">Estante</label>
                                                <select id="estante" name="estante" class="form-control">
                                                    <option value="" selected disabled hidden></option>
                                                    <option value="A1">A1</option>
                                                    <option value="A2">A2</option>
                                                    <option value="A3">A3</option>
                                                    <option value="A4">A4</option>
                                                    <option value="A5">A5</option>
                                                    <option value="B1">B1</option>
                                                    <option value="B2">B2</option>
                                                    <option value="B3">B3</option>
                                                    <option value="B4">B4</option>
                                                    <option value="B5">B5</option>
                                                    <option value="C1">C1</option>
                                                    <option value="C2">C2</option>
                                                    <option value="C3">C3</option>
                                                    <option value="C4">C4</option>
                                                    <option value="C5">C5</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="D4">D4</option>
                                                    <option value="D5">D5</option>
                                                    <option value="E1">E1</option>
                                                    <option value="E2">E2</option>
                                                    <option value="E3">E3</option>
                                                    <option value="E4">E4</option>
                                                    <option value="E5">E5</option>
                                                    <option value="F1">F1</option>
                                                    <option value="F2">F2</option>
                                                    <option value="F3">F3</option>
                                                    <option value="F4">F4</option>
                                                    <option value="F5">F5</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput5">Quantidade Disponível</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput6"
                                                    placeholder="" name="qtde">
                                            </div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput5">Gênero</label>
                                                <select id="genero" name="genero" class="form-control">
                                                    <option value="" selected disabled hidden></option>
                                                    <option value="Feminino">Feminino</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Unissex">Unissex</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="cor">Cor</label>
                                                <select id="cores1" name="cor" class="form-control">
                                                    <option value="" selected disabled hidden></option>
                                                    <option value="Vinho">Vinho</option>
                                                    <option value="Pink">Pink</option>
                                                    <option value="Azul Turquesa">Azul Turquesa</option>
                                                    <option value="Azul Marinho">Azul Marinho</option>
                                                    <option value="Verde Limão">Verde Limão</option>
                                                    <option value="Marfin">Marfin</option>
                                                    <option value="Bege">Bege</option>
                                                    <option value="Preto">Preto</option>
                                                    <option value="Cinza">Cinza</option>
                                                    <option value="Caramelo">Caramelo</option>
                                                    <option value="Roxo">Roxo</option>
                                                    <option value="Laranja">Laranja</option>
                                                    <option value="Amarelo">Amarelo</option>
                                                    <option value="Verde Esmeralda">Verde Esmeralda</option>
                                                    <option value="Branco">Branco</option>
                                                    <option value="Rosa">Rosa</option>
                                                    <option value="Azul Céu">Azul Céu</option>
                                                    <option value="Turquesa">Turquesa</option>
                                                    <option value="Verde Oliva">Verde Oliva</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Rubi">Rubi</option>
                                                    <option value="Rosa Choque">Rosa Choque</option>
                                                    <option value="Roxo Escuro">Roxo Escuro</option>
                                                    <option value="Verde Menta">Verde Menta</option>
                                                    <option value="Marrom">Marrom</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tamanho">Tamanho</label>
                                                <select id="tamanho" name="tamanho" class="form-control">
                                                    <option value="" selected disabled hidden></option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="close-modal-venda btn-pattern "
                                        data-bs-dismiss="modal">
                                        <strong>Cancelar</strong></button>
                                    <button type="submit" name="submit" id="submit"
                                        class="save-modal-venda btn-pattern"> <strong>
                                            Salvar</strong></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <div class="search input-group mb-3">
                    <input type="text" class="form-control" placeholder="Filtre por Id/Descrição/Cor/Estante"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" id="pesquisar">
                    <div class="input-group-append">
                        <button class="filter-btn btn" type="button" onclick="searchData()">Filtrar</button>
                    </div>
                </div>

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
                        <th id="th_12" scope="col">Gên.</th>
                        <th id="th_10" scope="col">Tam.</th>
                        <th id="th_8" scope="col">Qtde</th>
                        <th id="th_11" scope="col">...</th>
                    </tr>
                </thead>

                <tbody class="body-table center_itens">

                    <?php
                    // Lista Funcionários
                    $stmt = $conn->prepare("SELECT * FROM produto");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $user_data) {
                        echo '<tr class="line_table">';
                        echo '<th scope="row">' . $user_data['Id_prod'] . '</th>';
                        echo '<td>' . $user_data['Descricao'] . '</td>';
                        echo '<td>' . $user_data['Vl_venda'] . '</td>';
                        echo '<td>' . $user_data['Vl_custo'] . '</td>';
                        echo '<td>' . $user_data['Marca'] . '</td>';
                        echo '<td>' . $user_data['Estante'] . '</td>';
                        echo '<td>' . $user_data['Cor'] . '</td>';
                        echo '<td>' . $user_data['Genero'] . '</td>';
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
            </table>
        </div>
    </main>

    <?php
    include '../includes/depen_bootstrap.php';
    ?>

</body>
<script>
    var search = document.getElementById('pesquisar');

    function searchData() {
        window.location = 'filter_prod.php?search=' + search.value;
    }
</script>
</html>
