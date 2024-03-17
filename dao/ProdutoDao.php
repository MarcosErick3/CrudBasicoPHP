<?php
require_once "global.php";

class ProdutoDAO
{
    public static function cadastrar($produto)
    {
        try {
            $conexao = Conexao::conectar();

            $query = "INSERT INTO produto (codigo, descricao, codBarras, valorVenda, pesoBruto, pesoLiquido) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $produto->getCodigo());
            $stmt->bindValue(2, $produto->getDescricao());
            $stmt->bindValue(3, $produto->getCodBarras());
            $stmt->bindValue(4, $produto->getValorVenda());
            $stmt->bindValue(5, $produto->getPesoBruto());
            $stmt->bindValue(6, $produto->getPesoLiquido());

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Produto cadastrado com sucesso!';
            } else {
                return 'Erro ao cadastrar o produto';
            }
        } catch (PDOException $e) {
            return 'Erro ao cadastrar o produto: ' . $e->getMessage();
        }
    }

    public static function listarproduto()
    {
        try {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codigo, descricao, codBarras, valorVenda, pesoBruto, pesoLiquido FROM produto";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (PDOException $e) {
            throw new Exception("Erro ao listar produto: " . $e->getMessage());
        }
    }

    public static function buscarProdutoPorId($codigo)
    {
        try {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT * FROM produto WHERE codigo = :codigo";
            $stmt = $conexao->prepare($querySelect);
            $stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            return $produto;
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar produto por ID: " . $e->getMessage());
        }
    }

    public static function editarProduto($produto)
    {
        try {
            $conexao = Conexao::conectar();
            $queryUpdate = "UPDATE produto SET descricao = :descricao, codBarras = :codBarras, valorVenda = :valorVenda, pesoBruto = :pesoBruto, pesoLiquido = :pesoLiquido WHERE codigo = :codigo";
            $stmt = $conexao->prepare($queryUpdate);
            $stmt->bindValue(':codigo', $produto->getCodigo(), PDO::PARAM_INT);
            $stmt->bindValue(':descricao', $produto->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(':codBarras', $produto->getCodBarras(), PDO::PARAM_STR);
            $stmt->bindValue(':valorVenda', $produto->getValorVenda(), PDO::PARAM_STR);
            $stmt->bindValue(':pesoBruto', $produto->getPesoBruto(), PDO::PARAM_STR);
            $stmt->bindValue(':pesoLiquido', $produto->getPesoLiquido(), PDO::PARAM_STR);
            $stmt->execute();
            return "Produto atualizado com sucesso.";
        } catch (PDOException $e) {
            throw new Exception("Erro ao atualizar produto: " . $e->getMessage());
        }
    }

    public static function excluirProduto($codigo)
    {
        try {
            $conexao = Conexao::conectar();
            $queryDelete = "DELETE FROM produto WHERE codigo = :codigo";
            $stmt = $conexao->prepare($queryDelete);
            $stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erro ao excluir produto: " . $e->getMessage());
        }
    }
}
