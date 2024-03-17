<?php
require_once "global.php";
class ClienteDAO
{
    public static function cadastrar($cliente)
    {
        try {
            $conexao = Conexao::conectar();

            $query = "INSERT INTO clientes (codigo, nome, fantasia, documento, endereco) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $cliente->getCodigo());
            $stmt->bindValue(2, $cliente->getNome());
            $stmt->bindValue(3, $cliente->getFantasia());
            $stmt->bindValue(4, $cliente->getDocumento());
            $stmt->bindValue(5, $cliente->getEndereco());

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Cliente cadastrado com sucesso!';
            } else {
                return 'Erro ao cadastrar o cliente';
            }
        } catch (PDOException $e) {
            return 'Erro ao cadastrar o cliente: ' . $e->getMessage();
        }
    }

    public static function listarClientes()
    {
        try {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codigo, nome, fantasia, documento, endereco FROM clientes";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (PDOException $e) {
            throw new Exception("Erro ao listar clientes: " . $e->getMessage());
        }
    }

    public static function buscarClientePorId($id)
    {
        try {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT * FROM clientes WHERE codigo = :id";
            $stmt = $conexao->prepare($querySelect);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cliente;
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar cliente por ID: " . $e->getMessage());
        }
    }

    public static function editarCliente($cliente)
    {
        try {
            $conexao = Conexao::conectar();
            $queryUpdate = "UPDATE clientes SET nome = :nome, fantasia = :fantasia, documento = :documento, endereco = :endereco WHERE codigo = :codigo";
            $stmt = $conexao->prepare($queryUpdate);
            $stmt->bindValue(':codigo', $cliente->getCodigo(), PDO::PARAM_INT);
            $stmt->bindValue(':nome', $cliente->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':fantasia', $cliente->getFantasia(), PDO::PARAM_STR);
            $stmt->bindValue(':documento', $cliente->getDocumento(), PDO::PARAM_STR);
            $stmt->bindValue(':endereco', $cliente->getEndereco(), PDO::PARAM_STR);
            $stmt->execute();
            return "Cliente atualizado com sucesso.";
        } catch (PDOException $e) {
            throw new Exception("Erro ao atualizar cliente: " . $e->getMessage());
        }
    }

    public static function excluirCliente($codigo)
    {
        try {
            $conexao = Conexao::conectar();
            $queryDelete = "DELETE FROM clientes WHERE codigo = :codigo";
            $stmt = $conexao->prepare($queryDelete);
            $stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erro ao excluir cliente: " . $e->getMessage());
        }
    }
}
