<?php
require_once __DIR__ . "/../model/ProdutoDAO.php";
require_once __DIR__ . "/../model/Produto.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Controlador {
    private $ProdutoDAO;

    public function __construct() {
        $this->ProdutoDAO = new ProdutoDAO();
    }

    public function executar($acao) {
        switch ($acao) {

            
            case 'listar':
                $produtos = $this->ProdutoDAO->listar();
                $viewFile = __DIR__ . "/../view/Listar.php";
    
                (function() use ($viewFile, $produtos) {
                    include __DIR__ . "/../view/template.php";
                })();
                break;

    
            case 'adicionarCarrinho':
                $codigo = $_POST['codigo'];
                $qtde = (int) $_POST['quantidade'];

                $produto = $this->ProdutoDAO->buscarPorCodigo($codigo);

                if ($produto) {
                    if ($qtde > 0 && $qtde <= $produto->getQtde()) {
                        if (!isset($_SESSION['carrinho'])) {
                            $_SESSION['carrinho'] = [];
                        }

                        if (isset($_SESSION['carrinho'][$codigo])) {
                            $novaQtd = $_SESSION['carrinho'][$codigo]['qtde'] + $qtde;
                            if ($novaQtd > $produto->getQtde()) {
                                $novaQtd = $produto->getQtde();
                            }
                            $_SESSION['carrinho'][$codigo]['qtde'] = $novaQtd;
                        } else {
                            $_SESSION['carrinho'][$codigo] = [
                                'descricao' => $produto->getDescricao(),
                                'preco' => $produto->getPreco(),
                                'qtde' => $qtde
                            ];
                        }
                    }
                }

                header("Location: index.php?acao=listar");
                exit;
                break;

    
            case 'mostrarCarrinho':
                $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
                $viewFile = __DIR__ . "/../view/carrinho.php";
                (function() use ($viewFile, $carrinho) {
                    include __DIR__ . "/../view/template.php";
                })();
                break;

    
            case 'removerCarrinho':
                $codigo = $_GET['codigo'];
                if (isset($_SESSION['carrinho'][$codigo])) {
                    unset($_SESSION['carrinho'][$codigo]);
                }
                header("Location: index.php?acao=mostrarCarrinho");
                exit;
                break;

            default:
                $produtos = $this->ProdutoDAO->listar();
                $viewFile = __DIR__ . "/../view/listar.php";
                (function() use ($viewFile, $produtos) {
                    include __DIR__ . "/../view/template.php";
                })();
                break;
        }
    }
}
