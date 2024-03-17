<?php
require_once 'global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['codigo'])) {
    $produtoId = $_POST['codigo'];

    try {
        // Obtenha os dados do formulário
        $descricao = $_POST['descricao'];
        $codBarras = $_POST['codBarras'];
        $valorVenda = $_POST['valorVenda'];
        $pesoBruto = $_POST['pesoBruto'];
        $pesoLiquido = $_POST['pesoLiquido'];

        // Crie um objeto Produto com os valores recebidos do formulário
        $produto = new Produto();
        $produto->setCodigo($produtoId);
        $produto->setDescricao($descricao);
        $produto->setCodBarras($codBarras);
        $produto->setValorVenda($valorVenda);
        $produto->setPesoBruto($pesoBruto);
        $produto->setPesoLiquido($pesoLiquido);

        // Chame o método editarProduto passando o objeto Produto
        $atualizarProduto = ProdutoDao::editarProduto($produto);

        header("Location: ../view/listaProduto.php");
    } catch (Exception $e) {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo "Erro ao editar o produto: " . $e->getMessage();
    }
}
?>
