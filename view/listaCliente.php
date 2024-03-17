<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listaProduto.css">
    <title>Lista de Cliente</title>
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
            $listaClientes = ClienteDAO::listarClientes();
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }
        if (isset($listaClientes) && !empty($listaClientes)) {
        ?>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Fantasia</th>
                            <th>Documento</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaClientes as $cliente) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($cliente['codigo']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['fantasia']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['documento']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['endereco']); ?></td>
                                <td>
                                    <a class="edit-link" href="editarCliente.php?id=<?php echo htmlspecialchars($cliente['codigo']); ?>">Editar</a>
                                    <a class="delete-link" href="listaCliente.php?excluir_cliente_id=<?php echo htmlspecialchars($cliente['codigo']); ?>" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</a>
                                    <?php
                                    require_once "global.php";
                                    if (isset($_GET['excluir_cliente_id'])) {
                                        $idClienteExcluir = $_GET['excluir_cliente_id'];

                                        try {
                                            ClienteDao::excluirCliente($idClienteExcluir);
                                            header("Location: listaCliente.php");
                                            exit();
                                        } catch (Exception $e) {
                                            echo "Erro ao excluir o cliente: " . $e->getMessage();
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