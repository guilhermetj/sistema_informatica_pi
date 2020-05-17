<?php
require_once 'Model.php';
class ChamadoDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'chamado';
    	$this->class = 'Chamado';
    }
    public function insereChamado(Chamado $chamado){
    	$values = "null, 
        '{$chamado->getIdCliente()}', 
        '{$chamado->getStatus()}',
        '{$chamado->getEquipamento()}',
        '{$chamado->getDescricao()}',  
        NOW(),
        null
        ";
    	return $this->inserir($values);
    }
        public function alteraChamado(Chamado $chamado){
        $values = " 
        id_cliente = '{$chamado->getIdCliente()}', 
        status = '{$chamado->getStatus()}',
        equipamento = '{$chamado->getEquipamento()}',
        descricao = '{$chamado->getDescricao()}'

        ";
        return $this->alterar($chamado->getId(), $values);
    }
}