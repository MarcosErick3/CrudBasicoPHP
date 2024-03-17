<?php
require_once 'global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['codigo']) && isset($_POST['descricao']) && isset($_POST['codBarras']) && isset($_POST['valorVenda']) && isset($_POST['pesoBruto']) && isset($_POST['pesoLiquido'])) {

        $produto = new Produto();
        $produto->setCodigo($_POST['codigo']);
        $produto->setDescricao($_POST['descricao']);
        $produto->setCodBarras($_POST['codBarras']);
        $produto->setValorVenda($_POST['valorVenda']);
        $produto->setPesoBruto($_POST['pesoBruto']);
        $produto->setPesoLiquido($_POST['pesoLiquido']);

        $mensagem = ProdutoDao::cadastrar($produto);

        header("Location: ../view/cadastroProduto.php");
    }
}
?>