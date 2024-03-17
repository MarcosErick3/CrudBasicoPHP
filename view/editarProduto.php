<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../css/editarProduto.css">
</head>

<body>
    <header id="header">
        <nav id="navbar">
            <ul id="nav">
                <li class="nav-item">
                    <a href="cadastroProduto.php">Cadastro de Produtos</a>
                </li>
                <li class="nav-item">
                    <a href="listaProduto.php">Lista de Produtos</a>
                </li>
                <li class="nav-item">
                    <a href="cadastroCliente.php">Cadastro de Cliente</a>
                </li>
                <li class="nav-item">
                    <a href="listaCliente.php">Lista de Cliente</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php">Sair</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="../controller/processaEdicaoProduto.php" method="post" id="form">
            <?php
            require "global.php";
            if (isset($_GET['id'])) {
                $produtoId = $_GET['id'];
                try {
                    $produto = ProdutoDao::buscarProdutoPorId($produtoId);
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                if (isset($produto) && is_array($produto)) {
            ?>
                    <div class="form-main">
                        <input type="hidden" name="codigo" value="<?php echo $produto['codigo']; ?>">
                        <div class="input-column">
                            <div class="input-group">
                                <label for="codBarras">Código de Barras</label>
                                <input type="text" id="codBarras" name="codBarras" value="<?php echo htmlspecialchars($produto['codBarras']); ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="valorVenda">Valor de Venda</label>
                                <input type="text" id="valorVenda" name="valorVenda" value="<?php echo htmlspecialchars($produto['valorVenda']); ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="pesoBruto">Peso Bruto</label>
                                <input type="text" id="pesoBruto" name="pesoBruto" value="<?php echo htmlspecialchars($produto['pesoBruto']); ?>" required>
                            </div>
                        </div>
                        <div class="input-column">
                            <div class="input-group">
                                <label for="pesoLiquido">Peso Líquido</label>
                                <input type="text" id="pesoLiquido" name="pesoLiquido" value="<?php echo htmlspecialchars($produto['pesoLiquido']); ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="descricao">Descrição</label>
                                <textarea id="descricao" name="descricao" required><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="botao">
                        <button type="submit" class="btn">Salvar Alterações</button>
                        <a href="../view/listaProduto.php">Voltar</a>
                    </div>
            <?php
                }
            }
            ?>
        </form>

    </main>
</body>

</html>