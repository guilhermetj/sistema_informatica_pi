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
        null,  
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
        id_funcionario = '{$chamado->getIdFuncionario()}'

        ";
        return $this->alterar($chamado->getId(), $values);
    }
    public function listarEspera()
    {
        $sql = "SELECT ch.*, cl.nome AS nome_cliente, fn.nome AS nome_funcionario FROM {$this->tabela} ch 
        LEFT JOIN cliente cl ON cl.id = ch.id_cliente
        LEFT JOIN funcionario fn ON fn.id = ch.id_funcionario
        WHERE status='Em Espera'";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
        /*var_dump($stmt);exit;*/
    }
    public function listarAndamento($funcionario)
    {
        $sql = "SELECT ch.*, cl.nome AS nome_cliente, fn.nome AS nome_funcionario FROM {$this->tabela} ch 
        LEFT JOIN cliente cl ON cl.id = ch.id_cliente
        LEFT JOIN funcionario fn ON fn.id = ch.id_funcionario
        WHERE id_funcionario = '{$funcionario}' AND status='Em andamento'";
        /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
        public function listarTodos($funcionario)
    {
        $sql = "SELECT ch.*, cl.nome AS nome_cliente, fn.nome AS nome_funcionario FROM {$this->tabela} ch 
        LEFT JOIN cliente cl ON cl.id = ch.id_cliente
        LEFT JOIN funcionario fn ON fn.id = ch.id_funcionario
        ORDER BY ch.status DESC";
        /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function listarFinalizado($funcionario)
    {
        $sql = "SELECT ch.*, cl.nome AS nome_cliente, fn.nome AS nome_funcionario FROM {$this->tabela} ch 
        LEFT JOIN cliente cl ON cl.id = ch.id_cliente
        LEFT JOIN funcionario fn ON fn.id = ch.id_funcionario
        WHERE id_funcionario = '{$funcionario}' AND status='Finalizado'";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        /*var_dump($stmt);exit;*/
        return $stmt->fetchAll();
        /*var_dump($stmt);exit;*/
    }
    public function getChamado($id)
    {
        $sql = "SELECT ch.*, cl.nome AS nome_cliente, fn.nome AS nome_funcionario FROM {$this->tabela} ch 
        LEFT JOIN cliente cl ON cl.id = ch.id_cliente
        LEFT JOIN funcionario fn ON fn.id = ch.id_funcionario
        WHERE ch.id = {$id}";
        /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetch();
    }
}