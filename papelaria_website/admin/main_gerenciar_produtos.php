<?php
require_once '../db_lara_site/conexao_db.php';

// Consulta a tabela produtos e armazena o resultado em "resultado_produtos"
$sql_produtos = "SELECT * FROM produtos";
$resultado_produtos = $conexao->query($sql_produtos);

if (!$resultado_produtos) {
    die("Erro na consulta: " . $conexao->error);
}
else {
    // Verifica se há produtos na tabela
    if ($resultado_produtos->num_rows == 0) {
        echo "<tr><td colspan='9'>Nenhum produto encontrado.</td></tr>";
    }
}

//Exibicao organizada da tabela produto
while ($produto = $resultado_produtos->fetch_assoc()) {
    echo "<tr>";
    echo "<td><img src='" . $produto['imagem_1'] . "' width='100'></td>";
    echo "<td>" . $produto['nome'] . "</td>";
    echo "<td>" . $produto['categoria'] . "</td>";
    echo "<td>" . $produto['quantidade'] . "</td>";
    echo "<td>" . $produto['preco_atual'] . "</td>";
    echo "<td>" . $produto['percentual_desconto'] . "</td>";
    echo "<td>" . $produto['preco_antigo'] . "</td>";
    echo "<td>" . $produto['descricao'] . "</td>";
    echo "<divclass='cell-editar-produto'><td><a href='editar_produto.php'>Editar</td></a></div>";
    if ($produto['ativo'] == 1) {
        echo "<td>Ativo</td>";
    } else {
        echo "<td>Inativo</td>";
    }
    echo "</tr>";
}
