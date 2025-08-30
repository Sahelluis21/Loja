<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Cliente {
    private $codigo;
    private $descricao;
    private $preco;
    private $qtde;

    public function __construct($codigo = null, $descricao = null, $preco = null, $qtde = null) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->qtde = $qtde;
    }

    public function getcodigo() { return $this->codigo; }
    public function setcodigo($codigo) { $this->codigo = $codigo; }

    public function getdescricao() { return $this->descricao; }
    public function setdescricao($descricao) { $this->descricao = $descricao; }

    public function getpreco() { return $this->preco; }
    public function setpreco($preco) { $this->preco = $preco; }

    public function getqtde() { return $this->qtde; }
    public function setqtde($qtde) { $this->qtde = $qtde; }

}
