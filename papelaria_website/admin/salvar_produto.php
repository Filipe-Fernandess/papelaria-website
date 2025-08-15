<?php
require_once "../db_lara_site/conexao_db.php";


$nome_produto = $_POST["nome-produto"];
$categoria = $_POST["categoria"];
$quantidade = $_POST["quantidade"];
$preco_atual = $_POST["preco-atual"];
$percentual_desconto = $_POST["percentual_desconto"];
$preco_antigo = $_POST["preco-antigo"];
$descricao = $_POST["descricao"];
$ativo = isset($_POST["ativo"]) ? 1 : 0; // Armazena o status bool do produto//

$preco = isset($_POST['preco-atual']) ? $_POST['preco-atual'] : '0,00';
$preco = str_replace(',', '.', $preco); // troca vírgula por ponto
$preco = floatval($preco);
$preco = number_format($preco, 2, '.', ''); // garante duas casas decimais

//Armazenando o caminho (../uploads/...) das imagens no banco de dados//
function salvarImagem($file, $upload_dir = "../uploads/") {
    if ($file["name"]) {
        $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid("img_") . "." . $ext;
        $destino = $upload_dir . $nome_arquivo;
        if (move_uploaded_file($file["tmp_name"], $destino)) {
            return $destino;
        }
    }
    return "";
}

$imagem_1_caminho = salvarImagem($_FILES["imagem1"]);
$imagem_2_caminho = salvarImagem($_FILES["imagem2"]);
$imagem_3_caminho = salvarImagem($_FILES["imagem3"]);
$imagem_4_caminho = salvarImagem($_FILES["imagem4"]);
$imagem_5_caminho = salvarImagem($_FILES["imagem5"]);
$imagem_6_caminho = salvarImagem($_FILES["imagem6"]);

// Corrija o SQL para incluir as colunas de imagem
$sql = "INSERT INTO produtos (nome, categoria, quantidade, preco_atual, percentual_desconto, preco_antigo, descricao, ativo, imagem_1, imagem_2, imagem_3, imagem_4, imagem_5, imagem_6) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da query: " . $conexao->error);
}
$stmt->bind_param(
    "ssididsissssss",
    $nome_produto,
    $categoria,
    $quantidade,
    $preco_atual,
    $percentual_desconto,
    $preco_antigo,
    $descricao,
    $ativo,
    $imagem_1_caminho,
    $imagem_2_caminho,
    $imagem_3_caminho,
    $imagem_4_caminho,
    $imagem_5_caminho,
    $imagem_6_caminho
);

if ($stmt->execute()) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar produto: " . $stmt->error;
}


