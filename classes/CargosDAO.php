<?php
require 'Model.php';
class CargosDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'cargos';
    	$this->class = 'Cargos';
    }
    public function insereCargos(Cargos $Cargos){
    	$values = "null, 
        '{$Cargos->getNome()}',
        '{$Cargos->getLer()}',
        '{$Cargos->getEditar()}',
        '{$Cargos->getCadastrar()}',
        '{$Cargos->getExcluir()}' 
        ";
    	return $this->inserir($values);
    }
        public function alteraCargos(Cargos $Cargos){
        $values = " 
        nome = '{$Cargos->getNome()}', 
        ler = '{$Cargos->getLer()}', 
        editar = '{$Cargos->getEditar()}', 
        cadastrar = '{$Cargos->getCadastrar()}', 
        excluir = '{$Cargos->getExcluir()}'
        ";
        return $this->alterar($Cargos->getId(), $values);
    }
}