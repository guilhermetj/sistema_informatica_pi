<?php
require_once 'Model.php';
class CargosDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'cargos';
    	$this->class = 'Cargos';
    }
    public function insereCargos(Cargos $Cargos){
    	$values = "null, 
        '{$Cargos->getNome()}' 
        ";
    	return $this->inserir($values);
    }
        public function alteraCargos(Cargos $Cargos){
        $values = " 
        nome = '{$Cargos->getNome()}'
        ";
        return $this->alterar($Cargos->getId(), $values);
    }
}