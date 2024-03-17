<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastraProduto.css">
    <title>Cadastro de Produto</title>
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
        <form action="../controller/cadastroProduto.php" method="post" id="form">
            <div class="form-main">
                <div class="input-column">
                    <div class="input-group">
                        <label for="codigo">Código</label>
                        <input type="number" id="codigo" name="codigo" placeholder="Digite o código do produto" required>
                    </div>
                    <div class="input-group">
                        <label for="codBarras">Código de Barras</label>
                        <input type="number" id="codBarras" name="codBarras" placeholder="Digite o código de barras" required>
                    </div>
                    <div class="input-group">
                        <label for="valorVenda">Valor da Venda</label>
                        <input type="number" id="valorVenda" name="valorVenda" placeholder="Digite o valor da venda" required>
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label for="pesoBruto">Peso Bruto</label>
                        <input type="number" id="pesoBruto" name="pesoBruto" placeholder="Digite o peso bruto" required>
                    </div>
                    <div class="input-group">
                        <label for="pesoLiquido">Peso Líquido</label>
                        <input type="number" id="pesoLiquido" name="pesoLiquido" placeholder="Digite o peso líquido" required>
                    </div>
                    <div class="input-group">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" placeholder="Digite a descrição do produto"></textarea>
                    </div>
                </div>
            </div>
            <div class="botao">
                <button type="submit" class="btn">Enviar</button>
            </div>
        </form>
    </main>
</body>

</html>