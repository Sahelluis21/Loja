<?php
require_once __DIR__ . "/../model/ProdutoDAO.php";
require_once __DIR__ . "/../model/Produto.php";

class Controlador {
    private $ProdutoDAO;

    public function __construct() {
        $this->ProdutoDAO = new ProdutoDAO();
    }

    public function executar($acao) {
        switch ($acao) {
            case 'listar':
                $produto = $this->ProdutoDAO->listar();
                $viewFile = "view/Listar.php";
                include "view/template.php";
                break;

            case 'formAdicionar':
                $viewFile = "view/Gravar.php";
                include "view/template.php";
                break;

            case 'gravar':
                $produto = new Produto(null, $_POST['descricao'], $_POST['preco'], $_POST['qtde']);
                $this->ProdutoDAO->inserir($produto);
                header("Location: index.php?acao=listar");
                break;

            case 'remover':
                $this->ProdutoDAO->remover($_GET['codigo']);
                header("Location: index.php?acao=listar");
                break;

            case 'formAlterar':
                $produto = $this->ProdutoDAO->buscarPorcodigo($_GET['codigo']);
                $viewFile = "view/Alterar.php";
                include "view/template.php";
                break;

            case 'atualizar':
                $produto = new Produto($_POST['codigo'], $_POST['descricao'], $_POST['preco'], $_POST['qtde']);
                $this->ProdutoDAO->atualizar($produto);
                header("Location: index.php?acao=listar");
                break;

            default:
                $produto = $this->ProdutoDAO->listar();
                $viewFile = "view/Listar.php";
                include "view/template.php";
                break;
        }
    }
}
