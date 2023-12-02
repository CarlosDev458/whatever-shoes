<?php

include_once('../config/config.php');

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM produto WHERE Id_prod=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0) {
        foreach ($rows as $user_data) {
            $descri = $user_data['Descricao'];
            $vl_venda = $user_data['Vl_venda'];
            $vl_custo = $user_data['Vl_custo'];
            $marca = $user_data['Marca'];
            $estante = $user_data['Estante'];
            $qtde = $user_data['Qtde'];
            $genero = $user_data['Genero'];
            $cor = $user_data['Cor'];
            $tamanho = $user_data['Tamanho'];
        }
    } else {
        header('Location: produtos.php');
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
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
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
                <?php
                echo "<h1>$descri ($marca)</h1>";
                ?>
            </div>

            <div class="form middle_of_content">

                <form action="<?php echo "../includes/save_edit_prod.php?id=$id"; ?>" method="POST">

                    <input type="hidden" name="id" value="aqui_o_seu_valor">

                    <div class="modal-body">
                        <div class="data_inputs">
                            <div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Descrição Produto</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                        maxlength="100" name="descricao" value="<?php echo $descri ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Preço de Venda</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder=""
                                        name="vl_venda" value="<?php echo $vl_venda ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Preço de Custo</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput3" placeholder=""
                                        name="vl_custo" value="<?php echo $vl_custo ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput4">Marca</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput4" placeholder=""
                                        name="marca" value="<?php echo $marca ?>">
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="estante">Estante</label>

                                    <select id="estante" name="estante" class="form-control">
                                        <option value="A1" <?php echo ($estante == 'A1') ? 'selected' : '' ?>>A1</option>
                                        <option value="A2" <?php echo ($estante == 'A2') ? 'selected' : '' ?>>A2</option>
                                        <option value="A3" <?php echo ($estante == 'A3') ? 'selected' : '' ?>>A3</option>
                                        <option value="A4" <?php echo ($estante == 'A4') ? 'selected' : '' ?>>A4</option>
                                        <option value="A5" <?php echo ($estante == 'A5') ? 'selected' : '' ?>>A5</option>
                                        <option value="B1" <?php echo ($estante == 'B1') ? 'selected' : '' ?>>B1</option>
                                        <option value="B2" <?php echo ($estante == 'B2') ? 'selected' : '' ?>>B2</option>
                                        <option value="B3" <?php echo ($estante == 'B3') ? 'selected' : '' ?>>B3</option>
                                        <option value="B4" <?php echo ($estante == 'B4') ? 'selected' : '' ?>>B4</option>
                                        <option value="B5" <?php echo ($estante == 'B5') ? 'selected' : '' ?>>B5</option>
                                        <option value="C1" <?php echo ($estante == 'C1') ? 'selected' : '' ?>>C1</option>
                                        <option value="C2" <?php echo ($estante == 'C2') ? 'selected' : '' ?>>C2</option>
                                        <option value="C3" <?php echo ($estante == 'C3') ? 'selected' : '' ?>>C3</option>
                                        <option value="C4" <?php echo ($estante == 'C4') ? 'selected' : '' ?>>C4</option>
                                        <option value="C5" <?php echo ($estante == 'C5') ? 'selected' : '' ?>>C5</option>
                                        <option value="D1" <?php echo ($estante == 'D1') ? 'selected' : '' ?>>D1</option>
                                        <option value="D2" <?php echo ($estante == 'D2') ? 'selected' : '' ?>>D2</option>
                                        <option value="D3" <?php echo ($estante == 'D3') ? 'selected' : '' ?>>D3</option>
                                        <option value="D4" <?php echo ($estante == 'D4') ? 'selected' : '' ?>>D4</option>
                                        <option value="D5" <?php echo ($estante == 'D5') ? 'selected' : '' ?>>D5</option>
                                        <option value="E1" <?php echo ($estante == 'E1') ? 'selected' : '' ?>>E1</option>
                                        <option value="E2" <?php echo ($estante == 'E2') ? 'selected' : '' ?>>E2</option>
                                        <option value="E3" <?php echo ($estante == 'E3') ? 'selected' : '' ?>>E3</option>
                                        <option value="E4" <?php echo ($estante == 'E4') ? 'selected' : '' ?>>E4</option>
                                        <option value="E5" <?php echo ($estante == 'E5') ? 'selected' : '' ?>>E5</option>
                                        <option value="F1" <?php echo ($estante == 'F1') ? 'selected' : '' ?>>F1</option>
                                        <option value="F2" <?php echo ($estante == 'F2') ? 'selected' : '' ?>>F2</option>
                                        <option value="F3" <?php echo ($estante == 'F3') ? 'selected' : '' ?>>F3</option>
                                        <option value="F4" <?php echo ($estante == 'F4') ? 'selected' : '' ?>>F4</option>
                                        <option value="F5" <?php echo ($estante == 'F5') ? 'selected' : '' ?>>F5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput5">Quantidade Disponível</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput6" placeholder=""
                                        name="qtde" value="<?php echo $qtde ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput5">Gênero</label>
                                    <select id="genero" name="genero" class="form-control">
                                        <option value="Feminino" <?php echo ($genero == 'Feminino') ? 'selected' : '' ?>>
                                            Feminino</option>
                                        <option value="Masculino" <?php echo ($genero == 'Masculino') ? 'selected' : '' ?>>Masculino</option>
                                        <option value="Unissex" <?php echo ($genero == 'Unissex') ? 'selected' : '' ?>>
                                            Unissex</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cor">Cor</label>
                                    <select id="cores1" name="cor" class="form-control">
                                        <option value="Vinho" <?php echo ($cor == 'Vinho') ? 'selected' : '' ?>>Vinho
                                        </option>
                                        <option value="Pink" <?php echo ($cor == 'Pink') ? 'selected' : '' ?>>Pink
                                        </option>
                                        <option value="Azul Turquesa" <?php echo ($cor == 'Azul Turquesa') ? 'selected' : '' ?>>Azul Turquesa</option>
                                        <option value="Azul Marinho" <?php echo ($cor == 'Azul Marinho') ? 'selected' : '' ?>>Azul Marinho</option>
                                        <option value="Verde Limão" <?php echo ($cor == 'Verde Limão') ? 'selected' : '' ?>>Verde Limão</option>
                                        <option value="Marfin" <?php echo ($cor == 'Marfin') ? 'selected' : '' ?>>Marfin
                                        </option>
                                        <option value="Bege" <?php echo ($cor == 'Bege') ? 'selected' : '' ?>>Bege
                                        </option>
                                        <option value="Preto" <?php echo ($cor == 'Preto') ? 'selected' : '' ?>>Preto
                                        </option>
                                        <option value="Cinza" <?php echo ($cor == 'Cinza') ? 'selected' : '' ?>>Cinza
                                        </option>
                                        <option value="Caramelo" <?php echo ($cor == 'Caramelo') ? 'selected' : '' ?>>
                                            Caramelo</option>
                                        <option value="Roxo" <?php echo ($cor == 'Roxo') ? 'selected' : '' ?>>Roxo
                                        </option>
                                        <option value="Laranja" <?php echo ($cor == 'Laranja') ? 'selected' : '' ?>>
                                            Laranja</option>
                                        <option value="Amarelo" <?php echo ($cor == 'Amarelo') ? 'selected' : '' ?>>
                                            Amarelo</option>
                                        <option value="Verde Esmeralda" <?php echo ($cor == 'Verde Esmeralda') ? 'selected' : '' ?>>Verde Esmeralda</option>
                                        <option value="Branco" <?php echo ($cor == 'Branco') ? 'selected' : '' ?>>Branco
                                        </option>
                                        <option value="Rosa" <?php echo ($cor == 'Rosa') ? 'selected' : '' ?>>Rosa
                                        </option>
                                        <option value="Azul Céu" <?php echo ($cor == 'Azul Céu') ? 'selected' : '' ?>>Azul
                                            Céu</option>
                                        <option value="Turquesa" <?php echo ($cor == 'Turquesa') ? 'selected' : '' ?>>
                                            Turquesa</option>
                                        <option value="Verde Oliva" <?php echo ($cor == 'Verde Oliva') ? 'selected' : '' ?>>Verde Oliva</option>
                                        <option value="Chocolate" <?php echo ($cor == 'Chocolate') ? 'selected' : '' ?>>
                                            Chocolate</option>
                                        <option value="Rubi" <?php echo ($cor == 'Rubi') ? 'selected' : '' ?>>Rubi
                                        </option>
                                        <option value="Rosa Choque" <?php echo ($cor == 'Rosa Choque') ? 'selected' : '' ?>>Rosa Choque</option>
                                        <option value="Roxo Escuro" <?php echo ($cor == 'Rosa Escuro') ? 'selected' : '' ?>>Roxo Escuro</option>
                                        <option value="Verde Menta" <?php echo ($cor == 'Verde Menta') ? 'selected' : '' ?>>Verde Menta</option>
                                        <option value="Marrom" <?php echo ($cor == 'Marrom') ? 'selected' : '' ?>>Marrom
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tamanho">Tamanho</label>
                                    <select id="tamanho" name="tamanho" class="form-control">
                                        <option value="35" <?php echo ($tamanho == '35') ? 'selected' : '' ?>>35</option>
                                        <option value="36" <?php echo ($tamanho == '36') ? 'selected' : '' ?>>36</option>
                                        <option value="37" <?php echo ($tamanho == '37') ? 'selected' : '' ?>>37</option>
                                        <option value="38" <?php echo ($tamanho == '38') ? 'selected' : '' ?>>38</option>
                                        <option value="39" <?php echo ($tamanho == '39') ? 'selected' : '' ?>>39</option>
                                        <option value="40" <?php echo ($tamanho == '40') ? 'selected' : '' ?>>40</option>
                                        <option value="41" <?php echo ($tamanho == '41') ? 'selected' : '' ?>>41</option>
                                        <option value="42" <?php echo ($tamanho == '42') ? 'selected' : '' ?>>42</option>
                                        <option value="43" <?php echo ($tamanho == '43') ? 'selected' : '' ?>>43</option>
                                        <option value="44" <?php echo ($tamanho == '44') ? 'selected' : '' ?>>44</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="produtos.php">
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
        </div>
    </main>
    <?php
    include '../includes/depen_bootstrap.php';
    ?>
</body>

</html>