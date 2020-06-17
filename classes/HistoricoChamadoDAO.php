<?php
require_once 'Model.php';
class HistoricoChamadoDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'historico_chamado';
    	$this->class = 'HistoricoChamado';
    }
    public function inserehistoricoChamado($historicoChamado)
    {
        $values = "null, 
        '{$historicoChamado->getIdChamado()}', 
        '{$historicoChamado->getIdFuncionario()}',
        NOW(), 
        '{$historicoChamado->getDescricao()}',
        '{$historicoChamado->getSolucao()}'
        ";
        return $this->inserir($values);
    }
        public function listarHistorico()
    {
        $sql = "SELECT h.*,f.nome FROM {$this->tabela} h
        LEFT JOIN funcionario f ON f.id = h.id_funcionario
        ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
        /*var_dump($stmt);exit;*/
    }

} 