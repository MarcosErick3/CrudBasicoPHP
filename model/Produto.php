<?php
require_once 'global.php';
class Produto {
    private $id;
    private $codigo;
    private $descricao;
    private $codBarras;
    private $valorVenda;
    private $pesoBruto;
    private $pesoLiquido;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getCodBarras() {
        return $this->codBarras;
    }

    public function setCodBarras($codBarras) {
        $this->codBarras = $codBarras;
    }

    public function getValorVenda() {
        return $this->valorVenda;
    }

    public function setValorVenda($valorVenda) {
        $this->valorVenda = $valorVenda;
    }

    public function getPesoBruto() {
        return $this->pesoBruto;
    }

    public function setPesoBruto($pesoBruto) {
        $this->pesoBruto = $pesoBruto;
    }

    public function getPesoLiquido() {
        return $this->pesoLiquido;
    }

    public function setPesoLiquido($pesoLiquido) {
        $this->pesoLiquido = $pesoLiquido;
    }

}
?>
