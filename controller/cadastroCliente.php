<?php
require_once 'global.php';
require_once '../dao/ClienteDao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['fantasia']) && isset($_POST['documento']) && isset($_POST['endereco'])) {

        $cliente = new Cliente();
        $cliente->setCodigo($_POST['codigo']);
        $cliente->setNome($_POST['nome']);
        $cliente->setFantasia($_POST['fantasia']);
        $cliente->setDocumento($_POST['documento']);
        $cliente->setEndereco($_POST['endereco']);

        $mensagem = ClienteDAO::cadastrar($cliente);

        header("Location: ../view/cadastroCliente.php");
    }
}
?>