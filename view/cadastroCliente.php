<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastraCliente.css">
    <title>Document</title>
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
        <main>
            <form action="../controller/cadastroCliente.php" method="post" id="form">
                <div class="form-main">
                    <div class="input-column">
                        <div class="input-group">
                            <label for="codigo">Código</label>
                            <input type="number" id="codigo" name="codigo" placeholder="Digite o código do cliente" required>
                        </div>
                        <div class="input-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Digite o nome do cliente" required>
                        </div>
                        <div class="input-group">
                            <label for="fantasia">Fantasia</label>
                            <input type="text" id="fantasia" name="fantasia" placeholder="Digite o nome fantasia do cliente" required>
                        </div>
                    </div>
                    <div class="input-column">
                        <div class="input-group">
                            <label for="documento">Documento</label>
                            <input type="text" id="documento" name="documento" placeholder="Digite o documento do cliente" required>
                        </div>

                        <div class="input-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço do cliente" required>
                        </div>
                    </div>
                </div>
                <div class="botao">
                    <button type="submit" class="btn">Cadastrar</button>
                </div>
            </form>
        </main>


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