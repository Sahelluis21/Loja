<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mercearia Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/sitetocc8/public/css/style.css?v=2">
</head>
<body>
    <header>
        <h1>Mercearia Digital</h1>
        <nav>
            <a href="index.php?acao=listar">Produtos</a>
            <a href="index.php?acao=mostrarCarrinho">
            <i class="fas fa-shopping-cart"></i> Carrinho
            </a>

    </header>

    <main>
        <?php
        
        include $viewFile;
        ?>
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> - Minha Mercearia Digital</p>
    </footer>
</body>
</html>
