<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/editarCliente.css">
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
        <form action="../controller/processaEdicaoCliente.php" method="post" id="form">
            <?php
            require "global.php";
            if (isset($_GET['id'])) {
                $clienteId = $_GET['id'];
                try {
                    $cliente = ClienteDao::buscarClientePorId($clienteId);
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                if (isset($cliente) && is_array($cliente)) {
            ?>
                    <div class="form-main">
                        <input type="hidden" name="codigo" value="<?php echo $cliente['codigo']; ?>">
                        <div class="input-column">
                            <div class="input-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="fantasia">Nome Fantasia</label>
                                <input type="text" id="fantasia" name="fantasia" value="<?php echo htmlspecialchars($cliente['fantasia']); ?>" required>
                            </div>
                        </div>
                        <div class="input-column">
                            <div class="input-group">
                                <label for="documento">Documento</label>
                                <input type="text" id="documento" name="documento" value="<?php echo htmlspecialchars($cliente['documento']); ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($cliente['endereco']); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="botao">
                        <button type="submit" class="btn">Salvar Alterações</button>
                        <a href="../view/listaCliente.php">Voltar</a>
                    </div>
            <?php
                }
            }
            ?>
        </form>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputCPF = document.getElementById('documento');

            inputCPF.addEventListener('input', function() {
                var cpf = inputCPF.value.replace(/\D/g, '');
                cpf = cpf.substring(0, 11);
                if (cpf.length > 3) {
                    cpf = cpf.substring(0, 3) + '.' + cpf.substring(3);
                }
                if (cpf.length > 7) {
                    cpf = cpf.substring(0, 7) + '.' + cpf.substring(7);
                }
                if (cpf.length > 11) {
                    cpf = cpf.substring(0, 11) + '-' + cpf.substring(11);
                }

                inputCPF.value = cpf;
            });
        });
    </script>
</body>

</html>