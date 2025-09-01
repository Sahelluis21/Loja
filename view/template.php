<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lojinha Bacana</title>
    <link rel="stylesheet" href="/sitetocc8/public/css/style.css?v=2">
</head>
<body>
    <header>
        <h1>Página Inicial</h1>
        <nav>
            <a href="index.php?acao=listar">Listar Produtos</a>
            <a href="index.php?acao=mostrarCarrinho">Carrinho</a>
        </nav>
    </header>

    <main>
        <?php
        
        include $viewFile;
        ?>
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> - Minha Aplicação</p>
    </footer>
</body>
</html>
