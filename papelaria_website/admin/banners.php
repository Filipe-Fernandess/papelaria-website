<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../estilo/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banners</title>
</head>
<header class = "head-estilizado">
        <div class = "nav-links">
                <div><a href="painel.html">Pagina inicial</a></div>
                <div><a href="gerenciar_produtos.php">Produtos</a></div>
                <div><a href="gerenciar_cupons.php">Cupons</a></div>
                <div><a href="banners.php">Banners</a></div>
                <div><a href="frases.php">Frases</a></div>

        </div>
</header>
<body>
        <h1 class="title">Gerenciar Banners</h1>
        <div class="container-banners">
                <p>Use os botões para navegar entre os banners.</p>
                <?php include 'main_gerenciar_banners.php'; ?>
                <a href="adicionar_banners.html" class="add-banner">       
                <button>Adicionar Banner</button>
                </a>
        </div>
</body>
<script src="../js/function_admin_banners.js"></script>
</html>
