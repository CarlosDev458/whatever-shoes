<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/high-heels.png" type="image/x-icon">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/style_pattern.css">
    
</head>

<body>
    <header>
        <?php
        include '../includes/sidebar.php';
        include '../includes/navbar.php';
        ?>
    </header>

    <main>
        <div class="container  middle_of_content center_itens">
            <h1>Bem-Vindo <br> Whatever Shoes!!!</h1>
            <p>Você está logado no sistema da <ins><strong>Whatever Shoes</strong></ins> a maior loja de sapatos da
                região! </p>
        </div>
    </main>

    <?php
    include '../includes/depen_bootstrap.php';
    ?>
</body>

</html>