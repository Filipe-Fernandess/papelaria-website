<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../estilo/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de produtos</title>
</head>
<header class = "head-estilizado">
        <div class = "nav-links">
                <div><a href="painel.html">Pagina inicial</a></div>
                <div><a href="gerenciar_produtos.php">Produtos</a></div>
                <div><a href="gerenciar_cupons.php">Cupons</a></div>
                <div><a href="banners.html">Banners</a></div>
                <div><a href="frases.html">Frases</a></div>

        </div>
</header>
<body>
    <div class = "selecao_categoria">
        <form action="" method="get">
            <label for="categoria">Selecione uma categoria</label><br>
            <select name="categoria" id="categoria">
                <option value="Leitura da Biblia">Leitura da Bíblia</option>
                <option value="Estudo Pessoal">Estudo Pessoal</option>
                <option value="Reuniao">Reunião</option>
                <option value="Pregacao">Pregação</option>
                <option value="Lembrancinhas">Lembrancinhas</option>
                <option value="Planner">Panner</option>
                <option value="Variados">Variados</option>
            </select><br><br>
        </form>
    </div>
    <label for="Pesquisa"></label>
        <input type="text" id = "Pesquisa" placeholder="Pesquisar produto..."><br><br>
        <a href="cadastrar_produto.html">
            <button class="btn-adicionar">Adicionar Produto</button>
        </a>
    <table border = "1" cellpadding = "10">
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Desconto</th>
            <th>Preço antigo</th>
            <th>Descrição</th>
            <th>Ações</th>
            <th>Ativo/Inativo</th>
        </tr>
        <div class="container-produtos">
            <?php include 'main_gerenciar_produtos.php';?>
        </div>
    </table>
</body>
</html>