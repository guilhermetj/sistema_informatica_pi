<?php
require_once 'Model.php';
class RelatorioDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function contar($table = '', $condicao = '')
    {
    	$where = '';
    	if($condicao != '') {
    		$where = "WHERE {$condicao}";
    	}
    	$sql = "SELECT count(*) as total FROM {$table} {$where};";
        /*var_dump($sql);exit;*/
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_ASSOC);	
    }
}