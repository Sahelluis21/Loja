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

    public function inserir(Produto $produto) {
        $stmt = $this->conexao->prepare("INSERT INTO produto (descricao, preco, qtde) VALUES (:descricao, :preco, :qtde)");
        $stmt->bindValue(':descricao', $produto->getdescricao());
        $stmt->bindValue(':preco', $produto->getpreco());
        $stmt->bindValue(':qtde', $produto->getqtde(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function atualizar(Produto $produto) {
        $stmt = $this->conexao->prepare("UPDATE produto SET descricao = :descricao, preco = :preco, qtde = :qtde WHERE codigo = :codigo");
        $stmt->bindValue(':descricao', $produto->getdescricao());
        $stmt->bindValue(':preco', $produto->getpreco());
        $stmt->bindValue(':qtde', $produto->getqtde(), PDO::PARAM_INT);
        $stmt->bindValue(':codigo', $produto->getcodigo(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function remover($codigo) {
        $stmt = $this->conexao->prepare("DELETE FROM produto WHERE codigo = :codigo");
        $stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
