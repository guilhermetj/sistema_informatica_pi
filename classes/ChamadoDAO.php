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
        'null',  
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
    public function aceitarChamado(Chamado $chamado){
        $values = "  
        status = '{$chamado->getStatus()}',
        funcionario = '{$chamado->getFuncionario()}'

        ";
        return $this->alterar($chamado->getId(), $values);
    }
    public function listarEspera()
    {
        $sql = "SELECT * FROM {$this->tabela} WHERE status = 'Em espera'";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
        /*var_dump($stmt);exit;*/
    }
    public function listarAndamento($funcionario)
    {
        $sql = "SELECT * FROM {$this->tabela} WHERE funcionario = '{$funcionario}'";
        /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
        /*var_dump($stmt);exit;*/
    }
}