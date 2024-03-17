<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listaProduto.css">
    <title>Lista de Produtos</title>
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
    <main id="main">
        <?php
        require_once "global.php";
        try {
            // Lógica para listar produtos
            $listaProdutos = ProdutoDao::listarproduto();
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }
        if (isset($listaProdutos) && !empty($listaProdutos)) {
        ?>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Código de Barras</th>
                            <th>Valor da Venda</th>
                            <th>Peso Bruto</th>
                            <th>Peso Líquido</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaProdutos as $produto) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($produto['codigo']); ?></td>
                                <td><?php echo htmlspecialchars($produto['codBarras']); ?></td>
                                <td><?php echo htmlspecialchars($produto['valorVenda']); ?></td>
                                <td><?php echo htmlspecialchars($produto['pesoBruto']); ?></td>
                                <td><?php echo htmlspecialchars($produto['pesoLiquido']); ?></td>
                                <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                                <td>
                                    <a class="edit-link" href="editarProduto.php?id=<?php echo htmlspecialchars($produto['codigo']); ?>">Editar</a>
                                    <a class="delete-link" href="listaProduto.php?excluir_produto_id=<?php echo htmlspecialchars($produto['codigo']); ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                                    <?php
                                    if (isset($_GET['excluir_produto_id'])) {
                                        $idProdutoExcluir = $_GET['excluir_produto_id'];
                                        try {
                                            ProdutoDao::excluirProduto($idProdutoExcluir);
                                            header("Location: listaProduto.php");
                                            exit();
                                        } catch (Exception $e) {
                                            echo "Erro ao excluir o produto: " . $e->getMessage();
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </main>

</body>

</html>