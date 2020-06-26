<?php
require_once 'Model.php';
class ControleDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'controles';
        $this->class = 'Controle';
    }

    public function insereControle(Controle $controle) {
    	$values = "null, 
            '{$controle->getNome()}'";
    	return $this->inserir($values);
    }

    public function alteraControle(Controle $controle) {
    	$values = "nome = '{$controle->getNome()}'";
    	$this->alterar($controle->getId(), $values);
    }
}