<?php
require_once "Banco.php";
require_once "Produto.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ProdutoDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Banco())->conexao;
    }

    public function listar() {
        $stmt = $this->conexao->prepare("SELECT * FROM produto");
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produto = [];
        foreach($dados as $d) {
            $produto[] = new Produto($d['codigo'], $d['descricao'], $d['preco'], $d['qtde']);
        }

        return $produto;
    }

    public function buscarPorcodigo($codigo) {
        $stmt = $this->conexao->prepare("SELECT * FROM produto WHERE codigo = :codigo");
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        if($dados) {
            return new Produto($dados['codigo'], $dados['descricao'], $dados['preco'], $dados['qtde']);
        }
        return null;
    }

    
}
