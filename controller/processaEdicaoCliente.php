<?php
require_once 'global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do cliente foram enviados
    if (isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['fantasia']) && isset($_POST['documento']) && isset($_POST['endereco'])) {
        try {
            // Obtém os dados do formulário
            $codigo = $_POST['codigo'];
            $nome = $_POST['nome'];
            $fantasia = $_POST['fantasia'];
            $documento = $_POST['documento'];
            $endereco = $_POST['endereco'];

            // Cria um objeto Cliente e atribui os novos dados
            $cliente = new Cliente();
            $cliente->setCodigo($codigo);
            $cliente->setNome($nome);
            $cliente->setFantasia($fantasia);
            $cliente->setDocumento($documento);
            $cliente->setEndereco($endereco);

            // Chama o método para editar o cliente no banco de dados
            $mensagem = ClienteDAO::editarCliente($cliente);

            // Redireciona para a página de lista de clientes com uma mensagem de sucesso
            header("Location: ../view/listaCliente.php?mensagem=Cliente editado com sucesso");
            exit();
        } catch (Exception $e) {
            // Em caso de erro, redireciona para a página de edição do cliente com uma mensagem de erro
            header("Location: ../view/editarCliente.php?id=$codigo&erro=" . urlencode($e->getMessage()));
            exit();
        }
    } else {
        // Se os dados do cliente não foram enviados, redireciona para a página de edição do cliente com uma mensagem de erro
        header("Location: ../view/editarCliente.php?erro=Dados do cliente não foram enviados");
        exit();
    }
} else {
    // Se a requisição não foi do tipo POST, redireciona para a página de edição do cliente com uma mensagem de erro
    header("Location: ../view/editarCliente.php?erro=Requisição inválida");
    exit();
}
