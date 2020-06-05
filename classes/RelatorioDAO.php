<?php
require_once 'Model.php';
class RelatorioDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function contar($table = 'cliente', $condicao = '')
    {
    	$where = '';
    	if($condicao != '') {
    		$where = "WHERE {$condicao}";
    	}
    	$sql = "SELECT count(*) as total FROM {$table} {$where};";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_ASSOC);	
    }
    // public function evolucaoChamado($table = 'chamado', $condicao = '')
    // {
    //     $where = '';
    //     if($condicao != '') {
    //         $where = " WHERE {$condicao}";
    //     }
    //     $sql = "SELECT 
    //                 DATE_FORMAT(v.data_venda, '%d/%m/%Y') as data, count(*) qtd, sum(vp.valor * vp.qtd) as total
    //             FROM vendas v
    //             LEFT JOIN vendas_produtos vp ON vp.venda_id = v.id
    //             {$where}
    //             GROUP BY DATE_FORMAT(v.data_venda, '%d/%m/%Y')
    //             ORDER BY data_venda ASC";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    // }
}